 <?php
 session_start();
include('config.php');
$session_uid='';
$_SESSION['user_id']='';
$_SESSION['user_type_id']='';
if(empty($session_uid) && empty($_SESSION['user_id']))
{
$url=BASE_URL.'index.php';
header("Location: $url");
}
?>