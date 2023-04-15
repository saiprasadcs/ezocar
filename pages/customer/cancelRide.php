<?php
session_start();
include("../../connection.php");
if (isset($_GET['rideId'])) {
    $rideId = $_GET['rideId'];
    $sql = "DELETE FROM rides WHERE id ='$rideId'";
    echo "$sql";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        header("Location:myrides.php?type=0");
    } else {
        echo "<div class='form'>
                 <h3>Required fields are missing</h3><br/>
                 </div>";
    }
}
?>

