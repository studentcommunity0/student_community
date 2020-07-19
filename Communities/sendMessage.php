<?php
    session_start();
    $communityName = $_SESSION["community_name"];
    $date = date("Y/m/d");
    $TextareaInput = $_GET['TextareaInput'];
    $userID = $_SESSION['id'];
    
    $connection=mysqli_connect("localhost","root","","student_community");
    if(mysqli_connect_errno()){
        die("ERROR: could not connect" . mysqli_connect_error());
    }

    $sql = "INSERT INTO communities_messages (community_name,user_id,date,message) VALUES ('$communityName','$userID','$date','$TextareaInput');";
            
        if(mysqli_query($connection, $sql)){
            echo "Message sent succefully";
        }
        else{
            echo "Failed to send";
        }        
?>