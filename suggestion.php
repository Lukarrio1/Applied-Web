<?php include('inc/navbar.php');
if(isset($_SESSION['user'])){
require('custom_function.php');
$errorname = 0;
$errorbrand = 0;
$errorabout = 0;
$email = $_SESSION['user']['Email'];
if(isset($_POST['suggestion'])){
$brand = sanitize($_POST['brand']);
$name=sanitize($_POST['name']);
$about = sanitize($_POST['about']);
if(filter_var($email,FILTER_VALIDATE_EMAIL)){
if(strlen($brand)>2){
if(strlen($about)>10){
if(strlen($name)>2){
if(mail('tomennis1997@gmail.com','Cars-Jamaica Car',
"\r\n brand:".$brand.
"\r\n Car Name:".$name.
"\r\n About Car:".$about
,'From:'.$email
)==true){
echo "<span class='text-success'>Suggestion made..</span>";
}else{
 echo "<span class='text-danger'>Error failed to send..</span>";
}
}else{
$errorname=1;
}
}else{
$errorabout =1;
}
}else{
$errorbrand =1;
}
}
}
?>
<div class="pb-3 pt-2">
<div class="row">
<div class="col-8 offset-2">
<div class="card rounded shadow">
<div class="card-body">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" id="addcar" enctype="multipart/form-data">
  <div class="form-group">
    <input type="text" class="form-control" id="Brand" aria-describedby="brand" placeholder="Car Brand" name="brand">
    <?php if($errorbrand==1){
      echo "<span class='text-danger'>Car brand is too short..</span> ";
      }?>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="Car_Name" placeholder="Name of car" name="name">
    <?php if($errorname==1){
      echo "<span class='text-danger'>Car name is too short..</span> ";
      }?>
  </div>
  <div class="form-group">
    <textarea class="form-control" id="About_car" rows="3" name="about" placeholder="About the car"></textarea>
    <?php if($errorabout==1){
      echo "<span class='text-danger'>Description is too short..</span> ";
      }?>
  </div>
  <button type="submit" class="btn btn-success" name="suggestion">Save</button>
</form>
</div>
</div>
</div>
</div>
</div>
<?php }else{
 header('location:index.php?auth');
}
include('inc/footer.php');
?> 

