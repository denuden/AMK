<?php
require_once 'config/config.php';
session_start();

$key = $_POST['key'];
$captcha = $_POST['captcha'];
$id = $_POST['captchaid'];

$keyStatus = false;
$captchaStatus = false;

if (isset($key)) {
  // UNIQUE KEY
  $query = "SELECT * FROM admin_tbl WHERE id = " . $_SESSION['tempadminid'];
  $stmt = $dbh->query($query);
  if ($row = $stmt->fetch()) {
    if ($key == $row['unique_key']) {
      $keyStatus = true;
    } else {
      $keyStatus = false;
      $error = ['keyerror' => 'Unique key entered does not match your given unique key'];
      echo json_encode($error);
      exit();
    }
  } else {
    $error = ['nouser' => 'No key match detected'];
    echo json_encode($error);
    exit();
  }

  // CAPTCHA
  $query = "SELECT * FROM captcha_tbl WHERE id = '$id'";
  $stmt = $dbh->query($query);
  if ($row2 = $stmt->fetch()) {
    if ($captcha == $row2['code']) {
      $captchaStatus = true;
    } else {
      $captchaStatus = false;
      $error = ['captchaerror' => 'Captcha entered does not match the image'];
      echo json_encode($error);
      exit();
    }
  } else {
    $error = ['nouser' => 'No captcha match detected'];
    echo json_encode($error);
    exit();
  }


  if ($keyStatus == true && $captchaStatus == true) {
    
    $_SESSION['tempadminid']= -1;
    $_SESSION['adminid']= $row['id'];
    $_SESSION['usn']= $row['username'];
    $_SESSION['status']= $row['status'];
    $error = ['success' => 'success'];
    $_SESSION['key']= $row['unique_key'];
    echo json_encode($error);
    exit();
  }
} else {
  header("Location: /AMK"); /* Redirect browser */
}
