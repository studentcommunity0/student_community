<?php 
    require_once('session.php');
    include("database_connect.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $company_name = mysqli_real_escape_string( $connection, $_POST['company_name']);
        $user_id =      $_SESSION['id'];
        $from_date =    mysqli_real_escape_string( $connection, $_POST['from_date']);
        $to_date =      mysqli_real_escape_string( $connection, $_POST['to_date']);
        $title =        mysqli_real_escape_string( $connection, $_POST['title']);
        $review =       mysqli_real_escape_string( $connection, $_POST['review']);
        $star_rating =  mysqli_real_escape_string( $connection, $_POST['rating']);
        $date_time_of_review =       mysqli_real_escape_string( $connection, $_POST['date_time_of_review']);
        
        
        if(isset($company_name, $user_id, $from_date, $to_date, $title, $review, $date_time_of_review)){    

            # Getting the company id and user id.
            # No need to check if it is present because, the user already in session and company details page was clicked
            $querycompany = "SELECT id FROM company where name ='$company_name';";
            $result = mysqli_query($connection, $querycompany);
            
            if($result && mysqli_num_rows($result) == 1){
                
                $company_id = mysqli_fetch_array($result);
                $company_id = $company_id['id'];
                
                # Checking if the user has written a review for the company
                $check_if_review_exists_query = "SELECT * FROM review where `company_id` = $company_id AND `user_id` = $user_id";
                $check_if_review_exists_query = mysqli_query($connection, $check_if_review_exists_query);
                
                if($check_if_review_exists_query && mysqli_num_rows($check_if_review_exists_query) == 1){
                     # Review update query
                    $query = "UPDATE review SET `title`= '$title', `review`= '$review', `date_time_of_review`= '$date_time_of_review', `stars`= '$star_rating', `from_date`= '$from_date', `to_date`= '$to_date' WHERE `company_id`= '$company_id' AND `user_id`= '$user_id'";
                }
                else{
                    # Review insertion query
                    $query = "INSERT INTO review (`company_id`, `user_id`, `from_date`, `to_date`, `title`, `review`, `date_time_of_review`, `stars` ) VALUES('$company_id', '$user_id', '$from_date', '$to_date', '$title', '$review', '$date_time_of_review', '$star_rating');";
                }
                if(mysqli_query($connection, $query)){
                    include("updateCompanyRating.php");
                    $message = "Success..";
                    header("Location: company.php?message=".$message);
                }
                else{
                    echo 'did not work..';
                    $message = "faliure";
                    header("Location: company.php?message=".$message);
                }
            }
        }
        else{
            $message = "Please all fields";
            header("Location: company.php?message=".$message);
        }
    }
    





?>