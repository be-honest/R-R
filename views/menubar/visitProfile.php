<?php 
require_once 'views/layouts/header.php';
require_once 'views/layouts/nav.php';

if (!isset($_GET['id'])) {
  $user = $userDetails;
  $name = $user['first_name'] . ' ' . $user['last_name'];
  $firstName=$user['first_name'];
  $id=$user['id'];
  $lastName=$user['last_name'];
  $middleName=$user['middle_name'];
  $username=$user['username'];    
  $password=$user['password'];
  $userStatus=$user['status_id'];
  $profilePicture=$user['profile_picture'];
}
elseif (isset($_GET['id'])) {
  $user=$userClass->getUser($_GET['id']);
      if ($user)//if a user exist
      {
        $id = $user['id'];
        $name = $user['first_name'] . ' ' . $user['last_name'];   
        $firstName=$user['first_name'];
        $lastName=$user['last_name'];
        $middleName=$user['middle_name'];
        $username=$user['username'];    
        $password=$user['password'];
        $userStatus=$user['status_id'];
        $profilePicture=$user['profile_picture'];
      }
      else//if no user exists
      {
        $id="";
        $name="";
        $firstName="";
        $lastName="";
        $username="";
        $middleName="";
        $password="";
        $userStatus="";
        $profilePicture="";
        $errorMsgReg="User does not exist.";
      }
    }
    // $userDetails=$userClass->userDetails($session_uid);
    // var_dump($user);
    ?>
    <br>
    <?php if($user) 
    { ?>
    <div class="card text-center">
      <img src="assets/img/users/<?php echo $profilePicture?>" style="width: 100%;">
      
      <div class="p-container">

        <h1 class="prof-name"><?php echo $name;?></h1>
        <p><?php echo $username ?></p>
        <p class="type">Type : 
          <?php if ($userStatus==1) {
            echo 'Admin';
          }
          elseif ($userStatus==2)
          {

            echo 'Member';
          }
          ?></p>
          <p>Status : 
            <?php if($userStatus==1) { ?>
            <b style="color:green;">Active</b></p>
            <?php } 
            elseif($userStatus==2)
            {
              ?>
              <b style="color:#e52325;">Inactive</b></p>
              <?php } ?>
              <div class="form-group">
                <?php if($id==$session_uid)
                { ?>
                <p><button class="btn btn-primary p">Change Profile Picture</button></p>
                <?php } ?>
              </div>
          <!-- <div>
            <a href=""><span class="icon icon-facebook"></span></a>
            <a href=""><span class="icon icon-twitter"></span></a>
            <a href=""><span class="icon icon-instagram"></span></a>
            <a href=""><span class="icon icon-google-plus"></span></a>
            <a href=""><span class="icon icon-github"></span></a>
          </div> -->
          <br>
        </div>
      </div>
      <?php } ?>
      <br>



      <?php
      require_once 'views/layouts/footer.php'; 
      ?>
