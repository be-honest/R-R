<?php 
class eventClass
{
	public function eventRegistration($event_name,$description,$location,$evp_id,$img)
	{
		try {
			$db = getDB();
			$imgName = $img['name'];

			$image_info = getimagesize($img["tmp_name"]);
			$image_width = $image_info[0];
			$image_height = $image_info[1];

			// var_dump($image_width);
			// var_dump($image_height);
			// 
			$stmt = $db->prepare("INSERT INTO events(name,description,location,evp_id,image) VALUES (?,?,?,?,?)");
			$stmt->execute(array($event_name,$description,$location,$evp_id,$imgName));
			// echo "<meta http-equiv='refresh' content='0'>";
			$stmt = $db->prepare("SELECT MAX(event_id) AS MAX FROM EVENTS");
			$stmt->execute();
			$data=$stmt->fetch();

			move_uploaded_file($img['tmp_name'], "images/" . $imgName);
			
			


			// if(isset($_FILES['image']['name']) and !$_FILES['image']['error']) {
   // // check file if it is really a photo
			// 	$ext = explode('/', $_FILES['image']['type']);
			// 	$ext = $ext[count($ext)-1];
			// 	if($ext != 'jpg' and $ext != 'jpeg' and $ext != 'gif' and $ext != 'png' and $ext != 'bmp') {
   //  // image invalid!
			// 		echo 'Image is invalid';
			// 	} else {
   //  // check the photo if it is larger than 4MB
			// 		if($_FILES['image']['size'] > (4096000)) {
			// 			echo 'Image file size cannot be larger than 4MB!';
			// 		} else {
			// 			$img = 'images/test' . $ext;
   //   // remove any images before
			// 			@unlink($img);
   //   // save image
			// 			move_uploaded_file($_FILES['image']['tmp_name'], $img);
			// 		}
			// 	}
			// }

			$db = null;
			return $data;

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
			$st = $db->prepare("SELECT DISTINCT event_id, events.`evp_id`, start_event_date, name, description,image, isApproved
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
			$st = $db->prepare("SELECT DISTINCT event_id, events.`evp_id`, start_event_date, name, description, image
				FROM EVENTS, event_voting_period
				WHERE events.`evp_id`=event_voting_period.`evp_id` AND events.`evp_id`=?");
			$st->execute(array($id));
			$count=$st->rowCount();
			$data=$st->fetchAll();

			if($count)
				return $data;
			else
				return false;
		} catch (PDOException $e) {

		}

		
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

	public function lastRecord()
	{
		$db = getDB();
		$stmt = $db->prepare("SELECT MAX(event_id) AS MAX FROM EVENTS");
		$stmt->execute();
		$db = null;
		$count=$stmt->rowCount();
		if($count)
		{
			$data = $stmt->fetch();
			return $data;
		}
		else
		{
			return false;
		}
	}

	public function currentRecord()
	{
		$db = getDB();
		$stmt = $db->prepare("SELECT MAX(event_id) AS MAX FROM EVENTS");
		$stmt->execute();
		$db = null;
		$count=$stmt->rowCount();
		if($count)
		{
			$data = $stmt->fetch();
			return $data;
		}
		else
		{
			return false;
		}
	}



}
?>