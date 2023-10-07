<?php
if(isset($_POST['submit'])){
    $fertilizerName= $_POST['fertilizerName'];
    $fertilizerDescription= $_POST['fertilizerDescription'];
    $fertilizerQuantity= $_POST['fertilizerQuantity'];
    $fertilizerPrice= $_POST['fertilizerPrice'];
    $filename=$_FILES['uploadfile']['name'];
    $tempname=$_FILES['uploadfile']['tmp_name'];
    $folder= "../fertilizerImages/";
    move_uploaded_file($tempname,$folder.$filename);
    $image= $folder.$filename;
    $phoneNumber= $_SESSION['phoneNumber'];
    $productType= 'fertilizer';
    $insertQuery= "INSERT INTO product (productType,productName,productDescription,productImage,productPrice,productQuantity,phoneNumber) VALUES('$productType','$fertilizerName','$fertilizerDescription','$image','$fertilizerPrice','$fertilizerQuantity','$phoneNumber')";
    $result= mysqli_query($conn,$insertQuery);
    if($result){
        echo "<script>alert('Fertilizer added successfully');</script>";
    }
    else{
        echo "<script>alert('Something went wrong! Please try again');</script>";
    }
}
?>