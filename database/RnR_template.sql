/*
SQLyog Ultimate v12.3.2 (64 bit)
MySQL - 10.1.21-MariaDB : Database - rnr
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`rnr` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `rnr`;

/*Table structure for table `activities` */

DROP TABLE IF EXISTS `activities`;

CREATE TABLE `activities` (
  `activity_id` int(10) NOT NULL AUTO_INCREMENT,
  `event_id` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`activity_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `activities` */

insert  into `activities`(`activity_id`,`event_id`,`name`) values 
(1,25,'walking'),
(2,26,'talking'),
(3,27,'drinking'),
(4,25,'standing'),
(5,26,'sitting'),
(6,27,'idling'),
(7,25,'chatting'),
(8,26,'shouting'),
(9,27,'grabbing'),
(10,25,'texting'),
(11,26,NULL),
(12,27,'test'),
(13,25,'cooking'),
(14,27,'213'),
(15,27,'213'),
(16,27,'213'),
(17,27,'Cooking'),
(18,27,'Cooking'),
(19,27,'Cooking'),
(20,27,'Cooking'),
(21,26,'swimming'),
(22,26,'swimming'),
(23,25,'testing'),
(24,25,'zasd'),
(25,25,'testing'),
(26,25,'262'),
(27,25,'qwe'),
(28,142,'Sipa takraw'),
(29,35,'Slipper Game'),
(30,25,''),
(31,175,''),
(32,25,'Warm Up'),
(33,175,'Warm up'),
(34,27,'Swimming'),
(35,175,'Climbing'),
(36,175,'Closing'),
(37,175,'Opening'),
(38,46,'Opening'),
(39,35,'Bato Lata'),
(40,36,''),
(41,36,''),
(42,36,'1231');

/*Table structure for table `checklist` */

DROP TABLE IF EXISTS `checklist`;

CREATE TABLE `checklist` (
  `checklist_id` int(10) NOT NULL AUTO_INCREMENT,
  `event_id` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`checklist_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `checklist_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `checklist` */

insert  into `checklist`(`checklist_id`,`event_id`,`name`) values 
(1,25,'running shoes'),
(2,26,'shirt'),
(4,34,'running shoes'),
(5,25,'jacket'),
(8,26,'goggles'),
(9,34,'Sunblock'),
(11,34,'shoe lace'),
(12,25,'test'),
(13,35,'T-shirt');

/*Table structure for table `event_status` */

DROP TABLE IF EXISTS `event_status`;

CREATE TABLE `event_status` (
  `event_status_id` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`event_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `event_status` */

insert  into `event_status`(`event_status_id`,`description`) values 
(1,'Open'),
(2,'Closed'),
(3,'Ongoing'),
(4,'Pending'),
(5,'Cancelled');

/*Table structure for table `event_votes` */

DROP TABLE IF EXISTS `event_votes`;

CREATE TABLE `event_votes` (
  `event_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`event_id`,`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `event_votes_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`),
  CONSTRAINT `event_votes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `event_votes` */

insert  into `event_votes`(`event_id`,`user_id`) values 
(35,1),
(35,2),
(35,3),
(36,95),
(36,100),
(36,144);

/*Table structure for table `event_voting_period` */

DROP TABLE IF EXISTS `event_voting_period`;

CREATE TABLE `event_voting_period` (
  `evp_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `event_status_id` int(10) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_event_date` date DEFAULT NULL,
  `end_event_date` date DEFAULT NULL,
  PRIMARY KEY (`evp_id`),
  KEY `user_id` (`user_id`),
  KEY `event_status_id` (`event_status_id`),
  CONSTRAINT `event_voting_period_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `event_voting_period_ibfk_2` FOREIGN KEY (`event_status_id`) REFERENCES `event_status` (`event_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `event_voting_period` */

insert  into `event_voting_period`(`evp_id`,`user_id`,`event_status_id`,`start_date`,`end_date`,`start_event_date`,`end_event_date`) values 
(1,1,2,'2017-03-01','2017-03-15','2017-03-25','2017-03-26'),
(2,2,2,'2017-04-01','2017-04-15','2017-04-29','2017-04-30'),
(3,3,1,'2017-05-12','2017-07-06','2017-05-21','2017-05-22'),
(4,1,4,'2017-09-01','2017-09-15','2017-09-23','2017-09-23'),
(5,1,4,'2017-06-01','2017-06-15','2017-06-24','2017-06-24');

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `event_id` int(10) NOT NULL AUTO_INCREMENT,
  `evp_id` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `location` text,
  `image` text,
  `isApproved` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `evp_id` (`evp_id`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`evp_id`) REFERENCES `event_voting_period` (`evp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=latin1;

/*Data for the table `events` */

insert  into `events`(`event_id`,`evp_id`,`name`,`description`,`location`,`image`,`isApproved`) values 
(25,1,'Hiking','Hiking at Mt. Mayon','http://localhost/RandR/Events.php',NULL,NULL),
(26,1,'Swimming','Swimming at Manila Bay','http://localhost/RandR/Events.php',NULL,NULL),
(27,1,'Canyoneering','Canyoneering at Grand Canyon','http://localhost/RandR/Events.php',NULL,NULL),
(34,1,'Jogging','Abellana Jogging Special','http://localhost/RandR/Events.php',NULL,NULL),
(35,3,'CoreLympics','Game competition at Family Park','http://localhost/RandR/Events.php','fampark1_1-679x452.jpg',NULL),
(36,3,'Parasailing','Parasailing at Badian','http://localhost/RandR/Events.php','aj-garcia-225309.jpg',NULL),
(37,1,'Micro R&R','Mini Sports Olympics @ Family Park','http://localhost/RandR/Events.php',NULL,NULL),
(46,1,'Tree Planting','Tree Planting at Maghaway','http://localhost/RandR/Events.php',NULL,NULL),
(171,1,'Trekking','Trekking at Mt. Kan Irag, Cebu','http://localhost/RandR/Events.php','ashim-d-silva-106271.jpg',NULL),
(172,3,'Scuba Diving','Scuba Diving at Cordova, Mactan Cebu','http://localhost/RandR/Events.php','marco-assmann-178084.jpg',1),
(175,3,'Hiking','Hiking at SRP','http://localhost/RandR/Events.php','ashim-d-silva-106271.jpg',NULL),
(187,1,'UI/UX story telling','UI/UX story telling','http://localhost/RandR/Events.php','markus-spiske-207946.jpg',NULL),
(188,3,'Bon Odori 2017','Japanese summer night festival at Kawit Point, SRP. Starts at 4 P.M.','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13205.020899759318!2d123.87703082343492!3d10.271557556393638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9bf8a95ec0d4105c!2sKawit+Point!5e0!3m2!1sen!2sph!4v1495866511868\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','anndrea-joiner-207885.jpg',NULL),
(189,5,'Beach','Beach outing at ','http://localhost/RandR/CreateEvent.php','david-marcu-1267.jpg',NULL),
(190,5,'Forest Exploration','Explore the wonders of nature and be one with the forest','https://cdn.datatables.net/1.10.14/css/jquery.dataTables.min.css','anthony-gotter-670.jpg',NULL),
(191,5,'Skiing','Skii at Alaska','https://cdn.datatables.net/1.10.14/css/jquery.dataTables.min.css','toa-heftiba-153852.jpg',NULL);

/*Table structure for table `user_status` */

DROP TABLE IF EXISTS `user_status`;

CREATE TABLE `user_status` (
  `status_id` int(10) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_status` */

insert  into `user_status`(`status_id`,`description`) values 
(0,'Blocked'),
(1,'Active'),
(2,'Inactive');

/*Table structure for table `user_type` */

DROP TABLE IF EXISTS `user_type`;

CREATE TABLE `user_type` (
  `user_type_id` int(10) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_type` */

insert  into `user_type`(`user_type_id`,`description`) values 
(1,'Admin'),
(2,'Member');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'User ID',
  `user_type_id` int(10) DEFAULT NULL,
  `status_id` int(10) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `profile_picture` text,
  PRIMARY KEY (`id`),
  KEY `user_type_id` (`user_type_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`user_type_id`),
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `user_status` (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`user_type_id`,`status_id`,`first_name`,`username`,`password`,`last_name`,`middle_name`,`profile_picture`) values 
(1,1,1,'Kryce Earl','admin1','admin1','Martus','Arcena','2.jpg'),
(2,1,1,'Honest','admin2','admin2','Aguanta','','default-user.jpg'),
(3,2,1,'Kem','user1','user1','Juntilla','Arcena','default-user.jpg'),
(95,1,1,'Juan','user2','user2','dela Cruz','A','default-user.jpg'),
(100,2,1,'Kryce Earl aRTU','user3','user3','Martus','Arcena','default-user.jpg'),
(144,2,1,'Vote','voter1','voter1','Viewer','V','default-user.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
