<?php 

require_once("ChangeUserInfo.php");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>

<!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Student Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="index.php?profile=1">Profile</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?logout=1">Logout</a>
                </li>
                
                
            </ul>
        </div>
    </nav>

<!-- user information -->

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="userInfoCon">
                    
                    <h2 id="userInfoHeader">User Information</h2> 
                    
                    <div class="userInfo">
                        <div class="row">
                            <div class="col-12">
                                <?php if(count($errors) > 0): ?>
                                    <div class="alert alert-danger">
                                    <?php foreach($errors as $error): ?>
                                    <li><?php echo $error ?></li>
                                    <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(count($success) > 0): ?>
                                    <div class="alert alert-success">
                                    <?php foreach($success as $s): ?>
                                    <li><?php echo $s ?></li>
                                    <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <h5>Username: </h5>
                            </div>
                            <div class="col-4 col-sm-4" id="secondCol">
                                <?php 
                                    echo $_SESSION['username'];
                                ?>
                            </div>
                            <div class="col-4 col-sm-2" >
                                
                                <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Change</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                <h5>Email: </h5>
                            </div>
                            <div class="col-6 col-sm-4" id="secondCol">
                            <?php 
                                echo $_SESSION['email'];
                            ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                <h5>Password: </h5>
                            </div>
                            <div class="col-6 col-sm-4" id="secondCol">
                            -----
                            </div>
                            <div class="col-4 col-sm-2" >
                                
                                <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Change</button>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            
        </div>
        
    </div>
    
    <!-- overlay card for changing username-->

    <div id="id01" class="modal">
        <form class="modal-content animate" method="post" id="myform">
            <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <!-- user info to be send to js -->
            <div class="container" style="margin-top: 50px">
                <label for="uname"><b>New Username</b></label>
                <input type="text" id="newusernameText" placeholder="Enter New Username" name="uname" required>
                <input type="submit" id="changeBtn" name="ChangeUsernameButton" value="Submit Change"/>             
            </div>

            
        </form>
    </div>

    <!-- overlay card for changing password-->

    <div id="id02" class="modal">
        <form class="modal-content animate" method="POST" id="myform">
            <div class="imgcontainer">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <!-- user info to be send to js -->
            <div class="containerPass" style="margin-top: 50px">
                
                <label for=""><b>current password:  </b></label>
                <input type="text" id="currentPassword" placeholder="Enter current password" name="cPass" required>
                <br>
                <label for=""><b>new password:  </b></label>
                <input type="text" id="newPassword1" placeholder="Enter new password" name="Pass1" required>
                <br>
                <label for=""><b>confirm new password:  </b></label>
                <input type="text" id="newPassword2" placeholder="confirm new password" name="Pass2" required>
                <br>
                <input type="submit" id="changePassBtn" name="ChangePasswordButton" value="Submit Change"/>             
            </div>
        </form>
    </div>
                    



    
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="app.js"></script>
</body>
</html>