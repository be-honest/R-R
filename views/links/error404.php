<?php if ($session_uid) {
    require_once '../views/layouts/nav.php';
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

	<title>Rest and Recreation Portal</title>
  
  <link rel="shortcut icon" href="assets/img/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet" type='text/css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/
  font-awesome.min.css">
	<link href="assets/css/toolkit.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/todolist.css">
  <link rel="stylesheet" href="sample/sample.css">
  <!-- <link rel="stylesheet" href="assets/css/todolist.css"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.14/css/jquery.dataTables.min.css">
  <link href="assets/css/custom.css" rel="stylesheet">
  <link href="assets/css/application.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/admin.css">
      <link rel="stylesheet" href="assets/css/polls.css">
  <!-- tags input -->
  <link rel="stylesheet" href="assets/src/bootstrap-tagsinput.css">
   <!-- date range picker  -->
  <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" /> -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
	<style>
		body{
		width: 1px;
        min-width: 100%;
        *width: 100%;
          .icon {
    font-size: smaller;
  }
  .close {
    width: initial; 
  }
  .alert{
    margin-left: 27%;
    width: 30%;
  }
		}
	</style>

</head>
<body <?php if ($session_uid) {
  ?> class="with-top-navbar" <?php
} ?>>
<?php //var_dump($session_uid) ?>
<div class="container bg-error">
	<div class="row text-center">
		<br><br>
		<h1 style="font-size: 60px;">Page not found <span style="font-size: 25px; color: red">Error 404</span></h1>
		<p style="font-size: 16px;"">The page you requested could not be found, either contact your webmaster or try again. 
    <br>Use your browser's Back button to navigate to the page you have prevously come from.</p>
    <p><b>OR, Click the button below.</b></p>
		
	<!-- 	<p><i>404 - page not found</i></p>
		<h1 style="font-size: 72px;">MISSING PAGE</h1> -->

		<a href="home.php"><button class="btn btn-default" style="border-color: gray; background-color: #bdbdbd;">Back to Home</button></a>
	</div>
</div>
<?php 
	require_once '../views/layouts/footer.php';
?>