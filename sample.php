<!DOCTYPE html>
<html>
<head>

	<title></title>
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
		.list-quotes {
			cursor: pointer;
			height: auto;
			margin-bottom: 30px;
			overflow: hidden;
			position: relative;
			display: block;
			border-bottom: 1px solid blue;
		}
		.list-quotes img,
		.list-quotes h1 {
			-webkit-transition: -webkit-transform 0.35s;
			transition: transform 0.35s;
		}
		.list-quotes img {
			-webkit-backface-visibility: hidden;
			backface-visibility: hidden;
		}
		.list-quotes h1{
			background: rgba(20,31,44,0.8);
			bottom: 30px;
			float: right;
			color: #fff;
			font-size: 14px;
			font-weight: bold;
			padding: 15px;
			position: absolute;
			margin: 0;
		}

		.list-quotes p {
			position: absolute;
			bottom: -1px;
			left: 0;
			right: 0;
			margin: 0;
			padding: 10px;
			opacity: 0;
			-webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
			transition: opacity 0.35s, transform 0.35s;
			-webkit-transform: translate3d(0,50px,0);
			transform: translate3d(0,50px,0);
			font-size: 15px;
			font-weight: normal;
			background: rgba(51,153,153,0.8);
			width: 100%;
			color: #fff;
		}
		.list-quotes:hover img {
			-webkit-transform: translate3d(0,-80px,0);
			transform: scale(1.2);
			transition: all 250ms ease;
		}
		.list-quotes:hover{
			box-shadow: 0 0 5px 2px rgba(51,153,153, 0.5);
		}
		.list-quotes:hover h1 {
			-webkit-transform: translate3d(0,-100px,0);
			transform: translate3d(0,-100px,0);
			text-shadow: 0px 0 15px #fff;
			transition: all 250ms ease;
		}
		.list-quotes:hover p {
			opacity: 1;
			-webkit-transform: translate3d(0,0,0);
			transform: translate3d(0,0,0);
		}
		.quotes span{
			color:#222;
			font-weight: bold;
			text-transform: capitalize;
			color: #fff;
		}
	</style>
</head>
<body>

	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-6">
		<a class="list-quotes" href="/">
			<!-- Recommended size 360X360 -->
			<img class='img-responsive' alt="img" src="https://img.sheroes.in/img/uploads/article/high_res/Woman-Traveling-Alone-1-1000x500.jpg">
			<div class="quotes">
				<h1>Lorem ipsum dolor</h1>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. <span>...Read More</span>
				</p>
			</div>
		</a>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-3 col-lg-6">
		<a class="list-quotes" href="/">
			<!-- Recommended size 360X360 -->
			<img class='img-responsive' alt="img" src="https://img.sheroes.in/img/uploads/article/high_res/Woman-Traveling-Alone-1-1000x500.jpg">
			<div class="quotes">
				<h1>Lorem ipsum dolor</h1>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. <span>...Read More</span>
				</p>
			</div>
		</a>
	</div>
</body>
</html>