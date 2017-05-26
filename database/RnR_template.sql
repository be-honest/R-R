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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

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
(38,46,'Opening');

/*Table structure for table `checklist` */

DROP TABLE IF EXISTS `checklist`;

CREATE TABLE `checklist` (
  `checklist_id` int(10) NOT NULL AUTO_INCREMENT,
  `event_id` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`checklist_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `checklist_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `checklist` */

insert  into `checklist`(`checklist_id`,`event_id`,`name`) values 
(1,25,'running shoes'),
(2,26,'shirt'),
(4,34,'running shoes'),
(5,25,'jacket'),
(8,26,'goggles'),
(9,34,'Sunblock'),
(11,34,'shoe lace'),
(12,25,'test');

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
(34,1),
(34,2),
(35,1),
(35,2),
(35,3),
(35,100),
(36,1),
(187,144);

/*Table structure for table `event_voting_period` */

DROP TABLE IF EXISTS `event_voting_period`;

CREATE TABLE `event_voting_period` (
  `evp_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `event_status_id` int(10) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `isOpen` tinyint(2) DEFAULT NULL,
  `start_event_date` date DEFAULT NULL,
  `end_event_date` date DEFAULT NULL,
  PRIMARY KEY (`evp_id`),
  KEY `user_id` (`user_id`),
  KEY `event_status_id` (`event_status_id`),
  CONSTRAINT `event_voting_period_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `event_voting_period_ibfk_2` FOREIGN KEY (`event_status_id`) REFERENCES `event_status` (`event_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `event_voting_period` */

insert  into `event_voting_period`(`evp_id`,`user_id`,`event_status_id`,`start_date`,`end_date`,`isOpen`,`start_event_date`,`end_event_date`) values 
(1,1,1,'2017-03-01','2017-03-15',1,'2017-03-25','2017-03-26'),
(2,1,1,'2017-04-01','2017-04-15',4,'2017-04-29','2017-04-30'),
(3,1,1,'2017-05-12','2017-07-29',1,'2017-05-21','2017-05-22'),
(4,1,1,'2017-09-01','2017-09-15',1,'2017-09-23','2017-09-23');

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `event_id` int(10) NOT NULL AUTO_INCREMENT,
  `evp_id` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `location` text,
  `image` text,
  PRIMARY KEY (`event_id`),
  KEY `evp_id` (`evp_id`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`evp_id`) REFERENCES `event_voting_period` (`evp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=latin1;

/*Data for the table `events` */

insert  into `events`(`event_id`,`evp_id`,`name`,`description`,`location`,`image`) values 
(25,1,'Hiking','Hiking at Mt. Mayon','http://localhost/RandR/Events.php',NULL),
(26,1,'Swimming','Swimming at Manila Bay','http://localhost/RandR/Events.php',NULL),
(27,1,'Canyoneering','Canyoneering at Grand Canyon','http://localhost/RandR/Events.php',NULL),
(34,1,'Jogging','Abellana Jogging Special','http://localhost/RandR/Events.php',NULL),
(35,3,'CoreLympics','Game competition at Family Park','http://localhost/RandR/Events.php','fampark1_1-679x452.jpg'),
(36,3,'Parasailing','Parasailing at Badian','http://localhost/RandR/Events.php','aj-garcia-225309.jpg'),
(37,1,'Micro R&R','Mini Sports Olympics @ Family Park','http://localhost/RandR/Events.php',NULL),
(46,1,'Tree Planting','Tree Planting at Maghaway','http://localhost/RandR/Events.php',NULL),
(171,1,'Trekking','Trekking at Mt. Kan Irag, Cebu','http://localhost/RandR/Events.php','ashim-d-silva-106271.jpg'),
(172,3,'Scuba Diving','Scuba Diving at Cordova, Mactan Cebu','http://localhost/RandR/Events.php','marco-assmann-178084.jpg'),
(175,3,'Hiking','Hiking at SRP','http://localhost/RandR/Events.php','ashim-d-silva-106271.jpg'),
(187,3,'UI/UX story telling','UI/UX story telling','http://localhost/RandR/Events.php','markus-spiske-207946.jpg');

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
(95,1,2,'Juan','user2','user2','dela Cruz','A','default-user.jpg'),
(96,2,1,'Kem','user123','user123123','Juntilla','Arcena','default-user.jpg'),
(97,1,2,'Kryce Earl','adminsdfds','adminsdfds','Martus','Arcena','default-user.jpg'),
(98,2,2,'Kem','user','user123','Juntilla','Arcena','default-user.jpg'),
(99,2,1,'Kem','user34','user123','Juntilla','Arcena','default-user.jpg'),
(100,1,1,'Kryce Earl aRTU','admin23','admin23','Martus','Arcena','default-user.jpg'),
(116,2,1,'Kem','user8989','user1238989','Juntilla','Arcena','default-user.jpg'),
(117,1,1,'Kryce Earl','admintest','admintest','Martus','Arcena','default-user.jpg'),
(118,1,1,'Kryce Earl','kemezike','kemezike','Martus','Arcena','default-user.jpg'),
(141,1,1,'aasdas','dasdsadsa','asdsadas','dsadsadsasadsad','sadsadsa','default-user.jpg'),
(142,2,1,'asdsadsadasad','asdsadsadsadsadsa','asdsadasdsa','sadsadsadsad','sadsadsa','default-user.jpg'),
(143,2,1,'123213','z12s12s','12s12s12','21321','21ews1','default-user.jpg'),
(144,2,1,'Vote','voter1','voter1','Viewer','V','default-user.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
