<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1>Task Details</h1>

    <div class="card">
        <div class="card-header">
            <h2><?= $task['title'] ?></h2>
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> <?= $task['description'] ?></p>
            <p><strong>Priority:</strong> <?= $task['priority'] ?></p>
            <p><strong>Due Date:</strong> <?= $task['due_date'] ?></p>
            <p><strong>Status:</strong> <?= $task['status'] ?></p>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('index.php/task/list') ?>" class="btn btn-primary">Back to Task List</a>
            <a href="<?= base_url('index.php/task/edit/' . $task['id']) ?>" class="btn btn-warning">Edit Task</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
