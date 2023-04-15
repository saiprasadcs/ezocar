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
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
<!--            <a class="text-reset me-3" href="#">-->
<!--                <li><a  href=""><i class="fas fa-tachometer-alt"></i>Dashboard</a> </li>-->
<!--            </a>-->
            <a class="text-reset me-3" href="#">
                <li><a  href="myrides.php?type=0"><i class="far fa-address-book"></i>My Rides</a></li>
            </a>
            <a class="text-reset me-3" href="#"  >
                <li><a style="    text-decoration: underline;"  href="bookRide.php"><i class="far fa-clone"></i>Book Ride</a></li>
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
<section>
    <div class="container mt-5 mb-3">
        <div class="row">
            <?php
            include '../../connection.php';
            $sql = "SELECT * FROM `driver` where status=1";
            $result = $connection->query($sql);
            if($result)
            {
                if($result->num_rows > 0)
                {
                    while($row = $result->fetch_assoc())
                    {
                            $id = $row['id'];
                            echo "<div class=\"col-md-4\">
                <div class=\"card p-3 mb-2\">
                    <div class=\"d-flex justify-content-between\">
                        <div class=\"d-flex flex-row align-items-center\">
                            <div class=\"ms-2 c-details\">
                                <h6 class=\"mb-0\">".$row['first_name'].' '.$row['last_name']."</h6> <span>TN06H2323</span>
                            </div>
                        </div>
                        <a  class=\"btn btn-primary\" href='bookCar.php?driverId=$id'> <span>Book</span> </a>
                    </div>
                    <div class=\"mt-5\">
                        <h3 class=\"heading\">".$row['pickup_from']." To<br>".$row['pickup_to']."</h3>
                        <div class=\"mt-5\">
                            <div class=\"progress\">
                                <div class=\"progress-bar\" role=\"progressbar\" style=\"width: 20%\" aria-valuenow=\"3\" aria-valuemin=\"0\" aria-valuemax=\"5\"></div>
                            </div>
                            <div class=\"mt-3\"> <span class=\"text1\">".$row['occupied']." Booked <span class=\"text2\">of ".$row['capacity']."</span></span> </div>
                        </div>
                    </div>
                </div>
            </div>";
                    }
                }
                else
                {
                    echo "No Rides are available";
                }
            }
            else
            {
                return $result->error;
                echo  $result->error;
            }
            ?>

        </div>
    </div>
</section>


</body>
</html>