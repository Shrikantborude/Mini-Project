<?php
session_start();
include("config.php");
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$mob	=	$_POST['mob'];
$pass	=	$_POST['pass'];
$flag=0;
 $_SESSION['mob']=$mob;
 
 $result=mysqli_query($conn,"select * from customer");

while($row=mysqli_fetch_array($result)) 
{
    if($mob==$row['mob'] && $pass==$row['pass'])
         {
                  $flag=1;
                  break;
         }   

}

if($flag==1)
{
    header("location:Room.html");
  
}
else
{
    header("location:Login.html");

}
?>