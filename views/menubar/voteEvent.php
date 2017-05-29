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
$NumOfEvents=$eventPeriodClass->getEventsCountByEVP($EVP["evp_id"])["count"];
// var_dump($events);

$userVote = $voteClass->checkUserVote($session_uid,$EVP['evp_id']);
$userCount=$userClass->getActiveUserCount();
$voteCount=$voteClass->getVoteCount($EVP['evp_id']);

// checks if the user has already voted for this evp
// var_dump($userVote);

if (isset($_POST['voteEvent'])) 
{
	$event_id=$_POST['voteEvent'];
	$user_id=$session_uid;
if(($voteCount+1)==$userCount)
{
	echo 'You are the last voter';
	//var_dump($voteClass->getMaxVoteByEvp($EVP['evp_id'])['event_id']);//  id of the most voted event
}
else
{
	echo 'No!';
}
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
					<!-- Voted event -->
										<!-- <span class="eventTitle">&nbsp;&nbsp;</span> -->
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
									
									<button type="button" class="btn btn-default-outline vote" id="voteBtn">More...
									</button>
									
								</div>
							</div>

							<!-- end of voted event -->

							<!-- start of unvoted event, first four xtra events -->
							<div>
								<div>
							<?php 
							$i=1;
							$c=0;
							foreach($events as $event)
							{ 
								if ($event['event_id']!=$userVote['event_id'])
								{

								?>
								<!-- first row -->
									<div class="col-xs-12 col-sm-6 col-md-3 col-lg-6">
										<a class="list-quotes" href="">
											<!-- Recommended size 360X360 -->
											<img class='img-responsive' alt="img" src="images/<?php echo $event['image'] ?>">
											<div class="quotes">
												<h1>Votes: <span style="color: lime">
										<?php $votes=$voteClass->getEventVoteCount($event['event_id'])["vote_count"]; 
										if ($votes) {
											echo $votes;
										}
										else
										{
											echo '0';
										}
										?>	
									</span>
									</h1>
												<p>
													<?php echo $event['name']?><br><span>...Read More</span>
												</p>
											</div>
										</a>
									</div>
					<?php 
				}
			} 
									?>
									
								<!-- end of first row -->
								<!-- second row -->
<!-- 								<div>
									<div class="col-xs-12 col-sm-6 col-md-3 col-lg-6">
										<a class="list-quotes" href="">
											<img class='img-responsive' alt="img" src="https://img.sheroes.in/img/uploads/article/high_res/Woman-Traveling-Alone-1-1000x500.jpg">
											<div class="quotes">
												<h1>Lorem ipsum dolor</h1>
												<p>
													Lorem ipsum dolor sit amet, consectetur adipiscing elit. <span>...Read More</span>
												</p>
											</div>
										</a>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-3 col-lg-6">
										<a class="list-quotes" href="">
											<img class='img-responsive' alt="img" src="https://img.sheroes.in/img/uploads/article/high_res/Woman-Traveling-Alone-1-1000x500.jpg">
											<div class="quotes">
												<h1>Lorem ipsum dolor</h1>
												<p>
													Lorem ipsum dolor sit amet, consectetur adipiscing elit. <span>...Read More</span>
												</p>
											</div>
										</a>
									</div>
								</div> -->
								<!-- end of second row -->
							</div>
							<!-- end of unvoted event, first four xtra events -->
						</div>

					</div>
					<br><br><br><br>
					<?php } ?>

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