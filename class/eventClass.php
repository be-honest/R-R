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
}
 ?>