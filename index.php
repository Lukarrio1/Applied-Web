<?php include('inc/navbar.php');
// this error message is responsible for the database if there isn't a connection established
if(isset($_GET['database'])){
  echo '<span class="text-danger">Failed to connect to the database</span>';
}
// this is the error message if a client is trying to access a part of the web site that require authentification
if(isset($_GET['auth'])){ 
    echo "<span class='text-danger h4'>You have to <a class='text-defualt' href='user_login.php'>Login</a></span>";
}
// this notification is responsible for notifying the user that they are already logged in..
if(isset($_GET['alreadyauth'])){
  echo '<span class="text-danger">Your already  logged in.</span>';
}
if(isset($_GET['adminauth'])){
  echo '<span class="text-danger">Forbidden admin only</span>';
}
?>
<!-- Carousel -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
    <!-- first slide. -->
        <div class="carousel-item active img1">
            <img class="img1" src="img/firstpic.jpg" alt="First slide"  width="100%" height="30%">
        </div>
    <?php 
    $show_sql ="SELECT * FROM cars WHERE feature >5";
    $show_query = mysqli_query($connect,$show_sql);
    $show = mysqli_fetch_all($show_query,MYSQLI_ASSOC);
    ?>
    <!-- dynamic slide -->
    <?php foreach($show as $photo): ?>
        <div class="carousel-item">
            <img class="img1" src="img/<?php echo $photo['photo'] ?>" alt="<?php echo $photo['name']?>" width="100%" height="30%">
        </div>
        <?php endforeach ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="row pt-2 pb-3 pl-1 pr-1">
    <!-- featured cars with likes greater than 4 -->
    <?php 
    $show_sql ="SELECT * FROM cars WHERE feature >4";
    $show_query = mysqli_query($connect,$show_sql);
    $show = mysqli_fetch_all($show_query,MYSQLI_ASSOC);
    ?>
    <?php foreach($show as $car): ?>
    <div class="col-lg-4">
        <div class="card rounded shadow" id="<?php echo $car['Brand'].$car['id']?>" >
            <div class="card-body">
                <img src="img/<?php echo $car['photo'] ?>" alt="" srcset="" width="40%" height="40%">
            </div>
            <div>
            <h4><?php echo $car['Brand']; ?> <?php echo $car['name']; ?></h4>
                <p ><?php echo $car['about']?></p>
            </div>
            <div class="card-footer text-center bg-white">
              <a href="/show.php?id=<?php echo $car['id']?>" class="btn btn-success">View</a>
            </div>
        </div>
    </div>
    <!-- this script is reposible for the individual animation of the featured cars -->
    <script type="text/javascript">
 document.getElementById("<?php echo $car['Brand'].$car['id']?>").addEventListener('mouseover', <?php echo $car['Brand'].$car['id']?>);
function <?php echo $car['Brand'].$car['id']?>() {
    var card1 = document.getElementById("<?php echo $car['Brand'].$car['id']?>");
    card1.className = "card-atm card rounded shadow";
}
</script>
    <?php endforeach ?>
    <div class="col-lg-12 col-md-12 col-xs-12 pt-2">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. At quibusdam eligendi maiores, neque corrupti fugiat aperiam maxime, facilis a doloremque temporibus. Unde similique molestias possimus id veniam repellat enim laboriosam tempora officiis ratione
        nulla suscipit voluptas, eius necessitatibus iusto doloremque ullam rerum ut earum blanditiis repellendus quas non maxime quis?
    </div>
</div>
<?php  include('inc/footer.php') ?>