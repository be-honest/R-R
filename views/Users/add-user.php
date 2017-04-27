 <?php 
require_once '../layouts/header.php';
require_once '../layouts/nav.php';
?>




 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Add Admin</title>
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

                <div class="form-group">
                    <label class="control-label col-sm-3">Status</label>
                    <div class="col-sm-6">
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
                    <div class="col-sm-5 col-sm-offset-3">
                        <button type="button" class="btn btn-primary ">Create User</button>
                        <button type="button" class="btn btn-warning" style="float:right;" >Cancel</button>
                    </div>
                </div>
            </form> 
        </div> 
 </body>
 </html>

 <?php 
require_once '../layouts/footer.php'
 ?>
