<?php
// Start session and include database connection

session_start();
include("../../connection.php");

// Check if form has been submitted
if (isset($_POST['first_name'])) {

    // Initialize status message variable
    $statusMsg = '';

    // Set file upload path
    $targetDir = "../../uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check if file has been selected
    if (!empty($_FILES["file"]["name"])) {
        // Define allowed file types
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
            // TODO: Insert image file name into database
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                // Set status message for successful file upload
                if (true) {
                    $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                } else {
                    // Set status message for file upload failure
                    $statusMsg = "File upload failed, please try again.";

                    // Display error message and exit script
                    echo "<div class='form'>
                  <h3>$statusMsg</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
                    exit();
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";

                // Display error message and exit script
                echo "<div class='form'>
                  <h3>$statusMsg</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
                exit();
            }
        } else {
            // Set status message for disallowed file type
            $statusMsg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';

            echo "<div class='form'>
                  <h3>$statusMsg</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
            exit();
        }
    } else {
        $statusMsg = 'Please select a file to upload.';
        echo "<div class='form'>
                  <h3>$statusMsg</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
        exit();
    }
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

    // Check if the email is already in use by another driver
    $checkUser = "SELECT email FROM driver WHERE email='$email'";
    $checkUserResult = $connection->query($checkUser);
    $checkUserResult = $checkUserResult->fetchAll(PDO::FETCH_ASSOC);
    if (COUNT($checkUserResult) >= 1) {
        // If the email is already in use, display an error message
        echo "<div class='form'>
                  <h3>Email id Already Used</h3><br/>
                   <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
    } else {
        if ($password == $cpassword) {
            // If the passwords match, insert the new driver's information into the database
            $sql = "INSERT INTO driver (first_name,last_name,email,password,phoneno,
                    vehicle_number,licence_number,modal,capacity,pickup_from,pickup_to,cost_per_person, fileName, startTime, endTime, company)
                    VALUES ('$firstName','$lastName','$email','$password', '$phoneno',
                     '$vehicle_number','$licence_number','$modal','$capacity','$pickup_from','$pickup_to','$cost_per_person', '$fileName', 
                     '$startTime','$endTime', '$company')";
            $result = $connection->query($sql);

            if ($result) {
                // If the query was successful, display a success message
                echo "<div class='form'>
                  <h3>Registered SuccessFully</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
            } else {
                // If the query was not successful, display an error message
                echo "<div class='form'>
                  <h3>Required fields are missing</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
            }
        } else {
            // If the passwords do not match, display an error message
            echo "<div class='form'>
                  <h3>Invalid password</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>registration</a> again.</p>
                  </div>";
        }

    }
}
?>
