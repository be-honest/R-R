<?php
session_start(); 
// $HRC=http_response_code();
// var_dump($HRC);
include('config.php');
include('session.php'); //below is specified session for user page. please refactor session soon to be accessable to every page 
$userDetails=$userClass->userDetails($session_uid);

if ($user_type==1) 
{
include('views/users/usertype.php');
}
else
{
header("location: Forbidden.php");
}


 ?>