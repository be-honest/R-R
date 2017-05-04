<?php 
require_once 'views/layouts/header.php';
require_once 'views/layouts/nav.php';
 ?>

<div class="container">
	<br>

	<form class="form-horizontal" role="form">
	<br>
		<div class="form-group">
			<label class="col-md-2" style="display: inline-flex; justify-content: flex-end;">Date Voting Period</label>
			<div class="col-md-3" style="padding: 0;">
				<input type="text" name="datefilter" class="form-control" style="padding: 0; text-align: center;" />
			</div>
			<button type="submit" class="btn btn-info" style="float: right; padding: 0.5em; margin-right: 20px; width: 100px;">
				<strong>ADD</strong>
			</button>
		</div>

		<div class="form-group">
			<label class="col-md-2" style="display: inline-flex; justify-content: flex-end;">Event Date</label>
			<div class="col-md-3" style="padding: 0;">
				<input type="text" name="eventdate" class="form-control" style="padding: 0; text-align: center;" />
			</div>
		</div>

		<!-- TABLE -->
		
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="imaginary_container">
					<div class="panel panel-info">
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
										<td> </td>
										<td> </td>
										<td> </td>
										<td> </td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

	
	
</form>

</div>















 <?php 
 require_once 'views/layouts/footer.php';
  ?>