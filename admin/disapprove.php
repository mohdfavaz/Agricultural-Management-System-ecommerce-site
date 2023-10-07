<?php
    include '../connection.php';
    $phoneNumber= $_GET['phoneNumber'];
    $query= "UPDATE userdetails SET acStatus='disapproved' WHERE phoneNumber='$phoneNumber'";
    $result= mysqli_query($conn,$query);
    if($result){
        echo "<script>alert('Disapproval Successful');</script>";
        echo "<script>history.back();</script>";
    }
    ?>