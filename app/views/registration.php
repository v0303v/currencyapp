<?php include 'header.php';?>

<body>

<div class="containerbox">
    <h2 class="text-center mb-4">Регистрация</h2>
    <form action="" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Имя пользователя</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Подтвердите пароль</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
        </div>

        <button type="button" class="btn btn-primary btn-block" id="registerBtn">Сохранить</button>
        <button type="button" class="btn btn-secondary btn-block" id="cancelBtn">Отмена</button>
    </form>
</div>


<script>
    $(document).ready(function() {
        $('#registerBtn').click(function() {
            var username = $('#username').val();
            var password = $('#password').val();
            var confirmPassword = $('#confirmPassword').val();

            if (username === '' || password === '' || confirmPassword === '') {
                alert('Пустые поля!');
                return;
            }

            if (password !== confirmPassword) {
                alert('Пароли не совпадают!');
                return;
            }

            $.ajax({
                type: 'POST',
                url: 'register',
                data: {
                    username: username,
                    password: password
                },
                success: function(response) {
                    var resultMessage = JSON.parse(response).result;
                    alert(resultMessage);
                }
            });
        });

        $('#cancelBtn').click(function() {
            window.location.href = '/';
        });
    });
</script>

<?php include 'footer.php';?>
