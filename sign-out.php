<?php
include('config.php');
if(isset($_SESSION['email']))
{
	unset($_SESSION['email'], $_SESSION['userid']);
	setcookie('email', '', time()-100);
	setcookie('password', '', time()-100);

	header('location: sign-in.php');
	
}
else
{
   header('location: profile.php'); 
}
		
	?>