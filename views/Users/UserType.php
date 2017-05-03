<?php 

$userClass = new userClass();
$users = $userClass->getAllUsers();

// print_r($users);
require_once 'views/layouts/header.php';
require_once 'views/layouts/nav.php';
?>


<div class="container p-t-lg">
	<div class="row">
		<div class="col col-md-10 col-md-offset-1">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h4>USERS</h4>
				</div>
				<div class="panel-body">
					<ul class="nav nav-pills">
						<!-- <li class="btn-outline"> -->
						<a href="register-admin.php" class="button">
						  <button type="submit" class=" btn btn-info">	
						      <span class="icon icon-add-user"></span>
						   			ADMIN
						  </button>
						   </a>
						  <!-- </li> -->
						
						<a href="register-user.php">
							  	<button type="submit" class=" btn btn-info">	
						     		<span class="icon icon-users"></span>
						     		USER
								</button>
						</a>
					</ul>
				</div>
			</div>
		</div>	
	</div>
	
</div>

<div class="container">
	<div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div id="imaginary_container"> 
            	<div class="panel panel-info">
            		<div class="panel-body">
		                <table id="user-data" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
							<thead>
								<tr>
								<th>User Type</th>
								<th>Username</th>
								<th>Password</th>
								<th>Status</th>
								<th>Name</th>
								</tr>
							</thead>
							<tbody>
									<?php 
										foreach($users as $user)
										{
											?> <tr>
												<td><?php echo $user['user_type'];?></td>
												<td><?php echo $user['username'];?></td>
												<td><?php echo $user['password'];?></td>
												<td><?php echo $user['user_status'];?></td>
												<td><?php echo $user['last_name'] . ', ' . $user['first_name'] . ' '. $user['middle_name']?></td>
												</tr>
										<?php  } ?>
							</tbody>
						</table>
	                </div>
                </div>
            </div>
        </div>
	</div>
</div>


<?php
require_once 'views/layouts/footer.php';
?>