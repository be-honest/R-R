<?php 
	require_once'views/layouts/header.php';
	require_once'views/layouts/nav.php';
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
 									<th>Event_Id</th>
 									<th>EVP_Id</th>
 									<th>Name</th>
 									<th>Description</th>
 									<th>Location</th>
 								</tr>
 							</thead>
 							
 						</table>
 					</div>
			</div>
		</div>
	</div>
</div>

<?php 
	require_once 'views/layouts/footer.php';
 ?>