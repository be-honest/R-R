<?php 
require_once 'views/layouts/header.php';
require_once 'views/layouts/nav.php';
include('class/eventClass.php');
include('class/eventPeriodClass.php');
$errorMsgReg="";
$successMsgReg="";
$eventClass = new eventClass();
$eventPeriodClass = new eventPeriodClass();


$evp_id=$eventPeriodClass->getCurrentEventPeriod();
$evp_id=$evp_id['evp_id'];

if(isset($_POST['registerEvent']))
{
  $name=$_POST['event_name'];
  $description=$_POST['description'];
  $location=$_POST['location'];
  $img=$_FILES['image'];
  $uid=$eventClass->eventRegistration($name,$description,$location,$evp_id,$img);

  if($uid)
  {

    $successMsgReg="Event has been successfully created!";
    $last_id =$uid["MAX"];
  }
  else
  {
    $errorMsgReg="Event not created.";
  }
}

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
                           <div class="form-group">
                            <label class="col-md-2 control-label">Location</label>
                            <div class="col-md-4"> 
                              <input type="input" class="form-control map" name="location" required>

                              <br>

                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-2 control-label"></label>
                            <div class="col-md-4 mappreview"> 

                            </div>
                          </div>


                          <div class='form-group'>
                            <label class="col-md-2 control-label">Image</label>
                            <div class="col-md-4"> 
                              <input type="file" id="imgInp" accept="image/png, image/jpeg" class='form-control' name='image'>
                              <img id="blah" src="#" style="width: 480px" />
                            </div>
                          </div>
                         
                         <div class="form-group"></div>
                         
                         <!-- button -->
                         <div class="form-group">
                          <div class="col-sm-6 col-sm-offset-3">
                           <!-- button for modal -->
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
                            </button>
                            <h4 class="modal-title">The event has been successfully created!</h4>
                          </div>

                              <div class="modal-body">
                                <p>Do you wish to add an activity?</p>
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


