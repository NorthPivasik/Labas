<?php
session_start();

include 'connect.php';

$login = isset($_POST["login"]) ? $_POST["login"] : '';
$password = isset($_POST["password"]) ? $_POST["password"] : "";
$fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : "";
$birthday = isset($_POST["birthday"]) ? $_POST["birthday"] : "";
$address = isset($_POST["address"]) ? $_POST["address"] : "";
$gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
$hobby = isset($_POST["hobby"]) ? $_POST["hobby"] : "";
$vk_link = isset($_POST["vk_link"]) ? $_POST["vk_link"] : "";
$blood_type = isset($_POST["blood_type"]) ? $_POST["blood_type"] : "";
$rh_factor = isset($_POST["rh_factor"]) ? $_POST["rh_factor"] : "";

$space_in_password = false;
for ($i = 0; $i < strlen($password); $i++) {
    if ($password[$i] == ' ') $space_in_password = true;
}
if (!preg_match("/(?=^.{7,}$)(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).*$/", $password) 
    || preg_match("/(?=.[а-яё])(?=.[А-ЯЁ])/", $password) || $space_in_password) {
    $_SESSION['message'] = "Недопустимый формат пароля";
} else if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $login)) {
    $_SESSION['message'] = "Недопустимый формат email";
} else {
    $password_confirm = $_POST["password_confirm"];

    if ($password === $password_confirm) {
        
        $password = md5($password);
        $stmt = $pdo->query("SELECT * FROM users WHERE login = '$login'");
        $check_user = $stmt -> fetchAll();
        if (!empty($check_user)) {
            $_SESSION['message'] = "Такой пользователь уже существует";
        } else {
            $stmt = $pdo->prepare("INSERT INTO users (login, password, fullname, birthday, address, gender, hobby, vk_link, blood_type, rh_factor) VALUES (:login, :password, :fullname, :birthday, :address, :gender, :hobby, :vk_link, :blood_type, :rh_factor)");
            $stmt->bindValue('login', $login, PDO::PARAM_STR);
            $stmt->bindValue('password', $password, PDO::PARAM_STR);
            $stmt->bindValue('fullname', $fullname, PDO::PARAM_STR);
            $stmt->bindValue('birthday', $birthday, PDO::PARAM_STR);
            $stmt->bindValue('address', $address, PDO::PARAM_STR);
            $stmt->bindValue('gender', $gender, PDO::PARAM_STR);
            $stmt->bindValue('hobby', $hobby, PDO::PARAM_STR);
            $stmt->bindValue('vk_link', $vk_link, PDO::PARAM_STR);
            $stmt->bindValue('blood_type', $blood_type, PDO::PARAM_STR);
            $stmt->bindValue('rh_factor', $rh_factor, PDO::PARAM_STR);
            $stmt->execute();
            $_SESSION['message'] = "Регистрация прошла успешно";
            header("Location: login.php");
        }
    } else {
        $_SESSION['message'] = "Пароли не совпадают";
    }
}

if (empty($password)) $_SESSION['message'] = "Заполните пароль";
if (empty($login)) $_SESSION['message'] = "Заполните логин";