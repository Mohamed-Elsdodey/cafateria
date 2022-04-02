<?php 
$id=$_GET['id'];
$status=$_GET['status'];
echo $id."<br>".$status;
require_once("../model/order.php");
try {
     $newdb= new orderdatabase("cafateria");
     $conn=$newdb->getdbconnection();
     $newdb->ubdatestatus($id,$status);
    }
    catch(PDOException $e)
   {
        echo  "<br>" . $e->getMessage();
   }


   
   
?>
