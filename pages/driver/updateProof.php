<?php
session_start();
include("../../connection.php");
if (isset($_GET['userId'])) {
    // Initialize a variable to hold status message
    $statusMsg = '';

    // Set the target directory for file upload
    $targetDir = "../../uploads/";

    // Get the name of the uploaded file
    $fileName = basename($_FILES["file"]["name"]);

    // Set the target file path
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Check if a file has been uploaded
    if(!empty($_FILES["file"]["name"])){
        // Define an array of allowed file types
        $allowTypes = array('jpg','png','jpeg');

        // Check if the uploaded file type is allowed
        if(in_array($fileType, $allowTypes)){

            // Upload the file to the server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){

                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                // Set an error message if there was an error uploading the file
                $statusMsg = "Sorry, there was an error uploading your file.";
                // Display the error message and provide a link to try again
                echo "<div class='form'>
                  <h3>$statusMsg</h3><br/>
                  <p class='link'>Click here to <a href='./profile.php'>Upload</a> again.</p>
                  </div>";
                exit();
            }
        }else{
            // Set an error message if the uploaded file type is not allowed
            $statusMsg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
            // Display the error message and provide a link to try again
            echo "<div class='form'>
                  <h3>$statusMsg</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>Upload</a> again.</p>
                  </div>";
            exit();
        }
    }else{
        // Set an error message if no file has been selected for upload
        $statusMsg = 'Please select a file to upload.';
        // Display the error message and provide a link to try again
        echo "<div class='form'>
                  <h3>$statusMsg</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>Upload</a> again.</p>
                  </div>";
        exit();
    }

    // Get the user ID from the GET request
    $userId = $_GET['userId'];


    // Update the driver table in the database with the uploaded file name
    $sql = "UPDATE driver SET fileName='$fileName' WHERE id ='$userId'";
    $result = $connection->query($sql);

    // Check if the query was successful
    if ($result) {

        // Redirect the user to their profile
        header("Location:profile.php");
        echo "<div class='form'>
                  <h3>$statusMsg</h3><br/>
                  <p class='link'>Click here to <a href='./profile.php'>Go to my profile</a>.</p>
                  </div>";
    } else {
        echo "<div class='form'>
                 <h3>Required fields are missing</h3><br/>
                 </div>";
    }
}
?>
