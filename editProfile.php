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
        .makec{
            text-align:center;
        }
        hr{
          background-color:black;
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
          <a class="nav-link float-right" href="logout.php"><button class="btn btn-sm btn-outline-primary">Logout</button></a>
        </li>
      </ul>
    </nav>
        
   <div class="container" style="position: relative; margin-top: 130px; margin-left: 0px; width: 900px;">
   <form action="" method="POST" class="container justify-content-center" style="width: 400px;">
    <div class="form-group justify-content-center text-center">
      <legend class="mb-5">Edit Profile</legend>
      <input class="form-control" type="text" placeholder="Email ID" value=<?php echo $_SESSION["userEmail"];?> name="email" readonly><br><br>
      <input class="form-control" type="text" placeholder="Change Phone Number" name="phno"><br><br>
      <input class="form-control" type="password" placeholder="Change Password" name="pswd"><br><br>
      <input type="submit" value="View" class="btn btn-primary btn-block"><br><br>      
    </div>
  </form>
 
   <div class="justify-content-center text-center">
  <?php

    require_once "dbConn.php";
  
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $e=$_POST["email"];
      $p=$_POST["pswd"];
      $m=$_POST["phno"];
      
      $sql = "UPDATE user SET MobNo='$m', Password='$p' WHERE Email='$e'";
    $res1 = mysqli_affected_rows($conn);
     echo $sql;
    //  echo $res1;
    if($res1==true)
        echo "fff";
      echo "<hr>";
      if (mysqli_query($conn, $sql))
        {
            echo '<div class="alert alert-success">
            <strong>Success</strong> Profile Updated !!
          </div>';
        }
      else {
          echo mysqli_error($conn);
          echo '<div class="alert alert-warning">
                <strong>Warning</strong> Couldnot update your profile !!
              </div>';
      }
    }
    mysqli_close($conn);
  ?>
    </div>

</body>
</html>