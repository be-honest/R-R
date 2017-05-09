<?php 
class eventClass
{
	public function eventRegistration($event_name,$description,$location)
	{
		try {
			$db = getDB();
			$stmt = $db->prepare("INSERT INTO events(name,description,location) VALUES (?,?,?)");
			$stmt->execute(array($event_name,$description,$location));
			$db = null;

			return true;

		} catch(PDOException $e) {
			echo '{"error":{"text":'. $e->getMessage() .'}}'; 
			
		}
	}

	//Get events by evp id
	public function getEvents($id)
	{
		try {
			$db = getDB(); 
			$st = $db->prepare("SELECT DISTINCT * 
			FROM EVENTS,event_voting_period
			WHERE events.`evp_id`=event_voting_period.`evp_id` AND events.`evp_id`=?");
			$st->execute(array($id));
			$data=$st->fetchAll();
		} catch (PDOException $e) {

		}

		return $data;
	}



}
?>