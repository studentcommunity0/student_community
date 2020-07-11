<!--  ADMIN Manage events page  -->
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

        
        <!-- SEARCH event -->
        <section class="row mt-5 info-panel-hover-look info-content files-sharing-main">
            <div class="col-12">
              <div class="row ">
              <div class="col-12">
              <div class="row ">
                <div class="col-12 mt-3">
                  <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                      <h1 class="align-items-center">MANAGE EVENTS</h1>
                    </div>
                  </div>
                </div>
                <div class="col-12 mt-3 mb-5">
                  <div class="row">
                    <div class="col-10 offset-1">
                      <div class="input-group search-bar mb-3">
                        <input id="search-event-input" type="text" class="form-control orange-text-black-bg" placeholder="Search events.." aria-label="Search events" aria-describedby="button-addon2">
                        <div class="input-group-append">
                          <button id="search-event-content" class="btn btn-outline-primary black-text-orange-bg" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>              
            </div>
          </section>
            <!--  View all events table  -->
            <section class="events-information-panel row mt-4 mb-3 info-content info-panel-hover-look">
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
                  <select id="select_limit_events" style="background-color:#3d3d3d; color:#ffa801; width:190px; height:40px;" onchange="retrieve_events()">
                    <option value="10">10 events</option>
                    <option value="20">20 events</option>
                    <option value="30">30 events</option>
                    <option value="40">40 events</option>
                    <option value="50">50 events</option>
                  </select>
                </div>
                <div class="col-12 pr-3 pl-3">
                    <div class="row pt-3  event-details-header info-header info-header-text">
                    <div class="col-1">
                        <p>ID</p>
                        </div>
                        <div class="col-2">
                        <p>Name</p>
                        </div> 
                        <div class="col-3">
                        <p>Description</p>
                        </div>   
                        <div class="col-2">
                        <p>Community</p>
                        </div> 
                        <div class="col-2">
                        <p>Date of Event</p>
                        </div>
                        <div class="col-2">
                        <p>Operations</p>
                        </div>      
                    </div>    
                    <div class="row" >
                        <div class="col-12 event-details mt-3" id="event-details-id">
                            
                        </div>
                    </div>
                </div>
                <!-- Pagination -->
                <nav class=" col-12 d-flex justify-content-center " id="pagination-for-event-information-table">
                  
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
    <script src="../assets/js/manage_event.js"></script>
</body>