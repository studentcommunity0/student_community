<?php 
  require_once('session.php');
  $_SESSION['user_id'] = 1;
?>

<!Doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Intern-net</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>


  <!--NAVBAR--> 
  <nav class="navbar navbar-expand-md" style="background-color: #24313e;" >
            <a class="navbar-brand" href="#">
                <a style="font-weight: bolder; color: gainsboro; font-size: 2em;">Intern-net</a>
            </a>
            <button class="navbar-toggler"type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon" style="color: gainsboro;"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="navlinks nav-link" style="color: white;" href="#">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="navlinks nav-link" style="color: white;" href="#">CONTACT US</a>
                    </li>
                </ul>
            </div>
        </nav>
  <!-- /NAVBAR--> 
  <a id="message" class="bg-dark p-3 mb-2" style="display:none; color: whitesmoke; font-weight: bold;">
  <?php 
    if(isset($_GET['message'])){ 
      echo $_GET['message'];
    }
    ?></a>


  <!-- MAIN CONTAINER -->
  <section class="container mt-5">
    <!--COMPANY DETAILS-->
    <section class="row company-information">
    <?php 
      # PHP TO GET COMPANY INFORMATION - NAME, LINK, DESCRIPTION
      include("database_connect.php");

      $company_name = $_SESSION['company_name'];
      $query = "SELECT * FROM company where name = '$company_name';";
      $result = mysqli_query($connection, $query);

      if($result && mysqli_num_rows($result) == 1){
          $company = mysqli_fetch_array($result);
          $_SESSION['company_id'] = $company["id"];
      ?>
      <div class="col-12"> 
        <div class="row"> 
          <div class="col-12 info-header" >
            <h3 class="info-header-text mt-3 mb-2">Company Details</h3>
          </div> 
        </div>
        <div class="row info-content"> 
          <div class="col-12 mt-4"> 
            <div class="row mb-3">
              <div class="col-xs-12 col-sm-10">
              <a  style="color: black" href='<?php echo $company["website"];?>'><h2 id="company-name"><?php echo $company["name"];?></h2></a>
              </div>
              <div class="col-xs-12 col-sm-10" id="company_rating">
                
              </div>
<!--          <div class="col-xs-12 col-sm-2">
                <a  style="color: white" href='<?php echo $company["website"];?>'><button id="visit-website-btn">View Website</button></a>
              </div>
      -->
            </div>
            <div class="row pb-3">
              <div class=" col-lg-9 col-sm-12 col-xs-12">
              <?php echo $company["description"]; ?>
              </div>
              <div class="col-sm-3">
                <button id="company-evaluation" onclick="on()">Evaluate company</button>
              </div>
            </div>
          </div>
        </div>
      </div> 
      <?php } ?> 
    </section>
    <!--/COMPANY DETAILS-->


    <!--COMPANY REVIEWS-->
    <section class="row mt-5">
      <div class="col-12"> 
        <div class="row"> 
          <div class="col-12 info-header" >
            <h3 class="info-header-text mt-3 mb-2">Reviews</h3>
            <select id="select_order_reviews" onchange="retrieve_reviews()">
              <option value="Recent">Recent</option>
              <option value="Most_Rated_First">Most Rated First</option>
              <option value="Least_Rated_First">Least Rated First</option>
              <option value="Oldest_First">Oldest First</option>
            </select>
          </div> 
        </div>
        <div class="row info-content"> 
          <div class=" col-12 mt-4" id="user-reviews-section">
            
          </div>
        </div>
      </div>
    </section> 
    <!--COMPANY REVIEWS-->
    

    <!--MAIN EVALUATION SECTION--> 
    <section id="review-contents" >
      <div class="container" id="review-panel">
        <!--CLOSE BUTTON-->
        <div class="row">
          <div class="col-1 offset-11">
            <button onclick="off()" type="button" class="close mb-2 text-white" style="font-size:40px;" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
        <!--/CLOSE BUTTON-->

        <div class="overlay-card">
          <div class="p-3 mb-2 bg-dark text-white">
            <h3>Enter Review</h3>
          </div>

          <div class="row overlay-contents p-3 mt-0">
            <div class="col-12">
              <a id="info-message" class="bg-info p-3 mb-2" style="display:block; color: whitesmoke; font-weight: bold;">If you have already written a review in the past it will be updated</a>
              <a id="error-message" class="bg-danger p-3 mb-2" style="display:none; color: whitesmoke; font-weight: bold;">Please fill the empty fields</a>
              <div class="row">
                <div class="col-12">
                  <label class="review-panel-labels" for="">Employment Period:  </label>
                </div>
              </div>  
              <div class="row mb-2">  
                <div class="col-sm-6 col-xs-12 ml-2">
                  <div class="row"> 
                    <div class="col-12">
                      <label class="review-panel-labels" for="duration-from">From </label>
                    </div>
                  </div>
                  <div class="row"> 
                    <div class="col-12">
                      <input type="date" name="duration-from" class="evaluation-from-input" id="duration-from">
                    </div>
                  </div>                  
                </div>
                <div class="col-sm-6 col-xs-12 ml-2">
                  <div class="row"> 
                    <div class="col-12">
                      <label class="review-panel-labels" for="duration-to">To</label>
                    </div>
                  </div>
                  <div class="row"> 
                    <div class="col-12">
                      <input type="date" name="duration-to" class="evaluation-from-input" id="duration-to">
                    </div>
                  </div>
                </div>
              </div>
                
              <div class="row mb-2">
                <div class="col-12">
                  <div class="row"> 
                    <div class="col-2">
                      <label class="review-panel-labels" for="rating">Rating:</label>
                    </div>
                    <div class="col-10 stars company-evaluation-add-star-rating" data-rating="3">
                      <span class="star company-evaluation-add-star-rating"></span>
                      <span class="star company-evaluation-add-star-rating"></span>
                      <span class="star company-evaluation-add-star-rating"></span>
                      <span class="star company-evaluation-add-star-rating"></span>
                      <span class="star company-evaluation-add-star-rating"></span>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="row"> 
                    <div class="col-12">
                      <label class="review-panel-labels" for="title">Title:</label>
                    </div>
                  </div>
                  <div class="row"> 
                    <div class="col-12">
                      <input type="text" name="title" class="evaluation-from-input ml-2" id="title">
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="row"> 
                    <div class="col-12">
                      <label class="review-panel-labels" for="review">Review:</label>
                    </div>
                  </div>
                  <div class="row"> 
                    <div class="col-12">
                      <textarea name="review" id="review" cols="30" rows="10" id="review"></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-3 offset-9 offset-xs-5">
                  <button name="submit-button" id="submit-button"> Submit Review </button>
                </div>
              </div>
            </div>
          </div><!--Overlay contents end-->
        </div><!--Overlaycard end-->
      </div>  
    </section>
    <!--/MAIN EVALUATION SECTION--> 
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
    <script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
    <script src="assets/js/companyreview.js"></script>
</body>
</html>