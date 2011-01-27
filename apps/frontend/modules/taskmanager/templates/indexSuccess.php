<?php

use_javascript('taskmatrix');
use_stylesheet('taskmatrix');

$id_array = array(); ?>

<table>
    <tr>
        <td class="no_borders">

        </td>
        <td class="no_borders top_left_metric">
            Urgent
        </td>
        <td class="no_borders top_right_metric">
            Not Urgent
        </td>
    </tr>
    <tr>
        <td class="no_borders left_top_metric">
            Important
        </td>
        <td  id="first_quadrant" class="quadrant"><!-- FIRST QUADRANT -->

            <ul class="task_list" id="first_quadrant_list"></ul>

        </td>
        <td id="second_quadrant" class="quadrant"><!-- SECOND QUADRANT -->

           <ul class="task_list" id="second_quadrant_list"></ul>

        </td>
    </tr>
    <tr>
        <td class="no_borders left_bottom_metric">
            Not Important
        </td>
        <td id="third_quadrant" class="quadrant"><!-- THIRD QUADRANT -->

            <ul class="task_list" id="third_quadrant_list"></ul>
        </td>
        <td id="fourth_quadrant" class="quadrant"><!-- FOURTH QUADRANT -->

            <ul class="task_list" id="fourth_quadrant_list"></ul>

        </td>
    </tr>
</table>

<script type="text/javascript">
    window.tasks = new Array();
    <?php foreach($tasks as $task) { ?>
    var new_task = new Object();
    new_task.quadrant = <?php echo $task->getQuadrant(); ?>;
    new_task.name = "<?php echo $task->getName(); ?>";
    new_task.task_id = "<?php echo $task->getTaskId(); ?>";
    window.tasks.push(new_task);
    <?php } ?>

</script>
