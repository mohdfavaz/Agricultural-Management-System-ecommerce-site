<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>registration</title>
</head>
<body>
<?php include('registrationServer.php'); ?>
    <?php include('errors.php'); ?>
<header>
    <nav class="navbar navbar-light bg-dark">
  <div class="container-fluid">
    <a href="index.php"><span class="navbar-brand mb-0 h1 text-white">AMS</span></a>
  </div>
</nav>
    </header>
    <section id="registrationForm">
        <h1 class="mt-4 mb-4 text-center">Register</h1>
        <div class="container-fluid m-auto" style="width:80%;">
        <form action="" method="POST">
        <div class="form-group">
    <label for="firstName">First Name</label>
    <input type="text" class="form-control" id="firstName" name="firstName" required>
  </div>
  <div class="form-group">
    <label for="lastName">Last Name</label>
    <input type="text" class="form-control" id="lastName" name="lastName" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">User Type</label>
    <select class="form-control" id="exampleFormControlSelect1" name="userType">
      <option>user</option>
      <option>farmer</option>
      <option>seller</option>
      <option>labourer</option>
    </select>
  </div>
  <div class="form-group">
      <label for="phoneNumber">Phone Number</label>
      <input type="text" pattern="[0-9]{10}" name="phoneNumber" title="A phone number should only contain numbers and of 10 numbers" class="form-control" id="phoneNumber" required>
  </div>
  <div class="form-group">
    <label for="emailId">Email address</label>
    <input type="email" class="form-control" name="emailId" id="emailId" required>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password" required>
  </div>
  <div class="form-group">
    <label for="confirmPassword">Confirm Password</label>
    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required>
  </div>

  <button type="submit" class="btn btn-primary" name="register">Register</button>
</form>
    </div> 
    </section>

    <footer class="bg-dark text-white mt-2">
        <div class="container-fluid">
            &copy Agricultural Management System
        </div>
    </footer>
    

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>