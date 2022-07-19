<?php

require_once 'config/config.php';
session_start();
$start = $_POST["start"];
$until = $_POST["until"];
$total_salary = $_POST["total_salary"];
$total_deduction = $_POST["total_deduction"];

$deductions = array();

if (isset($_GET['id'])) {
    if (empty($start) || empty($until)) {
        $error = ['emptyfields' => 'Please fill in the required fields *'];
        echo json_encode($error);
        exit();
    } else {

        // GET ALL APPROVED DEDUCTIONS 
        $sql ="SELECT * FROM deduction_tbl WHERE employee_id = '". $_GET['id'] ."' AND status = 'Approved' ";
        $query = $dbh -> query($sql);
    
        $deductionCount=$query->rowCount();
    
        if ($deductionCount > 0) {
            $rows = $query->fetchAll();
            $deductions = json_encode($rows);
        } else{
            $row = array();
            $deductions = json_encode($row);
        }


        // GET EMPLOYEE DETAILS
        $sql  = 'SELECT * FROM employee_tbl WHERE id = ' . $_GET['id'];
        $query = $dbh->query($sql);
        $employeeCount = $query->rowCount();


        if ($employeeCount > 0) {
            $row = $query->fetch();

            $sql = "INSERT INTO payroll_tbl (employee_id,fullname,position ,salary, allowance_amount, deductions, total_deduction_amount, total_salary, start, until) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmt = $dbh->prepare($sql);

            $fullname = $row['firstname'] . ' ' . $row['lastname'];
            $stmt->execute([$row['id'],$fullname,$row['position'], $row['salary'], $row['allowance'], $deductions, $total_deduction, $total_salary, $start, $until]);

            $error = ['success' => 'success'];
            echo json_encode($error);
            exit();


        } else {
            $error = ["unavailable" => "Unavalable at the moment : Unknown Employee"];
            echo json_encode($error);
            exit();
        }
    }
    exit();
} else {
    header("Location: /AMK/employee-panel-request-status.php"); /* Redirect browser */
}
