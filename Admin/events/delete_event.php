<?php

    require_once '../../session.php';
    require '../../database_connect.php';

    $status_msg = '';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        if(isset($_POST['event_id']) && isset($_POST['event_name']) && isset($_POST['community_name'])){

            $event_id = $_POST['event_id'];
            
            $query = "DELETE FROM `events` where id =$event_id ";
            $updated_result = mysqli_query($connection, $query);

            if($updated_result){
                $status_msg = "The event has been deleted!";
            }else{
                $status_msg = "Error Occured event could not be deleted.";
            }
            
        }else{
            $status_msg = 'event id not defined';
        }
        
    }

    echo $status_msg;
?>