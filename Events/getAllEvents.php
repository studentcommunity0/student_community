<?php


$connection=mysqli_connect("localhost","root","","student_community");

if(mysqli_connect_errno()){
    die("ERROR: could not connect" . mysqli_connect_error());
}

$communityName = $_SESSION['community_name'];

$sql = "SELECT * FROM events WHERE community = '$communityName' ORDER BY date_of_event DESC";

if($result = mysqli_query($connection,$sql)){
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            $name = $row['name'];
            $description = $row['description'];
            $image = $row['image'];
            $id = $row['id'];

            echo "<div class='row' id='eventContainer'>";
                echo "<div class='col-3'>";
                    echo "<div class='row' id='eventTitle'>";
                        echo "<h3>$name</h3>";
                    echo "</div><hr>";
                    echo "<div class='row' id='eventDesc'>";
                        echo "$description";
                    echo "</div>";
                    echo "<div class='row' id=''>";
                        echo "<a href='singleEvent.php?EventID=$id' id='eventBtn'>More --></a>";
                    echo "</div>";
                echo "</div>";
                echo "<div class='col-9' id='eventFlyer'>";
                    echo "<img src='flyerImages/$image'>";
                echo "</div>";
            echo "</div>";
        }
    }
    else{
        echo "";
    }
}
else{
    echo "did not perform the query";
}



            
                
                    
                
                
                
                    


?>
