<?php
    $companyName =$_GET["companyName"];
    $companyURL =$_GET["companyURL"];
    $companyContactUsURL =$_GET["companyContactUsURL"];
    $companyDisc = $_GET["companyDisc"];
    $companyIndustry = $_GET["companyIndustry"];
    
    $date = date("Y/m/d");
    $connection = mysqli_connect('localhost','root','','student_community');

    if(mysqli_connect_errno()){
        die("ERROR: could not connect" . mysqli_connect_error());
    }

    $sql = "INSERT INTO company (name, description, date, website, contact_us_page, industry_category)
    VALUES ('$companyName', '$companyDisc', '$date', '$companyURL','$companyContactUsURL', '$companyIndustry')";

    if(mysqli_query($connection, $sql)){
        echo "Company inserted succefully";
    }
    else{
        echo "This company is already added";
    }


    mysqli_close($connection);
?>