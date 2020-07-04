<?php

    require_once('../session.php');
    include("../database_connect.php");

    $status_msg = '';
 
    $community_name = $_SESSION['community_name'];
    
    # pagination feature
    $files_limit = isset($_GET['file_limit']) ? $_GET['file_limit'] : $_SESSION['files_limit_on_community_files_php_page'];
    
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    if($page == "next"){ 
        if($_SESSION['current_page'] == $_SESSION['total_file_pages_shared_files_php']){ 
            $page = $_SESSION['current_page'];
        }else{
            $page = $_SESSION['current_page'] + 1;
        }
     }
    elseif($page == "prev"){ 
        if($_SESSION['current_page'] == 1){ 
            $page = $_SESSION['current_page'];
        }else{
            $page = $_SESSION['current_page']-1;
        } 
    }
    
    $_SESSION['current_page'] = $page;
    $page_start = ($page - 1) * $files_limit;
  
    # Get the community_id
    $community_id = mysqli_query($connection,"SELECT id from community where name = '$community_name'");
    $user_id = $_SESSION['id'];
    if($community_id && mysqli_num_rows($community_id)){
        $community_id = mysqli_fetch_array($community_id);
        $community_id = $community_id['id'];

        # Sorting files according to given order
        if(isset($_GET['selected_order'])){
            $selected_order = mysqli_real_escape_string($connection, $_GET['selected_order']);
            if($selected_order == "Recent"){
                $selected_order = "order by date_uploaded DESC";
        
            }elseif($selected_order == "Name_ASC"){
                $selected_order = "order by file_name ASC, date_uploaded DESC";
        
            }elseif($selected_order == "Oldest_First"){
                $selected_order = "order by date_uploaded ASC";
            
            }elseif($selected_order == "Name_DESC"){
                $selected_order = "order by file_name DESC, date_uploaded DESC";
        
            }elseif($selected_order == "file_type_ASC"){
                $selected_order = "order by file_type ASC, date_uploaded DESC";
        
            }elseif($selected_order == "file_type_DESC"){
                $selected_order = "order by file_type DESC, date_uploaded DESC";
        
            }
            #search for a particular file
            $particular_file = '';
            if(isset($_GET["file_search"])){
                $filename_searched = $_GET["file_search"];
                $filename_searched = str_replace('%20',' ', $filename_searched);
                $particular_file = " file_name LIKE '%$filename_searched%' AND";
               
            }
            # query to get all/searched the files of a given community
            $query = "SELECT * from drive WHERE $particular_file  community_id = '$community_id' $selected_order LIMIT $page_start, $files_limit";
            $result = mysqli_query($connection, $query);
            if($result && mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    
                    # query to show delete button if the owner_id is equal to the user currently in session
                    $owner_id = $row['owner_id']; 
                    $username_query = "SELECT username from user where id = '$owner_id';";
                    $username = mysqli_query($connection, $username_query);
                    if($username && mysqli_num_rows($username) == 1){
                        
                        # Storing username and formatting the date
                        $username = mysqli_fetch_array($username);
                        $username = $username['username'];
                        echo '<div class="col-12 mt-2 files-info-p">';
                        echo '<form action="download.php" method="POST">';
                        echo '<div class="row ">';
                        echo '<div class="col-4">';
                        echo '<p >'.$row["file_name"].'</p>';
                        echo '<input type="hidden" name="filename" value="'.$row["file_name"].'">';
                        echo '</div>  ';
                        echo '<div class="col-2">';
                        echo '    <p>'.$username.'</p>';
                        echo '</div>  ';
                        echo '<div class="col-2">';
                        echo '    <p>'.$row["file_size"].'</p>';
                        echo '</div> ';
                        echo '<div class="col-2">';
                        echo '    <p>'.$row["file_type"].'</p>';
                        echo '</div> ';
                        
                        echo '<div class="col-2 d-flex justify-content-end">';
                        echo '    <button class="orange-btn-black-text-small" type="submit" ><i class="fa fa-download"></i></button>';
                        if($user_id == $owner_id){
                            echo '    <button class="orange-btn-black-text-small" data-toggle="modal" data-target="#second-chance" type="button" onclick="delete_file(this)" ><i class="fa fa-trash"></i></button>';
                        }
                        echo '</div>';
                        echo '</div>';
                        echo '</form>';
                        echo '<div class="col-10 offset-1">';
                        echo '<hr style=" border-width:1.5px;">  ';
                        echo '</div>';
                        echo '</div>';  
                    }else{
                        $status_msg = "ERROR!!!";
                    }
                }
            }else{

                $status_msg = "Could not find community in the drive";
            }
    }
    }else{
        $status_msg = "Could not find company!";
    }
    echo $status_msg;
?>