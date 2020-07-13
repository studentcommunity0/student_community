<?php

session_start();

$connection=mysqli_connect("localhost","root","","student_community");

if(mysqli_connect_errno()){
    die("ERROR: could not connect" . mysqli_connect_error());
}

if(isset($_POST['upload'])){

    //the path to store the uploaded image
    $target = "flyerImages/".basename($_FILES['imageUploaded']['name']);

    //get all submitted data 
    $image = $_FILES['imageUploaded']['name'];
    $eventName = $_POST['eventName']; 
    $eventDescription = $_POST['eventDesc'];
    $dateOfEvent = $_POST['dateOfEvent'];
    $eventType = $_POST['eventType'];
    // other data
    $eventCommunity = $_SESSION['community_name'];
    $dateAdded = date("Y/m/d");

    //insert image to the database
    $sql = "INSERT INTO events (name,description,image,community,date_of_event,date_added,type) VALUES ('$eventName','$eventDescription','$image','$eventCommunity','$dateOfEvent','$dateAdded','$eventType')";
    if(mysqli_query($connection, $sql)){
        echo "event added succefully";
    }
    else{
        echo "error";
    }
    // move the image to the flyerimages file
    if(move_uploaded_file($_FILES['imageUploaded']['tmp_name'], $target )){
        echo "moving completed";
        header("Location: events.php");
    }else{
        echo "error in moving the file";
    }



};




?>