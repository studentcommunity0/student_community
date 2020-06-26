<?php
    session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Training Evaluation</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="CommunitiesStyling.css">
        <script src="CommunitiesScripting.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-md" style="background-color: #24313e;" >
            <a class="navbar-brand" href="#">
                <a style="font-weight: bolder; color: gainsboro; font-size: 2em;">LOGO</a>
            </a>
            <button class="navbar-toggler"type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon" style="color: gainsboro;"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="navlinks nav-link" style="color: white;" href="#">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="navlinks nav-link" style="color: white;" href="#">CONTACT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="navlinks nav-link" style="color: white;" href="#">SIGNIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="navlinks nav-link" style="color: white;" href="#">NEW USER?</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="myCard" style="margin-left: 30%; margin-right: 30%; margin-top: 5%;  border-radius: 25px; "> 
            <h5 style="font-weight: bold; text-align: center; padding-top: 7%;">JOIN A PRIVATE COMMMUNITY FORM</h5><br>
            <hr>
            <form action="addNewCompany.php" id="add-company-form" style="margin-left: 5%; margin-right: 5%;">
                <div class="form-group">
                  <label for="exampleFormControlInput1" style="font-weight: bold;">Community Name:</label>
                  <input type="text" class="form-control" id="private-community-name">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1" style="font-weight: bold;">Community ID:</label>
                  <input type="text" class="form-control" id="private-community-id">
                </div>                
                <div class="form-group">
                    <button class="btn btn-rounded" id="add-company" style="background-color: #BC9051; font-weight: bold; color: white;" type="button" onclick="joinPrivateCommunities()">Join the Community</button>    
                </div>
                <a id="community-error-message" style="visibility: hidden; color: red; font-weight: bold;">Please fill the empty text inputs</a>
            </form>
            <br><br>
        </div>
    </body>
</html>