<?php 
require_once'views/layouts/header.php';
require_once'views/layouts/nav.php';

include('class/eventClass.php');
include('class/eventPeriodClass.php');
include('class/activityClass.php');

$eventPeriodClass = new eventPeriodClass();
$eventClass = new eventClass();
$activityClass = new activityClass();

$activities = $activityClass->getAllActivities();
$events = $eventClass->getAllEvents();
$EVPs = $eventPeriodClass->getAllEventPeriod();
$errorMsgReg="";
$checkChecklist="";
if(!isset($_GET['evp_id']))
{
	$evpTitle="Choose Event Period";
}
if(!isset($_GET['id']))
{
	$eventTitle="Choose Activity";
}

if(isset($_GET['id']))
{
	$ev = $eventClass->getEvent($_GET['id']);
	if ($ev) 
	{
		$eventTitle=$ev['name'];
	}
	else
	{
		$eventTitle="Does not exist";
		//event does not exist
	}
}

if(isset($_GET['evp_id']))
{
	$evpt = $eventPeriodClass->getEventPeriod($_GET['evp_id']);
	if ($evpt) 
	{
		$evpTitle=date_format(date_create($evpt["start_date"]),"F Y");
	}
	else
	{
		$evpTitle="Does not exist";
	}
}


if (isset($_POST['registerActivity'])) 
{
	$activityClass->activityRegistration($_GET['id'],$_POST['activity']);
}
?>


