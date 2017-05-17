<?php 
require_once 'views/layouts/header.php';
require_once 'views/layouts/nav.php';
?>
<br>
<div class="container">
	<form method="post" class="form-horizontal" role="form">
		<h3>Vote an Event</h3>
		<h5>Click image to vote.</h5>
		<div class="v-event">
			<input id="event1" type="radio" name="event1" value="first-poll" hidden />
			<label class="poll first" for="event1"><!-- vpoll --></label> 
			<input id="event2" type="radio" name="event1" value="second-poll" hidden/>
			<label class="poll second" for="event2"></label>
		</div>
	</form>
</div>








<?php 
	//require_once 'views/layouts/footer.php';
 ?>