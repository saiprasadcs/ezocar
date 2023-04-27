<?php
session_start();
?>
<html lang="en"><head>

    <meta charset="UTF-8">
    <title>EzoCar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
    <link rel="stylesheet" href="../../styles/nav.css">
</head>

<body >
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <a class="text-reset me-3" href="#">
                <li><a  href="myrides.php?type=0"><i class="far fa-address-book"></i>My Rides</a></li>
            </a>
            <a class="text-reset me-3" href="#">
                <li><a  href="bookRide.php"><i class="far fa-clone"></i>Book Ride</a></li>
            </a>
            <a class="text-reset me-3" href="#">
                <li><a  href="profile.php" style="    text-decoration: underline;" ><i class="far fa-clone"></i>My Profile</a></li>
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
    <div class="container-fluid p-0 m-0">
        <div class="col-12 m-0 p-0">
            <section style="background-color: #eee;">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                         class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3">
                                        <?php
                                        session_start();
                                        $walletValue = 0;
                                        include "../../connection.php";
                                        $id = $_SESSION['userId'];
                                        $sql = "SELECT * , CONCAT(last_name,' ',first_name) AS fullName 
                                                FROM customer where id='$id'";
                                        $result = $connection->query($sql);
                                        while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                        <?php echo $row['first_name'];?>
                                    </h5>

                                    <p class="text-muted mb-1">Wallet: <?php echo $row['wallet']?></p>
                                    <form name="walletForm"
                                          onsubmit="return validateWallet()"
                                          action="addWallet.php?userId=<?php echo $id?>" method="POST" >
                                    <div>
                                        <input class="form-control" name="wallet" placeholder="" type="number">
                                    </div>
                                    <div class="d-flex justify-content-center mb-2 mt-2">
                                        <button type="submit" class="btn btn-primary">Add Money</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-end mr-4">
                                        <div class="d-flex justify-content-center mb-2 mt-2">
                                            <?php
                                            $id = $_SESSION['userId'];
                                            echo '<a href="editCustomer.php?customerId='.$id.'" class="btn btn-primary">Edit Profile</a>';
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                                <?php echo $row['fullName'];
                                                echo '<br>';?>
                                            </p>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                                <?php echo $row['email'];
                                                echo '<br>';?>
                                            </p>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Phone</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                                <?php
                                                echo $row['phoneno'];
                                                echo '<br>';?>
                                            </p>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <?php break; }?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</section>

<script>
    function validateWallet(){
        var wallet = document.walletForm.wallet.value;
        if(wallet == "" ){
            alert("wallet value is Empty");
            return false;
        }else{
            if(wallet <= 0){
                alert("wallet is should not be 0");
                return false;
            }
        }
    }
</script>
</body>

</html>
