 <?php
if(!empty($_SESSION['user_id']))
{
$session_uid=$_SESSION['user_id'];
include('class/userClass.php');
$userClass = new userClass();
}

if(empty($session_uid))
{
$url=BASE_URL.'warning.php';
header("Location: $url");
}


?>