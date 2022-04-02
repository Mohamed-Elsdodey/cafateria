<?php

$id=$_GET['id'];

require_once("../model/db.php");
echo $id;


try {
    $newdb= new database("cafateria");
      $conn=$newdb->getdbconnection();
     $newdb->deleteuser($id);

  
    
    }
catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
