<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/LR67/db.php");
    
    class TableModule {
        protected function __construct() {}

        protected function __clone() {}

        public function __wakeup() {
            throw new \BadMethodCallException("Unable to deserialize database connection");
        }

        private static function err_msg($text) {
            echo "<div class='container text-danger fs-4 fw-bold'>$text</div>";
        }

        public static function check_img() {
            if (!isset($_FILES['img'])) {
                return false;
            }

            if (empty($_FILES)) {
                return false;
            }

            if (!file_exists($_FILES['img']['tmp_name']) || !is_uploaded_file($_FILES['img']['tmp_name'])) {
                return false;
            }

            $whitelist = array("image/png", "image/jpg", "image/jpeg");
            if (!in_array($_FILES['img']['type'], $whitelist)) {
                return false;
            }

            if ($_FILES['img']['size'] > 1024000) {
                return false;
            }
            

            $uploadfile = $_SERVER['DOCUMENT_ROOT'] . "/LR67/img/" . $_FILES['img']['name'];
            move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
            return true;
        }

        public static function create_record() {
            if (isset($_POST['create'])) {
                $img_path = (isset($_FILES['img']['name'])) ? $_FILES['img']['name'] : "";
                $name = (isset($_POST['name'])) ? $_POST['name'] : "";
                $type = (isset($_POST['type'])) ? $_POST['type'] : "";
                $description = (isset($_POST['description'])) ? $_POST['description'] : "";
                $cost = (isset($_POST['cost'])) ? intval($_POST['cost']) : "";

                if (!ctype_digit($cost) || $cost < 0) {
                    TableModule::err_msg("Цена должна быть цифрой и больше нуля");
                    return;
                }
                if (!TableModule::check_img()) {
                    TableModule::err_msg("Невозможно загрузить картинку");
                    return;
                }

                $stmt = Database::prepare("INSERT INTO bikes (img_path, bikename, biketype, bikedescription, cost) VALUES (:i, :n, :t, :d, :c)");
                $stmt->bindValue(":i", $img_path, PDO::PARAM_STR);
                $stmt->bindValue(":n", $name, PDO::PARAM_STR);
                $stmt->bindValue(":t", $type, PDO::PARAM_INT);
                $stmt->bindValue(":d", $description, PDO::PARAM_STR);
                $stmt->bindValue(":c", $cost, PDO::PARAM_INT);
                $stmt->execute();
                header("Location: index.php");
            }
        }

        public static function delete_record() {
            if (isset($_POST['delete'])) {
                $id = intval($_POST['delete']);
                $stmt = Database::query("SELECT img_path FROM bikes WHERE id = $id");
                $img_p = $stmt->fetch()['img_path'];
                
                $file = $_SERVER['DOCUMENT_ROOT'] . "/LR67/img/" . $img_p;
                unlink($file);

                Database::query("DELETE FROM bikes WHERE id = $id");
                header("Location: index.php");
            }
        }

        public static function izmenit_record() {
            if (isset($_POST['update'])) {
                $id = $_POST['update'];
                $img_path = (isset($_FILES['img']['name'])) ? $_FILES['img']['name'] : "";
                $name = (isset($_POST['name'])) ? $_POST['name'] : "";
                $type = (isset($_POST['type'])) ? $_POST['type'] : "";
                $description = (isset($_POST['description'])) ? $_POST['description'] : "";
                $cost = (isset($_POST['cost'])) ? intval($_POST['cost']) : "";

                if (!ctype_digit($cost) || $cost < 0) {
                    TableModule::err_msg("Цена должна быть цифрой и больше нуля");
                    return;
                }
                
                $stmt = Database::prepare("UPDATE bikes SET bikename = :n, biketype = :t, bikedescription = :d, cost = :c WHERE id = :id");
                $stmt->bindValue(":n", $name, PDO::PARAM_STR);
                $stmt->bindValue(":t", $type, PDO::PARAM_INT);
                $stmt->bindValue(":d", $description, PDO::PARAM_STR);
                $stmt->bindValue(":c", $cost, PDO::PARAM_INT);
                $stmt->bindValue(":id", $id, PDO::PARAM_INT);
                $stmt->execute();


                if ($img_path != "") {
                    $stmt = Database::prepare("SELECT img_path FROM bikes WHERE id = :id");
                    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
                    $stmt->execute();
                    $dat = $stmt->fetch();

                    if (!TableModule::check_img()) {
                        TableModule::err_msg("Невозможно загрузить картинку");
                        return;
                    }

                    unlink($_SERVER['DOCUMENT_ROOT'] . "/LR67/img/" . $dat['img_path']);

                    $stmt = Database::prepare("UPDATE bikes SET img_path = :i WHERE id = :id");
                    $stmt->bindValue(":i", $img_path, PDO::PARAM_STR);
                    $stmt->bindValue(":id", $id, PDO::PARAM_INT);
                    $stmt->execute();
                }
                header("Location: index.php");
            }
        }

        public static function start() {
            TableModule::create_record();
            TableModule::delete_record();
            TableModule::izmenit_record();
            $stmt = Database::query("SELECT bikes.id, img_path, bikename, typename, bikedescription, cost FROM bikes INNER JOIN types ON biketype = types.id");
            $data = $stmt->fetchAll();
            $stmt = Database::query("SELECT id, typename FROM types");
            $types = $stmt->fetchAll();
            return array($data, $types);
        }
    }

    function convert_select($text) {
        switch($text) {
            case "Горный": return 1;
            case "Экстремальный": return 2;
            case "Комфортный": return 3;
            case "Складной": return 4;
            case "Детский": return 5;
            default: return 1;
        }
    }
?>