 <?php 
 require_once 'views/layouts/header.php';
 require_once 'views/layouts/nav.php';

 include('config.php');
 include('class/userClass.php');
 $errorMsgReg="";
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
      $url='home.php';
      header("Location: $url");
    }
    else
    {
      $errorMsgReg="Username already exists.";
    }
  }
  elseif($username_check=true && $password_check=false)
     $errorMsgReg="1 0";
  elseif($username_check=false && $password_check=true)
    $errorMsgReg="0 1";
  else
    $errorMsgReg="0 0";
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
  
  </style>
  <link rel="stylesheet" href="assets/css/admin.css">

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
        <!-- alert message -->
        <div id="message"></div>

    <form method="post" name="AddAdmin" class="form-horizontal" role="form">
     <h2 style="font-size: 44px;"><span class="icon icon-pencil"></span>Create Admin Account</h2>

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
        <input type="text" id="lastName" name="lastName" placeholder="Last Name" class="form-control" value="Martus">
      </div>
    </div>
    <div class="form-group">
      <label for="middleName" class="col-sm-4 control-label">Middle Name</label>
      <div class="col-sm-5">
        <input type="text" id="middleName" name="middleName" placeholder="Middle Name" class="form-control"  value="Arcena">
      </div>
    </div>

    <hr>
    <div class="form-group">
      <label for="username" class="col-sm-4 control-label">Username</label>
      <div class="col-sm-5">
        <input type="text" id="username" name="username" placeholder="Username" class="form-control" value="admin">
      </div> 
    </div>
    <div class="form-group">
      <label for="password" class="col-sm-4 control-label">Password</label>
      <div class="col-sm-5">
        <input type="password" id="password" name="password" placeholder="Password" class="form-control" value="admin">
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
              <input type="radio" id="active" name="optradio" value="1" checked="true">Active
            </label>
          </div>
          <div class="col-sm-4">
            <label class="radio-inline">
              <input type="radio" id="inactive" name="optradio" value="2">Inactive
            </label>
          </div>
<br><br>
        </div>
      </div>


      <div class="form-group">
          <div class="btn col-sm-4 col-sm-offset-4">
            <button type="submit" class="btn btn-primary" name="registerAdmin">Register</button>
            <button type="button" class="btn btn-info">Cancel</button>


      <br><br>
          <?php 
          if($errorMsgReg)
          { ?>
            <div class="alert alert-danger alert-dismissable" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
              <strong>Error!</strong> <?php echo $errorMsgReg; ?>
            </div>
          <?php } ?> 
     </div>
  
   </div>
    </div> 

    
 </div>
</form> 
</div> 
       <?php 
       require_once 'views/layouts/footer.php'
       ?>
