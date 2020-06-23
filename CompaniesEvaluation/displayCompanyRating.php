<?php
    require_once("session.php");
    include("database_connect.php");
    
    $company_id = $_SESSION['company_id'];
    $query = "SELECT stars FROM company where id = '$company_id';";
    $result = mysqli_query($connection, $query);
    if($result && mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $check = True;
        echo '<div class="col-10 stars" data-rating="'.$row["stars"].'">';
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
?>