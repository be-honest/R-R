<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create an Event</title>
	<style>
		.events
		{
			margin: 20px auto;
		}

		figure.activity
		{
			color: #fff;
			position: relative;
			float: left;
			overflow: hidden;
			background-color: #1a1a1a;
			color: #ffffff;
			text-align: left;
			margin: 10px;
			width: 30%;
			border-radius: 0px;
		}

		figure.activity{
			-webkit-box-sizing: border-box;
			 box-sizing: border-box;
			 -webkit-transition: all 0.35s ease;
			 transition: all 0.35s ease;
		}

		figure.activity img{
			max-width: 100%;
			-webkit-transform: scale(1.1);
			transform: scale(1.1);
			vertical-align: top;
			opacity: 0.7;
		}

		figure.activity figcaption{
			position: absolute;
			padding:  40px 25px;
			top: 0;
			left: 0;
		}

		figure.activity h2,
		figure.activity p {
		  margin: 0;
		  padding: 0;
		  font-family: Tahoma;
		}
		figure.activity h2 {
		  margin-bottom: 10px;
		  display: inline-block;
		  font-weight: 100;
		  font-size: 1.8em;
		}
		figure.activity p {
		  font-weight: 300;
		  margin-bottom: 20px;
		  line-height: 1.4em;
		}
		figure.activity a {
		  display: inline-block;
		  padding: 10px 20px;
		  border: 1px solid #ffffff;
		  text-decoration: none;
		  color: #ffffff;
		  letter-spacing: 2px;
		  text-transform: uppercase;
		  font-size: 0.8em;
		  -webkit-transform: translateY(50%);
		  transform: translateY(50%);
		  opacity: 0;
		}
		figure.activity a:hover {
		  background-color: rgba(0, 0, 0, 0.2);
		}
		figure.activity:hover img,
		figure.activity.hover img {
		  opacity: 0;
		  -webkit-transform: scale(1);
		  transform: scale(1);
		}
		figure.activity:hover a,
		figure.activity.hover a {
		  -webkit-transform: translateY(0);
		  transform: translateY(0);
		  opacity: 1;
		}
		figure.activity.navy {
		  background-color: #222f3d;
		}
	</style>
</head>
<body>
	<div class="events">
		<div class="col-md-4">
			<figure class="activity navy col-md-4">
				<img src="..\assets\img\trekking.jpg" >
				<figcaption>
					<h2 style="color: #fff;" > Trekking </h2>
					<p>Rest and Recreation for the month of April.</p>
					<a href="#">More</a>
				</figcaption>
			</figure>
		</div>
	</div>
</body>
</html>