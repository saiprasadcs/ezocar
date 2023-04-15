<?php
session_start();
$_SESSION['customerId']=$_GET['customerId'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../styles/nav.css">
    <title>Update Customer</title>
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <a class="text-reset me-3" href="#">
                <li><a href="dashboard.php" style="font-size:17.5px"><i class="fas fa-tachometer-alt" style="margin:0px 5px;font-size:17.5px"></i>Dashboard</a> </li>
            </a>
            <a class="text-reset me-3" href="#">
                <li><a href="driversList.php" style="font-size:17.5px"><img src="../../assets/driver.png" style="width:20px;color:white;margin:0px 5PX;" alt="Driver">Drivers</a></li>
            </a>
            <a class="text-reset me-3" href="#">
                <li><a href="customerList.php" style="font-size:17.5px"><img src="../../assets/customer.png" style="width:20px;color:white;margin:0px 5PX;" alt="Driver">Customers</a></li>
            </a>
            <a class="text-reset me-3" href="#">
                <li><a  href="profile.php"><i class="far fa-clone"></i>My Profile</a></li>
            </a>
            <a class="text-reset me-3" href="#">
                <li><a href="../../" style="font-size:17.5px">Log Out</a></li>
            </a>
        </div>
    </div>
</nav>
<div class="container">
    <section class="h-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-12">
                                <?php
                                include '../../connection.php';
                                $customerId = $_SESSION['customerId'];
                                $sql = "SELECT * FROM `customer` WHERE id='$customerId'";
                                $result = $connection->query($sql);
                                if($result){
                                    if($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()){
                                            $id = $row['id'];
                                            $firstName = $row['first_name'];
                                            $lastName = $row['last_name'];
                                            $email = $row['email'];
                                            $phoneno = $row['phoneno'];
                                            $customerId = $_SESSION['customerId'];
                                            echo "<form id=\"register\" action=\"editCustomerForm.php\"
                                      method=\"POST\">
                                    <div class=\"card-body p-md-5 text-black\">
                                        <h3 class=\"mb-5 text-uppercase\">Update Customer</h3>
                                        <div class=\"row\">
                                            <div class=\"col-md-4 mb-4\">
                                                <div class=\"form-outline\">
                                                    <label class=\"form-label\" for=\"form3Example1m\">First name</label>
                                                    <input type=\"text\" id=\"first_name\" name=\"first_name\" value='$firstName' placeholder=\"First name\" class=\"form-control form-control-lg\" />
                                                </div>
                                            </div>
                                            <div class=\"col-md-4 mb-4\">
                                                <div class=\"form-outline\">
                                                    <label class=\"form-label\" for=\"form3Example1m\">Last name</label>
                                                    <input type=\"text\" id=\"last_name\" value='$lastName' name=\"last_name\" placeholder=\"Last name\" class=\"form-control form-control-lg\" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class=\"row\">
                                            <div class=\"col-md-4 mb-4\">
                                                <div class=\"form-outline\">
                                                    <label for=\"\" style=\"display:block;font-size:17.5px;margin:5px auto\">Email Id</label>
                                                    <input  class=\"form-control form-control-lg\" value='$email' name=\"email\" type=\"text\" placeholder=\"Email Id\" >
                                                </div>
                                            </div>
                                            <div class=\"col-md-4 mb-4\">
                                                <div class=\"form-outline\">
                                                    <label for=\"\" style=\"display:block;font-size:17.5px;margin:5px auto\">Phone No</label>
                                                    <input  class=\"form-control form-control-lg\" value='$phoneno' name=\"phoneno\" type=\"text\" placeholder=\"Phone No\" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class=\"d-flex justify-content-end pt-3\">
                                            <a href=\"./customerList.php\"  type=\"button\" class=\"btn btn-light btn-lg\">Back</a>
                                            <button type=\"submit\" class=\"btn btn-primary btn-lg ms-2\">Update form</button>
                                        </div>

                                    </div>
                                </form>";
                                        }
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>

<script>
    function validation(){
        var firstName = document.form.first_name.value;
        var lastName = document.form.last_name.value;
        var email = document.form.email.value;
        var passwordO = document.form.password1.value;
        var passwordT = document.form.password2.value;
        if(firstName.length == "" && lastName.length == "" && email.length == "" && passwordO.length == "" &&passwordT.length == ""){
            alert("Please Fill All The Details");
            return false;
        }else if(firstName.length == ""){
            alert("First Name Field is Empty");
            return false;
        }else if(lastName.length == ""){
            alert("Last Name Field is Empty");
            return false;
        }else if(email.length == ""){
            alert("Email Field is Empty");
            return false;
        }else if(passwordO.length == ""){
            alert("Password Field is Empty");
            return false;
        }else if(passwordT.length == ""){
            alert("Confirm Password Field is Empty");
            return false;
        }
    }

</script>

</body>
</html>