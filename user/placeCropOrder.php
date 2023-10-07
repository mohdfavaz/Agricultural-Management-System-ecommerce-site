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

  <title>Place Order</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

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
    .card-horizontal {
    display: flex;
    flex: 1 1 auto;
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
        <a href="user-homepage.php" class="list-group-item list-group-item-action bg-dark text-white">Home</a>
        <a href="buyMachinery.php" class="list-group-item list-group-item-action bg-dark text-white">Buy Machinery</a>
        <a href="buyFertilizer.php" class="list-group-item list-group-item-action bg-dark text-white">Buy Fertilizer</a>
        <a href="buyCrops.php" class="list-group-item list-group-item-action bg-dark text-white">Buy Crops</a>
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
        <div id="menu-toggle" class="container1">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div>
      </nav>
      <div class="container-fluid border m-2 p-2">

          <h3 class="text-primary">Billing Details</h3>
            <?php
              $id= $_GET['id'];
              $quantity= $_GET['quantity'];
              $query= "SELECT * FROM product WHERE productId='$id'";
              $result= mysqli_query($conn,$query);
              $data= mysqli_fetch_assoc($result);
              $totalPrice= $data['productPrice'] * $quantity;
            ?>
          <img src="<?php echo $data['productImage']; ?>" class="float-right mr-4 md-2" width="100px" height="100px"><br><br><br><br>
          <form class="mt-2" action="" method="POST"> 
            <div class="form-group">
              <label for="productId">Product Id:</label>
              <input type="text" class="form-control" name="productId" readonly value="<?php echo $id; ?>">
            </div>
            <div class="form-group">
              <label for="productname">Product Name:</label>
              <input type="text" class="form-control" name="productname" readonly value="<?php echo $data['productName']; ?>">
            </div>
            <div class="form-group">
              <label for="productquantity">Product Quantity:</label>
              <input type="text" class="form-control" name="productquantity" readonly value="<?php echo $quantity; ?>">
            </div>
            <div class="form-group">
              <label for="totalPrice">Total Price:</label>
              <input type="text" class="form-control" name="totalPrice" readonly value="<?php echo $totalPrice; ?>">
            </div>
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
              <label for="housename">House Name:</label>
              <input type="text" class="form-control" name="housename" required>
            </div>
            <div class="form-group">
              <label for="city">City:</label>
              <input type="text" class="form-control" name="city" required>
            </div>
            <div class="form-group">
              <label for="state">State:</label>
              <input type="text" class="form-control" name="state" required>
            </div>
            <div class="form-group">
              <label for="pincode">Pin:</label>
              <input type="number" class="form-control" name="pincode" required>
            </div>
            <div class="form-group">
              <label for="phoneNumber">Phone:</label>
              <input type="tel" class="form-control" pattern="{0-9}[10]" maxlength="10" minlength="10" title="A phone number should contain 10 digits" name="phoneNumber" required>
            </div>
            <button class="btn btn-primary" name="submit">Place Order</button>
          </form>
        </div>

    </div>

  <?php include('cropOrderServer.php') ?>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $(".buyNow").click(function(){
     var id= $(this).parent().parent().prev().find('.id').text();
     var quantity= document.getElementById("quantity").value;
     alert("id="+id+"quantity="+quantity);
     window.location.href="placeMachineryOrder.php?id="+id+"&quanitity="+quantity;
    });
  </script>

</body>

</html>