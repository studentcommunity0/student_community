<?php 
  require_once('../CompaniesEvaluation/session.php');
  include("../CompaniesEvaluation/database_connect.php");
?>

<!Doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Intern-net</title>
    <link rel="stylesheet" href="assets/css/drive.css">
    <link rel="stylesheet" href="../assets/css/maintheme.css">
    <link rel="stylesheet" href="../assets/css/sidenavbar.css">
    <link rel="stylesheet" href="../assets/css/backtotopbtn.css">
    <?php require('../commonheadtagcontent.php'); ?>
</head>

<body id="body">


  <!--NAVBAR--> 

  <?php include("../studentcommunitynavbar.php")?>
  
  <!-- /NAVBAR--> 


  <!-- MAIN CONTAINER -->
  <section class="container-fluid">
    <section class="all-contents-holder mx-auto">
      <div class="row mx-auto">
        <div class="col-12">
          <!--All Content should be inside this fluid box-->

          <!-- DRIVE CONTROLLER & INFORMATION PANEL -->
          <section class="row mt-5 info-panel-hover-look info-content files-sharing-main">
            <div class="col-12">
              <div class="row ">
                <div class="col-12 mt-3">
                  <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                      <h1 class="align-items-center"><?php echo $_SESSION['community_name']; ?> Files</h1>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="row">
                    <div class="col-10 offset-1">
                      <div class="input-group search-bar mb-3">
                        <input id="search-drive-input" type="text" class="form-control orange-text-black-bg" placeholder="Search.." aria-label="Search Files" aria-describedby="button-addon2">
                        <div class="input-group-append">
                          <button id="search-drive-content" class="btn btn-outline-primary black-text-orange-bg" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3 mb-5">   
                <div class="col-9 d-flex justify-content-start">
                  <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" id="file-to-upload" name = "file">
                    <button class="orange-btn-black-text-main" id="upload-file" type="submit">Upload file</button>
                  </form>
                </div>
                <div class="col-3 d-flex justify-content-end">
                  <button class="orange-btn-black-text-main" type="button" id="download-all-community-shared-files">Download All Files</button>
                </div>
              </div>
              
            </div>
          </section>
          <section class="files-sharing-main row mt-4 info-content info-panel-hover-look">
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
                <div class=" col-12 m-2 mr-0 d-flex justify-content-end ">
                  <p class="align-self-center m-0 mr-3" style="font-weight:500">Sort By:</p>
                  <select class="mr-3" id="select_order_files" style="background-color:#3d3d3d; color:#ffa801; width:190px; height:40px;" onchange="retrieve_files()">
                    <option value="Recent">Recently Added</option>
                    <option value="Name_ASC">Name ASC</option>
                    <option value="Name_DESC">Name DESC</option>
                    <option value="Oldest_First">Oldest First</option>
                    <option value="file_type_ASC">File Type ASC</option>
                    <option value="file_type_DESC">File Type DESC</option>
                  </select>
                  <p class="align-self-center m-0 mr-3" style="font-weight:500">Up To:</p>
                  <select id="select_limit_files" style="background-color:#3d3d3d; color:#ffa801; width:190px; height:40px;" onchange="retrieve_files()">
                    <option value="10">10 files</option>
                    <option value="20">20 files</option>
                    <option value="30">30 files</option>
                    <option value="40">40 files</option>
                    <option value="50">50 files</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 mx-auto file-details-main" >
                  <div class="row pt-3 file-details-header info-header info-header-text">
                    <div class="col-4">
                      <p>File Name</p>
                    </div>    
                    <div class="col-2">
                      <p>Owner</p>
                    </div> 
                    <div class="col-2">
                      <p>File Size</p>
                    </div>
                    <div class="col-1">
                      <p>File type</p>
                    </div> 
                     
                  </div>
                  <div class="row file-details" id="file-details-id">
                    
                  </div>
              </div>
              <!-- Pagination -->
              <nav class=" col-12 d-flex justify-content-center " id="pagination-for-community-files">
                  
              </nav>
                  <!--Pagination end-->

          </section>
          <!-- /All Content should be inside this fluid box-->
        </div>
      </div>
    </section>
    
    <!-- shared files actions -->
    
    

  </section>
  <!-- /MAIN CONTAINER -->

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
  <script src="assets/js/drive.js"></script>
  <script src="../assets/js/sidenavbar.js"></script>
  <script src="../assets/js/backtotopbtn.js"></script>
<script>

 
</script>
</body>
</html>