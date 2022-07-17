<?php
require_once 'config/config.php';

  $usn =$_POST['usn'];
  $pwd =$_POST['pwd'];

if (isset($usn)) {
    $query = "SELECT * FROM employee_tbl WHERE emp_username = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$usn]);
      if ($row = $stmt->fetch()) {
        $pwdCheck = password_verify($pwd, $row['emp_password']);

        if ($pwdCheck) {
          if ($row['first_time_login'] == 0) { // it is the first time
          

            // update first time login to false since login has been done
            // update key to proper generated unique one
            $id = $row['id'];
            $key = uniqid("0"."$id", false);

            session_start();
            $_SESSION['tempemployeeid']= -1;
            $_SESSION['employeeid']= $row['id'];
            $_SESSION['username']= $row['emp_username'];
            $_SESSION['name']= $row['firstname'];
            $_SESSION['lname']= $row['lastname'];
            $_SESSION['key']= $key;

            $sql = "UPDATE employee_tbl SET first_time_login = ?, unique_key = ? WHERE id = ?";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([1, $key, $row['id']]);

            // always log history
            $sql = "INSERT INTO access_history_tbl (employee_id) VALUES (?)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$row['id']]);

            $error = ['confirmation' => 'confirmation'];
            echo json_encode($error);
            exit();

          } else { // not the first time
            session_start();

            // always log history
            $sql = "INSERT INTO access_history_tbl (employee_id, firstname, lastname, phone, address) VALUES (?,?,?,?,?)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([$row['id'], $row['firstname'], $row['lastname'], $row['phone'], $row['address']]);

            $_SESSION['tempemployeeid']= $row['id'];
            $error = ['panel' => 'panel'];
            echo json_encode($error);
            exit();
          }
     
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