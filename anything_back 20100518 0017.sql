-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.89-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema anything
--

CREATE DATABASE IF NOT EXISTS anything;
USE anything;

--
-- Definition of table `diaries`
--

DROP TABLE IF EXISTS `diaries`;
CREATE TABLE `diaries` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `status` int(10) unsigned NOT NULL default '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diaries`
--

/*!40000 ALTER TABLE `diaries` DISABLE KEYS */;
/*!40000 ALTER TABLE `diaries` ENABLE KEYS */;


--
-- Definition of table `diary_post_comments`
--

DROP TABLE IF EXISTS `diary_post_comments`;
CREATE TABLE `diary_post_comments` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `body` text NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `diary_post_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diary_post_comments`
--

/*!40000 ALTER TABLE `diary_post_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `diary_post_comments` ENABLE KEYS */;


--
-- Definition of table `diary_posts`
--

DROP TABLE IF EXISTS `diary_posts`;
CREATE TABLE `diary_posts` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(45) NOT NULL,
  `body` varchar(45) NOT NULL,
  `diary_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diary_posts`
--

/*!40000 ALTER TABLE `diary_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `diary_posts` ENABLE KEYS */;


--
-- Definition of table `event_users`
--

DROP TABLE IF EXISTS `event_users`;
CREATE TABLE `event_users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `event_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `status` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_users`
--

/*!40000 ALTER TABLE `event_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_users` ENABLE KEYS */;


--
-- Definition of table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;


--
-- Definition of table `group_memberships`
--

DROP TABLE IF EXISTS `group_memberships`;
CREATE TABLE `group_memberships` (
  `group_id` int(10) unsigned NOT NULL,
  `user_id` varchar(45) NOT NULL,
  PRIMARY KEY  (`group_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_memberships`
--

/*!40000 ALTER TABLE `group_memberships` DISABLE KEYS */;
INSERT INTO `group_memberships` (`group_id`,`user_id`) VALUES 
 (1,'4'),
 (2,'5');
/*!40000 ALTER TABLE `group_memberships` ENABLE KEYS */;


--
-- Definition of table `group_post_comments`
--

DROP TABLE IF EXISTS `group_post_comments`;
CREATE TABLE `group_post_comments` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `group_post_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned default NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_post_comments`
--

/*!40000 ALTER TABLE `group_post_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_post_comments` ENABLE KEYS */;


--
-- Definition of table `group_posts`
--

DROP TABLE IF EXISTS `group_posts`;
CREATE TABLE `group_posts` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(45) NOT NULL,
  `body` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_posts`
--

/*!40000 ALTER TABLE `group_posts` DISABLE KEYS */;
INSERT INTO `group_posts` (`id`,`title`,`body`,`created`,`updated`,`status`,`user_id`,`group_id`) VALUES 
 (1,'èŒƒå¾·è¨','æ”¾å¤§æ³•','2010-05-13 16:11:56','2010-05-13 16:11:56',0,1,1),
 (2,'你好你好！','æ”¾å¤§æ³•','2010-05-13 16:12:32','2010-05-13 16:12:32',0,3,1),
 (3,'dsdsdsdsds','dsdsadasdsadas','2010-05-13 16:12:32','2010-05-13 16:12:32',0,2,2),
 (4,'éŸ©è¯­å¥½éš¾å­¦å•Š','å°±æ˜¯å°±æ˜¯ä½¿','2010-05-15 04:50:02','2010-05-15 04:50:02',0,5,1);
/*!40000 ALTER TABLE `group_posts` ENABLE KEYS */;


--
-- Definition of table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `desc` text,
  `avatar` varchar(45) default NULL,
  `created` datetime default NULL,
  `updated` datetime default NULL,
  `status` int(10) unsigned default '0',
  `privacy` int(10) unsigned default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`,`name`,`desc`,`avatar`,`created`,`updated`,`status`,`privacy`) VALUES 
 (1,'ä¸çŸ¥é“è¯´å•¥','ä¸çŸ¥é“ä¸çŸ¥é“',NULL,'2010-05-13 16:09:09','2010-05-15 04:51:34',NULL,0),
 (2,'éŸ©å›½è¯­å°ç»„','å­¦ä¹ éŸ©è¯­ã€‚',NULL,'2010-05-15 04:49:01','2010-05-15 04:49:01',0,0);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


--
-- Definition of table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `from` int(10) unsigned NOT NULL,
  `to` int(10) unsigned NOT NULL,
  `title` varchar(45) NOT NULL,
  `body` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `mail_type` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `uid` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`username`,`email`,`password`,`created`,`modified`,`uid`) VALUES 
 (1,'aaa','dfdf@ddd.com','05a9c8c35f4c90c00f752a59724ff99cada97331','2010-05-12 14:07:13','2010-05-12 14:07:13',NULL),
 (2,'aa','dfdf','3823fbeacddba6c2db3579fdc7551bfb63c7b521','2010-05-12 14:24:08','2010-05-12 14:24:08',NULL),
 (3,'aa','dfdf@ddfd.com','b842ace9101bf305ffd3b4e432f7278498ff64c2','2010-05-12 14:26:40','2010-05-12 14:26:40',NULL),
 (4,'aaaa','user1@gmail.com','2704619c90848416254e419a94d95b81d48c7387','2010-05-12 14:29:17','2010-05-12 14:29:17',NULL),
 (5,'jim','user2@gmail.com','2704619c90848416254e419a94d95b81d48c7387','2010-05-15 04:48:18','2010-05-15 04:48:18',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
