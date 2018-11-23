<?php 
include('inc/navbar.php');
require('custom_function.php');
$erroremail = 0;
$errorsubject = 0;
$errorbody = 0;
if(isset($_POST['contact'])){
$email = sanitize($_POST['email']);
$subject=sanitize($_POST['subject']);
$body = sanitize($_POST['body']);
if(filter_var($email,FILTER_VALIDATE_EMAIL)){
if(strlen($subject)>3){
if(strlen($body)>10){
if(mail('tomennis1997@gmail.com','Cars-Jamaica',$body,'From:'.$email)==true){;
echo "<span class='text-success'>Message sent</span>";
}else{
 echo "<span class='text-danger'>Error failed to send</span>";
}
}else{
$errorbody =1;
}
}else{
$errorsubject =1;
}
}else{
$erroremail= 1;
}
}
?>
<div class="pb-3 pt-2">
<div class="row">
<div class="col-lg-8 offset-lg-2">
<div class="card rounded shadow">
<div class="card-header bg-white h3">Contact-Us</div>
<div class="card-body">
<form action="contact.php" method="POST" id="addcar" enctype="multipart/form-data">
<div class="form-group">
<input type="email" class="form-control" id="Email" aria-describedby="email" placeholder="Email" name="email" autocomplete="off" required>
<?php 
if($erroremail == 1){
echo "<span class= 'text-danger'>This is not a valid email address</span>";
}
?>
</div>
<div class="form-group">
<input type="text" class="form-control" id="subject" placeholder="subject" name="subject" autocomplete="off" required>
<?php 
if($errorsubject == 1){
echo "<span class= 'text-danger'>The subject is too short</span>";
}
?>
</div>
<div class="form-group">
<textarea class="form-control" id="body" rows="3" name="body" placeholder="body"></textarea>
<?php 
if($errorbody == 1){
echo "<span class= 'text-danger'>The body is too short</span>";
}
?>
</div>
<button type="submit" class="btn btn-success" name="contact">Send</button>
</form>
<br>
<div class="d-none d-lg-block">
<div class="card-title">
Android or IOS <br>
<img src="qrcode.php" alt="Social Media links" srcset="">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php 
include('inc/footer.php');
?>