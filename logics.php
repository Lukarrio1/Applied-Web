  <?php
  require('connect.php');
  require('session.php');
  require('custom_function.php');
  // This calls the addlike function
  if(isset($_GET['like'])){
  $like = sanitize($_GET['like']);
  AddLikes($like);
  }
  // this calls the dislike function
  if(isset($_GET['dislike'])){
  $dislike =sanitize($_GET['dislike']);
  Dislike($dislike);
  }
  // this will add a new like to the post
  function AddLikes($string){
  require('connect.php');
  $feature_sql ="SELECT * FROM cars WHERE id='$string'";
  $feature_qry =mysqli_query($connect,$feature_sql);
  $feature = mysqli_fetch_assoc($feature_qry);
  $current= $feature['feature'];
  $newlike = $current +1;
  $user = $_SESSION['user']['Name'];
  $update_sql = "UPDATE cars SET feature='$newlike' ,user='$user' WHERE id='$string'";
  $update_qry = mysqli_query($connect,$update_sql);
  header("location:favorites.php");
  }
  // this will unlike a post
  function Dislike($string){
  require('connect.php');
  $feature_sql ="SELECT * FROM cars WHERE id='$string'";
  $feature_qry =mysqli_query($connect,$feature_sql);
  $feature = mysqli_fetch_assoc($feature_qry);
  $current= $feature['feature'];
  $newlike = $current -1;
  $user =" ";
  $update_sql = "UPDATE cars SET feature='$newlike' , user='$user' WHERE id='$string'";
  $update_qry = mysqli_query($connect,$update_sql);
  header("location:cars.php");
  }
  //add a new car to the database and stores the img of it in img/ 
  if(isset($_POST['newcar'])){
  require('connect.php');
  $photo = $_FILES['photo'];
  $photoname = $_FILES['photo']['name'];
  $phototmpname = $_FILES['photo']['tmp_name'];
  $photosize = $_FILES['photo']['size'];
  $photoerror= $_FILES['photo']['error'];
  $phototype= $_FILES['photo']['type'];
  $photoext = explode('.',$photoname);
  $photoactualext =strtolower(end($photoext));
  $allowed = array('jpg','jpeg','png');
  $car_name = sanitize($_POST['name']);
  $about_car = sanitize($_POST['about']);
  $brand = sanitize($_POST['Brand']);
  if(empty($brand)){
  header("location:admin.php?errorbrand");
  }else if(empty($car_name)){
  header('location:admin.php?errorname');
  }else if(empty($about_car)){
  header('location:admin.php?errorabout');
  }else{
  if(in_array($photoactualext,$allowed)){
  if($photoerror===0){
  $img =uniqid(''.true).".".$photoactualext;
  $photostorage ='img/'.$img;
  move_uploaded_file($phototmpname,$photostorage);
  $insert_sql= "INSERT INTO cars(name,Brand,about,photo) VALUES('$car_name','$brand','$about_car','$img')";
  $insert_query =mysqli_query($connect,$insert_sql);
  header('location:cars.php');
  }else{
  header('location:admin.php?unknown');
  }
  }else{
  header('location:admin.php?filetype');
  }
  }
  }
