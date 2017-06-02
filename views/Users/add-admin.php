<?php 
require_once 'views/layouts/header.php';
require_once 'views/layouts/nav.php';


 // include('class/userClass.php'); already declared at session.php
 // $userClass = new userClass();
$successMsgReg="";
$errorMsgReg="";
if (isset($_POST['registerAdmin'])) 
{
  $username=$_POST['username'];
  $password=$_POST['password'];
  $firstName=$_POST['firstName'];
  $lastName=$_POST['lastName'];
  $middleName=$_POST['middleName'];
  $userStatus=$_POST['optradio'];
  $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
  $password_check = preg_match('~^[A-Za-z0-9_]{6,20}$~i', $password);

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
      // $url='home.php';
      // header("Location: 'home.php'");
      $successMsgReg="Account has been successfully created!";
    }
    else
    {
      $errorMsgReg="Username already exists.";
    }
  }
  elseif($username_check && !$password_check)
    $errorMsgReg="Password must be atleast 6 characters and must only contain alphanumeric characters.";
  elseif(!$username_check && $password_check)
    $errorMsgReg="Username must be atleast 3 characters and must only contain alphanumeric characters.";
  elseif (!$username_check && !$password_check)
    $errorMsgReg="Username must be atleast 3 characters and Password must be atleast 6 characters. Both must only contain alphanumeric characters.";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Admin</title>

  <style>
    a.button{
      text-decoration: none;
    }
   /* #message{
      display: flex;

      justify-content: flex-end;
    }*/
    .form-group .col h2{
      display: flex;
      justify-content: center;
      align-items: center;
    }

    h2{
      align-self: center;
    }

    button{
      align-content: space-between;
      width: 50%;
    }
    hr{
      width: 80%;
    }
    .form-control:focus{
      color: #000;
      background-color: #fff;
      box-shadow: none;
      border-color: #00bcd4;
    }

    .custom-control input:checked ~ .custom-control-indicator {
      background-color: #00bcd4;
      box-shadow: none;
    }

    .close {
      width: initial; 
    }



  </style>
  <link rel="stylesheet" href="assets/css/admin.css">

  <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/js/bootstrap-alert.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
 <!-- <script type="text/javascript">
   $(document).ready(
     function() {
       $('#success').click(function (e) {
         e.preventDefault()
         $('#message').html('<div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">x</button><strong>Well done! </strong>Account has been successfully created! </div>');
       })
     });
   </script> -->

 </head>
 <body>
  <br>
  <!-- growl-->
      <!-- <div class="growl growl-static">
        <div class="alert alert-dark alert-dismissable" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <strong>Well done!</strong> Your account has been successfully created.
        </div>
      </div> -->
      <!-- end of growl  -->
      <div class="container">

        <form method="post" name="AddAdmin" class="form-horizontal" role="form">
         <h2 style="font-size: 44px;">
           <span class="icon icon-add-user"></span>
           Create Admin Account</h2>
           <?php if ($successMsgReg)
           {?>
           <div class="col-md-5 col-md-offset-4 alert alert-success alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true" class="exit" style="float:right; padding: 0;">×</span>
           </button>
           <strong>Well Done!</strong> Account has been successfully created!
         </div>
         <?php } ?>
         <?php if($errorMsgReg)
         { ?>
         <div class="col-md-5 col-md-offset-4 alert alert-danger alert-dismissable" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true" class="exit" style="float:right; padding: 0;">×</span>
         </button>
         <strong>Error!</strong> <?php echo $errorMsgReg; ?>
       </div>
       <?php } ?> 

       <!-- <label class="title" style="font-size: 40px;"><span class="icon icon-pencil"></span>Create Admin Account</label> -->
       <hr>


       <div class="form-group">
        <label for="firstName" class="col-sm-4 control-label">First Name</label>
        <div class="col-sm-5" >
          <input type="text" id="firstName" name="firstName" placeholder="First Name" class="form-control" autofocus value="Kryce Earl">
          <!-- <span class="help-block">Last Name, First Name, eg.: Smith, Harry</span> -->
        </div>
      </div>
      <div class="form-group">
        <label for="lastName" class="col-sm-4 control-label">Last Name</label>
        <div class="col-sm-5">
          <input type="text" id="lastName" name="lastName" placeholder="Last Name" class="form-control" value="Martus" >
        </div>
      </div>
      <div class="form-group">
        <label for="middleName" class="col-sm-4 control-label">Middle Name</label>
        <div class="col-sm-5">
          <input type="text" id="middleName" name="middleName" placeholder="Middle Name" class="form-control" value="A" >
        </div>
      </div>

      <hr>
      <div class="form-group">
        <label for="username" class="col-sm-4 control-label">Username</label>
        <div class="col-sm-5">
          <input type="text" id="username" name="username" placeholder="Username" class="form-control" value="admin" >
        </div> 
      </div>
      <div class="form-group">
        <label for="password" class="col-sm-4 control-label">Password</label>
        <div class="col-sm-5">
          <input type="password" id="password" name="password" placeholder="Password" class="form-control" value="admin">
        </div>
      </div>

      <div class="form-group">    
        <label class="control-label col-sm-4">Status</label>
        <div class="row">
          <div class="radio custom-control custom-radio col-sm-2">
            <div class="radio custom-control custom-radio col-sm-1" style="padding: 0; ">
              <label>
                <input type="radio" name="optradio" id="active" value="1" checked="true">
                <span class="custom-control-indicator" style="border-color: #00bcd4;"></span> Active
              </label>
            </div>
            <br>
            <div class="radio custom-control custom-radio col-sm-1" style="float:initial; padding: 0;">
              <label>
                <input type="radio" name="optradio" id="inactive" value="2">
                <span class="custom-control-indicator" style="border-color: #00bcd4;"></span> Inactive
              </label>
            </div>
          </div>
        </div>
      </div>


      <div class="form-group">
        <div class="col-sm-4 col-sm-offset-4">
          <button type="submit" class="btn btn-primary" name="registerAdmin">Create Admin</button>
          <button type="button" class="btn btn-info" style="float:right; color: #fff" >Cancel</button>

          <br><br>



        </div>
      </div>
    </form> 
  </div> 
  <br>
  <?php 
  require_once 'views/layouts/footer.php'
  ?>
