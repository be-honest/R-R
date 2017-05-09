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
}
?>