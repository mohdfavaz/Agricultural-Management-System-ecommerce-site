
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

  <title>Recieved Orders</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

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

<body?>
<?php include '../header.php' ?>
<?php include '../connection.php' ?>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark text-white border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><?php echo $_SESSION['firstName']; echo " ".$_SESSION['lastName']; ?></div>
      <div class="list-group list-group-flush">
        <a href="seller-homepage.php" class="list-group-item list-group-item-action bg-dark text-white">Home</a>
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
        <div id="menu-toggle" class="container1">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div>
      </nav>
    <div class="container">
      <h3 class="text-center">Received Orders</h3>
      <table id="example" class="table table-hover table-dark table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name & Address</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
             $phoneNumber= $_SESSION['phoneNumber'];
             $query= "SELECT * FROM orders WHERE sellerPhoneNumber='$phoneNumber'";
             $result=mysqli_query($conn,$query);
             foreach($result as $results) :
          ?>
          <tr>
          <td class='id'><?php echo $results['orderId']; ?></td>
          <td><?php echo $results['name']."<br>".$results['houseName']; ?></td>
          <?php
              $id= $results['productId'];
              $query1="SELECT * FROM product WHERE productId='$id'";
              $result1= mysqli_query($conn,$query1);
              $data1= mysqli_fetch_assoc($result1);
          ?>
          <td><?php echo $data1['productName']; ?></td>
          <td><?php echo $results['orderQuantity']; ?></td>
          <td><?php echo $results['orderStatus']; ?><br><button class="btn btn-primary update">Update</button></td>
          <td><button class="btn btn-primary viewInvoice">Invoice</button></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    </div>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
    $('#example').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [
        [10,25,50,-1],
        [10,25,50,"All"]
      ],
      responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search",
      }
    });
    });
  </script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  <script>
    $(".update").click(function(){
      var id= $(this).closest('tr').find('.id').text();
      window.location.href="updateStatus.php?id="+id;
    });
    $(".viewInvoice").click(function(){
      var id= $(this).closest('tr').find('.id').text();
      window.open("viewInvoice.php?id="+id,"_blank");
    });
  </script>

</body>
</html>  