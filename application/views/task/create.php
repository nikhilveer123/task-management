
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-4">
        <h2>Create New Task</h2>
		<form action="<?= base_url('index.php/task/store') ?>" method="post">
        <div class="form-row mb-3">
            <div class="form-group col-md-6">
                <label for="title">Task Title</label>
                <input type="text" class="form-control" name="title" id="title" value="<?php echo set_value('title'); ?>" placeholder="Task Title">
                <?php echo form_error('title', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>
        <div class="form-row mb-3">
            <div class="form-group col-md-6">
                <label for="priority">Priority</label>
                <select name="priority" class="form-control" id="priority" required>
                    <option value="low" <?php echo set_select('priority', 'low'); ?>>Low</option>
                    <option value="medium" <?php echo set_select('priority', 'medium'); ?>>Medium</option>
                    <option value="high" <?php echo set_select('priority', 'high'); ?>>High</option>
                </select>
                <?php echo form_error('priority', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>      
        <div class="form-row mb-3">
            <div class="form-group col-md-6">
                <label for="due_date">Due Date</label>
                <input type="date" class="form-control" name="due_date" id="due_date" value="<?php echo set_value('due_date'); ?>" required>
                <?php echo form_error('due_date', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

        <div class="form-row mb-3">
            <div class="form-group col-md-6">
                <label for="status">Status</label>
                <select name="status" class="form-control" id="status" required>
                    <option value="pending" <?php echo set_select('status', 'pending'); ?>>Pending</option>
                    <option value="in-progress" <?php echo set_select('status', 'in-progress'); ?>>In Progress</option>
                    <option value="completed" <?php echo set_select('status', 'completed'); ?>>Completed</option>
                </select>
                <?php echo form_error('status', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

		<div class="form-row mb-3">
            <div class="form-group col-md-6">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" placeholder="Description" required><?php echo set_value('description'); ?></textarea>
                <?php echo form_error('description', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

        <div class="form-row mb-3">
            <button type="submit" class="btn btn-primary">Create Task</button>
        </div>
		</form>
    </div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>

