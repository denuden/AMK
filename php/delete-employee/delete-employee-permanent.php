<?php
require_once '../config/config.php';

$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
if(isset($_GET['id'])){
session_start();
$employee_id  = $_SESSION['id'];

    $sql = "DELETE  FROM employee_tbl WHERE id= ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([ $employee_id ]);
    echo '<script type="text/javascript">';
    echo '  window.location.replace("/AMK/admin-employee-manage.php")';
    echo '</script>';
}else{
    header("Location: /AMK/admin-employee-manage.php"); 

  
      }