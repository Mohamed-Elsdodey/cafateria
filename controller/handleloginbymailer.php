<?php
echo "hello<br>";
$password=$_POST['password'];
session_start();
echo $_SESSION['emailverify']."<br>";
echo $password;
$email=$_SESSION['emailverify'];
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
   header('Location: ../view/catchkeyfrommailer.php');
   
   
   }