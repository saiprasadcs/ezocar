<?php
session_start();
include("../../connection.php");
if (isset($_GET['rideId'])) {  // Check if the ride ID is set in the GET request
    $rideId = $_GET['rideId']; // Get the ride ID from the GET request
    $status = $_GET['status'];
    $rider_id = $_GET['rider_id'];
    $cost_per_person = $_GET['cost'];
    $driver_id = $_GET['driver_id'];

    $sql = "UPDATE rides SET status='$status' WHERE id ='$rideId'";  // Update the status of the ride in the database
    $result = $connection->query($sql); // Execute the query and get the result

    if ($result) { // If the query was successful
        if ($status == '2'){ // If the status is '2' (ride rejected)
            // Update the driver's decrease the wallet and decresed occupied seats in the database
            $updateDriverSQL = "UPDATE driver SET wallet=wallet-$cost_per_person, occupied = occupied-1 WHERE id ='$driver_id'";
            $updateDriverSQLResult = $connection->query($updateDriverSQL); // Execute the query and get the result
            if ($updateDriverSQLResult){
                // If the query was successful
                // Update the customer's wallet in the database
                $updateCustomerSQL =  "UPDATE customer SET wallet=wallet+$cost_per_person WHERE id ='$rider_id'";

                $updateCustomerSQLResult = $connection->query($updateCustomerSQL);
                if($updateCustomerSQLResult){
                    // Redirect to the 'myrides.php' page with the updated status type
                    header("Location:myrides.php?type=$status");
                }else{
                    // If the query was not successful
                    // Display an error message
                    echo "<div class='form'>
                 <h3>Error in customer update wallet</h3><br/>
                 </div>";

                }
            }else{
                echo "<div class='form'>
                 <h3>Error in driver update wallet</h3><br/>
                 </div>";
            }
        }elseif ($status == '1'){
            // If the status is '1' (ride accepted)
            $updateDriverSQL = "UPDATE driver SET wallet=wallet+$cost_per_person, occupied = occupied+1 WHERE id ='$driver_id'";
            $updateDriverSQLResult = mysqli_query($connection, $updateDriverSQL);
            if ($updateDriverSQLResult){

                // Update the customer's wallet in the database
                $updateCustomerSQL =  "UPDATE customer SET wallet=wallet-$cost_per_person WHERE id ='$rider_id'";
                $updateCustomerSQLResult = $connection->query($updateCustomerSQL);
                if($updateCustomerSQLResult){
                    // Redirect to the 'myrides.php' page with the updated status type
                    header("Location:myrides.php?type=$status");
                }else{
                    echo "<div class='form'>
                 <h3>Error in customer update wallet</h3><br/>
                 </div>";
                }
            }else{
                // If the query was not successful
                echo "<div class='form'>
                 <h3>Error in driver update wallet</h3><br/>
                 </div>";
            }
        }else{
            header("Location:myrides.php?type=1");
        }
    } else {
        echo "<div class='form'>
                 <h3>Error in ride update</h3><br/>
                 </div>";
    }
}
?>
