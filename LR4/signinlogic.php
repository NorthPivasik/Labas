<?php
session_start();

include 'connect.php';

$password = md5($_POST["login_password"]);
$login = $_POST["login_login"];

$stmt = $pdo->query("SELECT * FROM users WHERE password = '$password' AND login = '$login'");
$userz = $stmt->fetchAll();


if (!empty($userz)) {
    $user = $userz[0];
    $_SESSION['login'] = $user['login'];
    header("Location: bikes.php");
} else {
    $_SESSION['message'] = "Неверный логин или пароль";
}