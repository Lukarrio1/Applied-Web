<?php
include('inc/navbar.php');
require('custom_function.php');
// this is to connect to the data base
require('connect.php');
// this is resposible for logging out the admin user
if(isset($_GET['action'])){
if(isset($_GET['action'])=="adminlogout"){
unset($_SESSION['admin']);
}
}
if(isset($_POST['adminlogin'])){
// this is the login sql for the admin user
$user_name =sanitize($_POST['User_name']);
$password =sanitize(sha1($_POST['User_password']));
$login_sql = "SELECT * FROM admin WHERE User_name='$user_name' AND User_password='$password'";
if($login_query = mysqli_query($connect,$login_sql)){
$login_rs = mysqli_fetch_assoc($login_query);
$_SESSION['admin']=$login_rs['User_name'];
}else{

}
}
if(isset($_SESSION['admin'])){
include('panel.php');
}else{
 header('location:login.php?failed');
}
include('inc/footer.php');

