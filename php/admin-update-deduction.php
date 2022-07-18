<?php

require_once 'config/config.php';

$status= $_POST["status"];
$id = $_POST['id'];
$amount = $_POST['amount'];


if (isset($status)) {
        $sql = "UPDATE deduction_tbl SET status = ?, deduction = ? WHERE employee_id = ?";
        $stmt = $dbh->prepare($sql);

        $stmt->execute([$status, $amount, $id ]);

        $error = ['success' => 'success'];
        echo json_encode($error);
        exit();
            
} else {
    header("Location: /AMK/admin-deduction-manage.php"); /* Redirect browser */
}
