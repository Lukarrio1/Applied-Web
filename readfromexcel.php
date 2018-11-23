<?php 
require('inc/navbar.php');
if(isset($_SESSION['admin'])){
require_once  './vendor/phpoffice/phpexcel/Classes/PHPExcel.php';
$log = './log/log.xlsx';
// reads from a xlsx file
$reader = PHPExcel_IOFactory::createReaderForFile($log);
$excel = $reader->load($log);
$worksheet = $excel->getSheet(0);
$lastrow = $worksheet->getHighestRow();
?>
<div class='col-md-10 offset-md-1 pt-2 pb-2 col-sm-12 col-xs-12'>
<div class='card rounded shadow'>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">Logged IN</th>
      <th scope="col">Active For</th>
      <th scope="col">Logged Out</th>
      <th scope="col">Session ID</th>
    </tr>
  </thead>
  <tbody>
  <?php for($row =1; $row<=$lastrow; $row++){?>
    <tr>
      <th scope="row">
      <?php echo $worksheet->getCell("A{$row}")->getValue()?></th>
      <td><?php echo $worksheet->getCell("B{$row}")->getValue()?></td>
      <td><?php echo $worksheet->getCell("C{$row}")->getValue()?></td>
      <td><?php echo $worksheet->getCell("D{$row}")->getValue()?></td>
      <td><?php echo $worksheet->getCell("E{$row}")->getValue()?></td>
    </tr>
  <?php }?>
  </tbody>
</table>
</div>
 </div>
<?php
require('inc/footer.php');
}else{
header('location:index.php?adminauth');
}
?>