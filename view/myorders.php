<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>my orders</title>
  </head>
  <body>
  <?php
session_start();
$id=$_SESSION['id'];
$finalprice=0;
require_once("../view/layouts/navbar.php");
?>
<div class="container">
<h1 class="my-2">My Orders</h1>
 
<div class="container">
  <div class="row justify-content-center">
<div class="col-md-12">

<div class="card mt-5">
    <div class="card-body">
 
        <form action="" method="get">
        
            <div class="row">
  <div class="col-md-4">
 <div class="form-group">
 <label >From Date</label>
 <br>
<input type="date" name="from_date" class="form-control">
 </div>
  </div>
   
  <div class="col-md-4">
    <div class="form-group">
    <label >From Date</label>
    <br>
   <input type="date" name="to_date" class="form-control">
    </div>
     </div>


     <div class="col-md-4">
        <div class="form-group">
        <label >Filter</label>
        <br>
        <button type="submit" class="btn btn-info">filter</button>
        </div>      
            </div>
        </form>
    </div>
</div>
</div>
  </div>
   </div>
   <?php 
if(isset($_GET['from_date'] )&& isset( $_GET['to_date']))

{
 $from_date=$_GET['from_date'];
 $to_date=$_GET['to_date'];
 echo $from_date."<br>".$to_date."<br>";
  ?>
  <table class="table my-4">
    <thead>
      <tr>
        <th scope="col">Order Date</th>
        <th scope="col">open</th>
        <th scope="col">close</th>
        <th scope="col">Status</th>
        <th scope="col">Amount</th>
        <th scope="col">Action</th>
        
      </tr>
    </thead>
    <tbody>
    <?php
  try {
      
      require_once("../model/order.php");
      $newdb= new orderdatabase("cafateria");
        $conn=$newdb->getdbconnection();
       $cont=$newdb-> getorderforuserbyfilter($id,$from_date,$to_date);



       foreach($cont as $key=>$row)
       {
        $finalprice=$finalprice+(int)$row['totalprice'];
         ?>
  <tr> 
  
  <td class="open" mohamed="<?php echo $row['id'] ?>" ><?php echo $row['orderdate']; ?></td>
  <td><?php    echo "<button mohamed='".$row['id']."'  type='button' class='btn btn-success open'>open</button>" 
           ?></td>
   <td><?php    echo "<button  type='button' class='btn btn-success close'>close</button>" 
           ?></td>
  
  <td><?php echo $row['status']; ?></td>
  <td><?php  echo $row['totalprice']." "." "."EGP"; ?></td>
  <td><?php if($row['status']=="processing"){?> <a href="../controller/deleteorder.php?id=<?php echo $row['id'];?>" class='btn btn-danger'>Cancel</a><?php }?></td>
  
  </tr>
  <?php
       }
       
  
  
      ?>
    </tbody>
  </table>
  <div class="container bg-success" id="demo">

    </div>
<?php
  }




  catch(PDOException $e)
  {
      echo "<br>" . $e->getMessage();
  }
  
  echo "<hr>";

  ?>
  
  <div class="container text-center">
    
  </div>
  <div class="bg-info my-2" style="float:right ;width:350px;">
   <h1><?php echo "total price ". $finalprice ." "."LE";?><h1>
  </div>
  </div>


  <?php













}
else
{
  ?>
<table class="table my-4">
  <thead>
    <tr>
      <th scope="col">Order Date</th>
      <th scope="col">open</th>
      <th scope="col">close</th>

      <th scope="col">Status</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
try {
    
    require_once("../model/order.php");
    $newdb= new orderdatabase("cafateria");
      $conn=$newdb->getdbconnection();
     $cont=$newdb-> getorderforuser($id);
     foreach($cont as $key=>$row)
     {
      $finalprice=$finalprice+(int)$row['totalprice'];
       ?>
<tr> 

<td class="open" mohamed="<?php echo $row['id'] ?>" ><?php echo $row['orderdate']; ?></td>
<td><?php    echo "<button mohamed='".$row['id']."'  type='button' class='btn btn-info open'>open</button>" 
         ?></td>
<td><?php    echo "<button  type='button' class='btn btn-success close'>close</button>" 
           ?></td>

<td><?php echo $row['status']; ?></td>
<td><?php  echo $row['totalprice']." "." "."EGP"; ?></td>
<td><?php if($row['status']=="processing"){?> <a href="../controller/deleteorder.php?id=<?php echo $row['id'];?>" class='btn btn-danger'>Cancel</a><?php }?></td>

</tr>
<?php
     }
     


    ?>
  </tbody>
</table>
<div class="container bg-success" id="demo">

    </div>
  <div style="clear:both">

    </div>
<?php

}


catch(PDOException $e)
{
    echo "<br>" . $e->getMessage();
}


echo "<hr>";

?>

<div class="container text-center">
  
</div>
<div class="bg-info my-2" style="float:right ;width:350px;">
 <h1><?php echo "total price ". $finalprice ." "."LE";?><h1>
</div>
</div>
<?php
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
 <script>

$(".open").click(function(e){ 
        e.preventDefault();
  var id=$(this).attr("mohamed");
        $.ajax({
            type: 'GET',
            url: "data.php",
            data: { id: id },

            datatype: "html",
            
            success: function (data){
          
          $("#demo").html(data);


            }
            
            
        });
 });

 $(".close").click(function(e){ 

 
          $("#demo").html("");

 });



   </script>
 
  </body>
</html>