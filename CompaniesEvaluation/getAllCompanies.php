<?php

    $connection = mysqli_connect("localhost","root","","student_community");
    if(mysqli_connect_errno()){
        die("ERROR: could not connect" . mysqli_connect_error());
    }

    $sql = "SELECT id, name, description,website, date FROM company";
    if($result = mysqli_query($connection, $sql)){
        if(mysqli_num_rows($result)>0){
            while($rows=mysqli_fetch_array($result)){
                echo "<div class='row com info-content'>";
                echo "<div class='col-3 d=flex align-content-center'>";
                $link = $rows['website'];
                echo "<a style='color:#3d3d3d' href ='$link' style='padding-left:2%;'><strong>";
                echo $rows["name"];
                echo "</strong></a><br></div>";
                echo "<div class='col-4 d=flex justify-content-center'>";
                get_rating($rows['id']);
                echo "<br></div>";
                
                echo "<div class='col-3'>";
                echo "<button class='orange-btn-black-text-main' value='";
                echo $rows['name'];
                echo "' onclick='addCompanyToSession(this.value)'>Reviews</button><br></div>";
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


    function get_rating($company_id){
        global $connection;

        $query = "SELECT stars FROM company where id = '$company_id';";
        $result = mysqli_query($connection, $query);
        if($result && mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $check = True;
            echo '<div class="company_rating col-12 stars" data-rating="'.$row["stars"].'">';
            for($iterator = 0; $iterator <= 4; ++$iterator){
                if($iterator <= $row["stars"] - 1){
                    echo '<span class="star rated"></span>';
                }else{
                    $whole_num = floor($row["stars"]);
                    $fraction = $row["stars"] - $whole_num;
                    if($fraction >= 0.5 && $check){
                        echo '<span class="star rated half-star"></span>';
                        echo '<span class="star"></span>';
                        $arr = array();
                        $arr[0] = $fraction;
                        json_encode($arr);
                        $check = False;
                    }
                    else{
                        echo '<span class="star"></span>';
                    }
                }
            }
    
            echo '  </div>';
        }
    
    }
?>