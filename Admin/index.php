<!--  ADMIN MAIN DASHBOARD  -->
<?php
    require_once("../session.php");
    include("../database_connect.php");

?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
    <title>Intern-net</title>
    <link rel="stylesheet" href="assets/css/drive.css">
    <link rel="stylesheet" href="../assets/css/maintheme.css">
    <link rel="stylesheet" href="assets/css/admin_sidenavbar.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <?php require('../commonheadtagcontent.php'); ?>
</head>
<body>
    <!--NAVBAR--> 
    <nav class="navbar navbar-expand-xl justify-content-between">
      <a class="navbar-brand" href="#">
        <a style="font-weight: bolder; color: #ffa801; font-size: 2em;">Intern-net</a>
      </a>
      <span class="student-community-side-nav-toggler" id="student-community-side-nav-toggler-id" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>            
      <div id="student-community-side-nav-id" class="student-community-side-nav">
        <a href="javascript:void(0)" class="sidenavbarclosebtn" onclick="closeNav()">&times;</a>
        <div class="sidenavbaritems">
            <a href="../Admin/"><i class="fa fa-th-large "></i> Dashboard</a>
        </div>
        <div class="sidenavbaritems">
            <a href="../Admin/community/manage_community.php"><i class="fa fa-users"></i> Community</a>
        </div>
        <div class="sidenavbaritems">
            <a href="../Admin/events/manage_events.php"><i class="fa fa-calendar"></i> Events</a>
        </div>
        <div class="sidenavbaritems">
            <a href="../Admin/users/manage_users.php"><i class="fa fa-user-plus"></i> Users</a>
        </div>
        <div class="sidenavbaritems">
            <a href="../userRegister/userProfile.php"><i class="fa fa-user-circle"></i> Profile</a>
        </div>
        <div class="sidenavbaritems">
            <a href="../userRegister/login.php?logout=1"><i class="fa fa-sign-out "></i> logout</a>
        </div>
      </div>
    </nav>

    <!-- /NAVBAR--> 

    <!--MAIN CONTAINER--> 
    <section class="container-fluid">
    <div class="row mx-auto">
        <div class="col-12">
            
            <!--Welcome message-->
            <div class="row d-flex justify-content-center mt-4 mb-3 info-content info-panel-hover-look">
                <div id="welcome-admin" >
                    <h1 class="d-flex justify-content-center">ADMIN</h1>
                    <h2>Welcome Back, <?php echo $_SESSION['username']; ?>!</h2>
                </div>
            </div>

            <!--  Statistic 1  -->
            <div class="row ">
                <div class="col-3 offset-1 info-content info-panel-hover-look p-3 mr-2"> 
                    <?php 
                        #total number of users
                        $num_users = "SELECT count(*) as count from user where user_type='2'";
                        $result = mysqli_query($connection, $num_users);
                        $result = mysqli_fetch_array($result);
                        $num_users = $result['count'];
                    ?>
                    <p class="d-flex justify-content-center" style="font-size:30px; font-weight:700;"> <?php echo $num_users?>  USERS</p>
                </div>
                <div class="col-3 info-content info-panel-hover-look p-3 mr-2"> 
                    <?php 
                        #total number of users
                        $num_communities = "SELECT count(*) as count from community";
                        $result = mysqli_query($connection, $num_communities);
                        $result = mysqli_fetch_array($result);
                        $num_communities = $result['count'];
                    ?>
                    <p class="d-flex justify-content-center" style="font-size:30px; font-weight:700;"> <?php echo $num_communities?> COMMUNITIES</p>
                 
                </div>
                <div class="col-3 info-content info-panel-hover-look p-3 mr-2"> 
                    <?php 
                        #total number of users
                        $num_events = "SELECT count(*) as count from events";
                        $result = mysqli_query($connection, $num_events);
                        $result = mysqli_fetch_array($result);
                        $num_events = $result['count'];
                    ?>
                    <p class="d-flex justify-content-center" style="font-size:30px; font-weight:700;"> <?php echo $num_events?> EVENTS</p>
                 
                </div>
            </div>
        </div>
     </div>
        
    </section>
    <!--/MAIN CONTAINER-->

    <!-- FOOTER -->
    <footer class="page-footer font-small blue">
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://ckeditor.com/"> Intern-net.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- /FOOTER -->
    <?php include('../commonscripts.php'); ?>
    <script src="assets/js/admin_sidenavbar.js"></script>
</body>