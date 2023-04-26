<?php
session_start();
include("../../connection.php");
if (isset($_GET['userId']) && isset($_POST['wallet'])) {
    $userId = $_GET['userId'];
    $wallet = $_POST['wallet'];
    $sql = "UPDATE customer SET wallet=wallet+'$wallet' WHERE id ='$userId'";
    $result = $connection->query($sql);
    if ($result) {
        header("Location:profile.php");
    } else {
        echo "<div class='form'>
                 <h3>Required fields are missing</h3><br/>
                 </div>";
    }
}
?>

