<?php 
class checklistClass
{
     public function getAllChecklist()
     {
          try {
               $db = getDB();
               $st = $db->prepare("SELECT DISTINCT events.`event_id` AS 'Event ID', events.`name` AS 'Event Name', checklist.`checklist_id` AS 'Checklist ID',checklist.`name` AS 'Checklist Name',events.`evp_id` AS 'EVP ID'
                    FROM event_voting_period, EVENTS, checklist
                    WHERE checklist.`event_id`= events.`event_id` AND events.`evp_id` = event_voting_period.`evp_id`");
               $st->execute();
               $data=$st->fetchAll();
          } catch (PDOException $e) {
          }
          return $data;
     }

     public function checklistRegistration($event_id,$name)
     {
          try {
               $db = getDB();
               $stmt = $db->prepare("INSERT INTO checklist(event_id,name) VALUES (?,?)");
               $stmt->execute(array($event_id,$name));
               echo "<meta http-equiv='refresh' content='0'>";
               $db = null;
               return true;

          } catch(PDOException $e) {
               echo '{"error":{"text":'. $e->getMessage() .'}}'; 
               
          }
     }

     public function checklistCheck($activity_id)
     {
          try {
               $db = getDB();
               $stmt = $db->prepare("INSERT INTO checklist(event_id,name) VALUES (?,?)");
               $stmt->execute(array($event_id,$name));
               echo "<meta http-equiv='refresh' content='0'>";
               $db = null;
               return true;

          } catch(PDOException $e) {
               echo '{"error":{"text":'. $e->getMessage() .'}}'; 
               
          }
     }

     public function getChecklistbyEventID($event_id)
     {
          try {
               $db = getDB();
               $st = $db->prepare("SELECT *
                    FROM checklist
                    WHERE event_id=?");
               $st->execute(array($event_id));
               $data=$st->fetchAll();
          } catch (PDOException $e) {
          }
          return $data;
     }


}
?>