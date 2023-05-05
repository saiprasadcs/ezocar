<?php
session_start();
include("../../connection.php");
// check if the form has been submitted
if (isset($_POST['first_name'])) {
    // retrieve user input data from the form fields
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
 // check if the user already exists in the database
    $checkUser  = "SELECT email FROM customer WHERE email='$email'";
        $checkUserResult = $connection->query($checkUser);
        $checkUserResult = $checkUserResult->fetchAll(PDO::FETCH_ASSOC);
        // if the user already exists, display an error message
    if (COUNT($checkUserResult) > 0){
        echo "<div class='form'>
                  <h3>Email id Already Used</h3><br/>
                   <p class='link'>Click here to <a href='./addCustomer.php'>Add</a> again.</p>
                  </div>";
    }else{
// if the user does not exist, continue with the registration process

        if ($password == $cpassword) {
            // if the passwords match, insert the user data into the database
            $sql = "INSERT INTO customer (first_name, last_name, email, password, phoneno, status)
                    VALUES('$firstName', '$lastName', '$email', '$password', '$phoneno', 1)";
            $result = $connection->query($sql);
            if ($result) {
                echo "<div class='form'>
                  <h3>Registered SuccessFully</h3><br/>
                  <p class='link'>Click here to <a href='./customerList.php'>customer list</a> .</p>
                  </div>";
            } else {
                // if the insertion was not successful, display an error message
                echo "<div class='form'>
                  <h3>Required fields are missing</h3><br/>
                  <p class='link'>Click here to <a href='./addCustomer.php'>add</a> again.</p>
                  </div>";
            }
        }else{
            // if the passwords do not match, display an error message
            echo "<div class='form'>
                  <h3>Required field are missing</h3><br/>
                  <p class='link'>Click here to <a href='./addCustomer.php'>add</a> again.</p>
                  </div>";
        }
    }
}
?>
