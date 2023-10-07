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
    <div class="bg-dark text-white border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><?php echo $_SESSION['firstName']; echo " ".$_SESSION['lastName']; ?></div>
      <div class="list-group list-group-flush">
        <a href="admin-homepage.php" class="list-group-item list-group-item-action bg-dark text-white">Home</a>
        <a href="approveUsers.php" class="list-group-item list-group-item-action bg-dark text-white">Users</a>
        <a href="approveFarmers.php" class="list-group-item list-group-item-action bg-dark text-white">Farmers</a>
        <a href="approveSellers.php" class="list-group-item list-group-item-action bg-dark text-white">Sellers</a>
        <a href="approveLabours.php" class="list-group-item list-group-item-action bg-dark text-white">Labours</a>
        <form action="" method="POST">
        <a class="list-group-item list-group-item-action bg-dark"><button type="submit" name="logout" class="text-white" style="border:none; background: none;">Logout</button></a>
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

        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->

        <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div> -->
      </nav>

      <div class="container-fluid">
        <h1 class="mt-4">Approve Users</h1>
        <table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Email Id</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  
        <?php
          $query= "SELECT * FROM userdetails WHERE userType='user' AND acStatus='pending'";
          $result= mysqli_query($conn,$query);
          if(mysqli_num_rows($result)>0){
            while($data= mysqli_fetch_assoc($result)){
              echo "<tr><td>".$data['firstName']."</td><td>".$data['lastName']."</td><td class='phoneNumber'>".$data['phoneNumber']."</td><td>".$data['emailId']."</td><td><button class='btn btn-secondary approve'>Approve</button><button class='btn btn-danger disapprove ml-2'>Disapprove</button></td></tr>";
            }
          }
        ?>
        </tbody>
</table>
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
    $(".approve").click(function(){
      var phoneNumber= $(this).closest('tr').find('.phoneNumber').text();
      var confirmation= confirm("Are you sure you want to approve this user?");
      if(confirmation==true){
        window.location.href="approve.php?phoneNumber="+phoneNumber;
      }
    });
    $(".disapprove").click(function(){
      var phoneNumber= $(this).closest('tr').find('.phoneNumber').text();
      var confirmation= confirm("Are you sure you want to disapprove this user?");
      if(confirmation==true){
        window.location.href="disapprove.php?phoneNumber="+phoneNumber;
      }
    });
  </script>

</body>

</html>
