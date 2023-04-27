
<?php
session_start();
include("../../connection.php");
// Check if form has been submitted
if (isset($_POST['first_name'])) {

    // Get form data
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $company= $_POST['company'];
    $id = $_SESSION['customerId'];

    // Prepare SQL statement to update customer data
    $sql = "UPDATE customer SET first_name='$firstName',last_name='$lastName',email='$email',
            phoneno='$phoneno', company='$company' WHERE id='$id'";

    // Execute SQL statement
    $result = $connection->query($sql);

    // Check if update was successful
    if ($result) {
        // Display success message and link to customer list
        echo "<div class='form'>
                  <h3>Updated SuccessFully</h3><br/>
                  <p class='link'>Click here to <a href='./customerList.php'>Customer List</a> again.</p>
                  </div>";
    } else {
        // Display error message and link to edit customer page again
        echo "<div class='form'>
                  <h3>Required fields are missing</h3><br/>
                  <p class='link'>Click here to <a href='./editCustomer.php?customerId=$id'>Update</a> again.</p>
                  </div>";
    }
}
?>

