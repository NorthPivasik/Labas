<?php 
    require_once "textlogic.php";
    require_once "presets.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php require_once "shapka.php"; ?>
    <div class="container">
        <br>
        <form method="GET">
            <button type="submit" name="preset" value="1" class="btn btn-dark">Preset 1</button>
            <button type="submit" name="preset" value="2" class="btn btn-dark">Preset 2</button>
            <button type="submit" name="preset" value="3" class="btn btn-dark">Preset 3</button>
        </form>
        <br>
        <form method="POST" action="text.php">
            <textarea type="text" id="textarea" name="textarea" class="w-100 form-control" style="height: 500px;"><?php echo $text; ?></textarea>
            <br>
            <button type="submit" name="lesgooo" class="btn btn-secondary">Отправить</button>
            <button type="submit" name="clear" class="btn btn-danger">Очистить</button>
        </form>
        <br>
        <?php 
            if (isset($_POST['lesgooo'])) {
                task2($xml);
                ?> <div style="height: 200px;"></div> <?php
                task6($xml);
                ?> <div style="height: 200px;"></div> <?php
                task15($xml);
                ?> <div style="height: 200px;"></div> <?php
                task19($xml);
            } 
        ?>
    </div>
</body>
</html>