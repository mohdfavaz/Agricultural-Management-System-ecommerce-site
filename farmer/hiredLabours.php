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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

  <title>Hire Labour</title>

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
        <div id="menu-toggle" class="container1">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div>
      </nav>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="hireLabour.php">Hire Labours</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="hiredLabours.php">Hired Labours<span class="sr-only">(current)</span></a>
          </li>
        </ul>
        </nav>
        <h3 class="text-center">Hire Labour</h3>
        <table class="table table-hover table-dark table-bordered" id="example">
        <thead>
            <tr>
                <th>Name</th>
                <th>Place<br>Role<br></th>
                <th>Phone Number</th>
                <th>Site Address<br>Contact<br>Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $phoneNumber = $_SESSION['phoneNumber'];
        $query="SELECT * FROM labourorders WHERE employerPhoneNumber='$phoneNumber'";
        $results= mysqli_query($conn,$query);
        if(mysqli_num_rows($results)>0){
        while($result = mysqli_fetch_assoc($results)){
            $phonenumber = $result['employeePhoneNumber'];
            $query1= "SELECT * FROM labour WHERE phoneNumber='$phonenumber'";
            $result1= mysqli_query($conn,$query1);
            $data= mysqli_fetch_assoc($result1);
            echo "<tr><td class='name'>".$result['employeeName']."</td><td class='place'>".$data['place']."<br>".$data['role']."</td><td class='role'>".$phonenumber."</td><td class='address'>".$result['address']."<br>".$result['contact']."<br>".$result['date']."</td><td class='status'>".$result['status']."</td></tr>";
        }
        }
        ?>
        </tbody>
        </table>
    </div>

  </div>
  <!-- Bootstrap core JavaScript -->
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

    $(".hireLabour").click(function(){
     var phoneNumber= $(this).closest('tr').find('.phoneNumber').text();
    window.location.href="hireNow.php?phoneNumber="+phoneNumber;
    });
  </script>

</body>

</html>