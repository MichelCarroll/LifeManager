function Task(id) {

    //PRIVATE VARIABLES
    var synced_data = new Array();
    var synced_id = id;
    var new_data = new Array();

    //PUBLIC METHODS
    this.updated_synced_data = function(fieldName, fieldValue) {
        synced_data[fieldName] = new_data[fieldName] = fieldValue;
    };

    this.update_data = function(fieldName, fieldValue) {
        new_data[fieldName] = fieldValue;
    };

    this.synchronize = function() {

        for(var i = 0; i < new_data.length; i++) {

        }

    };

}