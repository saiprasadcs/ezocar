<?php
include("../../connection.php");


?>
<!DOCTYPE html>
<html lang="en"><head>

    <meta charset="UTF-8">
    <title>EzoCar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles/ridesList.css">
    <link rel="stylesheet" href="../../styles/nav.css">
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
<!--            <a class="text-reset me-3" href="#">-->
<!--                <li><a  href=""><i class="fas fa-tachometer-alt"></i>Dashboard</a> </li>-->
<!--            </a>-->
            <a class="text-reset me-3" href="#">
                <li><a  href="myrides.php" style="    text-decoration: underline;" ><i class="far fa-address-book"></i>My Rides</a></li>
            </a>
            <a class="text-reset me-3" href="#">
                <li><a  href="bookRide.php"><i class="far fa-clone"></i>Book Ride</a></li>
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

<section class="mt-5">
    <div class="tr-job-posted section-padding">
        <div class="container">
            <div class="job-tab text-center">
                <ul class="nav nav-tabs justify-content-center" role="tablist">
                    <?php
                    if($_GET['type'] == '0') {
                        echo "   <li role=\"presentation\" class=\"active\">
                        <a class=\"\" href=\"myrides.php?type=1\" aria-controls=\"hot-jobs\" role=\"tab\" data-toggle=\"tab\" aria-selected=\"true\">Active</a>
                    </li>
                    <li role=\"presentation\"><a href=\"myrides.php?type=0\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"active show\" aria-selected=\"false\">In-Progress</a></li>
                    <li role=\"presentation\"><a href=\"myrides.php?type=2\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"\" aria-selected=\"false\">Rejected</a></li>
                         <li role=\"presentation\"><a href=\"myrides.php?type=3\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"\" aria-selected=\"false\">Picked</a></li>
                    <li role=\"presentation\"><a href=\"myrides.php?type= 4\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"\" aria-selected=\"false\">Completed</a></li>
                ";
                    }elseif ($_GET['type'] == '1'){
                        echo "   <li role=\"presentation\" class=\"active\">
                        <a class=\"active show\" href=\"myrides.php?type=1\" aria-controls=\"hot-jobs\" role=\"tab\" data-toggle=\"tab\" aria-selected=\"true\">Active</a>
                    </li>
                    <li role=\"presentation\"><a href=\"myrides.php?type=0\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"\" aria-selected=\"false\">In-Progress</a></li>
                    <li role=\"presentation\"><a href=\"myrides.php?type=2\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"\" aria-selected=\"false\">Rejected</a></li>
                         <li role=\"presentation\"><a href=\"myrides.php?type=3\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"\" aria-selected=\"false\">Picked</a></li>
                    <li role=\"presentation\"><a href=\"myrides.php?type=4\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"\" aria-selected=\"false\">Completed</a></li>
                ";
                    }elseif ($_GET['type'] == '2'){
                        echo "   <li role=\"presentation\" class=\"active\">
                        <a class=\"\" href=\"myrides.php?type=1\" aria-controls=\"hot-jobs\" role=\"tab\" data-toggle=\"tab\" aria-selected=\"true\">Active</a>
                    </li>
                    <li role=\"presentation\"><a href=\"myrides.php?type=0\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"\" aria-selected=\"false\">In-Progress</a></li>
                    <li role=\"presentation\"><a href=\"myrides.php?type=2\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"active show\" aria-selected=\"false\">Rejected</a></li>
                         <li role=\"presentation\"><a href=\"myrides.php?type=3\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"\" aria-selected=\"false\">Picked</a></li>
                    <li role=\"presentation\"><a href=\"myrides.php?type=4\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"\" aria-selected=\"false\">Completed</a></li>
                ";
                    }elseif ($_GET['type'] == '3'){
                        echo "   <li role=\"presentation\" class=\"active\">
                        <a class=\"\" href=\"myrides.php?type=1\" aria-controls=\"hot-jobs\" role=\"tab\" data-toggle=\"tab\" aria-selected=\"true\">Active</a>
                    </li>
                    <li role=\"presentation\"><a href=\"myrides.php?type=0\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"\" aria-selected=\"false\">In-Progress</a></li>
                    <li role=\"presentation\"><a href=\"myrides.php?type=2\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"\" aria-selected=\"false\">Rejected</a></li>
                    <li role=\"presentation\"><a href=\"myrides.php?type=3\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"active show\" aria-selected=\"false\">Picked</a></li>
                    <li role=\"presentation\"><a href=\"myrides.php?type=4\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"\" aria-selected=\"false\">Completed</a></li>
                ";
                    }elseif ($_GET['type'] == '4'){
                        echo "   <li role=\"presentation\" class=\"active\">
                        <a class=\"\" href=\"myrides.php?type=1\" aria-controls=\"hot-jobs\" role=\"tab\" data-toggle=\"tab\" aria-selected=\"true\">Active</a>
                    </li>
                    <li role=\"presentation\"><a href=\"myrides.php?type=0\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"\" aria-selected=\"false\">In-Progress</a></li>
                    <li role=\"presentation\"><a href=\"myrides.php?type=2\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"\" aria-selected=\"false\">Rejected</a></li>
                    <li role=\"presentation\"><a href=\"myrides.php?type=3\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"\" aria-selected=\"false\">Picked</a></li>
                    <li role=\"presentation\"><a href=\"myrides.php?type=4\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"active show\" aria-selected=\"false\">Completed</a></li>
                ";
                    }
                    else{
                        echo "   <li role=\"presentation\" class=\"active\">
                        <a class=\"\" href=\"myrides.php?type=1\" aria-controls=\"hot-jobs\" role=\"tab\" data-toggle=\"tab\" aria-selected=\"true\">Active</a>
                    </li>
                    <li role=\"presentation\"><a href=\"myrides.php?type=0\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"active show\" aria-selected=\"false\">In-Progress/a></li>
                    <li role=\"presentation\"><a href=\"myrides.php?type=2\" aria-controls=\"recent-jobs\" role=\"tab\" data-toggle=\"tab\" class=\"\" aria-selected=\"false\">Rejected</a></li>
                ";
                    }
                    ?>
                </ul>
                <div class="tab-content text-left">
                    <div role="tabpanel" class="tab-pane fade active show" id="hot-jobs">
                        <div class="row">
                            <?php
                            session_start();
                            include '../../connection.php';
                            $userId = $_SESSION['userId'];
                            $status = $_GET['type'];
                            $sql = "SELECT ride.id, ride.rider_name, ride.driver_id , 
                                    ride.rider_id, 
                                    CONCAT(driver.first_name,' ',driver.last_name) AS driver_name,
                                    driver.vehicle_number,driver.pickup_from,driver.pickup_to,
                                    driver.capacity,driver.cost_per_person,driver.occupied,driver.phoneno
                                    FROM `rides` as ride 
                                    LEFT JOIN driver ON ride.driver_id = driver.id
                                    WHERE rider_id='$userId' AND driver.status=1 AND ride.status='$status'";
                            $result = $connection->query($sql);
                                if($result)
                                {
                                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                        $rideId = $row['id'];
                                        if($status == '1' || $status == '2' || $status == '3' || $status == '0' ){
                                            echo "<div class=\"col-md-4\">
                                    <div class=\"card p-3 mb-2\">
                    <div class=\"d-flex justify-content-between\">
                        <div class=\"d-flex flex-row align-items-center\">
                            <div class=\"ms-2 c-details\">
                                <h6 class=\"mb-0\">".$row['driver_name']."</h6> <span>".$row['vehicle_number']."</span>
                            </div>
                        </div>
                        <a  class=\"btn btn-primary custom-btn\" href='cancelRide.php?rideId=$rideId'> <span>Cancel Ride</span> </a>
                    </div>
                    <div class=\"mt-5\">
                     <h5 class=\"heading\">£".$row['cost_per_person']."</h5>
                        <h3 class=\"heading\">".$row['pickup_from']." to ".$row['pickup_to']."</h3>
            
                        <div class=\"mt-5\">
                            <div class=\"progress\">
                                <div class=\"progress-bar\" role=\"progressbar\" style=\"width: 20%\" aria-valuenow=\"3\" aria-valuemin=\"0\" aria-valuemax=\"5\"></div>
                            </div>
                            <div class=\"mt-3\"> <span class=\"text1\">".$row['occupied']." Booked <span class=\"text2\">of ".$row['capacity']."</span></span> </div>
                       
                        </div>
                    </div>
                </div>
                                    </div>";
                                        }elseif($status == '4'){
                                            echo "<div class=\"col-md-4\">
                                    <div class=\"card p-3 mb-2\">
                    <div class=\"d-flex justify-content-between\">
                        <div class=\"d-flex flex-row align-items-center\">
                            <div class=\"ms-2 c-details\">
                                <h6 class=\"mb-0\">".$row['driver_name']."</h6> <span>".$row['vehicle_number']."</span>
                            </div>
                        </div>
                        <a  class=\"btn btn-primary custom-btn\"> <span>Completed</span> </a>
                    </div>
                    <div class=\"mt-5\">
                     <h5 class=\"heading\">£".$row['cost_per_person']."</h5>
                        <h3 class=\"heading\">".$row['pickup_from']." to ".$row['pickup_to']."</h3>
                        <div class=\"mt-5\">
                            <div class=\"progress\">
                                <div class=\"progress-bar\" role=\"progressbar\" style=\"width: 20%\" aria-valuenow=\"3\" aria-valuemin=\"0\" aria-valuemax=\"5\"></div>
                            </div>
                            <div class=\"mt-3\"> <span class=\"text1\">".$row['occupied']." Booked <span class=\"text2\">of ".$row['capacity']."</span></span> </div>
                       
                        </div>
                    </div>
                </div>
                                    </div>";
                                        }else{
                                          return 'ss';
                                        }

                                    }
                                }else{
                                    echo "No Data Available";
                                }
                            ?>
                        </div><!-- /.row -->
                    </div><!-- /.tab-pane -->
                </div>
            </div><!-- /.job-tab -->
        </div><!-- /.container -->
    </div>
</section>


</body>

</html>