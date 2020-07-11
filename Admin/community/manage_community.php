<!--  ADMIN Manage communities page  -->
<?php
    require_once("../../session.php");
    include("../../database_connect.php");

?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
    <title>Intern-net</title>
    <link rel="stylesheet" href="../../assets/css/maintheme.css">
    <link rel="stylesheet" href="../assets/css/admin_sidenavbar.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <?php require('../../commonheadtagcontent.php'); ?>
</head>
<body>
    <!--NAVBAR--> 
    <?php require '../navbar.php';?>
    <!-- /NAVBAR--> 

    <!--MAIN CONTAINER--> 
    <section class="container-fluid">
    <div class="row mx-auto">
        <div class="col-12">

        
        <!-- SEARCH community -->
        <section class="row mt-5 info-panel-hover-look info-content files-sharing-main">
            <div class="col-12">
              <div class="row ">
              <div class="col-12">
              <div class="row ">
                <div class="col-12 mt-3">
                  <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                      <h1 class="align-items-center">MANAGE communities</h1>
                    </div>
                  </div>
                </div>
                <div class="col-12 mt-3 mb-5">
                  <div class="row">
                    <div class="col-10 offset-1">
                      <div class="input-group search-bar mb-3">
                        <input id="search-community-input" type="text" class="form-control orange-text-black-bg" placeholder="Search communities.." aria-label="Search communities" aria-describedby="button-addon2">
                        <div class="input-group-append">
                          <button id="search-community-content" class="btn btn-outline-primary black-text-orange-bg" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>              
            </div>
          </section>
            <!--  View all communities table  -->
            <section class="communities-information-panel row mt-4 mb-3 info-content info-panel-hover-look">
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
                  <p class="align-self-center m-0 mr-3" style="font-weight:500">Up To:</p>
                  <select id="select_limit_communities" style="background-color:#3d3d3d; color:#ffa801; width:190px; height:40px;" onchange="retrieve_communities()">
                    <option value="10">10 communities</option>
                    <option value="20">20 communities</option>
                    <option value="30">30 communities</option>
                    <option value="40">40 communities</option>
                    <option value="50">50 communities</option>
                  </select>
                </div>
                <div class="col-12 pr-3 pl-3">
                    <div class="row pt-3  community-details-header info-header info-header-text">
                        <div class="col-4">
                        <p>communityname</p>
                        </div>    
                        <div class="col-1">
                        <p>Availability</p>
                        </div> 
                        <div class="col-2">
                        <p>Category</p>
                        </div>
                        <div class="col-2">
                        <p>Owner id</p>
                        </div>
                        <div class="col-3">
                        <p>Operations</p>
                        </div>      
                    </div>    
                    <div class="row" >
                        <div class="col-12 community-details mt-3" id="community-details-id">
                            
                        </div>
                    </div>
                </div>
                <!-- Pagination -->
                <nav class=" col-12 d-flex justify-content-center " id="pagination-for-community-information-table">
                  
                  </nav>
                <!--Pagination end-->
            </section>
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
    <?php include('../../commonscripts.php'); ?>
    <script src="../assets/js/admin_sidenavbar.js"></script>
    <script src="../assets/js/manage_community.js"></script>
</body>