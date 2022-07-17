<?php

require_once 'config/config.php';

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$position = $_POST["position"];
$salary = $_POST["salary"];
$allowance = $_POST["allowance"];
$username = $_POST["usn"];
$password = $_POST["pass"];

if (isset($firstname)) {
    if (empty($firstname) || empty($lastname) || empty($age) || empty($gender) ||
      empty($phone)  || empty($address) || empty($position) || empty($salary) || empty($allowance) || empty($username) ||
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
            $sql = "SELECT emp_username FROM employee_tbl WHERE emp_username=?"; //checks if username is taken
            $stmt = $dbh->prepare($sql);

            $stmt->execute([$username]);
            $rowCount = $stmt->rowCount(); //get row count

            if ($rowCount > 0) {
                $error = ['usernametaken' => 'Username already taken'];
                echo json_encode($error);
                exit();
            } else {

                $sql = "INSERT INTO employee_tbl (firstname, lastname, age, gender, phone, address, position, salary, allowance,  emp_username, emp_password, first_time_login) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $dbh->prepare($sql);

                // hash password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $stmt->execute([$firstname, $lastname, $age, $gender, $phone, $address, $position, $salary, $allowance, $username, $hashedPassword, 0]);

                $error = ['success' => 'success'];
                echo json_encode($error);
                exit();
            }
            exit();
        }
    }
} else {
    header("Location: /AMK"); /* Redirect browser */
}
