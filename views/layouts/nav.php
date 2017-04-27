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
				<li>
         		   <a href="#">Profile</a>
        		</li>
				<li>
					<a href="users.php">Users</a>
				</li>
				<li>
					<a href="#">Events</a>
				</li>
				<li>
					<a data-toggle="modal" href="#msgModal">Polls</a>
				</li>
			</ul>

			<ul class="nav navbar-nav navbar-right m-r-0 hidden-xs">
				<li >
					<a class="app-notifications" href="notifications/index.html">
						<span class="icon icon-bell"></span>
					</a>
				</li>
				<li>
					<button class="btn btn-default navbar-btn navbar-btn-avitar" data-toggle="popover">
						<img class="img-circle" src="assets/img/avatar-dhg.png">
					</button>
				</li>
			</ul>

			<form class="navbar-form navbar-right app-search" role="search">
				<div class="form-group">
					<input type="text" class="form-control" data-action="grow" placeholder="Search">
				</div>
			</form>

			<ul class="nav navbar-nav hidden-sm hidden-md hidden-lg">
				<li><a href="index.html">Home</a></li>
				<li><a href="profile/index.html">Profile</a></li>
				<li><a href="#">Users</a></li>
				<li><a href="docs/index.html">Events</a></li>
				<li><a data-toggle="modal" href="#msgModal">Polls</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>

			<ul class="nav navbar-nav hidden">
				<li><a href="#" data-action="growl">Profile</a></li>
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
			<!-- <div class="modal-body p-a-0 js-modalBody">
				<div class="modal-body-scroller">
					<div class="media-list media-list-uders list-group js-msgGroup">
						<a href="#">a</a>
						<a href="#">b</a>
						<a href="#">c</a>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</div>