<?php
    session_start();
    $Item = $_GET["Item"];
    $type = $_GET["type"];
    $price = $_GET["price"];
    $description = $_GET["description"];
    $contact = $_GET["contact"];
    $userID = $_SESSION["id"];
    $date = date("Y/m/d");

    $connection=mysqli_connect("localhost","root","","student_community");
    if(mysqli_connect_errno()){
        die("ERROR: could not connect" . mysqli_connect_error());
    }

    $sql = "INSERT INTO item (userid,item,type,price,description,contact,date,status) VALUES ('$userID','$Item','$type','$price','$description','$contact','$date','not sold')";
    if(mysqli_query($connection,$sql)){
        echo "Item inserted succefully";
    }
    else{
        echo "Failed to insert the item";
    }
?>