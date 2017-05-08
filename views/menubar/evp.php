<?php 
require_once 'views/layouts/header.php';
require_once 'views/layouts/nav.php';

include('config.php');
include('class/eventPeriodClass.php');
$EVPClass = new eventPeriodClass();

if(isset($_POST['registerEVP`']))
{
	$start_date=$_POST['startDate'];
	$end_date=$_POST['endDate'];
	$start_event_date=$_POST['startEventDate'];
	$end_event_date=$_POST['endEventDate'];
	$uid=1;
	$event_status=$_POST['optradio'];
	$uid=$userClass->eventPeriodRegistration($start_date,$end_date,$start_event_date,$end_event_date,$uid,$event_status);

	var_dump($startdate);
}



?>

<div class="container">
	<br>

	<form method="post" class="form-horizontal" role="form">
		<h2 style="font-size: 44px;"><span class="icon icon-calendar"></span> Event Voting Period</h2>
		<hr width="85%" style="border-color:#3097d1;">
		<br>
		<div class="form-group">
			<label class="col-md-3" style="display: inline-flex; justify-content: flex-end;">Date Voting Period</label>
			<div class="col-md-3" style="padding: 0;">
				<input type="text" name="datefilter" class="form-control" style="padding: 0; text-align: center;" />
				<input type="hidden" name="startDate">
				<input type="hidden" name="endDate">
			</div>
			<button type="submit" name="registerEVP" class="btn btn-info icon icon-circle-with-plus " 
			style="float: right; padding: 0; margin-right: 350px;  font-size: 50px; background-color: white; 
			color:#3097d1; border-color: white;">
			<!-- <strong>Add</strong> -->
		</button>
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
					<input type="radio" id="radio1" name="optradio" value=1 >
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
		</div>
	</div>


	<br>
	<!-- TABLE -->
	<br>
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="imaginary_container">
				<div class="panel panel-primary">
					<div class="panel-body" style="padding: 0.5em;">
						<table id="votingPeriod" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Voting Period</th>
									<th>Event Date</th>
									<th>Status</th>
									<th>User</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td> 05/04/2017 - 05/08/2017</td>
									<td> 05/04/2017</td>
									<td> open</td>
									<td> sample_user</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	</form>
<br><br>
</div>















<?php 
require_once 'views/layouts/footer.php';
?>