<?php
    session_start();
    $communityName=$_GET['communityName'];
    $userID = $_SESSION['id'];

    $connection = mysqli_connect("localhost","root","","student_community");
    if(mysqli_connect_errno()){
        die("Error: could not connect" . mysqli_connect_error());
    }

    $sql = "DELETE FROM invitation WHERE recipient_id = '$userID' AND community_name = '$communityName'";
    if(mysqli_query($connection,$sql)){
        echo "removed";
    }
    else{
        echo "wrong query";
    }
?>