<?php
session_start();
include("../../connection.php");
if (isset($_GET['customerId'])) {
    $userId = $_GET['customerId'];
    $sql = "UPDATE customer SET status=1 WHERE id ='$userId'";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "<div class='form'>
                  <h3>Updated SuccessFully</h3><br/>
                  <p class='link'>Click here to <a href='./customerList.php'>Customer List page</a>.</p>
                  </div>";
    } else {
        echo "<div class='form'>
                 <h3>Something went wrong</h3><br/>
                 </div>";
    }
}
?>


