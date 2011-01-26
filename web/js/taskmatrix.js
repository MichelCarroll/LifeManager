$(document).ready(function() {

    //TO EDIT TASKS ALREADY ON THE MATRIX
    $('.quadrant li').each(function(item, callback) {
        register_task_item(this);
    });

    //TO CREATE A NEW TASK, DOUBLE CLICK ON QUADRANTS
    $('.quadrant').dblclick(function(handle) {

        //(handle target is the surface target)
        switch($(handle.target).attr('id')) {

            case 'first_quadrant':
                input_new_task('#first_quadrant');
            break;
            case 'second_quadrant':
                input_new_task('#second_quadrant');
            break;
            case 'third_quadrant':
                input_new_task('#third_quadrant');
            break;
            case 'fourth_quadrant':
                input_new_task('#fourth_quadrant');
            break;
        }
    });

    var task_array = window.tasks;
    for(var i = 0; i < task_array.length; i++) {
        create_new_task(task_array[i].name, task_array[i].quadrant, true);
    }

});

function input_new_task(quadrant_id) {
    var list = $(quadrant_id + ' ul.task_list').first();

    var new_item_input = $('<input id="new_item_input" />');
    var new_item = $('<li></li>');

    new_item.append(new_item_input);
    list.append(new_item);

    new_item_input.focus();
    new_item_input.keydown(function(handle) {
        if(handle.keyCode == 13) {
            save_new_task(this);
        }
    });
    new_item_input.blur(function() {
        save_new_task(this);
    });
}

function update_task(task_item) {

    var new_item_input = $('<input id="new_item_input" value="" />');
    $(new_item_input).val($(task_item).attr('task_name'));

    $(task_item).empty();
    $(task_item).append(new_item_input);
    $(new_item_input).focus();
    $(new_item_input).select();

    $(new_item_input).keydown(function(handle) {
        if(handle.keyCode == 13) {
            save_new_task(this);
        }
    });
    $(new_item_input).blur(function() {
        save_new_task(this);
    });
    
}

function save_new_task(input_box) {
    
    var saved_value = $.trim($(input_box).val());
    if((saved_value) != "") {

        //TODO: AJAX SAVE TO DATABASE
        create_new_task(saved_value, $(input_box).parent().parent().parent().attr('id'))

    }
    
    $(input_box).parent().remove();
}

function register_task_item(task_item) {

    $(task_item).dblclick(function(handle) {
        update_task(task_item);
    });

}

function create_new_task(task_name, quadrant, bypass_ajax, task_id) {

    var urgent = false;
    var important = false;
    var quad_name = null;

    switch(quadrant) {
        case 1:
            quad_name = '#first_quadrant';
            urgent = important = true;
            break;
        case 2:
            quad_name = '#second_quadrant';
            important = true;
            break;
        case 3:
            quad_name = '#third_quadrant';
            urgent = true;
            break;
        case 4:
            quad_name = '#fourth_quadrant';
            break;
        case 'first_quadrant':
            quad_name = '#' + quadrant;
            urgent = important = true;
            break;
        case 'second_quadrant':
            quad_name = '#' + quadrant;
            important = true;
            break;
        case 'third_quadrant':
            quad_name = '#' + quadrant;
            urgent = true;
            break;
        case 'fourth_quadrant':
            quad_name = '#' + quadrant;
            break;
    }

    var new_task = $('<li></li>');
    new_task.attr('task_name', task_name);
    new_task.append('<strong>'+ task_name +'</strong>');

    if(bypass_ajax) {
        $(quad_name + ' ul.task_list').append(new_task);
        register_task_item(new_task);
    }
    else {
        $.ajax({
            type: 'POST',
            url: '/taskmanager/ajaxinsert/',
            data: 'urgent=' + urgent + "&important=" + important + "&name=" + task_name,
            success: function(msg) {

                var return_json = $.parseJSON(msg);

                new_task.attr('id', return_json.task_id);
                $(quad_name + ' ul.task_list').append(new_task);
                register_task_item(new_task);
            }
        });
    }
}