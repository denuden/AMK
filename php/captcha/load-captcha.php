<?php
require_once '../config/config.php';
session_start();
if (isset($_SESSION['tempadminid']) || isset($_SESSION['tempemployeeid'])) {
    $sql  = 'SELECT * FROM captcha_tbl';

    $query = $dbh -> query($sql);
    $rowCount = $query -> rowCount();

    if ($rowCount > 0) {
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(['success' => $row]);
        exit();
    } else{
        $error = ["unavailable" => "Unavalable Captcha"];
        echo json_encode($error);
        exit();
    }
} else {
    $error = ["unavailable" => "Unavalable Captcha"];
    echo json_encode($error);
}

?>