<?php
if(isset($_POST['submit'])){
$machineryId= $_POST['productId'];
$buyerPhoneNumber= $_SESSION['phoneNumber'];
$sellerPhoneNumber= $data['phoneNumber'];
$orderQuantity= $_POST['productquantity'];
$orderPrice= $_POST['totalPrice'];
$name= $_POST['name'];
$houseName= $_POST['housename'];
$cityName= $_POST['city'];
$state= $_POST['state'];
$pin= $_POST['pincode'];
$phoneNumber= $_POST['phoneNumber'];
$productType= "machinery";
$orderQuery= "INSERT INTO orders (productId,productType,buyerPhoneNumber,sellerPhoneNumber,orderQuantity,orderPrice,name,houseName,city,state,pincode,phoneNumber) VALUES ('$machineryId','$productType','$buyerPhoneNumber','$sellerPhoneNumber','$orderQuantity','$orderPrice','$name','$houseName','$cityName','$state','$pin','$phoneNumber')";
$orderQueryResult= mysqli_query($conn,$orderQuery);
if($orderQueryResult){
    $minusQuantityQuery="UPDATE product SET productQuantity= productQuantity-$orderQuantity WHERE productId='$machineryId'";
    $minusQuantityQueryResult= mysqli_query($conn,$minusQuantityQuery);
    echo "<script>alert('Order Placed Successfully');</script>";
    echo "<script>window.location.href='myOrders.php';</script>";
}
else{
    echo "<script>alert('Some error occured couldn't place order');</script>";
    echo "<script>window.location.href='myOrders.php';</script>";
}
}
?>