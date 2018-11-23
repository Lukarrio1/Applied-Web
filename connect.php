<?php 
$connect = mysqli_connect('localhost','root','','car_jamaica');
if($connect != true){
 header('location:index?database');
}