<?php 
  require_once('../session.php');
  include("../database_connect.php");
  
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Intern-net</title>
        <link rel="stylesheet" href="../assets/css/maintheme.css">
        <link rel="stylesheet" href="../assets/css/sidenavbar.css">
        <link rel="stylesheet" href="assets/polls.css">
        <?php require('../commonheadtagcontent.php'); ?>
    </head>
    <body>
        <!--NAVBAR--> 

        <?php include("../studentcommunitynavbar.php")?>
        
        <!-- /NAVBAR--> 

        <section class="container-fluid">
            <section class="all-contents-holder mx-auto">
                <div class="row mx-auto">
                    <div class="col-12">

                    <!-- INDIVIDUAL POLLING CONENT -->
                    <!-- POLLING NAVIGATION -->
                        <div class="row mt-5">
                            <div class="col-12 ">
                                <button class="orange-btn-black-text-main" id="create_new_poll">create new poll</button>
                            </div>
                        </div>

                        <section class="row mt-4 info-content info-panel-hover-look">
                            <div class="col-12 my-3">
                            <div class="row pt-3">
                                <div class="col-6 offset-3">
                                <?php 
                                    if(isset($_GET['status'])){ 
                                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
                                
                                        echo '<a id="status">';
                                    
                                        echo $_GET['status'];
                                        echo '</a>';
                                        echo '<button type="button" class="close" data-dismiss="alert" onclick="removeparameters()" aria-label="Close">';
                                        echo '<span aria-hidden="true">&times;</span>';
                                        echo '</button>';
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                                
                            </div>
                            </div>
                            <div class="col-12 polls-details-main" >
                                <div class="row pt-3 mx-auto polls-details-header info-header info-header-text">
                                    <div class="col-12">
                                    <h3>POLLS</h3>
                                    </div>                                        
                                </div>
                                <div class="row mx-auto mt-3 mb-2">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active orange-text-black-bg" id="nav-active-polls-tab" data-toggle="tab" href="#active-polls-id" role="tab" aria-controls="nav-active-polls-id" aria-selected="true">All Polls</a>
                                            <a class="nav-item nav-link orange-text-black-bg" id="nav-my-polls-tab" data-toggle="tab" href="#my-polls-id" role="tab" aria-controls="nav-my-polls-id" aria-selected="false">My Polls</a>
                                        </div>
                                    </nav>
                                    
                                </div>
                                <div class=" tab-content" id="nav-tabContent">
                                        <div class="row mx-auto active-polls tab-pane fade show active" id="active-polls-id" role="tabpanel" aria-labelledby="nav-active-polls-tab">
                                        </div>
                                        <div class="row mx-auto my-polls tab-pane fade" id="my-polls-id" role="tabpanel" aria-labelledby="nav-my-polls-tab">
                                        
                                        </div>
                                    </div>
                            </div>
                            <!-- Pagination -->
                            <nav class=" col-12 d-flex justify-content-center " id="pagination-for-community-files">
                                
                            </nav>
                                <!--Pagination end-->

                        </section>
                    </div>
                </div>
            </section>
        </section>

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
        <script src="../assets/js/sidenavbar.js"></script>
        <script src="../assets/js/backtotopbtn.js"></script>
        <script src="assets/polls.js"></script>

    </body>
</html>