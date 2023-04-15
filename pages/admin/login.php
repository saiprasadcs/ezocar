<?php
    session_start();
    include("../../connection.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM superadminlogin WHERE email='$username' AND password='$password'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count==1){
//            $id = $row['id'];
            $_SESSION['userId']= $row['id'];
            $_SESSION['userName'] = $row['first_name'].' '.$row['last_name'];
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