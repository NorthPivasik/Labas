<?php require_once('logic.php'); ?>

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
<div class="goods-navbar">
        <div class="container">
            <div class="nav">
                <div class="nav-item"><a class="nav-item-subdirectory text-primary">Распродажа%</a></div>
                <div class="nav-item"><a class="nav-item-subdirectory text-warning">Акции</a></div>
                <div class="nav-item"><a class="nav-item-subdirectory">Контакты</a></div>
                <div class="nav-item"><a class="nav-item-subdirectory">Покупателям</a></div>
                <div class="nav-item"><a class="nav-item-subdirectory">Доставка и оплата</a></div>
                <div class="nav-item"><a class="nav-item-subdirectory">Youtube</a></div>
            </div>
        </div>
    </div>
    <div class="container">
        <ul class="nav justify-content-between" style="align-items: center;">
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
        <ul class="nav">
            <li class="nav-item"><a class="nav-item-subdirectory2 text-primary">Велосипеды</a></li>
            <li class="nav-item"><a class="nav-item-subdirectory2">Аксессуары</a></li>
            <li class="nav-item"><a class="nav-item-subdirectory2">Запчасти</a></li>
            <li class="nav-item"><a class="nav-item-subdirectory2">Экипировка</a></li>
            <li class="nav-item"><a class="nav-item-subdirectory2">Инструменты</a></li>
            <li class="nav-item"><a class="nav-item-subdirectory2">Самокаты</a></li>
            <li class="nav-item"><a class="nav-item-subdirectory2">Веломастерская</a></li>
        </ul>
    </div>
    <br>
    <form action="" id="form" method="GET">
        <div class="container gap10down">
            <div class="center w-100">Фильтрация результата поиска</div>
            <div class="center w-100">По цене:</div>
            <input type="text" name="cost1" placeholder="Цена от" class="w-100">
            <input type="text" name="cost2" placeholder="Цена до" class="w-100">
            <div class="center w-100">Фильтрация по бренду:</div>
            <select name="type" type="text" class="w-100">
                <option value="">Любой</option>
                <?php 
                    foreach($selectA as $items) {
                        ?>
                            <option value="<?php echo $items['id']; ?>"><?php echo $items['typename']; ?></option>
                        <?php
                    }
                ?>
            </select>
            <div class="center w-100">Фильтрация по описанию</div>
            <input type="text" name="description" placeholder="Введите описание товара" class="w-100">
            <div class="center w-100">Фильтрация по наименованию</div>
            <input type="text" name="name" placeholder="Введите наименование товара" class="w-100">
            <div class="center gap10">
                <button type="submit" class="bBtn">Применить фильтр</button>
                <button type="submit" class="rBtn" onclick="document.getElementById("form").reset();">Очистить фильтр</input>
            </div>
            <div></div>
        </div>
    </form>
    <table class="table table-bordered container">
        <thead>
            <tr>
                <th>Изображение</th>
                <th>Название</th>
                <th>Тип</th>
                <th>Описание</th>
                <th>Цена</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($data as $items) {
                    ?>
                    <tr>
                        <td><img src="img/<?= $items['img_path']; ?>" class="w-100"></td>
                        <td><?= $items['bikename']; ?></td>
                        <td><?= $items['typename']; ?></td>
                        <td><?= $items['bikedescription']; ?></td>
                        <td><?= $items['cost']; ?></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>