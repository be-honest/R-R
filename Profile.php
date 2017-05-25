<?php 
session_start();
include('config.php');
include('session.php'); 
$userDetails=$userClass->getUser($session_uid);

include('views/menubar/visitProfile.php');
 ?>