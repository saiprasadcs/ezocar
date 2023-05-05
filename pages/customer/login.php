<?php
session_start();
    include("../../connection.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){ // check if the request method is POST
        $username = $_POST['username'];
        $password = $_POST['password'];

        // select the customer from the database with the entered email and password
        $sql = "SELECT * FROM customer WHERE email='$username' AND password='$password'";
        $result = $connection->query($sql);
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        $count = COUNT($row);// count the number of rows returned
        if($count == 1){ // if only one row is returned
            if ($row[0]['status'] == 1){
                // check if the customer's status is active
                $_SESSION['id'] = $row[0]['id']; 
                $_SESSION['userName'] = $row[0]['first_name'].' '.$row[0]['last_name']; // set the customer's name in the session
                $id =$row[0]['id'];
                $_SESSION['login'] = true; // set the login status in the session to true
                $_SESSION['userId']= $row[0]['id']; // set the user id in the session
                header("Location:bookRide.php?userId=$id"); // redirect the customer to the bookRide page with the user id as a parameter
            }else{
                // if the customer's status is not active, redirect to the index page with a message
                echo '<script>
                    window.location.href="index.php"
                    alert("Please Wait for the admin Approval");
                    </script>';
            }
        }else{
            // if no rows are returned, redirect to the index page with a message
            echo '<script>
                    window.location.href="index.php";
                    alert("Login Failed. Invalid Username or Password");
                    </script>';
        }
    }
?>
<?php
    
    
        
       
        
        
       
 