<?php require_once "importlogic.php" ?>

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
    <?php require_once "shapka.php"; ?>
    <form method="POST" class="mt-5 container" action="">
        <label>Ссылка на файл</label>
        <input type="text" name="url_link" class="form-control w-100 mt-2">
        <button type="submit" name="import" value="1" class="btn btn-success mt-2">Импорт</button>
        <?php 
        if(isset($_POST['import'])) import_file(); ?>
    </form>
</body>
</html>