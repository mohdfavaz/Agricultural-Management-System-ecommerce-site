<?php
if(isset($_POST['updatePassword'])){
    $currentPassword= $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword= $_POST['confirmNewPassword'];
    $phoneNumber= $_SESSION['phoneNumber'];
    $query= "SELECT * FROM userdetails WHERE phoneNumber='$phoneNumber' AND password1='$currentPassword'";
    $result= mysqli_query($conn,$query);
    if($result){
      if($newPassword==$confirmPassword){
          $passwordUpdate= "UPDATE userdetails SET password1='$newPassword' WHERE phoneNumber='$phoneNumber'";
          $passwordUpdateResult= mysqli_query($conn,$passwordUpdate);
          if($passwordUpdateResult){
              echo "<script>alert('Password changed successfully');</script>";
              echo "<script>window.location.href='seller-homepage.php';</script>";
          }
          else{
            echo "<script>alert('Password change failed Try again');</script>";
            echo "<script>window.location.href='seller-homepage.php';</script>";
          }
      }
      else{
          echo "<script>alert('New Passwords mis-match');</script>";
          echo "<script>window.location.href='seller-homepage.php';</script>";
      }
    }
    else{
        echo "<script>alert('Current Password Wrong');</script>";
        echo "<script>window.location.href='seller-homepage.php';</script>";

    }
}
?>