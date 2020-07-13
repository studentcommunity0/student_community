<?php
    require_once '../../session.php';
    require '../../database_connect.php';


    $status_msg = '';

    # pagination feature
    $events_limit = isset($_GET['event_limit']) ? $_GET['event_limit'] : $_SESSION['events_limit_on_manage_events_php_page'];
    
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    if($page == "next"){ 
        if($_SESSION['current_page'] == $_SESSION['total_event_pages_manage_events_php']){ 
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
    $page_start = ($page - 1) * $events_limit;

    #search for a particular event
    $particular_event = '';
    if(isset($_GET["event_search"])){
        $eventname_searched = $_GET["event_search"];
        $eventname_searched = str_replace('%20',' ', $eventname_searched);
        $particular_event = " where name LIKE '%$eventname_searched%' ";
       
    }
   
    # Query to show all events
    $event_query = "SELECT * from events  $particular_event  LIMIT $page_start, $events_limit";
    $stmt = $connection->prepare($event_query);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $stmt->close();

    if( $result){
        while($event = $result->fetch_assoc()){
            echo '<div class="row">';
            echo '    <div class="col-1">';
            echo '  <p> '.$event["id"].' </p>';
            echo '    </div>';
            echo '    <div class="col-2">';
            echo '  <p> '.$event["name"].' </p>';
            echo '    </div>';
            echo '    <div class="col-3">';
            echo '  <p> '.$event["description"].' </p>';
            echo '    </div>';
            echo '    <div class="col-2">';
            echo '<p> '.$event["community"].' </p>';
            echo '    </div>';
            echo '    <div class="col-2">';
            echo '     <p> '.$event["date_of_event"].' </p>  ';
            echo '    </div>';
            echo '    <div class="col-2">';
            echo '       <button class="orange-btn-black-text-small" onclick="delete_event(this)" type="submit" ><i class="fa fa-trash"></i></button>';
            echo '    </div>';
            echo '</div>';
             echo '<div class="row">';
            echo '<div class="col-10 offset-1">';
            echo '  <hr style=" border-width:1.5px;">  ';
            echo '</div>';
            echo '</div>';
        }
    }else{
        $status_msg = "error Retrieving All events";
    }
    echo $status_msg;
?>