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
    $c4 = $randomCompaniesID[3];
    $c5 = $randomCompaniesID[4];
    
    $sql2 = "SELECT name FROM company
    WHERE id IN ($c1,$c2,$c3,$c4,$c5)";
    if($result = mysqli_query($connection, $sql2)){
    if(mysqli_num_rows($result)>0){
        while($rows=mysqli_fetch_array($result)){
            echo "<div class='row com'>";
            echo "<div class='col'>";
            echo "<h5 style='padding-left:2%;'>";
            echo $rows["name"];
            echo "</h5><br></div>";
            echo "<div class='col'>";
            echo "<button class='btn btn-rounded join-btn' value='";
            echo $rows['name'];
            echo "' onclick='addCompanyToSession(this.value)'>Evaluation</button><br></div>";
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