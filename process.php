<?php
require('connect.php');
require('session.php');
require('custom_function.php');
// logs in a user
if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])){
if(isset($_POST['login'])){
$email = sanitize($_POST['user_email']);
$password = sha1(sanitize($_POST['user_password']));
$user_sql = "SELECT * FROM registered_users WHERE Email='$email' AND Password='$password'";
if($user_query = mysqli_query($connect,$user_sql)){
$user_rs = mysqli_fetch_assoc($user_query);
$_SESSION['user']=$user_rs;
if($_SESSION['user']==null){
}else{
$id_in= $_SESSION['user']['id'];
$logged_in = time();
$logged_in_sql = "INSERT INTO activity_log(user_id,logged_in) VALUES('$id_in','$logged_in')";
$logged_in_qry= mysqli_query($connect,$logged_in_sql);
$session_sql ="SELECT * FROM activity_log WHERE logged_in ='$logged_in'"; 
$session_qry = mysqli_query($connect,$session_sql);
$session = mysqli_fetch_assoc($session_qry);
$session['session']=$_SESSION['current'];
}
}
}
}else{
header('location:admin.php');
}
//  logs out user on the lower levels 
if(isset($_GET['action'])){
    if(isset($_GET['action'])=="logout"){
    $logged_out = time();
    $current_session = $_SESSION['current'];
    $logged_out_sql = "UPDATE activity_log SET logged_out='$logged_out' WHERE session='$current_session'";
    $logged_out_qry= mysqli_query($connect,$logged_out_sql);
    unset($_SESSION['user']);
    unset($_SESSION['current']);
    }
    } 
    
// checks if the user is logged in
if(isset($_SESSION['user'])){
    header('location:favorites.php');
    }else{
     header('location:user_login.php?error');
    }