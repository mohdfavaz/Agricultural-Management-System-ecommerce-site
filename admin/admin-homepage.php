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

  <title>Admin Homepage</title>

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
    <div class="bg-dark border-right text-white" id="sidebar-wrapper">
      <div class="sidebar-heading"><?php echo $_SESSION['firstName']; echo " ".$_SESSION['lastName']; ?></div>
      <div class="list-group list-group-flush">
        <a href="admin-homepage.php" class="list-group-item list-group-item-action bg-dark text-white">Home</a>
        <a href="approveUsers.php" class="list-group-item list-group-item-action bg-dark text-white">Users</a>
        <a href="approveFarmers.php" class="list-group-item list-group-item-action bg-dark text-white">Farmers</a>
        <a href="approveSellers.php" class="list-group-item list-group-item-action bg-dark text-white">Sellers</a>
        <a href="approveLabours.php" class="list-group-item list-group-item-action bg-dark text-white">Labours</a>
        <form action="" method="POST">
        <a class="list-group-item list-group-item-action bg-dark"><button type="submit" class="text-white bg-dark" name="logout" style="border:none; background: none;">Logout</button></a>
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
     <div class="container-fluid">
        <h3 class="text-center">UPDATE PROFILE</h3>
        <div class="container border p-4">
          <h6>UPDATE PASSWORD</h6>
          <form action="" method="POST">
             <div class="form-group">
               <label for="currentPassword">Current Password:</label>
               <input type="password" class="form-control" name="currentPassword" required>
             </div>
             <div class="form-group">
               <label for="newPassword">New Password:</label>
               <input type="password" class="form-control" name="newPassword" required>
             </div>
             <div class="form-group">
               <label for="confirmNewPassword">Re-enter Password:</label>
               <input type="password" class="form-control" name="confirmNewPassword" required>
             </div>
             <button type="submit" class="btn btn-primary" name="updatePassword">Submit</button>
          </form>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
   <?php include('updatePasswordServer.php') ?>
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
