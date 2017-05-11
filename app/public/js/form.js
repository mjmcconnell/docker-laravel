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

        // Send the data using post
        var request = $.post('/api/tasks', $form.serialize(), function(data) {
            var record = $.parseJSON(data['data']['record']);
            $('tbody').append($('<tr class="record-row-' + record.id + '">')
                .append($('<td>')
                    .append(record.id)
                )
                .append($('<td>')
                    .append('<a href="/tasks/' + record.id + '">' + record.name + '</a>')
                )
                .append($('<td>')
                    .append('<button onclick="$(this).DeleteRecord(' + record.id + ');">Delete Task</button>')
                )
            );
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
                $('.record-row-' + record_id).remove();
            }
        });
    };

})(jQuery)
