<?php
session_start();
include('config.php');

if(!empty($_SESSION['user_id']))
{
	header("Location: home.php");
}

if(empty($session_uid))
{
include('views/login/login.php');
}


?>
