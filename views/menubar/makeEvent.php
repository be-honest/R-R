<?php 
require_once 'views/layouts/header.php';
require_once 'views/layouts/nav.php';
include('class/eventClass.php');
include('class/eventPeriodClass.php');
$errorMsgReg="";
$successMsgReg="";
$eventClass = new eventClass();
$eventPeriodClass = new eventPeriodClass();

// $_SESSION['last_id'];

// var_dump($last_id);

$evp_id=$eventPeriodClass->getCurrentEventPeriod();
// var_dump($evp_id['evp_id']);
$evp_id=$evp_id['evp_id'];

if(isset($_POST['registerEvent']))
{
  $name=$_POST['event_name'];
  $description=$_POST['description'];
  $location=$_POST['location'];
  $img=$_FILES['image'];
  // var_dump($img);
  $uid=$eventClass->eventRegistration($name,$description,$location,$evp_id,$img);
  // var_dump($uid["MAX"]);
  if($uid)
  {
       // print_r($uid);
       //  exit();
      // redirect('home.php');
      // $url='home.php';
      // header("Location: 'home.php'");
    $successMsgReg="Event has been successfully created!";
    $last_id =$uid["MAX"];
    var_dump($last_id);
    // var_dump($_SESSION['currentID']);
  }
  else
  {
    $errorMsgReg="Event not created.";
  }


        // var_dump($_POST['activity']);
}
// var_dump(http_response_code());
?>
<!-- event form -->

