/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.5.68-MariaDB : Database - ares
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ares` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ares`;

/*Table structure for table `berichtenbalk` */

DROP TABLE IF EXISTS `berichtenbalk`;

CREATE TABLE `berichtenbalk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `radio` int(11) NOT NULL,
  `geaccepteerd` int(4) NOT NULL,
  `gastnaam` varchar(255) NOT NULL,
  `gastemail` varchar(255) NOT NULL,
  `bericht` varchar(600) NOT NULL,
  `ipadres` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

/*Data for the table `berichtenbalk` */



/*Table structure for table `berichtenbalkkleur` */

DROP TABLE IF EXISTS `berichtenbalkkleur`;

CREATE TABLE `berichtenbalkkleur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `radio` int(11) NOT NULL,
  `goedkeuren` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `bericht` varchar(255) NOT NULL,
  `bg` varchar(255) NOT NULL,
  `tekst1` varchar(255) NOT NULL,
  `tekst2` varchar(255) NOT NULL,
  `teksttitle` varchar(255) NOT NULL,
  `titlekleur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=678 DEFAULT CHARSET=latin1;

/*Data for the table `berichtenbalkkleur` */



/*Table structure for table `chat_settings` */

DROP TABLE IF EXISTS `chat_settings`;

CREATE TABLE `chat_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `radio` int(11) NOT NULL,
  `radionaam` varchar(255) NOT NULL,
  `themecolor` varchar(255) NOT NULL,
  `themefontcolor` varchar(255) NOT NULL,
  `autoplay` varchar(255) NOT NULL,
  `streamtype` varchar(255) NOT NULL,
  `streampath` varchar(255) NOT NULL,
  `startvolume` varchar(255) NOT NULL,
  `streamgegevens` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `radiouid` varchar(255) NOT NULL,
  `apikey` varchar(255) NOT NULL,
  `kanaalnaam` varchar(255) NOT NULL,
  `visits` int(11) NOT NULL,
  `lastused` varchar(255) NOT NULL,
  `bgurl` varchar(255) NOT NULL,
  `style` varchar(255) NOT NULL,
  `icons` varchar(255) NOT NULL,
  `mic` varchar(255) NOT NULL,
  `webcam` varchar(255) NOT NULL,
  `prive` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `chat_settings` */

/*Table structure for table `ipbans` */

DROP TABLE IF EXISTS `ipbans`;

CREATE TABLE `ipbans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `radio` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `reason` longtext NOT NULL,
  `banDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `ipbans` */



/*Table structure for table `player_settings` */

DROP TABLE IF EXISTS `player_settings`;

CREATE TABLE `player_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `radio` int(11) NOT NULL,
  `radionaam` varchar(255) NOT NULL,
  `themecolor` varchar(255) NOT NULL,
  `themefontcolor` varchar(255) NOT NULL,
  `autoplay` varchar(255) NOT NULL,
  `streamtype` varchar(255) NOT NULL,
  `streampath` varchar(255) NOT NULL,
  `startvolume` varchar(255) NOT NULL,
  `streamgegevens` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `radiouid` varchar(255) NOT NULL,
  `apikey` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

/*Data for the table `player_settings` */



/*Table structure for table `requests` */

DROP TABLE IF EXISTS `requests`;

CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `radio` int(11) NOT NULL,
  `requestDate` datetime NOT NULL,
  `artist` varchar(255) NOT NULL,
  `song` varchar(255) NOT NULL,
  `altartist` varchar(255) NOT NULL,
  `altsong` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `requests` */

/*Table structure for table `stream_settings` */

DROP TABLE IF EXISTS `stream_settings`;

CREATE TABLE `stream_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `radio` int(11) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `port` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `bg` varchar(255) NOT NULL,
  `bg1` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=530 DEFAULT CHARSET=latin1;

/*Data for the table `stream_settings` */



/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `station` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `radio` varchar(255) NOT NULL DEFAULT '0',
  `kick` varchar(255) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `verzoekform` int(11) NOT NULL DEFAULT '0',
  `chat` int(11) NOT NULL DEFAULT '0',
  `refresh` int(4) NOT NULL,
  `nextdj` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `nonstopavatar` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `activated` int(11) NOT NULL DEFAULT '0',
  `activationkey` longtext NOT NULL,
  `newpass` varchar(255) NOT NULL,
  `numOfRequests` int(11) NOT NULL DEFAULT '0',
  `loggedin` int(11) NOT NULL DEFAULT '0',
  `nonstopverzoek` varchar(60000) NOT NULL,
  `canchange` varchar(255) NOT NULL,
  `lastused` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`station`,`password`,`email`,`firstname`,`lastname`,`type`,`radio`,`kick`,`status`,`verzoekform`,`chat`,`refresh`,`nextdj`,`avatar`,`nonstopavatar`,`address`,`city`,`postcode`,`activated`,`activationkey`,`newpass`,`numOfRequests`,`loggedin`,`nonstopverzoek`,`canchange`,`lastused`) values 
(600,'admin','','e2c4ff3e1ff95f4c058a328be03c303ab3337c6a','test@test.com','CWO','Admin',3,'600','Ja',0,0,0,999,'','/avatars/c4all-ares.png','','','','',0,'','',0,0,'','','2020-11-24 23:18:55'),


/*Table structure for table `verzoek` */

DROP TABLE IF EXISTS `verzoek`;

CREATE TABLE `verzoek` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Radio` varchar(50) NOT NULL,
  `Aanvrager` varchar(50) NOT NULL,
  `Aangevraagd` varchar(100) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Radio` (`Radio`,`Aanvrager`,`Aangevraagd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `verzoek` */

/*!50106 set global event_scheduler = 1*/;

/* Event structure for event `update_loggedin` */

/*!50106 DROP EVENT IF EXISTS `update_loggedin`*/;

DELIMITER $$

/*!50106 CREATE DEFINER=`root`@`%` EVENT `update_loggedin` ON SCHEDULE EVERY 15 MINUTE STARTS '2019-05-12 01:23:12' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE users SET loggedin = 0 WHERE loggedin = 1 */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
