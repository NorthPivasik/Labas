<?php
    function import_file() {
        require_once "connect.php";

        $url = $_POST['url_link'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $output = curl_exec($ch);
        $curl_info = curl_getinfo($ch);
        curl_close($ch);
        if ($curl_info["http_code"] != "200") {
            echo "<br>Невозможно получить файл, ошибка " . $curl_info['http_code'];
            exit;
        }
        $data = array();
        $i = 0;
        $count = 0;
        foreach(str_getcsv($output) as $info) {
            switch($i) {
                case 1:
                    $data[$count] = array();
                    array_push($data[$count], $info);
                    break;
                case 2:
                case 3:
                case 4:
                    array_push($data[$count], $info);
                    break;
                case 5:
                    $cost = explode(" ", $info);
                    array_push($data[$count], $cost[0]);
                    $count++;
                    break;
                default: break;
            }
            if ($i == 5) $i = 0;
            $i++;            
        }
        $pdo->query("DROP TABLE IF EXISTS bikes_exported");
        $pdo->query("CREATE TABLE bikes_exported (
            id int(11) NOT NULL,
            img_path varchar(45) NOT NULL,
            bikename varchar(45) NOT NULL,
            biketype int(11) NOT NULL,
            bikedescription longtext NOT NULL,
            cost int(11) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
        $pdo->query("ALTER TABLE bikes_exported ADD PRIMARY KEY (id);");
        $pdo->query("ALTER TABLE bikes_exported MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        $query = "INSERT INTO bikes_exported (img_path, bikename, biketype, bikedescription, cost) VALUES (:img0, :name0, :type0, :desc0, :cost0)";
        for ($i = 1; $i < count($data); $i++) {
            $query .= " , (:img$i, :name$i, :type$i, :desc$i, :cost$i)";
        }
        $stmt = $pdo->prepare($query);
        try {
            error_reporting(E_ERROR | E_PARSE);
            for ($i = 0; $i < count($data); $i++) {
                $stmt->bindValue("img$i", $data[$i][0], PDO::PARAM_STR);
                $stmt->bindValue("name$i", $data[$i][1], PDO::PARAM_STR);
                $stmt->bindValue("type$i", intval($data[$i][2]), PDO::PARAM_INT);
                $stmt->bindValue("desc$i", $data[$i][3], PDO::PARAM_STR);
                $stmt->bindValue("cost$i", intval($data[$i][4]), PDO::PARAM_INT);
            }
            $stmt->execute();
        } catch (Exception $e) {
            echo "<br>Невозможно завершить загрузку";
            exit;
        }
        echo "<br>Файл с данными получен из $url и обработан. Создана таблица bikes_exported и $count записей в ней";
    }
?>