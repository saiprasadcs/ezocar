
<?php
session_start();
include("../../connection.php");
if (isset($_POST['first_name'])) {
    $roleId = 2;
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $id = $_SESSION['customerId'];
    $sql = "UPDATE customer SET role_id='$roleId',first_name='$firstName',last_name='$lastName',email='$email',
            phoneno='$phoneno' WHERE id='$id'";

    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "<div class='form'>
                  <h3>Updated SuccessFully</h3><br/>
                  <p class='link'>Click here to <a href='./customerList.php'>Customer List</a> again.</p>
                  </div>";
    } else {
        echo "<div class='form'>
                  <h3>Required fields are missing</h3><br/>
                  <p class='link'>Click here to <a href='./editCustomer.php?customerId=$id'>Update</a> again.</p>
                  </div>";
    }
}
?>