<br>
<div class="container">

  <div class="row">
    <div class="col-md-12 ">
      <form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
        <fieldset>
          <legend style="font-size: 50px;">Event Form  <span class="icon icon-new-message"></span></legend>
          <?php if ($successMsgReg)
          {?>
          <div class="col-sm-8z` alert alert-success alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true" class="exit" style="float:right; padding: 0;">x</span>
            </button>
            <strong>Well done! </strong><?php echo $successMsgReg; ?> <br>
            Click <a href="Activity.php?evp_id=<?php echo $evp_id ?>&id=<?php echo ($last_id) ?>">here</a> to proceed to adding Activities
          </div>
          <?php } ?>
          <div class="form-group">
            <label class="control-label col-md-2">Name</label>
            <div class="col-md-4">
              <input type="input" id="event_name" placeholder="Event Name" class="form-control" name="event_name"  required autofocus>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label" for="textarea">Description</label>
            <div class="col-md-4">
              <textarea class="form-control" id="textarea" name="description" placeholder="What is the event about?" required></textarea>
            </div>
          </div>
          <!-- activity list -->
                 <!-- <div class="form-group">
                     <label class="col-md-2 control-label">Activities</label>
                         <div class="col-md-2">
                             <input type="text" id="activity" placeholder="Add an activity" class="form-control" name="activity[]">
                         </div>
                          <span onclick="newElement()" class="addBtn m-r-md span-control icon icon-circle-with-plus" style="font-size: x-large;"></span>
                 </div>
                 <div class="form-group">
                     <label class="col-md-2 control-label"></label>
                         <div class="col-md-4">
                         
                             <div class="panel panel-bold panel-info">

                                 <ul style="list-style: none;" id="list" class="list">
                                 </ul>
                             </div>
                             
                         </div>
                       </div> -->
                       <!-- end of activity list -->

                       <!-- check list -->
                     <!-- <div class="form-group">
                         <label class="col-md-2 control-label">Things to Bring</label>
                             <div class="col-md">    
                                 <div class="col-md-6">
                                     <input type="text" data-role="tagsinput" class="tag form-control" placeholder="Items..." required>
                                 </div>
                             </div>
                           </div> --> 
                           <div class="form-group">
                            <label class="col-md-2 control-label">Location</label>
                            <div class="col-md-4"> 
                              <input type="input" class="form-control map" name="location" required>

                              <br>
                              <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15702.131259526826!2d123.88905110000002!3d10.299175500000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7f08f824b1ab47f9!2sCoreDev+Solutions+Inc.!5e0!3m2!1sen!2sph!4v1494381300383" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe> -->

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-2 control-label"></label>
                            <div class="col-md-4 mappreview"> 
                  

                              
                              <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15702.131259526826!2d123.88905110000002!3d10.299175500000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7f08f824b1ab47f9!2sCoreDev+Solutions+Inc.!5e0!3m2!1sen!2sph!4v1494381300383" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe> -->

                            </div>
                          </div>


                          <div class='form-group'>
                            <label class="col-md-2 control-label">Image</label>
                            <div class="col-md-4"> 
                              <input type="file" id="imgInp" accept="image/png, image/jpeg" class='form-control' name='image'>
                              <img id="blah" src="#" alt="Image Preview" style="width: 480px" />
                            </div>
                          </div>

                          <!-- </div>
                          <div class="form-group">
                            <label class="col-md-2 control-label">Upload Image</label>
                            <div class="input-group">
                             <span class="input-group-btn">
                               <span class="btn btn-default btn-file" style="font-size: 14px;">
                                 Browse...<input type="file" id="imgInp">
                               </span>
                             </span>
                             <input type="text" class="form-control" style="width: 50%;">
                           </div>
                           <img id="img-upload">
                         </div>  -->
                         
                         <div class="form-group"></div>
                         
                         <!-- button -->
                         <div class="form-group">
                          <div class="col-sm-6 col-sm-offset-3">
                           <!-- button for modal -->
                           <!-- <button type="submit" name="registerEvent" class="btn btn-info" style="float: right; margin-right: 35%; width: 25%;"
                           data-toggle="modal" href="#msg">
                           Create Event
                         </button> -->
                         <button type="submit" name="registerEvent" class="btn btn-info" style="float: right; margin-right: 35%; width: 25%;">
                           Create Event
                         </button>
                         <button type="button" class="btn btn-default col-sm-3" name="registerEvent">
                          Back
                        </button>
                        
                        <br><br>
                      </div>
                      <br><br>

                      <br><br>
                    </div>
                    <br><br>

                  </div>
                  <?php if($errorMsgReg)
                  { ?>
                  <div class="alert alert-danger alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"  autofocus="autofocus">
                     <span aria-hidden="true" class="exit" style="float:right; padding: 0;">×</span>
                   </button>
                   <strong>Error!</strong> <?php echo $errorMsgReg; ?>
                 </div>
                 <?php } ?> 


                 
               </div>
               <!-- end of button -->
               <!-- modal -->
               <div class="modal fade" id="msg" tabindex="-1" role="dialog" aria-labelledby="msg" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                        <!-- <span aria-hidden="true">x</span> -->
                      </button>
                      <h4 class="modal-title">The event has been successfully created!</h4>
                    </div>

                    <!-- end of button -->
                    
                    <!-- modal -->
                    <div class="modal fade" id="msg" tabindex="-1" role="dialog" aria-labelledby="msg" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                              &times;
                              <!-- <span aria-hidden="true">x</span> -->
                            </button>
                            <h4 class="modal-title">The event has been successfully created!</h4>
                          </div>
                           <!--  <div class="modal-body">
                                <h4>The event has been successfully created!</h4>
                              </div> -->
                              <div class="modal-body">
                                <p>Do you wish to add an activity?</p>
                                <!-- <div class="modal-footer"> -->
                                <div style="display: flex; align-items: center; justify-content: space-around; ">
                                  <button class="btn btn-default" data-dismiss="modal">
                                    <span class="icon icon-thumbs-down"></span>
                                    No
                                  </button>
                                  <button type="submit" class="btn btn-primary" name="registerEvent">
                                    <span class="icon icon-thumbs-up"></span>
                                    Yes 
                                    <?php $redirect="Activity.php" ?>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- end of modal -->
                        
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div> 
            </div> 

          </div>
        </div>
        <br>

        <?php 
        require_once 'views/layouts/footer.php';
        ?>


