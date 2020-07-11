<?php 
    use \Datetime;
    require_once("../session.php");
    include('../database_connect.php');
    $status_msg = '';
    # user id 
    $user_id = $_SESSION['id'];
    

    $community_id  = $_SESSION['community_id_for_shared_files_page'];
        
    # Getting a target file directory and cleaning the filename..
    $community_name = $_SESSION['community_name'];
    $community_name_without_whitspace = str_replace(' ','-', $community_name);
    $target_dir = "uploads/$community_name_without_whitspace/";
    $filename = basename($_FILES["file"]["name"]);
    $target_file_dir = $target_dir.$filename;

    # If folder not present create one
    if(!is_dir($target_dir)){
        mkdir($target_dir);
    }
    
    $file_type = pathinfo($target_file_dir, PATHINFO_EXTENSION);
    $file_size = formatSizeUnits($_FILES['file']['size']);
    if(!empty($_FILES["file"]["name"])){
        
        # upload file to server and insert filename and details onto database..
        if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file_dir)){
            $now = new Datetime();
            $now = $now->format('Y-m-d H:i:s');
            $query = "INSERT INTO drive (`file_name`,`file_type`, `owner_id`, `community_id`, `date_uploaded`, `status`, `file_size` ) VALUES('$filename', '$file_type', '$user_id', '$community_id', '$now', 'available', '$file_size');";
            
            if(mysqli_query($connection, $query)){
                $status_msg = "The file ".$filename. " has been uploaded successfully.";
            }else{
                $status_msg = "The file ".$filename. " has not been uploaded .";
            }

        }else{
            $status_msg = "Sorry, there was an error uploading your file.";
        }
        
    }else{
        $status_msg = "could not find the file..";
    }
    

    header("Location: sharedfiles.php?status='$status_msg'");



    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
?>