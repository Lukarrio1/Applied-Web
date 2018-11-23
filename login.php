<?php include('./inc/navbar.php');
if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
?>
<div class="col-lg-8 offset-lg-2 pt-3 pb-3 ">
<div class="card shadow rounded">
<div class="card-title h3 text-dark">Admin Login</div>
<form  id="login-form" action="admin.php" method="POST">
  <div class="form-group row pt-2">
    <div class="col-sm-6 offset-sm-3">
      <input type="text" class="form-control form-control-lg" id="User_name" placeholder="User Name" name="User_name" autocomplete="off" required>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-6 offset-sm-3">
      <input type="password" class="form-control form-control-lg" id="User_password" placeholder="Password" name="User_password" autocomplete="off"  required>
    </div>
  </div>
  <?php  
  // this tell the user when there is a validation error
  if(isset($_GET['failed'])){
    echo "<p class='text-danger'>Incorrect username or password </p>";
  }
  ?>
  <div class="form-group row">
    <div class="col-sm-6 offset-sm-3">
      <button type="submit" class="btn btn-success " name="adminlogin" id="login" value="adminlogin">Login</button>
    </div>
  </div>
</form>
</div>
</div>
<?php 
}else{
header('location:index.php');
}  include('./inc/footer.php');?>