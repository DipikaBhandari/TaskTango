<?php include __DIR__ . '/../header.php'; ?>
<style>
    /* Add pointer cursor for select dropdown */
    select.form-control {
        cursor: pointer;
    }
</style>

<div class="container mt-4">
    <h1>Create New Task</h1>
    <form method="POST">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="10" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="deadline">Deadline:</label>
            <input type="date" id="deadline" name="deadline" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select id="category" name="category" class="form-control" required>
                <option value="" disabled selected>Select category</option>
                <option value="home">Home</option>
                <option value="work">Work</option>
            </select>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>


