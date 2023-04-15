<?php
session_start();
include("../../connection.php");

if (isset($_POST['first_name'])) {
    $role_id = 3;
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $phoneno = $_POST['phoneno'];
    $vehicle_number = $_POST['vehicle_number'];
    $licence_number = $_POST['licence_number'];
    $modal = $_POST['modal'];
    $capacity = $_POST['capacity'];
    $pickup_from = $_POST['pickup_from'];
    $pickup_to = $_POST['pickup_to'];
    $wallet = $_POST['wallet'];
    $cost_per_person = $_POST['cost_per_person'];
    $checkUser  = "SELECT email FROM driver WHERE email='$email'";
    $checkUserResult   = mysqli_query($connection, $checkUser);
    if ($checkUserResult->num_rows >= 1){
        echo "<div class='form'>
                  <h3>Email id Already Used</h3><br/>
                   <p class='link'>Click here to <a href='./addDriver.php'>Add</a> again.</p>
                  </div>";
    }else{
        if ($password == $cpassword) {
            $sql = "INSERT INTO driver (role_id,first_name,last_name,email,password,phoneno,
                    vehicle_number,licence_number,modal,capacity,pickup_from,pickup_to,cost_per_person,wallet)
                    VALUES ('$role_id','$firstName','$lastName','$email','$password', '$phoneno',
                     '$vehicle_number','$licence_number','$modal','$capacity','$pickup_from','$pickup_to','$cost_per_person', '$wallet')";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                echo "<div class='form'>
                  <h3>Registered SuccessFully</h3><br/>
                  <p class='link'>Click here to <a href='./addDriver.php'>Add</a> again.</p>
                  </div>";
            } else {
                echo "<div class='form'>
                  <h3>Required fields are missing</h3><br/>
                  <p class='link'>Click here to <a href='./addDriver.php'>Add</a> again.</p>
                  </div>";
            }
        }else{
            echo "<div class='form'>
                  <h3>Password mismatch</h3><br/>
                   <p class='link'>Click here to <a href='./addDriver.php'>Add</a> again.</p>
                  </div>";
        }

    }
}
?>
