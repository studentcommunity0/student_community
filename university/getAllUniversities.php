<?php  

$db=mysqli_connect("localhost","root","","student_community");
if(mysqli_connect_errno()){
    die("ERROR: could not connect" . mysqli_connect_error());
}

$sql = "SELECT * FROM university";


if($result=mysqli_query($db,$sql)){
    

    echo "<div id='location'> ";
        echo    "<h2>Riyadh Province</h2>";
    echo "</div>";

    echo"<div class='uni-container'>";
    echo"<div class='row info-panel-hover-look'>";
    echo"<div class='col-12 universities'>";
    while($row=mysqli_fetch_array($result)){
        if($row['location'] == 'Riyadh'){
            
            echo"<h3>" . $row['name'] . "</h3>";
            echo"<hr>";
            
        }
    }
    // to reset the result
    mysqli_data_seek($result, 0);

    echo"</div>";
    echo"</div>";
    echo"</div>";


    echo "<div id='location'>";
        echo    "<h2>Eastern Province</h2>";
    echo "</div>";

    echo"<div class='uni-container'>";
    echo"<div class='row info-panel-hover-look'>";
    echo"<div class='col-12 universities'>";
    while($row=mysqli_fetch_array($result)){
        if($row['location'] == 'Eastern Province'){
            
            echo"<h3>" . $row['name'] . "</h3>";
            echo"<hr>";
            
        }
    }
    // to reset the result
    mysqli_data_seek($result, 0);

    echo"</div>";
    echo"</div>";
    echo"</div>";

    echo "<div id='location'>";
        echo    "<h2>Makkah Province</h2>";
    echo "</div>";

    echo"<div class='uni-container'>";
    echo"<div class='row info-panel-hover-look'>";
    echo"<div class='col-12 universities'>";
    while($row=mysqli_fetch_array($result)){
        if($row['location'] == 'Makkah'){
            
            echo"<h3>" . $row['name'] . "</h3>";
            echo"<hr>";
            
        }
    }
    // to reset the result
    mysqli_data_seek($result, 0);

    echo"</div>";
    echo"</div>";
    echo"</div>";

    echo "<div id='location'>";
        echo    "<h2>Medina Province</h2>";
    echo "</div>";

    echo"<div class='uni-container'>";
    echo"<div class='row info-panel-hover-look'>";
    echo"<div class='col-12 universities'>";
    while($row=mysqli_fetch_array($result)){
        if($row['location'] == 'Medina'){
            
            echo"<h3>" . $row['name'] . "</h3>";
            echo"<hr>";
            
        }
    }
    // to reset the result
    mysqli_data_seek($result, 0);

    echo"</div>";
    echo"</div>";
    echo"</div>";

    echo "<div id='location'>";
        echo    "<h2>Al Qassim Province</h2>";
    echo "</div>";
    
    echo"<div class='uni-container'>";
    echo"<div class='row info-panel-hover-look'>";
    echo"<div class='col-12 universities'>";
    while($row=mysqli_fetch_array($result)){
        if($row['location'] == 'Al Qassim'){
            
            echo"<h3>" . $row['name'] . "</h3>";
            echo"<hr>";
            
        }
    }
    // to reset the result
    mysqli_data_seek($result, 0);

    echo"</div>";
    echo"</div>";
    echo"</div>";

    echo "<div id='location'>";
        echo    "<h2>Asir Province</h2>";
    echo "</div>";
    
    echo"<div class='uni-container'>";
    echo"<div class='row info-panel-hover-look'>";
    echo"<div class='col-12 universities'>";
    while($row=mysqli_fetch_array($result)){
        if($row['location'] == 'Asir'){
            
            echo"<h3>" . $row['name'] . "</h3>";
            echo"<hr>";
            
        }
    }
    // to reset the result
    mysqli_data_seek($result, 0);

    echo"</div>";
    echo"</div>";
    echo"</div>";

    echo "<div id='location'>";
        echo    "<h2>Other Places</h2>";
    echo "</div>";
    
    echo"<div class='uni-container'>";
    echo"<div class='row info-panel-hover-look'>";
    echo"<div class='col-12 universities'>";
    
    while($row=mysqli_fetch_array($result)){
        if(!in_array($row['location'], ['Riyadh', 'Eastern Province', 'Makkah', 'Medina', 'Al Qassim', 'Asir'], true)){
            
            echo"<h3>" . $row['name'] . "</h3>";
            echo"<hr>";
            
        }
    }
    // to reset the result
    mysqli_data_seek($result, 0);

    echo"</div>";
    echo"</div>";
    echo"</div>";


}






?>

