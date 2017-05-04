 <?php 
require_once 'views/layouts/header.php';
require_once 'views/layouts/nav.php';

include('config.php');
include('class/userClass.php');
$errorMsgReg="";
$userClass = new userClass();
if (isset($_POST['registerUser'])) 
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
    $uid=$userClass->userRegistration($username,$password,$firstName,$lastName,$middleName,$userStatus);
    if($uid)
    {
        // print_r($uid);
        
        $url='home.php';
        header("Location: $url");
    }
    else
    {
      $errorMsgReg="Username already exists.";
    }
    }
}
?>





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

    </style>
 </head>
 <body>
    <br>
 	<div class="container">

            <form class="form-horizontal" method="post" name="AddUser" role="form" >
                <h2 style="font-size: 44px;">
                   Create Member Account <span class="icon icon-pencil"></span>
                </h2>
            
               <hr width="750">
                <div class="form-group">    
                    <label for="firstName" class="col-sm-4 control-label">First Name</label>
                    <div class="col-sm-5">
                        <input type="text" id="firstName" name="firstName" placeholder="First Name" class="form-control" autofocus value="Kem">           
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-4 control-label">Last Name</label>
                    <div class="col-sm-5">
                        <input type="text" id="lastName" name="lastName" placeholder="Last Name" class="form-control" autofocus value="Juntilla">

                    </div>
                </div>
                 <div class="form-group">
                    <label for="middleName" class="col-sm-4 control-label">Middle Name</label>
                    <div class="col-sm-5">
                        <input type="text" id="middleName" name="middleName" placeholder="Middle Name" class="form-control" autofocus value="Arcena">
                    </div>
                </div>


                <hr width="750">
                <div class="form-group">


                    <label for="username" class="col-sm-4 control-label">Username</label>
                    <div class="col-sm-5">
                        <input type="text" id="username" name="username" placeholder="Username" class="form-control" value="user">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-5">
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control" value="user123">


                    </div>
                </div>

                <div class="form-group">
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
                                    <input type="radio" id="inactive" name="optradio" value="2" >Inactive
                                </label>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="form-group">
                    <div class="btn col-sm-4 col-sm-offset-4">
                        <button type="submit" class="btn btn-success" name="registerUser">Register</button>
                        <button type="button" class="btn btn-info">Cancel</button>
                         

    <?php 
      if($errorMsgReg)
      { 
        ?>
      <div class="alert alert-danger alert-dismissable" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
      <strong>Error!</strong> <?php echo $errorMsgReg; ?>
      </div>
      <?php 
      }
       ?> 
                    </div>

                </div>
            </form> 
        </div> 
 </body>
 </html>

 <?php 
require_once 'views/layouts/footer.php'
 ?>
