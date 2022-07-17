<?php

require_once 'config/config.php';

$position = $_POST["position"];
$salary = $_POST["salary"];
$allowance = $_POST["allowance"];

if (isset($position)) {
    if (empty($position) || empty($salary) || empty($allowance)) {
        $error = ['emptyfields' => 'Please fill in all the fields'];
        echo json_encode($error);
        exit();
    } else {


            $sql = "SELECT position  FROM allowance_tbl WHERE position=?"; //checks if name is taken
            $stmt = $dbh->prepare($sql);

            $stmt->execute([$position]);
            $rowCount = $stmt->rowCount(); //get row count

            if ($rowCount > 0) {
                $error = ['nametaken' => 'Allowance already existing'];
                echo json_encode($error);
                exit();
            } else {

                $sql = "INSERT INTO allowance_tbl (position, salary, allowance) VALUES (?,?,?)";
                $stmt = $dbh->prepare($sql);

                $stmt->execute([$position , $salary , $allowance]);

                $error = ['success' => 'success'];
                echo json_encode($error);
                exit();
            }
            exit();
        
    }
} else {
    header("Location: /AMK/admin-allowance-manage"); /* Redirect browser */
}
