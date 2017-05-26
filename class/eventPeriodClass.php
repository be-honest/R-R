<?php 
class eventPeriodClass
{
	public function eventPeriodRegistration($start_date,$end_date,$start_event_date,$end_event_date,$uid,$event_status)
	{
		try {
			$db = getDB();
			$stmt = $db->prepare("INSERT INTO event_voting_period(user_id,event_status_id,start_date,end_date,isOpen,start_event_date,end_event_date) VALUES (?,?,?,?,?,?,?)");
			$isOpen=1;
			$stmt->execute(array(1, $event_status, $start_date, $end_date, $isOpen, 
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
			$st = $db->prepare("SELECT * FROM event_voting_period");
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
}
?>