<?php
    session_start();
    $userID = $_SESSION['id'];
    $communityName = $_GET['communityName'];
    $communityID = $_GET['communityID'];

    $connection = mysqli_connect("localhost","root","","student_community");
    if(mysqli_connect_errno()){
        die("Error: could not connect" . mysqli_connect_error());
    }

    $sql = "SELECT * FROM community WHERE id = '$communityID' AND name = '$communityName';";
    if($result = mysqli_query($connection,$sql)){
        if(mysqli_num_rows($result)!=0){
            $sql2 = "INSERT INTO communities_participants VALUES ('$communityName','$userID');";
            if(mysqli_query($connection,$sql2)){
                echo "You are added to $communityName community";
            }
            else{
                echo "did not insert the participant succefully";
            }
        }
        else{
            echo "this community does not exist";
        }
    }
    else{
        echo "did not perform the query";
    }
?>