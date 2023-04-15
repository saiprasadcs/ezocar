<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>-->
<!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>-->
    <!-- <link rel="stylesheet" type="text/css" href="../../styles/common.css"> -->
    <link rel="stylesheet" href="../../styles/mainpage.css">
    <title>Customer Login Page</title>
</head>
<body>
    <div class="fullPage">
            <!-- <div class="navbar">
                <div><a href="" style = "color:#F3C693;">Ezocar</a></div>
                <nav>
                    <ul>
                        <li><a href="" style = "color:#F3C693;">Home</a></li>
                        <li><a href="" style = "color:#F3C693;">About</a></li>
                        <li><a href="" style = "color:#F3C693;">Services</a></li>
                        <li><a href="" style = "color:#F3C693;">Contact</a></li>
                        <li><button type="button" name="button" onclick="document.getElementById('loginForm').style.display='block'" style = "color:#F3C693;">Login</button></li>
                    </ul>
                </nav>
            </div> -->
            <div class="loginPage" id="loginForm">
                <div class="formBox">
                    <a href="" style="font-size:50px;padding:0;color:#F3C693;">Ezocar</a>
                    <h3 style="color:white;text-align:center;margin:0px 0px 0px 0px;font-weight:10px">Customer Page</h3>
                    <div class="buttonBox">
                        <div class="btn" id="btn"></div>
                        <button style="margin:auto 2.5px" type="button" name="button" class="toggle-btn" onclick="login()">Log In</button>
                        <button style="margin:auto 2.5px" type="button" name="button" class="toggle-btn" onclick="register()">Register</button>
                    </div>
                    <form class="inputGroupLogin" id="login" action="login.php" method="POST">
                        <div style="margin:10px 0px 0px 0px">
                            <input type="text" class="inputField" name="username" placeholder="Email Id" >
                        </div>
                        <div style="margin:5px 0px 0px 0px ">
                            <input type="password" class="inputField" name="password" placeholder="Enter Password" >
                        </div>

                        <div style="margin:10px auto 0px auto;display:flex;text-align:center;justify-cotent:center;align-items:center">
                        <button style="font-size:20px;padding:5px;margin:10px auto 0px auto;display:flex;text-align:center;justify-cotent:center;align-items:center" type="submit" style=""class="submitBtn">Log In</button>
                        </div>
                    </form>
                    <form class="inputGroupLogin" id="backToHomePage" action="../.." method="POST" style="left:50px;display:flex;align-items:center;text-align:center;jusitfy-content:center;margin:250px auto 0px auto">
                        <a href="../../" style="text-decoration:none" style="padding:5px 15px;">
                        <button type="submit" class="submitBtn" style="font-size:12.5px;width:100%;margin:0px auto 0px auto">
                        Back To Home Page</button></a>
                    </form>
    
                    <form class="inputGroupRegister" id="register" action="registerCustomer.php" method="POST">
                    <input style="margin:5px auto 0px 0px "  type="text" name="first_name" class="inputField" placeholder="First Name" required>
                    <input style="margin:5px auto 0px 0px" type="text" name="last_name" class="inputField" placeholder="Last Name" required>
                    <input style="margin:5px auto 0px 0px" type="email" name="email" class="inputField" placeholder="Email Id" required>
                    <input style="margin:5px auto 0px 0px" type="text" name="phoneno" class="inputField" placeholder="Phone no" required>
                    <input style="margin:5px auto 0px 0px" type="password"  name="password" class="inputField" placeholder="Enter Password" required>
                    <input style="margin:5px auto 0px 0px" type="password" name="cpassword" class="inputField" placeholder="Confirm Password" required>
                    <button type="submit" class="submitBtn"  style="font-size:15px;width:60%;padding:10px;margin:17.5px auto 0px auto;display:flex;text-align:center;justify-cotent:center;align-items:center" >Register</button>
                </form>
                </div>
            </div>
        </div>
<script>
        var b = document.getElementById("backToHomePage");
        var selectedField = document.getElementById("selectedField");
        var x=document.getElementById('login');
        var y=document.getElementById('register');
        var z=document.getElementById('btn');
        function register(){
            b.style.left='-400px';
            x.style.left='-400px';
            y.style.left='50px';
            z.style.left='110px';
        }
        function login(){
            b.style.left='50px';
            x.style.left='50px';
            y.style.left='450px';
            z.style.left='0px';
        }

        function validation(){
            var username = document.login.username.value;
            var password = document.login.password.value;
            if(username == "" && password == ""){
                alert("Username and Password are Empty");
                return false;
            }else{
                if(username==""){
                    alert("Username is Empty");
                    return false;
                }else if(password==""){
                    alert("Password is Empty");
                    return false;
                }
            }
        }
        // function registerValidation(){
        //     first_name
        //     last_name
        //     email
        //     password1
        //     password2
        //     var username = document.register.first_name.value;
        //     var password = document.register.last_name.value;
        //     var email = document.register.email.value;
        //     var password1 = document.register.password1.value;
        //     var password2 = document.register.password2.value;
        //     if(username == "" && password == "" email == "" password1 == "" password2 == ""){
        //         echo ("Fill all ")
        //     }
        // }
    

</script>




</body>
</html> 