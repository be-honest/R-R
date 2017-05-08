 <?php 
 require_once 'views/layouts/header.php';
 require_once 'views/layouts/nav.php';

 include('config.php');
 include('class/userClass.php');
 $errorMsgReg="";
 $userClass = new userClass();

 if (isset($_POST['editUser'])) 
 {
  $id=$_GET['id'];
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
    $uid=$userClass->updateUser($id,$username,$password,$firstName,$lastName,$middleName,$userStatus);
    if($uid)
    {
      $_SESSION['successMsgReg']="User has been successfully updated!";
    }
    else
    {
      $errorMsgReg="erroror";
    }
  }
  elseif($username_check && !$password_check)
    $errorMsgReg="Password must be atleast 6 characters and must only contain alphanumeric characters.";
  elseif(!$username_check && $password_check)
    $errorMsgReg="Username must be atleast 3 characters and must only contain alphanumeric characters.";
  elseif (!$username_check && !$password_check)
    $errorMsgReg="Username must be atleast 3 characters and Password must be atleast 6 characters. Both must only contain alphanumeric characters.";
}

if(isset($_GET['id']))
{
  $user = $userClass->getUser($_GET['id']);
  if ($user) {
    $user = $userClass->getUser($_GET['id']);
    $firstName=$user['first_name'];
    $lastName=$user['last_name'];
    $middleName=$user['middle_name'];
    $username=$user['username'];    
    $password=$user['password'];
    $userStatus=$user['status_id'];
  }
  else
  {
    $firstName="";
    $lastName="";
    $username="";
    $middleName="";
    $password="";
    $userStatus="";
    $errorMsgReg="User does not exist.";
  }
}
else
{
$firstName="";
$lastName="";
$username="";
$middleName="";
$password="";
$userStatus="";
}

?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Add Admin</title>
 	<link rel="stylesheet" href="assets/css/admin.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <style>
  
      button{
        align-content: space-between;
        width: 50%;
      }

      .form-control:focus{
        color: #000;
        background-color: #fff;
        box-shadow: none;
        border-color: #2ba22d;
      }

      .custom-control input:checked ~ .custom-control-indicator {
          background-color: #2ba22d;
          box-shadow: none;
      }

  </style>
 </head>
 <body>
    <br>
 	<div class="container">


            <form class="form-horizontal" method="post" name="editUser" role="form" >
                <h2 style="font-size: 44px;">
                  <span class="icon icon-pencil"></span>
                   Edit User Account 

                </h2>
            
               <hr width="750">
                <div class="form-group">    
                    <label for="firstName" class="col-sm-4 control-label">First Name</label>
                    <div class="col-sm-5">
                        <input type="text" id="firstName" name="firstName" placeholder="First Name" class="form-control" value="<?php echo $firstName ?>" autofocus >           
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-4 control-label">Last Name</label>
                    <div class="col-sm-5">
                        <input type="text" id="lastName" name="lastName" placeholder="Last Name" class="form-control" 
                        value="<?php echo $lastName ?>" autofocus >

                    </div>
                </div>
                 <div class="form-group">
                    <label for="middleName" class="col-sm-4 control-label">Middle Name</label>
                    <div class="col-sm-5">
                        <input type="text" id="middleName" name="middleName" placeholder="Middle Name" class="form-control" value="<?php echo $middleName ?>" autofocus >
                    </div>
                </div>


                <hr width="750">
                <div class="form-group">


                    <label for="username" class="col-sm-4 control-label">Username</label>
                    <div class="col-sm-5">
                        <input type="text" id="username" name="username" placeholder="Username" class="form-control" 
                        value="<?php echo $username ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-5">
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control"
                        value="<?php echo $password ?>">


                    </div>
                </div>


                <div class="form-group">    
                 <label class="control-label col-sm-4">Status</label>
                   <div class="row">
                     <div class="radio custom-control custom-radio col-sm-2">
                       <div class="radio custom-control custom-radio col-sm-1" style="padding: 0; ">
                         <label>
                           <input type="radio" name="optradio" id="active" value="1"      
                                    <?php if($userStatus==1)
                                    { ?> checked=true<?php
                                      } ?>>Active
                           <span class="custom-control-indicator" style="border-color: forestgreen;"></span> 
                         </label>
                       </div>
                       <br>
                       <div class="radio custom-control custom-radio col-sm-1" style="float:initial; padding: 0;">
                         <label>
                           <input type="radio" name="optradio" id="inactive" value="2"  
                                    <?php if($userStatus==1)
                                    { ?> checked=true<?php
                                      } ?>>Inactive
                           <span class="custom-control-indicator" style="border-color: forestgreen;"></span> 
                         </label>
                       </div>
                     </div>
                   </div>
               </div>
                

                <div class="form-group">
                    <div class="btn col-sm-4 col-sm-offset-4">
                        <button type="submit" class="btn btn-success" name="editUser">Update</button>
                        <button type="button" class="btn btn-info">Cancel</button>
                        <br><br>
                         
      <?php 
      if($errorMsgReg)
      { 
        ?>
      <div class="alert alert-danger alert-dismissable" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
      <strong>Oops!</strong> <?php echo $errorMsgReg; ?>
      </div>
      <?php 
      }
       ?> 
       <?php if (isset($_SESSION['successMsgReg']))
  {?>
  <div class="alert alert-success fade in"><button type="button" class="close close-alert" data-dismiss="alert" aria-hidden="true">x</button><strong>Well done! </strong><?php echo $_SESSION['successMsgReg']; ?> </div>
  <?php } ?>
                    </div>

                </div>
            </form> 
            <br>
        </div> 
 </body>
 </html>

 <?php 
require_once 'views/layouts/footer.php'
 ?>
=