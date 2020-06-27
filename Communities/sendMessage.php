<?php
    session_start();
    $connection = mysqli_connect("localhost","root","","student_community");

    if($_SERVER['REQUEST_METHOD'] == "GET"){
    $userName = $_SESSION['username'];
    $userID = $_SESSION['id'];
    $communityName=$_SESSION['community_name'];
    $message =mysqli_real_escape_string( $connection, $_GET['message']);
    echo $message;
    }
    else{
        echo "there is a problem";
    }
?>