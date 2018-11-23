<?php 
// this is the use of a custom php class which also houses the qrcode custom function..
 require_once('vendor/autoload.php');
 $qr = new Endroid\QrCode\QrCode();
 $qr->setText('Find us on instagram: cars-jamaica facebook: facebook/cars-jamaica.com');
 $qr->setSize('100');
 $qr->setMargin('10');
 header('Content-Type: '.$qr->getContentType());
 echo $qr->writeString();