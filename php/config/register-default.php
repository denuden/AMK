<?php
require_once 'config.php';

  $usn= 'admin';
  $passw = '123456';
  $id = 1;
  $key = uniqid("0"."$id", false);
  $pass = password_hash($passw, PASSWORD_DEFAULT);
  $query = "INSERT INTO admin_tbl(username, password, unique_key) VALUES (?,?,?) ";
  $stmt = $dbh->prepare($query);
  $stmt->execute([$usn,$pass, $key]);