<?php 
include("config.php");
include('class/userClass.php');
$userClass = new userClass();


?>
<!DOCTYPE html>
<html>
<head>
    <title> Registration </title>
    <style>
        #container{width: 700px}
        #login,#signup{width: 300px; border: 1px solid #d6d7da; padding: 0px 15px 15px 15px; border-radius: 5px;font-family: arial; line-height: 16px;color: #333333; font-size: 14px; background: #ffffff;rgba(200,200,200,0.7) 0 4px 10px -1px}
        #login{float:left;}
        #signup{float:right;}
        h3{color:#365D98}
        form label{font-weight: bold;}
        form label, form input{display: block;margin-bottom: 5px;width: 90%}
        form input{ border: solid 1px #666666;padding: 10px;border: solid 1px #BDC7D8; margin-bottom: 20px}
        .button {
            background-color: #5fcf80 !important;
            border-color: #3ac162 !important;
            font-weight: bold;
            padding: 12px 15px;
            max-width: 100px;
            color: #ffffff;
        }
        .errorMsg{color: #cc0000;margin-bottom: 10px}
        .radio{width:100%;}
    </style>
</head>
    <body>
        <div id="container">
            <div id="signup">
                <h3>Add an Admin </h3>
                <form method="post" action="" name="signup">
                    <label>Full Name</label>
                    <input type="text" name="nameReg" autocomplete="off" required/>
                    <label>Username</label>
                    <input type="text" name="usernameReg" autocomplete="off" />
                    <label>Password</label>
                    <input type="password" name="passwordReg" autocomplete="off"/>
                    <label>Status</label>
                        <div class="radio custom-control custom-radio">
                              <label>
                                <input type="radio" id="radio1" name="radio">
                                <span class="custom-control-indicator"></span>
                                Active
                              </label>
                            </div>
                            <div class="radio custom-control custom-radio">
                              <label>
                                <input type="radio" id="radio2" name="radio">
                                <span class="custom-control-indicator"></span>
                               Inactive
                              </label>
                            </div> 

                    <div class="errorMsg"><?php echo $errorMsgReg; ?></div>
                    <input type="submit" class="button" name="signupSubmit" value="Signup">
                </form>
            </div>

        </div>



    </body>
    </html>
