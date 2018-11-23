<?php
include('inc/navbar.php');
echo "</br>";

echo date('M j, Y h:ia', strtotime("now"));
echo "<br>";

if(isset($_SESSION['user'])){
var_dump($_SESSION['user']);
echo "<br>";
var_dump($_SESSION['current']);
};

 