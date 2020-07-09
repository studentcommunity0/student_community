<?php
    session_start();
    $userID=$_SESSION["id"];
    $myCommunities ="";

    $connection=mysqli_connect("localhost","root","","student_community");
    if(mysqli_connect_errno()){
        die("ERROR: could not connect" . mysqli_connect_error());
    }

    $sql = "SELECT community_name FROM communities_participants WHERE participant_id = '$userID'";
    if($result = mysqli_query($connection, $sql)){
        if(mysqli_num_rows($result)>0){
            while($rows=mysqli_fetch_array($result)){
                $myCommunities = $myCommunities . "'" . $rows['community_name'] . "',";
            }
            $myCommunities = $myCommunities . "'q'";
            //echo $myCommunities; 
        }
        else{
        }
    }
    else{
        echo "wrong query1";
    }

    $sql2 = "SELECT * FROM community WHERE name IN (";
    $sql2 = $sql2 . "" . $myCommunities . ")";
    if($result2 = mysqli_query($connection, $sql2)){
        if(mysqli_num_rows($result2)>0){
            while($rows2=mysqli_fetch_array($result2)){
                if($rows2['availability']=="public"){
                    echo "<div class='row com'>";
                    echo "<div class='col-3'>";
                    echo "<h5 style='padding-left:2%;'>";
                    echo $rows2["name"];
                    echo "</h5><br></div>";
                    echo "<div class='col-4'>";
                    echo "<a style='padding-left: 2%;  font-size: 1em;'>";
                    echo $rows2["description"];
                    echo "</a><br></div>";
                    echo "<div class='col-2'>";
                    echo "<a style='padding-left: 2%;  font-size: 1em;'>";
                    echo $rows2["date"];
                    echo "</a><br></div>";
                    echo "<div class='col-3'>";
                    echo "<div class='row'>";
                    echo "<button class='btn btn-rounded join-btn' value='";
                    echo $rows2['name'];
                    echo "' onclick=";
                    echo "\"addCommunityToSession(this.value)\">Join</button><br>";
                    echo "<button class='btn btn-rounded join-btn' style='background-color:rgb(196, 8, 8)' value='";
                    echo $rows2['name'];
                    echo "' onclick='leaveCommunity(this.value)'>Leave</button><br></div>";
                    echo "</div>";
                    echo "</div>";
                }
                else{
                    echo "<div class='row com'>";
                    echo "<div class='col-3'>";
                    echo "<h5 style='padding-left:2%;'>";
                    echo $rows2["name"];
                    echo "</h5><a style='color:rgb(196, 8, 8)'>Private Community</a></div>";
                    echo "<div class='col-4'>";
                    echo "<a style='padding-left: 2%;  font-size: 1em;'>";
                    echo $rows2["description"];
                    echo "</a><br></div>";
                    echo "<div class='col-2'>";
                    echo "<a style='padding-left: 2%;  font-size: 1em;'>";
                    echo $rows2["date"];
                    echo "</a><br></div>";
                    echo "<div class='col-3'>";
                    echo "<div class='row'>";
                    echo "<button class='btn btn-rounded join-btn' value='";
                    echo $rows2['name'];
                    echo "' onclick=";
                    echo "\"addCommunityToSession(this.value)\">Join</button><br>";
                    echo "<button class='btn btn-rounded join-btn' style='background-color:rgb(196, 8, 8)' value='";
                    echo $rows2['name'];
                    echo "' onclick='leaveCommunity(this.value)'>Leave</button><br></div>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        }
    }
    else{
        echo "You are not a participant in any community";
    }
?>