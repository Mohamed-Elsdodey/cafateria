


<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/register.css">
    <title>Add User</title>
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

                <form class="form-container "method="post" action="../controller/handleupdateuser.php" enctype="multipart/form-data">
              
                    <h1 class="m-auto text-center">Add User </h1>

<div class="mb-3">
  <label for="exampleInputEmail1" class="form-label"> name</label>
  <input type="text" value=" <?php echo $_GET['name']; ?>"  name="name"  class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
</div>       
         <?php

           if(isset($_GET['errors']))
            {
                   

              foreach(json_decode($_GET['errors']) as $key =>$val )
            {

         if($key=='name')
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
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="text" name="email" value=" <?php echo $_GET['email']; ?>" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

                                
         <?php

              if(isset($_GET['errors']))
                {


                  foreach(json_decode($_GET['errors']) as $key =>$val )
                {

              if($key=='email')
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
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" value=" <?php echo $_GET['password']; ?>"  name="password"  class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

                           
         <?php

                      if(isset($_GET['errors']))
                        {


                          foreach(json_decode($_GET['errors']) as $key =>$val )
                        {

                      if($key=='password')
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
    <label for="exampleInputPassword1" class="form-label">confirm Password</label>
    <input type="password"      value=" <?php echo $_GET['password']; ?>"  name="confirmpassword"  class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>                 
         <?php

                      if(isset($_GET['errors']))
                        {


                          foreach(json_decode($_GET['errors']) as $key =>$val )
                        {

                      if($key=='confirmpassword')
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
    <label for="exampleInputEmail1" class="form-label">Room Number</label>
    <input type="text"     value=" <?php echo $_GET['roomnumber']; ?>"      name="roomnumber"  class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
 
 
  <?php

        if(isset($_GET['errors']))
          {


            foreach(json_decode($_GET['errors']) as $key =>$val )
          {

        if($key=='roomnumber')
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
    <label for="exampleInputEmail1" class="form-label">Exit</label>
    <input type="text" name="exit" value=" <?php echo $_GET['exit']; ?>" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
     
                                
         <?php

              if(isset($_GET['errors']))
                {


                  foreach(json_decode($_GET['errors']) as $key =>$val )
                {

              if($key=='exit')
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
    <label for="formFile" class="form-label">upload your  image</label>
    <input class="form-control" type="file" name="file" id="formFile">
      </div>
      <input class="form-control" value=" <?php echo $_GET['id']; ?>" type="hidden"  name="id" id="formFile">

<div class="text-center ">
<button type="submit" class="btn btn-primary w-50 m-auto text-center my-4">Submit</button>

</div>

      

</form> 

      </section>

</section>
     </section>

<?php

}
else
header('Location: ../view/login.php');
}}
?>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>


























         
               
      