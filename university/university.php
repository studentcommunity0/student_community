<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Universities</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="universityStyling.css">
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
    <body>
        <!--NAVBAR-->
        <?php require('../studentcommunitynavbar.php');?>

        <div class="container-fluid">

            <h1 id="title">All the Universities in Saudi Arabia</h1>


            <div>
                
                <?php include("getAllUniversities.php");  ?>

                
                
            </div>

        </div>
        
    </body>
</html>