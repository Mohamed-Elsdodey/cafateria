<?php
$id=(int)$_POST['id'];
$notes=$_POST['notes'];
$roomnumber=$_POST['roomnumber'];
$totalprice=$_POST['totalprice'];
$productname=[];
$productcount=[];
$pricecountproduct=[];
$productid=[];

foreach($_POST['productname'] as $k => $v) {
    array_push($productname,$v);
}
foreach($_POST['productcount'] as $k => $v) {
    
    array_push($productcount,(int)$v);
}
foreach($_POST['productprice'] as $k => $v) {
    array_push($pricecountproduct,(float)$v);
}

require_once("../model/product.php");
    $newdb= new productdatabase("cafateria");
    //  $conn=$newdb->getdbconnection();
      $cont=$newdb-> getallproduct("personal");
foreach($productname as $val)
{   
       foreach($cont as $key=>$row)
       {
         if($val==$row['productname'])
            {
             array_push($productid,(int)$row['id']);
            }

       }


}







require_once("../model/order.php");
try {
   $newdb= new orderdatabase("cafateria");
      $conn=$newdb->getdbconnection();
     $newdb->addorder($id,$notes,$roomnumber,$productid,$productcount,$pricecountproduct,$totalprice);
    }
catch(PDOException $e)
    {
        echo  "<br>" . $e->getMessage();
    }
