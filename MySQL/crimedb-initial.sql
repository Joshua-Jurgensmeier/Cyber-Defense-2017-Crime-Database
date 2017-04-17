-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `license_plate`
--

DROP TABLE IF EXISTS `license_plate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `license_plate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plate` varchar(16) DEFAULT NULL,
  `brand` varchar(32) DEFAULT NULL,
  `model` varchar(32) DEFAULT NULL,
  `color` varchar(32) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `owner` (`owner`),
  CONSTRAINT `license_plate_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `people` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `license_plate`
--

LOCK TABLES `license_plate` WRITE;
/*!40000 ALTER TABLE `license_plate` DISABLE KEYS */;
INSERT INTO `license_plate` VALUES (1,'123-XYZ','Toyota','Highlander','Silver',7);
/*!40000 ALTER TABLE `license_plate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `ssn` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (7,'CDC User','1990-02-20','123-45-6789'),(8,'Sam','1990-03-20','123-45-6788');
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `police_report`
--

DROP TABLE IF EXISTS `police_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `police_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reporting_officer` int(11) DEFAULT NULL,
  `report_time` datetime DEFAULT NULL,
  `offense_time` datetime DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `description` text,
  `reporting_person` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reporting_officer` (`reporting_officer`),
  KEY `reporting_person` (`reporting_person`),
  CONSTRAINT `police_report_ibfk_1` FOREIGN KEY (`reporting_officer`) REFERENCES `users` (`id`),
  CONSTRAINT `police_report_ibfk_2` FOREIGN KEY (`reporting_person`) REFERENCES `people` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `police_report`
--

LOCK TABLES `police_report` WRITE;
/*!40000 ALTER TABLE `police_report` DISABLE KEYS */;
INSERT INTO `police_report` VALUES (2,2,'2017-03-28 10:20:30','2017-03-28 10:01:10','Speeding Ticket','Involved the car 123-XYZ',7);
/*!40000 ALTER TABLE `police_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  `role` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'cdc','cdc','admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warrants`
--

DROP TABLE IF EXISTS `warrants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warrants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(512) DEFAULT NULL,
  `person` int(11) DEFAULT NULL,
  `granted_date` date DEFAULT NULL,
  `served_at` datetime DEFAULT NULL,
  `served_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `person` (`person`),
  KEY `served_by` (`served_by`),
  CONSTRAINT `warrants_ibfk_1` FOREIGN KEY (`person`) REFERENCES `people` (`id`),
  CONSTRAINT `warrants_ibfk_2` FOREIGN KEY (`served_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warrants`
--

LOCK TABLES `warrants` WRITE;
/*!40000 ALTER TABLE `warrants` DISABLE KEYS */;
INSERT INTO `warrants` VALUES (1,'Search of Vehicle',7,'2017-03-28','2017-03-28 09:10:23',2);
/*!40000 ALTER TABLE `warrants` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-29  0:04:57
