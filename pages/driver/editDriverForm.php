<?php
session_start();
include("../../connection.php");

// Check if form was submitted

if (isset($_POST['first_name'])) {
    // Get form data
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $vehicle_number = $_POST['vehicle_number'];
    $licence_number = $_POST['licence_number'];
    $modal = $_POST['modal'];
    $capacity = $_POST['capacity'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $pickup_from = $_POST['pickup_from'];
    $pickup_to = $_POST['pickup_to'];
    $wallet = $_POST['wallet'];
    $cost_per_person = $_POST['cost_per_person'];
    $company = $_POST['company'];
    $id = $_SESSION['driverId']; // Get the driver ID from the session variable

    // Prepare SQL statement to update driver information in the database
    $sql = "UPDATE driver SET first_name='$firstName',last_name='$lastName',email='$email',phoneno='$phoneno',
                    vehicle_number='$vehicle_number',licence_number='$licence_number',modal='$modal',capacity='$capacity',
                    pickup_from='$pickup_from',pickup_to='$pickup_to', cost_per_person='$cost_per_person',wallet ='$wallet',
                    startTime='$startTime', endTime='$endTime', company='$company'
                     WHERE id='$id'";

    // Execute SQL statement and check if update was successful
    $result = $connection->query($sql);
    if ($result) {
        // Show success message if update was successful

        echo "<div class='form'>
                  <h3>Updated SuccessFully</h3><br/>
                  <p class='link'>Click here to <a href='./profile.php'>Driver</a> again.</p>
                  </div>";
    } else {
        // Show error message if update was not successful
        echo "<div class='form'>
                  <h3>Required fields are missing</h3><br/>
                  <p class='link'>Click here to <a href='./editDriver.php?driverId=$id'>Update</a> again.</p>
                  </div>";
    }
}
?>
