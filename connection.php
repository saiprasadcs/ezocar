<?php
// Define database connection details
$dsn = "mysql:host=localhost;dbname=ezocar;charset=UTF8";
$user = 'root';
$password = 'root';
try {
    // Create a new PDO object to connect to the database
    $connection = new PDO($dsn, $user, $password);
    // Set the error mode of the connection to throw exceptions
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If an exception is thrown, display an error message and stop executing the script
    echo 'Connection failed: ' . $e->getMessage();
    die('Sorry, database problem');
}
?>