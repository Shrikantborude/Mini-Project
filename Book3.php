<?php

session_start();

    $idate	=	$_POST['idate'];
	$odate	=	$_POST['odate'];
	$adult	=	$_POST['adult'];
	$child	=	$_POST['child'];
if($idate < $odate)
{
$mob=$_SESSION['mob'];
include("config.php");
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$flag=0;
for($room=11;$room<16;$room++)
{
	$result=mysqli_query($conn,"select * from room$room WHERE idate BETWEEN '$idate' AND '$odate' OR odate BETWEEN '$idate' and '$odate'");
    if ($result->num_rows == 0)
         {
                  $flag=1;
                  break;
         }   
}
if($flag==1)
{
  $res="insert into room$room(mobile,idate,odate,adult,child) values('$mob','$idate','$odate',$adult,$child)";
   				if(mysqli_query($conn,$res)){
					        header("Location:Booked.html");
	            }  
}
else
{
 header("Location:NotBook.html");	
}
mysqli_close($conn);
}
else
{
   header("Location:Book3.html");
}
?>