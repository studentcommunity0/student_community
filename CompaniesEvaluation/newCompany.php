<!DOCTYPE html>
<html>
    <head>
        <title>Training Evaluation</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="Styling.css">
        <link rel="stylesheet" href="../assets/css/maintheme.css">
        <link rel="stylesheet" href="../assets/css/sidenavbar.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="Scripting.js"></script>
        <script src="../assets/js/sidenavbar.js"></script>

    </head>
    <body onload="get_industries()">
        <!--NAVBAR-->
        <?php include("../studentcommunitynavbar.php")?>
        
        <div class="myCard info-panel-hover-look info-content" style="margin-left: 30%; margin-right: 30%; margin-top: 5%;  "> 
            <h5 style="font-weight: bold; text-align: center; padding-top: 7%;">ADD A NEW COMPANY FORM</h5><br>
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
            <form action="addNewCompany.php" id="add-company-form" style="margin-left: 5%; margin-right: 5%;">
                <div class="form-group ">
                  <label for="" style="font-weight: bold;">Company Name:</label>
                  <input class="col-12 orange-text-black-bg" style="height:50px;" type="text" class="form-control" id="company-name">
                </div>
                <div class="form-group">
                    <label for="" style="font-weight: bold;">Company Website URL:</label>
                    <input class="col-12 orange-text-black-bg" style="height:50px;" type="text" class="form-control" id="company-url">
                  </div>
                <div class="form-group">
                    <label for="" style="font-weight: bold;">Contact Us URL:</label>
                    <input class="col-12 orange-text-black-bg" style="height:50px;" type="text" class="form-control" id="company-contact-us-url">
                  </div>
                <div class="form-group">
                    <label for="" style="font-weight: bold;">Industry:</label>
                    <select  class="col-12 orange-text-black-bg" style="height:50px;" name="company-industry" id="company-industry" >
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1" style="font-weight: bold;">Company Description</label>
                  <textarea class="col-12 orange-text-black-bg form-control"  id="company-disc" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <button class="orange-btn-black-text-main" id="add-company"  type="button" onclick="addCompany()"><strong>Add the company</strong></button>    
                </div>
                <a id="error-message" style="visibility: hidden; color: red; font-weight: bold;">Please fill the empty text inputs</a>
            </form>
            <br><br>
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