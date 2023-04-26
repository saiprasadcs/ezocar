<?php
    session_start();
    include("../../connection.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM superadminlogin WHERE email='$username' AND password='$password'";

        $result = $connection->query($sql);
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        $count = COUNT($row);
        if($count==1){
//            $id = $row['id'];
            $_SESSION['userId']= $row[0]['id'];
            $_SESSION['userName'] = $row[0]['first_name'].' '.$row[0]['last_name'];
            $_SESSION['role']= 'admin';
            header("Location:driversList.php");
        }else{
            echo '<script>
                window.location.href="index.php";
                alert("Login Failed. Invalid Username or Password");
                </script>';
        }
    }
    
?>