<?php
require_once '../config/config.php';

$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if(isset($_GET['id'])){
  session_start();
  $allowance_id = $_GET['id'];
  $_SESSION['id'] = $allowance_id;
  echo '<script type="text/javascript">';
  echo 'let res = confirm("Are you sure you want to delete?");';
  echo 'if ( res == true) { ';
    echo '  window.location.replace("delete-allowance-permanently.php?id='.$allowance_id.'") ';
    echo ' } else { ';
    echo '  window.location.replace("/AMK/admin-allowance-manage.php") }';
    echo '</script>';
}else{
  header("Location: /AMK/admin-allowance-manage.php"); 
    }


?>
