<?php
session_start();
$errors= array();
if(isset($_SESSION['firstName'])){
    if($_SESSION['userType']=='admin'){
        header('location:admin/admin-homepage.php');
    }
    else if($_SESSION['userType']=='farmer'){
        header('location:farmer/farmer-homepage.php');
    }
    else if($_SESSION['userType']=='user'){
        header('location:user/user-homepage.php');
    }
    else if($_SESSION['userType']=='labourer'){
        header('location:labourer/labourer-homepage.php');
    }
    else{
        header('location:seller/seller-homepage.php');
    }
}
?>
<?php include('connection.php')?>
<?php
if(isset($_POST['login'])){
    $phoneNumber= $_POST['phoneNumber'];
    $password1= $_POST['password1'];
    $userValidateQuery= "SELECT * FROM userdetails WHERE phoneNumber='$phoneNumber' AND password1='$password1'";
    $userValidateQueryResult= mysqli_query($conn,$userValidateQuery);
    if(mysqli_num_rows($userValidateQueryResult)>0){
    $userData= mysqli_fetch_assoc($userValidateQueryResult);
    if($userData['acStatus']=="pending"){
      echo "<script>alert('Admin has not approved your account yet');</script>";
      echo "<script>window.location.href='index.html';</script>";
    }
    else if($userData['acStatus']=='disapproved'){
        echo "<script>alert('Admin has disapproved your account');</script>";
        echo "<script>window.location.href='index.html';</script>";  
    }
    else{
        if($userData['userType']=="admin"){
            $_SESSION['firstName']= $userData['firstName'];
     $_SESSION['lastName']= $userData['lastName'];
     $_SESSION['phoneNumber']= $userData['phoneNumber'];
     $_SESSION['userType']= $userData['userType'];
     echo "<script>alert('Login successful');</script>";
     echo "<script>window.location.href='admin/admin-homepage.php';</script>";
        }
        else if($userData['userType']=="farmer"){
            $_SESSION['firstName']= $userData['firstName'];
     $_SESSION['lastName']= $userData['lastName'];
     $_SESSION['phoneNumber']= $userData['phoneNumber'];
     $_SESSION['userType']= $userData['userType'];
     echo "<script>alert('Login successful');</script>";
     echo "<script>window.location.href='farmer/farmer-homepage.php';</script>";
        }
        else if($userData['userType']=="seller"){
            $_SESSION['firstName']= $userData['firstName'];
     $_SESSION['lastName']= $userData['lastName'];
     $_SESSION['phoneNumber']= $userData['phoneNumber'];
     $_SESSION['userType']= $userData['userType'];
     echo "<script>alert('Login successful');</script>";
     echo "<script>window.location.href='seller/seller-homepage.php';</script>";
        }
        else if($userData['userType']=="user"){
            $_SESSION['firstName']= $userData['firstName'];
     $_SESSION['lastName']= $userData['lastName'];
     $_SESSION['phoneNumber']= $userData['phoneNumber'];
     $_SESSION['userType']= $userData['userType'];
     echo "<script>alert('Login successful');</script>";
     echo "<script>window.location.href='user/user-homepage.php';</script>";
        }
        else if($userData['userType']=="labourer"){
            $_SESSION['firstName']= $userData['firstName'];
     $_SESSION['lastName']= $userData['lastName'];
     $_SESSION['phoneNumber']= $userData['phoneNumber'];
     $_SESSION['userType']= $userData['userType'];
     echo "<script>alert('Login successful');</script>";
     echo "<script>window.location.href='labourer/labourer-homepage.php';</script>";
        }
    }
    }
    else{
        echo "<script>alert('Invalid Email Id or password');</script>";
    }
}
?>