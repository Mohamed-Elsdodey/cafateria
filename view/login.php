<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login Form</title>
  </head>
  <body>
    <div class="mg">
  <section class="container-fluid  ">
     <section class="row d-flex  ">
        
       <section class="col-12 col-sm-6 col-md-3  ">

                <form class="form-container" method="post" action="../controller/handlelogin.php">
                    <div class="cafateria">
                        <h1 class="mg-auto w-25">cafateria</h1>

                    </div>
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" <?php if(isset($_GET['oldvalue'])){foreach(json_decode($_GET['oldvalue']) as $keyy =>$vall ){if($keyy=='email'){?>value="<?php echo $vall;}}}?>" class="form-control mb-2" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
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


                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" <?php if(isset($_GET['oldvalue'])){foreach(json_decode($_GET['oldvalue']) as $keyy =>$vall ){if($keyy=='password'){?>value="<?php echo $vall;}}}?>" class="form-control mb-2" id="exampleInputPassword1">
                  
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

 

                    </div>
                    <div class="mb-3 form-check">
                    
                    <a href="verify.php">هل نسيت كلمة السر</a>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-danger btn-block" name="login">Login</button>
                </div>
                </form>

      </section>

</section>
     </section>


</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>