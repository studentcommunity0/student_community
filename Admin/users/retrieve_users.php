<?php
    require_once '../../session.php';
    require '../../database_connect.php';


    $status_msg = '';

    # pagination feature
    $users_limit = isset($_GET['user_limit']) ? $_GET['user_limit'] : $_SESSION['users_limit_on_manage_users_php_page'];
    
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    if($page == "next"){ 
        if($_SESSION['current_page'] == $_SESSION['total_user_pages_manage_users_php']){ 
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
    $page_start = ($page - 1) * $users_limit;

    #search for a particular user
    $particular_user = '';
    if(isset($_GET["user_search"])){
        $username_searched = $_GET["user_search"];
        $username_searched = str_replace('%20',' ', $username_searched);
        $particular_user = " username LIKE '%$username_searched%' AND ";
       
    }
   
    # Query to show all users
    $user_query = "SELECT * from user where $particular_user user_type = '2'  LIMIT $page_start, $users_limit";
    $stmt = $connection->prepare($user_query);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $stmt->close();

    if( $result){
        while($user = $result->fetch_assoc()){
            #echo '<form action="block.php" method="POST">';
            echo '<div class="row">';
            echo '    <div class="col-4">';
            echo '  <p> '.$user["username"].' </p>';
            echo '    </div>';
            echo '    <div class="col-4">';
            echo '<p> '.$user["email"].' </p>';
            echo '    </div>';
            echo '    <div class="col-1">';
            if($user["status"] == 5){
                $user_status = 'Blocked';
            }else { $user_status = 'Active';}
            echo '     <p> '.$user_status.' </p>  ';
            echo '    </div>';
            echo '    <div class="col-3">';
            echo '       <button class="orange-btn-black-text-small" onclick="block_user(this)" type="submit" ><i class="fa fa-lock"></i></button>';
            echo '       <button class="orange-btn-black-text-small" onclick="unblock_user(this)" ><i class="fa fa-unlock"></i></button>';
            echo '    </div>';
            echo '</div>';
            #echo '</form>';
            echo '<div class="row">';
            echo '<div class="col-10 offset-1">';
            echo '  <hr style=" border-width:1.5px;">  ';
            echo '</div>';
            echo '</div>';
        }
    }else{
        $status_msg = "error Retrieving All users";
    }
    echo $status_msg;
?>