<?php
$id=$_GET['id'];
echo $id;
require_once("../model/db.php");
$newdb= new database("cafateria");
 $pdo=$newdb->getdbconnection();
    $cont=$newdb-> getuserbyid($id);

    foreach($cont as $key=>$row)
    {
        $str="id=".$row['id']."&name=".$row['name']."&email=".$row['email']."&roomnumber=".$row['roomnumber']."&exit=".$row['exite']."&password=".$row['password'];
        echo "<br>".$str;
       header('Location: ../view/updateuser.php?'.$str);
    }

    