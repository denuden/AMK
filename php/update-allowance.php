<?php

require_once 'config/config.php';

$id = $_POST['id'];
$position = $_POST["position"];
$salary = $_POST["salary"];
$allowance = $_POST["allowance"];

if (isset($position)) {
    if (empty($position) || empty($salary) || empty($allowance)) {
        $error = ['emptyfields' => 'Please fill in all the fields'];
        echo json_encode($error);
        exit();
    } else {
        // test real name
        $sql = "SELECT position FROM allowance_tbl WHERE id = '$id'" ;
        $query = $dbh->query($sql);
        $row = $query->fetch();
     
        // test all name
        $sql = "SELECT * FROM allowance_tbl WHERE position = '$position'"; 
        $query = $dbh->query($sql);
        $rowCount= $query->rowCount();

        if (strtolower($position) == strtolower($row['position'])) {
            $sql = "UPDATE allowance_tbl
            SET 
            position = ?,
             salary = ?,
             allowance = ?
            WHERE id = ?";
            $stmt = $dbh->prepare($sql);

            $stmt->execute([$position, $salary, $allowance, $id]);

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
                    position = ?,
                    salary = ?,
                    allowance = ?
                    WHERE id = ?";
                    $stmt = $dbh->prepare($sql);

                    $stmt->execute([$position, $salary, $allowance, $id]);

                    $error = ['success' => 'success'];
                    echo json_encode($error);
                    exit();
            }
        }

        
    }
} else {
    header("Location: /AMK/admin-allowance-manage"); /* Redirect browser */
}
