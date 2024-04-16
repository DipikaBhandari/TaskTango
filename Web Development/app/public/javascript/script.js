
function openEditModal(id) {

    fetch(`http://localhost/api/task/getTaskToEdit?id=${encodeURIComponent(id)}`)

        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Ensure we're accessing the first element of the array if the data is encapsulated as such.
            const task = data[0]; // Adjust this line to properly access the user details.

            document.getElementById('editId').value = task.id;
            document.getElementById('editTitle').value = task.title;
            document.getElementById('editContent').value = task.content;
            document.getElementById('editDeadline').value = task.deadline;


            // Trigger modal display
            $('#editUserModal').modal('show');
        })
        .catch(error => {
            console.error('Error fetching task details:', error);
            alert('Failed to load task details.');
        });
}

function updateTask() {
    const taskData = {
        id: document.getElementById('editId').value,
        title: document.getElementById('editTitle').value,
        content: document.getElementById('editContent').value,
        deadline: document.getElementById('editDeadline').value,

    };

    fetch('http://localhost/api/task/editTask', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            // Include CSRF token if needed
        },
        body: JSON.stringify(taskData),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {

                alert('Task updated successfully');
                const taskRow = document.querySelector(`tr[data-id="${taskData.id}"]`);
                if (taskRow) {
                    taskRow.querySelector('td:nth-child(1)').textContent = taskData.title;
                    taskRow.querySelector('td:nth-child(2)').textContent = taskData.content;
                    taskRow.querySelector('td:nth-child(3)').textContent = taskData.deadline;
                }

                $('#editUserModal').modal('hide');
                // Optionally, refresh the page or re-fetch user list here
            } else {
                alert('Failed to update task');
            }
        })
        .catch(error => {
            console.error('Error updating task:', error);
            alert('Error updating task');
        });
}

    function deleteTask(id) {
    if(confirm('Do you want to delete this task?')) {
    const spinner = document.getElementById('spinner');
    spinner.style.display = 'block';
    fetch('http://localhost/api/task/deleteTask', {
    method: 'POST',
    headers: {
    'Content-Type': 'application/json',
},
    body: JSON.stringify({id: id}),
})
    .then(response => response.json())
    .then(data => {
    if(data.success) {
    setTimeout(() => {
    spinner.style.display = 'none';
    location.reload();
}, 10);
} else {
    spinner.style.display = 'none';
    throw new Error(data.message || 'Failed to update task.');
}
})
    .catch((error) => {
    spinner.style.display = 'none';
    console.error('Error:', error);
    alert('Error deleting task');
});
}
}

