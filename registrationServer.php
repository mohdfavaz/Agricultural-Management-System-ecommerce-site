<?php
session_start();
if(isset($_SESSION['firstName'])){
    if($_SESSION['userType']=='admin'){
        header("location: admin/admin-homepage.php");
    }
    if($_SESSION['userType']=='user'){
        header("location: user/user-homepage.php");
    }
    if($_SESSION['userType']=='farmer'){
        header("location: farmer/farmer-homepage.php");
    }
    if($_SESSION['userType']=='seller'){
        header("location: seller/seller-homepage.php");
    }
    if($_SESSION['userType']=='labourer'){
        header("location: labourer/labourer-homepage.php");
    }
}
include('connection.php');
$errors= array();
if(isset($_POST['register'])){
    $firstName= $_POST['firstName'];
    $lastName= $_POST['lastName'];
    $userType= $_POST['userType'];
    $phoneNumber= $_POST['phoneNumber'];
    $emailId= $_POST['emailId'];
    $password= $_POST['password'];
    $confirmPassword= $_POST['confirmPassword'];
    if($password!=$confirmPassword){
        array_push($errors, "Password mis-match");
    }
    $validateQuery= "SELECT * FROM userdetails WHERE phoneNumber='$phoneNumber' OR emailId='$emailId'";
    $validateQueryResult= mysqli_query($conn,$validateQuery);
    if($validateQueryResult){
    $results= mysqli_fetch_assoc($validateQueryResult);
    if($results['phoneNumber']== $phoneNumber){
        array_push($errors, "Phone Number already exists");
    }
    if($results['emailId']== $emailId){
        array_push($errors," Email id already exists");
    }
    }
    if(count($errors)==0){
        $insertQuery= "INSERT INTO userdetails(firstName,lastName,userType,phoneNumber,emailId,password1) VALUES ('$firstName','$lastName','$userType','$phoneNumber','$emailId','$password')";
        $insertQueryResult= mysqli_query($conn,$insertQuery);
        if($insertQueryResult){
        echo "<script>alert('Your request for registration has been completed. You can login once admin approves your account');</script>";
        echo "<script>window.location.href='login.php';</script>";
        }
        else{
            echo "<script>alert('Couldn't create account');</script>";
        }
    }
}
?>