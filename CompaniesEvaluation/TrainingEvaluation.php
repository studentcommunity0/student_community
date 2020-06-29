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

        <script src="Scripting.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="../assets/js/sidenavbar.js"></script>

    </head>
    <body onload="getCompanies()">
        <!--NAVBAR-->
        <?php include("../studentcommunitynavbar.php")?>

        <div>
            <img src="images/SHI.jpg" style="width: 100%;" alt="Image">
        </div>
        
        <div class="myCard" style="margin:2%;">
            <div class="row" style="padding-top: 1.5%; padding-left: 1%;">
                <div class="col-8">
                    <form class="form-inline md-form mr-auto mb-4">
                        <button class="btn search-btn" onclick="search()" type="button">
                            <i class="material-icons">search</i>
                        </button>
                        <input class="form-control mr-sm-2" id ="search-input" style="width: 80%; background-color: beige;" type="text" placeholder="Search" onchange="search()" aria-label="Search">
                    </form>
                </div>
                <div class="col-4">
                    <button class="btn search-btn" type="submit" value='adding' onclick="add(this.value)">
                        <i class="material-icons">add</i>
                    </button>
                    <label>
                        Add a new company
                    </label>
                </div>
            </div>
        </div>
        <div class="row" style="margin-left:2%; margin-right: 2%;">
            <div class="col-8 myCard" id="comapnies-column" style="margin-right: 1%; background-color: white; padding-bottom: 2%;">
                <div class="row" style="background-color: #24313e;">
                    <h4 style="color: white; padding-left: 5%;">Companies</h4>
                </div>
            </div>
            <div class="col myCard" id="random-comapnies-column" style="margin-left: 1%; background-color: white;">
                <div class="row" style="background-color: #24313e;">
                    <h4 style="color: white; margin-left: 5%;">Random Companies</h4>
                </div>
            </div>
        </div>
        <div style="background-color:rgb(58, 58, 58); margin-top: 10%;">
            <br><br><br>
            <br><br><br>
            <br><br><br>
            <br><br><br>
        </div>
    </body>
</html>