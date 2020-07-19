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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    <body onload="getCommuniteis()">
        <!--NAVBAR-->
        <?php require('../studentcommunitynavbar.php');?>
            
            <div class="row myCard2 info-content" style='box-shadow: 0px 0px 5px gray;'>
                <div class="col-1"></div>
                <div class="col-10">
                    <button class="btn join-btn orange-btn-black-text-main" type="button" onclick="getCommuniteis()">My communities</button>
                    <button class="btn join-btn orange-btn-black-text-main" type="button" onclick="getAllCommuniteis()">all communities</button>
                    <?php
                        $connection = mysqli_connect("localhost","root","","student_community");
                        if(mysqli_connect_errno()){
                            die("Error: could not connect" . mysqli_connect_error());
                        }
                        
                        $userID = $_SESSION['id'];
                        $sql = "SELECT * FROM invitation WHERE recipient_id ='$userID'";
                        if($result=mysqli_query($connection,$sql)){
                            if(mysqli_num_rows($result)>0){
                                echo "<button class='btn join-btn orange-btn-black-text-main' type='button' onclick='goToInvitationPage()'>New ivitations</button>";
                            }
                        }
                        else{
                            echo $userID;
                        }
                    ?>
                    <button class="btn join-btn " style="margin-left: 1%; background-color:green" type="button" onclick="goToShop()">
                    <i class="material-icons">shopping_basket</i></button> <a style="font-weight:bold">Items shop</a>
                    
                </div>
                <div class="col-3"></div>
            </div>
            <div class="row" style="margin-left:2%;margin-right:2%;text-align:center">
                <div class="col-12" id="join-alert">
                </div>
            </div>
            <div class="row info-header" style="margin-right: 2%; margin-left: 2%; padding-left: 3%;">
                <h4 class="info-header-text">My Communities</h4>
            </div>
            <div class="myCard " style="box-shadow: 0px 0px 5px gray;"  id="myCommunities">
            </div>
        <div style="background-color:rgb(58, 58, 58); margin-top: 10%;">
            <br><br><br>
            <br><br><br>
            <br><br><br>
            <br><br><br>
        </div>
    </body>
</html>