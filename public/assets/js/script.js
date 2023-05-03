$(document).ready(function() {

    alterQueryString();

    function alterQueryString() {
        
        let queryDate = $('.main-graphic-wrapper .date-wrapper small').data('date');

        let queryFilter = $('.main-tasks-wrapper select').val();

        history.pushState({}, null, `?date=${queryDate}&filter=${queryFilter}`);
    }

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

        const queryString = window.location.search;

        const urlParams = new URLSearchParams(queryString);
        
        let date = urlParams.get('date');

        let filter = $(this).val();
    
        $.ajax({
            url: `${url}/api/alterFilter`,
            type: 'POST',
            data: {
                date,
                filter
            },
            dataType: 'JSON',
            success: function(data) {
    
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
    
    $('.main-graphic-wrapper .date-wrapper img').click(function() {
        const queryString = window.location.search;

        const urlParams = new URLSearchParams(queryString);
        
        let date = urlParams.get('date');

        let filter = urlParams.get('filter');

        let action = $(this).data('action');
    
        $.ajax({
            url: `${url}/api/alterDate`,
            type: 'POST',
            data: {
                action,
                date,
                filter
            },
            dataType: 'JSON',
            success: function(data) {

                $('.main-graphic-wrapper .date-wrapper small').data('date', data.date);
    
                $('.main-graphic-wrapper .date-wrapper small').html(data.dateString).trigger('change');
    
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

    $('.main-tasks-wrapper select, .main-graphic-wrapper .date-wrapper small').change(alterQueryString);
});