<?php
session_start();
include("../../connection.php");
if (isset($_POST['first_name'])) {
    $roleId = 2;
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $company = $_POST['company'];
    $phoneno = $_POST['phoneno'];

    $checkUser  = "SELECT email FROM customer WHERE email='$email'";
    $checkUserResult = $connection->query($checkUser);
    $checkUserResult = $checkUserResult->fetchAll(PDO::FETCH_ASSOC);
    if (COUNT($checkUserResult) >= 1){
        echo "<div class='form'>
                  <h3>Email id Already Used</h3><br/>
                   <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
    }else{
        if ($password == $cpassword) {
            $sql = "INSERT INTO customer (role_id, first_name, last_name, email, password, phoneno, company) 
                    VALUES('$roleId','$firstName', '$lastName', '$email', '$password', '$phoneno', '$company')";
            $result = $connection->query($sql);
            if ($result) {
                echo "<div class='form'>
                  <h3>Registered SuccessFully</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
            } else {
                echo "<div class='form'>
                  <h3>Required fields are missing</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
            }
        }

    }
}
?>
