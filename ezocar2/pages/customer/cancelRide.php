<?php
session_start();
include("../../connection.php");
if (isset($_GET['rideId'])) { // check if the ride ID is set in the URL parameter
    $rideId = $_GET['rideId']; // assign the ride ID to the variable
    $sql = "DELETE FROM rides WHERE id ='$rideId'"; // SQL query to delete the ride with the given ID
    echo "$sql";
    $result = $connection->query($sql);
    if ($result) { // if the query was successful
        header("Location:myrides.php?type=0"); // redirect to the user's rides page with a success message
    } else { // if the query was unsuccessful
        echo "<div class='form'>
                 <h3>Required fields are missing</h3><br/>
                 </div>"; // display an error message
    }
}
?>

