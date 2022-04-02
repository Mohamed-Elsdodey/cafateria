<?php 
$id=$_GET['id'];
$available=$_GET['availabilty'];
echo $available;
echo $id;


require_once("../model/product.php");
$newdb= new productdatabase("cafateria");
$pdo=$newdb->getdbconnection();
$newdb->updatavailabilty($id,$available);
   