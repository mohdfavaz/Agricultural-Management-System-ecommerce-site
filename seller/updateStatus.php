
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

  <title>Seller Homepage</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">

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

<body?>
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
        <div id="menu-toggle" class="container1">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div>
      </nav>
    <div class="container p-4">
    <h3>Update Order Status</h3>
    <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Parameter</th>
        <th scope="col">Value</th>
      </tr>
    </thead>
    <?php
      $id= $_GET['id'];
      $query= "SELECT * FROM orders WHERE orderId='$id'";
      $result= mysqli_query($conn,$query);
      $results= mysqli_fetch_assoc($result);
    ?>
    <tr>
      <th>Order Id</th>
      <td><?php echo $results['orderId']; ?></td>
    </tr>
    <tr>
      <th>Name</th>
      <td><?php echo $results['name']; ?></td>
    </tr>
    <tr>
      <th>Address</th>
      <td><?php echo $results['houseName']."<br>".$results['city']."<br>".$results['state']."<br>Pin:".$results['pinCode']."<br>Phone:".$results['phoneNumber']; ?></td>
    </tr>
    <tr>
      <th>Product ID</th>
      <td><?php echo $results['productId']; ?></td>
    </tr>
    <tr>
      <th>Product Name</th>
      <?php $query1="SELECT * FROM product WHERE productId='$id'";
      $result1= mysqli_query($conn,$query1);
      $data= mysqli_fetch_assoc($result1);
      ?>
      <td><?php echo $data['productName']; ?></td>
    </tr>
    <tr>
      <th>Product Image</th>
      <td><img src="<?php echo $data['productImage']; ?>" width="100px" height="100px"></td>
    </tr>
    <th>Product Quantity</th>
      <td><?php echo $results['orderQuantity']; ?></td>
    </tr>
    <th>Product Price</th>
      <td><?php echo $results['orderPrice']; ?></td>
    </tr>
    <th>Current Status</th>
      <td><?php echo $results['orderStatus']; ?></td>
    </tr>
    <tr>
    <th>Update Status</th>
    <td>
    <form action="" method="POST">
      <select name="updateStatus" class="form-control">
        <option>Order Recieved</option>
        <option>Order Shipped</option>
        <option>Order Arriving Today</option>
        <option>Order Delivered</option>
      </select><br>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    </td>
    </tr>
    </table>
    </div>
    <?php
       if(isset($_POST['submit'])){
           $id=$_GET['id'];
           $newStatus= $_POST['updateStatus'];
           $updateStatusQuery= "UPDATE orders SET orderStatus='$newStatus' WHERE orderId='$id'";
           $updateStatusQueryResult= mysqli_query($conn,$updateStatusQuery);
           if($updateStatusQueryResult){
               echo "<script>alert('Status update successfull');</script>";
               echo "<script>window.location.href='recievedOrders.php';</script>";
           }
           else{
            echo "<script>alert('Some error occured');</script>";
            echo "<script>window.location.href='recievedOrders.php';</script>";
           }
       }
    ?>

    </div>

</div>

<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
</script>

</body>
</html>