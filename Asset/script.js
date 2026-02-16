function onTaskClick(e) {
    console.log('Clicked element:', e.target);

    if (e.target.closest('a') || e.target.closest('button') || e.target.closest('[data-url]') || e.target.closest('.badge-item')) {
        return;
    }

    var taskElement = KB.dom(e.target).parent('.task-board');
        if (taskElement) {
            var taskUrl = KB.dom(taskElement).data('taskUrl');

            if (taskUrl) {
                KB.modal.open(taskUrl, 'small', true);
            }
        }
}

function openTaskInModal(e) {
    var urlParam = new URLSearchParams(window.location.search);
    var taskIdToOpen = urlParam.get('open_task_id');
    if (taskIdToOpen) {

        setTimeout(function() {
            var taskElement = document.querySelector('.task-board[data-task-id="' + taskIdToOpen + '"]');
            if (taskElement) {
                var taskUrl = taskElement.getAttribute('data-task-url');
                if (taskUrl) {
                    KB.modal.open(taskUrl, 'small', true);
                    window.history.replaceState({}, document.title, window.location.pathname + window.location.search.replace(/&?open_task_id=\d+/, ''));
                }
            }
        }, 200);
    }
}

KB.on('dom.ready', function () {
    KB.onClick('.task-board *', onTaskClick, true);
    KB.onClick('.task-board', onTaskClick, true);
    KB.onClick('#my-panel-close, #my-panel-close *', function (e) {
        e.preventDefault();
        KB.modal.close();
    });
    openTaskInModal();
});