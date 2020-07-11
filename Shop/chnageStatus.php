<?php
    session_start();
    $status = $_GET['status'];
    $id = $_GET['id'];

    $connection=mysqli_connect("localhost","root","","student_community");
    if(mysqli_connect_errno()){
        die("ERROR: could not connect" . mysqli_connect_error());
    }

    $sql = "UPDATE item SET status = '$status' WHERE id='$id'";
    if(mysqli_query($connection,$sql)){
        echo "Status of this item is changed to ". $status;
    }
    else{
        echo "Failed to change the status to ". $status;
    }
?>