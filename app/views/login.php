<?php include 'header.php'; ?>

<?php
//session_start();

require_once '../src/Auth/LoginController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = (new \app\Auth\LoginController())->loginUser($_POST);
}
?>

    <body>
    <div class="containerbox">
        <h2 class="text-center mb-4">Login</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="button" id="loginBtn" class="btn btn-primary btn-block">Login</button>
        </form>
        <div class="text-center mt-3">
            <p>Don't have an account? <a href="#" id="registerHereLink">Register here</a>.</p>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            $('#loginBtn').click(function () {
                var username = $('#username').val();
                var password = $('#password').val();

                $.ajax({
                    type: 'POST',
                    url: 'login',
                    data: {
                        username: username,
                        password: password
                    },
                    success: function (response) {
                        var result = JSON.parse(response);
                        if (result.result === true) {
                            window.location.href = 'currency';
                        } else {
                            alert('неправильное имя пользователя или пароль!');
                        }
                    }
                });
            });

            $('#registerHereLink').click(function (e) {
                e.preventDefault();
                window.location.href = 'registration';
            });
        });
    </script>

<?php include 'footer.php'; ?>