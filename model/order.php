

<?php

class orderdatabase
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
        "<br>" . $e->getMessage();
    }
   }

 function getdbconnection()
 {
return $this->conn;

 }


function addorder($id,$notes,$roomnumber,$productid,$productcount,$pricecountproduct,$totalprice)
{
  
  $sql="INSERT INTO orders (user_id,notes,totalprice)
  VALUES (?,?,?)";
  $stmt=$this->conn->prepare($sql);
 $stmt->execute([$id,$notes,$totalprice]);

 // SELECT MAX(id) FROM orders


 $sql=" SELECT MAX(id) FROM orders";
  $data=$this->conn->prepare( $sql);
$data->execute([$id]);
$cont=[];
$cont=$data->fetchAll();
$orderid;
foreach($cont as $key=>$row)
    {
      $orderid= $row['MAX(id)'];

    }
echo $orderid;
echo count($productid);
 for($i=0;$i<count($productid);$i++)
 {
    echo $orderid;

    $sql="INSERT INTO order_products (order_id,product_id,productcount,pricecountproduct)
    VALUES (?,?,?,?)";
    $stmt=$this->conn->prepare($sql);
    $stmt->execute([$orderid,$productid[$i],$productcount[$i],$pricecountproduct[$i]]);
  }


  header('Location: ../view/myhome.php');


}

 
function get($id)
{
  //$productorder=

//qury to select order product where order_id=$id
//if(productorder)
//return responsjson

//[
 // 'status'=>true,


 //  'data'=>$productorder


//]





}
function deleteorder($id)
{

  $sql="DELETE FROM order_products WHERE order_id=?";
  $stmt=$this->conn->prepare($sql);
  $stmt->execute([$id]);
  $sql="DELETE FROM orders WHERE id=?";
  $stmt=$this->conn->prepare($sql);
  $stmt->execute([$id]);
  header('Location: ../view/myorders.php'); 


}


function getorderforuser($id)
{

$sql="select orders.id, orders.totalprice,orders.orderdate ,orders.status from orders where user_id=?";
$data=$this->conn->prepare( $sql);
$data->execute([$id]);
$cont=[];
$cont=$data->fetchAll();
return $cont;
}

function getordersorderbyuserbyuserfilter($id)
   {
    $sql="SELECT orders.`user_id`,users.name ,sum(orders.totalprice) AS final
  FROM orders JOIN users
  on orders.user_id=users.id
  WHERE orders.user_id=?
  GROUP BY orders.`user_id`";
 $data=$this->conn->prepare( $sql);
 $data->execute([$id]);
 $cont=[];
 $cont=$data->fetchAll();
 return $cont;
 
   }



function getorderforuserbyfilter($id,$from_date,$to_date)
{
  $sql="select orders.id, orders.totalprice,orders.orderdate ,orders.status from orders where user_id=? AND `orderdate`  BETWEEN ? AND ?";
  $data=$this->conn->prepare( $sql);
$data->execute([$id,$from_date,$to_date]);
$cont=[];
$cont=$data->fetchAll();
return $cont;


}

function getordersorderbyuserbydatefilter($from_date,$to_date)
{
  $sql="SELECT orders.`user_id`,users.name ,sum(orders.totalprice) AS final
  FROM orders JOIN users
  on orders.user_id=users.id
  WHERE orders.orderdate BETWEEN ? AND ?
  GROUP BY orders.`user_id`";
 $data=$this->conn->prepare( $sql);
 $data->execute([$from_date,$to_date]);
 $cont=[];
 $cont=$data->fetchAll();
 return $cont;
 


}





function getordersorderbyuser()
{
  $sql="SELECT orders.`user_id`,users.name ,sum(orders.totalprice) AS final
  FROM orders JOIN users
  on orders.user_id=users.id
  GROUP BY orders.`user_id`";
  $data=$this->conn->prepare( $sql);
  $data->execute([]);
  $cont=[];
  $cont=$data->fetchAll();
  return $cont;



}






function ubdatestatus($id,$status)
{

  $sql="UPDATE orders SET status=? WHERE id=?";
  $stmt=$this->conn->prepare($sql);
  $stmt->execute([$status,$id]);
    echo "New record created successfully";
    header('Location: ../view/orders.php');




}
function getallorder()
{





  $sql="SELECT users.name,orders.totalprice,orders.orderdate,orders.id,users.roomnumber,users.exite,products.productname,products.imgurl,orders.status,order_products.pricecountproduct,order_products.productcount
  FROM orders JOIN order_products JOIN users JOIN products
  ON 
  orders.id=order_products.order_id AND
  users.id=orders.user_id AND 
  order_products.product_id=products.id
  ";
  $data=$this->conn->prepare( $sql);
$data->execute();
$cont=[];
$cont=$data->fetchAll();
return $cont;


}




}










