<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="stylesheet" href="eventsStyling.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../assets/css/maintheme.css">
    <link rel="stylesheet" href="../assets/css/sidenavbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body> 
    <!--NAVBAR-->
    <?php require('../studentcommunitynavbar.php');?>
    
    
    <div class="container" style="background-color: #3d3d3d; text-align: center;">
        <form class="form-inline md-form mb-4">
            <button class="btn join-btn" type="button" id="addNewEvent" onclick="goToAddEvent()">Add a new Event</button>
            <button class="btn join-btn" type="button" id="addNewEvent" onclick="goToCalender()">Events calender</button>
        </form>
    </div>
    
    <div class="container" style="background-color: #3a3a3a; border-radius: 15px;padding: 25px 3px;">
        <?php include("getAllEvents.php"); ?>
    </div>
    


    

    <script src="../assets/js/sidenavbar.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="eventsScripting.js"></script>
</body>
</html>