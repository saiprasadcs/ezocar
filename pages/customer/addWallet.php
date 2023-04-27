<?php
session_start();
include("../../connection.php");
// Check if the required parameters are set in the request

if (isset($_GET['userId']) && isset($_POST['wallet'])) {

    // Get the user id and wallet value from the request parameters
    $userId = $_GET['userId'];
    $wallet = $_POST['wallet'];

    // Update the wallet value of the user with the given id
    $sql = "UPDATE customer SET wallet=wallet+'$wallet' WHERE id ='$userId'";
    $result = $connection->query($sql);

    // If the query was successful, redirect the user to their profile page
    if ($result) {
        header("Location:profile.php");
    } else {
        // If the query failed, show an error message
        echo "<div class='form'>
                 <h3>Required fields are missing</h3><br/>
                 </div>";
    }
}
?>

