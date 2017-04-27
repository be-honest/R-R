<?php 
$errorMsgReg='';
$errorMsgLogin='';

if (!empty($_POST['loginSubmit'])) 
{
$username=$_POST['username'];
$password=$_POST['password'];
 if(strlen(trim($username))>1 && strlen(trim($password))>1 )
   {
    $user_id=$userClass->userLogin($username,$password);
    if($user_id)
    {
        $url=BASE_URL.'home.php';
        header("Location: $url");
    }
    else
    {
        $errorMsgLogin="Please check login details.";
    }
   }

}
?>