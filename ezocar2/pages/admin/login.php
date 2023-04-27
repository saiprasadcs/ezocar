<?php
// start session and include database connection
session_start();
include("../../connection.php");
// check if the form has been submitted using POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the username and password from the POST data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // prepare and execute the SQL query to fetch super admin login data
    $sql = "SELECT * FROM superadminlogin WHERE email='$username' AND password='$password'";
    $result = $connection->query($sql);

    // fetch the result and count the number of rows returned
    $row = $result->fetchAll(PDO::FETCH_ASSOC);
    $count = COUNT($row);

    // if one row is returned, login is successful
    if ($count == 1) {
        $_SESSION['userId'] = $row[0]['id'];
        $_SESSION['userName'] = $row[0]['first_name'] . ' ' . $row[0]['last_name'];
        $_SESSION['role'] = 'admin';
        // redirect to the drivers list page
        header("Location:driversList.php");
    } else {
        // if login fails, redirect to the login page with an error message
        echo '<script>
                window.location.href="index.php";
                alert("Login Failed. Invalid Username or Password");
                </script>';
    }
}

?>