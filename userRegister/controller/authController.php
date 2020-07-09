<?php

session_start();

require_once 'emailController.php';

$db = mysqli_connect('localhost', 'root', '', 'student_community') or die("connection failed");

$errors = array();
$email = "";
$username = "";

// ---------------------------------------register a user

if (isset($_POST['registerBtn'])){

    // get user information 

    $email = mysqli_real_escape_string($db, $_POST['userEmail']);
    $username = mysqli_real_escape_string($db, $_POST['userUsername']);
    $password1 = mysqli_real_escape_string($db, $_POST['userPassword1']);
    $password2 = mysqli_real_escape_string($db, $_POST['userPassword2']);

    // form validation

    if(empty($email)){
        array_push($errors, "email is required");
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "email is invalid");
    }

    if(empty($username)){
        array_push($errors, "username is required");
    }
    if(empty($password1)){
        array_push($errors, "password is required");
    }
    if($password1 != $password2){
        array_push($errors, "passwords do not match");
    }

    // check that email is a university email
    
    // $pattern = "/.edu.sa/i";
    // $uniEmail = preg_match($pattern, $email);
    // //if there is no match
    // if($uniEmail != 1){
    //     array_push($errors, "the email must be a university email");
    // }

    // check db for existing email and username

    $emailQuery = "SELECT * FROM `user` WHERE username=? or email=? LIMIT 1";
    $stmt = $db->prepare($emailQuery);
    $stmt->bind_param('ss', $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if ($user){

        if($user['username'] == $username){
            array_push($errors, "username already exists");
        }
        
        if($user['email'] == $email){
            array_push($errors, "email already exists");
        }

    }

    // if no errors register user

    if(count($errors) == 0){
        
        $password = password_hash($password1, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        $verified = 0;

        $query = "INSERT INTO `user`(`username`, `email`, `verified`, `token`, `password`) VALUES (?, ?, ?, ?, ?)";
        $stmt1 = $db->prepare($query);
        $stmt1->bind_param('ssiss', $username, $email, $verified, $token, $password);
        //printf("Error: %s.\n", $stmt1->error);

        if ($stmt1->execute()){
            $user_id = $db->insert_id;
            // set the session
            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = $verified;

            sendVerificationEmail($email, $token);

            header("Location: index.php");
        }
        
        
    }else{
        echo "an error occured";
        
    }
}


// ---------------------------------------log in a user

if (isset($_POST['loginBtn'])){

    $email = mysqli_real_escape_string($db, $_POST['userEmail']);
    $password = mysqli_real_escape_string($db, $_POST['userPassword1']);

    if(empty($email)){
        array_push($errors, "email is required");
    }

    if(empty($password)){
        array_push($errors, "password is required");
    }

    if(count($errors) == 0){

        $login_query = "SELECT * FROM `user` WHERE email=? LIMIT 1";

        $stmt = $db->prepare($login_query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = $user['verified'];
            $_SESSION['user_type'] = $user['user_type'];
            //if user is not verified then go to index
            if($_SESSION['verified'] == 0){
                header("Location: ../userRegister/index.php");
            }else{
                if($user['status'] == 5){
                    header('Location: ../user_blocked.php');
                    session_unset();
                }else{
                    if($user['user_type'] == 1){
                        header("Location: ../Admin/");
                    }else{
                        header("Location: ../CompaniesEvaluation/HomePage.php");
                    }
                }
            }
            

        }else{
            array_push($errors, "Email or password are incorrect");
        }

    }


}


// ---------------------------------------log out a user

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    session_unset();
    header("Location: ../userRegister/login.php");
}


// ---------------------------------------user verification by token

function verifyUser($token){

    global $db;
    $sql = "SELECT * FROM `user` WHERE token='$token' LIMIT 1";
    $result = mysqli_query($db, $sql);

    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);

        $update_query = "UPDATE user SET verified=1 WHERE token='$token'";

        if(mysqli_query($db, $update_query)){
            //log the user in
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = 1;
            $seccessMessage = "Your email is now verified ";
            $_SESSION['verifyMessage'] = $seccessMessage;
            header("Location: ../CompaniesEvaluation/HomePage.php");
        }
    }else{
        echo "user not found";
    }

}

// ---------------------------------------user information page

if(isset($_GET['profile'])){
    header("Location: ../userRegister/userProfile.php");
}











?>