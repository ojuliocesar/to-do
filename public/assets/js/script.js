

$('.main-tasks-wrapper .main-list-tasks li .doneCheckbox').on('change', function() {
    
    var doneCheckbox = $(this);

    $.ajax({
        url: `${url}/api/task/isDone`,
        type: 'POST',
        data: {
            taskId: doneCheckbox.data('task-id')
        },
        dataType: 'JSON',
        success: function() {
            console.log('foi');
        },
        error: function() {
            console.log('não foi');
        }
    })

});