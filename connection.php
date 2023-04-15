<?php
$severname = 'localhost';
$username = 'root';
$password = 'root';
$database = 'ezocar';

$connection = mysqli_connect($severname, $username, $password, $database);
//  if(!$connection){
//      die("Error ! ".mysqli_connect_error());
//  }else{
//      echo "DataBase Connected SuccessFully";
//  }
