<!-- this is to check auth -->
<?php 
if(!isset($_SESSION['admin'])){
 header('location:admin.php');
}else{
  require('connect.php');
?>
<div class="col-lg-8 offset-lg-2 pt-2 pb-2">
<div class="card rounded shadow">
<div class="card-header h3 bg-white">Add new car</div>
<div class="card-body">
<form action="logics.php" method="POST" id="addcar" enctype="multipart/form-data">
  <div class="form-group">
    <input type="text" class="form-control" id="Brand" aria-describedby="brand" placeholder="Car Brand" name="Brand"  autocomplete="off">
    <?php if(isset($_GET['errorbrand'])){
      echo "<span class='text-danger'>The car must have a brand<span>";
      }?>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="Car_Name" placeholder="Name of car" name="name" autocomplete="off">
    <?php if(isset($_GET['errorname'])){
      echo "<span class='text-danger'>The car must have a name <span>";
      }?>
  </div>
  <div class="form-group">
    <textarea class="form-control" id="About_car" rows="3" name="about" placeholder="About the car"></textarea>
    <?php if(isset($_GET['errorabout'])){
      echo "<span class='text-danger'>The car must have a description<span>";
      }?>
  </div>
  <div class="form-group">
    <input type="file" class="form-control-file" id="photo" name="photo">
  </div>
  <?php 
  if(isset($_GET['unknown'])){
  echo "<span class='text-danger'>Error try again</span><br>";
  }
    if(isset($_GET['filetype'])){
  echo "<span class='text-danger'>That file formant is not supported</span>";
  }
  ?>
  <button type="submit" class="btn btn-success" name="newcar">Save</button>
</form>
</div>
</div>
</div>
<div class="row pt-2 pb-2">
<div class="col-4 text-right"><a href="./log/excel.php" class="btn btn-defualt">Download log</a ></div>
<div class="col-4 text-center"><a href="/log/excel.php?view" class="btn btn-defualt">View log</a></div>
<div class="col-4 text-left"><a class="btn btn-defualt" href="pdf.php">View all user</a></div>
</div>
<?php }?>

