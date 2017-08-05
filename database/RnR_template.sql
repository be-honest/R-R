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
/*Table structure for table `activities` */

DROP TABLE IF EXISTS `activities`;

CREATE TABLE `activities` (
  `activity_id` int(10) NOT NULL AUTO_INCREMENT,
  `event_id` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`activity_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `activities` */

/*Table structure for table `checklist` */

DROP TABLE IF EXISTS `checklist`;

CREATE TABLE `checklist` (
  `checklist_id` int(10) NOT NULL AUTO_INCREMENT,
  `event_id` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`checklist_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `checklist_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `checklist` */

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
(2,1),
(2,2),
(2,3),
(3,1),
(3,3);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `event_voting_period` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `events` */

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`user_type_id`,`status_id`,`first_name`,`username`,`password`,`last_name`,`middle_name`,`profile_picture`) values 
(1,1,1,'Kryce Earl','admin1','admin1','Martus','Arcena','default-user.jpg'),
(2,1,2,'Honest','admin2','admin2','Aguanta','','default-user.jpg'),
(3,2,1,'Kem','user1','user1','Juntilla','Arcena','1.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
