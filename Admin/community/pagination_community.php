<?php
    require_once('../../session.php');
    include("../../database_connect.php");

    

    # query to get the number of pages in manage community
    $num_communities = $connection->query("SELECT count(*) as count From community");
    $num_communities = mysqli_fetch_array($num_communities);
    $total_communities = $num_communities['count'];
    
    # The session variable is used in retrieve_communities.php..
    $_SESSION['communities_limit_on_manage_communities_php_page'] = $_GET['community_limit'];
    $num_pages = ceil( $total_communities/ $_SESSION['communities_limit_on_manage_communities_php_page']);
    
    # The session variable is used in retrieve_communities.php
    $_SESSION['total_community_pages_manage_communities_php'] = $num_pages;

    # Display pagination html..
    echo '<ul class="pagination ">';
    echo '          <li class="page-item">';
    echo '            <a class="page-link orange-text-black-bg" href="#communities-id" onclick="retrieve_communities_via_pagination(this)" aria-label="Previous" id="prev">';
    echo '        <span aria-hidden="true">&laquo;</span>';
    echo '        <span class="sr-only">Previous</span>';
    echo '      </a>';
    echo '    </li>';
    for($i = 1; $i <= $num_pages; ++$i){ 
        echo '       <li class="page-item "><a class="page-link orange-text-black-bg" href="#communities-id" onclick="retrieve_communities_via_pagination(this)" id="'.$i.'" >'.$i.'</a></li>';
    }
    echo '    <li class="page-item ">';
    echo '      <a class="page-link orange-text-black-bg" href="#communities-id" onclick="retrieve_communities_via_pagination(this)" aria-label="Next" id="next">';
    echo '';
    echo '        <span aria-hidden="true" style="border-radius:none;">&raquo;</span>';
    echo '        <span class="sr-only">Next</span> ';
    echo '        ';
    echo '      </a>';
    echo '    </li>';
    echo '  </ul>';
  ?>