<?php
    require_once '../../session.php';
    require '../../database_connect.php';


    $status_msg = '';

    # pagination feature
    $communities_limit = isset($_GET['community_limit']) ? $_GET['community_limit'] : $_SESSION['communities_limit_on_manage_communities_php_page'];
    
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    if($page == "next"){ 
        if($_SESSION['current_page'] == $_SESSION['total_community_pages_manage_communities_php']){ 
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
    $page_start = ($page - 1) * $communities_limit;

    #search for a particular community
    $particular_community = '';
    if(isset($_GET["community_search"])){
        $communityname_searched = $_GET["community_search"];
        $communityname_searched = str_replace('%20',' ', $communityname_searched);
        $particular_community = "where name LIKE '%$communityname_searched%' ";
       
    }
   
    # Query to show all communities
    $community_query = "SELECT * from community  $particular_community  LIMIT $page_start, $communities_limit";
    $stmt = $connection->prepare($community_query);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $stmt->close();

    if( $result){
        while($community = $result->fetch_assoc()){
            $community_name = $community["name"];
            echo '<div class="row">';
            echo '    <div class="col-4">';
            echo '  <p> '.$community_name.' </p>';
            echo '    </div>';
            echo '    <div class="col-1">';
            echo '<p> '.$community["availability"].' </p>';
            echo '    </div>';
            echo '    <div class="col-2">';
            echo '     <p> '.$community['category'].' </p>  ';
            echo '    </div>';
            # Get Creator email
            $get_creator_email = "  Select email 
                                    from user 
                                    where id = (
                                        Select creator 
                                        from community
                                        where name = '$community_name'
                                    )";
            if($get_creator_email = mysqli_query($connection, $get_creator_email)){
                if(mysqli_num_rows($get_creator_email) == 1){
                    $creator_email = mysqli_fetch_array($get_creator_email);
                    $creator_email = $creator_email['email'];
                    
                    
                }else{
                    $creator_email = 'Email or User not present';
                }
            }
            echo '    <div class="col-2">';
            echo '     <p> <a href="mailto:'.$creator_email.'" style="color:black; text-decoration:none;"> '.$creator_email.'</a> </p>  ';
            echo '    </div>';
            echo '    <div class="col-3">';
            echo '       <button class="orange-btn-black-text-small" onclick="delete_community(this)" ><i class="fa fa-trash"></i></button>';
            echo '    </div>';
            echo '</div>';
            echo '<div class="row">';
            echo '<div class="col-10 offset-1">';
            echo '  <hr style=" border-width:1.5px;">  ';
            echo '</div>';
            echo '</div>';
        }
    }else{
        $status_msg = "error Retrieving All communities";
    }
    echo $status_msg;
?>