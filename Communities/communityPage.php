<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>My Communities</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="CommunitiesStyling.css">
        <script src="CommunitiesScripting.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    </head>
    <body onload="communityPageStart()">

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
        <div>
            <img src="images/SHIj.jpg" style="width: 100%;" alt="Image">
        </div>
        <div id="main" style="text-align:center">
           
    </body>
</html>