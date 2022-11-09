<?php

if (!empty($_POST['reg'])) require_once('signuplogic.php');

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
    <div class="container">
        <form method="POST">
            <div class="d-flex justify-content-center w-100">
                <div class="w-50 gap10down">
                    <br>
                    <div>Логин/Почта</div>
                    <div class="d-flex justify-content-center">
                        <input type="text" class="w-100 form-control" placeholder="Ваш логин/почта" name="login" value="<?php
                            if (isset($_POST['login'])) echo $_POST['login']; ?>">
                    </div>
                    <div>Пароль</div>
                    <div class="d-flex justify-content-center">
                        <input type="password" class="w-100 form-control" placeholder="Совершенно секретно" name="password">
                    </div>
                    <div>Подтвердить пароль</div>
                    <div class="d-flex justify-content-center">
                        <input type="password" class="w-100 form-control" placeholder="Совершенно секретно" name="password_confirm">
                    </div>
                    <div>ФИО</div>
                    <div class="d-flex justify-content-center">
                        <input class="w-100 form-control" placeholder="Ваши ФИО" name="fullname" value="<?php
                            if (isset($_POST['fullname'])) echo $_POST['fullname']; ?>">
                    </div>
                    <div>Дата рождения</div>
                    <div class="d-flex justify-content-center">
                        <input type="date" name="birthday" class="form-control" placeholder="Ваша дата рождения" value="<?php
                            if (isset($_POST['birthday'])) echo $_POST['birthday']; ?>">
                        >
                    </div>
                    <div>Адрес</div>
                    <div class="d-flex justify-content-center">
                        <input class="w-100 form-control" placeholder="Ваша адрес" name="address" value="<?php
                            if (isset($_POST['address'])) echo $_POST['address']; ?>">
                    </div>
                    <div>Пол</div>
                    <select name="gender" class="form-select" placeholder="Ваш пол" name="gender">
                            <option value="Мужской" <?php if (isset($_POST['gender']) && $_POST['gender'] == "Мужчина") echo 'selected'; ?>>Мужской</option>
                            <option value="Женский" <?php if (isset($_POST['gender']) && $_POST['gender'] == "Женский") echo 'selected'; ?>>Женский</option>
                    </select>
                    <div>Интересы</div>
                    <div class="d-flex justify-content-center">
                        <input class="w-100 form-control" placeholder="Ваши интересы" name="hobby" value="<?php
                            if (isset($_POST['hobby'])) echo $_POST['hobby']; ?>">
                    </div>
                    <div>Ссылка на профиль ВК</div>
                    <div class="d-flex justify-content-center">
                        <input class="w-100 form-control" placeholder="vk.com/11111111" name="vk_link" value="<?php
                            if (isset($_POST['vk_link'])) echo $_POST['vk_link']; ?>">
                    </div>
                    <div>Группа крови</div>
                    <select class="form-select" name="blood_type">
                        <option value="I" <?php if (isset($_POST['blood_type']) && $_POST['blood_type'] == "I") echo 'selected'; ?>>I (0)</option>
                        <option value="II" <?php if (isset($_POST['blood_type']) && $_POST['blood_type'] == "II") echo 'selected'; ?>>II (А)</option>
                        <option value="III" <?php if (isset($_POST['blood_type']) && $_POST['blood_type'] == "III") echo 'selected'; ?>>III (В)</option>
                        <option value="IV" <?php if (isset($_POST['blood_type']) && $_POST['blood_type'] == "IV") echo 'selected'; ?>>IV (АВ)</option>
                    </select>
                    <div>Резус-фактор</div>
                    <select name="rh_factor" class="form-select">
                        <option value="+" <?php if (isset($_POST['rh_factor']) && $_POST['rh_factor'] == "+") echo 'selected'; ?>>+</option>
                        <option value="-" <?php if (isset($_POST['rh_factor']) && $_POST['rh_factor'] == "-") echo 'selected'; ?>>-</option>
                    </select>
                    <br>
                    <?php if (!empty($_POST['reg'])) echo $_SESSION['message']; ?>
                    <div class="w-100 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-50" name="reg" value="1">Зарегистрироваться</button>
                    </div>
                    <div class="w-100 d-flex justify-content-center">Уже есть аккаунт?&ensp;<a href="login.php">Авторизируйтесь</a></div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>