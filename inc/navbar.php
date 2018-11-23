  <?php include('connect.php');
  require('session.php');
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/app.css">
  <title>Cars-Jamaica<?php if(isset($_SESSION['user'])){
  echo "|".$_SESSION['user']['Name'];
  }?></title>
  </head>
  <body class=" text-center bg-white container pt-1">
  <nav class="navbar navbar-expand-lg navbar-light bg-dark sticky-top rounded-top" id="navbar">
  <a class="navbar-brand h3 text-white" href=index.php><span class="h3 text-success">C</span>ars-<span class="text-warning">J</span>amaica</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div class="navbar-nav ">
  <a class="nav-item nav-link active h5  text-white " href="index.php" id="home">Home <span class="sr-only">(current)</span></a>
  <a class="nav-item nav-link h5  text-white " href="cars.php" id="cars">Cars</a>
  <a class='nav-item nav-link h5  text-white' href='contact.php' id='Logout'>Contact Us</a>
  <?php 
  if(isset($_SESSION['admin'])){
  echo "<a class='nav-item nav-link h5  text-white' href='admin.php' id='admin'>Admin</a>";
  echo "<a class='nav-item nav-link h5  text-white' href='admin.php?&action=adminlogout' id='Logout'>Logout</a>";
  }
  if(isset($_SESSION['user'])){
  echo "<a class='nav-item nav-link h5  text-white' href='favorites.php' id='fav' >Favorites</a>";
  echo "<a class='nav-item nav-link h5  text-white' href='process.php?&action=logout' id='Logout'>Logout</a>";
  } 
  if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
  echo "<a class='nav-item nav-link h5  text-white ' href='register.php' id='logout'>Sign-Up</a>";
  echo "<a class='nav-item nav-link h5  text-white ' href='user_login.php' id='user_logout'>login</a>";
  }
  
  ?> 
  </div>
  </div>
  </nav>
  <div class="atm">