<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add new item</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="shopStyling.css">
        <link rel="stylesheet" href="../assets/css/maintheme.css">
        <link rel="stylesheet" href="../assets/css/sidenavbar.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="shopScripting.js"></script>
        <script src="../assets/js/sidenavbar.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <!--NAVBAR-->
        <?php require('../studentcommunitynavbar.php');?>
        
        <div class="data-card" style=""> 
            <h5 style="font-weight: bold; text-align: center; padding-top: 7%;">ADD A NEW ITEM FORM</h5><br>
            <hr>
            <form style="margin-left: 5%; margin-right: 5%;">
            <div class='item-alert'></div>
                <div class="form-group">
                  <label for="exampleFormControlInput1" style="font-weight: bold;">*Item:</label>
                  <input type="text" class="form-control" id="item-name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" style="font-weight: bold;">*Type</label>
                    <select class="form-control" id="exampleFormControlSelect1" onchange="setType(this.value)">
                        <option>book</option>
                        <option>laptop</option>
                        <option>Calculator</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1" style="font-weight: bold;">*Price:</label>
                  <input type="number" class="form-control" id="item-price">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1" style="font-weight: bold;">Item Description</label>
                  <textarea class="form-control" id="item-disc" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1" style="font-weight: bold;">*Contact Information:</label>
                  <textarea class="form-control" id="item-contact" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn orange-btn-black-text-main" type="button" onclick="addItem()">Add the Item</button>    
                </div>
                <a id="shop-error-message" style="visibility: hidden; color: red; font-weight: bold;">Please fill the empty text inputs</a>
            </form>
            <br><br>
        </div>
    </body>
</html>