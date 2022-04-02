<?php

class database
{

private $dpname="cafateria";
private $host="localhost";
private $user="root";
private $pass="";
public $conn;

 
   function __construct($dbname)
   {

    $this->dpname=$dbname;
    $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dpname",$this->user, $this->pass);
   $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
    }
    catch(PDOException $e)
    {
        "<br>" . $e->getMessage();
    }
   }

 function getdbconnection()
 {
return $this->conn;

 }




function getalluser($tablename)
{
$sql=" SELECT id,name, email, password, roomnumber, exite,imgurl FROM users";
$data=$this->conn->prepare( $sql);
$data->execute();
$cont=[];
$cont=$data->fetchAll();
return $cont;
}

function adduser($name,$email,$password,$roomnumber,$exit,$imgurl)
{

  $sql="INSERT INTO users (name,email,password,roomnumber,exite,imgurl)
  VALUES (?,?,?,?,?,?)";
  $stmt=$this->conn->prepare($sql);
  $stmt->execute([$name,$email,$password,$roomnumber,$exit,$imgurl]);
  header('Location: ../view/showusers.php'); 
}

function updateuser($name,$email,$password,$roomnumber,$exit,$imgurl,$id)
{

  $sql="UPDATE users SET name=?,email=?,password=?,roomnumber=?,exite=?,imgurl=? WHERE id=?";
  $stmt=$this->conn->prepare($sql);
  $stmt->execute([$name,$email,$password,$roomnumber,$exit,$imgurl,$id]);
    echo "New record created successfully";
    header('Location: ../view/showusers.php');
}




function deleteuser($id)
{$sql="DELETE FROM users WHERE id=?";
  $stmt=$this->conn->prepare($sql);
  $stmt->execute([$id]);
 

    echo "New record created successfully";
    header('Location: ../view/showusers.php');

    
}

function getuserbyid($id)
{
  $sql=" SELECT id,name, email, password, roomnumber, exite,imgurl,is_admin FROM users WHERE id=?";
  $data=$this->conn->prepare( $sql);
$data->execute([$id]);
$cont=[];
$cont=$data->fetchAll();
return $cont;
}



}



