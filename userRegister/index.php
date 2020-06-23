<?php

require_once('controller/authController.php');

// if the user clicked on the email he will have a token
if (isset($_GET['token'])){
    $token = $_GET['token'];
    verifyUser($token);
}

// if the user is not signed in
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Student Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/student_community-master/CompaniesEvaluation/HomePage.html">Companies </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?profile=1">Profile</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?logout=1">Logout</a>
                </li>
                
                
            </ul>
            
        </div>
    </nav>
    
    <div class="container-fluid" style="background-color: lightblue; height: 800px">
        
        <div class="row" id="row1">
            <div class="col-12">
                <h3 class="text-center">
                    Welcome <strong>
                    <?php 
                    echo $_SESSION['username'];
                    ?></strong>
                </h3>
                
            </div>
        </div>
        
        <div class="row" id="row1">
            <div class="col-12">

                <?php if($_SESSION['verified'] == 0) :?>
                    <div class="alert alert-warning">
                    you need to verify your account, check your email at <b><?php echo $_SESSION['email'];?></b>
                    </div>
                <?php endif;?>

                <?php if(isset($_SESSION['greenalert'])) :?>
                    <div class="alert alert-success">
                        <b><?php 
                                echo $_SESSION['greenalert'];
                                unset($_SESSION['greenalert']);
                            ?>
                        </b>
                    </div>
                <?php endif;?>
                
            </div>
        </div>

        

    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
