<?php

require_once 'config/config.php';

$mode= $_POST["mode"];
$from = $_POST["from"];
$to = $_POST["to"];
$reason = $_POST["reason"];


if (isset($mode)) {
    if (empty($mode) || empty($from) || empty($to) || empty($reason)) {
        $error = ['emptyfields' => 'Please fill in all the fields'];
        echo json_encode($error);
        exit();
    } else {
     
                $sql = "INSERT INTO deduction_tbl (mode, start, until, reason) VALUES (?,?,?,?)";
                $stmt = $dbh->prepare($sql);

                $stmt->execute([$mode, $from, $to, $reason, ]);

                $error = ['success' => 'success'];
                echo json_encode($error);
                exit();
            }
            exit();
} else {
    header("Location: /AMK/employee-panel-request-status.php"); /* Redirect browser */
}
