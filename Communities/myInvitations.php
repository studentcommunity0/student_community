<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>My Invitations</title>
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

            <div class="row info-header info-header-text" style="margin-right: 2%; margin-left: 2%; padding-left: 3%;margin-top:1%">
                <h4>My invitations</h4>
            </div>
            <div class="row myCard2 center">
                <div class="col-1"></div>
                <div class="col-10" id="myInvitations">
                    <?php
                        $userID = $_SESSION['id'];

                        $connection = mysqli_connect("localhost","root","","student_community");
                        if(mysqli_connect_errno()){
                            die("Error: could not connect" . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM invitation WHERE recipient_id = '$userID'";
                        if($result=mysqli_query($connection,$sql)){
                            if(mysqli_num_rows($result)>0){
                                while($rows=mysqli_fetch_array($result)){
                                    echo "<dvi id='invitations-alert'></div>";
                                    echo "<div class='row com'>";
                                    echo "  <div class='col-3'>";
                                    echo "      <h5 style='padding-left:2%;'>";
                                    echo            $rows["community_name"];
                                    echo "      </h5><br>";
                                    echo "  </div>";
                                    echo "  <div class='col-4'></div>";
                                    echo "  <div class='col-2'>";
                                    echo "  </div>";
                                    echo "  <div class='col-3'>";
                                    echo "      <div class='row'>";
                                    echo "          <button class='btn btn-rounded join-btn black-text-orange-bg' value='";
                                    echo             $rows['community_name'];
                                    echo "           ' onclick=";
                                    echo            "\"acceptInvitation(this.value)\"'>Accept</button><br>";
                                    echo "          <button class='btn btn-rounded join-btn' style='background-color:rgb(196, 8, 8)' value='";
                                    echo            $rows['community_name'];
                                    echo "          ' onclick='removeFromIvitation(this.value)'>Ignore</button><br></div>";
                                    echo "      </div>";
                                    echo "  </div>";
                                    echo "</div>";
                                    //echo "</div>";
                                }
                            }
                            else{
                                echo "<h4>You do not have any invitation</h4>";
                            }
                        }
                    ?>
                <div class="col-3"></div>
            </div>
        <div style="background-color:rgb(58, 58, 58); margin-top: 10%;">
            <br><br><br>
            <br><br><br>
            <br><br><br>
            <br><br><br>
        </div>
    </body>
</html>