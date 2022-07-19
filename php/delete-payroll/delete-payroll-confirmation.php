<?php
require_once '../config/config.php';

$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if(isset($_GET['id'])){
  session_start();
  $payroll_id = $_GET['id'];
  $_SESSION['id'] = $payroll_id;
  echo '<script type="text/javascript">';
  echo 'let res = confirm("Are you sure you want to delete?");';
  echo 'if ( res == true) { ';
    echo '  window.location.replace("delete-payroll-permanently.php?id='.$payroll_id.'") ';
    echo ' } else { ';
    echo '  window.location.replace("/AMK/admin-payroll-manage.php") }';
    echo '</script>';
}else{
  header("Location: /AMK/admin-payroll-manage.php"); 
    }


?>
