<?php
session_start();
    include("../../connection.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM customer WHERE email='$username' AND password='$password'";
        $result = $connection->query($sql);
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        $count = COUNT($row);
        if($count == 1){
            if ($row[0]['status'] == 1){
                $_SESSION['id'] = $row[0]['id'];
                $_SESSION['userName'] = $row[0]['first_name'].' '.$row[0]['last_name'];
                $id =$row[0]['id'];
                $_SESSION['login'] = true;
                $_SESSION['userId']= $row[0]['id'];
                header("Location:bookRide.php?userId=$id");
            }else{
                echo '<script>
                    window.location.href="index.php"
                    alert("Please Wait for the admin Approval");
                    </script>';
            }
        }else{
            echo '<script>
                    window.location.href="index.php";
                    alert("Login Failed. Invalid Username or Password");
                    </script>';
        }
    }
?>
<?php
    
    
        
       
        
        
       
 