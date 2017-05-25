<?php
session_start();
$session_uid="";
include('config.php');
// sessions
if(!empty($_SESSION['user_id']))
{
	$_SESSION['successMsgReg']=NULL;
	$session_uid=$_SESSION['user_id'];
	$user_type=$_SESSION['user_type_id'];
	include('class/userClass.php');
	$userClass = new userClass();
	$userDetails=$userClass->userDetails($session_uid);
}

if(empty($session_uid))
{
	
}
//end of session

	include('views/links/error403.php');



?>