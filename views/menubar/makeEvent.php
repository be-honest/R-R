<?php 
    require_once 'views/layouts/header.php';
    require_once 'views/layouts/nav.php';
    include('config.php');
    include('class/eventClass.php');
    $errorMsgReg="";
    $eventClass = new eventClass();



    if(isset($_POST['registerEvent']))
    {
      $name=$_POST['event_name'];
      $description=$_POST['description'];
      $location=$_POST['location'];
      $uid=$eventClass->eventRegistration($name,$description,$location);
      if($uid)
      {
       // print_r($uid);
       //  exit();
      // redirect('home.php');
      // $url='home.php';
      // header("Location: 'home.php'");
          $_SESSION['successMsgReg']="Event has been successfully created!";
          
      }
      else
      {
          $errorMsgReg="Event not created.";
      }


        // var_dump($_POST['activity']);
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Events | </title>
    <link rel="stylesheet" href="assets/css/todolist.css">
</head>
<body>
<!-- event form -->
<style>
  .icon {
    font-size: smaller;
  }
  .close {
    width: initial; 
  }
  .alert{
    margin-left: 27%;
    width: 30%;
  }

</style>
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <form method="post" name="createEvent" class="form-horizontal" role="form">
                    <fieldset>
                        <legend style="font-size: 50px;">Event Form  <span class="icon icon-new-message"></span></legend>
                            <div class="form-group">
                                <label class="control-label col-md-3">Name</label>
                                    <div class="col-md-4">
                                        <input type="input" id="event_name" placeholder="Event Name" class="form-control" name="event_name" value="Hiking" required autofocus>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="textarea">Description</label>
                                    <div class="col-md-4">
                                        <textarea class="form-control" id="textarea" name="description" required>HIKING!</textarea>
                                    </div>
                            </div> 

                 <!-- activity list -->
                    <!-- <div class="form-group">
                        <label class="col-md-3 control-label">Activities</label>
                            <div class="col-md-3">
                                <input type="text" id="activity" placeholder="Add an activity" class="form-control" name="activity[]">
                            </div>
                             <span onclick="newElement()" class="addBtn m-r-md span-control icon icon-circle-with-plus" style="font-size: x-large;"></span>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
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
                            <label class="col-md-3 control-label">Things to Bring</label>
                                <div class="col-md">    
                                    <div class="col-md-6">
                                        <input type="text" data-role="tagsinput" class="tag form-control" placeholder="Items..." required>
                                    </div>
                                </div>
                        </div> -->
                    <!-- location -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Location</label>
                                <div class="col-md-4"> 
                                    <input type="url" class="form-control" name="location" value="http://localhost/RandR/Events.php" required>
                                </div>
                        </div>

                        <iframe align="center" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7849.994918222582!2d123.91486999859771!3d10.342087570323582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a998faf20efc95%3A0xabb4dc9385821ad3!2sBanilad%2C+Mandaue+City%2C+Cebu!5e0!3m2!1sen!2sph!4v1494230754993"" width="450" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
                        <br>
                    <!-- button -->
                    <div class="form-group">
                      <div class="col-sm-6 col-sm-offset-3">
                         <button type="button" class="btn btn-info" style="float: right; margin-right: 35%; width: 25%;">
                           Create Event
                         </button>
                        <button type="submit" class="btn btn-default col-sm-3" name="registerEvent">
                          Back
                        </button>
                       
                        <br><br>
                      </div>
                       <br><br>

                        <?php if($errorMsgReg)
                        { ?>
                        <div class="alert alert-danger alert-dismissable" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true" class="exit" style="float:right; padding: 0;">×</span>
                         </button>
                         <strong>Error!</strong> <?php echo $errorMsgReg; ?>
                       </div>
                       <?php } ?> 

                       <?php if (isset($_SESSION['successMsgReg']))
                       {?>
                      <div class="alert alert-success alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true" class="exit" style="float:right; padding: 0;">x</span>
                        </button>
                        <strong>Well done! </strong><?php echo $_SESSION['successMsgReg']; ?> 
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
    <?php 
        require_once 'views/layouts/footer.php';
     ?>
</body>
</html>

