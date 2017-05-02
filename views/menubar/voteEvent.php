<?php 
  require_once 'views/layouts/header.php';
  require_once 'views/layouts/nav.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Polls | </title>
	<link rel="stylesheet" href="assets/css/polls.css">
</head>
<body>

		<div class = "container"> 
			<form class="form-horizontal" role="form">
				<!-- <div class="col-md-4">
					<div class="col-md-6"> -->
						 <h3>Vote an Event</h3>
						<h5>Check an option to vote.</h5>
							<div class="funkyradio">
							    <div class="funkyradio-info">
							        <input type="radio" name="radio" id="radio1"/>
							        <label for="radio1">First Option </label>
							    </div>
							    <div class="funkyradio-info">
							        <input type="radio" name="radio" id="radio2"/>
							        <label for="radio2">Second Option </label>
							    </div>
							    <div class="funkyradio-info">
							        <input type="radio" name="radio" id="radio3" />
							        <label for="radio3">Third Option</label>
							    </div>
				   
							</div>
						<!-- </div>
					</div> -->
			</form>
		</div>


<div class = "container"> 
<form class="form-horizontal" role="form">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-bold panel-default">
				<div class="panel-body p-b-lg">
					<h4 class="m-y-0">Place of Event</h4>
					<hr>
					<h5>Description</h5>
					<p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
				</div>
			</div>
		</div>
	</div>
</form>
</div>


</body>
</html>

<?php
require_once 'views/layouts/footer.php'; 
?>
