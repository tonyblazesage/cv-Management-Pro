<?php
//This page let initialize the forum by checking for example if the user is logged
session_start();
header('Content-type: text/html;charset=UTF-8');
if(!isset($_SESSION['email']) and isset($_COOKIE['email'], $_COOKIE['password']))
{
	$cnn = mysqli_query($con, 'select password,id from user_account where email="'.mysqli_real_escape_string($con, $_COOKIE['email']).'"');
	$dn_cnn = mysqli_fetch_array($cnn);
	if(sha1($dn_cnn['password'])==$_COOKIE['password'] and mysqli_num_rows($con, $cnn)>0)
	{
		$_SESSION['email'] = $_COOKIE['email'];
		$_SESSION['userid'] = $dn_cnn['id'];
	}
}
?>