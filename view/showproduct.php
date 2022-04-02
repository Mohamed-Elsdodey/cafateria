
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
require_once "../view/layouts/navbar.php";
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
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col"> Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Category</th>
      <th scope="col">Availabity</th>

      <th scope="col">Image</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

  <?php
 
  try {
      
    require_once("../model/product.php");
    $newdb= new productdatabase("cafateria");
    //  $conn=$newdb->getdbconnection();
      $cont=$newdb-> getallproduct("personal");
  
     
       foreach($cont as $key=>$row)
       {
      
       
         ?>
         <tr>
         <th scope="row"><?php echo $row['id']; ?></th>
         
         <td><?php echo $row['productname']; ?></td>
         <td><?php echo $row['productprice']; ?></td>
         <td><?php echo $row['productcategory']; ?></td>
         <td>
         
         <div class="dropdown">
  <button class="btn <?php if($row['availabilty']=="available") echo "btn-success"; else echo "btn-danger"  ?>  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
  <?php echo $row['availabilty']; ?>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="../controller/availabilty.php?id= <?php echo $row['id']; ?>&availabilty=available">Available</a></li>
    <li><a class="dropdown-item" href="../controller/availabilty.php?id= <?php echo $row['id']; ?>&availabilty=unavailable">Unavailable</a></li>
  </ul>
</div>

         
         </td>

         <td><img src="../imgs/products/<?php echo $row['imgurl'];?>" width="80px" height="80px"></td>

         <td> <a class="btn btn-success" href="../controller/updateproduct.php?id=<?php echo $row['id']; ?>">update</a> </td>
         <td> <a class="btn btn-danger" href="../controller/deleteproduct.php?id=<?php echo $row['id']; ?>">Delete</a>  </td>
       
       </tr>
       
       
       <?php
       
        }
     
       ?>
       </tbody>
       </table>
       <a class="btn btn-info" href="../view/addproduct.php">add</a> 

       </div>
       
       
          
<?php       


    }
        
    
    catch(PDOException $e)
        {
            echo "<br>" . $e->getMessage();
        }



      }
      else
      header('Location: ../view/login.php');
    }}
        ?>












    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 
  </body>
</html>























