<?php
$userClass = new userClass();
$users = $userClass->getAllUsers();
// var_dump($session_uid);
// print_r($users);
require_once 'views/layouts/header.php';
require_once 'views/layouts/nav.php';
?>


<div class="container p-t-lg">
	<div class="row">
		<div class="col col-md-10 col-md-offset-1">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h2>REGISTER USERS</h2>
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
						     		MEMBER
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
								<th>ID</th>
								<th>Name</th>
								<th>Username</th>
								<th>Password</th>
								<th>User Type</th>							
								<th>Status</th>
								<th>Edit</th>
								
								</tr>
							</thead>
							<tbody>
									<?php 
										foreach($users as $user)
										{
											?> <tr align="center">
												<td><?php echo $user['id'];?></td>
												<td align="left"><?php echo $user['last_name'] . ', ' . $user['first_name'] . ' '. $user['middle_name']?></td>
												<td><?php echo $user['username'];?></td>
												<td><?php echo $user['password'];?></td>
												<td><?php echo $user['user_type'];?></td>
												<td><?php echo $user['user_status'];?></td>
												<td><a href="edit-user.php?id=<?php echo $user['id'];?>"><button type="button" class="btn btn-info-outline" ><span class="icon icon-edit"></span></button></td></a>
					
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