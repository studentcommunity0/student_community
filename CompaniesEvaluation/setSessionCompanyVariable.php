<?php
    require_once('session.php');

    $companyName=$_GET['companyName'];
    $_SESSION['company_name']=$companyName;

    echo $_SESSION['company_name'];
?>