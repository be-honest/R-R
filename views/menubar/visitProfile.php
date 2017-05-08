<?php 
    require_once 'views/layouts/header.php';
    require_once 'views/layouts/nav.php';
 ?>


 <div class="profile-header text-center" style="background-image: url(assets/img/iceland.jpg); ">
  <div class="container-fluid">
    <div class="container-inner">
      <img class="img-circle media-object" src="assets/img/avatar-dhg.png">
      <h3 class="profile-header-user">Name</h3>
      <p class="profile-header-bio">About yourself.</p>
    </div>
  </div>
  <nav class="profile-header-nav">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#">Info </a></li>
      <li><a href="#">Votes </a></li>
      <li><a href="#">Events Attended</a></li>
    </ul>
  </nav>
</div>

<!-- information -->
<form class="form-horizontal" role="edit">
  <h3>Personal Info</h3>
  <hr>
  <div class="form-group">
    <label class="control-label col-md-3">First Name</label>
    <div class="col-lg-6">
      <input type="text" class="form-control" value="Honest" disabled>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-md-3">Last Name</label>
    <div class="col-lg-6">
      <input type="text" class="form-control" value="Honest" disabled>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-md-3">Middle Name</label>
    <div class="col-lg-6">
      <input type="text" class="form-control" value="Honest" disabled>
    </div>
  </div>
  <br>
   <div class="form-group">
    <label class="control-label col-md-3">Username</label>
    <div class="col-lg-6">
      <input type="text" class="form-control" value="Honest" disabled>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-3 control-label">Password:</label>
    <div class="col-md-6">
      <input class="form-control" type="password" value="11111122333">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-3 control-label">Confirm password:</label>
    <div class="col-md-6">
      <input class="form-control" type="password" value="11111122333">
    </div>
  </div>
</form>




<?php
require_once 'views/layouts/footer.php'; 
?>
