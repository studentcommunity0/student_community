<?php
    $searchInput = $_GET['searchInput'];

    $connection = mysqli_connect("localhost","root","","student_community");
    if(mysqli_connect_errno()){
        die("Error: not able to connect" . mysqli_connect_error());
    }

    $sql = "SELECT * FROM community WHERE availability = 'public' AND name LIKE '%$searchInput%'";
    if($result = mysqli_query($connection,$sql)){
        if(mysqli_num_rows($result)>0){
            echo "<div class='row myCard2'>";
            echo "  <div class='col-12'>";
            echo "      <form class='form-inline md-form mr-auto mb-4'>";
            echo "          <button class='btn search-btn' onclick='allCommunitiesSearch()' type='button'>";
            echo "              <i class='material-icons'>search</i>";
            echo "          </button>";
            echo "          <input class='form-control mr-sm-2' id ='allCommunities-search-input' style='width: 85%; background-color: beige;' type='text' placeholder='Searc' onchange='search()' aria-label='Search'>";
            echo "      </form>";
            echo "  </div>";
            echo "</div>";
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