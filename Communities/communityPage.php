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
        <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
       
    </head>
    <body onload="communityPageStart()">
      <!--NAVBAR-->
        <?php require('../studentcommunitynavbar.php');?>
     <div>
            <img src="images/SHIj.jpg" style="width: 100%;" alt="Image">
        </div>
        <div id="main" style="text-align:center">
        </div>
        <div class="myCard" id="message-textarea">
            <textarea name="editor1" id="editor1"></textarea>
            <script>
                    CKEDITOR.replace( 'editor1' );
            </script>
            <button class='btn' onclick="sendTheMessage()" style='width:40%;margin:1%;background-color:rgb(37, 100, 37); color:white; font-weight:bold'>Send -></button>
        </div>
    </body>
</html>