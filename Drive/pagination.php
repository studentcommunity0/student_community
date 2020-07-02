<?php
    require_once('../session.php');
    include("../database_connect.php");

    # Check if community name exists and get id to get count of all files in that community..
    $community_name = $_SESSION['community_name'];
    $query = "SELECT id from community where name = '$community_name'";
    if($community_id = mysqli_query($connection, $query)){
        $community_id = mysqli_fetch_array($community_id);
        $_SESSION['community_id_for_shared_files_page'] = $community_id['id'];
        $community_id = $_SESSION['community_id_for_shared_files_page'];

        # query to get the number of pages in community
        $num_files = $connection->query("SELECT count(*) as count From drive where community_id = $community_id");
        $num_files = mysqli_fetch_array($num_files);
        $total_files = $num_files['count'];
        
        # The session variable is used in retrieve_files.php..
        $_SESSION['files_limit_on_community_files_php_page'] = $_GET['file_limit'];
        $num_pages = ceil( $total_files/ $_SESSION['files_limit_on_community_files_php_page']);
        
        # The session variable is used in retrieve_files.php
        $_SESSION['total_file_pages_shared_files_php'] = $num_pages;

        # Display pagination html..
        echo '<ul class="pagination ">';
        echo '          <li class="page-item">';
        echo '            <a class="page-link orange-text-black-bg" href="#files-id" onclick="retrieve_files_via_pagination(this)" aria-label="Previous" id="prev">';
        echo '        <span aria-hidden="true">&laquo;</span>';
        echo '        <span class="sr-only">Previous</span>';
        echo '      </a>';
        echo '    </li>';
        for($i = 1; $i <= $num_pages; ++$i){ 
            echo '       <li class="page-item "><a class="page-link orange-text-black-bg" href="#files-id" onclick="retrieve_files_via_pagination(this)" id="'.$i.'" >'.$i.'</a></li>';
        }
        echo '    <li class="page-item ">';
        echo '      <a class="page-link orange-text-black-bg" href="#files-id" onclick="retrieve_files_via_pagination(this)" aria-label="Next" id="next">';
        echo '';
        echo '        <span aria-hidden="true" style="border-radius:none;">&raquo;</span>';
        echo '        <span class="sr-only">Next</span> ';
        echo '        ';
        echo '      </a>';
        echo '    </li>';
        echo '  </ul>';
    }
  ?>