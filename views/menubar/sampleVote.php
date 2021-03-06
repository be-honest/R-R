<?php 
require_once 'views/layouts/header.php';
require_once 'views/layouts/nav.php';

include('class/eventClass.php');
include('class/voteClass.php');
include('class/eventPeriodClass.php');

$eventClass = new eventClass();
$eventPeriodClass = new eventPeriodClass();
$voteClass = new voteClass();



if (isset($_POST['voteEvent'])) 
{
	$event_id=$_POST['event'];
	$user_id=$session_uid;
	$uid=$voteClass->vote($event_id,$user_id);
	print_r($uid);
}

//get EVP note: Only Local (computer Time) Conditioned
$EVP=$eventPeriodClass->getCurrentEventPeriod();
$events = $eventClass->getEventsByEVP($EVP['evp_id']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Polls</title>
</head>
<body>

	<div class = "container"> 
		<form method="post" class="form-horizontal" role="form">
				<?php if($EVP!=false)
						{ ?>
					<h3>Vote an Event</h3>
					<h5>Check an option to vote.</h5>
					<br>
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

							</div> <br>
							<div class="form-group">
								<div class="col-sm-5 col-sm-offset-5">
									<button type="submit" class="btn btn-primary" name="voteEvent">
										Vote
									</button>
								</div>
							</div>

						<?php } ?>
				</form>
			</div>
<?php
require_once 'views/layouts/footer.php'; 
?>
