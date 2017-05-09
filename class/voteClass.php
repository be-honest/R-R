<?php 
class voteClass
{

	public function vote($event_id,$user_id)
	{
		try {
			$db = getDB();
			$stmt = $db->prepare("INSERT INTO event_votes(event_id,user_id) VALUES (?,?)");
			$stmt->execute(array($event_id,$user_id));
			$db = null;
			return $stmt;
			
		}catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
			
		}
	}





}