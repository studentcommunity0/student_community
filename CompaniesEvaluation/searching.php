<?php
    $searcInput = $_GET['searchInput'];

    $connection = mysqli_connect("localhost","root","","student_community");
    
    if(mysqli_connect_errno()){
        echo "error";
        die("ERROR: could not connect" . mysqli_connect_error());
    }
    
    $sql = "SELECT name, description, date FROM company
            WHERE name LIKE '%$searcInput%'";

    if($result = mysqli_query($connection, $sql)){
        if(mysqli_num_rows($result)>0){
            while($rows = mysqli_fetch_array($result)){
                echo "<div class='row com'>";
                echo "<div class='col-3'>";
                echo "<a style='padding-left:2%;'>";
                echo $rows["name"];
                echo "</a><br></div>";
                echo "<div class='col-4'>";
                echo "<a style='padding-left: 2%;  font-size: 1em;'>";
                echo $rows["description"];
                echo "</a><br></div>";
                echo "<div class='col-2'>";
                echo "<a style='padding-left: 2%;  font-size: 1em;'>";
                echo $rows["date"];
                echo "</a><br></div>";
                echo "<div class='col-3'>";
                echo "<button class='btn btn-rounded join-btn' value='";
                echo $rows['name'];
                echo "' onclick='addCompanyToSession(this.value)'>Evaluation</button><br></div>";
                echo "</div>";
            }
        }
        else{
            echo "";
        }
    }
    else{
        echo "Did not perform the query";
    }  
?>