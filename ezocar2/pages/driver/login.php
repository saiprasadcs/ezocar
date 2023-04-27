<?php
session_start();
include("../../connection.php");
// Check if the form was submitted using the POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the values of the username and password fields from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check if the provided credentials match a record in the `driver` table

    $sql = "SELECT * FROM driver WHERE email='$username' AND password='$password'";


    $result = $connection->query($sql);
    // Fetch all rows returned by the query as an associative array

    $row = $result->fetchAll(PDO::FETCH_ASSOC);

    // Count the number of rows returned
    $count = COUNT($row);

    // If there is exactly one row returned, log the user in and redirect to the "myrides.php" page
    if ($count == 1) {
        // Set session variables for the user ID and username

        if ($row[0]['status'] == 1) {
            $_SESSION['userId'] = $row[0]['id'];
            $id = $row[0]['id'];
            $_SESSION['userName'] = $row[0]['first_name'] . ' ' . $row[0]['last_name'];
            // Redirect to the "myrides.php" page, passing the user ID as a URL parameter
            header("Location:myrides.php?userId=$id");
        } else {
            // If the user's status is not set to "1", display an error message and redirect to the login page
            echo '<script>
                    window.location.href="index.php"
                    alert("Please Wait for the admin Approval");
                    </script>';
        }

    } else {
        // If no rows were returned, display an error message and redirect to the login page
        echo '<script>
                    window.location.href="index.php"
                    alert("Login Failed. Invalid Username or Password")
                    </script>';
    }
}
    