<div class="container p-t-lg">

	<form method="post" name="addActivityy" class="form-horizontal" role="form">
		<br>
		<h2 style="font-size: 50px; color: darksalmon; ">

			Event Activity <span class="icon icon-light-up"></span>
		</h2>
		<hr style="border-color:darksalmon;"">
		<br>

		<!-- Start of Event Period dropdown -->
		<div class="form-group">
			<label class="col-sm-3 control-label">EVENT PERIODS</label>
			<div class="dropdown col-sm-4">
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownEvent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="border-color: darksalmon;">
					<?php echo $evpTitle ?>
					<span class="caret"></span>
				</button>

				<ul class="dropdown-menu" aria-labelledby="dropdownEvent">

					<?php
					if(isset($_GET['evp_id']))
					{
						foreach( $EVPs as $evp) 
						{
							if($evp['evp_id']!=$_GET['evp_id']) //checks the event id to the posted id to avoid repeat
							{ ?>
							<li><a href="Activity.php?evp_id=<?php echo $evp['evp_id'] ?>"> 
								<?php echo date_format(date_create($evp["start_date"]),"F Y"); 
							}?>
						</a></li>
						<?php }

					}
					else
					{
						foreach($EVPs as $evp) 
							{?>
						<li><a href="Activity.php?evp_id=<?php echo $evp['evp_id']?>"> 
							<?php echo date_format(date_create($evp["start_date"]),"F Y");
						}?>
					</a></li>

					<?php }
					?>

				</ul>
			</div>
		</div>
		<!-- End of Event Period Dropdown -->
		
		<?php 
		if(isset($_GET['evp_id']))
		{
		$events = $eventClass->getEventsByEVP($_GET['evp_id']);
		$currentEVP= $eventPeriodClass->getCurrentEventPeriod();
		if($events==false)
		{
			if ($_GET['evp_id'] == $currentEVP['evp_id']) {
			$errorMsgReg = htmlspecialchars("There are no events for this month's R&R") . '<br>' . htmlspecialchars("To add events for this event period, Click ") . '<a href="' . htmlspecialchars("createEvent.php") . '">' . htmlspecialchars('here') . '</a>' . htmlspecialchars('.');
			}
			elseif ($_GET['evp_id'] > $currentEVP['evp_id']) {
				$errorMsgReg = "This Event Period is not yet open.";
			}
			else
			{
				$errorMsgReg = "This Event Period has passed and there were no recorded events.";
			}
		} 
		}

		?>
		<!-- Start of Events dropdown -->
		<?php if(isset($_GET['evp_id']) && $evpTitle!="Does not exist" && $events!=false) 
		{?>
		<div class="form-group">
			<label class="col-sm-3 control-label">EVENTS</label>
			<div class="dropdown col-sm-4">
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownEvent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="border-color: darksalmon;">
					<?php echo $eventTitle ?>
					<span class="caret"></span>
				</button>

				<ul class="dropdown-menu" aria-labelledby="dropdownEvent">

					<?php //if there is no id posted in the url
					if(!isset($_GET['id'])&&isset($_GET['evp_id']))
					{
						$events = $eventClass->getEventsByEVP($_GET['evp_id']);
						foreach( $events as $event) 
							{?>
						<li><a href="Activity.php?evp_id=<?php echo  $_GET['evp_id'] ?>&id=<?php echo $event['event_id'] ?>"> 
							<?php echo $event['name']; 
						}?>
					</a></li>
					<?php }
					else
					{
						foreach( $events as $event) 
						{
							if($event['event_id']!=$_GET['id']) //checks the event id to the posted id to avoid repeat
							{ ?>
							<li><a href="Activity.php?evp_id=<?php echo  $_GET['evp_id'] ?>&id=<?php echo $event['event_id'] ?>"> 
								<?php echo $event['name']; 
							}?>
						</a></li>
						<?php }
					}
					?>

				</ul>

			</div>

		</div>
		<?php } ?>
		<!-- End of Event Dropdown -->
		
		<!-- Start of Activites -->
		<?php if(isset($_GET['evp_id'])&&isset($_GET['id']) && $eventTitle!="Does not exist"){ ?>
		<div class="form-group">
			<label class="col-sm-3 control-label">ACTIVITIES</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" placeholder="Add an acitivity" style="border-color: darksalmon;" name='activity'>	
			</div>
			<button type="submit" name="registerActivity" class="btn btn-info icon icon-circle-with-plus" style=" padding: 0; font-size: 25px; background-color: white; color:darksalmon; border-color: white;">
			</button>
		</div>
		<?php } ?>

		<!-- End of Activities -->

		<!-- No events alert -->
		<?php if($errorMsgReg)
		{?>
		<div class="alert alert-warning fade in">
			<button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="Close">
				<span aria-hidden="true" style="padding: 0; float: right;">×</span>
			</button>
			<strong>Wait a minute! </strong> <?php echo $errorMsgReg ?>
					</div>
		<?php } ?>


	</form>
	<br>

	<!-- Start Data Table -->
	<div class="row">
		<div class="form col-sm-10 col-sm-offset-1">
			<div class="panel panel-info">
				<div class="panel panel-body">
					<table id="act" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<?php 
						if(!isset($_GET['id'])&&!isset($_GET['evp_id']))
							{ ?>
						<thead>
							<tr>
								<th>Activity ID</th>
								<th>Activities</th>
								<th>Event Name</th>
								<th>EVP ID</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($activities as $activity) 
							{ ?>
							<tr>
								<th><?php echo $activity['Activity ID'];?></th>
								<th><?php echo $activity['Activity Name']; ?></th>
								<th><?php echo $activity['Event Name']; ?></th>
								<th><?php echo $activity['EVP ID']; ?></th>
							</tr>
							<?php } ?>
						</tbody>
						<?php
					} 
					elseif(!isset($_GET['id'])&&isset($_GET['evp_id'])) 
					{
						?>
						<thead>
							<tr>
								<th>Activity ID</th>
								<th>Activities</th>
								<th>Event Name</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($activities as $activity) 
							{ 
								if($_GET['evp_id'] == $activity['EVP ID'])
									{?>

								<tr>
									<th><?php echo $activity['Activity ID'];?></th>
									<th><?php echo $activity['Activity Name']; ?></th>
									<th><?php echo $activity['Event Name']; ?></th>
								</tr>
								<?php }
							}?>
						</tbody>
						<?php 
					} 
					elseif(isset($_GET['id'])&&isset($_GET['evp_id']))
					{
						?>
						<thead>
							<tr>
								<th>Activity ID</th>
								<th>Activities</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($activities as $activity) 
							{ 
								if($_GET['evp_id'] == $activity['EVP ID'] && $_GET['id'] == $activity['Event ID'])
									{?>
								<tr>
									<th><?php echo $activity['Activity ID'];?></th>
									<th><?php echo $activity['Activity Name']; ?></th>
								</tr>							
								<?php 
							}
						} ?>
					</tbody>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- End of Data Table -->

</div>


<?php 
require_once 'views/layouts/footer.php';
?>