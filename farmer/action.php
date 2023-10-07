<?php
session_start();
if(!isset($_SESSION['firstName'])){
    echo "<script>alert('You must login to view this page');</script>";
    echo "<script>window.location.href='../login.php';</script>";
}
?>
<?php
if(isset($_POST['logout'])){
    session_destroy();
    unset($_SESSION['firstName']);
    header('location: ../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>My Crops</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="jquery-3.5.1.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

  <style>
    .container1 {
      display: flex;
      flex-direction: column;
      cursor: pointer;
      left: 0px;
    }
    
    .bar1, .bar2, .bar3 {
      width: 35px;
      height: 5px;
      background-color: #333;
      margin: 2px 0;
      transition: 0.4s;
    }
    
    .change .bar1 {
      -webkit-transform: rotate(-45deg) translate(-9px, 6px);
      transform: rotate(-45deg) translate(-9px, 6px);
    }
    
    .change .bar2 {opacity: 0;}
    
    .change .bar3 {
      -webkit-transform: rotate(45deg) translate(-8px, -8px);
      transform: rotate(45deg) translate(-8px, -8px);
    }
    </style>

</head>

<body>
<?php include '../header.php' ?>
<?php include '../connection.php' ?>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark text-white border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><?php echo $_SESSION['firstName']; echo " ".$_SESSION['lastName']; ?></div>
      <div class="list-group list-group-flush">
        <a href="farmer-homepage.php" class="list-group-item list-group-item-action bg-dark text-white">Home</a>
        <a href="sellCrop.php" class="list-group-item list-group-item-action bg-dark text-white">Sell Crop</a>
        <a href="myCrops.php" class="list-group-item list-group-item-action bg-dark text-white">My Crops</a>
        <a href="buyMachinary.php" class="list-group-item list-group-item-action bg-dark text-white">Buy Machinary</a>
        <a href="buyFertilizer.php" class="list-group-item list-group-item-action bg-dark text-white">Buy Fertilizer</a>
        <a href="recievedOrders.php" class="list-group-item list-group-item-action bg-dark text-white">Recieved Orders</a>
        <a href="myOrders.php" class="list-group-item list-group-item-action bg-dark text-white">My Orders</a>
        <form action="" method="POST">
        <a class="list-group-item list-group-item-action bg-dark  text-white"><button type="submit" name="logout" style="border:none; background: none;" class="text-white">Logout</button></a>
</form>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <!-- <button class="btn btn-primary" id="menu-toggle">Menu Bar</button> -->
        <div id="menu-toggle" class="container1">
      <div class="bar1"></div>
      <div class="bar2"></div>
      <div class="bar3"></div>
    </div>
      </nav>

      <div class="container-fluid">
       <?php
       include '../connection.php';
        $cropId= $_GET['cropId'];
        $action= $_GET['action'];
        switch($action){
            case 'addCrop':
                echo "<form action='' method='POST'><div class='form-group'><label for='quantity'>Quantity</label><input type='number' class='form-control' name='quantity' aria-describedby='quantityHelp'><small id='quantityHelp' class='form-text text-muted'>New Quantity You want to add only needed to be mentioned!</small></div><button type='submit' class='btn btn-primary' name='addQuantity'>Submit</button></form>";
                break;
            case 'deleteCrop':
                $deleteCropQuery= "DELETE FROM product WHERE productId='$cropId'";
                $deleteQueryResult= mysqli_query($conn,$deleteCropQuery);
                if($deleteQueryResult){
                  echo "<script>alert('Crop Deleted Successfully');</script>";
                  echo "<script>history.back</script>";
                }
                else{
                  echo "<script>alert('Something went wrong');</script>";
                }
                break;
            case 'updatePrice':
              echo "<form action='' method='POST'><div class='form-group'><label for='price'>New Price:</label><input type='number' class='form-control' name='price' aria-describedby='newPriceHelp'><small id='newPriceHelp' class='form-text text-muted'>New Quantity You want to add only needed to be mentioned!</small></div><button type='submit' class='btn btn-primary' name='updatePrice'>Submit</button></form>";
              break;
            default:
               echo "Enter a valid option";
               break;

        }

        if(isset($_POST['addQuantity'])){
          $cropId= $_GET['cropId'];
          $newQuantity= $_POST['quantity'];
          $updateCropQuery= "UPDATE product SET productQuantity=productQuantity+$newQuantity WHERE productId='$cropId'";
          $updateCropQueryResult= mysqli_query($conn,$updateCropQuery);
          if($updateCropQueryResult){
            echo "<script>alert('Crop Quantity updated successfully');</script>";
            echo "<script>window.location.href='myCrops.php';</script>";
          }
          else{
            echo "<script>alert('Something went wrong');</script>";
            echo "<script>window.location.href='myCrops.php';</script>";
          }
        }

        if(isset($_POST['updatePrice'])){
          $cropId= $_GET['cropId'];
          $newPrice= $_POST['price'];
          $updatePriceQuery= "UPDATE product SET productPrice='$newPrice' WHERE productId='$cropId'";
          $updatePriceQueryResult= mysqli_query($conn,$updatePriceQuery);
          if($updatePriceQueryResult){
            echo "<script>alert('Crop Price updated successfully');</script>";
            echo "<script>window.location.href='myCrops.php';</script>";

          }
          else{
            echo "<script>alert('Something went wrong');</script>";
            echo "<script>window.location.href='myCrops.php';</script>";
          }
        }

        ?>
        
      </div>
    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  

</body>

</html>