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
	// public function getEvents($id)
	// {
	// 	try {
	// 		$db = getDB(); 
	// 		$st = $db->prepare("SELECT DISTINCT * 
	// 			FROM EVENTS,event_voting_period
	// 			WHERE events.`evp_id`=event_voting_period.`evp_id` AND events.`evp_id`=?");
	// 		$st->execute(array($id));
	// 		$data=$st->fetchAll();
	// 	} catch (PDOException $e) {
	// 	}
	// 	return $data;
	// }

	public function getAllEvents()
	{
		try {
			$db = getDB();
          //$st = $db->prepare("SELECT * FROM users");  
			$st = $db->prepare("SELECT DISTINCT event_id, events.`evp_id`, start_event_date, name, description
				FROM EVENTS, event_voting_period
				WHERE events.`evp_id`=event_voting_period.`evp_id`");
			$st->execute();
			$data=$st->fetchAll();
		} catch (PDOException $e) {

		}

		return $data;
	}

	public function getEventsByEVP($id)
	{
		try {
			$db = getDB();
          //$st = $db->prepare("SELECT * FROM users");  
			$st = $db->prepare("SELECT DISTINCT event_id, events.`evp_id`, start_event_date, name, description
				FROM EVENTS, event_voting_period
				WHERE events.`evp_id`=event_voting_period.`evp_id` AND events.`evp_id`=?");
			$st->execute(array($id));
			$data=$st->fetchAll();
		} catch (PDOException $e) {

		}

		return $data;
	}

	public function getEvent($id)
	{
		try {
			$db = getDB();      
			$st = $db->prepare("SELECT * FROM events WHERE event_id=?");
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

	public function checkEventCount($id)
	{
		$db = getDB();
		$stmt = $db->prepare("SELECT event_id FROM events WHERE event_id=?");  
		$stmt->execute(array($id));
		$count=$stmt->rowCount();
		$data=$stmt->fetch(PDO::FETCH_OBJ);
		$db = null;
		if($count)
		{
			return true;
		}
		else
		{
			return false;
		}    
	}



}
?>