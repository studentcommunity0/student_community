<?php
    require_once("../session.php");
    include("../database_connect.php");

    $status_msg = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['filename'])){

            # Get the filename and file_owner_id
            $filename = basename($_POST['filename']);
            $user_id = $_SESSION['id'];

            # Delete file from DATABASE..
            $delete_query = 'DELETE FROM drive where `file_name` = "'.$filename.'" AND `owner_id` = '.$user_id;
            if(mysqli_query($connection, $delete_query )){

                # Delete file from server..
                $community_name = $_SESSION['community_name'];
                $community_name_without_whitspace = str_replace(' ','-', $community_name);
                $target_dir = "uploads/$community_name_without_whitspace/$filename";
                
                // Use unlink() function to delete a file  
                $file_pointer = $target_dir;  
                if (!unlink($file_pointer)) {  
                    $status_msg = "$filename cannot be deleted due to an error";  
                }  
                else {  
                    $status_msg = "$filename has been deleted";  
                }  
            }
            else{
                $status_msg = 'file not in database';
            }
        }else{
            $status_msg = "Filename not found!";
        }
    }else{
        $status_msg = "UNSUCCESSFUL DELETION!";
    }


    echo $status_msg;
?>