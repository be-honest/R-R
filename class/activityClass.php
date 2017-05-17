<?php 
class activityClass
{
     public function getAllActivities()
     {
          try {
               $db = getDB();
               $st = $db->prepare("SELECT DISTINCT events.`event_id` AS 'Event ID',events.`name` AS 'Event Name', activities.`activity_id` AS 'Activity ID',activities.`name` AS 'Activity Name',events.`evp_id` AS 'EVP ID'
                    FROM event_voting_period, EVENTS, activities
                    WHERE activities.`event_id`= events.`event_id` AND events.`evp_id` = event_voting_period.`evp_id`");
               $st->execute();
               $data=$st->fetchAll();
          } catch (PDOException $e) {
          }
          return $data;
          
     }

     public function activityRegistration($event_id,$name)
     {
          try {
               $db = getDB();
               $stmt = $db->prepare("INSERT INTO activities(event_id,name) VALUES (?,?)");
               $stmt->execute(array($event_id,$name));
               $db = null;
               return true;

          } catch(PDOException $e) {
               echo '{"error":{"text":'. $e->getMessage() .'}}'; 
               
          }
     }


}
?>