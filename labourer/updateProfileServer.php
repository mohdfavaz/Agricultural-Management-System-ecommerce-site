<?php
if(isset($_POST['submit'])){
    $place = $_POST['area'];
    $role = $_POST['jobTitle'];
    $phoneNumber = $_SESSION['phoneNumber'];
    $searchQuery = "SELECT * FROM labour WHERE phoneNumber='$phoneNumber'";
    $searchQueryResult = mysqli_query($conn,$searchQuery);
    if(mysqli_num_rows($searchQueryResult)>0){
        $query = "UPDATE labour SET place='$place', role='$role' WHERE phoneNumber='$phoneNumber'";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "<script>alert('Profile updation successfull');</script>";
        }
        else{
            echo "<script>alert('Could not update profile');</script>";
        }
    }
    else{
    $query = "INSERT INTO labour (phoneNumber,place,role) VALUES ('$phoneNumber','$place','$role')";
    $result = mysqli_query($conn,$query);
    if($result){
        echo "<script>alert('Profile updation successfull');</script>";
    }
    else{
        echo "<script>alert('Could not update profile');</script>";
    }
    }
}
?>