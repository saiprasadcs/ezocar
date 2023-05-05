<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yinka Enoch Adedokun">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
    <link rel="stylesheet" href="../../styles/nav.css">
    <title>Admin Dashboard Page</title>
</head>
<body>
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
                <li><a href="customerList.php" style="font-size:17.5px"><i class="fas fa-people-carry" style="margin:0px 5px;font-size:17.5px"></i>Customers</a></li>
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

<div class="container d-flex justify-content-center">
        <div class="row w-100 d-flex justify-content-between mt-5 mx-5">
            <div class="col-md-4">
                <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                        <div class="row d-flex justifiy-content-end">
                            <p class="mb-1 w-50" style="font-size: 16px;">
                                <a href="driversList.php">Total Drivers</a></p>
                            <p class="mb-1 text-end w-50" style="font-size: 16px;">

<!-- fetching all total drivers data-->
                                <?php
                                include '../../connection.php';
                                // Select all drivers from the `driver` table
                                $sql = "SELECT * FROM `driver`";
                                $result = $connection->query($sql);
                                // Fetch all results as an associative array
                                $result = $result->fetchAll(PDO::FETCH_ASSOC);
                                // Get the ID of the currently logged in user from the session
                                $id = $_SESSION['userId'];
                                // If there are results, print the count
                                if ($result){
                                    
                                    echo COUNT($result);
                                }
                                ?>
                                <!-- fetching all total drivers data ends-->
                            </p>
                        </div>
                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="mt-4"></span>
                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                        <div class="row d-flex justifiy-content-end">
                            <p class="mb-1 w-50" style="font-size: 16px;"><a href="customerList.php">Total Customers</a></p>
                            <p class="mb-1 text-end w-50" style="font-size: 16px;">
                                <!-- fetching all total customer data from customer-->
                                <?php
                                include '../../connection.php';
                                // Select all customers from the database
                                $sql = "SELECT * FROM `customer`";
                                 // Execute the query and get the result set
                                $result = $connection->query($sql);
                                // Fetch all the results into an associative array
                                $result = $result->fetchAll(PDO::FETCH_ASSOC);
                                // Get the ID of the current user from the session
                                $id = $_SESSION['userId'];
                                // If there are results, print the count of customers
                                if ($result){
                                    echo COUNT($result);
                                }
                                ?>
                            </p>
                        </div>

                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="mt-4"></span>
                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                        <div class="row d-flex justifiy-content-end">
                            <p class="mb-1 w-50" style="font-size: 16px;"><a href="viewHistory.php">Total Rides</a></p>
                            <p class="mb-1 text-end w-50" style="font-size: 16px;">
                                <?php
                                include '../../connection.php';
                                // select all rows from 'rides' table
                                $sql = "SELECT * FROM `rides`";
                                $result = $connection->query($sql);
                                // fetch all rows as an associative array
                                $result = $result->fetchAll(PDO::FETCH_ASSOC);
                                // get the ID of the currently logged in user 
                                $id = $_SESSION['userId'];
                                // output the number of rows fetched from the 'rides' table
                                if ($result){
                                    echo COUNT($result);
                                }
                                ?>
                            </p>
                        </div>
                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="mt-4"></span>
                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                        <div class="row d-flex justifiy-content-end">
                            <p class="mb-1 w-50" style="font-size: 16px;"><a href="driversList.php?status=1">Active Drivers</a></p>
                            <p class="mb-1 text-end w-50" style="font-size: 16px;">
                                <!-- fetching all total ACTIVE drivers data-->
                                <?php
                                include '../../connection.php';
                                // select all drivers with status = 1
                                $sql = "SELECT * FROM `driver` WHERE status=1";
                                // execute the query and get the result
                                $result = $connection->query($sql);
                                $result = $result->fetchAll(PDO::FETCH_ASSOC);
                                $id = $_SESSION['userId'];
                                // if the query returns any result, print the count
                                if ($result){
                                    echo COUNT($result);
                                }
                                ?>
                            </p>
                        </div>
                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="mt-4"></span>
                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                        <div class="row d-flex justifiy-content-end">
                            <p class="mb-1 w-50" style="font-size: 16px;"><a href="customerList.php?status=1">Active Customers</a></p>
                            <p class="mb-1 text-end w-50" style="font-size: 16px;">
                                <?php
                                include '../../connection.php';
                                 // Create the SQL query to select all rows from the "customer" table where status=1
                                $sql = "SELECT * FROM `customer` WHERE status=1";
                                // Execute the query and fetch all rows as an associative array
                                $result = $connection->query($sql);
                                $result = $result->fetchAll(PDO::FETCH_ASSOC);
                                $id = $_SESSION['userId'];
                                // If the query returned any rows, output the count
                                if ($result){
                                    echo COUNT($result);
                                }
                                ?>
                            </p>
                        </div>
                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="mt-4"></span>
                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                        <div class="row d-flex justifiy-content-end">
                            <p class="mb-1 w-50" style="font-size: 16px;"><a href="viewHistory.php?status=4">Completed Rides</a></p>
                            <p class="mb-1 text-end w-50" style="font-size: 16px;">
                                <?php
                                include '../../connection.php';
                                // SQL query to select all rides where status is 4
                                $sql = "SELECT * FROM `rides` WHERE status=4";
                                // Execute the SQL query
                                $result = $connection->query($sql);
                                // Fetch all rows as an associative array
                                $result = $result->fetchAll(PDO::FETCH_ASSOC);
                                // Get the user ID from the session
                                $id = $_SESSION['userId'];
                                // If the query returned results, output the count of rows
                                if ($result){
                                    echo COUNT($result);
                                }
                                ?>
                            </p>
                        </div>
                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="mt-4"></span>
                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>

</body>
</html>



