<?php

require_once('controller/authController.php');

// if the user is not signed in
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}
if(isset($_SESSION['user_type']) && $_SESSION['user_type']== 1){
    header("Location: ../Admin/");
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
    <link rel="stylesheet" href="../assets/css/maintheme.css">
    <link rel="stylesheet" href="../assets/css/sidenavbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!--NAVBAR-->
     <?php require('../studentcommunitynavbar.php');?>    
    <div class="container-fluid" style="height: 800px">
        
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
                    you need to verify your account,close this window then check your email at <b><?php echo $_SESSION['email'];?></b>
                    </div>
                <?php endif;?>
                
            </div>
        </div>

        

    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="../assets/js/sidenavbar.js"></script>
</body>
</html>
