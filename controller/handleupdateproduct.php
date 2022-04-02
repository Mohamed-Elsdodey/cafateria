<?php


$error=[];
$oldvalue=[];

if($_POST['productname'] ==null )
{
 
    $error['productname']=" productname is required";
    
}
else
{
    $oldvalue['productname']=$_POST['productname'];
}





if($_POST['productprice'] ==null || $_POST['productprice'] =="" )
{
    
    $error['productprice']="productprice is required";
  
}

else
{
    $oldvalue['productprice']=$_POST['productprice'];
}



if($_POST['productcategory'] ==null || $_POST['productcategory'] =="" )
{
    
    $error['productcategory']="productcategory is required";
  
}

else
{
    $oldvalue['productcategory']=$_POST['productcategory'];
}
if(isset($_FILES['file']))
    {

    }       
else
{
    $error['file']="image is required";
  
}


if(sizeof($error)>0)
{

    if(sizeof($oldvalue)>0) 
    {   
    header('Location: ../view/addproduct.php?errors='.json_encode($error)."&oldvalue=".json_encode($oldvalue));
   

    echo print_r($error);
    }

    else
    {
        header('Location: ../view/addproduct.php?errors='.json_encode($error));

    }

    
}
else
{


    $productname=$_POST['productname'];
     $productprice=$_POST['productprice'];
     $productcategory=$_POST['productcategory'];
     $id=$_POST['id'];
     $imgurl;
     if(isset($_FILES['file']))
           {
           $img="../imgs/products/".$_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'] ,$img);
      $imgurl=$_FILES['file']['name'];
      
      echo $imgurl;


    require_once("../model/product.php");
     $newdb= new productdatabase("cafateria");
     $pdo=$newdb->getdbconnection();
     $newdb->updateproduct($productname,$productprice,$productcategory,$imgurl,$id);
           }

}