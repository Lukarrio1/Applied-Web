<?php include('inc/navbar.php');
require('custom_function.php');
if(!isset($_SESSION['user'])){
?>
<div class="col-lg-8 offset-lg-2 pt-2 pb-3" >
<div class="card rounded shadow">
<div class="card-body">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<div class="pb-2 col-sm-6 offset-sm-3">
<input type="text" class="form-control form-control-lg" id="email" placeholder="User Name" name="res_name" required autocomplete="off">
</div>
<div class="col-sm-6 offset-sm-3">
<input type="email" class="form-control form-control-lg" id="email" placeholder="Email" name="res_email" required autocomplete="off">
</div>
<div class=" pt-2">
<button class="btn btn-success" type="submit" name="Password_resets">Reset password</button>
</div>
</form>
<?php 
if(isset($_POST['Password_resets'])){
$name = strtolower(sanitize(trim($_POST['res_name'])));
$email =sanitize ($_POST['res_email']);
// searches to see if the database have any instances of the data entered.
$reset_sql = "SELECT * FROM registered_users WHERE Name='".sanitize($_POST['res_name'])."' AND Email='".sanitize($_POST['res_email'])."'";
$reset_query = mysqli_query($connect,$reset_sql);
$reset = mysqli_fetch_assoc($reset_query);
if($name == $reset['Name'] && $email== $reset['Email']){
// this is the php mail function
 if(mail($email,'Reset password','Your key : '.$reset['reset_key'],'Cars-Jamaica.com')){
echo "<span class='text-success'>Message sent to your email</span>";
header('location:code_entry.php');
}else{
     echo "<span class='text-danger'>Faild to send!</span>";
}
}else{
    echo "<span class='text-danger'>That is not a user..</span>";
}
}
?>
</div>
</div>
</div>
<?php }else{
    header('location:favorites.php');
}
include('inc/footer.php');?>



