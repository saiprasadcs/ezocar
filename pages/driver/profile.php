
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
                <li><a  href=""><i class="fas fa-tachometer-alt"></i>Dashboard</a> </li>
            </a>
            <a class="text-reset me-3" href="#">
                <li><a  href="myrides.php"><i class="far fa-address-book"></i>My Rides</a></li>
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
<section>
    <div class="container-fluid p-0 m-0">
        <div class="col-12 m-0 p-0">
            <section style="background-color: #eee;">
                <div class="container py-5">
                    <div class="row">
                        <div class="col">
                            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="../admin/customerList.php">Customer</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Customer Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                         class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3">
                                    sfsdf
                                    </h5>
                                    <p class="text-muted mb-1">Wallet: 23</p>
                                    <form name="walletForm"
                                          onsubmit="return validateWallet()" method="POST" >
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
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                                namee
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
                                               emailidsdf
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
                                                3245345
                                            </p>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Vechile No</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">
                                               32323
                                            </p>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"></p>
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
