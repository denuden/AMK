<?php

require_once 'config/config.php';

$id = $_POST['id'];
$name = $_POST["name"];
$description = $_POST["description"];
$amount = $_POST["amount"];

if (isset($name)) {
    if (empty($name) || empty($description) || empty($amount)) {
        $error = ['emptyfields' => 'Please fill in all the fields'];
        echo json_encode($error);
        exit();
    } else {
        // test real name
        $sql = "SELECT name FROM allowance_tbl WHERE id = '$id'" ;
        $query = $dbh->query($sql);
        $row = $query->fetch();
     
        // test all name
        $sql = "SELECT * FROM allowance_tbl WHERE name = '$name'"; 
        $query = $dbh->query($sql);
        $rowCount= $query->rowCount();

        if (strtolower($name) == strtolower($row['name'])) {
            $sql = "UPDATE allowance_tbl
            SET 
             name = ?,
             description = ?,
             amount = ?
            WHERE id = ?";
            $stmt = $dbh->prepare($sql);

            $stmt->execute([$name, $description, $amount, $id]);

            $error = ['success' => 'success'];
            echo json_encode($error);
            exit();
        }else {
            if ($rowCount > 0) {
                $error = ['nametaken' => 'Allowance already existing'];
                echo json_encode($error);
                exit();
            } else {

                $sql = "UPDATE allowance_tbl
                    SET 
                    name = ?,
                    description = ?,
                    amount = ?
                    WHERE id = ?";
                    $stmt = $dbh->prepare($sql);

                    $stmt->execute([$name, $description, $amount, $id]);

                    $error = ['success' => 'success'];
                    echo json_encode($error);
                    exit();
            }
        }

        
    }
} else {
    header("Location: /AMK/admin-allowance-manage"); /* Redirect browser */
}
