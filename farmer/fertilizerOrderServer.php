<?php
if(isset($_POST['submit'])){
$fertilizerId= $_POST['productId'];
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
$productType="fertilizer";
$orderQuery= "INSERT INTO orders (productId,productType,buyerPhoneNumber,sellerPhoneNumber,orderQuantity,orderPrice,name,houseName,city,state,pincode,phoneNumber) VALUES ('$fertilizerId','$productType','$buyerPhoneNumber','$sellerPhoneNumber','$orderQuantity','$orderPrice','$name','$houseName','$cityName','$state','$pin','$phoneNumber')";
$orderQueryResult= mysqli_query($conn,$orderQuery);
if($orderQueryResult){
    $minusQuantityQuery="UPDATE product SET productQuantity= productQuantity-$orderQuantity WHERE productId='$fertilizerId'";
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