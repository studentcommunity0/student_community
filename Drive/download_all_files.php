<?php

    require_once("../session.php");
    include("../database_connect.php");
    $community_id = $_SESSION["community_id_for_shared_files_page"];
    $query_to_get_all_file_names = "Select file_name from drive where community_id = $community_id";

    $file_names = array();

    if($query_result = mysqli_query($connection, $query_to_get_all_file_names)){
        if(mysqli_num_rows($query_result)>0){
            while($row = mysqli_fetch_array($query_result)){
                array_push($file_names, basename($row['file_name']) );
            }
            # naming the zip file as the community name
            $community_name_without_whitspace = str_replace(' ','-', $_SESSION["community_name"]);
            $zip_name = $community_name_without_whitspace.".zip";

            # creating a zip file and the dir it should be in..
            $zip = new ZipArchive;
            $target_dir_for_zip_file = "uploads/community_files_compilation/$zip_name";
            
            # open($target_dir_for_zip_file) creates an empty zip file in that directory..
            $zip->open($target_dir_for_zip_file, ZipArchive::CREATE|ZipArchive::OVERWRITE);

            # adding all files to the zip file.
            foreach($file_names as $file){
                $target_dir = "uploads/$community_name_without_whitspace/$file";
                $zip->addfile($target_dir, $file);
            }
            $zip->close();
            
            # Downloading the zip file
            # required headers to download a file..
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header('Content-Disposition: attachment; filename="'.$zip_name.'"');
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: binary");
            ob_clean();
            flush();
            readfile($target_dir_for_zip_file);
            exit;
        }
        else{
            $status_msg = "no files to download";
        }
    }else{
        $status_msg = "did not work";
    }

    header("Location: sharedfiles.php?status=$status_msg");
?>