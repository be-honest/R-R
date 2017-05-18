<?php 
require_once 'views/layouts/header.php';
require_once 'views/layouts/nav.php';
?>
<link rel="stylesheet" href="assets/css/polls.css">
<br>
<div class="container">
	<form method="post" class="form-horizontal" role="form">
		<h1>Vote an Event <span class="icon icon-check"></span></h1>

		<h5>Click image to vote.</h5>
		<div class="v-event">
			<div class="c-hover">
				<label class="poll first" for="event1"></label> 
				<input id="event1" type="radio" name="events" value="first-poll" hidden />
					<div class="overlay">
						<div class="text">
							EVENT NAME
							<p class="text-muted" style="font-size: 18px;">Date: March 2017</p>
							<p style="font-size: 18px;">The quick brown fox jumps over the lazy dog.</p>
						</div>
						<button class="btn btn-default-outline" id="voteBtn" href="#msg" data-toggle="modal">Vote</button>
					</div>
			</div>
			<div class="c-hover">
				<label class="poll second" for="event1"></label> 
				<input id="event1" type="radio" name="events" value="first-poll" hidden />
					<div class="overlay">
						<div class="text">
							EVENT NAME
							<p class="text-muted" style="font-size: 18px;">Date: March 2017</p>
							<p style="font-size: 18px;">The quick brown fox jumps over the lazy dog.</p>
						</div>
						<button type="button" class="btn btn-primary-outline" id="voteBtn" href="#msg" data-toggle="modal">Vote</button>
					</div>
			</div>
			</div>
		
			<!-- <div class="v-event">
				<div class="c-hover">
					<label class="poll second" for="event1"></label> 
					<input id="event1" type="radio" name="events" value="first-poll" hidden />
						<div class="overlay">
							<div class="text">
								EVENT NAME
								<p class="text-muted" style="font-size: 18px;">Date: March 2017</p>
								<p style="font-size: 18px;">The quick brown fox jumps over the lazy dog.</p>
							</div>
							<button class="btn btn-primary-outline" id="voteBtn" href="#msg" data-toggle="modal">Vote</button>
						</div>
				</div>
				<div class="c-hover">
					<label class="poll first" for="event1"></label> 
					<input id="event1" type="radio" name="events" value="first-poll" hidden />
						<div class="overlay">
							<div class="text">
								EVENT NAME
								<p class="text-muted" style="font-size: 18px;">Date: March 2017</p>
								<p style="font-size: 18px;">The quick brown fox jumps over the lazy dog.</p>
							</div>
							<button class="btn btn-primary-outline" id="voteBtn" href="#msg" data-toggle="modal">Vote</button>
						</div>
				</div>
				</div>
 <-->	
 			<div class="v-event">
				<div class="c-hover">
					<input id="event2" type="radio" name="event2" value="second-poll" hidden/>
					<label class="poll second" for="event2"></label>
				</div>
			</div>
				
			<!-- modal -->
			  <div class="modal fade" id="msg" tabindex="-1" role="dialog" aria-labelledby="msg" aria-hidden="true">
			    <div class="modal-dialog">
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			            &times;
			            <!-- <span aria-hidden="true">x</span> -->
			          </button>
			          <h4 class="modal-title">The event has been successfully created!</h4>
			        </div>
			       <!--  <div class="modal-body">
			            <h4>The event has been successfully created!</h4>
			          </div> -->
			          <div class="modal-body">
			            <p>Do you wish to add an activity?</p>

			        <!-- <div class="modal-footer"> -->
			          <div style="display: flex; align-items: center; justify-content: space-around; ">
			            <button class="btn btn-default" data-dismiss="modal">
			              <span class="icon icon-thumbs-down"></span>

			                No
			              </button>
			              <button type="submit" class="btn btn-primary" name="registerEvent">
			                <span class="icon icon-thumbs-up"></span>
			                Yes 
			                <?php //$redirect="Activity.php" ?>
			              </button>
			            </div>
			          </div>
			        </div>

			      </div>
			    </div>
			  </div>

			<!-- end of modal -->
			
		
	</form>
</div>








<?php 
	//require_once 'views/layouts/footer.php';
 ?>