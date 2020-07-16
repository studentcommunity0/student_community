<?php
    session_start();
    $userID = $_SESSION["id"];

    $connection=mysqli_connect("localhost","root","","student_community");
    if(mysqli_connect_errno()){
        die("ERROR: could not connect" . mysqli_connect_error());
    }

    $sql = "SELECT * FROM item WHERE userid='$userID'";
    echo "  <div class='row' style='margin-bottom:1%'>";
    echo "      <div class='col-4'></div>";
    echo "          <div class='col-8' style='padding-left:6%'>";
    echo "              <div class='input-group-append'>";
    echo "                  <button class='btn black-text-orange-bg' style='border-radius: 5%;font-weight:bold;margin-right:2%' type='button' onclick='getTheItems()'>";
    echo "                      All items";
    echo "                  </button>";
    echo "                  <button class='btn black-text-orange-bg' style='border-radius: 5%;font-weight:bold;margin-right:2%' type='button' onclick='myItems()'>";
    echo "                      My items";
    echo "                  </button>";
    echo "                <button class='btn black-text-orange-bg' style='border-radius: 5%; font-weight:bold' type='button' onclick='addItemForm()'>";
    echo "                      + add new item";
    echo "                </button>";
    echo "            </div>";
    echo "        </div>";
    echo "    </div>";
    if($result=mysqli_query($connection,$sql)){
        if(mysqli_num_rows($result)>0){
            echo "<div class='row' style='background-color:#3d3d3d; color:orange; font-weight:bold;height:15%'>";
            echo "  <div class='col'>Item Name</div>";
            echo "  <div class='col'>Description</div>";
            echo "  <div class='col'>Price</div>";
            echo "  <div class='col'>Contact Information</div>";
            echo "  <div class='col'>Seller university</div>";
            echo "  <div class='col'></div>";
            echo "</div>";
            while($row=mysqli_fetch_array($result)){
                echo "<div class='row' class='items' style='background-color:#dddada; margin-bottom:1%;box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2); height:20%;padding:1%'>";
                echo "  <div class='col'>";
                echo "      <a class='item-name'>" . $row['item'] . "</a>";
                echo "  </div>";
                echo "  <div class='col'>";
                echo "      <a>" . $row['description'] . "</a>";
                echo "  </div>";
                echo "  <div class='col item-name'>";
                echo "      <a>" . $row['price'] . "SR</a>";
                echo "  </div>";
                if($row['status']=='sold'){
                    echo "  <div class='col'>";
                    echo "      <a class='sold' style='color: rgb(199, 30, 30)'>" . $row['status'] . "</a>";
                    echo "  </div>";
                }
                else{
                    echo "  <div class='col contact-info'>";
                    echo "      <a>" . $row['contact'] . "</a>";
                    echo "  </div>";
                }
                 //get the unversity ID of the creator
                 $universityID = "";
                 $user = $row["userid"];
                 $query = "SELECT university FROM user WHERE id = '$user'";
                 if($idResult=mysqli_query($connection,$query)){
                     $idRow = mysqli_fetch_array($idResult);
                     $universityID = $idRow['university']; 
                 }
                 //get the university name
                 $query2 = "SELECT name FROM university WHERE id = '$universityID'";
                 if($nameResult=mysqli_query($connection,$query2)){
                     $nameRow = mysqli_fetch_array($nameResult);
                     $university = $nameRow['name']; 
                 }
                 echo "<div class='col'>";
                 echo "<a>" . $university . "</a>";
                 echo "</div>";
                echo "<div class='col'>";
                if($userID == $row['userid']){
                    echo "  <select class='form-control' style='background-color: #3d3d3d; color:orange; font-weight:bold' onchange='changeStatus(this.value," . $row['id'] . ")'>";
                    if($row['status']=='not sold'){
                        echo "      <option>not sold</option>";
                        echo "      <option>sold</option>";
                    }
                    else{
                        echo "      <option>sold</option>";
                        echo "      <option>not sold</option>";
                    }
                    echo "  </select>";
                }
                echo "</div>";
                echo "</div>";
            }
        }
    }
    else{
        echo "Failed to insert the item";
    }
?>