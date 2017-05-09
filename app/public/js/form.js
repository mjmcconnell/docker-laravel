/*
* Functionality for handling form data, between server and client.
*
*
*/
(function($) {
    $.fn.CreateRecord = function() {
        // Stop form from submitting normally
        event.preventDefault();

        // Get some values from elements on the page:
        var $form = $("#new-record-form");

        console.log($form.serialize());

        // Send the data using post
        var request = $.post('/api/tasks', $form.serialize(), function(data) {

        }, 'json');
    };

    $.fn.UpdateRecord = function(record_id) {
        // Stop form from submitting normally
        event.preventDefault();

        // Get some values from elements on the page:
        var $form = $("#update-record-form");

        // Send the data using post
        var request = $.post('/api/tasks/' + record_id, $form.serialize(), 'json');
    };

    $.fn.DeleteRecord = function(record_id) {
        $.ajax({
            url: '/api/tasks/' + record_id + '/delete',
            type: 'DELETE',
            success: function(result) {
                $('tbody').remove('.record-row-' + record_id);
            }
        });
    };

})(jQuery)
