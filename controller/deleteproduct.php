<?php

$id=$_GET['id'];

require_once("../model/product.php");
echo $id;


try {
    $newdb= new productdatabase("cafateria");
      $conn=$newdb->getdbconnection();
     $newdb->deleteproductbyid($id);

  
    
    }
catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
