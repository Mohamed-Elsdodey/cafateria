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
  </head>
  <body>
  <?php 
    session_start();
    require_once("../view/layouts/navbar.php"); 

?>
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


   <div class="container">
  <div class="row ">
<div class="col-md-4">

<div class="card mt-5">
    <div class="card-body ">
<form action="" class="row">

   <div class="col-md-8">
        <select name="userid" class="form-select" aria-label="Default select example">
   <?php
       require_once("../model/db.php");

        $newdb= new database("cafateria");
    //  $conn=$newdb->getdbconnection();
      $cont=$newdb-> getalluser("personal");

      ?>
          <option selected>Filter By User</option>

          <?php
       foreach($cont as $key=>$row)
       {?>

  <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
  <?php
   }
  ?>
        </select>
        </div>

        <div class="col-md-2">
        <button class="btn btn-info" type="submit">Filter</button>

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
 ?>
 <div class="container my-4">


<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Open</th>
      <th scope="col">Close</th>

      <th scope="col">Total Amount</th>
    </tr>
  </thead>
  <tbody>
<?php


try {
    
  require_once("../model/order.php");
  $newdb= new orderdatabase("cafateria");
    $conn=$newdb->getdbconnection();
   $cont=$newdb-> getordersorderbyuserbydatefilter($from_date,$to_date);
   foreach($cont as $key=>$row)
   {
       ?>
       <tr>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo "<button datefrom='".$from_date."' dateto='".$to_date."' mohamed='".$row['user_id']."'  type='button' class='btn btn-success openfromfilter'>open</button>" ?></td>
      <td><?php    echo "<button  type='button' class='btn btn-danger close1'>close</button>" 
           ?></td>
     
      <td><?php echo $row['final']." "."LE"; ?></td>
   </tr>
      <?php

   }








}


catch(PDOException $e)
{
    echo "<br>" . $e->getMessage();
}
?>

</tbody>
</table>
<div class="container">
<div class="container">

<div class="container">

<div id="demo">

    </div>
    <div class="container">
<div class="container">

<div class="container">
    <div id="demo2">
    </div>
    </div>
    </div>
</div>
    </div>
    </div>
    </div>
</div>
<?php

}
else if(isset($_GET['userid']))
{
  $userid=$_GET['userid'];

  ?>
  <div class="container my-4">
 
 
 <table class="table">
   <thead>
     <tr>
       <th scope="col">Name</th>
       <th scope="col">Open</th>
       <th scope="col">Close</th>

       <th scope="col">Total Amount</th>
     </tr>
   </thead>
   <tbody>
 <?php
 
 
 try {
     
   require_once("../model/order.php");
   $newdb= new orderdatabase("cafateria");
     $conn=$newdb->getdbconnection();
    $cont=$newdb-> getordersorderbyuserbyuserfilter($userid);
    
    foreach($cont as $key=>$row)
    {
        ?>
        <tr>
       <td><?php echo $row['name']; ?></td>
       <td><?php echo "<button mohamed='".$row['user_id']."'  type='button' class='btn btn-success openn'>open</button>" ?></td>
       <td><?php    echo "<button  type='button' class='btn btn-danger close1'>close</button>" 
           ?></td>
       <td><?php echo $row['final']." "."LE"; ?></td>
    </tr>
       <?php

    }
    ?>

    </tbody>
    </table>
    <div class="container">
    <div class="container">
    
    <div class="container">
    
    <div id="demo">
    
        </div>
        <div class="container">
    <div class="container">
    
    <div class="container">
        <div id="demo2">
        </div>
        </div>
        </div>
    </div>
        </div>
        </div>
        </div>
    </div>
    <?php


 }

  
 catch(PDOException $e)
      {
          echo "<br>" . $e->getMessage();
      }
    }

else 
{
  ?>

<div class="container my-4">


<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Open</th>
      <th scope="col">Close</th>

      <th scope="col">Total Amount</th>
    </tr>
  </thead>
  <tbody>
   <?php

 try {
    
    require_once("../model/order.php");
    $newdb= new orderdatabase("cafateria");
      $conn=$newdb->getdbconnection();
     $cont=$newdb-> getordersorderbyuser();
     foreach($cont as $key=>$row)
     {
         ?>
         <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo "<button mohamed='".$row['user_id']."'  type='button' class='btn btn-success openn'>open</button>" ?></td>
        <td><?php    echo "<button  type='button' class='btn btn-danger close1'>close</button>" 
           ?></td>
        <td><?php echo $row['final']." "."LE"; ?></td>
     </tr>
        <?php

     }
 }

  
 catch(PDOException $e)
      {
          echo "<br>" . $e->getMessage();
      }



?>

  </tbody>
</table>
<div class="container">
<div class="container">

<div class="container">

<div id="demo">

    </div>
    <div class="container">
<div class="container">

<div class="container">
    <div id="demo2">
    </div>
    </div>
    </div>
</div>



    </div>


    </div>
    </div>

</div>

<?php
}
?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 
    <script>


$(".openfromfilter").click(function(e){ 
        e.preventDefault();
  var id=$(this).attr("mohamed");
  var datefrom=$(this).attr("datefrom");
  var dateto=$(this).attr("dateto");

        $.ajax({
            type: 'GET',
            url: "filterorder.php",
            data: { id: id,datefrom:datefrom,dateto:dateto },
            datatype: "html",
            success: function (data){
          
          var cartona=`
          
<table class="table my-4">
  <thead>
    <tr>
      <th scope="col">Order Date</th>
      <th scope="col">open</th>
      <th scope="col">Status</th>
      <th scope="col">Amount</th>
      
    </tr>
  </thead>
  <tbody>
       ${data}   
     </tbody>
     </table>     
          
          
          `;



          $("#demo").html(cartona);
          $("#demo2").html("");


            }
            
            
        });
 });


$(".openn").click(function(e){ 
        e.preventDefault();
  var id=$(this).attr("mohamed");

        $.ajax({
            type: 'GET',
            url: "ajaxuser.php",
            data: { id: id },
       
            datatype: "html",
            
            success: function (data){
          
          var cartona=`
          
<table class="table my-4">
  <thead>
    <tr>
      <th scope="col">Order Date</th>
      <th scope="col">open</th>
      <th scope="col">Status</th>
      <th scope="col">Amount</th>
      
    </tr>
  </thead>
  <tbody>
       ${data}   
     </tbody>
     </table>     
          
          
          `;



          $("#demo").html(cartona);
          $("#demo2").html("");


            }
            
            
        });
 });

function show(e)
{
    //    e.preventDefault();
  var id=$(e).attr("mohamed");
        $.ajax({
            type: 'GET',
            url: "data.php",
            data: { id: id},

            datatype: "html",
            
            success: function (data){
          $("#demo2").html(data);


            }
            
            
        });







   
}

 $(".open").click(function(e){ 
        e.preventDefault();
  var id=$(this).attr("mohamed");
        $.ajax({
            type: 'GET',
            url: "data.php",
            data: { id: 2},

            datatype: "html",
            
            success: function (data){
          
          $("#demo2").html(data);


            }
            
            
        });
 });


 $(".close1").click(function(e){
  $("#demo").html("");
  $("#demo2").html("");

 });








   </script>

</body>
</html>
