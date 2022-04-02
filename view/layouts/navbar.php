
<?php require_once("../model/db.php");
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Cafateria</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="myhome.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="myorders.php">Myorders</a>
        </li>

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
?>

        <li class="nav-item">
        <a class="nav-link" href="../view/showproduct.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../view/showusers.php">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="myhome.php">Manual Order</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../view/checks.php">Checks</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../view/orders.php">Orders</a>
      </li>
<?php

       }
    }
  }
?>
    

      
      
      </ul>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Log Out
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../controller/logout.php">Log Out</a></li>
          </ul>
        </li>
      <form class="d-flex">
          
<?php

if(isset($_SESSION['loged']))
{


$id=$_SESSION['id'];

$newdb= new database("cafateria");
// $conn=$newdb->getdbconnection();
  $cont=$newdb-> getuserbyid($id);

  foreach($cont as $key=>$row)
  {

  ?>




      <img src="../imgs/users/<?php echo $row['imgurl'] ?>"  class="rounded-circle mx-3" width="50px" height="50px" alt="...">
      <h1 class="mx-4"><?php echo $row['name']  ?></h1>
      <?php
  }
}
else
{
  header('Location: ../view/login.php');

}
?>
      </form>
    </div>
  </div>
</nav>