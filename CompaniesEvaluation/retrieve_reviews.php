<?php 
    require_once('session.php');
    include("database_connect.php");

    # Query to get all reviews of the company
    $company_id = $_SESSION['company_id'];
    
    if(isset($_GET['selected_order'])){
        $selected_order = mysqli_real_escape_string($connection, $_GET['selected_order']);

        if($selected_order == "Recent"){
            $selected_order = "order by date_time_of_review DESC";

        }elseif($selected_order == "Most_Rated_First"){
            $selected_order = "order by stars DESC, date_time_of_review DESC";

        }elseif($selected_order == "Oldest_First"){
            $selected_order = "order by date_time_of_review ASC";
        
        }elseif($selected_order == "Least_Rated_First"){
            $selected_order = "order by stars ASC, date_time_of_review DESC";

        }
        elseif($selected_order == "1_star"){
            $selected_order = "AND stars = '1' Order by date_time_of_review DESC";

        }
        elseif($selected_order == "2_star"){
            $selected_order = "AND stars = '2' Order by date_time_of_review DESC";

        }
        elseif($selected_order == "3_star"){
            $selected_order = "AND stars = '3' Order by date_time_of_review DESC";

        }
        elseif($selected_order == "4_star"){
            $selected_order = "AND stars = '4' Order by date_time_of_review DESC";

        }
        elseif($selected_order == "5_star"){
            $selected_order = "AND stars = '5' Order by date_time_of_review DESC";

        }

        $query = "SELECT * FROM review where company_id = $company_id $selected_order";
        $result = mysqli_query($connection, $query);

        if($result && mysqli_num_rows($result) > 0){
            
            # Loop for generating all reviews
            while($row = mysqli_fetch_array($result)){

                // Retrieving the name of the user.
                $userid = $row['user_id']; 
                $username_query = "SELECT username from user where id = '$userid';";
                $username = mysqli_query($connection, $username_query);
            
                if($username && mysqli_num_rows($username) == 1){
                    
                    # Storing username and formatting the date
                    $username = mysqli_fetch_array($username);
                    $username = $username['username'];
                    $date = Datetime::createFromFormat('Y-m-d H:i:s',  $row["date_time_of_review"])->format('d M, Y');
                    echo '<div class="reviewer-div mt-2">';
                    echo '  <div class="row">';
                    echo '   <div class="col-sm-6 col-lg-6 stars mb-1" style="font-weight:600;" data-rating="'.$row["stars"].'">';
                    
                    # Displays the star rating of a single user
                    for($iterator = 0; $iterator <= 4; ++$iterator){
                        if($iterator <= $row["stars"] - 1){
                            echo '<span class="star rated"></span>';
                        }else{
                            echo '<span class="star"></span>';
                        }
                    }         
                    echo '</div>';
                    echo '<div class="col-sm-6 col-xs-12 d-flex justify-content-end">';
                    echo '<p class="align-self-center m-0" style="font-weight:600;">'.$date.'</p>';
                    echo '  </div>';
                    echo '</div>';
                    echo '<div class="row mb-2 mt-2">';
                    echo ' <div class="col-12" class="col-12 col-sm-12" style="font-weight:750; word-wrap: break-word">';
                    echo '    <h5> '.$row["title"].'</h5>';
                    echo '  </div>';
                    echo '</div>';
                    echo '<div class="row mb-3 mt-2">';               
                   
                    echo '    <div class="col-lg-6 col-sm-12 d-flex justify-content-start">';
                    $from = Datetime::createFromFormat('Y-m-d',  $row["from_date"])->format('d M, Y');
                    $to = Datetime::createFromFormat('Y-m-d',  $row["to_date"])->format('d M, Y');
                    echo '  <h6 class=" align-self-center m-0 mr-3 "> Employment Period: </h6>
                    <p  class="align-self-center m-0"> '.$from.'  -  '.$to.'</p>';
                    echo '</div>';
                    echo '<div class="col-lg-6 col-md-12 d-flex justify-content-lg-end justify-content-sm-start">';
                    echo '   <h6 class=" align-self-center mr-3 mb-0" > Username: </h6>
                    <p class="align-self-center m-0"> '.$username.'</p>';
                    echo '  </div>';
                    echo '</div>';
                    echo '<div class="row">';
                    echo '<div class="col-6 offset-3">';
                    echo '<hr style=" border-width:1.5px;">  ';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="row">';
                    echo '  <div class="col-md-11 col-xs-12">';
                    echo '    <p>'.$row["review"].'</p>';
                    echo '  </div>';
                    echo '</div>';
                     if($_SESSION['id'] == $userid){
                         echo '<div class="row">';
                         echo '  <div class=" col-xs-12 col-sm-3 offset-lg-9 offset-md-7 mb-2">';
                         echo '      <button class="mb-3 orange-btn-black-text-main" id="company-evaluation" onclick="on()"> Update Review </button>';
                         echo '  </div>';
                         echo '</div>';
                     }
                    echo '</div>';
                }
            }
        }

    }


?>