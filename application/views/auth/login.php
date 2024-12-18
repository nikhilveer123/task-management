<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
     
        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        
        .form-container {
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>

<div class="container">
    <div class="form-container w-50">
	

        <h2 class="text-center">Login</h2>

		<form action="<?= base_url('index.php/auth/login_user') ?>" method="post">
           
            <div class="form-group mb-3">
                <label for="Username">Username</label>
				<input type="text" name="username" class="form-control form-control-sm" placeholder="Username" required><br>
            </div>

            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control form-control-sm" required>
            </div>

            <button type="submit" class="btn btn-primary w-30">Login</button>
			<a href="<?= base_url('index.php/auth/register') ?>" class="btn btn-secondary w-30">Register</a>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
