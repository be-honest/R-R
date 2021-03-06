<?php
class userClass 
{    
  /* User Login */
  public function userLogin($username,$password)
  {

    $db = getDB();
    $stmt = $db->prepare("SELECT id,user_type_id FROM users WHERE username=:username AND  password=:password");  
    $stmt->bindParam("username", $username,PDO::PARAM_STR) ;
    $stmt->bindParam("password", $password,PDO::PARAM_STR) ;
    $stmt->execute();
    $count=$stmt->rowCount();
    $data=$stmt->fetch(PDO::FETCH_OBJ);
    $db = null;
    if($count)
    {
      $_SESSION['user_id']=$data->id;
      $_SESSION['user_type_id']=$data->user_type_id;
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
    $user_type_id = 1;//1 for admin
    if($count<1)
    {
      $stmt = $db->prepare("INSERT INTO users(user_type_id,username,password,first_name,last_name,middle_name,status_id,profile_picture) VALUES (?,?,?,?,?,?,?,?)");  
          /*$stmt->bindParam("user_type_id", $user_type_id,PDO::PARAM_STR) ;
          $stmt->bindParam("username", $username,PDO::PARAM_STR) ;
          $stmt->bindParam("password", $password,PDO::PARAM_STR) ;
          $stmt->bindParam("first_name", $first_name,PDO::PARAM_STR) ;
          $stmt->bindParam("last_name", $last_name,PDO::PARAM_STR) ;
          $stmt->bindParam("status_id", $status_id,PDO::PARAM_STR) ;*/

          $stmt->execute(array($user_type_id,$username,$password,$first_name,$last_name,$middle_name,$status_id,'default-user.jpg'));
          // echo "<meta http-equiv='refresh' content='0'>";
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

    /* member Registration */
    public function userRegistration($username,$password,$first_name,$last_name,$middle_name,$status_id)
    {
      try{

        $db = getDB();
        $st = $db->prepare("SELECT id FROM users WHERE username=:username");  
        $st->bindParam("username", $username,PDO::PARAM_STR);
        $st->execute();
        $count=$st->rowCount();  
        $user_type_id = 2;//2 for regular member
        if($count<1)
        {
          $stmt = $db->prepare("INSERT INTO users(user_type_id,username,password,first_name,last_name,middle_name,status_id,profile_picture) VALUES (?,?,?,?,?,?,?,?)");  
          /*$stmt->bindParam("user_type_id", $user_type_id,PDO::PARAM_STR) ;
          $stmt->bindParam("username", $username,PDO::PARAM_STR) ;
          $stmt->bindParam("password", $password,PDO::PARAM_STR) ;
          $stmt->bindParam("first_name", $first_name,PDO::PARAM_STR) ;
          $stmt->bindParam("last_name", $last_name,PDO::PARAM_STR) ;
          $stmt->bindParam("status_id", $status_id,PDO::PARAM_STR) ;*/

          $stmt->execute(array($user_type_id,$username,$password,$first_name,$last_name,$middle_name,$status_id,'default-user.jpg'));
          //echo "<meta http-equiv='refresh' content='0'>";
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

    /* retrieve all users */
    public function getAllUsers()
    {
     try {
      $db = getDB();
          // $st = $db->prepare("SELECT * FROM users");  
      $st = $db->prepare("SELECT DISTINCT id,user_type.`description` AS 'user_type', username, users.`password`, user_status.`description` AS 'user_status',first_name, middle_name, last_name
        FROM users, user_type, user_status 
        WHERE users.`user_type_id`=user_type.`user_type_id` AND users.`status_id`=user_status.`status_id`");
      $st->execute();
      $data=$st->fetchAll();
    } catch (PDOException $e) {

    }

    return $data;
  }

  /* get one user */ 
  public function getUser($id)
  {
   try {
    $db = getDB();      
    $st = $db->prepare("SELECT * FROM users WHERE id=:id");
    $st->bindParam("id", $id,PDO::PARAM_STR);
    $st->execute();
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


/* update user */
public function updateUser($id,$username,$password,$first_name,$last_name,$middle_name,$status_id)
{
  try{
    $db = getDB();
    $st = $db->prepare("UPDATE users
      SET first_name=?, last_name=?, middle_name=?, status_id=?, username=?, PASSWORD=?
      WHERE id=?;");
    $st->execute(array($first_name,$last_name,$middle_name,$status_id,$username,$password,$id));
    $db = null;
    return true;

  }catch (PDOException $e) {
  }

} 



// public function getFullName($id)
// {
//   $db = getDB();
//   $stmt = $db->prepare("SELECT first_name, last_name, middle_name FROM users where id='1'");
//   $stmt->bindParam("id", $id,PDO::PARAM_STR) ;
//   $stmt->bindParam("first_name", $first_name,PDO::PARAM_STR) ;
//   $stmt->bindParam("last_name", $last_name,PDO::PARAM_STR) ;
//   $stmt->bindParam("middle_name", $middle_name,PDO::PARAM_STR) ;
//   $stmt->execute();
//   $full_name = $first_name . ' ' . $middle_name . ' ' . $last_name;
//   return $full_name;
// }

/* User Details */
public function userDetails($user_id)
{
  try{
    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM users WHERE id=:user_id");  
    $stmt->bindParam("user_id", $user_id,PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_OBJ);
    return $data;
  }
  catch(PDOException $e) {
    echo '{"error":{"text":'. $e->getMessage() .'}}'; 
  }

}

public function getActiveUserCount()
{
 try {
  $db = getDB();      
  $st = $db->prepare("SELECT * FROM users WHERE status_id=1");
  $st->execute();
  $count=$st->rowCount(); 
  if($count)
  {
    return $count;
  }
  else 
    return false;
} catch (PDOException $e) {

}
}

public function updateUserProfileImage($id,$img)
{
  try{
    $db = getDB();

    $imgName = $img['name'];

    $image_info = getimagesize($img["tmp_name"]);
    $image_width = $image_info[0];
    $image_height = $image_info[1];

    $st = $db->prepare("UPDATE users
      SET profile_picture=?
      WHERE id=?;");
    $st->execute(array($imgName,$id));
    echo "<meta http-equiv='refresh' content='0'>";
    move_uploaded_file($img['tmp_name'], "assets/img/users/" . $imgName);
    $db = null;
    return true;

  }catch (PDOException $e) {
  }

} 



}
?>