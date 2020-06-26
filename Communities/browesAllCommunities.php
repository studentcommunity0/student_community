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
    </head>
    <body onload="getAllCommuniteis()">
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
            <img src="images/SHI.jpg" style="width: 100%;" alt="Image">
        </div>
            <div class="row" style="background-color: #24313e; margin-right: 2%; margin-left: 2%; padding-left: 3%;">
                <h4 style="color: white;">All Communities</h4>
            </div>
            <div class="row myCard2">
                <div class="col">
                    <form class="form-inline md-form mr-auto mb-4">
                        <button class="btn search-btn" onclick="allCommunitiesSearch()" type="button">
                            <i class="material-icons">search</i>
                        </button>
                        <input class="form-control mr-sm-2" id ="allCommunities-search-input" style="width: 60%; background-color: beige;" type="text" placeholder="Search" onchange="search()" aria-label="Search">
                        <button class="btn join-btn" type="button" onclick="goToAddCommunity()">Add a new community</button>
                        <button class="btn join-btn" style="margin-left: 1%;" type="button" onclick="goToPrivateCommunities()">Join a private community</button>
                    </form>
                </div>
            </div>
            <div class="col myCard" id="AllCommunities">
            </div>
        <div style="background-color:rgb(58, 58, 58); margin-top: 10%;">
            <br><br><br>
            <br><br><br>
            <br><br><br>
            <br><br><br>
        </div>
    </body>
</html>