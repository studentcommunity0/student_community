<?php 
    require_once('session.php');
    include("database_connect.php");

    $reply = $_GET['reply'];
    $reviewID = $_GET['reviewID'];
    $userID = $_SESSION['id'];
    $date = date("Y/m/d");

    $sql = "INSERT INTO reply VALUES ('$reviewID','$userID','$date','$reply')";
    if(mysqli_query($connection,$sql)){
        echo "reply sent suceefully";
    }
    else{
        echo "failed to send the reply";
    }

?>