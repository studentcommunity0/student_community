<?php 

session_start();
$db = mysqli_connect('localhost', 'root', '', 'student_community') or die("connection failed");



if($_SERVER['REQUEST_METHOD'] == "POST"){

    // change username
    if(isset($_POST['newUsername'])){
        $newUsername = mysqli_real_escape_string( $db, $_POST['newUsername']);
        $username = $_SESSION['username'];

        $sql = "UPDATE `user` SET `username`='$newUsername' WHERE username='$username'";
        $results = mysqli_query($db, $sql);

        $_SESSION['username'] = $newUsername;
    }

    // change password
    if(isset($_POST['currentPassword'])){

        $currentPassword = mysqli_real_escape_string( $db, $_POST['currentPassword']);
        $username = $_SESSION['username'];

        // $sql = "INSERT INTO `teest`(`thetest`) VALUES ('$username')";
        // $results = mysqli_query($db, $sql);

        $passQuery = "SELECT * FROM `user` WHERE `username` = '$username' ";
        $result = mysqli_query($db, $passQuery);

        if(mysqli_num_rows($result) > 0){

            $user = mysqli_fetch_assoc($result);
            $sql2 = "INSERT INTO `teest`(`thetest`) VALUES ('$user[password]')";
            $results = mysqli_query($db, $sql2);
            //got user password
        }


        
    }

    

}







?>