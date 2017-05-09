<?php 
	require_once'views/layouts/header.php';
	require_once'views/layouts/nav.php';
 ?>

 
<div class="container p-t-lg">
	
	<form action="post" class="form-horizontal" role="form">
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
					Choose Event
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" aria-labelledby="dropdownEvent">
					<li><a href="#">Event 1</a></li>
					<li><a href="#">Event 2</a></li>
					<li><a href="#">Event 3</a></li>
				</ul>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">ACTIVITIES</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" placeholder="Add an acitivity" style="border-color: darksalmon;">
			</div>
				<button type="submit" class="btn btn-info icon icon-circle-with-plus" style=" padding: 0; font-size: 25px; background-color: white; color:darksalmon; border-color: white;">
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



<?php 
	require_once 'views/layouts/footer.php';
?>