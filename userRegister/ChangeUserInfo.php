<?php 

session_start();

$db = mysqli_connect('localhost', 'root', '', 'student_community') or die("connection failed");

$errors = array();
$success = array();



if (isset($_POST['ChangePasswordButton'])){
    //get user info
    $username = $_SESSION['username'];
    $currentPassword = mysqli_real_escape_string( $db, $_POST['cPass']);
    $newPassword1 = mysqli_real_escape_string( $db, $_POST['Pass1']);
    $newPassword2 = mysqli_real_escape_string( $db, $_POST['Pass2']);

    //get the user in the session
    $passQuery = "SELECT * FROM `user` WHERE `username` = '$username' ";
    $result = mysqli_query($db, $passQuery);

    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        //we have the user who is in the session
        
        //verifiy the user's current password with the db
        if(password_verify($currentPassword, $user['password'])){
        
            if($newPassword1 == $newPassword2){
                
                // $sql = "INSERT INTO `teest`(`thetest`) VALUES ('$newPassword2')";
                // $results = mysqli_query($db, $sql);
    
                $newPassword = password_hash($newPassword1, PASSWORD_DEFAULT);
    
                $sql = "UPDATE `user` SET `password`='$newPassword' WHERE username='$username'";
                $results = mysqli_query($db, $sql);
                array_push($success, "password changed successfully");
    
            }else{
    
                array_push($errors, "confirm password does not match");
            }
    
        }else{
            array_push($errors, "current password does not match");
        }
    }


    


}


if($_SERVER['REQUEST_METHOD'] == "POST"){

    // change username
    if(isset($_POST['newUsername'])){
        $newUsername = mysqli_real_escape_string( $db, $_POST['newUsername']);
        $username = $_SESSION['username'];

        $sql = "UPDATE `user` SET `username`='$newUsername' WHERE username='$username'";
        $results = mysqli_query($db, $sql);

        $_SESSION['username'] = $newUsername;
    }

    
}
            





?>

