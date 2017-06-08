<?php 
require_once 'views/layouts/header.php';
require_once 'views/layouts/nav.php';

include('class/eventClass.php');
include('class/checklistClass.php');
include('class/activityClass.php');
$eventClass = new eventClass();
$checklistClass = new checklistClass();
$activityClass = new activityClass();


if (!isset($_GET['id'])) {
// echo "no event";
}
elseif (isset($_GET['id'])) {
$items = $checklistClass->getChecklistbyEventID($_GET['id']);
$activities = $activityClass->getActivitiesbyEventID($_GET['id']);
$event = $eventClass->getEvent($_GET['id']);
// var_dump($items);
// var_dump($event);
      if ($event)//if a event exist
      {
        $event_id = $event['event_id'];
        $evp_id = $event['evp_id'];
        $name = $event['name'];
        $description = $event['description'];
        $location = $event['location'];
        $image = $event['image'];
        $isApproved = $event['isApproved'];
        $start_event_date = $event['start_event_date'];
      }
      else//if no event exists
      {
        $event_id = "";
        $evp_id = "";
        $name = "Event does not exist";
        $description = "";
        $location = "";
        $image = "";
        $isApproved = "";
        $start_event_date = "";
        // $errorMsgReg="User does not exist.";
      }
    }
 ?> 
<div class="container p-t-lg">
  <div class="row">
    <div class="col col-md-10 col-md-offset-1">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h2 align="center"><?php echo $name ?></h2>
          <h3  style="color: rgb(153,153,153); float: right;">
          <?php 
          if ($event) {
          echo date_format(date_create($start_event_date),"M d, Y");
          }?></h3>
        </div>
        <div class="panel-body">
          <ul class="nav nav-pills">
<?php if ($event) {
  # code...
 ?>       
      <p>Description: <?php echo $description ?></p>
<article class="container box style1 right" style="height: 360px">

  <div data-grid="images" class="image fit" style="height: 360px">

  <img data-width="350" data-height="300" src="images/<?php echo $image ?>">
  </div>
  <!-- <a href="#" class="image fit">
   <img src="images/marco-assmann-178084.jpg" >
  </a> -->
  <div class="inner">
    <header>
    <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-activities">
                        <h3 class="panel-title" style="font-size: 30px";>
                            &nbsp;Activities
                        </h3>
                    </div>
                    <ul class="list-group">
                    <?php foreach ($activities as $activity) { ?>
                    <li class="list-group-item"><?php echo $activity['name']; ?></li>
                    <?php } ?>
                        <!-- <li class="list-group-item"><strong>2GB</strong> Memory</li>
                        <li class="list-group-item"><strong>2 Core</strong> Processor</li>
                        <li class="list-group-item"><strong>40GB</strong> SSD Disk</li>
                        <li class="list-group-item"><strong>3TB</strong> Transfer</li> -->
                    </ul>
                </div>
            </div>
    </header>
  </div>
</article>
</article>
<article class="container box style1 left" style="height: 360px">
  <div class="inner">
    <header>
    <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-checklist">
                        <h3 class="panel-title" style="font-size: 30px";>
                            &nbsp;Checklist
                        </h3>
                    </div>
                    <ul class="list-group">
                    <?php foreach ($items as $item) { ?>
                    <li class="list-group-item"><?php echo $item['name']; ?></li>
                    <?php } ?>
                        <!-- <li class="list-group-item"><strong>2GB</strong> Memory</li>
                        <li class="list-group-item"><strong>2 Core</strong> Processor</li>
                        <li class="list-group-item"><strong>40GB</strong> SSD Disk</li>
                        <li class="list-group-item"><strong>3TB</strong> Transfer</li> -->
                    </ul>
                </div>
            </div>
   <!--  <h3 style="font-size: 40px; color: darkseagreen; ">
      Things to Bring 
    </h3>
    <p>
      <ul>
        <li>Towel</li>
        <li>Bottled Water</li>
        <li>Extra shirt (ofc)</li>
        <li>Food?</li>
        <li>Money (obviously)</li>
        <li>Yourself</li>
      </ul>
    </p> -->
    </header>
    <?php //echo $location ?>
    <div class="image fit" style="height: 360px">
    <?php echo $location; ?>
    <!-- <iframe class="image fit" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15702.131259526826!2d123.88905110000002!3d10.299175500000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7f08f824b1ab47f9!2sCoreDev+Solutions+Inc.!5e0!3m2!1sen!2sph!4v1494381300383" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe> -->
</div>
  </div>
</article>
<?php } ?>
          </ul>
        </div>
      </div>
    </div>  
  </div>
  
</div>
<!--  <br>
 <!-- <form method="post" class="form-horizontal" role="form">
<article class="container box style1 right">
  <a href="#" class="image fit">
   <img src="images/marco-assmann-178084.jpg" > -->
  <!-- <div data-grid="images">
  <img data-width="350" data-height="300" src="http://placehold.it/350x300/EEE04A/ffffff">
  </div>
  </a>
  <div class="inner">
    <header>
      <p style="font-size: 45px">
      Event Name
      </p>
      <p class="event-meta">Honest on May 11,2017</p>
      <p>Description:
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt provident tempora ab, qui optio et quisquam unde necessitatibus expedita nihil ut!</p>
    </header>
  </div>

</article>
<article class="container box style1 left">


  <div class="inner">
    <header>
    <div>
      <p class="event-meta">Honest on May 11,2017</p>
      <p>Description:
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt provident tempora ab, qui optio et quisquam unde necessitatibus expedita nihil ut!</p>
        </div>
    </header>
    <iframe class="image fit" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15702.131259526826!2d123.88905110000002!3d10.299175500000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7f08f824b1ab47f9!2sCoreDev+Solutions+Inc.!5e0!3m2!1sen!2sph!4v1494381300383" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>
</article>
  <br>
</form> --> 
 <?php 
require_once 'views/layouts/footer.php';
?>