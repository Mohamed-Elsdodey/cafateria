<?php

class productdatabase
{

private $dpname="cafateria";
private $host="localhost";
private $user="root";
private $pass="";
public $conn;

 
   function __construct($dbname)
   {

    $this->dpname=$dbname;
    $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dpname",$this->user, $this->pass);
   $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
    }
    catch(PDOException $e)
    {
      echo  "<br>" . $e->getMessage();
    }
   }

 function getdbconnection()
 {
return $this->conn;

 }

function updatavailabilty($id,$available)
{
  $sql="UPDATE products SET availabilty=? where id=?";
  $stmt=$this->conn->prepare($sql);
  $stmt->execute([$available,$id]);
  header('Location: ../view/showproduct.php'); 

}


function getallproduct($tablename)
{
$sql=" SELECT id,productname,availabilty, productprice, productcategory, imgurl FROM products";
$data=$this->conn->prepare( $sql);
$data->execute();
$cont=[];
$cont=$data->fetchAll();
return $cont;
}

function addproduct($productname,$productprice,$productcategory,$imgurl)
{

  $sql="INSERT INTO products (productname,productprice,productcategory,imgurl)
  VALUES (?,?,?,?)";
  $stmt=$this->conn->prepare($sql);
  $stmt->execute([$productname,$productprice,$productcategory,$imgurl]);
  header('Location: ../view/showproduct.php'); 
}

function updateproduct($productname,$productprice,$productcategory,$imgurl,$id)
{

  $sql="UPDATE products SET productname=?,productprice=?,productcategory=?,imgurl=? WHERE id=?";
  $stmt=$this->conn->prepare($sql);
  $stmt->execute([$productname,$productprice,$productcategory,$imgurl,$id]);
    echo "New record created successfully";
    header('Location: ../view/showproduct.php');
}



function deleteproductbyid($id)
{$sql="DELETE FROM products WHERE id=?";
  $stmt=$this->conn->prepare($sql);
  $stmt->execute([$id]);
 

    echo "New record created successfully";
    header('Location: ../view/showproduct.php');

    
}

function getproductbyid($id)
{
  $sql="SELECT id, productname, productprice, productcategory, imgurl FROM products WHERE id=?";
  $data=$this->conn->prepare( $sql);
$data->execute([$id]);
$cont=[];
$cont=$data->fetchAll();
return $cont;
}




}




