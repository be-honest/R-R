<?php 
class voteClass
{

	public function vote($event_id,$user_id)
	{
		try {
			$db = getDB();
			$stmt = $db->prepare("INSERT INTO event_votes(event_id,user_id) VALUES (?,?)");
			$stmt->execute(array($event_id,$user_id));
			echo "<meta http-equiv='refresh' content='0'>";
			$db = null;
			return $stmt;
			
		}catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
			
		}
	}

	//checks if a user has already voted in the evp, r
	public function checkUserVote($user_id,$evp_id)
	{
		try {
			$db = getDB();
			$stmt = $db->prepare("SELECT *
				FROM event_votes,EVENTS,event_voting_period
				WHERE events.`event_id`= event_votes.`event_id` AND event_votes.`user_id`=? AND event_voting_period.`evp_id`=? AND events.`evp_id`= event_voting_period.`evp_id`");
			$stmt->execute(array($user_id,$evp_id));
			$count=$stmt->rowCount();
			$db = null;
			$data=$stmt->fetch();
			if ($count) {
				return $data;
			}
			else
			{
				return false;
			}
			
		}catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
			
		}
	}

	public function getVoteCounts()
	{
		try {
			$db = getDB();
			$stmt = $db->prepare("SELECT events.`event_id`,events.`evp_id`, COUNT(event_votes.`user_id`) AS vote_count
				FROM event_votes,EVENTS,event_voting_period
				WHERE events.`event_id`=event_votes.`event_id` AND event_voting_period.`evp_id`=events.`evp_id`
				GROUP BY events.`event_id`
				");
			$stmt->execute();
			$count=$stmt->rowCount();
			$db = null;
			$data=$stmt->fetch();
			if ($count) {
				return $data;
			}
			else
			{
				return false;
			}

		}catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
			
		}
	}

	public function getEventVoteCount($event_id)
	{
		try {
			$db = getDB();
			$stmt = $db->prepare("SELECT events.`event_id`,events.`evp_id`, COUNT(event_votes.`user_id`) AS vote_count
				FROM event_votes,EVENTS,event_voting_period
				WHERE events.`event_id`=event_votes.`event_id` AND event_voting_period.`evp_id`=events.`evp_id` AND events.`event_id`=?
				GROUP BY events.`event_id`
				");
			$stmt->execute(array($event_id));
			$count=$stmt->rowCount();
			$db = null;
			$data=$stmt->fetch();
			if ($count) {
				return $data;
			}
			else
			{
				return false;
			}

		}catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
			
		}
	}

	public function getVoteCount($evp_id)
	{
		try {
			$db = getDB();      
			$st = $db->prepare("SELECT * FROM EVENTS,event_votes WHERE events.`event_id`=event_votes.`event_id` AND events.`evp_id`=?");
			$st->execute(array($evp_id));
			$count=$st->rowCount(); 
			if($count)
			{
				return $count;
			}
			else 
				return false;
		} catch (PDOException $e) {

		}

	}

	public function getMaxVoteByEvp($evp_id)
	{
		try {
			$db = getDB();
			$stmt = $db->prepare("SELECT event_id, MAX(vote_Count) AS vote_count
FROM (SELECT events.`event_id`,events.`evp_id`, COUNT(event_votes.`user_id`) AS vote_count
				FROM event_votes,EVENTS,event_voting_period
				WHERE events.`event_id`=event_votes.`event_id` AND event_voting_period.`evp_id`=events.`evp_id` AND event_voting_period.`evp_id`=?
				GROUP BY events.`event_id`) AS voteCount
				");
			$stmt->execute(array($evp_id));
			$count=$stmt->rowCount();
			$db = null;
			$data=$stmt->fetch();
			if ($count) {
				return $data;
			}
			else
			{
				return false;
			}

		}catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
			
		}
	}







}