<?php
require_once 'config.php';

session_start();

  # code...

$name = $_POST['name'];
$code = $_POST['code'];


  if($_FILES["file"]["name"])
  {
    $file = $_FILES["file"]["name"];

     $location = '../../images/captcha/' . $file;
     move_uploaded_file($_FILES["file"]["tmp_name"], $location);

     $query = "INSERT INTO captcha_tbl(name, code, image) VALUES (?,?,?)";
     $stmt = $dbh->prepare($query);
     $stmt->execute([$name, $code, $file]);
     $error = ['success' => 'success'];
    echo json_encode($error);
     exit();
  } else {
    header("Location: /AMK"); /* Redirect browser */
  }

 
