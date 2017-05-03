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

<?php
require_once 'views/layouts/footer.php'; 
?>
