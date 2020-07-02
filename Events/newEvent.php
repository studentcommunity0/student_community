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
    
    <div class="myCard" style="margin-left: 30%; margin-right: 30%; margin-top: 5%;  border-radius: 25px; "> 
        <h5 style="font-weight: bold; text-align: center; padding-top: 7%;">ADD A NEW EVENT</h5><br>
        <hr>

        <form action="addEvent.php" method="POST" enctype="multipart/form-data" id="add-company-form" style="margin-left: 5%; margin-right: 5%;">
            <div class="form-group">
                <label for="exampleFormControlInput1" style="font-weight: bold;">Event Name:</label>
                <input type="text" class="form-control" id="community-name" name="eventName">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1" style="font-weight: bold;">Event Description</label>
                <textarea class="form-control" id="community-disc" rows="3" name="eventDesc"></textarea>
            </div>
            <div class="form-group">
                <label for="" style="font-weight: bold;">Date of event:</label><br>
                <input type="date" id="" name="dateOfEvent">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1" style="font-weight: bold;">Upload event flyer</label>
                <!--add flyer--> 
                <br>
                <input type="file" value="upload flyer" name="imageUploaded" class=" btn-rounded"  style="margin-left: 100px;">    
            </div>
            <br><br>
            <div class="form-group" >
                <input type="submit" value="add event" name="upload" class="btn btn-rounded" id="add-company" style="background-color: #BC9051; font-weight: bold; color: white;">    
            </div>
            <a id="community-error-message" style="visibility: hidden; color: red; font-weight: bold;">Please fill the empty text inputs</a>
        </form>
        <br><br>
    </div>
    

    <script src="../assets/js/sidenavbar.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="eventsScripting.js"></script>
</body>
</html>