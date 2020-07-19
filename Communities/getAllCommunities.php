<?php
    $connection = mysqli_connect("localhost","root","","student_community");
    if(mysqli_connect_errno()){
        die("Error: not able to connect" . mysqli_connect_error());
    }

    $sql = "SELECT * FROM community WHERE availability = 'public'";
    if($result = mysqli_query($connection,$sql)){
        if(mysqli_num_rows($result)>0){
            //echo "<div id='join-alert'></div>";
            echo "<div class='row'>";
            echo "  <div class='col-12'>";
            echo "      <div class='input-group search-bar'>";
            echo "          <input id='allCommunities-search-input' type='text' class='form-control orange-text-black-bg' style='width:50%' placeholder='Search..'>";
            echo "          <div class='input-group-append'>";
            echo "              <button id='search-drive-content' class='btn btn-outline-primary black-text-orange-bg' type='button' onclick='allCommunitiesSearch()'><i class='fa fa-search'></i></button>";
            echo "          </div>";
            echo "       </div>";
            echo "          <button class='btn join-btn black-text-orange-bg' type='button' onclick='goToAddCommunity()'>Add a new community</button>";
            echo "          <button class='btn join-btn black-text-orange-bg' style='margin-left: 1%;' type='button' onclick='goToPrivateCommunities()'>Join a private community</button>";
            echo "  </div>";
            echo "</div><hr>";
            while($rows=mysqli_fetch_array($result)){
                echo "<div class='row com'>";
                echo "<div class='col-3'>";
                echo "<h5 style='padding-left:2%;'>";
                echo $rows["name"];
                    //get the unversity ID of the creator
                    $universityID = "";
                    $communityName = $rows["name"];
                    $query = "SELECT creator FROM community WHERE name = '$communityName'";
                    if($idResult=mysqli_query($connection,$query)){
                        $idRow = mysqli_fetch_array($idResult);
                        $universityID = $idRow['creator']; 
                    }
                    else {die("the ID is not available");}
                    //get the university name
                    $query2 = "SELECT name FROM university WHERE id = '$universityID'";
                    if($nameResult=mysqli_query($connection,$query2)){
                        $nameRow = mysqli_fetch_array($nameResult);
                        $university = $nameRow['name']; 
                    }
                echo "</h5>";
                echo "<a style='color:gray'>Created by a participant in " . $university . "</a></div>";
                echo "<div class='col-4'>";
                echo "<a style='padding-left: 2%;  font-size: 1em;'>";
                echo $rows["description"];
                echo "</a><br></div>";
                echo "<div class='col-2'>";
                echo "<a style='padding-left: 2%;  font-size: 1em;'>";
                echo $rows["date"];
                echo "</a><br></div>";
                echo "<div class='col-3'>";
                echo "<button class='btn btn-rounded join-btn black-text-orange-bg' value='";
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