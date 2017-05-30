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
			$data=$stmt->fetchAll();
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
			$stmt = $db->prepare("SELECT r.event_id, r.evp_id, r.vote_count FROM (
SELECT ev.event_id, ep.evp_id, (COUNT(ev.user_id)) AS Vote_count
FROM `events` AS e 
LEFT JOIN `event_votes` AS ev ON ev.`event_id` = e.event_id
LEFT JOIN `event_voting_period` AS ep ON ep.evp_id = e.evp_id 
WHERE ev.event_id IS NOT NULL  
GROUP BY ev.event_id
ORDER BY Vote_count DESC) r
WHERE r.evp_id=? AND r.vote_count = (
SELECT MAX(r.vote_count) FROM (SELECT ev.event_id, ep.evp_id, (COUNT(*)) AS Vote_count FROM `events` AS e LEFT JOIN `event_votes` AS ev ON ev.`event_id` = e.event_id LEFT JOIN `event_voting_period` AS ep ON ep.evp_id = e.evp_id WHERE ev.event_id IS NOT NULL  GROUP BY ev.event_id ORDER BY Vote_count)r)
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