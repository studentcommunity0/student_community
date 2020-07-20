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
        <?php require('../commonheadtagcontent.php'); ?>
    </head>
    <body>
        <!--NAVBAR--> 

        <?php include("../studentcommunitynavbar.php")?>
        
        <!-- /NAVBAR
        
        <section class="conatiner">
            <div class="row">
            <div class="col-12 ">
               
                      
                </div>
            <div clas="col-12">
                    <label for="">Title</label>
                    <input name="title" id="title" type="text">
                </div>
                <div clas="col-12">
                    <label for="">Description</label>
                    <input name="description" id="description" type="text">
                </div>
                <div class="col-12">
                    <select name="select_num_of_options" id="select_num_of_options" onchange="give_new_option_list()">
                        <option value="2">2 options</option>
                        <option value="3">3 options</option>
                        <option value="4">4 options</option>
                        <option value="5">5 options</option>
                    </select>
                </div>
                <div class="col-12" id="options">
                    
                </div>
                <div class="col-12"> 
                    <button id="create_new_poll_submit_button"> Create Poll</button>
                </div>
            </form>
        </section>--> 
        <div class="myCard info-panel-hover-look info-content" style="margin-left: 30%; margin-right: 30%; margin-top: 5%;  "> 
            <h5 style="font-weight: bold; text-align: center; padding-top: 7%;">CREATE A NEW POLL</h5><br>
            <strong><hr></strong>
            <div>
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
            <form action="" style="margin-left: 5%; margin-right: 5%;">
                <div class="form-group ">
                  <label for="" style="font-weight: bold;">Title:</label>
                  <input class="col-12 orange-text-black-bg" style="height:50px;" type="text" class="form-control" name="title" id="title">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1" style="font-weight: bold;">Description</label>
                  <textarea class="col-12 orange-text-black-bg form-control" name="description"  id="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="" style="font-weight: bold;">Industry:</label>
                    <select  class="col-12 orange-text-black-bg" style="height:50px;" name="select_num_of_options" id="select_num_of_options" onchange="give_new_option_list()" >
                        <option value="2">2 options</option>
                        <option value="3">3 options</option>
                        <option value="4">4 options</option>
                        <option value="5">5 options</option>
                    </select>
                </div>
                <div class="col-12 p-0" id="options">
                    
                </div>
                <div class="form-group">
                    <button class="orange-btn-black-text-main" id="create_new_poll_submit_button"  type="button" ><strong>Create Poll</strong></button>    
                </div>
                <a id="error-message" style="visibility: hidden; color: red; font-weight: bold;">Please fill the empty text inputs</a>
            </form>
            <br><br>
        </div>
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