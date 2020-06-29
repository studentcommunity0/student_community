<?php

    $connection = mysqli_connect("localhost","root","","student_community");
    if(mysqli_connect_errno()){
        die("ERROR: could not connect" . mysqli_connect_error());
    }

    $sql1 = "SELECT MAX(id) FROM company";
    if($M = mysqli_query($connection, $sql1)){
        if(mysqli_num_rows($M)>0){
            $Max = mysqli_fetch_row($M);
            $MaxID = $Max[0];
        }
        else{
            echo"wrong query";
        }
    }
    else{
        echo "MaxID query error";
    }

    $randomCompaniesID = [];
    $r=0;
    while($r<5){
        $id =  floor(rand(1,$MaxID-1));
        
        if(!in_array($id,$randomCompaniesID)){
        $randomCompaniesID[$r] =$id;
        $r++;
        }
    }
    $c1 = $randomCompaniesID[0];
    $c2 = $randomCompaniesID[1];
    $c3 = $randomCompaniesID[2];
    
    $sql2 = "SELECT name, description FROM company
    WHERE id IN ($c1,$c2,$c3)";
    if($result = mysqli_query($connection, $sql2)){
    if(mysqli_num_rows($result)>0){
        while($rows=mysqli_fetch_array($result)){
            echo "<div class='col'>";
            echo "<div class='card' style='height:100%; text-align: center;'>";
            echo "<div class='card-body'> <h4>";
            echo $rows["name"];
            echo "</h4>";
            echo $rows["description"];
            echo "</div>";
            echo "<div class='card-footer myCard-header'>";
            echo "<button class='btn join-btn'";
            echo "style='width: 100%;background-color: #BC9051;font-size: large;font-weight: bold;color: white;'";
            echo "onclick='goToTrainingEvaluation()'>Evaluation page</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }
    else{
        echo "Wrong query";
    }
    } 
    else{
    echo "Did not perform the query";
    }
?>