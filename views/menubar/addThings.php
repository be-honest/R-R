<?php 
require_once'views/layouts/header.php';
require_once'views/layouts/nav.php';

include('config.php');
include('class/eventClass.php');
include('class/eventPeriodClass.php');
include('class/checklistClass.php');

$eventPeriodClass = new eventPeriodClass();
$eventClass = new eventClass();
$checklistClass = new checklistClass();

$checklists = $checklistClass->getAllChecklist();
$events = $eventClass->getAllEvents();
$EVPs = $eventPeriodClass->getAllEventPeriod();

if(!isset($_GET['evp_id']))
{
	$evpTitle="Choose Event Period";
}
if(!isset($_GET['id']))
{
	$eventTitle="Choose Item";
}

if(isset($_GET['id']))
{
	$ev = $eventClass->getEvent($_GET['id']);
	// var_dump($_GET['event_id']);
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
	// var_dump($_GET['event_id']);
	if ($evpt) 
	{
		$evpTitle=$evpt['evp_id'];
	}
	else
	{
		$evpTitle="Does not exist";
	}
}

if(isset($_GET['evp_id'])&&isset($_GET['id']))
{
	$events = $eventClass->getEventsByEVP($_GET['evp_id']);
}

if (isset($_POST['registerChecklist'])) 
{
	$checklistClass->checklistRegistration($_GET['id'],$_POST['checklist']);
}
?>
<div class="container p-t-lg">
	
	<form method="post" class="form-horizontal" role="form">
		<br>
		<h2 style="font-size: 50px; color: darkseagreen; ">

			Things to Bring <span class="icon icon-check"></span>
		</h2>
		<hr style="border-color:darkseagreen;"">
		<br>
		<!-- Start of Event Period dropdown -->
		<div class="form-group">
			<label class="col-sm-3 control-label">EVENT PERIOD</label>
			<div class="dropdown col-sm-4">
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownEvent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="border-color: darkseagreen;">
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
							<li><a href="Checklist.php?evp_id=<?php echo $evp['evp_id'] ?>"> 
								<?php echo $evp['evp_id']; 
							}?>
						</a></li>
						<?php }

					}
					else
					{
						foreach($EVPs as $evp) 
							{?>
						<li><a href="Checklist.php?evp_id=<?php echo $evp['evp_id']?>"> 
							<?php echo $evp['evp_id']; 
						}?>
					</a></li>

					<?php }
					?>
				</ul>
			</div>
		</div>
		<!-- End of Event Period Dropdown -->

		<!-- Start of Events dropdown -->
		<?php if(isset($_GET['evp_id']) && $evpTitle!="Does not exist") 
		{?>
		<div class="form-group">
			<label class="col-sm-3 control-label">EVENTS</label>
			<div class="dropdown col-sm-4">
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownEvent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="border-color: darkseagreen;">
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
						<li><a href="Checklist.php?evp_id=<?php echo  $_GET['evp_id'] ?>&id=<?php echo $event['event_id'] ?>"> 
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
							<li><a href="Checklist.php?evp_id=<?php echo  $_GET['evp_id'] ?>&id=<?php echo $event['event_id'] ?>"> 
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

		<!-- Start of Checklists -->
		<?php if(isset($_GET['evp_id'])&&isset($_GET['id']) && $eventTitle!="Does not exist"){ ?>
		<div class="form-group">
			<label class="col-sm-3 control-label">CHECKLIST</label>
			<div class="col-sm-4">
				<input type="text" name="checklist" class="form-control" placeholder="Add item" style="border-color: darkseagreen;">
			</div>
			<button type="submit" name="registerChecklist" class="btn btn-info icon icon-circle-with-plus" style=" padding: 0; font-size: 25px; background-color: white; color:darkseagreen; border-color: white;">
			</button>
		</div>
		<?php } ?>
		<!-- End of Checklists -->
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
								<th>Checklist ID</th>
								<th>Checklist</th>
								<th>Event Name</th>
								<th>EVP ID</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($checklists as $checklist) 
						{ ?>
							<tr>
								<th><?php echo $checklist['Checklist ID'];?></th>
								<th><?php echo $checklist['Checklist Name']; ?></th>
								<th><?php echo $checklist['Event Name']; ?></th>
								<th><?php echo $checklist['EVP ID']; ?></th>
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
								<th>Checklist ID</th>
								<th>Checklist</th>
								<th>Event Name</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($checklists as $checklist) 
							{ 
								if($_GET['evp_id'] == $checklist['EVP ID'])
									{?>
								<tr>
									<th><?php echo $checklist['Checklist ID'];?></th>
									<th><?php echo $checklist['Checklist Name']; ?></th>
									<th><?php echo $checklist['Event Name']; ?></th>
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
								<th>Checklist ID</th>
								<th>Checklist</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($checklists as $checklist) 
							{ 
								if($_GET['evp_id'] == $checklist['EVP ID'] && $_GET['id'] == $checklist['Event ID'])
									{?>
								<tr>
									<th><?php echo $checklist['Checklist ID'];?></th>
									<th><?php echo $checklist['Checklist Name']; ?></th>
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

</div>

<?php 
require_once 'views/layouts/footer.php';
?>