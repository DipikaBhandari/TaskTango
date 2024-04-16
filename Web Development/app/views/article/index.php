<?php
include __DIR__ . '/../header.php';
?>

<!-- Main content -->

<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Deadline</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($model as $article): ?>
                    <tr data-id="<?php echo htmlentities($article['id']); ?>">
                        <td><?php echo htmlentities($article['title']); ?></td>
                        <td><?php echo htmlentities($article['content']); ?></td>
                        <td><?php echo htmlentities($article['deadline']); ?></td>
                        <td>
                            <a onclick="openEditModal('<?php echo htmlentities($article['id']); ?>')" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                            <a onclick="deleteTask('<?php echo htmlentities($article['id']); ?>')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" ">
                <span aria-hidden="true">&times;</span>

            </div>
            <div class="modal-body">
                <div id="spinner" class="spinner" style="display:none;"></div>
                <form id="editUserForm">

                    <!-- Include other fields as necessary -->
                    <input type="hidden" id="editId" name="id">
                    <div class="form-group">
                        <label for="editUsername">Title</label>
                        <input type="text" class="form-control" id="editTitle" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="editAddress">Content</label>
                        <input type="text" class="form-control" id="editContent" name="content" required>
                    </div>

                    <div class="form-group">
                        <label for="editDeadline">Deadline:</label>
                        <input type="date" id="editDeadline" name="deadline" class="form-control" required>
                    </div>

                    <!-- Add other fields as needed -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateTask()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="/javascript/script.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

