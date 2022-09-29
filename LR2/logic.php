<?php
    $host = 'localhost';
    $db   = 'bikesdb';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);

    $stmt = $pdo->query('SELECT * FROM bikes');

    $queryCond = "WHERE ";
    $bool = false;

    if (isset($_GET['cost1']) && $_GET['cost1'] != "") {
        $queryCond = $queryCond . "cost > " . $_GET['cost1'];
        $bool = true;
    }

    if (isset($_GET['cost2']) && $_GET['cost2'] != "") {
        if ($bool) $queryCond = $queryCond . " AND ";
        $bool = true;
        $queryCond = $queryCond . "cost < " . $_GET['cost2'];
    }

    if (isset($_GET['type']) && $_GET['type'] != "") {
        if ($bool) $queryCond = $queryCond . " AND ";
        $bool = true;
        $queryCond = $queryCond . "biketype LIKE " . $_GET['type'];
    }

    if (isset($_GET['description']) && $_GET['description'] != "") {
        if ($bool) $queryCond = $queryCond . " AND ";
        $bool = true;
        $valuedesc = $_GET['description'];
        $queryCond = $queryCond . "bikedescription LIKE '%$valuedesc%'";
    }

    if (isset($_GET['name']) && $_GET['name'] != "") {
        if ($bool) $queryCond = $queryCond . " AND ";
        $bool = true;
        $valuename = $_GET['name'];
        $queryCond = $queryCond . "bikename LIKE '%$valuename%'";
    }

    $query = "SELECT img_path, bikename, types.typename, bikedescription, cost FROM bikes INNER JOIN types on bikes.biketype = types.id ";
    if ($bool) $query = $query . $queryCond;

    $stmt = $pdo->query($query);
    $data = array();
    
    while ($row = $stmt->fetch()) {
        array_push($data, $row);
    }

    $selectA = array();

    $stmt = $pdo->query("SELECT * FROM types");
    while ($row = $stmt->fetch()) {
        array_push($selectA, $row);
    }
?>