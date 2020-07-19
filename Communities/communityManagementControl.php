<?php
    session_start();
    $communityName=$_SESSION['community_name'];
    $userName = $_SESSION['username'];
    $communityID = 0;
    $connectio = mysqli_connect("localhost","root","","student_community");
    if(mysqli_connect_errno()){
        die("Error: could not connect" . mysqli_connect_error());
    }

    $participantsIDs="";
    $sql = "SELECT * from communities_participants WHERE community_name = '$communityName'";
    if($result=mysqli_query($connectio,$sql)){
        if(mysqli_num_rows($result)>0){
            while($rows=mysqli_fetch_array($result)){
                $participantsIDs = $participantsIDs . "'" . $rows['participant_id'] . "',";
            }
            $participantsIDs = $participantsIDs . "'0'";
        }
        else{
            echo "wrong query";
        }
    }
    else{
        echo "did not perform the query";
    }

    echo "<h4 class='info-header info-header-text'>Community ID<h4>";
    $sql1="SELECT id FROM community WHERE name = '$communityName'";
    if($result1 = mysqli_query($connectio,$sql1)){
        if(mysqli_num_rows($result1)>0){
            $cid = mysqli_fetch_row($result1);
            $communityID = $cid[0];
        }
    }
    echo "<h5>" . $communityID . "</h5><br>";
    echo "<h4 class='info-header info-header-text'>Community Participants<h4>";
    echo "<div class='row'>";
    echo "<div id='removePart-alert'></div>";
    echo "</div>";

    $sql2 = "SELECT * from user WHERE id IN (";
    $sql2 = $sql2 . $participantsIDs . ")";
    if($result2=mysqli_query($connectio,$sql2)){
        if(mysqli_num_rows($result2)>0){
            while($rows2=mysqli_fetch_array($result2)){
                echo "<div class='row com'>";
                echo "<div class='col-3'>";
                echo "<h5 style='padding-left:2%;'>";
                echo $rows2["username"];
                echo "</h5><br></div>";
                echo "<div class='col-4'>";
                echo "<a style='padding-left: 2%;  font-size: 1em;'>";
                echo $rows2["email"];
                echo "</a><br></div>";
                echo "<div class='col-3'>";
                if($rows2['username']!=$userName){
                    echo "<div class='row'>";
                    echo "<button class='btn btn-rounded join-btn' style='background-color:rgb(196, 8, 8)' value='";
                    echo $rows2['id'];
                    echo "' onclick='removePart(this.value)'>Remove</button><br></div>";
                }
                else{
                    echo "<div class='row'>";
                    echo "<a style='font-weight:bold'>Admin</a></div>";
                }
                echo "</div>";
                echo "</div>";
            }
        }
        else{
            echo "wrong query";
        }
    }
    else{
        echo "did not perform the query";
    }
?>