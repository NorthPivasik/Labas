<div class="goods-navbar">
    <div class="container">
        <div class="nav w-100">
            <div class="nav-item"><a class="nav-item-subdirectory text-primary">Распродажа%</a></div>
            <div class="nav-item"><a class="nav-item-subdirectory text-warning">Акции</a></div>
            <div class="nav-item"><a class="nav-item-subdirectory">Контакты</a></div>
            <div class="nav-item"><a class="nav-item-subdirectory">Покупателям</a></div>
            <div class="nav-item"><a class="nav-item-subdirectory">Доставка и оплата</a></div>
            <div class="nav-item"><a class="nav-item-subdirectory">Youtube</a></div>
            <div class="nav-item"><a class="nav-item-subdirectory" href="bikes.php">Секретная страница</a></div>
            <?php 
                if (!empty($_SESSION['login'])) {
                    ?>
                        <div class="login d-flex ms-auto">
                            <div>Вы вошли как &ensp;<?php echo $_SESSION['login'] ?>.</div>
                            &ensp;
                            <div><a href="logout.php">Выйти</a></div>
                        </div>
                    <?php
                } else {
                    ?>
                    <div class="login ms-auto">
                        <div>Вы неавторизированы</div>
                        <div><a href="login.php">Ввести логин и пароль</a> или <a href="signup.php">Зарегистрироваться</a></div>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>
<div class="container">
    <ul class="nav justify-content-between w-100 align-items-center">
        <li class="nav-item">
            <img src="img/logo.svg">
        </li>
        <li class="nav-item">
            <input class="form-control" type="search" placeholder="Я ищу..." aria-label="Search">
        </li>
        <li class="nav-item">
            <div style="color: blue; text-decoration: underline;">Волгоград</div>
        </li>
        <li class="nav-item">
            <div class="text-primary" style="font-size: 10px;">Пункт самовывоза: г. Волгоград, ул.<br> Моторная,11Б</div>
        </li>
    </ul>
</div>
<div class="container" style="border-top: 1px solid gray; border-bottom: 1px solid gray;">
    <ul class="nav w-100">
        <li class="nav-item"><a class="nav-item-subdirectory2 text-primary">Велосипеды</a></li>
        <li class="nav-item"><a class="nav-item-subdirectory2">Аксессуары</a></li>
        <li class="nav-item"><a class="nav-item-subdirectory2">Запчасти</a></li>
        <li class="nav-item"><a class="nav-item-subdirectory2">Экипировка</a></li>
        <li class="nav-item"><a class="nav-item-subdirectory2">Инструменты</a></li>
        <li class="nav-item"><a class="nav-item-subdirectory2">Самокаты</a></li>
        <li class="nav-item"><a class="nav-item-subdirectory2">Веломастерская</a></li>
        <li class="nav-item"><a href="text.php" class="nav-item-subdirectory2">Текст</a></li>
    </ul>
</div>