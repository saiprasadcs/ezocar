<?php
session_start();
include("../../connection.php");
// check if the customerId parameter is set in the URL query string
if (isset($_GET['customerId'])) {
    // if so, get the customer ID
    $userId = $_GET['customerId'];
    // prepare the SQL query to update the customer status to 1
    $sql = "UPDATE customer SET status=1 WHERE id ='$userId'";
    // execute the query and store the result
    $result = $connection->query($sql);
    if ($result) {
        // if so, display a success message and a link to the customer list page
        echo "<div class='form'>
                  <h3>Updated SuccessFully</h3><br/>
                  <p class='link'>Click here to <a href='./customerList.php'>Customer List page</a>.</p>
                  </div>";
    } else {
        // if the query was not successful, display an error message
        echo "<div class='form'>
                 <h3>Something went wrong</h3><br/>
                 </div>";
    }
}
?>


