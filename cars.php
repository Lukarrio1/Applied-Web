<?php 
include('inc/navbar.php');
$show_sql ="SELECT * FROM cars";
$show_query = mysqli_query($connect,$show_sql);
$show = mysqli_fetch_all($show_query,MYSQLI_ASSOC);
if(isset($_GET['deleted'])){
echo "<span class='text-danger card'>Deleted !</span>";
}
?>
<div class="row pt-2 pb-3 pl-1 pr-1">
<?php foreach($show as $car): ?>
<div class="col-lg-4">
<div class="card rounded shadow" id="<?php echo $car['Brand'].$car['id']?>" >
<div class="card-body">
<img src="img/<?php echo $car['photo'] ?>" alt="" srcset="" width="40%" height="40%">
<br>
<h5><?php echo $car['Brand']; ?> <?php echo $car['name']; ?></h5>
<p><?php echo $car['about']?></p>
</div>
<div class="card-footer text-center bg-white">
<a class="btn btn-defualt" href="show.php?id=<?php echo $car['id'] ?>">View</a>
<?php 
if(isset($_SESSION['user']) ){
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
    var card = document.getElementById("<?php echo $car['Brand'].$car['id']?>");
    card.className = "card-atm card rounded shadow";
}
</script>
    <?php endforeach;
    ?>
</div>
<?php  include('inc/footer.php');?>
