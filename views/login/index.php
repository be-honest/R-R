<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

	<title>Login</title>

	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet" type='text/css'>
	<link href="../../assets/css/toolkit.css" rel="stylesheet">
  <link href="../../assets/css/application.css" rel="stylesheet">

	<style>
		body{
		width: 1px;
        min-width: 100%;
        *width: 100%;
		}

	</style>
  <link href="../../assets/css/custom.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid container-fill-height">
  <div class="container-content-middle">
    <form role="form" class="m-x-auto text-center app-login-form">

      <a href="/index.html" class="app-brand m-b-lg">
        <img src="../../assets/img/logo.png" alt="logo">
      </a>

      <div class="form-group">
        <input class="form-control" placeholder="Username">
      </div>

      <div class="form-group m-b-md">
        <input type="password" class="form-control" placeholder="Password">
      </div>

      <div class="m-b-lg">
        <a href="../index.php"><button class="btn btn-primary">Log In</button></a>
        <button class="btn btn-default">Register</button>
      </div>

      <footer class="screen-login">
        <a href="#" class="text-muted">Forgot password?</a>
      </footer>
    </form>
  </div>
</div>


    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/chart.js"></script>
    <script src="../assets/js/toolkit.js"></script>
    <script src="../assets/js/application.js"></script>
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