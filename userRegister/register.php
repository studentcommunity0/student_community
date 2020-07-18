<?php
require_once('controller/authController.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../assets/css/maintheme.css">
    <link rel="stylesheet" href="../assets/css/sidenavbar.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <!--NAVBAR-->
    <?php require('../studentcommunitynavbar.php');?>
    
    <div class="myCard" style="margin-left: 30%; margin-right: 30%; margin-top: 5%;  border-radius: 25px; padding: 40px"> 
        <h3 style="font-weight: bold; text-align: center; padding-top: 1%;">REGISTER</h3>
        <hr>
        <form action="register.php" method="POST">
            
            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <?php foreach($errors as $error): ?>
                    <li><?php echo $error ?></li>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="">Email address</label>
                <input type="email" class="form-control" value="<?php echo $email; ?>" aria-describedby="emailHelp" name="userEmail">
            </div>

            <div class="form-group">
                <label for="">Username</label>
                <input type="username" class="form-control" value="<?php echo $username; ?>" name="userUsername">
            </div>

            <div class="form-group">
                <label for="">University</label>
                <select name="userUniversity" id="">
                    <option selected="true" disabled="disabled">select</option>
                    <?php
                        $sql = mysqli_query($db, "SELECT name From university");
                        $row = mysqli_num_rows($sql);
                        while ($row = mysqli_fetch_array($sql)){
                        echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
                        }
                    ?>
                </select>
                
            </div>

            <div class="form-group">
                <label for="">Major</label>
                <input type="" class="form-control" value="" name="userMajor">
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" id="" name="userPassword1">
            </div>

            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control" id="" name="userPassword2">
            </div>

            <button type="submit" class="btn submit" name="registerBtn">Submit</button><br>
            <br>

            <p>already a user? <a href="login.php" style="color: blue;">Log In</a></p>
        </form>

    </div>

        



    




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>