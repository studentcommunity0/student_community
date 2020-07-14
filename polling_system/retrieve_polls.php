<?php

    require_once '../session.php';
    require '../database_connect.php';
    $status_msg = '';

    # GET ALL POLLS
    $community = $_SESSION['community_name'];
    $query = "SELECT * from poll where status ='7' AND community_name='$community' order by date_time DESC";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0){
        while( $poll = mysqli_fetch_array($result)){
            echo '<div class="card col-12 p-0 mt-1 mb-1 poll-card">';
            echo '    <div class=" card-header" style="cursor:pointer;" data-toggle="collapse" data-target="#collapse'.$poll["id"].'" aria-expanded="true" aria-controls="collapse'.$poll["id"].'">';
            echo '        <div class="row" id="headingOne">';
            echo '            <h5 class="col-12 mb-0 ">';
            echo '          <button class="btn btn-link" style="color:black; cursor:pointer;" data-toggle="collapse" data-target="#collapse'.$poll["id"].'" aria-expanded="true" aria-controls="collapse'.$poll["id"].'">';
            echo  $poll['title'];
            echo '          </button>';
            echo '      </h5> ';
            echo '      <h5 class="col-2 mb-0 ">';
            echo '      </h5>';
            echo '  </div>';
            echo '</div>'; 
            echo '<div id="collapse'.$poll["id"].'" class="collapse " aria-labelledby="heading'.$poll["id"].'" data-parent="#accordion">';
            echo '  <div class="card-body">';
            echo '      <p>'.$poll["description"].'</p>';
            echo '      <form class="mt-3 p-3" style="background:#bbbbbb;" action="submit_poll.php" method="GET">';
            echo ' <input  type="hidden" name="poll_id" id="poll_id" value="'.$poll["id"].'">';
            
            # DISPLAY ALL OPTIONS INSIDE COLLAPSIBLE FUNCTION
            display_options($poll['id']);
            echo '          <div class="mt-3">';
            echo '              <button type="submit" class="orange-btn-black-text-medium">Submit</button>';
            echo '          </div>';
            echo '      </form>';
            echo '  </div>';
            echo '</div> ';
            echo '</div>';
        }
    }


    function display_options($poll_id){
        global $connection;
        $query_options = "SELECT * from poll_options where poll_id=$poll_id";
        if(($options = mysqli_query($connection, $query_options)) && (mysqli_num_rows($options) > 0)){
            while( $option = mysqli_fetch_array($options) ){
                echo '          <div class="form-check">';
                echo '              <input class="form-check-input" type="radio" name="radio_'.$poll_id.'" id="'.$option["id"].'" value="'.$option["id"].'">';
                echo '              <label class="form-check-label" for="'.$option["id"].'">';
                echo $option["poll_option"];
                echo '              </label>';
                echo '          </div> ';
            }
        }
        
        
    }
?>