<?php
    $companyName =$_GET["companyName"];
    $companyURL =$_GET["companyURL"];
    $companyDisc = $_GET["companyDisc"];
    $date = date("Y/m/d");
    $connection = mysqli_connect('localhost','root','','student_community');

    if(mysqli_connect_errno()){
        die("ERROR: could not connect" . mysqli_connect_error());
    }

    $sql = "INSERT INTO company (name, description, date, website)
    VALUES ('$companyName', '$companyDisc', '$date', '$companyURL')";

    if(mysqli_query($connection, $sql)){
        echo "Company inserted succefully";
    }
    else{
        echo "This company is already added";
    }


    mysqli_close($connection);
?>