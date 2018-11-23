<?php 
$connect = mysqli_connect('localhost','root','','car_jamaica');
if($connect == false){
 header('location:index.php?database');
}