<?php 
// this is responible for the pdf 
require('session.php');
if(isset($_SESSION['admin'])){
    require('pdf/fpdf.php');
    require('connect.php');
    $id_sql = "SELECT * FROM `registered_users`";
    $id_qry = mysqli_query($connect, $id_sql);
    $id = mysqli_fetch_all($id_qry,MYSQLI_ASSOC);
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial","B",16);
    $pdf->Cell(0,20,'All Users',10,1,'C');
    foreach($id as $user):
    $pdf->Cell(0,10,'',10,1,'C');
    $pdf->Cell(0,10,"User Name: ".$user['Name'],10,1,'C');
    $pdf->Cell(0,10,"User Email: ".$user['Email'],10,1,'C');
    $pdf->Cell(0,10,"Joined At: ".date('M j, Y h:ia', strtotime($user['Created_at'] )),10,1,'C');
    endforeach;
    $pdf->output();
}else {
    header('location:index.php?adminauth');
}

