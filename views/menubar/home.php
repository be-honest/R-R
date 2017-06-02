<?php 
require_once 'views/layouts/header.php';
require_once 'views/layouts/nav.php';
  include('class/eventClass.php');

  $eventClass = new eventClass();
$events = $eventClass->getAllEvents();
// var_dump($events);
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- These meta tags come first. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rest and Recreation Portal </title>

    <!-- Include the CSS -->
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <link href="dist/toolkit.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet" type='text/css'>
    <link href="assets/css/toolkit.css" rel="stylesheet">
    <link href="assets/css/application.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- decorative font -->
   <link href='http://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>



    
    <style>
      body{
        width: 1px; 
        min-width: 100%;
        *width: 100%;
      }
      
    .h4
    {
       color: #ffffff;
    }
      .block-inverse
      {
          color: #616161;
          background-color: gainsboro;
      }
      .btn-primary {
        color: #ffffff;
        background-color: #685d9f;
        border-color: #5d548f;
      }
      #homeBtn:hover{
          color: #2196F3;
          border: 2px solid #1E88E5;
          background-color: #fff;
          
      }
       #homeBtn{
        color: #fff;
        background-color: #2196F3;
        border: 2px solid #1E88E5;
      }
      .text-muted a:hover{
        color: darkorange;
      }

.fitimage
{
  width: 475px;
  height: 345px;
}
    </style>
      <link href="assets/css/custom.css" rel="stylesheet">
  </head>

  <body class="with-top-navbar">
  

<?php @require_once('views/layouts/nav.php') ?>

<!-- <div class="container">
              <div class="row">
                <div class='modal fade' id='myModal'>
                  <div class='modal-dialog'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class='modal-title'>
                          <strong>EVENT VOTING PERIOD IS NOW CLOSED</strong>
                        </h4>
                      </div>
                      <div class='modal-body'>
                        This month's R&R will be <?php //echo $approvedEvent['name'] ?>
                        <img class="img-responsive" src="images/
                        <?php //echo $approvedEvent['image']?>"/>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>   -->

<div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="msgModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <button type="button" class="btn btn-sm btn-primary pull-right app-new-msg js-newMsg"><i class="fa fa-plus-square-o"></i>  Add new poll</button>
        <h4 class="modal-title">Polls</h4>
      </div>
    </div>
  </div>
</div>

<!-- <div class="block block-inverse text-center p-b">
  <h1 class="block-title p-a" >Rest and Recreation Portal</h1>
  <h4 class="text-muted"><a style="text-decoration: none" href="http://coredev.ph/">coreDev Solutions, Inc.</a></h4>
    <a href="eventVotingPeriod.php">
      <button class="btn btn-info m-t">Start opening an event.</button>
    </a>
</div> -->

<div class="container bg-overlay">
  <div class="row text-center">
    <h1 class="deco">Rest and Recreation <br> Portal</h1>
    <h3 class="text-muted"><a style="text-decoration: none" href="http://coredev.ph/">coreDev Solutions, Inc.</a></h3>
    <br>
<?php if($user_type) 
            {?>
      <a href="eventVotingPeriod.php">  
        <button type="button" class="btn btn-default btn-lg" id="homeBtn">Get Started</button>
      </a>
      <?php } ?>
  </div>
</div>
<!-- container 1 -->


<?php 
$i=1;

foreach(array_reverse($events) as $event) 
{

    if($i%2==0&&$event['isApproved']==1)
    {
      $i++;
      ?>
<article class="container box style1 right">
  <a href="#" class="image fit">
    <img class="fitimage" src="images/<?php echo $event['image']?>" >
  </a>
  <div class="inner">
    <header>
      <h2 class="event-name">
        <a href="#"><?php  echo $event['name']?></a>        
      </h2>
      <p class="event-meta"><?php echo date_format(date_create($event["start_event_date"]),"M d, Y")?></p>
      <p>Description: <?php echo $event["description"]?></p>
      <button type="button" class="btn btn-default btn-md">
        <span class="icon icon-dots-three-horizontal"></span>
      </button>
    </header>
  </div>
</article>

<?php
    } 
    elseif ($i%2==1&&$event['isApproved']==1) {
      $i++;
?>
  <article class="container box style1 left">
  <a href="#" class="image fit">
    <img class="fitimage" src="images/<?php echo $event['image']?>" >
  </a>
    <div class="inner">
      <header>
        <h2 class="event-name">
          <a href="#"><?php echo $event['name']?></a>        
        </h2>
        <p class="event-meta"><?php echo date_format(date_create($event["start_event_date"]),"M d, Y")?></p>
        <p>Description: <?php echo $event["description"]?></p>
        <button type="button" class="btn btn-default btn-md">
          More
        </button>
      </header>
    </div>
  </article>
<?php
    }
  
}?>





<br>

<?php @require_once('views/layouts/footer.php') ?>

  <!--   <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/toolkit.js"></script>
    <script src="assets/js/application.js"></script>
    <script>
      // execute/clear BS loaders for docs
      $(function(){
        if (window.BS&&window.BS.loader&&window.BS.loader.length) {
          while(BS.loader.length){(BS.loader.pop())()}
        }
      })
    </script>
  </body>
</html> -->