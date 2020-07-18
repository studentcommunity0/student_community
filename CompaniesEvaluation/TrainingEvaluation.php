<!DOCTYPE html>
<html>
    <head>
        <title>Training Evaluation</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="../assets/css/maintheme.css">
        <link rel="stylesheet" href="../assets/css/sidenavbar.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="Styling.css">
        <link rel="stylesheet" href="assets/css/style.css">


        <?php require('../commonscripts.php'); ?>
        <script src="Scripting.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../assets/js/sidenavbar.js"></script>

    </head>
    <body onload="getCompanies()">
        <!--NAVBAR-->
        <?php include("../studentcommunitynavbar.php")?>
        
        <div class="info-panel-hover-look info-content" style="margin:2%;">
            <div class="row" style="padding-top: 1.5%; padding-left: 1%;">
                
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
                    
                <div class="col-8">
                    
                    <form class="form-inline md-form mr-auto mb-4">
                        <button class="orange-btn-black-text-small" style="height:40px; width:40px; border-radius:50%;" onclick="search()" type="button">
                            <i class="material-icons">search</i>
                        </button>
                        <input class="form-control mr-sm-2 orange-text-black-bg" id ="search-input" style="width: 70%; background-color: beige;" type="text" placeholder="Search" onchange="search()" aria-label="Search">
                        <LAbel class="ml-2" for="search_type"><strong>Search By:</strong></LAbel>
                        <select class="ml-1 orange-text-black-bg" style="width:120px; height:40px;" name="search_type" id="search_type">
                            <option value="company">Company</option>
                            <option value="industry">industry</option>
                        </select>
                    </form>
                </div>
                <div class="col-4">
                    <button  class="orange-btn-black-text-small" style="height:40px; width:40px; border-radius:50%;" type="submit" value='adding' onclick="add(this.value)">
                        <i class="material-icons d-flex align-items-center">add</i>
                    </button>
                    <label>
                        <strong> Add a new company </strong>
                    </label>
                </div>
            </div>
        </div>
        <div class="row" style="margin-left:2%; margin-right: 2%;">
            <div class="col-8  info-panel-hover-look info-content" id="comapnies-column" style="margin-right: 1%; padding-bottom: 2%;">
                <div class="row info-header " style="height:50px;">
                    <h4 class="info-header-text d-flex align-items-center" style="margin-left:7px;" >Companies</h4>
                </div>
            </div>
            <div class="col info-panel-hover-look info-content" id="random-comapnies-column" style="margin-left: 1%;">
                <div class="row info-header " style="height:50px;">
                    <h4 class="info-header-text d-flex align-items-center" style="margin-left:7px;">Random Companies</h4>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <footer class="page-footer font-small blue">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a  href="https://ckeditor.com/"> Intern-net.com</a>
            </div>
            <!-- Copyright -->

        </footer>
        <!-- /FOOTER -->
    </body>
</html>