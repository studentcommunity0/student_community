<?php  

require_once('../userRegister/controller/authController.php');


// if the user is not signed in
if(!isset($_SESSION['id'])){
    header("Location: ../userRegister/login.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="Styling2.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/maintheme.css">
        <link rel="stylesheet" href="../assets/css/sidenavbar.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body onload="getHompageCompanies()">
        <!--NAVBAR-->
        <?php include("../studentcommunitynavbar.php")?>

        <!-- <div>
            <img src="images/HP.jpg" style="width: 100%;" alt="Image">
        </div> -->

        <div class="separator" style="padding: 2%;">Companies Evaluations</div>
        <div class="row" style="margin-left:2%; margin-right: 2%; margin: 1%;" id="HP-companies">  
        </div>
        
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <button class="btn join-btn" style="width: 100%;background-color: #BC9051;font-size: large;font-weight: bold;color: white;" onclick="goToTrainingEvaluation()">More Companies</button>
            </div>
            <div class="col"></div>
        </div>
        <div class="separator" style="padding: 2%;">Other Communities</div>
        <div style="background-color:rgb(58, 58, 58); margin-top: 10%;">
            <br><br><br>
            <br><br><br>
            <br><br><br>
            <br><br><br>
        </div>

        <script src="Scripting2.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="../assets/js/sidenavbar.js"></script>

    </body>
</html>