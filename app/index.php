<?php
session_start();
$password;
$email=$_POST['email'];


require_once("../model/db.php");
 $newdb= new database("cafateria");
  $pdo=$newdb->getdbconnection();
  $cont=$newdb-> getalluser("users");

$counter=0;
var_dump($cont);

foreach($cont as $key=>$row)
  {      

   if($email==$row['email']  )
   {
   $counter=$counter+1;
  $password=$row['password'];
   }
   }
if($counter==0)
{
    header('Location: ../view/verify.php');
 
}
else
{

    $_SESSION['emailverify']=$email;
require_once "mail.php";
$mail->setFrom('cafateriaelsdodey@gmail.com', 'cafateria elsdodey menofia');
$mail->addAddress($email);               //Name is optional
$mail->Subject = 'رمز تاكيد حسابك علي كافتريا السدودي دوله القادة';

$mail->Body    = $password;
$mail->send();
header('Location: ../view/catchkeyfrommailer.php'); 

}

?>