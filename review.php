<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['firstName'])){
    echo "<script>alert('You should first login to write a review');</script>";
    echo "<script>window.location.href='login.php';</script>";
}
else{
    $rating = $_POST['points'];
    $review = $_POST['review'];
    $userName = $_SESSION['firstName']." ".$_SESSION['lastName'];
    $query = "INSERT INTO review (username,review,rating) VALUES ('$userName','$review','$rating')";
    $result = mysqli_query($conn,$query);
    if($result){
        echo "<script>alert('Review Successfull');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
    else{
        echo "<script>alert('Review ]Not successfull');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
}
?>