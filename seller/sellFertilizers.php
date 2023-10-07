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

  <title>Sell Fertilizer</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
        <a href="sellMachinery.php" class="list-group-item list-group-item-action bg-dark text-white">Sell Machinery</a>
        <a href="myMachineries.php" class="list-group-item list-group-item-action bg-dark text-white">My Machineries</a>
        <a href="sellFertilizers.php" class="list-group-item list-group-item-action bg-dark text-white">Sell Fertilizer</a>
        <a href="myFertilizers.php" class="list-group-item list-group-item-action bg-dark text-white">My Fertilizers</a>
        <a href="recievedOrders.php" class="list-group-item list-group-item-action bg-dark text-white">Recieved Orders</a>
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
        <h1 class="mt-4">Sell Fertilizer</h1>

        <form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="fertilizerName">Fertilizer Name</label>
            <input type="text" class="form-control" name="fertilizerName" required>
        </div>
        <div class="form-group">
        <label for="fertilizerDescription">Fertilizer Description</label>
        <textarea class="form-control" name="fertilizerDescription" required></textarea>
        </div>
        <div class="form-group">
            <label for="fertilizerQuantity">Fertilizer Quantity</label>
            <input type="number" class="form-control" name="fertilizerQuantity" aria-describedby="quantityHelp" required>
            <small id="quantityHelp" class="form-text text-muted">Quantity is amount in KG</small>
        </div>
        <div class="form-group">
            <label for="fertilizerPrice">Fertilizer Price</label>
            <input type="number" class="form-control" name="fertilizerPrice" aria-describedby="priceHelp" required>
            <small id="priceHelp" class="form-text text-muted">Price must be per KG</small>
        </div>
        <!-- <div class="form-group"> -->
            <label for="fertilizerImage">Fertilizer Image</label>
            <input type="file" class="form-control" name="uploadfile" id="uploadfile" value="" accept="image/jpg, image/jpeg" required>
        <!-- </div> -->
  <button type="submit" class="btn btn-primary mt-4" name="submit">Submit</button>
</form>
        
      </div>
    </div>
    <!-- /#page-content-wrapper -->
<?php include('sellFertilizerServer.php'); ?>
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