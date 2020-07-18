<?php

    require_once 'session.php';
    require 'database_connect.php';

    $query = "SELECT id,name from industry";
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($result)){
        $name = $row['name'];
        $id = $row['id'];
       echo "<option value='$id'>$name</option>";
    }

?>