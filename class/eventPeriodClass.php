<?php 
class eventPeriodClass
{
	public function eventPeriodRegistration($start_date,$end_date,$start_event_date,$end_event_date,$uid,$event_status)
	{
		try {
			$db = getDB();
			$stmt = $db->prepare("INSERT INTO event_voting_period(user_id,event_status_id,start_date,end_date,isOpen,start_event_date,end_event_date) VALUES (?,?,?,?,?,?,?)");
			$isOpen=1;
			$stmt->execute(array($uid, $event_status, $start_date, $end_date, $isOpen, 
				$start_event_date,$end_event_date));
			$db = null;

			return true;

		} catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
			
		}
	}
}
 ?>