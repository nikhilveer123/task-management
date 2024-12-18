<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Task List</title>
</head>
<body>

<div class="container mt-4">

<?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php elseif ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

	<?php if ($this->session->userdata('user_id')): ?>
        <div class="d-flex justify-content-end mb-3">
            <a href="<?= base_url('index.php/auth/logout') ?>" class="btn btn-danger">Logout</a>
        </div>
    <?php endif; ?>

    <h2 class="text-center">Task List</h2>
    <div class="d-flex justify-content-end mb-3">
        <a href="<?= base_url('index.php/task/create') ?>" class="btn btn-primary">Create New Task</a>
    </div>


	<form method="GET" action="<?= base_url('index.php/task/list') ?>" class="d-flex justify-content-between mb-3">
		
    <input type="text" class="form-control w-25" name="title" id="title" value="<?= isset($title) ? $title : ''; ?>">

    <select name="status" class="form-control w-25">
        <option value="">All Statuses</option>
        <option value="pending" <?= isset($status) && $status == 'pending' ? 'selected' : ''; ?>>Pending</option>
        <option value="in-progress" <?= isset($status) && $status == 'in-progress' ? 'selected' : ''; ?>>In-Progress</option>
        <option value="completed" <?= isset($status) && $status == 'completed' ? 'selected' : ''; ?>>Completed</option>
    </select>

    <select name="priority" class="form-control w-25">
        <option value="">All Priorities</option>
        <option value="low" <?= isset($priority) && $priority == 'low' ? 'selected' : ''; ?>>Low</option>
        <option value="medium" <?= isset($priority) && $priority == 'medium' ? 'selected' : ''; ?>>Medium</option>
        <option value="high" <?= isset($priority) && $priority == 'high' ? 'selected' : ''; ?>>High</option>
    </select>

    <div class="d-flex">
        <button type="submit" class="btn btn-primary ml-2">Filter</button>
        <a href="<?= base_url('index.php/task/list') ?>" class="btn btn-secondary ml-2">Reset</a>
    </div>
</form>


    
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Priority</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $counter = 1; ?>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?php echo $counter++; ?></td>
                        <td><?= $task['title'] ?></td>
                        <td><?= $task['priority'] ?></td>
                        <td><?= $task['due_date'] ?></td>
                        <td><?= $task['status'] ?></td>
                        <td><?= $task['description'] ?></td>
                        <td>
                            <a href="<?= base_url('index.php/task/edit/' . $task['id']) ?>"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('index.php/task/view/' . $task['id']) ?>"><i class="fas fa-eye"></i></a>
                            <a href="<?= base_url('index.php/task/delete/' . $task['id']) ?>" onclick="return confirm('Are you sure you want to delete this task?');"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
