<?php 
	require_once'views/layouts/header.php';
	require_once'views/layouts/nav.php';
 ?>

 
<div class="container">
	<br><br>
	<form action="post" class="form-horizontal" role="form">
	<br><br>
		<div class="form-group">
			<label class="col-lg-1">Activities</label>
			<div class="col-lg-4">
				<input type="text" class="form-control" placeholder="Add an acitivity" style="border-color: cadetblue;">
			</div>
				<button type="submit" class="btn btn-info icon icon-circle-with-plus" style=" padding: 0; font-size: 25px; background-color: white; color:#3097d1; border-color: white;">
				</button>
		</div>
	</form>

</div>



<?php 
	require_once 'views/layouts/footer.php';
?>