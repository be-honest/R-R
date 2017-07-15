<?php 	
	$uname = $userClass->getUser($session_uid);
	$nav_picture=$userClass->getUser($session_uid)["profile_picture"];

?>
<nav class="navbar navbar-inverse navbar-fixed-top app-navbar">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-main">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">
				<img class="brand" src="assets/img/mountain1.png" alt="logo">
			</a>
		</div>
		<div class="navbar-collapse collapse" id="navbar-collapse-main">

			<ul class="nav navbar-nav hidden-xs">
				<li class="active">
					<a href="home.php">Home</a>
				</li>
				<li class="dropdown">
         		   <a class="dropbtn" href="Profile.php">Profile</a>
         		   		<div class="dropdown-content">
         		   			<a href="Profile.php">View Profile</a>
         		   		</div>
         		   			
         		   		
        		</li>
        		<?php if($user_type==1) 
        		{?>
				<li class="dropdown">
         		   <a class="dropbtn" href="users.php">Users</a>
         		   		<div class="dropdown-content">
         		   			<a href="register-admin.php">Administrator</a>
         		   			<a href="register-user.php">Member</a>
         		   		</div>
        		</li>
				<li class="dropdown">
					<a class="dropbtn" href="Events.php">Events</a>
						<div class="dropdown-content">
							<a href="CreateEvent.php">Create Event</a>
							<a href="Activity.php">Activity</a>
							<a href="Checklist.php">Checklist</a>
						</div>
				</li>
				<?php } ?>
				<li>
					<a href="eventPoll.php">Poll</a>
				</li>
			</ul>

			<ul class="nav navbar-nav navbar-right m-r-0 hidden-xs">
				<li >
					<a href="Profile.php"><?php echo $uname['first_name'] . " " .$uname['last_name']?></a>

				</li>
				<li>
					<button class="btn btn-default navbar-btn navbar-btn-avitar" data-toggle="popover">
						<img class="img-circle" src="assets/img/users/<?php echo $nav_picture ?>">
					</button>
				</li>
			</ul>


<!-- navbar hidden -->
			<ul class="nav navbar-nav hidden-sm hidden-md hidden-lg">
				<li><a href="home.php">Home</a></li>
				<li><a href="profile.php">Profile</a></li>
				<li><a href="users.php">Users</a></li>
				<li><a href="Events.php">Events</a></li>
				<li><a data-toggle="modal" href="#msgModal">Polls</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>

			<ul class="nav navbar-nav hidden">
				<li> Welcome, <?php echo $uname['first_name']; ?>!</li>


				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</div>	
	
</nav>

<div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="msgModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<button type="button" class="btn btn-sm btn-primary pull-right app-new-msg js-newMsg"><i class="fa fa-plus-square-o"></i>  Add new poll</button>
				<h4 class="modal-title">Polls</h4>
			</div>

		</div>
	</div>
</div>