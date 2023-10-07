<?php
include '../connection.php';
if(isset($_POST['submit'])){
    $cropName= $_POST['cropName'];
    $cropDescription= $_POST['cropDescription'];
    $cropQuantity= $_POST['cropQuantity'];
    $cropPrice= $_POST['cropPrice'];
    $filename=$_FILES['uploadfile']['name'];
    $tempname=$_FILES['uploadfile']['tmp_name'];
    $folder= "../cropImages/";
    move_uploaded_file($tempname,$folder.$filename);
    $image= $folder.$filename;
    $phoneNumber= $_SESSION['phoneNumber'];
    $productType="crop";
    $insertQuery= "INSERT INTO product (productType,productName,productDescription,productImage,productPrice,productQuantity,phoneNumber) VALUES('$productType','$cropName','$cropDescription','$image','$cropPrice','$cropQuantity','$phoneNumber')";
    $result= mysqli_query($conn,$insertQuery);
    if($result){
        echo "<script>alert('Crop added successfully');</script>";
    }
    else{
        echo "<script>alert('Something went wrong! Please try again');</script>";
    }
}
?>