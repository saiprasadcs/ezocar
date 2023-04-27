<?php
session_start();
include("../../connection.php");
if (isset($_POST['first_name'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $company = $_POST['company'];
    $phoneno = $_POST['phoneno'];

    $checkUser  = "SELECT email FROM customer WHERE email='$email'"; // Check if the email is already in use
    $checkUserResult = $connection->query($checkUser); // Execute the query
    $checkUserResult = $checkUserResult->fetchAll(PDO::FETCH_ASSOC); // Fetch the results as an associative array
    if (COUNT($checkUserResult) >= 1){ // If the email is already in use
        echo "<div class='form'>
                  <h3>Email id Already Used</h3><br/>
                   <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
        // Display an error message
    }else{ // If the email is not in use
        if ($password == $cpassword) { // Check if the password and confirmation password match

            $sql = "INSERT INTO customer (first_name, last_name, email, password, phoneno, company) 
                    VALUES('$firstName', '$lastName', '$email', '$password', '$phoneno', '$company')";
            $result = $connection->query($sql); // Execute the query
            if ($result) {// If the query was successful
                echo "<div class='form'>
                  <h3>Registered SuccessFully</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
            } else { // If the query was not successful
                echo "<div class='form'>
                  <h3>Required fields are missing</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
            }
        }

    }
}
?>
