// require('./bootstrap');
import $ from 'jquery';
import 'jquery-ui';
import Sortable from 'sortablejs';

const list = document.querySelector('.list-group');
const sort = new Sortable(list, {
    handle: '.drag-handle',
    animation: 150,
    onUpdate: function () {
        const tasks = list.querySelectorAll('.list-group-item');
        tasks.forEach((task, index) => {
            const taskId = task.dataset.taskId;
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('/task/priority', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({
                    taskId: taskId,
                    priority: index + 1
                })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Request failed with status ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    // Handle the response data
                })
                .catch(error => {
                    // Handle the error
                });
        });
    }
});

