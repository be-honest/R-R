<?php 
class activityClass
{



	public function addChecklist($name)
	{
		try {
			$db = getDB();
			$stmt = $db->prepare("INSERT INTO activities(event_id,name) VALUES (?,?)");
			$stmt->execute(array(1,$name));
			$db = null;
			return true;

		}catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }
			
		}


	}











     public function adminRegistration($username,$password,$first_name,$last_name,$middle_name,$status_id)
     {
          try{

          $db = getDB();
          $st = $db->prepare("SELECT id FROM users WHERE username=:username");  
          $st->bindParam("username", $username,PDO::PARAM_STR);
          $st->execute();
          $count=$st->rowCount();
          $user_type_id = 1;
          if($count<1)
          {
          $stmt = $db->prepare("INSERT INTO users(user_type_id,username,password,first_name,last_name,middle_name,status_id) VALUES (?,?,?,?,?,?,?)");  
          $stmt->execute(array($user_type_id,$username,$password,$first_name,$last_name,$middle_name,$status_id));
          $uid=$db->lastInsertId();
          $db = null;
          // $_SESSION['uid']=$uid;
          return true;

          }
          else
          {
          $db = null;
          return false;
          }
          
         
          } 
          catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }
     }











}
 ?>