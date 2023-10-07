<?php
$employeePhoneNumber= $_GET['phoneNumber'];
if(isset($_POST['submit'])){
$employerPhoneNumber= $_SESSION['phoneNumber'];
$employeedetailsQuery = "SELECT * FROM userdetails WHERE phoneNumber='$employeePhoneNumber'";
$employeedetailsQueryResult = mysqli_query($conn,$employeedetailsQuery);
$employeedetailsQueryData = mysqli_fetch_assoc($employeedetailsQueryResult);
$employerName = $_SESSION['firstName']." ".$_SESSION['lastName'];
$contact = $_POST['phonenumber'];
$address = $_POST['address'];
$date = $_POST['date'];
$employeeName = $employeedetailsQueryData['firstName']." ".$employeedetailsQueryData['lastName'];

$insertQuery = "INSERT INTO labourorders (employerName,employerPhoneNumber,contact,address,date,employeeName,employeePhoneNumber) VALUES ('$employerName','$employerPhoneNumber','$contact','$address','$date','$employeeName','$employeePhoneNumber')";
$insertQueryResult = mysqli_query($conn,$insertQuery);
if($insertQueryResult){
    echo "<script>alert('Request sent to labour. Wait for his confirmation');</script>";
    echo "<script>window.location.href='hireLabour.php';</script>";
}
else{
    echo "<script>alert('Couldn't sent request');</script>";
    echo "<script>window.location.href='hireLabour.php';</script>";
}

}
?>