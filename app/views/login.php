<?php include 'header.php';?>

<body>

<div class="container">
    <h2 class="text-center mb-4">Login</h2>
    <form action="http://localhost/src/Auth/LoginController.php" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Login</button>

        <div class="text-center mt-3">
            <p>Don't have an account? <a href="">Register here</a>.</p>
        </div>
    </form>
</div>

<?php include 'footer.php';?>