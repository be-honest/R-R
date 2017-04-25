<?php
class userClass
{
	 /* User Login */
     public function userLogin($username,$password)
     {

          $db = getDB();
          $stmt = $db->prepare("SELECT id FROM users WHERE username=:username AND  password=:password");  
          $stmt->bindParam("username", $username,PDO::PARAM_STR) ;
          $stmt->bindParam("password", $password,PDO::PARAM_STR) ;
          $stmt->execute();
          $count=$stmt->rowCount();
          $data=$stmt->fetch(PDO::FETCH_OBJ);
          $db = null;
          if($count)
          {
                $_SESSION['user_id']=$data->id;
                return true;
          }
          else
          {
               return false;
          }    
     }

     /* User Registration */
     public function userRegistration($username,$password,$name)
     {
          try{
          $db = getDB();
          $st = $db->prepare("SELECT uid FROM users WHERE username=:username OR email=:email");  
          $st->bindParam("username", $username,PDO::PARAM_STR);
          $st->bindParam("email", $email,PDO::PARAM_STR);
          $st->execute();
          $count=$st->rowCount();
          if($count<1)
          {
          $stmt = $db->prepare("INSERT INTO users(username,password,email,name) VALUES (:username,:hash_password,:email,:name)");  
          $stmt->bindParam("username", $username,PDO::PARAM_STR) ;
          $hash_password= hash('sha256', $password);
          $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
          $stmt->bindParam("email", $email,PDO::PARAM_STR) ;
          $stmt->bindParam("name", $name,PDO::PARAM_STR) ;
          $stmt->execute();
          $uid=$db->lastInsertId();
          $db = null;
          $_SESSION['uid']=$uid;
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
     
     /* User Details */
     public function userDetails($user_id)
     {
        try{
          $db = getDB();
          $stmt = $db->prepare("SELECT username,last_name FROM users WHERE id=:user_id");  
          $stmt->bindParam("user_id", $user_id,PDO::PARAM_INT);
          $stmt->execute();
          $data = $stmt->fetch(PDO::FETCH_OBJ);
          return $data;
         }
         catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }

     }


}
?>