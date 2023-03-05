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
            <a class="text-reset me-3" href="#">
                <li><a  href=""><i class="fas fa-tachometer-alt"></i>Dashboard</a> </li>
            </a>
            <a class="text-reset me-3" href="#">
                <li><a  href="myrides.php"><i class="far fa-address-book"></i>My Rides</a></li>
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
    </div>
</nav>
<!-- Navbar -->

<section class="mt-5">
    <div class="tr-job-posted section-padding">
        <div class="container">
            <div class="job-tab text-center">
                <ul class="nav nav-tabs justify-content-center" role="tablist">
                    <li role="presentation" class="active">
                        <a class="active show" href="#hot-jobs" aria-controls="hot-jobs" role="tab" data-toggle="tab" aria-selected="true">Active</a>
                    </li>
                    <li role="presentation"><a href="#recent-jobs" name="Active"aria-controls="recent-jobs" role="tab" data-toggle="tab" class="" aria-selected="false">Taken</a></li>
                    <li role="presentation"><a href="#recent-jobs" aria-controls="recent-jobs" role="tab" data-toggle="tab" class="" aria-selected="false">Pending</a></li>
                    <li role="presentation"><a href="#recent-jobs" aria-controls="recent-jobs" role="tab" data-toggle="tab" class="" aria-selected="false">Upcoming</a></li>
                    <li role="presentation"><a href="#recent-jobs" aria-controls="recent-jobs" role="tab" data-toggle="tab" class="" aria-selected="false">Rejected</a></li>
                </ul>
                <div class="tab-content text-left">
                    <div role="tabpanel" class="tab-pane fade active show" id="hot-jobs">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card p-3 mb-2">
                                <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                <div class="ms-2 c-details">
                                <h6 class="mb-0">nameee</h6> <span>232423</span>
                            </div>
                        </div>
                        <a  class="btn btn-primary custom-btn" > <span>Cancel Ride</span> </a>
                    </div>
                    <div class="mt-5">
                        <h3 class="heading">from place To<br>Place</h3>
                        <div class="mt-5">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5"></div>
                        </div>
                        <div class="mt-3"> <span class="text1">3 Booked <span class="text2">of 5</span></span> </div>

                    </div>
                </div>
            </div>
        </div>
                        </div><!-- /.row -->
                    </div><!-- /.tab-pane -->
                </div>
            </div><!-- /.job-tab -->
        </div><!-- /.container -->
    </div>
</section>
</body>
</html>