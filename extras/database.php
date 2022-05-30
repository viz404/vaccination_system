<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "vaccine";
$con = mysqli_connect($server,$username,$password,$database);
if(!$con){
    die(mysqli_connect_error());
}
?>