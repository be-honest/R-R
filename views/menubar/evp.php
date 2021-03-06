<?php 
require_once 'views/layouts/header.php';
require_once 'views/layouts/nav.php';

include('class/voteClass.php');
include('class/eventPeriodClass.php');
$EVPClass = new eventPeriodClass();
$voteClass = new voteClass();
$userClass = new userClass();
$EVPs = $EVPClass->getAllEventPeriod();
$evp_id=$EVPClass->getCurrentEventPeriod()['evp_id'];
$EVP=$EVPClass->getCurrentEventPeriod();
$evp_status=$EVP['event_status_id'];


$userCount=$userClass->getActiveUserCount();
$voteCount=$voteClass->getVoteCount($evp_id);
if(isset($_POST['registerEVP']))
{
	$start_date=$_POST['startDate'];
	$end_date=$_POST['endDate'];
	$start_event_date=$_POST['startEventDate'];
	$end_event_date=$_POST['endEventDate'];
	$id=$session_uid;//session id
	$event_status=$_POST['optradio'];
	$uid=$EVPClass->eventPeriodRegistration($session_uid,$start_date,$end_date,$start_event_date,$end_event_date,$id,$event_status);

}

if(isset($_POST['closeEvent']))
{
	$sumEvents=$voteClass->getVoteCounts();
	$c=0;
	foreach ($sumEvents as $sumEvent) {
		if ($c<=$sumEvent["vote_count"]) 
		{
			$topEvent=$sumEvent['event_id'];
			$c=$sumEvent["vote_count"];
		}
	}
	$mostVotedEventId=$voteClass->getMaxVoteByEvp($evp_id)["event_id"];//  id of the most voted event
	$EVPClass->closeEvent($evp_id,$topEvent);
}
?>

<div class="container">
	<br>

	<form method="post" class="form-horizontal" role="form">
		<h2 style="font-size: 44px;"><span class="icon icon-calendar"></span> Event Voting Period</h2>
		<hr width="85%" style="border-color:#3097d1;">
		<br>
		<?php if (!$EVP||$evp_status==2) {
		 ?>
		<div class="form-group">
			<label class="col-md-3" style="display: inline-flex; justify-content: flex-end;">Date Voting Period</label>
			<div class="col-md-3" style="padding: 0;">
				<input type="text" name="datefilter" class="form-control" style="padding: 0; text-align: center;" />
				<input type="hidden" name="startDate">
				<input type="hidden" name="endDate">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3" style="display: inline-flex; justify-content: flex-end;">Event Date</label>
			<div class="col-md-3" style="padding: 0;">
				<input type="text" name="eventDate" class="form-control" style="padding: 0; text-align: center;" />
				<input type="hidden" name="startEventDate">
				<input type="hidden" name="endEventDate">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3" style="display: inline-flex; justify-content: flex-end;">Event Status</label>
			<div class="row">
				<div class="radio custom-control custom-radio col-md-2">
					<label>
						<input type="radio" id="radio1" name="optradio" value=1>
						<span class="custom-control-indicator" style="border-color:#3097d1;"></span>Open
					</label>
				</div>
				<div class="radio custom-control custom-radio col-md-2">
					<label>
						<input type="radio" id="radio2" name="optradio" value=4>
						<span class="custom-control-indicator" style="border-color:#3097d1;"></span>
						Pending
					</label>

				</div>
				<button type="submit" name="registerEVP" class="btn btn-info icon icon-circle-with-plus " 
				style="float: right; padding: 0; margin-right: 350px;  font-size: 50px; background-color: white; 
				color:#3097d1; border-color: white;">

			</button>
			
		</div>
	</div>
	<?php } 
	elseif($EVP&&$evp_status!=2)
	{
	?>
	<div class="form-group">
		<label class="col-md-3" style="display: inline-flex; justify-content: flex-end;">Date Voting Period:</label>
		<?php echo date_format(date_create($EVP["start_date"]),"M d, Y"); ?> - <?php echo date_format(date_create($EVP["end_date"]),"M d, Y"); ?>
	</div>

	<div class="form-group">
		<label class="col-md-3" style="display: inline-flex; justify-content: flex-end;">Event Date:</label>
		<?php echo date_format(date_create($EVP["start_event_date"]),"M d, Y"); ?> - <?php echo date_format(date_create($EVP["end_event_date"]),"M d, Y"); ?>
	</div>

	<div class="form-group">
		<label class="col-md-3" style="display: inline-flex; justify-content: flex-end;">Votes:</label>
		<?php 
		if($voteCount)
			{?>
		<span style="color: lime">
		<?php
		echo $voteCount;
		}
		else
			echo '0';
	?></span> vote(s) out of <?php echo $userCount ?> users
	</div>

	<div class="form-group">
	<div class="btn col-sm-8 col-sm-offset-2">
	<button type="submit" class="btn btn-danger p" name="closeEvent">Close Event Voting Period</button>
		</div>
	</div>
	<?php } ?>

	<br>
	<!-- TABLE -->
	<br>
	<div class="row">
		<div class="col-sm-11 col-sm-offset-1" style="margin-left: 4.5%;>
			<div class="imaginary_container">
				<div class="panel panel-primary">
					<div class="panel-body" style="padding: 0.5em;">
						<table id="votingPeriod" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>EVP ID</th>
									<th>Voting Period</th>
									<th>Event Period</th>
									<th>Status</th>
									<th>User ID</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php 
									foreach($EVPs as $EVP)
										{?>
									<td align="center"> <?php echo $EVP['evp_id'] ?></td>
									<td align="center"> <?php echo $EVP['start_date'] . ' - ' . $EVP['end_date'] ?></td>
									<td align="center"> <?php  echo $EVP['start_event_date'] . ' - ' . $EVP['end_event_date'] ?></td>
									<td align="center"> <?php echo $EVP['description'] ?></td>
									<td align="center"> <?php echo $EVP['user_id'] ?></td>
									
								</tr>
								<?php  } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	

</form>	
<!-- </form> -->
<br><br>
</div>















<?php 
require_once 'views/layouts/footer.php';
?>