<?php

require_once 'config/config.php';

$id = $_POST["id"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$username = $_POST["usn"];
$password = $_POST["pass"];

if (isset($firstname)) {
    if (empty($firstname) || empty($lastname) || empty($age) || empty($gender) ||
      empty($phone)  || empty($address) || empty($username) ||
      empty($password)) {
        $error = ['emptyfields' => 'Please fill in all the fields'];
        echo json_encode($error);
        exit();
    } elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username) || strlen($username) < 6) {
        $error = ['invalidusername' => 'Invalid username, should not contain symbols and must be atleast 6 characters'];
        echo json_encode($error);
        exit();
    } elseif (strlen($username) > 25) {
        $error = ['usernametoolong' => 'Username is too long(max 25)'];
        echo json_encode($error);
        exit();
    }  else {
        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $error = ['passwordstr' => 'Password should be at least 8 characters in length and should
            include at least one upper case letter, one number, and one special character'];
            echo json_encode($error);
            exit();
        } else {
            // test real usnernae
            $sql = "SELECT emp_username FROM employee_tbl WHERE id = '$id'" ;
            $query = $dbh->query($sql);
            $row = $query->fetch();
         
            // test all usernames
            $sql = "SELECT * FROM employee_tbl WHERE emp_username = '$username'"; 
            $query = $dbh->query($sql);
            $rowCount= $query->rowCount();
    
            if (strtolower($username) == strtolower($row['emp_username'])) {
                $sql = "UPDATE employee_tbl
                SET 
                 firstname = ?,
                 lastname = ?,
                 age = ?,
                 gender = ?,
                 phone = ?,
                 address = ?,
                 emp_username =?,
                 emp_password = ?,
                 first_time_login = ?
                WHERE id = ?";
                $stmt = $dbh->prepare($sql);
                // hash password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $stmt->execute([$firstname, $lastname, $age, $gender, $phone, $address, $username, $hashedPassword, 1, $id]);

                $error = ['success' => 'success'];
                echo json_encode($error);
                exit();
            }else {
                if ($rowCount > 0) {
                    $error = ['usernametaken' => 'Username already taken'];
                    echo json_encode($error);
                    exit();
                } else {
                    $sql = "UPDATE employee_tbl
                    SET 
                     firstname = ?,
                     lastname = ?,
                     age = ?,
                     gender = ?,
                     phone = ?,
                     address = ?,
                     emp_username =?,
                     emp_password = ?,
                     first_time_login = ?
                    WHERE id = ?
                     ";
                    $stmt = $dbh->prepare($sql);
                    // hash password
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $stmt->execute([$firstname, $lastname, $age, $gender, $phone, $address, $username, $hashedPassword, 0, $id]);
    
                    $error = ['success1' => 'success'];
                    echo json_encode($error);
                    exit();
                  
                }
            }
           

        }
    }
} else {
    header("Location: /AMK/admin-employee-manage"); /* Redirect browser */
}
