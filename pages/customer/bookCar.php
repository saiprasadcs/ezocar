<?php
session_start();
include("../../connection.php");
if (isset($_GET['driverId'])) {  // check if the driver id is set in the URL
    $driverId = $_GET['driverId'];
    $id = $_SESSION['userId'];


    // get the driver data
    $getDriverSQL = "SELECT * FROM driver WHERE id ='$driverId'";
    $getDriverSQLResult = $connection->query($getDriverSQL);
    $getDriverSQLResultRow = $getDriverSQLResult->fetchAll(PDO::FETCH_ASSOC);

    // check if driver exist in the driver table and if there is any available space in the car
    if (COUNT($getDriverSQLResultRow) >= 1 && ($getDriverSQLResultRow[0]['occupied'] < $getDriverSQLResultRow[0]['capacity'])){
        // get the customer data
            $getCustomerSql =  "SELECT * FROM customer WHERE id ='$id'";
            $getCustomerSqlResult = $connection->query($getCustomerSql);
            $getCustomerSqlResultRow = $getCustomerSqlResult->fetchAll(PDO::FETCH_ASSOC);
        // if there is available space in the car, check if the user has enough balance in their wallet
            if (COUNT($getDriverSQLResultRow) >= 1 && ($getCustomerSqlResultRow[0]['wallet'] > $getDriverSQLResultRow[0]['cost_per_person'])) {
                // if the user has enough balance, insert the booking data into the rides table
                $name = $getCustomerSqlResultRow[0]['first_name'].''.$getCustomerSqlResultRow[0]['last_name'];
                $sql = "INSERT INTO rides (driver_id , rider_name , rider_id) VALUES ('$driverId' , '$name', '$id')";
                $result = $connection->query($sql);
                if($result) {
                    // if the insertion was successful, show success message with link to book again
                    echo "<div class='form'>
                 <h3>Booked SuccessFully</h3><br/>
                 <p class='link'>Click here to <a href='./bookRide.php'</a> book again.</p>
                 </div>";
                }else{
                    // if the insertion failed, show error message
                    echo "<div class='form'>
                 <h3>Problem in update wallet</h3><br/>
                 </div>";
                }
            } else {
                // if the user doesn't have enough balance, show error message with link to book again
                echo "<div class='form'>
                 <h3>Insufficient Balance in your wallet</h3><br/>
                 <p class='link'>Click here to <a href='./bookRide.php'>make it</a> again.</p>
                 </div>";
            }
    }else{
        // if there is no available space in the car, show error message with link to book again
        echo "<div class='form'>
                  <h3>There is no available place in car</h3><br/>
                   <p class='link'>Click here to <a href='./bookRide.php'>book</a> page.</p>
                  </div>";
    }
}
?>

