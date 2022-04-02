<?php
$servername = "localhost";
$username = "root";
$password = "";
$id=$_GET['id'];
// Create connection
$conn = new mysqli($servername, $username, $password,"cafateria");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 



$result=$conn->query("SELECT users.name,orders.totalprice,orders.orderdate,orders.id,users.roomnumber,users.exite,products.productname,products.imgurl,orders.status,order_products.pricecountproduct,order_products.productcount
FROM orders JOIN order_products JOIN users JOIN products
ON 
orders.id=order_products.order_id AND
users.id=orders.user_id AND 
order_products.product_id=products.id
WHERE orders.id=$id");
while($data=$result -> fetch_assoc())
{
?>
 <div style="float:left;width:25%;" class="w-25 mt-2  text-center" >
     <h1 class="text-center"  ><?php echo $data['productcount'] ." ".$data['productname'] ; ?></h1>
     <img    src="../imgs/products/<?php echo $data['imgurl'];?>" style="width:60%;" height="100px" class="m-auto" >
    <h1 class="text-center"  ><?php echo $data['pricecountproduct'] ." LE" ?></h1>


  </div>
<?php
}

?>