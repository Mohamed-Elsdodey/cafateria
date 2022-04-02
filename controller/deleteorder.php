<?php
$id=$_GET['id'];
echo $id;
require_once("../model/order.php");
try {
   $newdb= new orderdatabase("cafateria");
      $conn=$newdb->getdbconnection();
     $newdb->deleteorder($id);
    }
catch(PDOException $e)
    {
       echo  "<br>" . $e->getMessage();
   }
