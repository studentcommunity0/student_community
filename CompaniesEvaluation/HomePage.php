<?php  

require_once('../userRegister/controller/authController.php');

// if the user clicked on the email he will have a token
if (isset($_GET['token'])){
    $token = $_GET['token'];
    verifyUser($token);
}

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
    </head>
    <body onload="getHompageCompanies()">
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
                        <a class="navlinks nav-link" style="color: white;" href="HomePage.php?profile=1"><?php echo $_SESSION['username']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="navlinks nav-link" style="color: white;" href="HomePage.php?logout=1">LOGOUT</a>
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
        <!-- <div>
            <img src="images/HP.jpg" style="width: 100%;" alt="Image">
        </div> -->
        <?php if(isset($_SESSION['verifyMessage'])) :?>
            <div class="alert alert-success">
                <b><?php 
                        echo $_SESSION['verifyMessage'];
                        unset($_SESSION['verifyMessage']);
                    ?>
                </b>
            </div>
        <?php endif;?>
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
    </body>
</html>