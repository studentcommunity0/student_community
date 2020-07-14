<?php
    # CREATE NEW POLL CODE
    require_once '../session.php';
    require '../database_connect.php';
    $status_msg = '';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        # CLEAN THE INPUT AND ASSIGN TO VAR
        $title = mysqli_real_escape_string( $connection, $_POST['title']);
        $description = mysqli_real_escape_string( $connection, $_POST['description']);
        $options = [];
        foreach ($_POST['options'] as $option){
            array_push( $options, mysqli_real_escape_string( $connection, $option));
        }
        $owner_id = $_SESSION['id'];
        $community_name = $_SESSION['community_name'];

        # INSERT POLL IN DB
        $insert_poll = "INSERT into poll (title,description, owner_id, status, community_name)
            VALUES ('$title', '$description', '$owner_id', '7', '$community_name')";

        $result = mysqli_query($connection, $insert_poll);
        if($result){
            insert_options($options);
            $status_msg = 'Successfully created a new poll';
        }else{
            $status_msg = 'Poll could not be created';
        }
            
        
        echo $status_msg;
    }

    # INSERT ALL OPTIONS INTO OPTIONS TABLE
    function insert_options($options){
        global $connection;
        foreach ($options as $option){
            
            $get_id = "select MAX(id) as id from poll";
            if($result = mysqli_query($connection, $get_id)){
                $result = mysqli_fetch_array($result);
                $result = $result['id'];

                $insert_option = "INSERT INTO poll_options (poll_id,poll_option) VALUES ('$result', '$option');";
                mysqli_query($connection, $insert_option);
            }
            
        }
    }
?>