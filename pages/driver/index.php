<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/mainpage.css">
    <title>Driver Login Page</title>
</head>

<body>

    <div class="fullPage">
        <div class="navbar">
            <div><a href="">Ezocar</a></div> 
            <nav>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Contact</a></li>
                    <li><button type="button" name="button" onclick="document.getElementById('loginForm').style.display='block'">Login</button></li>
                </ul>
            </nav>
        </div>
        <div class="loginPage" id="loginForm">
            <div class="formBox">
                <a href="">Ezocar</a>
                <h3 style="color:white;text-align:center;margin:10px 0px 0px 0px;font-weight:10px">Driver Page</h3>
                <div class="buttonBox">
                    <div class="btn" id="btn"></div>
                    <button style="margin:auto 2.5px" type="button" name="button" class="toggle-btn" onclick="login()">Log In</button>
                    <button style="margin:auto 2.5px" type="button" name="button" class="toggle-btn" onclick="register()">Register</button>
                </div>
                <form class="inputGroupLogin" id="login" action="myrides.php" method="POST" onsubmit="return validation()">
                    <div style="margin:20px 0px 0px 0px">
                        <input type="text" class="inputField" name="username" placeholder="Email Id" >
                    </div>
                    <div style="margin:20px 0px 0px 0px ">
                        <input style="margin:0" type="password" class="inputField" name="password" placeholder="Enter Password" >
                    </div>
                    <div style="margin:30px 0px 0px 0px;">
                        <button style="font-size:20px;" type="submit" class="submitBtn">Log In</button>
                    </div>
                </form>
                <form class="inputGroupLogin" id="backToHomePage" action="../.." method="POST"
                      style="left:50px;display:flex;align-items:center;text-align:center;jusitfy-content:center;margin:219px auto 0px auto ">
                        <a href="../../" style="padding:5px 15px;">
                        <button type="submit" class="submitBtn" style="font-size:12.5px;width:100%;margin:0px auto 0px auto">
                        Back To Home Page</button></a>
                    </form>




                <form style="overflow-y: auto;height: 398px;"
                      class="inputGroupRegister" id="register"
                      method="POST" style="margin-top:15px;">
                    <input style="margin:30px auto 0px 0px "  type="text" name="first_name" class="inputField" placeholder="First Name" required>
                    <input style="margin:15px auto 0px 0px" type="text" name="last_name" class="inputField" placeholder="Last Name" required>
                    <input style="margin:15px auto 0px 0px" type="text" name="email" class="inputField" placeholder="Email Id" required>
                    <input style="margin:15px auto 0px 0px" type="text" name="phoneno" class="inputField" placeholder="Phone no" required>
                    <input style="margin:15px auto 0px 0px" type="text" name="vehicle_number" class="inputField" placeholder="vehicle No" required>
                    <input style="margin:15px auto 0px 0px" type="text" name="licence_number" class="inputField" placeholder="Licence No" required>
                    <input style="margin:15px auto 0px 0px" type="text" name="modal" class="inputField" placeholder="Modal" required>
                    <input style="margin:15px auto 0px 0px" type="text" name="capacity" class="inputField" placeholder="Capacity" required>
                    <input style="margin:15px auto 0px 0px" type="text" name="pickup_from" class="inputField" placeholder="From" required>
                    <input style="margin:15px auto 0px 0px" type="text" name="pickup_to" class="inputField" placeholder="To" required>
                    <input style="margin:15px auto 0px 0px" type="text" name="cost_per_person" class="inputField" placeholder="Cost per Person" required>
                    <input style="margin:15px auto 0px 0px" type="password" name="password" class="inputField" placeholder="Enter Password" required>
                    <input style="margin:15px auto 0px 0px" type="password" name="cpassword" class="inputField" placeholder="Confirm Password" required>
                    <a href="myrides.php" class="submitBtn"  style="font-size:15px;width:60%;padding:10px;margin-bottom: 70px;display:flex;text-align:center;justify-cotent:center;align-items:center" >Register</a>
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
    </script>
</body>
</html>
