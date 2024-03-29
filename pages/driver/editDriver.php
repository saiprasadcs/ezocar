<?php
session_start();
$_SESSION['driverId']=$_GET['driverId'];
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
    <title>Edit Driver</title>
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <a class="text-reset me-3" href="#">
                <li><a  href="myrides.php" style="    text-decoration: underline;" ><i class="far fa-address-book"></i>My Rides</a></li>
            </a>
            <a class="text-reset me-3" href="#">
                <li><a  href="profile.php"><i class="far fa-clone"></i>My Profile</a></li>
            </a>
            <a class="text-reset me-3" href="#">
                <li><a style="" href="../../">Log Out</a></li>
            </a>
        </div>
        <div>
            <?php
            session_start();
            $name =$_SESSION['userName'];
            echo "$name"
            ?>
        </div>
    </div>
</nav>
<!-- Navbar -->
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
                                $driverId = $_SESSION['driverId'];
                                $sql = "SELECT * FROM `driver` WHERE id='$driverId'";
                                $result = $connection->query($sql);
                                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                            $id = $row['id'];
                                            $firstName = $row['first_name'];
                                            $lastName = $row['last_name'];
                                            $email = $row['email'];
                                            $phoneno = $row['phoneno'];
                                            $vehicle_number = $row['vehicle_number'];
                                            $licence_number = $row['licence_number'];
                                            $modal = $row['modal'];
                                            $capacity = $row['capacity'];
                                            $startTime = $row['startTime'];
                                            $company = $row['company'];
                                            $endTime = $row['endTime'];
                                            $capacity = $row['capacity'];
                                            $pickup_from = $row['pickup_from'];
                                            $pickup_to = $row['pickup_to'];
                                            $wallet = $row['wallet'];
                                            $cost_per_person = $row['cost_per_person'];
                                            echo " <form id=\"register\" action=\"editDriverForm.php?driverId=$id\"
                                      method=\"POST\">
                                    <div class=\"card-body p-md-5 text-black\">
                                        <h3 class=\"mb-5 text-uppercase\">Edit Driver</h3>
                                        <div class=\"row\">
                                            <div class=\"col-md-4 mb-4\">
                                                <div class=\"form-outline\">
                                                    <label class=\"form-label\" for=\"form3Example1m\">First name</label>
                                                    <input type=\"text\" id=\"first_name\" value='$firstName' name=\"first_name\" class=\"form-control form-control-lg\" />
                                                </div>
                                            </div>
                                            <div class=\"col-md-4 mb-4\">
                                                <div class=\"form-outline\">
                                                    <label class=\"form-label\" for=\"form3Example1m\">Last name</label>
                                                    <input type=\"text\" id=\"last_name\" value='$lastName' name=\"last_name\" class=\"form-control form-control-lg\" />
                                                </div>
                                            </div>
                                            <div class=\"col-md-4 mb-4\">
                                                <div class=\"form-outline\">
                                                    <label for=\"\" style=\"display:block;font-size:17.5px;margin:5px auto\">Email Id</label>
                                                    <input  class=\"form-control form-control-lg\" value='$email' name=\"email\" type=\"email\" placeholder=\"Email Id\" >
                                                </div>
                                            </div>  
                                              <div class=\"col-md-4 mb-4\">
                                                <div class=\"form-outline\">
                                                    <label for=\"\" style=\"display:block;font-size:17.5px;margin:5px auto\">Company Name</label>
                                                    <input  class=\"form-control form-control-lg\" value='$company' name=\"company\" type=\"text\" placeholder=\"Company\" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-4 mb-4\">
                                                <div class=\"form-outline mb-4\">
                                                    <label for=\"\" style=\"display:block;font-size:17.5px;margin:5px auto\">Vehicle Number</label>
                                                    <input  class=\"form-control form-control-lg\" value='$vehicle_number' name=\"vehicle_number\" type=\"text\" placeholder=\"Vehicle Number\" >
                                                </div>
                                            </div>
                                            <div class=\"col-md-4 mb-4\">
                                                <div class=\"form-outline mb-4\">
                                                    <label for=\"\" style=\"display:block;font-size:17.5px;margin:5px auto\">License Number</label>
                                                    <input  class=\"form-control form-control-lg\" value='$licence_number' name=\"licence_number\" type=\"text\" placeholder=\"License Number\" >
                                                </div>
                                            </div>
                                            <div class=\"col-md-4 mb-4\">
                                                <div class=\"form-outline mb-4\">
                                                    <label for=\"\" style=\"display:block;font-size:17.5px;margin:5px auto\">Pick Up From</label>
                                                    <input  class=\"form-control form-control-lg\" value='$pickup_from' name=\"pickup_from\" type=\"text\" placeholder=\"Pick Up From\" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class=\"row\">
                                            <div class=\"col-md-4 mb-4\">
                                                <div class=\"form-outline mb-4\">
                                                    <label for=\"\" style=\"display:block;font-size:17.5px;margin:5px auto\">Pick Up To</label>
                                                    <input  class=\"form-control form-control-lg\" value='$pickup_to' name=\"pickup_to\" type=\"text\" placeholder=\"Pick Up To\" >
                                                </div>
                                            </div>
                                             <div class=\"col-md-4 mb-4\">
                                                <div class=\"form-outline mb-4\">
                                                    <label for=\"\" style=\"display:block;font-size:17.5px;margin:5px auto\">Start Time</label>
                                                    <input  class=\"form-control form-control-lg\" value='$startTime' name=\"startTime\" type=\"time\" placeholder=\"Start Time\" >
                                                </div>
                                            </div>  
                                             <div class=\"col-md-4 mb-4\">
                                                <div class=\"form-outline mb-4\">
                                                    <label for=\"\" style=\"display:block;font-size:17.5px;margin:5px auto\">End Time</label>
                                                    <input  class=\"form-control form-control-lg\" value='$endTime' name=\"endTime\" type=\"time\" placeholder=\"End Time\" >
                                                </div>
                                            </div>
                                            <div class=\"col-md-4 mb-4\">
                                                <div class=\"form-outline mb-4\">
                                                    <label for=\"\" style=\"display:block;font-size:17.5px;margin:5px auto\">Capacity</label>
                                                    <input  class=\"form-control form-control-lg\" value='$capacity' name=\"capacity\" type=\"number\" placeholder=\"Capacity\" >
                                                </div>
                                            </div>
                                            <div class=\"col-md-4 mb-4\">
                                                <div class=\"form-outline mb-4\">
                                                    <label for=\"\" style=\"display:block;font-size:17.5px;margin:5px auto\">Cost Per person</label>
                                                    <input  class=\"form-control form-control-lg\" value='$cost_per_person' name=\"cost_per_person\" type=\"number\" placeholder=\"Cost Per person\" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-4 mb-4\">
                                                <div class=\"form-outline mb-4\">
                                                    <label for=\"\" style=\"display:block;font-size:17.5px;margin:5px auto\">Wallet</label>
                                                    <input  class=\"form-control form-control-lg\" value='$wallet' value=\"0\" name=\"wallet\" type=\"number\" placeholder=\"Wallet\" >
                                                </div>
                                            </div>
                                            <div class=\"col-md-4 mb-4\">
                                                <div class=\"form-outline mb-4\">
                                                    <label for=\"\" style=\"display:block;font-size:17.5px;margin:5px auto\">Phone Number</label>
                                                    <input  class=\"form-control form-control-lg\" value='$phoneno' name=\"phoneno\" type=\"text\" placeholder=\"Phone Number\" >
                                                </div>
                                            </div>
                                            <div class=\"col-md-4 mb-4\">
                                                <div class=\"form-outline mb-4\">
                                                    <label for=\"\" style=\"display:block;font-size:17.5px;margin:5px auto\">Model</label>
                                                    <input  class=\"form-control form-control-lg\" value='$modal' name=\"modal\" type=\"text\" placeholder=\"Model\" >
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class=\"d-flex justify-content-end pt-3\">
                                            <a href=\"./profile.php\"  type=\"button\" class=\"btn btn-light btn-lg\">Back</a>
                                            <button type=\"submit\" class=\"btn btn-primary btn-lg ms-2\">Submit</button>
                                        </div>

                                    </div>
                                </form>";
                                        }

                                ?>
                            </div>

                        </div>
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