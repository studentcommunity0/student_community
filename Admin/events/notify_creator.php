<?php
    require_once '../../session.php';
    require '../../database_connection.php';

    # Get event_id and creator_id
    if(isset($_GET['event_id']) && isset($_GET['community_name']) && isset($_GET['event_name'])){
        $event_id = $_GET['event_id'];
        $event_name = $_GET['event_name'];
        $community_name = $_GET['community_name'];

        # Get creator details
        $community_details_query = "SELECT * from community where name=$community_name Limit 1";
        if($result = mysqli_query($connection, $event_details_query)){
            $event = mysqli_fetch_array($result);
            $event_name = $event['name'];
            
            
        }

    }



?>