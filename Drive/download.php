<?php
    require_once("../session.php");

    $status_msg = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['filename'])){

            # Get target file location on server
            $filename = basename($_POST['filename']);
            $community_name = $_SESSION['community_name'];
            $community_name_without_whitspace = str_replace(' ','-', $community_name);
            $target_dir = "uploads/$community_name_without_whitspace/$filename";
            
            # required headers to download a file..
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header('Content-Disposition: attachment; filename="'.$filename.'"');
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: binary");
            ob_clean();
            flush();
            readfile($target_dir);
            exit;
        }else{
            $status_msg = "Filename not set";
        }
    }else{
        $status_msg = "UNSUCCESSFUL DOWNLOAD!";
    }


    
?>