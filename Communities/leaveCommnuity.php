<?php
    session_start();
    $userID = $_SESSION['id'];
    $communityName = $_GET['communityName'];

    $connection = mysqli_connect("localhost","root","","student_community");
    if(mysqli_connect_errno()){
        die("Error: could not connect" . mysqli_connect_error());
    }

    $sql = "DELETE FROM communities_participants WHERE community_name = '$communityName' AND participant_id = $userID";
    if($result = mysqli_query($connection,$sql)){
            echo "You left $communityName";
    }
    else{
        echo "did not perform the query";
    }
?>