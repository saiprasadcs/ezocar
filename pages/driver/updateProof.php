<?php
session_start();
include("../../connection.php");
if (isset($_GET['userId'])) {

    $statusMsg = '';
// File upload path
    $targetDir = "../../uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    print_r($_FILES);
    print_r($_FILES["file"]);
    print_r($_FILES["file"]["name"]);
    if(!empty($_FILES["file"]["name"])){
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
//            $insert = $connection->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
                if(true){
                    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                }else{
                    $statusMsg = "File upload failed, please try again.";
                    echo "<div class='form'>
                  <h3>$statusMsg</h3><br/>
                  <p class='link'>Click here to <a href='./profile.php'>Upload</a> again.</p>
                  </div>";
                    exit();
                }
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
                echo "<div class='form'>
                  <h3>$statusMsg</h3><br/>
                  <p class='link'>Click here to <a href='./profile.php'>Upload</a> again.</p>
                  </div>";
                exit();
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';

            echo "<div class='form'>
                  <h3>$statusMsg</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>Upload</a> again.</p>
                  </div>";
            exit();
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
        echo "<div class='form'>
                  <h3>$statusMsg</h3><br/>
                  <p class='link'>Click here to <a href='./index.php'>Upload</a> again.</p>
                  </div>";
        exit();
    }

    $userId = $_GET['userId'];
    $sql = "UPDATE driver SET fileName='$fileName' WHERE id ='$userId'";
    $result = $connection->query($sql);
    if ($result) {
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
