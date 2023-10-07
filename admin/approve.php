<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php
    include '../connection.php';
    $phoneNumber= $_GET['phoneNumber'];
    $query= "UPDATE userdetails SET acStatus='approved' WHERE phoneNumber='$phoneNumber'";
    $result= mysqli_query($conn,$query);
    if($result){
        echo "<script>alert('Approval Successful');</script>";
        echo "<script>history.back();</script>";
    }
    ?>
</body>
</html>