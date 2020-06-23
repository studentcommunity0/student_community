<?php 
    # ***DESCLAIMER***
    # THIS FILE IS NOT NEEDED SINCE, THIS CODE IS INSIDE COMPANY.PHP. IT IS HERE FOR SAFE KEEPING..
    
    require_once('session.php');
    include("database_connect.php");

    $query = "SELECT * FROM company where name = 'Air Products';";
    $result = mysqli_query($connection, $query);

    if($result && mysqli_num_rows($result) == 1){
        $company = mysqli_fetch_array($result);

        echo '<div class="col-12">'; 
        echo '<div class="row"> ';
        echo '  <div class="col-12 info-header" >';
        echo '    <h3 class="info-header-text mt-3 mb-2">Company Details</h3>';
        echo '  </div> ';
        echo '</div>';
        echo '<div class="row info-content"> ';
        echo '  <div class="col-12 mt-4"> ';
        echo '    <div class="row mb-3">';
        echo '      <div class="col-xs-12 col-sm-10">';
        echo '        <h3 id="company-name">'.$company["name"].'</h3>';
        echo '      </div>';
        echo '      <div class="col-xs-12 col-sm-2">';
        echo '        <button id="visit-website-btn"><a href='.$company["website"].'>View Website</button>';
        echo '      </div>';
        echo '    </div>';
        echo '    <div class="row">';
        echo '      <div class=" col-lg-9 col-sm-12 col-xs-12">';
        echo '        <p>'.$company["description"].'</p>';
        echo '      </div>';
        echo '      <div class="col-sm-3">';
        echo '        <button id="company-evaluation" onclick="on()">Evaluate company</button>';
        echo '      </div>';
        echo '    </div>';
        echo '  </div>';
        echo '</div>';
        echo '</div>';
    }

?>