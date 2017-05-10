<?php 
require_once'views/layouts/header.php';
require_once'views/layouts/nav.php';

include('config.php');
include('class/eventClass.php');
$eventClass = new eventClass();
$events = $eventClass->getAllEvents();

if(!isset($_GET['id']))
{
	$title="Choose Activity";
}

if(isset($_GET['id']))
{
	$ev = $eventClass->getEvent($_GET['id']);
	// var_dump($_GET['event_id']);
	if ($ev) 
	{
		$title=$ev['name'];
	}
	else
	{
		$title="Does not exist";
		//event does not exist
	}
}
?>


<div class="container p-t-lg">
	
	<form method="post" action="post" class="form-horizontal" role="form">
		<br>
		<h2 style="font-size: 50px; color: darksalmon; ">

			Event Activity <span class="icon icon-light-up"></span>
		</h2>
		<hr style="border-color:darksalmon;"">
		<br>
		<div class="form-group">
			<label class="col-sm-3 control-label">EVENTS</label>
			<div class="dropdown col-sm-4">
				<button class="btn btn-default dropdown-toggle" type="button" id="dropdownEvent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="border-color: darksalmon;">
					<?php echo $title ?>
					<span class="caret"></span>
				</button>

				<ul class="dropdown-menu" aria-labelledby="dropdownEvent">

					<?php //if there is no id posted in the url
					if(!isset($_GET['id']))
					{
						foreach( $events as $event) 
						{?>
						
							<li><a href="Activity.php?id=<?php echo $event['event_id'] ?>"> 
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
							<li><a href="Activity.php?id=<?php echo $event['event_id'] ?>"> 
								<?php echo $event['name']; 
						}?>
							</a></li>
			  			<?php }
			  		}
			  		 ?>

						</ul>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">ACTIVITIES</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Add an acitivity" style="border-color: darksalmon;">
					</div>
					<button type="submit" name="addActivity" class="btn btn-info icon icon-circle-with-plus" style=" padding: 0; font-size: 25px; background-color: white; color:darksalmon; border-color: white;">
					</button>
				</div>
			</form>
			<br>
			<div class="row">
				<div class="form col-sm-10 col-sm-offset-1">
					<div class="panel panel-info">
						<div class="panel panel-body">
							<table id="act" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Activities</th>
									</tr>
								</thead>

							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
<!-- modal -->
		<!-- <div class="modal">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						    <h4 class="modal-title">Alert</h4>
					</div>
					<div class="modal-body">
						
					</div>
				</div>
			</div>
		</div>
 -->

		<?php 
		require_once 'views/layouts/footer.php';
		?>