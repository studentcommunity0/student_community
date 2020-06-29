<?php
    # connecting the database
    $server_name = 'localhost';
    $username = 'root';
    $password = '';
    $database_name = 'student_community';
    $connection =  mysqli_connect($server_name, $username, $password, $database_name );
    
    if(mysqli_connect_errno()){
        echo "error";
        die("ERROR: could not connect" . mysqli_connect_error());
    }
?>