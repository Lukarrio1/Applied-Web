<?php include('inc/navbar.php');
require('connect.php');
require('custom_function.php');
if(isset($_GET['id'])){
// this sanitize's the id that is passw
$id= sanitize($_GET['id']);
$show_sql = "SELECT * FROM cars WHERE id='$id'";
$show_qry = mysqli_query($connect,$show_sql);
$show = mysqli_fetch_assoc($show_qry);
if($show['id']==null){
header('location:index.php');
}
}else{
header('location:index.php');
}
if(isset($_GET['delete'])){
$id = sanitize($_GET['delete']);
$delete_sql = "DELETE FROM cars WHERE id='$id'";
$img_sql = "SELECT * FROM cars WHERE id='$id'";
$img_qry = mysqli_query($connect,$img_sql);
$img=mysqli_fetch_assoc($img_qry);
if(unlink('img/'.$img['photo'])){
$delete_query = mysqli_query($connect,$delete_sql);
header('location:cars.php?deleted');
}
}
?>
<div class="col-md-4 offset-md-4 pt-2 pb-3">
<div class="card rounded shadow" >
<div class="card-body">
<img src="img/<?php echo $show['photo'] ?>" alt="<?php echo $show['name']; ?>" width="100%" height="40%" >
</div>
<div>
<div class="card-title h1"><?php echo $show['Brand']?> <?php echo $show['name']; ?></div>
<p><?php echo $show['about']?></p>
</div>
<?php 
if(isset($_SESSION['admin'])){
?>
<div class="card-footer text-center bg-white">
<a href="show.php?delete=<?php echo $show['id']?>" class="btn btn-danger">Delete</a>
</div>
<?php 
}
?>
<?php 
if(isset($_SESSION['user']) ){
?>
<div class="card-footer text-center bg-white">
<?php if($show['user']!=$_SESSION['user']['Name']){ ?>
<a href="logics.php?like=<?php echo $show['id'] ?>" class="btn btn-defualt">Like</a>
<?php }else{ ?>
<a href="logics.php?dislike=<?php echo $show['id'] ?>" class="btn btn-defualt">Dislike</a>
<?php } ?>
</div>
<?php
}
?>
</div>
</div>
<?php include('inc/footer.php') ?>