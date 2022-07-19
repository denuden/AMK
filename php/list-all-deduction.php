<?php
require_once 'config/config.php';



if (isset($_GET['id'])) {
    $sql ="SELECT * FROM deduction_tbl WHERE employee_id = '". $_GET['id'] ."' AND status = 'Approved' ";
    $query = $dbh -> query($sql);

    $rowCount=$query->rowCount();

    if ($rowCount > 0) {
        $row = $query->fetchAll();
        echo json_encode(['success' => $row]);
        exit();
    } else{
        $row = array();
        $error = ["success" => $row];
        echo json_encode($error);
        exit();
    }
} else {
    header("Location: /AMK/admin-payroll-manage"); /* Redirect browser */
}

?>