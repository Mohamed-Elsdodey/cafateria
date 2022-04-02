<?php


$error=[];
$oldvalue=[];

if($_POST['name'] ==null )
{
 
    $error['name']=" name is required";
    
}
else
{
    $oldvalue['name']=$_POST['name'];
}





if($_POST['email'] ==null || $_POST['email'] =="" )
{
    
    $error['email']="email is required";
  
}

else
{
    $oldvalue['email']=$_POST['email'];
}



if($_POST['password'] ==null)
{
 
    $error['password']="password is required";
  
}
else
{

    if($_POST['password'] ==null)
    {
        $error['confirmpassword']="confirm password is required";  
    }

    else
    {
     if($_POST['password']==$_POST['confirmpassword'])
      {
        $oldvalue['password']=$_POST['password'];
        $oldvalue['confirmpassword']=$_POST['confirmpassword'];

      }

      else
      {
        $error['confirmpassword']=" password not matched";  

        $oldvalue['password']=$_POST['password'];
        $oldvalue['confirmpassword']=$_POST['confirmpassword'];

      }



    }

}







if($_POST['roomnumber'] ==null)
{
 
    $error['roomnumber']="roomnumber  is required";
  
}
else
{
    $oldvalue['roomnumber']=$_POST['roomnumber'];
}


if($_POST['exit'] ==null)
{
 
    $error['exit']="exit  is required";
  
}
else
{
    $oldvalue['exit']=$_POST['exit'];
}












if(sizeof($error)>0)
{

    if(sizeof($oldvalue)>0) 
    {   
    header('Location: ../view/register.php?errors='.json_encode($error)."&oldvalue=".json_encode($oldvalue));
   

    echo print_r($error);
    }

    else
    {
        header('Location: ../view/register.php?errors='.json_encode($error));

    }

    
}
else
{


    $name=$_POST['name'];
     $email=$_POST['email'];
     $password=$_POST['password'];
     $roomnumber=$_POST['roomnumber'];
     $exit=$_POST['exit'];
     $imgurl;
     if(isset($_FILES['file']))
           {
           $img="../imgs/users/".$_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'] ,$img);
      $imgurl=$_FILES['file']['name'];
           


    require_once("../model/db.php");
      $newdb= new database("cafateria");
       $pdo=$newdb->getdbconnection();
     $newdb->adduser($name,$email,$password,$roomnumber,$exit,$imgurl);
           }

}


?>



