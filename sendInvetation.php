<?php
    
    //send an email to the recipient email 
    $recipientEmail = $_GET["recipientEmail"];
    $communityName=$_GET["communityName"];
    /* send the email
    $from = "studentcommunity0@gmail.com";
    $subject = " Invitation to " . $communityName . " community";
    $message = "userName invited you to join " . $communityName . "community click this link to acept it http://localhost/StudentCommunity/Communities/myInvitations.php";
    $message = wordwrap($message, 70); 
    mail($recipientEmail,$subject,$message,"From: $from\n");
    */

    //add it to ivitations table
    $connection = mysqli_connect("localhost","root","","student_community");
    if(mysqli_connect_errno()){
        die("Error: could not connect" . mysqli_connect_error());
    }

    //get the recipient ID
    $recipientID;
    $sql = "SELECT id FROM user WHERE email = '$recipientEmail'";
    if($result = mysqli_query($connection,$sql)){
        if(mysqli_num_rows($result)>0){ // if the user exist
            $temp = mysqli_fetch_row($result);
            $recipientID = $temp[0];
        }
        else{ // if the user does not exist
            die("user does not exist");
        }
    }
    else{
        echo "Failed to excute the query1";
    }

    //check if the user is a participant in this community
    $query = "SELECT * FROM communities_participants WHERE participant_id = '$recipientID' AND community_name = '$communityName'";
    if($participant=mysqli_query($connection,$query)){
        if(mysqli_num_rows($participant)>0){
            die ("This user is already a participant in this community");
        }
    }
    else{
        die ("Failed to excute the query");
    }

    $sql1 = "SELECT * FROM invitation WHERE recipient_id = '$recipientID' AND community_name = '$communityName'";
    if($result1 = mysqli_query($connection,$sql1)){
        if(mysqli_num_rows($result1)>0){
            echo "Invetation has been sent to this user already";
        }
        else{
            $sql2 = "INSERT INTO invitation (recipient_id,community_name) VALUES ('$recipientID','$communityName');";
            if($result2=mysqli_query($connection,$sql2)){
                echo "Invitation has been sent to " . $recipientEmail;            }
            else {
                echo "Failed to insert the ivitation";
            }
        }
    }
    else{
        echo "Failed to excute the query1";
    }
?>