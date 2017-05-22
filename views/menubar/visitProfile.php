<?php 
    require_once 'views/layouts/header.php';
    require_once 'views/layouts/nav.php';
 ?>
  <br>
<div class="card text-center">
  <img src="assets/img/avatar-fat.jpg" style="width: 100%;">
  <div class="p-container">
   
    <h1 class="prof-name">John Doe</h1>
     <p>johndoe_</p>
    <p class="type">Type : Admin</p>
    <p>Status : <b style="color:green;">Active</b></p>
    <p><button class="btn btn-primary p">Edit Profile</button></p>
      <div class="social">
        <a href=""><span class="icon icon-facebook"></span></a>
        <a href=""><span class="icon icon-twitter"></span></a>
        <a href=""><span class="icon icon-instagram"></span></a>
        <a href=""><span class="icon icon-google-plus"></span></a>
        <a href=""><span class="icon icon-github"></span></a>
      </div>
  </div>
</div>
<br>



<?php
require_once 'views/layouts/footer.php'; 
?>
