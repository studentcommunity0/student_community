<?php
    require_once('../../session.php');
    include("../../database_connect.php");

    

    # query to get the number of pages in manage event
    $num_events = $connection->query("SELECT count(*) as count From events");
    $num_events = mysqli_fetch_array($num_events);
    $total_events = $num_events['count'];
    
    # The session variable is used in retrieve_events.php..
    $_SESSION['events_limit_on_manage_events_php_page'] = $_GET['event_limit'];
    $num_pages = ceil( $total_events/ $_SESSION['events_limit_on_manage_events_php_page']);
    
    # The session variable is used in retrieve_events.php
    $_SESSION['total_event_pages_manage_events_php'] = $num_pages;

    # Display pagination html..
    echo '<ul class="pagination ">';
    echo '          <li class="page-item">';
    echo '            <a class="page-link orange-text-black-bg" href="#events-id" onclick="retrieve_events_via_pagination(this)" aria-label="Previous" id="prev">';
    echo '        <span aria-hidden="true">&laquo;</span>';
    echo '        <span class="sr-only">Previous</span>';
    echo '      </a>';
    echo '    </li>';
    for($i = 1; $i <= $num_pages; ++$i){ 
        echo '       <li class="page-item "><a class="page-link orange-text-black-bg" href="#events-id" onclick="retrieve_events_via_pagination(this)" id="'.$i.'" >'.$i.'</a></li>';
    }
    echo '    <li class="page-item ">';
    echo '      <a class="page-link orange-text-black-bg" href="#events-id" onclick="retrieve_events_via_pagination(this)" aria-label="Next" id="next">';
    echo '';
    echo '        <span aria-hidden="true" style="border-radius:none;">&raquo;</span>';
    echo '        <span class="sr-only">Next</span> ';
    echo '        ';
    echo '      </a>';
    echo '    </li>';
    echo '  </ul>';
  ?>