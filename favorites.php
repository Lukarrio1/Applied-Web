<?php 
include('inc/navbar.php');
if(!isset($_SESSION['user'])){
header('location:process.php');
}else{
$userid = $_SESSION['user']['id'];
$user = $_SESSION['user']['Name'];
?>
<div class="col-12 pt-2 pb-2 ">
<div class="row">
<div class="col-lg-4 text-right"></div>
<div class="col-lg-4 text-center"><a class="btn btn-default" href="suggestion.php?user=<?php echo $userid;?>">
Suggestion for a new car</a></div>
<div class="col-lg-4 text-right"></div>
</div>
</div>
<div class="row pt-2 pb-3 pl-1 pr-1">
<?php 
$show_sql ="SELECT * FROM cars WHERE user='$user'";
$show_query = mysqli_query($connect,$show_sql);
$show = mysqli_fetch_all($show_query,MYSQLI_ASSOC);
?>
<?php foreach($show as $car): ?>
<div class="col-lg-4">
<div class="card rounded shadow" id="<?php echo $car['Brand'].$car['id']?>" >
<div class="card-body">
<h1>Brand:<?php echo $car['Brand']; ?></h1>
<h1>Name:<?php echo $car['name']; ?></h1>
<img src="img/<?php echo $car['photo'] ?>" alt="<?php echo $car['name']; ?>" width="40%" height="40%">
</div>
<div>
<p><?php echo $car['about']?></p>
</div>
<div class="card-footer text-center bg-white">
<a class="btn btn-success h3" href="show.php?id=<?php echo $car['id'] ?>">View</a>
<?php 
if(isset($_SESSION['user'])|| isset($_SESSION['admin'])){
?>
<?php if($car['user']!=$_SESSION['user']['Name']){ ?>
<a href="logics.php?like=<?php echo $car['id'] ?>" class="btn btn-defualt">Like</a>
<?php }else{ ?>
<a href="logics.php?dislike=<?php echo $car['id'] ?>" class="btn btn-defualt">Dislike</a>
<?php } ?>
<?php
}
?>
</div>
</div>
</div>
<script type="text/javascript">
document.getElementById("<?php echo $car['Brand'].$car['id']?>").addEventListener('mouseover', <?php echo $car['Brand'].$car['id']?>);
function <?php echo $car['Brand'].$car['id']?>() {
var card1 = document.getElementById("<?php echo $car['Brand'].$car['id']?>");
card1.className = "card-atm card rounded shadow";
}
</script>
<?php endforeach ?>
</div>
<?php 
include('inc/footer.php');
}?>