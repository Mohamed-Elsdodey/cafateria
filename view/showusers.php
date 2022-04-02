
<?php 
session_start();
if(isset($_SESSION['loged']))
{


$id=$_SESSION['id'];

?>




<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  </head>
  <body>
  <?php 
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
      <th scope="col"> Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Exit</th>
      <th scope="col">Room Number</th>
      <th scope="col">Image</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

  <?php
 
  try {
      
    require_once("../model/db.php");
    $newdb= new database("cafateria");
    //  $conn=$newdb->getdbconnection();
      $cont=$newdb-> getalluser("personal");
  
     
       foreach($cont as $key=>$row)
       {
      
       
         ?>
         <tr>
         <th scope="row"><?php echo $row['id']; ?></th>
         
         <td><?php echo $row['name']; ?></td>
         <td><?php echo $row['email']; ?></td>
         <td><?php echo $row['password']; ?></td>
         <td><?php echo $row['exite']; ?></td>
         <td><?php echo $row['roomnumber']; ?></td>
         <td><img src="../imgs/users/<?php echo $row['imgurl'];?>" width="80px" height="80px"></td>

         <td> <a class="btn btn-success" href="../controller/updateuser.php?id=<?php echo $row['id']; ?>">update</a> </td>
         <td> <a class="btn btn-danger" href="../controller/deleteuser.php?id=<?php echo $row['id']; ?>">Delete</a>  </td>
       
       </tr>
       
       
       <?php
       
        }
     
       ?>
       </tbody>
       </table>
       <a class="btn btn-info" href="register.php">add</a> 

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


<?php
}
else
{
  header('Location: ../view/login.php');

}




















