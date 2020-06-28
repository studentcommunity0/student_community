<?php
    session_start();

    $communityName=$_GET['communityName'];
    $_SESSION['community_name']=$communityName;

    echo $_SESSION['community_name'];
?>