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
          <a class="nav-link float-right" href="logout.php"><button class="btn btn-sm btn-outline-primary">Logout</button></a>
        </li>
      </ul>
    </nav>
        
   <div class="container" style="position: relative; margin-top: 130px; margin-left: 0px; width: 900px;">
   <form action="viewProfile.php" method="GET" class="container justify-content-center" style="width: 400px;">
    <div class="form-group justify-content-center text-center">
      <legend class="mb-5">View Profile</legend>
      <input class="form-control" type="text" placeholder="Email ID" value=<?php echo $_SESSION["userEmail"];?> name="email" readonly><br><br>
      <input class="form-control" type="password" placeholder="Password" name="pswd"><br><br>
      <input type="submit" value="View" class="btn btn-primary btn-block"><br><br>      
    </div>
  </form>
  </div>
  
</body>
</html>