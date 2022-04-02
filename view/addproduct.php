<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/addproduct.css">
    <title>Add Product</title>
  </head>
  <body>


  <?php 
session_start();
require_once "./layouts/navbar.php";
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
  

    <div class="mg">
  <section class="container-fluid  ">
     <section class="row d-flex  ">
        
       <section class="col-12 col-sm-6 col-md-3  ">

                <form class="form-container " method="post" action="../controller/handleproduct.php" enctype="multipart/form-data">
                    <div class="addproduct">
                        <h1 >Add Product</h1>

                    </div>
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="productname"  id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your product with anyone else.</div>
                    </div>
                    
                    <?php

if(isset($_GET['errors']))
 {


   foreach(json_decode($_GET['errors']) as $key =>$val )
 {

if($key=='productname')
 {
 ?>
       <div class="alert alert-danger" role="alert">
  <?php
        echo $val; 
        ?>
        </div>
        <?php
   }


    }
  }
?>

                    <div class="mb-3">
                   <label for="formFile" class="form-label break-line">Product Price</label>
                   
                  <input class="form-control price" type="number" name="productprice"  step="0.5" name="file" id="formFile">
                  <span >EGP</span>
                   </div>
       <?php            
      
if(isset($_GET['errors']))
 {


   foreach(json_decode($_GET['errors']) as $key =>$val )
 {

if($key=='productprice')
 {
 ?>
       <div class="alert alert-danger" role="alert">
  <?php
        echo $val; 
        ?>
        </div>
        <?php
   }


    }
  }
?>


                   <select class="form-select" name="productcategory" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="hotdrink">Hot Drink</option>
                    <option value="colddrink">Cold Drink</option>
                    <option value="3">Three</option>
                    </select>
                   
   <?php
if(isset($_GET['errors']))
 {


   foreach(json_decode($_GET['errors']) as $key =>$val )
 {

if($key=='productcategory')
 {
 ?>
       <div class="alert alert-danger" role="alert">
  <?php
        echo $val; 
        ?>
        </div>
        <?php
   }


    }
  }
?>


                    <div class="my-3">
                   <label for="formFile" class="form-label">Product Picture</label>
                  <input class="form-control" type="file" name="file" id="formFile">
                   </div>
                   

                   <?php
if(isset($_GET['errors']))
 {


   foreach(json_decode($_GET['errors']) as $key =>$val )
 {

if($key=='imgurl')
 {
 ?>
       <div class="alert alert-danger" role="alert">
  <?php
        echo $val; 
        ?>
        </div>
        <?php
   }


    }
  }
?>
                    
                    <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-danger btn-block">Add</button>
                </div>
                </form>

      </section>

</section>
     </section>


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