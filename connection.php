<?php
$server= "localhost";
$username= "root";
$password= "";
$db= "ams";
$conn= mysqli_connect($server,$username,$password,$db);
if(!$conn){
    die("Connection failed:". mysqli_connect_error());
}
?>