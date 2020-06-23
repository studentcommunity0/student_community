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
            $selected_order = "order by stars DESC";

        }elseif($selected_order == "Oldest_First"){
            $selected_order = "order by date_time_of_review ASC";
        
        }elseif($selected_order == "Least_Rated_First"){
            $selected_order = "order by stars ASC";

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
                    echo '<div class="reviewer-div mt-4" >';
                    echo '<div class="row" >';
                    echo '  <div class="col-md-9 col-xs-12">';
                    echo '    <p>'.$date.'</p>';
                    echo '  </div>';
                    echo '  <div class="col-10 stars " data-rating="'.$row["stars"].'">';
                    
                    # Displays the star rating of a single user
                    for($iterator = 0; $iterator <= 4; ++$iterator){
                        if($iterator <= $row["stars"] - 1){
                            echo '<span class="star rated"></span>';
                        }else{
                            echo '<span class="star"></span>';
                        }
                    }   
                    echo '  </div>';
                    echo '</div>';
                    echo '<div class="row">';
                    echo '  <div class="col-12 col-sm-12" style="font-weight:600; word-wrap: break-word">';
                    echo '    <h5> '.$row["title"].'</h5>';
                    echo '  </div>';
                    echo '</div>';
                    echo '<div class="row ml-1 mb-3">';
                    echo '  <div class="col-lg-9 col-md-8 col-xs-12" style=" text-align: left;">';
                    echo '    <p> '.$username.' </p>';
                    echo '  </div>';
                    echo '  <div class="col-lg-3 col-md-4 col-xs-12" style=" text-align: right;">';
                    echo '    <p> '.$row["from_date"].' - '.$row["to_date"].'</p>';
                    echo '  </div>';
                    echo '</div>';
                    echo '<div class="row">';
                    echo '  <div class=" col-lg-10 col-md-12 col-xs-12">';
                    echo '    <p>'.$row["review"].'</p>';
                    echo '  </div>';
                    echo '</div>';
                     if($_SESSION['id'] == $userid){
                         echo '<div class="row">';
                         echo '  <div class=" col-xs-12 col-sm-3 offset-sm-9 mb-2">';
                         echo '      <button class="mb-3" id="company-evaluation" onclick="on()"> Update Review </button>';
                         echo '  </div>';
                         echo '</div>';
                     }
                    echo '</div>';
                }
            }
        }

    }


?>