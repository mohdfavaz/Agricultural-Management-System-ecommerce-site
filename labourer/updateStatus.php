<?php
include '../connection.php';
$status = $_GET['status'];
$id = $_GET['id'];
if($status=='accept'){
  $query = "UPDATE labourorders SET status='accepted by labour' WHERE orderId='$id'";
  $result = mysqli_query($conn,$query);
  if($result){
    echo "<script>alert('Hiring offer accepted');</script>";
    echo "<script>window.location.href='recievedOrders.php';</script>";
  }
  else{
    echo "<script>alert('Couldn't accept the offer');</script>";
    echo "<script>window.location.href='recievedOrder.php';</script>";
  }
}
elseif($status=='reject'){
  $query = "UPDATE labourorders SET status='rejected by labour' WHERE orderId='$id'";
  $result = mysqli_query($conn,$query);
  if($result){
    echo "<script>alert('Hiring offer rejected');</script>";
    echo "<script>window.location.href='recievedOrders.php';</script>";
  }
  else{
    echo "<script>alert('Couldn't reject the offer');</script>";
    echo "<script>window.location.href='recievedOrder.php';</script>";
  }
}

?>