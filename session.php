 <?php
if(!empty($_SESSION['user_id']))
{
$_SESSION['successMsgReg']=NULL;
$session_uid=$_SESSION['user_id'];
$user_type=$_SESSION['user_type_id'];
include('class/userClass.php');
$userClass = new userClass();

}


if(empty($session_uid))
{
$url='index.php';
header("Location: $url");
}


?>