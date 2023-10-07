<?php
include '../connection.php';
if(isset($_POST['submit'])){
    $machineryName= $_POST['machineryName'];
    $machineryDescription= $_POST['machineryDescription'];
    $machineryQuantity= $_POST['machineryQuantity'];
    $machineryPrice= $_POST['machineryPrice'];
    $filename=$_FILES['uploadfile']['name'];
    $tempname=$_FILES['uploadfile']['tmp_name'];
    $folder= "../machineryImages/";
    move_uploaded_file($tempname,$folder.$filename);
    $image= $folder.$filename;
    $phoneNumber= $_SESSION['phoneNumber'];
    $productType="machinery";
    $insertQuery= "INSERT INTO product (productType,productName,productDescription,productImage,productPrice,productQuantity,phoneNumber) VALUES('$productType','$machineryName','$machineryDescription','$image','$machineryPrice','$machineryQuantity','$phoneNumber')";
    $result= mysqli_query($conn,$insertQuery);
    if($result){
        echo "<script>alert('Machine added successfully');</script>";
    }
    else{
        echo "<script>alert('Something went wrong! Please try again');</script>";
    }
}
?>