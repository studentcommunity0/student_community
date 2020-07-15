<?php
    session_start();
    $messageID = $_GET['messageID'];
    $date = date("Y/m/d");
    $TextareaInput = $_GET['TextareaInput'];
    $userID = $_SESSION['id'];
    
    $connection=mysqli_connect("localhost","root","","student_community");
    if(mysqli_connect_errno()){
        die("ERROR: could not connect" . mysqli_connect_error());
    }

    $sql = "INSERT INTO communities_replies (message_id,userid,date,reply) VALUES ('$messageID','$userID','$date','$TextareaInput');";
            
        if(mysqli_query($connection, $sql)){
            echo "Message sent succefully";
        }
        else{
            echo "Failed to send";
        }
?>