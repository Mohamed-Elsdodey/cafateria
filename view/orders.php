<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
  <body>
   <?php
session_start();
require_once("../view/layouts/navbar.php");
if(isset($_SESSION['loged']))
{
$id=$_SESSION['id'];
$newdb= new database("cafateria");
 $pdo=$newdb->getdbconnection();
    $cont=$newdb-> getuserbyid($id);

    foreach($cont as $key=>$row)
    {
       if($row['is_admin']==1)
       {


?>

<div class="container">
 
 <h1 class="mt-3" >Orders</h1>




<?php

try {
    
  require_once("../model/order.php");
  $newdb= new orderdatabase("cafateria");
    $conn=$newdb->getdbconnection();
   $cont=$newdb-> getallorder();
    
  $name="";
  $orderdate;
  $counter=0;
  $totalprice;
  foreach($cont as $key=>$row)
  {
  if($row['name']==$name && $row['orderdate']==$orderdate)
  {


  ?>
 
 <div style="float:left;width:25%;" class="w-25 mt-2 text-center" >
<h1 class="text-center"  ><?php echo $row['productcount'] ." ".$row['productname'] ; ?></h1>
    <img    src="../imgs/products/<?php echo $row['imgurl'];?>" style="width:60%;" height="100px" class="" >
    <h1 class="text-center"  ><?php echo $row['pricecountproduct'] ." LE" ?></h1>


  </div>



<?php




  }
  else
  {
$name=$row['name'];
$orderdate=$row['orderdate'];

if($counter>0)
{
  ?>
 <br>
 <div style="clear:both">
</div>
<br>
 <div class="bg-info my-2" style="float:right ;width:350px;">
 <h1><?php echo "total price ". $totalprice ." "."LE";?><h1>
</div>

<?php
}
$counter++;
$totalprice=$row['totalprice']
?>

<table class="table">
<thead>
  <tr>
    <th scope="col">Order Date</th>
    <th scope="col">Name</th>
    <th scope="col">Room</th>
    <th scope="col">Ext</th>
    <th scope="col">Action</th>
    

  </tr>
</thead>
<tbody>

<tr>
<td><?php echo $row['orderdate']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['roomnumber']; ?></td>
<td><?php echo $row['exite']; ?></td>
<td>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
  <?php echo $row['status']; ?>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="../controller/actionorder.php?id= <?php echo $row['id']; ?>&status=processing">Processing</a></li>
    <li><a class="dropdown-item" href="../controller/actionorder.php?id= <?php echo $row['id']; ?>&status=Out to Delivery">Out to Delivery</a></li>
    <li><a class="dropdown-item" href="../controller/actionorder.php?id= <?php echo $row['id']; ?>&status=Done">Done</a></li>
  </ul>
</div>
</td>
  </tr>

  </tbody>
     </table>
   
     <div style="float:left;width:25%;" class="w-25 mt-2  text-center" >
     <h1 class="text-center"  ><?php echo $row['productcount'] ." ".$row['productname'] ; ?></h1>
     <img    src="../imgs/products/<?php echo $row['imgurl'];?>" style="width:60%;" height="100px" class="m-auto" >
    <h1 class="text-center"  ><?php echo $row['pricecountproduct'] ." LE" ?></h1>


  </div>


  <div>
<?php
  }

  }
     ?>
     </div>
     
     <br>
 <div style="clear:both">
</div>
<br>
 <div class="bg-info my-2" style="float:right ;width:350px;">
 <h1><?php echo "total price ". $totalprice ." "."LE";?><h1>
</div>
        
<?php       
  }
  catch(PDOException $e)
      {
          echo "<br>" . $e->getMessage();
      }
      ?>

</div>
<?php
}
      else
      header('Location: ../view/login.php');
    }}
 ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>























