<?php
    require_once('session.php');
    include("database_connect.php");
    $selected_order = mysqli_real_escape_string($connection, $_GET['selected_order']);

    if($selected_order == "Recent"){
        $selected_order = "order by date_time_of_review DESC";

    }elseif($selected_order == "Most_Rated_First"){
        $selected_order = "order by stars DESC, date_time_of_review DESC";

    }elseif($selected_order == "Oldest_First"){
        $selected_order = "order by date_time_of_review ASC";
    
    }elseif($selected_order == "Least_Rated_First"){
        $selected_order = "order by stars ASC, date_time_of_review DESC";

    }
    elseif($selected_order == "1_star"){
        $selected_order = "AND stars = '1' Order by date_time_of_review DESC";

    }
    elseif($selected_order == "2_star"){
        $selected_order = "AND stars = '2' Order by date_time_of_review DESC";

    }
    elseif($selected_order == "3_star"){
        $selected_order = "AND stars = '3' Order by date_time_of_review DESC";

    }
    elseif($selected_order == "4_star"){
        $selected_order = "AND stars = '4' Order by date_time_of_review DESC";

    }
    elseif($selected_order == "5_star"){
        $selected_order = "AND stars = '5' Order by date_time_of_review DESC";

    }


    $company_id = $_SESSION['company_id'];
    $num_pages = $connection->query("SELECT count(*) as count From review where company_id = $company_id $selected_order");
    $num_pages = mysqli_fetch_array($num_pages);
    $total_reviews = $num_pages['count'];
    $_SESSION['reviews_limit_on_company_php_page'] = $_GET['review_limit'];
    $num_pages = ceil( $total_reviews/ $_SESSION['reviews_limit_on_company_php_page']);
    $_SESSION['total_review_pages_company_php'] = $num_pages;


    echo '<ul class="pagination ">';
    echo '          <li class="page-item">';
    echo '            <a class="page-link orange-text-black-bg" href="#reviews-id" onclick="retrieve_reviews_via_pagination(this)" aria-label="Previous" id="prev">';
    echo '        <span aria-hidden="true">&laquo;</span>';
    echo '        <span class="sr-only">Previous</span>';
    echo '      </a>';
    echo '    </li>';
     for($i = 1; $i <= $num_pages; ++$i){ 
        echo '       <li class="page-item "><a class="page-link orange-text-black-bg" href="#reviews-id" onclick="retrieve_reviews_via_pagination(this)" id="'.$i.'" >'.$i.'</a></li>';
     }
    echo '    <li class="page-item ">';
    echo '      <a class="page-link orange-text-black-bg" href="#reviews-id" onclick="retrieve_reviews_via_pagination(this)" aria-label="Next" id="next">';
    echo '';
    echo '        <span aria-hidden="true" style="border-radius:none;">&raquo;</span>';
    echo '        <span class="sr-only">Next</span> ';
    echo '        ';
    echo '      </a>';
    echo '    </li>';
    echo '  </ul>';

  ?>