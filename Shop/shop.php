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
        <link rel="stylesheet" href="shopStyling.css">
        <link rel="stylesheet" href="../assets/css/maintheme.css">
        <link rel="stylesheet" href="../assets/css/sidenavbar.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="shopScripting.js"></script>
        <script src="../assets/js/sidenavbar.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    </head>
    <body onload="getTheItems()">
        <!--NAVBAR-->
        <?php require('../studentcommunitynavbar.php');?>

        <div style="margin:2%;" >
            <div class="col-12">
                <div class="row">
                    <div class="col-10 offset-1">
                        <div class="input-group search-bar">
                        <input id="search-items-input" type="text" class="form-control orange-text-black-bg" stylr="width:50%" placeholder="Search..">
                        <div class="input-group-append">
                            <button id="search-drive-content" class="btn btn-outline-primary black-text-orange-bg" type="button" onclick="search()"><i class="fa fa-search"></i></button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-5 info-panel-hover-look info-content" style="padding:2%" id="shop-main">
                <div class="row" style="margin-bottom:1%">
                    <div class="col-4"></div>
                    <div class="col-8" style="padding-left:6%">
                        <div class="input-group-append">
                            <button class="btn black-text-orange-bg" style="border-radius: 5%;font-weight:bold;margin-right:2%" type="button" onclick="getTheItems()">
                                All items
                            </button>
                            <button class="btn black-text-orange-bg" style="border-radius: 5%;font-weight:bold;margin-right:2%" type="button" onclick="myItems()">
                                My items
                            </button>
                            <button class="btn black-text-orange-bg" style="border-radius: 5%; font-weight:bold" type="button" onclick="addItemForm()">
                                + add new item
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>