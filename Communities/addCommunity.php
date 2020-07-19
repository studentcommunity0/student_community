<?php
    session_start();
    $communityName = $_GET["communityName"];
    $communityDescription = $_GET["communityDescription"];
    $creator = $_SESSION["id"];
    $date = date("Y/m/d");
    $category = $_GET["category"];
    $availability = $_GET["availability"];
    $userid = $_SESSION["id"];

    $connection=mysqli_connect("localhost","root","","student_community");
    if(mysqli_connect_errno()){
        die("ERROR: could not connect" . mysqli_connect_error());
    }

    $sql = "INSERT INTO community (name,description,creator,date,category,availability)
            VALUES ('$communityName','$communityDescription','$creator','$date','$category','$availability')";
    $sql2 = "INSERT INTO communities_participants (community_name,participant_id)
    VALUES ('$communityName','$userid')";
            
        if(mysqli_query($connection, $sql) && mysqli_query($connection, $sql2)){
            echo "Community added succefully";
        }
        else{
            echo "This community is already exist";
        }
?>