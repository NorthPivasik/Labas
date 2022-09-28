<style>
<?php
    include "style.css";
    function func2() {
        $con = mysqli_connect("localhost", "root", "", "bikesdb");

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

        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) > 0) {
            foreach($query_run as $items) {
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
        }
    }

    function select() {
        $conn = mysqli_connect("localhost", "root", "", "bikesdb");

        $queryy = "SELECT * FROM types";

        $query_runn = mysqli_query($conn, $queryy);
        ?><option value="">Любой</option> <?php
        if(mysqli_num_rows($query_runn) > 0) {
            foreach($query_runn as $itemss) {
                ?>
                    <option value="<?php echo $itemss['id'] ?>"><?php echo $itemss['typename'] ?></option>
                <?php
            }
        }
        $conn -> close();
    }
?>
</style>