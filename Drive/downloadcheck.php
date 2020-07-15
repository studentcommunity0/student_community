<?php 
    require_once("../session.php");
    $data = json_encode($_SESSION);
    foreach($_SESSION as $key => $value){
        echo "   ";
     echo $key.": ".$value;
    }

    echo "   ";
    echo "   ";
    echo "   ";
    echo "   ";
    echo "   ";
?>