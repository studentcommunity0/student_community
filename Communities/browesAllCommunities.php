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
        <link rel="stylesheet" href="../assets/css/maintheme.css">
        <link rel="stylesheet" href="../assets/css/sidenavbar.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <script src="CommunitiesScripting.js"></script>
        <script src="../assets/js/sidenavbar.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body onload="getAllCommuniteis()">
        <!--NAVBAR-->
        <?php require('../studentcommunitynavbar.php');?>

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