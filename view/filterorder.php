<?php
$servername = "localhost";
$username = "root";
$password = "";
$id=$_GET['id'];
$datefrom=$_GET['datefrom'];
$dateto=$_GET['dateto'];

// Create connection
$conn = new mysqli($servername, $username, $password,"cafateria");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 



$result=$conn->query("select orders.id, orders.totalprice,orders.orderdate ,orders.status from orders where user_id=$id AND orders.orderdate BETWEEN '$datefrom' AND '$dateto'");

while($data=$result -> fetch_assoc())
{
?>

 <tr>
<td class="open" mohamed="<?php echo $data['id'] ?>" ><?php echo $data['orderdate']; ?></td>
<td><?php    echo "<button onclick='show(this)' mohamed='".$data['id']."'  type='button' class='btn btn-danger open'>open</button>" 
         ?></td>


<td><?php echo $data['status']; ?></td>
<td><?php  echo $data['totalprice']." "." "."EGP"; ?></td>
</tr>
<?php
}

?>