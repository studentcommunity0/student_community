<?php

    require_once '../session.php';
    require '../database_connect.php';
    $status_msg = '';
    $total_votes = 0;
    # GET ALL POLLS
    $community = $_SESSION['community_name'];
    $user_id = $_SESSION['id'];
    $query = "SELECT * from poll where status ='7' AND community_name='$community' AND owner_id='$user_id' order by date_time DESC";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0){
        while( $poll = mysqli_fetch_array($result)){
            echo '<div class="card col-12 p-0 mt-1 mb-1 poll-card">';
            echo '    <div class=" card-header" style="cursor:pointer;" data-toggle="collapse" data-target="#collapse-my-'.$poll["id"].'" aria-expanded="true" aria-controls="collapse-my-'.$poll["id"].'">';
            echo '        <div class="row" id="headingOne">';
            echo '            <h5 class="col-10 mb-0 ">';
            echo '          <button class="btn btn-link" style="color:black; cursor:pointer;" data-toggle="collapse" data-target="#collapse-my-'.$poll["id"].'" aria-expanded="true" aria-controls="collapse-my-'.$poll["id"].'">';
            echo  $poll['title'];
            echo '          </button>';
            echo '      </h5> ';
            echo '      <h5 class="col-2 mb-0 ">';
            
            $total_votes = display_total_num_of_votes($poll['id']);
            echo $total_votes;
            echo ' votes     </h5>';
            echo '  </div>';
            echo '</div>'; 
            echo '<div id="collapse-my-'.$poll["id"].'" class="collapse " aria-labelledby="heading-my-'.$poll["id"].'" data-parent="#accordion">';
            echo '  <div class="card-body">';
            echo '      <p>'.$poll["description"].'</p>';
            echo '      <div class="mt-3 p-3" style="background:#bbbbbb;">';
            echo ' <input  type="hidden" name="poll_id" id="poll_id" value="'.$poll["id"].'">';
            
            # DISPLAY ALL OPTIONS INSIDE COLLAPSIBLE FUNCTION
            display_options($poll['id']);
            echo '      </div>';
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
                
                $option_id = $option["id"];
                $vote = calculate_vote_percent($poll_id,$option_id);
                
                echo '          <div class="form-check">';
                echo '              <label class="form-check-label" for="'.$option_id.'">';
                echo $option["poll_option"];
                echo '              </label>';
                echo '              <div class="progress">
                                        <div class="progress-bar bg-warning black-text-orange-bg " role="progressbar" style="width: '.$vote['percentage'].'%" aria-valuenow="'.$vote['percentage'].'" aria-valuemin="0" aria-valuemax="100"><strong>'.$vote['count'].'</strong></div>
                                    </div>';
                echo '          </div> ';
            }
        }
    }

    function display_total_num_of_votes($poll_id){
        global $connection ;
        $query = "SELECT COUNT(*) as total_votes from poll_votes where poll_id = '$poll_id'";
        if($total_votes = mysqli_query($connection,$query)){
            if(mysqli_num_rows($total_votes) == 1){
                $total_votes = mysqli_fetch_array($total_votes);
                $total_votes = $total_votes['total_votes'];

                return $total_votes;
            }
        }
    }

    function calculate_vote_percent($poll_id,$option_id ){
        global $total_votes;
        global $connection;
        
        $query_calc = "SELECT count(*) vote_option_count from poll_votes where poll_id='$poll_id' AND selected_option_id='$option_id' group by selected_option_id ";
        if($result = mysqli_query($connection, $query_calc)){
            if(mysqli_num_rows($result) == 1){
                $count = mysqli_fetch_array($result);
                $count = $count['vote_option_count'];
                $vote_option_count = ($count * 100)/$total_votes;
                $data = array('percentage' => $vote_option_count,'count' => $count);
                return $data;
            }else{
                $data = array('percentage' => 0,'count' => 0);
                return $data;
            }
        }

    }
?>