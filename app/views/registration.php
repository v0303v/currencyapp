<?php include 'header.php';?>
<body>

<div class="containerbox">
    <h2 class="text-center mb-4">Register</h2>
    <form action="#" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
        </div>

        <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>
</div>

<?php include 'footer.php';?>
