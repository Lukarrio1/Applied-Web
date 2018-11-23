<?php include('./inc/navbar.php');
if(!isset($_SESSION['user']) &&!isset($_SESSION['admin'])){
// this is responsible for notifing the user that he/she account has been created.
if(isset($_GET['success'])){
echo "<span class='text-success'>Your account has been created just login</span>";
}
?>
<div class="col-lg-8 offset-lg-2 pt-3 pb-3 ">
<div class="card shadow rounded">
<div class="card-header bg-white h3 text-dark">Login</div>
<form  id="login-form" action="process.php" method="POST">
  <div class="form-group row pt-3">
    <div class="col-sm-6 offset-sm-3">
      <input type="email" class="form-control form-control-lg" id="name" placeholder="Email Address" name="user_email" autocomplete="off" required>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-6 offset-sm-3">
      <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="user_password" autocomplete="off"  required>
    </div>
  </div>
  <?php  
  if(isset($_GET['error'])){
    echo "<p class='text-danger'>Incorrect username or password </p>";
  }
  ?>
  <div class="form-group row">
    <div class="col-sm-6 offset-sm-3">
      <button type="submit" class="btn btn-success pt-b" name="login" id="login">Login</button>
    </div>
  </div>
</form>
<div class="card-footer bg-white"><a href="password_resets.php" class="bn btn-link">Password reset</a></div>
</div>
</div>
<?php  }else{
  header('location:index.php?alreadyauth');
} include('./inc/footer.php')?>