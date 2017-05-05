<?php 
class eventPeriodClass
{
	public function eventPeriodRegistration($start_date,$end_date,$start_event_date,$end_event_date,$uid)
	{
		try {
			$db = getDB();
			$stmt = $db->prepare("INSERT INTO event_voting_period(user_id,start_date,end_date,start_event_date,end_event_date) VALUES (?,?,?,?,?)");
			$stmt->execute(array($start_date,$end_date,$start_event_date,$end_event_date));
			$db = null;

			return true;

		} catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
			
		}
	}
}
 ?>