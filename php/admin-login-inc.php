<?php
require_once 'config/config.php';

  $usn =$_POST['usn'];
  $pwd =$_POST['pwd'];

if (isset($usn)) {
    $query = "SELECT * FROM admin_tbl WHERE username = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$usn]);
      if ($row = $stmt->fetch()) {
        $pwdCheck = password_verify($pwd, $row['password']);

        if ($pwdCheck) {
          session_start();
          $_SESSION['tempadminid']= $row['id'];

          $error = ['success' => 'success'];
          echo json_encode($error);
          exit();
        } else{
          $error = ['passwordnotmatch' => 'Password do not match'];
          echo json_encode($error);
          exit();

        }
      } else{
        $error = ['nouser' => 'No username match detected'];
          echo json_encode($error);
          exit();
      }
  # code...
}else{
  header("Location: /AMK"); /* Redirect browser */
}