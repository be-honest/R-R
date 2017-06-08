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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `activities` */

insert  into `activities`(`activity_id`,`event_id`,`name`) values 
(43,171,'Opening Ceremony'),
(44,188,'Gather'),
(45,188,'Dinner'),
(46,188,'Games'),
(47,188,'Contest');

/*Table structure for table `checklist` */

DROP TABLE IF EXISTS `checklist`;

CREATE TABLE `checklist` (
  `checklist_id` int(10) NOT NULL AUTO_INCREMENT,
  `event_id` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`checklist_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `checklist_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `checklist` */

insert  into `checklist`(`checklist_id`,`event_id`,`name`) values 
(14,171,'Extra Shirt'),
(15,188,'Extra Shirt'),
(16,188,'Pocket Money'),
(17,188,'Bottled Water');

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
(187,1),
(187,2),
(187,3),
(188,2),
(191,1),
(191,3);

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
(1,1,2,'2017-03-01','2017-03-15','2017-03-23','2017-03-26'),
(2,2,2,'2017-04-01','2017-04-15','2017-04-29','2017-04-30'),
(3,2,3,'2017-05-01','2017-05-15','2017-05-15','2017-05-22'),
(4,3,3,'2017-06-01','2017-06-15','2017-06-15','2017-06-24'),
(5,3,3,'2017-07-01','2017-07-15','2017-07-22','2017-07-29');

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
(36,4,'Parasailing','Parasailing at Badian','http://localhost/RandR/Events.php','aj-garcia-225309.jpg',NULL),
(37,1,'Micro R&R','Mini Sports Olympics @ Family Park','http://localhost/RandR/Events.php',NULL,NULL),
(46,1,'Tree Planting','Tree Planting at Maghaway','http://localhost/RandR/Events.php',NULL,NULL),
(171,4,'Trekking','Trekking at Mt. Kan Irag, Cebu','http://localhost/RandR/Events.php','ashim-d-silva-106271.jpg',NULL),
(172,3,'Scuba Diving','Scuba Diving at Cordova, Mactan Cebu','http://localhost/RandR/Events.php','marco-assmann-178084.jpg',NULL),
(175,3,'Hiking','Hiking at SRP','http://localhost/RandR/Events.php','ashim-d-silva-106271.jpg',NULL),
(187,5,'UI/UX story telling','UI/UX story telling','http://localhost/RandR/Events.php','markus-spiske-207946.jpg',1),
(188,4,'Bon Odori 2017','Japanese summer night festival at Kawit Point, SRP. Starts at 4 P.M.','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6602.599857727373!2d123.88095872975632!3d10.267275254102438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9bf8a95ec0d4105c!2sKawit+Point!5e0!3m2!1sen!2sph!4v1496818004881\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','anndrea-joiner-207885.jpg',NULL),
(190,1,'Forest Exploration','Explore the wonders of nature and be one with the forest','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6602.599857727373!2d123.88095872975632!3d10.267275254102438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9bf8a95ec0d4105c!2sKawit+Point!5e0!3m2!1sen!2sph!4v1496818004881\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','anthony-gotter-670.jpg',NULL),
(191,4,'Skiing','Skii at Alaska','https://cdn.datatables.net/1.10.14/css/jquery.dataTables.min.css','toa-heftiba-153852.jpg',1);

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
(1,1,1,'Kryce Earl','admin1','admin1','Martus','Arcena','default-user.jpg'),
(2,1,1,'Honest','admin2','admin2','Aguanta','','default-user.jpg'),
(3,2,1,'Kem','user1','user1','Juntilla','Arcena','default-user.jpg'),
(95,1,2,'Juan','user2','user2','dela Cruz','A','default-user.jpg'),
(100,2,2,'John','user3','user3','Smith','K','team1.png'),
(144,2,2,'Vote','voter1','voter1','Viewer','V','default-user.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
