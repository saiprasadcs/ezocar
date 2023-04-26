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

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <a class="text-reset me-3" href="#">
                <li><a href="dashboard.php" style="font-size:17.5px"><i class="fas fa-tachometer-alt" style="margin:0px 5px;font-size:17.5px"></i>Dashboard</a> </li>
            </a>
            <a class="text-reset me-3" href="#">
                <li><a href="driversList.php" style="font-size:17.5px"><i class="fas fa-car-alt" style="margin:0px 5px;font-size:17.5px"></i>Drivers</a></li>
            </a>
            <a class="text-reset me-3" href="#">
                <li><a href="customerList.php" style="font-size:17.5px;text-decoration: underline"><i class="fas fa-people-carry" style="margin:0px 5px;font-size:17.5px"></i>Customers</a></li>
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
<div style="width:17.5%;display:block;float:right;text-align:right">
    <div style="width:50%;display:block;margin:10px auto;text-align:center;align-items:center;justify-content:center">
        <a href="../admin/addCustomer.php" style="font-size:17.5px;text-decoration:none">
            <button type="button" class="btn btn-primary" style="margin:0;border-radius:0">Add Customer</button>
        </a>
    </div>
</div>
<!-- Navbar -->
<section>
    <div class="container">
        <div class="text-center mt-5">
            <h4>Customers List</h4> 
        </div>

        <div class="d-flex justify-content-center">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Phone No</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['status'])){
                        $status=$_GET['status'];
                        $sql = "SELECT * FROM customer WHERE status='$status'";
                    }else{
                        $sql = "SELECT * FROM customer";
                    }
                        $result = $connection->query($sql);
                        while($row = $result->fetch(PDO::FETCH_ASSOC)){
                            $id = $row['id'];
                            if ($row['status'] == 1){
                                echo'<tbody>
                                        <tr>
                                            <th scope="row">'.$row['id'].'</th>
                                                <td><a href="viewHistory.php?id='.$row['id'].'?username='.$row['first_name'].'">'.$row['first_name'].'</a></td>
                                                <td>'.$row['last_name'].'</td>
                                                <td>'.$row['phoneno'].'</td>
                                                <td>'.$row['email'].'</td>
                                                <td><div>
                                                        <a  href="editCustomer.php?customerId='.$id.'" class="btn btn-outline-primary ml-3">Edit</a>
                                                    </div>
                                                </td>
                                        </tr>';
                            }else{
                                echo'<tbody>
                                        <tr>
                                            <th scope="row">'.$row['id'].'</th>
                                                <td>'.$row['first_name'].'</td>
                                                <td>'.$row['last_name'].'</td>
                                                <td>'.$row['phoneno'].'</td>
                                                <td>'.$row['email'].'</td>
                                                <td><div>
                                                        <a  href="approveCustomer.php?customerId='.$id.'" class="btn btn-outline-primary ml-3">Approve</a>
                                                    </div>
                                                </td>
                                        </tr>';
                            }

                        }
                                        ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

</body>

</html>
