<?php
    require_once '../session.php';
    require '../database_connect.php';
    $status_msg = '';

    if($_SERVER['REQUEST_METHOD'] == "GET"){

        # GET ALL REQUIRED POLL INFO FROM USER
        if(isset($_GET['poll_id'])){
            $poll_id = $_GET['poll_id'];
            $option_id = $_GET["radio_$poll_id"];
            $user_id = $_SESSION['id'];
            
            # QUERY TO CHECK IF USER ALREADY SUBMITTED THE POLL OR NOT
            $check_if_poll_submission_present = "SELECT * FROM poll_votes where poll_id=$poll_id AND user_id=$user_id LIMIT 1";
            if( mysqli_num_rows(mysqli_query($connection, $check_if_poll_submission_present)) == 1){
                $update_query = "UPDATE poll_votes SET selected_option_id=$option_id where poll_id=$poll_id AND user_id=$user_id ";

                # IF USER SUBMITTED POLL PREVIOUSLY, UPDATE IT
                if(mysqli_query($connection, $update_query)){
                    $status_msg = 'poll updated!';
                }else{
                    $status_msg = 'Error updating poll.';
                }
            }else{
                
                # NEW POLL SUBMISSION QUERY
                $insert_query = "INSERT into poll_votes (poll_id, user_id, selected_option_id) VALUES ($poll_id, $user_id, $option_id)";
                if(mysqli_query($connection, $insert_query)){
                    $status_msg = 'poll submitted successfully!';
                }else{
                    $status_msg = 'Error submitting poll.';
                }
            }
            
        }

    }

    # MAP BACK TO ALL POLLS PAGE AND SHOW STATUS 
    header("Location: all_polls_page.php?status=$status_msg") ;
?>