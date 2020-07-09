<?php
    require_once '../../session.php';
    require '../../database_connect.php';

    # Delete COMMUNITY
    $status_msg= ' ';

    if($_SERVER['REQUEST_METHOD']== 'POST'){
        if(isset($_POST['communityname'])){
            $community_name = $_POST['communityname'];
            $result = mysqli_query($connection, "SELECT id from community where name='$community_name'");
            $result = mysqli_fetch_array($result);
            $community_id = $result['id'];
            /**
             * Order of deleting 
             *      1. community messages
             *      2. events
             *      3. drive contents
             *      4. community participants
             *      5. community
             * 
             */
            
            # MESSAGES....................................................................................................
            delete_messages($community_name);
            
            # EVENTS......................................................................................................
            delete_events($community_name);
                  
            # DRIVE.......................................................................................................
            delete_drive($community_id, $community_name);
           
            # PARTICIPANTS................................................................................................
            delete_participants($community_name);
                            
            # COMMUNITY...................................................................................................
            delete_community($community_name);
        
        }else{
            $status_msg= ' Community name not identified.';
        }

    }
    echo $status_msg;


    function delete_messages($community_name){
        global $connection, $status_msg;
        $delete_community_messages = "DELETE FROM communities_messages where community_name='$community_name'";
        if(mysqli_query($connection,$delete_community_messages)){
            $status_msg = 'Deleted community messages';
        }else{
            $status_msg = $status_msg.',could not delete messages';
        }
    }

    function delete_events($community_name){
        global $connection, $status_msg;
        $delete_community_events = "DELETE from events where community='$community_name'";
        if(mysqli_query($connection, $delete_community_events)){
            $status_msg = $status_msg.', events';
        }else{
            $status_msg =$status_msg.',could not delete events';

        }
    }

    function delete_drive($community_id, $community_name){
        global $connection, $status_msg;
        $delete_drive_contents = "DELETE FROM drive where community_id='$community_id'";
        if(mysqli_query($connection,$delete_drive_contents)){
            
            # Delete file from server..
            $community_name_without_whitspace = str_replace(' ','-', $community_name);
            $target_dir = "../../Drive/uploads/$community_name_without_whitspace";
            
            if(delete_directory($target_dir))
                $status_msg = $status_msg.', files';
            else
                $status_msg = $status_msg.', no files';
        
        }else{
            $status_msg = $status_msg.',could not delete drive';

        }    
    }

    
    function delete_directory($dir_name){
        if(is_dir($dir_name)){
            $dir_handle = opendir($dir_name);
            while($file = readdir($dir_handle)){
                if($file !="." && $file != ".."){
    
                    $target_file = $dir_name."/".$file;
                    if(!is_dir($target_file))
                        unlink($target_file);
                    else
                        delete_directory($target_file);
                    
                }
            }
            closedir($dir_handle);
            rmdir($dir_name);
            return true;
        }
        if(!$dir_name)
            return false;
        
        
    }

    function delete_participants($community_name){
        global $connection, $status_msg;
        $delete_community_participants = "DELETE from communities_participants where community_name='$community_name'";
        if(mysqli_query($connection,$delete_community_participants)){
            $status_msg = $status_msg.', participants';
        }else{
            $status_msg= $status_msg.',could not delete participants';
        }
    }

    function delete_community($community_name){
        global $connection, $status_msg;
        $delete_community = "DELETE FROM community where name='$community_name'";
        if(mysqli_query($connection, $delete_community)){
            $status_msg = $status_msg.' and community';

        }else{
            $status_msg =$status_msg.', could not delete community';
        }

    }
?>