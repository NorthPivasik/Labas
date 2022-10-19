<?php
    include 'connect.php';

    $cond = array(false, false, false, false, false);
    $indexes = array('cost1', 'cost2', 'type', 'description', 'name');

    for ($i = 0; $i < sizeof($cond); $i++) {
        if (isset($_GET[$indexes[$i]]) && $_GET[$indexes[$i]] != "") 
            $cond[$i] = true;
    }

    function condIncludesTrue($index) {
        $condit = $GLOBALS['cond'];
        for ($i = 0; $i < $index; $i++) {
            if ($condit[$i]) return true;
        }
        return false;
    }

    $queryCond = "WHERE ";

    if ($cond[0]) $queryCond = $queryCond . "cost > :cost1GET";

    if ($cond[1]) {
        if (condIncludesTrue(1)) $queryCond = $queryCond . " AND ";
        $queryCond = $queryCond . "cost < :cost2GET";
    }

    if ($cond[2]) {
        if (condIncludesTrue(2)) $queryCond = $queryCond . " AND ";
        $queryCond = $queryCond . "biketype LIKE :typeGET";
    }

    if ($cond[3]) {
        if (condIncludesTrue(3)) $queryCond = $queryCond . " AND ";
        $queryCond = $queryCond . "bikedescription LIKE :descGET";
    }

    if ($cond[4]) {
        if (condIncludesTrue(4)) $queryCond = $queryCond . " AND ";
        $queryCond = $queryCond . "bikename LIKE :nameGET";
    }

    $query = "SELECT img_path, bikename, types.typename, bikedescription, cost FROM bikes INNER JOIN types on bikes.biketype = types.id ";
    if (condIncludesTrue(5)) $query = $query . $queryCond;

    $stmt = $pdo->prepare($query);
    if ($cond[0]) $stmt->bindValue('cost1GET', $_GET['cost1'], PDO::PARAM_INT);
    if ($cond[1]) $stmt->bindValue('cost2GET', $_GET['cost2'], PDO::PARAM_INT);
    if ($cond[2]) $stmt->bindValue('typeGET', $_GET['type'], PDO::PARAM_STR);
    if ($cond[3]) $stmt->bindValue('descGET', '%' . $_GET['description'] . '%', PDO::PARAM_STR);
    if ($cond[4]) $stmt->bindValue('nameGET', '%' . $_GET['name'] . '%', PDO::PARAM_STR);
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