<?php
session_start();
include("../../connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>EzoCar</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
                    <li><a href="dashboard.php" style="font-size:17.5px"><i class="fas fa-tachometer-alt"
                                                                            style="margin:0px 5px;font-size:17.5px"></i>
                            Dashboard</a></li>
                </a>
                <a class="text-reset me-3" href="#">
                    <li><a href="driversList.php" style="font-size:17.5px;">
                            <i class="fas fa-car-alt" style="margin:0px 5px;font-size:17.5px"></i>Drivers</a></li>
                </a>
                <a class="text-reset me-3" href="#">
                    <li><a href="customerList.php" style="font-size:17.5px">
                            <i class="fas fa-people-carry" style="margin:0px 5px;font-size:17.5px"></i>Customers</a>
                    </li>
                </a>
                <a class="text-reset me-3" href="#">
                    <li><a href="profile.php"><i class="far fa-clone"></i>My Profile</a></li>
                </a>
                <a class="text-reset me-3" href="#">
                    <li><a href="../../" style="font-size:17.5px">Log Out</a></li>
                </a>
            </div>
            <div>
                <?php
                session_start();
                $name = $_SESSION['userName'];
                echo "$name"
                ?>
            </div>
        </div>
    </nav>
    <!-- Navbar -->
    <div style="width:17.5%;display:block;float:right;text-align:right">

    </div>
</div>
<section>
    <div class="container" style="margin:110px auto">
        <div class="text-center mt-5">
            <h4 style="color: #f3c693">Ride History</h4>
        </div>
        <div class="d-flex justify-content-center">
            <table class="table table-hover" style="width: 100% !important;overflow-x: scroll">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Driver Name</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <?php
                include("../../connection.php");

              if (isset($_GET['id'])) {
                    $rider_id = $_GET['id'];
                    // SQL query to select data from the rides table,
                    // joining with the driver and customer tables by rider_id
                    $sql = "SELECT  *,CONCAT(c.first_name,' ', c.last_name) 
                        AS customer_name,CONCAT(d.first_name,' ', d.last_name) 
                        AS driver_name, d.pickup_from,d.pickup_to FROM rides 
                        LEFT JOIN driver as d ON d.id=rides.driver_id
                         LEFT JOIN customer as c ON c.id=rides.rider_id
                          WHERE rider_id='$rider_id'";
                } elseif (isset($_GET['status'])) {
                    $status = $_GET['status'];
                    // SQL query to select data from the rides table,
                    // joining with the driver and customer tables by status
                    $sql = "SELECT  *,CONCAT(c.first_name,' ', c.last_name) 
                        AS customer_name,CONCAT(d.first_name,' ', d.last_name) 
                        AS driver_name, d.pickup_from,d.pickup_to FROM rides 
                        LEFT JOIN driver as d ON d.id=rides.driver_id
                         LEFT JOIN customer as c ON c.id=rides.rider_id
                          WHERE rides.status='$status'";
                } else {
                    // SQL query to select data from the rides table,
                    // joining with the driver and customer tables
                    $sql = "SELECT  *,CONCAT(c.first_name,' ', c.last_name) 
                        AS customer_name,CONCAT(d.first_name,' ', d.last_name) 
                        AS driver_name, d.pickup_from,d.pickup_to FROM rides 
                        LEFT JOIN driver as d ON d.id=rides.driver_id
                         LEFT JOIN customer as c ON c.id=rides.rider_id
                         ";
                }

                $result = $connection->query($sql);
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tbody>
                                    <tr>
                                     <th scope="row">' . $row['id'] . '</th>
                                        <td>' . $row['driver_name'] . '</td>
                                        <td>' . $row['customer_name'] . '</td>
                                        <td>' . $row['pickup_from'] . '</td>
                                        <td>' . $row['pickup_to'] . '</td>
                                        <td>' . $row['status'] . '</td>
                                    </tr>';
                } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
</body>
</html>
