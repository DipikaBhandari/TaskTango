<?php include __DIR__ . '/../header.php'; ?>

<h1>Edit Article</h1>

<form method="post" action="/article/updateTask">
    <input type="hidden" name="id" value="<?= $task->id ?>">
    <label>Title:</label>
    <label>
        <input type="text" name="title" value="<?= $task->title ?>">
    </label><br>
    <label>Author:</label>
    <label>
        <input type="text" name="author" value="<?= $task->author ?>">
    </label><br>
    <label>Content:</label>
    <label>
        <textarea name="content"><?= $task->content ?></textarea>
    </label><br>
    <button type="submit">Update Article</button>
</form>


