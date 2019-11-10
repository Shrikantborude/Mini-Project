<?php
	$mob	=	$_POST['mobile'];
	$user	=	$_POST['user'];
	$email	=	$_POST['email'];
	$addr	=	$_POST['addr'];
	$aadhar	=	$_POST['aadhar'];
	$pass	=	$_POST['pass'];
	$repass	=	$_POST['repass'];
	
	if(count($_POST)>0)
	{
		        if($repass!=$pass)
			   {
				header("Location:Registration.html");
			   }	
			    else
				{
				include("config.php");
				if($conn == false)
				{
				die("ERROR: Could not connect. " . mysqli_connect_error());
				}
				$result="insert into customer(name,mob,email,addr,aadhar,pass) values('$user',$mob,'$email','$addr',$aadhar,'$pass')";
				if(mysqli_query($conn,$result)){
					        header("Location:Login.html");
	            }								
			   else
			   {
				echo "ERROR: Could not able to execute $result. " . mysqli_error($conn);
				}
	           }
	}
	else
	   {
		
			 header("Location:Registration.html");
		}
	
	mysqli_close($conn);
?>