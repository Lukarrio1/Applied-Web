<?php include('./inc/navbar.php');
require('custom_function.php');
if(!isset($_SESSION['admin'])){
if(!isset($_SESSION['user'])){
if(isset($_POST['register'])){
$raw_name =strtolower(sanitize(trim($_POST['User'])));
$raw_email = sanitize($_POST['Email']);
$raw_password =sanitize(trim($_POST['Password']));
$pwconfirm = sanitize(trim($_POST['password-confirm']));
}
?>
<div class="row">
<div class="col-lg-8 offset-lg-2 pt-3 pb-3 ">
<div class="card rounded shadow">
<div class="card-header bg-white h3 text-capitalize text-dark">Sign - Up
</div>
<form action="register.php" method="POST">
<div class="form-group row pt-2">
<div class="col-sm-6 offset-sm-3">
<input type="text" class="form-control form-control-lg" id="User" placeholder="User Name" name="User" required autocomplele="off">
<?php 
if(isset($raw_name)){
if(empty($raw_name)){
echo "<span class='text-danger'>Name cannot be empty</span>";
$ername = 0;
}else if( strlen($raw_name)<3){
echo "<span class='text-danger'>$raw_name is too short for a name!!</span>";
$ername = 0;
}else{
$ername = 1;
}}
?>
</div>
</div>
<div class="form-group row pt-2">
<div class="col-sm-6 offset-sm-3">
<input type="email" class="form-control form-control-lg" id="email" placeholder="Email" name="Email" required autocomplete="off">
<?php 
if(isset($raw_email) ){
$check_sql = "SELECT * FROM registered_users WHERE Email='".$raw_email."'";
$check_query = mysqli_query($connect,$check_sql);
$check =  mysqli_fetch_assoc($check_query);
if(empty($raw_email) ){
echo "<span class='text-danger'>enter an email!</span>";
}else if( $raw_email == $check['Email']){
echo "<span class='text-danger'>$raw_email already in use!!</sapn>";
$eremail = 0;
}else if(filter_var($raw_email,FILTER_VALIDATE_EMAIL)==false){
echo "<span class='text-danger'>$raw_email is not an email!!</span>";
$eremail = 0;
}else{
$eremail = 1;
}
}
?>
</div>
</div>
<div class="form-group row">
<div class="col-sm-6 offset-sm-3">
<input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="Password" required autocomple="off">
<?php 
if(isset($raw_password)){
if(strlen($raw_password)<5){
echo "<span class='text-danger'>This password is to short!</span>";
}
}
?>
</div>
</div>
<div class="form-group row">
<div class="col-sm-6 offset-sm-3">
<input type="password" class="form-control form-control-lg" id="password_confirm" placeholder="re-type password" name="password-confirm" required  autocomple="off">
<?php 
if(isset($pwconfirm) && isset($raw_password)){
if($raw_password != $pwconfirm){
echo "<span class='text-danger'>Confirm password doesn't match password</span>";
$erpassword = 0;
}else{
$erpassword = 1;
}
}
?>
</div>
</div>
<div class="form-group row">
<div class="col-sm-6 offset-sm-3">
<button type="submit" class="btn btn-success " name="register" id="user_login"> Sign
</button>
<?php 
if(isset($_POST['register']) ){
// this checks to see if every thing passed the validation 
if($erpassword == 1 && $ername == 1 && $eremail ==1){
$password = $raw_password;
$email = $raw_email;
$name = $raw_name;
$reset_key = sha1($name.$password);
$san_password = trim($password);
$san_email = filter_var($email,FILTER_SANITIZE_EMAIL);
$created_at = date('M j, Y h:ia', strtotime("now"));
// this encryps the password
$encryp_password = sha1($san_password) ;
// this places the sanitize data into the database
$insert_sql = "INSERT INTO registered_users(Name,Email,Password,reset_key,Created_at) VALUES('$name','$san_email','$encryp_password','$reset_key','$created_at')";
$insert_qry = mysqli_query($connect,$insert_sql);
header('location:user_login.php?success');
}
}
?>
</div>
</div>
</form>
</div>
</div>
</div>
<?php }else{
    header('location:index.php?alreadyauth');
} }  else{
    header('location:favorites.php');
}
include('./inc/footer.php') ?>