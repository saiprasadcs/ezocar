<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yinka Enoch Adedokun">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../styles/mainpage.css">
    <title>Admin Login Page</title>
</head>
<style>
</style>
<body>
<div class="fullPage">

<!--    admin login page design code starts-->
    <div class="loginPage" id="loginForm">
        <div class="formBox">
            <a href="dashboard.php" style="color:#F3C693;">Ezocar</a>
            <form class="inputGroupLogin" name="login" style="top:110px" id="login" action="login.php" method="POST"
                  onsubmit="return validation()">
                <div style="margin:5px">
                    <input type="text" class="inputField" id="username" name="username" placeholder="Email Id">
                </div>
                <div style="margin:5px 0px">
                    <input type="password" class="inputField" name="password" placeholder="Enter Password">
                </div>
                <div style="margin:30px auto 0px auto;display:flex;text-align:center;justify-cotent:center;align-items:center">
                    <button style="font-size:20px;padding:5px;margin:10px auto 0px auto;display:flex;text-align:center;justify-cotent:center;align-items:center"
                            type="submit" style="" class="submitBtn">Log In
                    </button>
                </div>
            </form>

            <form class="inputGroupLogin" id="backToHomePage" action="../.."
                  style="left:50px;display:flex;align-items:center;text-align:center;jusitfy-content:center;margin:191px auto 0px auto ">
                <a style="text-decoration:none">
                    <button type="submit" class="submitBtn"
                            style="padding:6.5px 15px;font-size:15px;width:100%;margin:0px auto 0px auto">
                        Back To Home Page
                    </button>
                </a>
            </form>
        </div>
    </div>
    <!--    admin login page design code starts-->
</div>

<script>
    function validation() {
        var username = document.login.username.value;
        var password = document.login.password.value;
        if (username == "" && password == "") {
            alert("Username And Password are Empty");
            return false;
        } else {
            if (username == "") {
                alert("Username is Empty");
                return false;
            } else if (password == "") {
                alert("Password is Empty");
                return false;
            }
        }

    }
</script>
</body>
</html>
