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

     /* admin Registration */
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
          /*$stmt->bindParam("user_type_id", $user_type_id,PDO::PARAM_STR) ;
          $stmt->bindParam("username", $username,PDO::PARAM_STR) ;
          $stmt->bindParam("password", $password,PDO::PARAM_STR) ;
          $stmt->bindParam("first_name", $first_name,PDO::PARAM_STR) ;
          $stmt->bindParam("last_name", $last_name,PDO::PARAM_STR) ;
          $stmt->bindParam("status_id", $status_id,PDO::PARAM_STR) ;*/

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

     public function userRegistration($username,$password,$first_name,$last_name,$middle_name,$status_id)
     {
          try{

          $db = getDB();
          $st = $db->prepare("SELECT id FROM users WHERE username=:username");  
          $st->bindParam("username", $username,PDO::PARAM_STR);
          $st->execute();
          $count=$st->rowCount();
          $user_type_id = 2;
          if($count<1)
          {
          $stmt = $db->prepare("INSERT INTO users(user_type_id,username,password,first_name,last_name,middle_name,status_id) VALUES (?,?,?,?,?,?,?)");  
          /*$stmt->bindParam("user_type_id", $user_type_id,PDO::PARAM_STR) ;
          $stmt->bindParam("username", $username,PDO::PARAM_STR) ;
          $stmt->bindParam("password", $password,PDO::PARAM_STR) ;
          $stmt->bindParam("first_name", $first_name,PDO::PARAM_STR) ;
          $stmt->bindParam("last_name", $last_name,PDO::PARAM_STR) ;
          $stmt->bindParam("status_id", $status_id,PDO::PARAM_STR) ;*/

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
     
     public function getAllUsers()
     {
     try {
          $db = getDB();
          $st = $db->prepare("SELECT * FROM users");  
          $st->execute();
          $data=$st->fetchAll();



          } catch (PDOException $e) {
     
          }
          return $data;
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