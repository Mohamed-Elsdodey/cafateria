<?php
if(isset($_POST['login']))
{

    $error=[];
    $oldvalue=[];
    
    if($_POST['email'] ==null )
    {
        $error['email']=" email is required";
    }
    else
    {
        $oldvalue['email']=$_POST['email'];
    }

    
    
    if($_POST['password'] ==null )
    {
        $error['password']=" password is required";
        
    }
    else
    {
        $oldvalue['password']=$_POST['password'];
    }
    
if(sizeof($error)>0)
{

    if(sizeof($oldvalue)>0) 
    {  
        echo "hello"; 
    header('Location: ../view/login.php?errors='.json_encode($error)."&oldvalue=".json_encode($oldvalue));
   

    echo print_r($error);
    }

    else
    {
      header('Location: ../view/login.php?errors='.json_encode($error));

    }

    
}
else
{
echo "hello";



$email=$_POST['email'];
$password=$_POST['password'];

 


require_once("../model/db.php");
 $newdb= new database("cafateria");
  $pdo=$newdb->getdbconnection();
  $cont=$newdb-> getalluser("users");
$id;
$count=0;
var_dump($cont);
  foreach($cont as $key=>$row)
  {      

   if($email==$row['email'] && $password==$row['password'] )
   {
   $count=1;
   $id=$row['id'];
   }
   }
   if($count==1)
   {
   session_start();
   $_SESSION['email']= $email;
   $_SESSION['password']= $password;
   $_SESSION['loged']= "loged";
   $_SESSION['id']=$id;
   header('Location: ../view/myhome.php');
   echo $count;
   echo "<br>";
   
   
   }
   
   if($count!=1)
   {
   header('Location: ../view/login.php');
   
   
   }



 }



    }






        
    


            
