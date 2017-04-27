 <?php 
require_once 'views/layouts/header.php';
require_once 'views/layouts/nav.php';



include('config.php');
include('class/userClass.php');

$userClass = new userClass();

if (isset($_POST['registerUser'])) 
{

    $username=$_POST['username'];
    $password=$_POST['password'];
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $middleName=$_POST['middleName'];
    $userStatus=$_POST['userStatus'];

    $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
    $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

    if($username_check && $password_check) 
    {
   $uid=$userClass->userRegistration($username,$password,$firstName,$lastName,$middleName,$userStatus);
    if($uid)
    {
        // print_r($uid);
        // exit();
        $url='home.php';
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
 	<link rel="stylesheet" href="assets/css/admin.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
 </head>
 <body>
    <br>
 	<div class="container">


            <form class="form-horizontal" role="form">
               <h2 style="font-size: 50px;">Registration Form</h2>
               <hr width="750">
                <div class="form-group">    
                    <label for="firstName" class="col-sm-4 control-label">First Name</label>
                    <div class="col-sm-5">
                        <input type="text" id="firstName" placeholder="First Name" class="form-control" autofocus>           
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-4 control-label">Last Name</label>
                    <div class="col-sm-5">
                        <input type="text" id="lastName" placeholder="Last Name" class="form-control" autofocus>

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
                        <input type="text" id="username" placeholder="Username" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-5">
                        <input type="password" id="password" placeholder="Password" class="form-control">


                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4">Status</label>
                    <div class="col-sm-5">


                        <div class="row">
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="active" name="optradio" value="active">Active
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="inactive" name="optradio" value="inactive">Inactive
                                </label>
                            </div>
                        </div>

                    </div>

                </div>
        
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-4">

                        <button type="button" class="btn btn-primary ">Create User</button>
                        <button type="button" class="btn btn-info" style="float:right;" >Cancel</button>
                    </div>

                </div>
            </form> 
        </div> 
 </body>
 </html>

 <?php 
require_once 'views/layouts/footer.php'
 ?>
