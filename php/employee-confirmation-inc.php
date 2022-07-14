<?php
require_once 'config/config.php';
session_start();

$key = $_POST['key'];
$captcha = $_POST['captcha'];

$keyStatus = false;
$captchaStatus = false;

if (isset($key)) {
  // UNIQUE KEY
  $query = "SELECT * FROM employee_tbl WHERE id = " . $_SESSION['tempemployeeid'];
  $stmt = $dbh->query($query);
  if ($row = $stmt->fetch()) {
    if ($key == $row['unique_key']) {
      $keyStatus = true;
      $captchaStatus = true;
    } else {
      $keyStatus = false;
      $error = ['keyerror' => 'Unique key entered does not match your given unique key'];
      echo json_encode($error);
      exit();
    }
  } else {
    $error = ['nouser' => 'No username match detected'];
    echo json_encode($error);
    exit();
  }

  // CAPTCHA
  // $query = "SELECT * FROM admin_tbl WHERE id = " . $_SESSION['adminid'];
  // $stmt = $dbh->query($query);
  // if ($row = $stmt->fetch()) {
  //   if ($key == $row['unique_key']) {
  //     $keyStatus = true;
  //   } else {
  //     $keyStatus = false;
  //   }
  // } else {
  //   $error = ['nouser' => 'No username match detected'];
  //   echo json_encode($error);
  //   exit();
  // }


  if ($keyStatus == true && $captchaStatus == true) {
    
    $_SESSION['tempemployeeid']= -1;
    $_SESSION['employeeid']= $row['id'];
    $_SESSION['username']= $row['emp_username'];
    $_SESSION['key']= $row['unique_key'];
    $error = ['success' => 'success'];
    echo json_encode($error);
    exit();
  }
} else {
  header("Location: /AMK"); /* Redirect browser */
}
