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
    $getDriverSQLResult = $connection->query($getDriverSQL);
    $getDriverSQLResultRow = $getDriverSQLResult->fetchAll(PDO::FETCH_ASSOC);
    if (COUNT($getDriverSQLResultRow) >= 1 && ($getDriverSQLResultRow[0]['occupied'] < $getDriverSQLResultRow[0]['capacity'])){
            //get customer DATA
            $getCustomerSql =  "SELECT * FROM customer WHERE id ='$id'";
            $getCustomerSqlResult = $connection->query($getCustomerSql);
            $getCustomerSqlResultRow = $getCustomerSqlResult->fetchAll(PDO::FETCH_ASSOC);
            if (COUNT($getDriverSQLResultRow) >= 1 && ($getCustomerSqlResultRow[0]['wallet'] > $getDriverSQLResultRow[0]['cost_per_person'])) {
                //update into rides
                $sql = "INSERT INTO rides (driver_id , rider_name , rider_id) VALUES ('$driverId' , '$name', '$id')";
                $result = $connection->query($sql);
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

