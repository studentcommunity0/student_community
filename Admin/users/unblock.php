<?php

    require_once '../../session.php';
    require '../../database_connect.php';

    $status_msg = '';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        if(isset($_POST['username'])){

            $username = $_POST['username'];
            $query = "SELECT * from user where username =? LIMIT 1";
            $stmt= $connection->prepare($query);
            $stmt->bind_param('s',$username);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $stmt->close();
            
            if($result){
                $query = "UPDATE `user` set status= '6' where username='$username' ";
                $updated_result = mysqli_query($connection, $query);

                if($updated_result){
                    $status_msg = "The user is unBlocked and Active";
                }else{
                    $status_msg = "Error Occured user could not be blocked.";
                }
            }else{
                $status_msg = "No user in DB";
            }

        }else{
            $status_msg = 'username not defined';
        }
        
    }

    echo $status_msg;
?>