<?php
session_start();
include("../../connection.php");
if (isset($_GET['driverId'])) {
    $roleId = 2;
    $driverId = $_GET['driverId'];
    $id = $_SESSION['userId'];
    $name = $_SESSION['name'];
    //check previous booking DATA
    //GET DRIVER DATA
    $getDriverSQL = "SELECT * FROM driver WHERE id ='$driverId'";
    $getDriverSQLResult = mysqli_query($connection, $getDriverSQL);
    $getDriverSQLResultRow = mysqli_fetch_array($getDriverSQLResult, MYSQLI_ASSOC);
    if ($getDriverSQLResult->num_rows >= 1 && ($getDriverSQLResultRow['occupied'] < $getDriverSQLResultRow['capacity'])){
            //get customer DATA
            $getCustomerSql =  "SELECT * FROM customer WHERE id ='$id'";
            $getCustomerSqlResult = mysqli_query($connection, $getCustomerSql);
            $getCustomerSqlResultRow = mysqli_fetch_array($getCustomerSqlResult, MYSQLI_ASSOC);
            if ($getDriverSQLResult->num_rows >= 1 && ($getCustomerSqlResultRow['wallet'] > $getDriverSQLResultRow['cost_per_person'])) {
                //update into rides
                $sql = "INSERT INTO rides (driver_id , rider_name , rider_id) VALUES ('$driverId' , '$name', '$id')";
                $result = mysqli_query($connection, $sql);
                if($result) {
                    echo "<div class='form'>
                 <h3>Booked SuccessFully</h3><br/>
                 <p class='link'>Click here to <a href='./bookRide.php'</a> book again.</p>
                 </div>";
                }else{
                    echo "<div class='form'>
                 <h3>Problem in update wallet</h3><br/>
                 </div>";
                }
            } else {
                echo "<div class='form'>
                 <h3>Insufficient Balance in your wallet</h3><br/>
                 <p class='link'>Click here to <a href='./bookRide.php'>make it</a> again.</p>
                 </div>";
            }
    }else{
        echo "<div class='form'>
                  <h3>There is no available place in car</h3><br/>
                   <p class='link'>Click here to <a href='./bookRide.php'>book</a> page.</p>
                  </div>";
    }
}
?>

