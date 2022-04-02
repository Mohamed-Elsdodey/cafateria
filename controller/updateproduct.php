<?php
$id=$_GET['id'];
echo $id;
require_once("../model/product.php");
$newdb= new productdatabase("cafateria");
 $pdo=$newdb->getdbconnection();
    $cont=$newdb-> getproductbyid($id);

    foreach($cont as $key=>$row)
    {
        $str="id=".$row['id']."&productname=".$row['productname']."&productprice=".$row['productprice']."&productcategory=".$row['productcategory'];
        echo "<br>".$str;
        header('Location: ../view/updateproduct.php?'.$str);
    }

    