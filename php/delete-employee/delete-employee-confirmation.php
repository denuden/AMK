<?php
require_once '../config/config.php';

$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if(isset($_GET['id'])){
  session_start();
  $employee_id = $_GET['id'];
  $_SESSION['id'] = $employee_id;
  echo '<script type="text/javascript">';
  echo 'let res = confirm("Are you sure you want to delete?");';
  echo 'if ( res == true) { ';
    echo '  window.location.replace("delete-employee-permanent.php?id='.$employee_id.'") ';
    echo ' } else { ';
    echo '  window.location.replace("/AMK/admin-employee-manage.php") }';
    echo '</script>';
}else{
  header("Location: /AMK/admin-employee-manage.php"); 
    }


?>
