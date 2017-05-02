 <?php 
 require_once 'views/layouts/header.php';
 require_once 'views/layouts/nav.php';

 include('config.php');
 include('class/userClass.php');

 $userClass = new userClass();
 if (isset($_POST['registerAdmin'])) 
 {
 
  $username=$_POST['username'];
  $password=$_POST['password'];
  $firstName=$_POST['firstName'];
  $lastName=$_POST['lastName'];
  $middleName=$_POST['middleName'];
  $userStatus=$_POST['optradio'];

  $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
  $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

  if($username_check && $password_check) 
  {
    $uid=$userClass->adminRegistration($username,$password,$firstName,$lastName,$middleName,$userStatus);
    // print_r($uid);
    //     exit();
    if($uid)
    {
       // print_r($uid);
       //  exit();
      // redirect('home.php');
      $url='index.php';
      header("Location: $url");
    }
    else
    {
      $errorMsgReg="Username already exits.";
    }
    
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Admin</title>

  <style>
    a.button{
      text-decoration: non;
    }
  </style>
  <link rel="stylesheet" href="assets/css/admin.css">



</head>
<body>
  <br>
  <div class="container">
    <form method="post" name="AddAdmin" class="form-horizontal" role="form">
     <h2 style="font-size: 50px;">Registration Form</h2>
     <hr width="750">
     <div class="form-group">
      <label for="firstName" class="col-sm-4 control-label">First Name</label>
      <div class="col-sm-5">
        <input type="text" id="firstName" name="firstName" placeholder="First Name" class="form-control" autofocus>
        <!-- <span class="help-block">Last Name, First Name, eg.: Smith, Harry</span> -->
      </div>
    </div>
    <div class="form-group">
      <label for="lastName" class="col-sm-4 control-label">Last Name</label>
      <div class="col-sm-5">
        <input type="text" id="lastName" name="lastName" placeholder="Last Name" class="form-control" autofocus>
      </div>
    </div>
    <div class="form-group">
      <label for="middleName" class="col-sm-4 control-label">Middle Name</label>
      <div class="col-sm-5">
        <input type="text" id="middleName" name="middleName" placeholder="Middle Name" class="form-control" autofocus>
      </div>
    </div>

    <hr width="750">
    <div class="form-group">
      <label for="username" class="col-sm-4 control-label">Username</label>
      <div class="col-sm-5">
        <input type="text" id="username" name="username" placeholder="Username" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-sm-4 control-label">Password</label>
      <div class="col-sm-5">
        <input type="password" id="password" name="password" placeholder="Password" class="form-control">
      </div>
    </div>

    <div class="form-group">

<!-- <label for="text" class="col-sm-4 control-label">Status</label>
      <div class="col-sm-5">
        <input type="text" id="username" name="user_status" placeholder="User Status" class="form-control">
      </div>
    </div> -->


    
      <label class="control-label col-sm-4">Status</label>
  
      <div class="col-sm-5">
        <div class="row">

        
  

          <div class="col-sm-4">
            <label class="radio-inline">
              <input type="radio" id="active" name="optradio" value="1" >Active
            </label>
          </div>
          <div class="col-sm-4">
            <label class="radio-inline">
              <input type="radio" id="inactive" name="optradio" value="2">Inactive
            </label>
          </div>

        </div>
      </div>

         <div class="form-group">
     <div class="col-sm-4 col-sm-offset-4">
       <button type="submit" class="btn btn-primary" name="registerAdmin" >Create Admin</button>
       <button type="button" class="btn btn-info" style="float:right;" >Cancel</button>
     </div>
   </div>
    </div> 

    
 </div>
</form> 
</div> 


<!-- event form -->
<br>
<div class="container">
  <div class="row">
    <div class="col-md coloffset-1">

      <form action="method="post" name="createEvent" class="form-horizontal" role="form"">
        <fieldset>
          <legend style="font-size: 50px;" >Event Form</legend>
          <div class="form-group">
            <label class="control-label col-md-2">Name</label>
            <div class="col-md-4">
              <input type="input" id="event_name" placeholder="Event Name" class="form-control" />
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2 control-label" for="textarea">Description</label>
            <div class="col-md-4">
              <textarea class="form-control" id="textarea" name="textarea"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2 control-label">Date</label>
            <div class="col-md-4">
              <div class="input-append date" id="datetimepicker1">
                <input type="text" class="form-control">
                <span class="input-group-addon">
                 <span class="icon icon-calendar">
                 </span>
               </span>
             </div>
           </div>
         </div>

         <!-- date time picker -->
 <!--            <div class="form-group">
                <label class="col-md-2 control-label">Date</label>
                <div class="col-md-4">
                   <div id="datetimepicker" class="input-append date">
                     <input type="text" class="form-control"></input>
                     <span class="add-on">
                        <span class="icon icon-calendar"></span>
                     </span>
                   </div>
                </div>
              </div> -->
              <!-- DTP script -->
      <!--              <script type="text/javascript"
                    src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
                   </script> 
                   <script type="text/javascript"
                    src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
                   </script>
                   <script type="text/javascript"
                    src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
                   </script>
                   <script type="text/javascript"
                    src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
                   </script>
                   <script type="text/javascript">
                     $('#datetimepicker').datetimepicker({
                       format: 'dd/MM/yyyy hh:mm:ss',
                       language: 'en',
                       pickTime: false
                     });
                   </script> -->
                   <!-- end of date picker -->

                 </fieldset>
                 <!-- <h1 style="font-size: 50px;" align="justify">Event Form</h1> -->
               </form>
             </div>

           </div>
         </div>

       </body>
       </html>

       <?php 
       require_once 'views/layouts/footer.php'
       ?>
