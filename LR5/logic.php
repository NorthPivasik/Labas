<?php
    include 'connect.php';

    $queryCond = array();
    if (isset($_GET['cost1']) && $_GET['cost1'] != "") array_push($queryCond, "cost > :cost1GET");
    if (isset($_GET['cost2']) && $_GET['cost2'] != "") array_push($queryCond, "cost < :cost2GET");
    if (isset($_GET['type']) && $_GET['type'] != "") array_push($queryCond, "biketype LIKE :typeGET");
    if (isset($_GET['description']) && $_GET['description'] != "") array_push($queryCond, "bikedescription LIKE :descGET");
    if (isset($_GET['name']) && $_GET['name'] != "") array_push($queryCond, "bikename LIKE :nameGET");

    $query = "SELECT img_path, bikename, types.typename, bikedescription, cost FROM bikes INNER JOIN types on bikes.biketype = types.id ";
    if (!empty($queryCond)) $query = $query . "WHERE  " . implode(" AND ", $queryCond);

    $stmt = $pdo->prepare($query);
    if (isset($_GET['cost1']) && $_GET['cost1'] != "") $stmt->bindValue('cost1GET', $_GET['cost1'], PDO::PARAM_INT);
    if (isset($_GET['cost2']) && $_GET['cost2'] != "") $stmt->bindValue('cost2GET', $_GET['cost2'], PDO::PARAM_INT);
    if (isset($_GET['type']) && $_GET['type'] != "") $stmt->bindValue('typeGET', $_GET['type'], PDO::PARAM_STR);
    if (isset($_GET['description']) && $_GET['description'] != "") $stmt->bindValue('descGET', '%' . $_GET['description'] . '%', PDO::PARAM_STR);
    if (isset($_GET['name']) && $_GET['name'] != "") $stmt->bindValue('nameGET', '%' . $_GET['name'] . '%', PDO::PARAM_STR);
    $stmt->execute();
    $data = array();
    
    while ($row = $stmt->fetch()) {
        array_push($data, $row);
    }

    $selectA = array();

    $stmt = $pdo->query("SELECT * FROM types");
    while ($row = $stmt->fetch()) {
        array_push($selectA, $row);
    }