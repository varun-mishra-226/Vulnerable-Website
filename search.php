<?php
session_start();
?> 

<!DOCTYPE html>  
 <html>  
   <head>
     <style>
        li{
          list-style-type: none;
        }
     </style>
     <title>Auctions-home</title>  
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
   </head>  
   
<body>
    <nav class="navbar fixed-top navbar-expand-sm bg-light justify-content-center"
      <!-- Links -->
      <ul class="navbar-nav mr-5">
        <li class="nav-item mr-5">
          <a class="nav-link" href="afterSignIn.php"><span class="h2">E - Commerce Demo</span></a>
        </li>
        <li class="nav-item">
          <span class="navbar-text mx-5 mt-3"><?php echo $_SESSION["userEmail"];?></span>
        </li>
        <li class="nav-item">
          <a class="nav-link mr-5" href="#"><i class="material-icons" style="font-size: 50px;">shopping_cart</i><span id="numOfItems" style="position: absolute; color: white; left: 937px; top: 21px;"></span></a>
        </li>
        <li class="nav-item mt-3">
          <a class="nav-link float-right" href="profile.php"><button class="btn btn-sm btn-outline-primary">View Profile</button></a>
        </li>
        <li class="nav-item mt-3">
          <a class="nav-link float-right" href="logout.php"><button class="btn btn-sm btn-outline-primary">Logout</button></a>
        </li>
      </ul>
    </nav>
        
   <div class="container" style="position: relative; margin-top: 130px; margin-left: 0px; width: 900px;">
      <form action="search.php" method="POST">
        <input type="search" name="cat" id="cat" placeholder="Search Items">
        <input type="submit" value="Search" class="btn btn-primary"><br><br>     
      </form>
      
      <table class="table table-bordered">  
        <tr>  
          <th class="text-center h5" colspan="2">Items</th>  
        </tr>  
        <?php  
          include "dbConn.php";
          if($_SERVER["REQUEST_METHOD"]=="POST"){
            $cat=$_POST["cat"];
            
            $sql = "SELECT * FROM items WHERE Category='$cat'";
            $res1 = mysqli_query($conn, $sql);
            $res2 = mysqli_affected_rows($conn);
            
            if ($res2>0) {
                while($row = mysqli_fetch_assoc($res1))
                {
                    $in=$row['Item_Name'];
                    echo '  
                        <tr class="bg-light">  
                          <td style="width: 150px;">  
                            <img src="./desk.png" height="150" width="150" class="img-thumnail" />
                          </td>
                          <td>
                          <ul>
                            <li class="d-inline" style="font-size: 30px;">'.$row['Item_Name'].'</li>
                            <li class="float-right d-inline display-4 px-3"> $'.$row['Cost'].'</li>
                            <li class="my-3"><strong>Owner : </strong>'.$row['Owner_Name'].'</li>
                            <li class="float-right">
                              <div class="input-group">
                                <span class="input-group-btn mr-3">
                                  <button class="btn-sm btn-primary px-3" onclick="jsfunction(this,\''.$row['Item_Name'].'\')" type="submit" value="'.$row['Cost'].'">Add Item</button>
                                </span>
                              </div>
                            </li>
                          </ul>
                          </td>
                        </tr>
                    ';  
                  }
                }
            } else {
                echo '<div class="alert alert-warning">
                      <strong>Warning</strong> No Products Found!
                    </div>';
            }     
        ?>  
        </table>
  </div>
     <div class="col-3 ml-5 p-3" style="position: absolute; left: 900px; top: 130px; border: 1px solid black;">
        <div class="py-4 h4 text-center">Your Order</div>
        <form action="payment.php" method="post">
          Item Name : <input id="itmName" type="text" name="itemName" class="float-right px-2"><br><br>
          Amount : <input id="itmCost" type="text" name="cost" class="float-right px-2"><br><br><br>
<!--          <input id="hash" type="text" name="hash" style="display: none;">-->
          <input name="checkout" type="submit" value="Checkout" class="float-right btn btn-primary">
        </form>
       <div class=""></div>
     </div>
     
  <!-- <script src='forge-sha256.min.js'></script>   -->


  
  <script>
      
    function jsfunction(obj, s){
      document.getElementById("numOfItems").innerHTML = 1;
      document.getElementById("itmName").setAttribute("value", s);
      
      // var encrypted = CryptoJS.AES.encrypt(obj.value, "1234");
      
      // var decrypted = CryptoJS.AES.decrypt(encrypted, "1234");
      
      // console.log("Decrypted value:");
      // console.log(decrypted.toString(CryptoJS.enc.Utf8));
      document.getElementById("itmCost").setAttribute("value", obj.value);
//      document.getElementById("hash").setAttribute("value", forge_sha256(obj.value));
      
      // console.log("Hashed value:");
      // console.log(forge_sha256(obj.value));
      
    }
  </script>
 
</body>
</html>