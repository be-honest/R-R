<?php 
class eventPeriodClass
{
	public function eventPeriodRegistration($user_id,$start_date,$end_date,$start_event_date,$end_event_date,$uid,$event_status)
	{
		try {
			$db = getDB();
			$stmt = $db->prepare("INSERT INTO event_voting_period(user_id,event_status_id,start_date,end_date,start_event_date,end_event_date) VALUES (?,?,?,?,?,?)");
			$stmt->execute(array($user_id, $event_status, $start_date, $end_date, 
				$start_event_date,$end_event_date));
			echo "<meta http-equiv='refresh' content='0'>";
			$db = null;

			return $stmt;

		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
		}
	}

	public function getAllEventPeriod()
	{
		try {
			$db = getDB();
          // $st = $db->prepare("SELECT * FROM users");  
			$st = $db->prepare("SELECT evp_id, user_id, event_status.`event_status_id`, start_date, end_date, start_event_date, end_event_date, description
				FROM event_voting_period, event_status
				WHERE event_voting_period.`event_status_id` = event_status.`event_status_id`");
			$st->execute();
			$data=$st->fetchAll();
		} catch (PDOException $e) {

		}

		return $data;
	}

	public function getEventPeriod($id)
	{
		try {
			$db = getDB();      
			$st = $db->prepare("SELECT * FROM event_voting_period WHERE evp_id=?");
			// $st->bindParam("event_id", $id,PDO::PARAM_STR);
			$st->execute(array($id));
			$count=$st->rowCount(); 
			if($count)
			{
				$data = $st->fetch();
				return $data;
			}
			else 
				return false;
		} catch (PDOException $e) {

		}

	}


	//Get the Event Period as of today
	public function getCurrentEventPeriod()
	{
		try {
			$today = date("Y-m-d");
			$db = getDB();      
			$st = $db->prepare("SELECT *
				FROM event_voting_period
				WHERE start_date <= ? && end_date >= ?");
			$st->execute(array($today,$today));
			$count=$st->rowCount(); 
			if($count)
			{
				$data = $st->fetch();
				return $data;
			}
			else 
				return false;
		} catch (PDOException $e) {

		}

	}

	public function getEventsCountByEVP($evp_id)
	{
		try {
			$db = getDB();      
			$st = $db->prepare("SELECT COUNT(*) AS 'count'
				FROM EVENTS
				WHERE evp_id=?");
			$st->execute(array($evp_id));
			$count=$st->rowCount(); 
			if($count)
			{
				$data = $st->fetch();
				return $data;
			}
			else 
				return false;
		} catch (PDOException $e) {
		}
	}

	public function closeEvent($evp_id,$event_id)// closes the event the event Period and approve the winning event
	{
		try {
			$db = getDB();      
			$st = $db->prepare("UPDATE event_voting_period, EVENTS
				SET event_status_id=3, isApproved=1
				WHERE event_voting_period.`evp_id`=? AND event_id=?
				");
			$st->execute(array($evp_id,$event_id));
			$count=$st->rowCount(); 
			return true;
		} catch (PDOException $e) {
		}
	}

	public function getApprovedEventByEVP($evp_id)
	{
		try {
			$db = getDB();      
			$st = $db->prepare("SELECT *
				FROM EVENTS
				WHERE evp_id=? AND isApproved=1");
			$st->execute(array($evp_id));
			$count=$st->rowCount(); 
			if($count)
			{
				$data = $st->fetch();
				return $data;
			}
			else 
				return false;
		} catch (PDOException $e) {
		}
	}




}
?>