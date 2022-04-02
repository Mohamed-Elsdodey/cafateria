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
    
    <title>my home</title>
  </head>
  <body>

   <?php 
   $counter=0;
   session_start();
   require_once("../view/layouts/navbar.php"); 
   require_once("../model/product.php");
   require_once("../model/db.php");


   $id=$_SESSION['id'];
   ?>
   

  <div class="container my-4">
<div class="row">

<div class="col-md-4">

<form method="post" action="../controller/handleorder.php">
  <?php
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
        $counter=1;
    
   ?>
   <select name="id" class="form-select my-4 " aria-label="Default select example">
     <?php
   $newdb= new database("cafateria");
    //  $conn=$newdb->getdbconnection();
      $cont=$newdb-> getalluser("personal");
  ?>
      <option selected>Select user</option>
<?php
       foreach($cont as $key=>$row)
       {?>

  <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
  <?php
   }
  ?>
</select>

<?php


          }


        }


      }
  ?>
  <?php if($counter==0){
?>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<?php
 }    ?>

 <div id="order" >
</div>
<div class="form-floating">
  <textarea class="form-control" name="notes"  placeholder="Leave a comment here" id="floatingTextarea"></textarea>
  <label for="floatingTextarea">Notes</label>
</div>
<hr>
<span class="h1">EGP<span><input type="number" name="totalprice" style="width: 100px;display:inline-block;font-size: 30px;" id="totalprice" value=0 class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" readonly >
<br><br>
<?php
  $newdb= new database("cafateria");
  $conn=$newdb->getdbconnection();
  $cont=$newdb-> getuserbyid($id);
  ?>

  <select class="form-select" name="roomnumber" aria-label="Default select example">
 
  

<?php
  foreach($cont as $key=>$row)
    {
      ?>
      <option value="<?php echo $row['roomnumber']; ?>"><?php echo $row['roomnumber']; ?></option> 
      <?php
    }

?>
</select>
  <button type="submit" class="btn btn-primary my-3 float-right">Confirm</button>
</form>
</div>
<div class="offset-md-2 col-md-6">
<div class="col-md-12">
    <h2>lates orders</h2>
    <div id="latesorder" class="row lates-orders">
        

  </div>
</div>
<hr>
<div class="col-md-12">
 <?php
      $newdb= new productdatabase("cafateria");
      $conn=$newdb->getdbconnection();
      $cont=$newdb-> getallproduct("personal");
?>
     <div class="row" >
         <?php
       foreach($cont as $key=>$row)
       {
         if($row['availabilty']=="available")
         {
         ?>
      <div class="col-md-3">
          <h3 class="text-center"><?php echo $row['productname']." ";?></h3>
      <img id="<?php echo $row['id'];?>" value="<?php echo $row['productprice']; ?>" alt="<?php echo $row['productname'] ?>" src="../imgs/products/<?php echo $row['imgurl'];?>" style="d" height="100px" class="products w-100" >
      <h3 class="text-center"><?php echo $row['productprice']." ";?>LE<h3>
       </div>
     <?php
       }
      }
       ?>

    </div>

</div>


</div>

</div>
        

 </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
    
    
    var totalprice=0;
    var products=[];
     var allprice=[];
$(".products").click(function(e){

if(!products.includes($(this).attr("id")))
{
   
  var id= $(this).attr("id");
  $id=$(this).attr("id");
  products.push(id);
  var imgurl=$(this).attr("src");
  var productprice=$(this).attr("value");
  const name=$(this).attr("alt");
  allprice[name]=Number(productprice);
  var product=`<div class="col-md-3">
   <h3 class="text-center">${name}<h3>          
  <img id="${id}" src="${imgurl}" style="display: inline-block;" height="100px" class="w-100" >
  <div>`;
  $("#latesorder").append(product);
var space=" ";
const named=name;
product=`<input type="text" name="productname[]"  style="width: 100px;display:inline-block;font-size: 30px;"  value=${named} class="form-control " readonly  >      <input placeholder="${name}" name="productcount[]" type="number" min=1 style="width: 60px;display:inline-block ;font-size: 30px;" alt="${productprice}" value=1  onclick="convert(this,this.value)" class="form-control catched" i aria-describedby="emailHelp">
<input type="number" name="productprice[]"  id="${name}"  style="width: 80px;display:inline-block ;font-size: 30px;" value=${productprice} class="form-control"  aria-describedby="emailHelp" readonly>
 ${space}<span class="h3">LE</span><br><br>`;

  $("#order").prepend(product);
   var counter=0;
   for(var x in allprice)
   {
     counter=counter+Number(allprice[x]);
   }
   
   $("#totalprice").val(counter);

}
});
 

 function convert(x,number)
 {
   
  let link=$(x).attr("placeholder")   
  let producttprice= $(x).attr("alt");
    let finalprice=Number(producttprice)*Number(number);
    $("#"+link).val(Number(finalprice));
    allprice[link]=finalprice;
    var counter=0;
   for(var x in allprice)
   {
     counter=counter+Number(allprice[x]);
   }
   
   $("#totalprice").val(counter);

 }
    
    
    
    
    
    
    </script>
  </body>
</html>