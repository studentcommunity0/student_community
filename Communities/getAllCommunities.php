<?php
    $connection = mysqli_connect("localhost","root","","student_community");
    if(mysqli_connect_errno()){
        die("Error: not able to connect" . mysqli_connect_error());
    }

    $sql = "SELECT * FROM community WHERE availability = 'public'";
    if($result = mysqli_query($connection,$sql)){
        if(mysqli_num_rows($result)>0){
            while($rows=mysqli_fetch_array($result)){
                echo "<div class='row com'>";
                echo "<div class='col-3'>";
                echo "<h5 style='padding-left:2%;'>";
                echo $rows["name"];
                echo "</h5><br></div>";
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
                echo "' onclick='joinCommunity(this.value)'>Join</button><br></div>";
                echo "</div>";
            }
        }
        else{
            echo "Wrong Query";
        }
    }
    else{
        echo "did not perform the query";
    }
?>