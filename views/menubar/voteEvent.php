<?php 
require_once 'views/layouts/header.php';
require_once 'views/layouts/nav.php';
include('config.php');
include('class/eventClass.php');
include('class/voteClass.php');
$eventClass = new eventClass();
$voteClass = new voteClass();
$evp_id=1;//must be changed to current time
if (isset($_POST['voteEvent'])) 
{
	$event_id=$_POST['event'];
	$user_id=3;
	$uid=$voteClass->vote($event_id,$user_id);
	print_r($uid);
}

$events = $eventClass->getEventsByEVP($evp_id);
	// PRINT_r($events);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Polls</title>
	<link rel="stylesheet" href="assets/css/polls.css">
</head>
<body>

	<div class = "container"> 
		<form method="post" class="form-horizontal" role="form">
				<!-- <div class="col-md-4">
				<div class="col-md-6"> -->
					<h3>Vote an Event</h3>
					<h5>Check an option to vote.</h5>
					<div class="funkyradio">
						<?php 
						foreach($events as $event)
						{
							?>
							<div class="funkyradio-info">
								<input type="radio" name="event" id="radio<?=$event['event_id']?>" value=<?=$event['event_id']?>>
								<label for="radio<?=$event['event_id']?>" 
								
								>
									<?php echo $event['name']  . ' : ' . $event['description']?> 
								</label>
							</div>


							<?php } ?>
							    <!-- <div class="funkyradio-info">
							        <input type="radio" name="radio" id="radio2"/>
							        <label for="radio2">Second Option </label>
							    </div> -->
							    <!-- <div class="funkyradio-info">
							        <input type="radio" name="radio" id="radio3" />
							        <label for="radio3">Third Option</label>
							    </div> -->

							</div> <br>
							<div class="form-group">
								<div class="col-sm-5 col-sm-offset-5">
									<button type="submit" class="btn btn-primary" name="voteEvent">
										Vote
									</button>
								</div>
							</div>
						<!-- </div>
					</div> -->
				</form>
			</div>

			
<!-- <div class = "container"> 
<form class="form-horizontal" role="form">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-bold panel-default">
				<div class="panel-body p-b-lg">
					<h5>Description</h5>
					<p></p>
				</div>
			</div>
		</div>
	</div>
</form>
</div> -->


</body>
</html>

<?php
require_once 'views/layouts/footer.php'; 
?>
