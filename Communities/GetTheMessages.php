<?php
    session_start();
    $userName = "";
    $userID = $_SESSION['id'];
    $communityName=$_SESSION['community_name'];

    $connection = mysqli_connect("localhost","root","","student_community");
    if(mysqli_connect_errno()){
        die("Error: could not connect" . mysqli_connect_error());
    }

    $creatorID=0;
    $sql = "SELECT creator FROM community WHERE name = '$communityName'";
    if($result=mysqli_query($connection,$sql)){
        if(mysqli_num_rows($result)>0){
            $id=mysqli_fetch_row($result);
            $creatorID=$id[0];
        }
        else{
            echo "wrong query";
        }
    }
    else{
        echo "did not perform the query";
    }
    
    $sql1 = "SELECT * FROM communities_messages WHERE community_name = '$communityName'";
    if($result1=mysqli_query($connection,$sql1)){
        echo "<div class='row myCard'><div class='col'><h1> Welcome to $communityName community</1>";
        echo "<div class'row'>";
        if($creatorID == $userID){
            echo "<button class='btn' onclick='goToEvents()' style='background-color:#BC9051; margin-right:10px; color:white; font-weight:bold'>Show events</button>";
            echo "<button class='btn' onclick='goToPolls()' style='background-color:#BC9051; margin-right:10px; color:white; font-weight:bold'>Pollings</button>";
            echo "<button class='btn' onclick='showTexrarea()' style='background-color:#BC9051; color:white; font-weight:bold'>Send a message</button>";
            
            echo "<button class='btn' style='margin-left:3%; background-color:rgb(56, 148, 56); color:white; font-weight:bold' value='";
            echo $communityName;
            echo "' onclick='goToManagingPage(this.value)'>Manage Community</button></div></div></div><br>";
        }
        else{
            echo "<button class='btn' onclick='goToEvents()' style='background-color:#BC9051; margin-right:10px; color:white; font-weight:bold'>Show events</button>";
            echo "<button class='btn' onclick='goToPolls()' style='background-color:#BC9051; margin-right:10px; color:white; font-weight:bold'>Pollings</button>";
            echo "<button class='btn'onclick='showTexrarea()' style='background-color:#BC9051; color:white; font-weight:bold'>Send a message</button></div></div></div><br>";
        }
        echo "<a href='../Drive/sharedfiles.php'><button class='btn' onclick='communitySharedFiles()' style='background-color:#BC9051; color:white; font-weight:bold'>View Shared Files</button></a>";
        if(mysqli_num_rows($result1)>0){
            while($rows=mysqli_fetch_array($result1)){
                echo "<div class='row' style='margin:2%; border-top:solid 3px #e2ac60; background-color:white;box-shadow: 0px 0px 2px black;'>";
                echo "<div class='col-2' style='background-color:lightgray;border-right:solid 1px gray;'>";
                echo "<div class='row'><img src='images/userProfile.jpg' style='width:100%'><hr></div>";
                echo "<div class='row' style='height:100%; text-align:center'>";
                echo "<a>username: ";
                //get the user name (given the userID)
                $userID = $rows['user_id'];
                $sql2 = "SELECT username FROM user WHERE id = '$userID'";
                if($result2 = mysqli_query($connection,$sql2)){
                    if(mysqli_num_rows($result2)>0){
                        $un = mysqli_fetch_row($result2);
                        $userName = $un[0];
                    }
                }
                echo $userName;
                echo "<br>university: KFUPM<br>";
                echo "Major: SWE</a>";
                echo "</div>";
                echo "</div>";
                echo "<div class='col-10'>";
                echo "<div class='row' style='background-Color: lightgray; padding-left:10px'><a>";
                echo $rows['date'];
                echo "</a></div>";
                echo "<div class='row' style='background-Color: white; height:75%; padding-top:2%; padding-left:10px'><a>";
                echo $rows['message'];
                echo "</a></div>";
                echo "<button class='btn' style='background-color:#BC9051; color:white; font-weight:bold' onclick='showReplyArea(";
                echo $rows['id'];
                echo ")'>Reply</button><hr>";
                echo "</div>";
                echo "<div class='col-2' style='background-color:lightgray'></div>";
                echo "<div class='col-10' style=''>";
                $id = $rows['id'];
                $sql2 = "SELECT * FROM communities_replies WHERE message_id = '$id'";
                if($replyResult = mysqli_query($connection, $sql2)){
                    if(mysqli_num_rows($replyResult)>0){
                        while($replies = mysqli_fetch_array($replyResult)){
                            echo "<div class='row' style='margin-top:2%;margin-bottom:1%;'>";
                            echo "<div class='col-1' style='background-color: '></div>";
                            echo "<div class='col-10' style='background-color:white;border-left: solid 3px #ffa801;'>";
                            echo "<div class='row' style='background-Color: lightgray; padding-left:10px'><a>";
                            echo $replies['date'];
                            echo ", ";
                            //get the user name (given the userID)
                            $userID = $replies['userid'];
                            $userName;
                            $sql2 = "SELECT username FROM user WHERE id = '$userID'";
                            if($result2 = mysqli_query($connection,$sql2)){
                                if(mysqli_num_rows($result2)>0){
                                    $un = mysqli_fetch_row($result2);
                                    $userName = $un[0];
                                }
                            }
                            echo $userName;
                            echo "</a></div>";
                            echo "<div class='row' style='background-Color: rgb(245, 245, 245); padding-top:2%; padding-left:10px'><a>";
                            echo $replies['reply'];
                            echo "</a></div></div></div>";
                        }
                    }
                }
                echo "</div>";
                echo "</div>";
            }
        }
        else{
            echo "<div class='row'><div class='col myCard'><h3>No messages yet</h3></div></div>";
        }
    }
?>