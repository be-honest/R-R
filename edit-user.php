<?php
session_start(); 
include('config.php');
include('session.php'); 
$userDetails=$userClass->userDetails($session_uid);

include('views/users/edit-user.php');
 ?>