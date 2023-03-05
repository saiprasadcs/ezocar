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
            <table class="table table-hover" style="width: 75% !important;overflow-x: scroll">
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
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>saiprasad</td>
                    <td>3562345</td>
                    <td>s@gmail.com</td>
                    <td>32323</td>
                    <td>32413</td>
                    <td>sdfsdf</td>
                    <td>as234</td>
                    <td>2</td>
                    <td>240</td>
                    <td>23</td>
                    <td>2</td>
                    <td><div>
                            <a  href="editCustomer.php?customerId='.$id.'" class="btn btn-outline-primary ml-3">Approve</a>
                            <a href="editDriver.php"  class="btn btn-outline-primary ml-3">Edit</a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
</body>

<!-- <script>
    
</script> -->
</html>