<?php

    require '../session.php';
    require '../database_connect.php';
    
    if(isset($_GET['statistic-option'])){
        $stat = $_GET['statistic-option'];

        if($stat == 'most_Rated_company'){
            $query = " SELECT name, stars from company where stars = (SELECT MAX(stars) from company) ";
            $result = mysqli_query($connection, $query);
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_array($result);
                $header1 = 'Company';
                $header2 = 'Rating';
                $col_1 =  $row['name'];
                $col_2 =  $row['stars'];
            }
        }
        else if($stat == 'most_popular_community'){
            $query = " SELECT community_name, count(participant_id) as participants from communities_participants group by community_name order by participants DESC";
            $result = mysqli_query($connection, $query);
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_array($result);
                $header1 = 'community';
                $header2 = 'number of participants';
                $col_1 = $row['community_name'];
                $col_2 = $row['participants'];
            }
        }
        else if($stat == 'most_active_seller'){
            $query = "select username, count from user join (SELECT userid,count(userid) as count from item group by userid order by count(userid) DESC) as A on user.id = A.userid order by count desc";
            $result = mysqli_query($connection, $query);
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_array($result);
                $header1 = 'username';
                $header2 = 'items Sold';
                $col_1 = $row['username'];
                $col_2 = $row['count'];
            }
        }

        header("Location: index.php?header1=$header1&header2=$header2&col1=$col_1&col2=$col_2");
    }

?>