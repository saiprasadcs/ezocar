<?php
session_start();
include("../../connection.php");

// Check if userId and wallet are set in $_GET and $_POST arrays respectively

if (isset($_GET['userId']) && isset($_POST['wallet'])) {

    // Assign values to variables
    $userId = $_GET['userId'];
    $wallet = $_POST['wallet'];

    // Construct the SQL query to update the wallet value for the driver with the given userId
    $sql = "UPDATE driver SET wallet=wallet+'$wallet' WHERE id ='$userId'";

    // Execute the query and store the result in $result
    $result = $connection->query($sql);

    // Check if the query was executed successfully
    if ($result) {
        // Redirect to the driver's profile page
        header("Location:profile.php");
    } else {
        // If query execution fails, display an error message
        echo "<div class='form'>
                 <h3>Required fields are missing</h3><br/>
                 </div>";
    }
}
?>

