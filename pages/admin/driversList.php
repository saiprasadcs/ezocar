<?php include("../../connection.php");?>
<!DOCTYPE html>
<html lang="en"><head>

    <meta charset="UTF-8">
    <title>EzoCar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
    <link rel="stylesheet" href="../../styles/nav.css">

</head>

<body translate="no">
    <div class="fullPage">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <a class="text-reset me-3" href="#">
                        <li><a href="dashboard.php" style="font-size:17.5px"><i class="fas fa-tachometer-alt" style="margin:0px 5px;font-size:17.5px"></i>Dashboard</a> </li>
                    </a>
                    <a class="text-reset me-3" href="#">
                        <li><a  href="driversList.php" style="font-size:17.5px;text-decoration: underline"><img src="../../assets/driver.png" style="width:20px;color:white;margin:0px 5PX;" alt="Driver">Drivers</a></li>
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
        <div style="width:17.5%;display:block;float:right;text-align:right">
            <div style="width:50%;display:block;margin:10px auto;text-align:center;align-items:center;justify-content:center">
                <a href="../admin/addDriver.php" style="font-size:17.5px;text-decoration:none">
                <button type="button" class="btn btn-primary" style="margin:0;border-radius:0">Add Driver</button>
                </a>
            </div>
        </div>
    </div>
<section>
    <div class="container" style="margin:110px auto">
        <div class="text-center mt-5" >
            <h4>Drivers List</h4>
        </div>
        <div class="d-flex justify-content-center">
            <table class="table table-hover" style="width: 100% !important;overflow-x: scroll">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Vehicle Number</th>
                    <th scope="col">Licence Number</th>
                    <th scope="col">Pickup From</th>
                    <th scope="col">Pickup To</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Cost Per Person</th>
                    <th scope="col">Wallet</th>
                    <th scope="col">Active Orders</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <?php
                    include("../../connection.php");
                    $sql = "SELECT *,CONCAT(first_name,' ', last_name) AS full_name FROM driver";
                    $result = mysqli_query($connection, $sql);
                    while($row = $result->fetch_assoc()){
                        $id= $row['id'];
                        if($row['status'] == 0) {
                            echo'<tbody>
                                    <tr>
                                        <th scope="row">'.$row['id'].'</th>
                                        <td>'.$row['first_name'].''.$row['last_name'].'</td>
                                        <td>'.$row['phoneno']. '</td>
                                        <td>'.$row['email']. '</td>
                                        <td>'.$row['vehicle_number'].'</td>
                                        <td>'.$row['licence_number'].'</td>
                                        <td>'.$row['pickup_from'].'</td>
                                        <td>'.$row['pickup_to'].'</td>
                                        <td>'.$row['capacity'].'</td>
                                        <td>'.$row['cost_per_person'].'</td>
                                        <td>'.$row['wallet'].'</td>
                                        <td>'.$row['active_orders'].'</td>
                                        <td>
                                        <div>
                                            <a href="approveDriver.php?driverId='.$id.'"  class="btn btn-outline-primary ml-3">Approve</a>
                                         </div>
                                        </td>
                                    </tr>';
                        }else{
                            echo'<tbody>
                                    <tr>
                                        <th scope="row">'.$row['id'].'</th>
                                        <td>'.$row['first_name'].''.$row['last_name'].'</td>
                                        <td>'.$row['phoneno']. '</td>
                                        <td>'.$row['email']. '</td>
                                        <td>'.$row['vehicle_number'].'</td>
                                        <td>'.$row['licence_number'].'</td>
                                        <td>'.$row['pickup_from'].'</td>
                                        <td>'.$row['pickup_to'].'</td>
                                        <td>'.$row['capacity'].'</td>
                                        <td>'.$row['cost_per_person'].'</td>
                                        <td>'.$row['wallet'].'</td>
                                        <td>'.$row['active_orders'].'</td>
                                        <td>
                                        <div>
                                            <a href="editDriver.php?driverId='.$id.'"  class="btn btn-outline-primary ml-3">Edit</a>
                                         </div>
                                        </td>
                                    </tr>';
                        }

                    }?>
                            </tbody>
            </table>
        </div>
    </div>
</section>
    <script>
        function something(){
            document.getElementById("mainArea").style.display='block';
        }

        window.addEventListener('mouseup', function(event){
            var box = document.getElementById('mainArea');
            if(event.target != box && event.target.parentNode != box){
                box.style.display='none';
            }
        })
    </script>
</body>

<!-- <script>
    
</script> -->

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
<script>
    function open(){
        document.getElementById("something").display.style='block';
    }

</script>
</html>