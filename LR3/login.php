<?php
    if (!empty($_POST['log'])) require_once('signinlogic.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php require_once('shapka.php'); ?>
    <br><br>
    <?php 
        if (empty($_SESSION['login'])) {
            ?>
            <div class="container">
                <form method="POST">
                    <div class="d-flex justify-content-center w-100">
                        <div class="w-50 gap10down">
                            <br>
                            <div>Логин/почта</div>
                            <div class="d-flex justify-content-center">
                                <input class="w-100 form-control" placeholder="example@example.com" name="login_login">
                            </div>
                            <div>Пароль</div>
                            <div class="d-flex justify-content-center">
                                <input type="password" class="w-100 form-control" placeholder="********" name="login_password">
                            </div>
                            <?php if (!empty($_POST['log'])) echo $_SESSION['message']; ?>
                            <div class="w-100 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary w-50" name="log" value="1">Войти</button>
                            </div>
                            <div class="w-100 d-flex justify-content-center">Ещё нет аккаунта?&ensp;<a href="signup.php">Зарегистрируйтесь</a></div>
                        </div>
                    </div>
                </form>
            </div>
            <?php
        } else {
            ?>
                <div>Вы вошли как &ensp;<?php echo $_SESSION['login'] ?>.</div>
            <?php
        }
    ?> 
    
</body>
</html>