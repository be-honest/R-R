<?php
session_start(); 
include('config.php');
include('session.php'); //below is specified session for user page. please refactor session soon to be accessable to every page 
$userDetails=$userClass->userDetails($session_uid);

include('views/users/usertype.php');


 ?>