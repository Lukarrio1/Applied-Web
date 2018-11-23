<?php 
require('../vendor/autoload.php');
require('../connect.php');
require('../session.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
if(isset($_SESSION['admin'])){
$log_sql ="SELECT * FROM activity_log";
$log_qry =mysqli_query($connect,$log_sql);
$log=mysqli_fetch_all($log_qry,MYSQLI_ASSOC);
$spreadsheet = new Spreadsheet();
$sheet= $spreadsheet->getActiveSheet();
foreach($log as $user):
$counter = $user['session'];
$logged_in = $user['logged_in'];
$logged_out= $user['logged_out'];
$logged_in_stamp= date('M j, Y h:ia', strtotime($logged_in));
$logged_out_stamp= date('M j, Y h:ia', strtotime($logged_out));
$active_stamp=$logged_in-$logged_out;
$active=date('M j, Y h:ia', strtotime($active_stamp));
$sheet->setCellValue("A{$counter}","".$user['user_id']."");
$sheet->setCellValue("B{$counter}","".$logged_in_stamp."");
$sheet->setCellValue("C{$counter}","".$active."");
$sheet->setCellValue("D{$counter}","".$logged_out_stamp."");
$sheet->setCellValue("E{$counter}","".$user['session']."");
endforeach;
$writer = new Xlsx($spreadsheet);
$writer->save('log.xlsx');
if(isset($_GET['view'])){
header('location:../readfromexcel.php');
}else{
 header('location:/log/log.xlsx');
}
}else{
    header('location:/index.php?adminauth');
}