<?php 
require_once 'views/layouts/header.php';
require_once 'views/layouts/nav.php';

include('class/eventClass.php');
include('class/voteClass.php');
include('class/eventPeriodClass.php');

$eventClass = new eventClass();
$eventPeriodClass = new eventPeriodClass();
$voteClass = new voteClass();

//get EVP note: Only Local (computer Time) Conditioned
$EVP=$eventPeriodClass->getCurrentEventPeriod();
$events = $eventClass->getEventsByEVP($EVP['evp_id']);
// var_dump($events);

$userVote = $voteClass->checkUserVote($session_uid,$EVP['evp_id']);
// checks if the user has already voted for this evp
// var_dump($userVote);

if (isset($_POST['voteEvent'])) 
{
	$event_id=$_POST['voteEvent'];
	$user_id=$session_uid;
	$uid=$voteClass->vote($event_id,$user_id);
	// echo "<meta http-equiv='refresh' content='0'>";
	// print_r($uid);
}


?>


<!-- <link rel="stylesheet" href="assets/css/polls.css">
	copied to header.php -->
	<br>
	<div class="container">
		<form method="post" class="form-horizontal" role="form">
			<?php if($EVP&&!$userVote)
			{?>

			

			<?php
			if ($events) { ?>
			<h1>Vote an Event <span class="icon icon-check"></span></h1>
			<h5>Hover image to vote.</h5>

			
			<div class="v-event">
				<?php
				$i=1;
				$c=0;
				foreach($events as $event)
				{

					if ($i>$c&&$i%2==1) {
						?>

					</div>
					<br>
					<div class="v-event">
						<?php
					}

					?>
					<div class="c-hover">
						<label class="poll first" for="event1"
						style="background-image:url('images/<?php echo $event['image'] ?>'); "
						></label> 
						<input id="event1" type="radio" name="events" value="first-poll" hidden />
						<div class="overlay">
							<div class="text">
								<?php echo $event['name']?>
								<p class="text-date" style="font-size: 18px;">
									<?php echo date_format(date_create($event["start_event_date"]),"M d, Y");?></p>
									<p style="font-size: 18px;"><?php echo $event['description']?></p>
									<div>Votes: <span style="color: lime">
									<?php $votes=$voteClass->getEventVoteCount($event['event_id'])["vote_count"]; 
									if ($votes) {
										echo $votes;
									}
									else
									{
										echo '0';
									}
									?>

										
									</span> </div>
								</div>

								<?php if(!$userVote) { ?>
								<button type="button" class="btn btn-default-outline vote" id="voteBtn" href="#msg" data-toggle="modal" value="<?php echo $event['event_id']?>"
									name="<?php echo $event['name']?>" >Vote</button>
									<?php } ?>
								</div>
							</div>

							<?php 
							$i++;
							if ($i%2==0) {
								$i=$c;
							}
						} 
						?>
					</div>
					<br>
					<?php
				}
				else
				{
					echo 'No events';
				}
				?>






				<?php }

				else
					{?>
				<!-- <h1>You have voted for</h1> -->
				<div class="v-event">
					<div class="c-hover">
						<label class="poll first" for="event1"
						style="background-image:url('images/<?php echo $userVote['image'] ?>'); "
						></label> 
						<input id="event1" type="radio" name="events" value="first-poll" hidden />
						<div class="overlay">
							<div class="text">
								<?php echo $userVote['name']?>
								<p class="text-date" style="font-size: 18px;">
									<?php echo date_format(date_create($userVote["start_event_date"]),"M d, Y");?></p>
									<p style="font-size: 18px;"><?php echo $userVote['description']?></p>
									<div>Votes: <span style="color: lime"><?php $votes=$voteClass->getEventVoteCount($userVote['event_id'])["vote_count"]; 
									if ($votes) {
										echo $votes;
									}
									else
									{
										echo '0';
									}
									?></span> </div>
								</div>
								<?php if(!$userVote) { ?>
								<button type="button" class="btn btn-default-outline vote" id="voteBtn" href="#msg" data-toggle="modal" value="<?php echo $userVote['event_id']?>"
									name="<?php echo $userVote['name']?>" >Vote</button>
									<?php } ?>
								</div>
							</div>
						</div>
						
						<br>



						<?php } ?>
<div class="container">
	<div class="row">
    	<!-- Info Card with social icons -->
		<div class="info-card">
				<div class="front">
					<img class="card-image" src="http://i.imgur.com/QHxnyes.jpg?1">
				</div>
			<div class="back">
				<h3>hello</h3>
				<p>
					Globally facilitate timely bandwidth vis-a-vis user friendly core competencies. Uniquely architect covalent e-tailers through viral Lorem ipsum dolor sit amet, con.
				</p>
			</div>
		</div>
		
		
		
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
										<h4 class="modal-title">Are you sure?</h4>
									</div>
			       <!--  <div class="modal-body">
			            <h4>The event has been successfully created!</h4>
			        </div> -->
			        <div class="modal-body">
			        	<p class="confirmMSG"></p>

			        	<!-- <div class="modal-footer"> -->
			        	<div style="display: flex; align-items: center; justify-content: space-around; ">
			        		<button type="submit" class="btn btn-primary voteConfirm" name="voteEvent">
			        			<!-- <span class="icon icon-thumbs-up"></span> -->
			        			Yes 
			        			<?php //$redirect="Activity.php" ?>
			        		</button>
			        		<button class="btn btn-default" data-dismiss="modal">
			        			<!-- <span class="icon icon-thumbs-down"></span> -->
			        			No
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
require_once 'views/layouts/footer.php';
?>