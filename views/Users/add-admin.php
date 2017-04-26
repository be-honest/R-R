 <?php 
require_once '../layouts/header.php';
require_once '../layouts/nav.php';
?>




 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Add Admin</title>
   <!--   <style>
          a.button{
            text-decoration: non;
          }
      </style> -->
 	<link rel="stylesheet" href="admin.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
     
 </head>
 <body>
    <br>
 	<div class="container">
            <form class="form-horizontal" role="form">
               <h2>Registration</h2>
               <hr>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="firstName" placeholder="First Name" class="form-control" autofocus>
                        <!-- <span class="help-block">Last Name, First Name, eg.: Smith, Harry</span> -->
                    </div>
                </div>
                <div class="form-group">
                    <label for="lasttName" class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" id="lastName" placeholder="Last Name" class="form-control" autofocus>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" id="username" placeholder="Username" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" placeholder="Password" class="form-control">
                    </div>
                </div>
              <!--   <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label">Date of Birth</label>
                    <div class="col-sm-9">
                        <input type="date" id="birthDate" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="country" class="col-sm-3 control-label">Country</label>
                    <div class="col-sm-9">
                        <select id="country" class="form-control">
                            <option>Afghanistan</option>
                            <option>Bahamas</option>
                            <option>Cambodia</option>
                            <option>Denmark</option>
                            <option>Ecuador</option>
                            <option>Fiji</option>
                            <option>Gabon</option>
                            <option>Haiti</option>
                        </select>
                    </div>
                </div> /.form-group --> 

                <div class="form-group">
                    <label class="control-label col-sm-3">Status</label>
                    <div class="col-sm-6">
                        <div class="row radio-group">
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="active" value="active">Active
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="inactive" value="inactive">Inactive
                                </label>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.form-group -->
             
             <!--    <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">I accept <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                </div>  /.form-group --> 
                <div class="form-group">
                    <div class="btn-group button col-sm-5 col-sm-offset-3" role="group">
                        <button type="button" class="btn btn-primary-outline">Create Admin</button>
                    </div>
                        <button type="button" class="btn btn-warning-outline">Cancel</button>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->

 </body>
 </html>

 <?php 
require_once '../layouts/footer.php'
 ?>
