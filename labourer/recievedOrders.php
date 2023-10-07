
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
  <title>Labourer Homepage</title>

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
        <a href="labourer-homepage.php" class="list-group-item list-group-item-action bg-dark text-white">Home</a>
        <a href="myProfile.php" class="list-group-item list-group-item-action bg-dark text-white">My Profile</a>
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
    <?php
    $phoneNumber = $_SESSION['phoneNumber'];
    $query = "SELECT userdetails.firstName,userdetails.lastName,userdetails.phoneNumber,labour.place,labour.role FROM labour INNER JOIN userdetails ON userdetails.phoneNumber = labour.phoneNumber";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
    ?>
      <div class="container-fluid">
        <h3 class="text-center">Recieved Orders</h3>
        <table id="example" class="table table-hover table-dark table-bordered">
        <thead>
          <tr>
            <th>ORDER ID</th>
            <th>Name</th>
            <th>Address<br>Contact</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
             $phoneNumber= $_SESSION['phoneNumber'];
             $query= "SELECT * FROM labourorders WHERE employeePhoneNumber='$phoneNumber' ORDER BY orderid desc";
             $result=mysqli_query($conn,$query);
             foreach($result as $results) :
          ?>
          <tr>
          <td class="id"><?php echo $results['orderId']; ?></td>
          <td><?php echo $results['employerName']; ?></td>
          <td><?php echo $results['address']."<br>".$results['contact']; ?></td>
          <td><?php echo $results['date']; ?></td>
          <td><?php echo $results['status']; ?></td>
          <?php $status= $results['status'];
          if($status=='waiting for labour\'s response'){
          echo "<td><button class='btn btn-primary accept'>Accept</button><br><button class='btn btn-danger reject mt-1 pr-3 pl-3'>Reject</button></td>";
          }
          else{
            echo "<td></td>"; 
          }
          ?>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      </div>
    </div>
    <!-- /#page-content-wrapper -->
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

  <!-- Menu Toggle Script -->
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

    $(".accept").click(function(){
     var status= 'accept';
     var id = $(this).closest('tr').find('.id').text();
      window.location.href("updateStatus.php?status="+status+"&id="+id);
    });
    $(".reject").click(function(){
     var status= 'reject';
     var id = $(this).closest('tr').find('.id').text();
      window.location.href("updateStatus.php?status="+status+"&id="+id);
    });
  </script>

</body>

</html>