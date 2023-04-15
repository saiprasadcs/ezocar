<?php
session_start();
include("../../connection.php");

if (isset($_POST['first_name'])) {
    $role_id = 3;
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];

    $phoneno = $_POST['phoneno'];
    $vehicle_number = $_POST['vehicle_number'];
    $licence_number = $_POST['licence_number'];
    $modal = $_POST['modal'];
    $capacity = $_POST['capacity'];
    $pickup_from = $_POST['pickup_from'];
    $pickup_to = $_POST['pickup_to'];
    $wallet = $_POST['wallet'];
    $cost_per_person = $_POST['cost_per_person'];
    $id = $_SESSION['driverId'];

    $sql = "UPDATE driver SET role_id='$role_id',first_name='$firstName',last_name='$lastName',email='$email',phoneno='$phoneno',
                    vehicle_number='$vehicle_number',licence_number='$licence_number',modal='$modal',capacity='$capacity',
                    pickup_from='$pickup_from',pickup_to='$pickup_to', cost_per_person='$cost_per_person',wallet ='$wallet'
                     WHERE id='$id'";

    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "<div class='form'>
                  <h3>Updated SuccessFully</h3><br/>
                  <p class='link'>Click here to <a href='./driversList.php'>Driver</a> again.</p>
                  </div>";
    } else {
        echo "<div class='form'>
                  <h3>Required fields are missing</h3><br/>
                  <p class='link'>Click here to <a href='./editDriver.php?driverId=$id'>Update</a> again.</p>
                  </div>";
    }
}
?>
