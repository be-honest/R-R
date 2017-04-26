<?php 

include('class/userClass.php');

$userClass = new userClass();

include('checksession.php');

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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

	<title>Login</title>

	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet" type='text/css'>
	<link href="assets/css/toolkit.css" rel="stylesheet">
  <link href="assets/css/application.css" rel="stylesheet">

	<style>
		body{
		width: 1px;
        min-width: 100%;
        *width: 100%;
		}

    a.login{
    color: #fff;
    order-color: #6D4C41;
    text-decoration: none;
    }

    .app-brand img{

    width: 200%;
  }



	</style>
  <link href="assets/css/custom.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid container-fill-height">
  <div class="container-content-middle">


    <form method="post" action="" name="login" role="form" class="m-x-auto text-center app-login-form">

      <a href="index.php" class="app-brand m-b-lg">
        <img src="assets/img/logo2.png" alt="logo">
      </a>

      <div class="form-group">
        <input class="form-control" placeholder="Username" value="admin1" name="username">
      </div>

      <div class="form-group m-b-md">
        <input type="password" class="form-control" value="admin1" placeholder="Password" name="password">
      </div>

      <?php 
      if($errorMsgLogin)
      { 
        ?>
      <div class="alert alert-danger alert-dismissable" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
      <strong>Error!</strong> <?php echo $errorMsgLogin; ?>
      </div>
      <?php 
      }

       ?>  
    

      <div class="m-b-lg">

        <!-- <a href="../index.php"><button name="loginSubmit" value="Login" class="btn btn-primary">Log In</button></a> -->
        <input type="submit" class="btn btn-primary" name="loginSubmit" value="Login">
     <!--    <button class="btn btn-default">Create User</button>  -->
      </div>

      <!-- <footer class="screen-login">
        <a href="#" class="text-muted">Forgot password?</a>
      </footer> -->
    </form>

s

  </div>
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/toolkit.js"></script>
    <script src="assets/js/application.js"></script>
    <script>
      // execute/clear BS loaders for docs
      $(function(){
        if (window.BS&&window.BS.loader&&window.BS.loader.length) {
          while(BS.loader.length){(BS.loader.pop())()}
        }
      })
    </script>
	
</body>
</html>