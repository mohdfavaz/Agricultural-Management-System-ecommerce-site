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
  <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">

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
        <a href="hireLabour.php" class="list-group-item list-group-item-action bg-dark text-white">Hire Labour</a>
        <a href="buyMachinery.php" class="list-group-item list-group-item-action bg-dark text-white">Buy Machinery</a>
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
        <h1 class="mt-4">My Crops</h1>
        <table class="table table-hover table-dark" id="example">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include '../connection.php'; 
      $phoneNumber= $_SESSION['phoneNumber'];
      $myCropQuery= "SELECT * FROM product WHERE phoneNumber='$phoneNumber' AND productType='crop'";
      $myCropQueryResult= mysqli_query($conn,$myCropQuery);
      if(mysqli_num_rows($myCropQueryResult)>0){
        while($data= mysqli_fetch_assoc($myCropQueryResult)){
          $url= $data['productImage'];
          echo "<tr><td class='cropId'>".$data['productId']."</td><td>".$data['productName']."</td><td><img src=$url width=100 height=100></td><td>".$data['productQuantity']." KG</td><td>".$data['productPrice']." RS/KG</td><td><button class='btn btn-info m-1 addQuantity'>ADD</button><button class='btn btn-danger m-1 deleteCrop'>Remove</button><button class='btn btn-success m-1 updatePrice'>Update</button></td></tr>";
        }
      }
    ?>
  </tbody>
</table>

        
      </div>
    </div>
    <!-- /#page-content-wrapper -->
<?php include('sellCropServer.php'); ?>
  </div>
  <!-- /#wrapper -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#example').DataTable();
  } );
  </script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

  <script>
  $(".addQuantity").click(function(){
   var cropId= $(this).closest('tr').find('.cropId').text();
   window.location.href="action.php?cropId="+cropId+"&action=addCrop";
  });

  $(".deleteCrop").click(function(){
    var cropId= $(this).closest('tr').find('.cropId').text();
    var confirmation= confirm('Are you sure you want to remove this crop?');
    if(confirmation==true){
    window.location.href="action.php?cropId="+cropId+"&action=deleteCrop";
    }
  });

  $(".updatePrice").click(function(){
    var cropId= $(this).closest('tr').find('.cropId').text();
    window.location.href="action.php?cropId="+cropId+"&action=updatePrice";
  });
  </script>
  

</body>

</html>