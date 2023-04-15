<?php
session_start();
include("../../connection.php");
if (isset($_GET['rideId'])) {
    $rideId = $_GET['rideId'];
    $status = $_GET['status'];
    $rider_id = $_GET['rider_id'];
    $cost_per_person = $_GET['cost'];
    $driver_id = $_GET['driver_id'];

    $sql = "UPDATE rides SET status='$status' WHERE id ='$rideId'";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        if ($status == '2'){
            $updateDriverSQL = "UPDATE driver SET wallet=wallet-$cost_per_person, occupied = occupied-1 WHERE id ='$driver_id'";
            $updateDriverSQLResult = mysqli_query($connection, $updateDriverSQL);
            if ($updateDriverSQLResult){
                $updateCustomerSQL =  "UPDATE customer SET wallet=wallet+$cost_per_person WHERE id ='$rider_id'";
                $updateCustomerSQLResult = mysqli_query($connection, $updateCustomerSQL);
                if($updateCustomerSQLResult){
                    header("Location:myrides.php?type=$status");
                }else{
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
            $updateDriverSQL = "UPDATE driver SET wallet=wallet+$cost_per_person, occupied = occupied+1 WHERE id ='$driver_id'";
            $updateDriverSQLResult = mysqli_query($connection, $updateDriverSQL);
            if ($updateDriverSQLResult){
                $updateCustomerSQL =  "UPDATE customer SET wallet=wallet-$cost_per_person WHERE id ='$rider_id'";
                $updateCustomerSQLResult = mysqli_query($connection, $updateCustomerSQL);
                if($updateCustomerSQLResult){
                    header("Location:myrides.php?type=$status");
                }else{
                    echo "<div class='form'>
                 <h3>Error in customer update wallet</h3><br/>
                 </div>";
                }
            }else{
                echo "<div class='form'>
                 <h3>Error in driver update wallet</h3><br/>
                 </div>";
            }
        }
    } else {
        echo "<div class='form'>
                 <h3>Error in ride update</h3><br/>
                 </div>";
    }
}
?>
