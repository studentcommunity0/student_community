<?php
    session_start();
    $communityName=$_SESSION['community_name'];
    $id = $_GET['id'];
    $connection = mysqli_connect("localhost","root","","student_community");
    if(mysqli_connect_errno()){
        die("Error: could not connect" . mysqli_connect_error());
    }

    $sql = "DELETE FROM communities_participants WHERE community_name = '$communityName' AND participant_id = '$id'";
    if(mysqli_query($connection,$sql)){
        echo "Member deleted";
    }
    else{
        echo "wrong query";
    }
?>