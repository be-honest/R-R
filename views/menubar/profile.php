<?php 
    require_once 'views/layouts/header.php';
    require_once 'views/layouts/nav.php';
 ?>


 <div class="profile-header text-center" style="background-image: url(assets/img/iceland.jpg); ">
  <div class="container-fluid">
    <div class="container-inner">
      <img class="img-circle media-object" src="assets/img/avatar-dhg.png">
      <h3 class="profile-header-user">Dave Gamache</h3>
      <p class="profile-header-bio">I wish i was a little bit taller, wish i was a baller, wish i had a girl… also.</p>
    </div>
  </div>
  <nav class="profile-header-nav">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#">Photos</a></li>
      <li><a href="#">Others</a></li>
      <li><a href="#">Anothers</a></li>
    </ul>
  </nav>
</div>

<?php
require_once 'views/layouts/footer.php'; 
?>
