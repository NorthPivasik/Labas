<?php
    if (isset($_POST['export'])) {
        require_once "connect.php";

        header('Content-Disposition: attachment; filename=bikes_exported.csv');  
        $output = fopen("php://output", "w");
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));  
        $stmt = $pdo->query("SELECT * FROM bikes");
        while ($row = $stmt->fetch()) {   
            fputcsv($output, $row);
        } 
        fclose($output);
        error_reporting(E_ERROR | E_PARSE);        
    }
?>