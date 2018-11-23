<?php include('inc/navbar.php');
require('custom_function.php');
if(!isset($_SESSION['user'])){
?>
<div class="col-lg-8 offset-lg-2 pt-2 pb-3" >
<div class="card rounded shadow">
<div class="card-body">
<form action="code_entry.php" method="POST">
<div  class="col-sm-6 offset-sm-3 pb-3">
<input type="text" class="form-control form-control-lg" id="code" placeholder="Enter reset key" name="code" required autocomplete="off">
</div>
<div  class="col-sm-6 offset-sm-3 pb-3">
<input type="text" class="form-control form-control-lg" id="code" placeholder="new password" name="password" required autocomplete="off">
</div>
<div  class="col-sm-6 offset-sm-3 pb-3">
<input type="text" class="form-control form-control-lg" id="code" placeholder="Confirm password" name="pw_confirm" required autocomplete="off">
</div>
<?php 
if(isset($_POST['code_submit'])){
$resets_sql = "SELECT * FROM registered_users WHERE reset_key='".$_POST['code']."'";
$resets_query = mysqli_query($connect,$resets_sql);
$resets = mysqli_fetch_assoc($resets_query);
$entered_code =sanitize($_POST['code']);
$password = sanitize($_POST['password']);
$pw_password= sanitize($_POST['pw_confirm']);
$reset_key =sanitize($resets['reset_key']);
if($reset_key==$entered_code && $password == $pw_password && strlen($password)>5){ 
$encyp_password = sha1($password);
$res_sql ="UPDATE registered_users SET password='$encyp_password' where reset_key='$reset_key'";
$res_query = mysqli_query($connect,$res_sql);
if($res_query == true){
header('location:user_login.php');
}
}else{
echo "<span class='text-danger'>failed try again</span><br>";
}
}
?>
<button class="btn btn-success" type="submit" name="code_submit">
Send
</button>
</form>
</div>
</div>
</div>
<?php }else{
header('location:favorites.php');
}
include('inc/footer.php');?>


