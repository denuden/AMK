<?php
require_once 'config/config.php';

if (isset($_GET['id'])) {
    $sql  = 'SELECT * FROM allowance_tbl; WHERE id = '.$_GET['id'];

    $query = $dbh -> query($sql);
    $rowCount = $query -> rowCount();

    if ($rowCount > 0) {
        $row = $query->fetch(PDO::FETCH_ASSOC);
        echo json_encode(['success' => $row]);
        exit();
    } else{
        $error = ["unavailable" => "Unavalable ath the moment"];
        echo json_encode($error);
        exit();
    }
} else {
    header("Location: /AMK/admin-allowance-manage"); /* Redirect browser */
}

?>