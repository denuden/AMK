<?php

require_once 'config/config.php';

$name = $_POST["name"];
$description = $_POST["description"];
$amount = $_POST["amount"];

if (isset($name)) {
    if (empty($name) || empty($description) || empty($amount)) {
        $error = ['emptyfields' => 'Please fill in all the fields'];
        echo json_encode($error);
        exit();
    } else {


            $sql = "SELECT name FROM allowance_tbl WHERE name=?"; //checks if name is taken
            $stmt = $dbh->prepare($sql);

            $stmt->execute([$name]);
            $rowCount = $stmt->rowCount(); //get row count

            if ($rowCount > 0) {
                $error = ['nametaken' => 'Allowance already existing'];
                echo json_encode($error);
                exit();
            } else {

                $sql = "INSERT INTO allowance_tbl (name, description, amount) VALUES (?,?,?)";
                $stmt = $dbh->prepare($sql);

                $stmt->execute([$name, $description, $amount]);

                $error = ['success' => 'success'];
                echo json_encode($error);
                exit();
            }
            exit();
        
    }
} else {
    header("Location: /AMK/admin-allowance-manage"); /* Redirect browser */
}
