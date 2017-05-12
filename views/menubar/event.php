<?php 
require_once'views/layouts/header.php';
require_once'views/layouts/nav.php';


include('class/eventClass.php');
$eventClass = new eventClass();
$events = $eventClass->getAllEvents();


?>

<div class="container p-t-lg">
	<div class="row">
		<div class="col col-md-10 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel panel-heading">
					<h2>EVENTS</h2>
				</div>
				<div class="panel panel-body">
					<table id="event-data" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Event ID</th>
								<th>Event Period ID</th>
								<th>Date</th>
								<th>Name</th>
								<th>Description</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach( $events as $event) 
							{ ?>
							<tr>
								<th><?php echo $event['event_id'];?></th>
								<th><?php echo $event['evp_id']; ?></th>
								<th><?php echo $event['start_event_date']; ?></th>
								<th><?php echo $event['name']; ?></th>
								<th><?php echo $event['description']; ?></th>
							</tr>
							<?php } ?>
						</tbody>

					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
require_once 'views/layouts/footer.php';
?>