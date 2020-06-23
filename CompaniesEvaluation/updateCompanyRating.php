<?php
require_once("session.php");
include("database_connect.php");

$company_id = $_SESSION['company_id'];
$query = "SELECT stars FROM review where company_id = '$company_id';";
$result = mysqli_query($connection, $query);
$sum = 0;
$count = 0;
if($result && mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
        $sum += $row["stars"];
        $count +=1;
    }
    $avg = $sum/ $count;

    $update_query = "UPDATE company SET stars = '$avg' WHERE id = '$company_id';";
    mysqli_query($connection, $update_query);
    
}

?>