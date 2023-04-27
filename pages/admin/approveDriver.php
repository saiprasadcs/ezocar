<?php
session_start();
include("../../connection.php");

// Check if the driverId parameter is set in the URL
if (isset($_GET['driverId'])) {
    // Get the driverId value from the URL
    $userId = $_GET['driverId'];

    // Update the driver's status to 1 in the database
    $sql = "UPDATE driver SET status=1 WHERE id ='$userId'";
    $result = $connection->query($sql);

    // Check if the query was successful
    if ($result) {
        // Display a success message
        echo "<div class='form'>
                  <h3>Updated SuccessFully</h3><br/>
                  <p class='link'>Click here to <a href='./driversList.php'>Driver List page</a>.</p>
                  </div>";
    } else {
        // Display an error message
        echo "<div class='form'>
                 <h3>Something went wrong</h3><br/>
                 </div>";
    }
}
?>

