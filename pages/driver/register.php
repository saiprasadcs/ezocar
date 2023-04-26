<?php
session_start();
include("../../connection.php");
if (isset($_POST['first_name'])) {
    $statusMsg = '';
    $targetDir = "../../uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(!empty($_FILES["file"]["name"])){
        $allowTypes = array('jpg','png','jpeg');
        if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                if(true){
                    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                }else{
                    $statusMsg = "File upload failed, please try again.";
                    echo "<div class='form'>
                  <h3>$statusMsg</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
                    exit();
                }
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
                echo "<div class='form'>
                  <h3>$statusMsg</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
                exit();
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';

            echo "<div class='form'>
                  <h3>$statusMsg</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
            exit();
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
        echo "<div class='form'>
                  <h3>$statusMsg</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
        exit();
    }
// Display status message


    $role_id = 3;
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $phoneno = $_POST['phoneno'];
    $vehicle_number = $_POST['vehicle_number'];
    $licence_number = $_POST['licence_number'];
    $vehicle_number = $_POST['vehicle_number'];
    $modal = $_POST['modal'];
    $capacity = $_POST['capacity'];
    $pickup_from = $_POST['pickup_from'];
    $pickup_to = $_POST['pickup_to'];
    $cost_per_person = $_POST['cost_per_person'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $company = $_POST['company'];
        $checkUser  = "SELECT email FROM driver WHERE email='$email'";
    $checkUserResult = $connection->query($checkUser);
    $checkUserResult = $checkUserResult->fetchAll(PDO::FETCH_ASSOC);
        if (COUNT($checkUserResult) >= 1){
            echo "<div class='form'>
                  <h3>Email id Already Used</h3><br/>
                   <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
        }else{
            if ($password == $cpassword) {
                $sql = "INSERT INTO driver (role_id,first_name,last_name,email,password,phoneno,
                    vehicle_number,licence_number,modal,capacity,pickup_from,pickup_to,cost_per_person, fileName, startTime, endTime, company)
                    VALUES ('$role_id','$firstName','$lastName','$email','$password', '$phoneno',
                     '$vehicle_number','$licence_number','$modal','$capacity','$pickup_from','$pickup_to','$cost_per_person', '$fileName', 
                     '$startTime','$endTime', '$company')";
                $result = $connection->query($sql);

                if ($result) {
                    echo "<div class='form'>
                  <h3>Registered SuccessFully</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
                } else {
                    echo "<div class='form'>
                  <h3>Required fields are missing</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
                }
            }else{
                echo "<div class='form'>
                  <h3>Invalid password</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
            }

        }
}
?>
