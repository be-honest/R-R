<?php 
session_start();
include('config.php');
include('session.php'); 
$userDetails=$userClass->userDetails($session_uid);

if ($user_type==1) {
include('views/menubar/addThings.php');
}
else
{
header("location: Forbidden.php");
}
?>