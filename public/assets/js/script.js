$('body').on('change', '.main-tasks-wrapper .main-list-tasks li .doneCheckbox', function() {
    
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

$('.main-tasks-wrapper select').change(function(event) {

    let filterValue = event.target.value;

    let tasks = $('.main-tasks-wrapper .main-list-tasks li');

    tasks.each(function(index, task) {
        
        let isChecked = $(task).find('.doneCheckbox')[0].checked;

        $(task).show();

        if (filterValue == 'pendingTasks') {

            isChecked == true && $(task).hide();

        } else if (filterValue == 'finishedTasks') {

            isChecked == false && $(task).hide();

        }

    })
});

$('.main-graphic-wrapper .date-wrapper img').click(function() {
    let action = $(this).data('action');

    let date = $(this).siblings('small').data('date');

    $.ajax({
        url: `${url}/api/alterDate`,
        type: 'POST',
        data: {
            action,
            date
        },
        dataType: 'JSON',
        success: function(data) {
            
            $('.main-graphic-wrapper .date-wrapper small').data('date', data.date);

            $('.main-graphic-wrapper .date-wrapper small').html(data.dateString);

            let tasksWrapper = $('.main-tasks-wrapper .main-list-tasks');

            tasksWrapper.html('');

            if (data.tasks.length) {

                data.tasks.map(function(task) {
                    tasksWrapper.append(`
                        <li>
                            <div class="title-wrapper">
                                <input data-task-id="${task.id}" class="doneCheckbox" type="checkbox"  ${task.is_done && 'checked'}>
                                <h3>${task.title}</h3>
                            </div>

                            <div class="content-action-wrapper">
                                <div class="content-task">
                                    <p>${task.description}</p>
                                </div>
            
                                <div class="actions">
                                    <a href="http://localhost:8000/task/update/${task.id}">
                                        <img src="http://localhost:8000/assets/images/icon-edit.png" alt="Icon Edit">
                                    </a>
            
                                    <a href="http://localhost:8000/api/task/delete/${task.id}">
                                        <img src="http://localhost:8000/assets/images/icon-delete.png" alt="Icon Edit">
                                    </a>
                                </div>
                            </div>
                        </li>
                    `);
                });

            } else {

                tasksWrapper.html('Nenhuma task definida para este dia');

            }


        }

    });
});