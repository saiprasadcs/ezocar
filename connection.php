<?php
$dsn = "mysql:host=localhost;dbname=ezocar;charset=UTF8";
$user = 'root';
$password = 'root';
try {
    $connection = new PDO($dsn, $user, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    die('Sorry, database problem');
}
?>