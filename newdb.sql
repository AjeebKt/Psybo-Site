-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: psybo-db
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.04.1

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
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `address` varchar(70) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `telephone` varchar(13) DEFAULT NULL,
  `mobile` varchar(13) DEFAULT NULL,
  `website` varchar(45) DEFAULT NULL,
  `linkedin` varchar(50) DEFAULT NULL,
  `fb` varchar(50) DEFAULT NULL,
  `twiter` varchar(50) DEFAULT NULL,
  `git` varchar(60) DEFAULT NULL,
  `google_plus` varchar(85) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (1,'noushid','pakath(h mampad','pnoushid@gmail.com',NULL,'+918089183628',NULL,'in.linkedin.com/in/noushid','https://www.facebook.com/noushid.p',NULL,NULL,NULL),(2,'PSYBO TECHNOLOGIES','V2 Tower Opp Old Bus Stand  Pandikkad Road  Manajeri  676121','info@psybotechnologies.com','+91 4832 9701','+917736669113','www.psybotechnologies.com','https://www.linkedin.com/company/psybo-technologie','https://www.facebook.com/psybotechnologies','https://twitter.com/psybotech',NULL,'https://plus.google.com/113947300634370097170'),(3,'ajeeb','KT','ajeebkt@gmail.com',NULL,'8606906242',NULL,'https://in.linkedin.com/in/ajeebkt','https://www.facebook.com/ajeebkt','https://twitter.com/',NULL,'https://plus.google.com/+AjeebKTajb/'),(4,'sufail.tp','TP','mhdsufail@gmail.com',NULL,'8606906244',NULL,'https://in.linkedin.com/in/muhammedsufail','https://www.facebook.com/sufail.tp.1',NULL,NULL,'https://plus.google.com/108792915859177886218/'),(17,'shahid',NULL,NULL,NULL,NULL,NULL,'www.linkedin/shahid','www.twiter/shahid','www.twiter/shahid',NULL,'www.googleplue/shahid'),(18,'shamas',NULL,NULL,NULL,NULL,NULL,'www.linkedin/shahid','www.twiter/shahid','www.twiter/shahid',NULL,'www.googleplue/shahid'),(19,'shamas1',NULL,NULL,NULL,NULL,NULL,'www.linkedin/shahid','www.twiter/shahid','www.twiter/shahid',NULL,'www.googleplue/shahid'),(20,NULL,NULL,NULL,NULL,NULL,NULL,'www.linkedin.com','www.facebook.com','www.twiter.com',NULL,'www.google.com'),(21,NULL,NULL,NULL,NULL,NULL,NULL,'www.linkedin.com','www.facebook.com','www.twiter.com',NULL,'www.google.com'),(22,NULL,NULL,NULL,NULL,NULL,NULL,'knjlknj','hjvbhj','kjbkj',NULL,'lkjolk:L;lhjvc'),(23,NULL,NULL,NULL,NULL,NULL,NULL,'bjbj','kjbkjb','kjb;kj',NULL,'bjb'),(24,NULL,NULL,NULL,NULL,NULL,NULL,'bkjhb','jbkjb','jbjkb',NULL,'hblhkjbl'),(25,NULL,NULL,NULL,NULL,NULL,NULL,'h;kjbh','kjhkjh','jh;j',NULL,'jbhjhb'),(26,'noushid',NULL,NULL,NULL,NULL,NULL,'jnbjb','bhkjfli','lkjhlkjh',NULL,'kjkjbl/kjlk'),(27,'ajeeb',NULL,NULL,NULL,NULL,NULL,'kjhb.kjb','jkbhkj','jbkjb',NULL,'kjb;kj'),(28,'shamas',NULL,NULL,NULL,NULL,NULL,'linkedin/shamas','www.shamas.com','twiter/shamas',NULL,'gplus/shamas'),(29,'noushid',NULL,NULL,NULL,NULL,NULL,'linkedin','facebook','twitter',NULL,'google plus'),(30,'ajeeb',NULL,NULL,NULL,NULL,NULL,'ajeeblik','ajeebfb','ajeebtw',NULL,'ajeegoogke'),(31,'noushid',NULL,NULL,NULL,NULL,NULL,'lij','fav','tw',NULL,'goog'),(32,'ajeeb',NULL,NULL,NULL,NULL,NULL,'hjbhj','ajeb','ghv',NULL,'kjnkj'),(33,'df',NULL,NULL,NULL,NULL,NULL,'fddf','ff','fd',NULL,'fd'),(34,'df',NULL,NULL,NULL,NULL,NULL,'fddf','ff','fd',NULL,'fd'),(35,'fgh',NULL,NULL,NULL,NULL,NULL,'fghghf','ggh','fghghf',NULL,'fghgh'),(36,'dd',NULL,NULL,NULL,NULL,NULL,'ddd','dd','dd',NULL,'dd'),(37,'anshad',NULL,NULL,NULL,NULL,NULL,'etheettilla','aayitiila','illa',NULL,'ind parayilaa'),(38,'anshad',NULL,NULL,NULL,NULL,NULL,'etheettilla','aayitiila','illa',NULL,'ind parayilaa'),(39,'noushid',NULL,NULL,NULL,NULL,NULL,'linkedin','facebook','twiter/shamas',NULL,'google plus'),(40,'<script type=\'text/javascript\'',NULL,NULL,NULL,NULL,NULL,'fdfas','dsfsaf','fadfsa',NULL,'dffds'),(41,'Sufu',NULL,NULL,NULL,NULL,NULL,'www.linkedin.com','www.facebook.com','wwww.twitter.com',NULL,'www.google.com'),(42,'ajeeb',NULL,NULL,NULL,NULL,NULL,'etheettilla','aayitiila','ajeebtw',NULL,'bjb'),(43,'Sufu',NULL,NULL,NULL,NULL,NULL,'www.linkedin.com','www.facebook.com','wwww.twitter.com',NULL,'www.google.com'),(44,'Sufu',NULL,NULL,NULL,NULL,NULL,'www.linkedin.com','www.facebook.com','wwww.twitter.com',NULL,'www.google.com'),(45,'shamas',NULL,NULL,NULL,NULL,NULL,'bjbj','facebook','twiter/shamas',NULL,'google plus'),(46,'noushid',NULL,NULL,NULL,NULL,NULL,'etheettilla','facebook','ajeebtw',NULL,'google plus'),(47,'ajeeb',NULL,NULL,NULL,NULL,NULL,'a','a','a',NULL,'a'),(48,'noushid',NULL,NULL,NULL,NULL,NULL,'hvjh','hbjh','jhvhjv',NULL,'hjvh'),(49,'lais',NULL,NULL,NULL,NULL,NULL,'www.linkedin.com','www.facebook.com','www',NULL,'www.google.com'),(50,'shamas',NULL,NULL,NULL,NULL,NULL,'www.linkedin.com','www.facebook.com','www.twiter.com',NULL,'www.google.com'),(51,'anshad',NULL,NULL,NULL,NULL,NULL,'dummy','dummy','dummy',NULL,'dummy'),(52,'dummy',NULL,NULL,NULL,NULL,NULL,'dummy','dummy','dummy',NULL,'dummy'),(53,'dummy',NULL,NULL,NULL,NULL,NULL,'dummy','dummy','dummy',NULL,'dummy'),(54,'dummy',NULL,NULL,NULL,NULL,NULL,'dummy','dummy','dummy',NULL,'dummy'),(55,'noushid',NULL,NULL,NULL,NULL,NULL,'http://www.linkedin.com','http://www.facebook.com','http://www.twiter.com',NULL,'http://www.google.com'),(56,'noushid',NULL,NULL,NULL,NULL,NULL,'https://www.linkedin.com','https://www.facebook.com','https://www.twiter.com',NULL,'https://www.google.com'),(57,'ajeeb',NULL,NULL,NULL,NULL,NULL,'https://www.linkedin.com','https://facebook','https://fghghf',NULL,'https://www.google.com'),(58,'ajeeb',NULL,NULL,NULL,NULL,NULL,'https://www.linkedin.com','https://facebook','https://www.twiter.com',NULL,'https://www.google.com'),(59,'ajeeb',NULL,NULL,NULL,NULL,NULL,'https://www.linkedin.com','https://facebook','https://www.twiter.com',NULL,'https://www.google.com'),(60,'shamas',NULL,NULL,NULL,NULL,NULL,'https://www.linkedin.com','https://ssss','https://ssss',NULL,'https://www.google.com'),(61,'ajeeb',NULL,NULL,NULL,NULL,NULL,'https://www.linkedin.com','https://www.facebook.com','https://www.twiter.com',NULL,'https://www.google.com'),(62,'ajeeb',NULL,NULL,NULL,NULL,NULL,'https://www.linkedin.com','https://www.facebook.com','https://www.twiter.com',NULL,'https://www.google.com'),(63,'noushd',NULL,NULL,NULL,NULL,NULL,NULL,'https://www.facebook.com',NULL,NULL,'https://www.google.com'),(64,'ajeeb',NULL,NULL,NULL,NULL,NULL,'https://www.linkedin.com','https://www.facebook.com','https://www.twiter.com',NULL,'https://www.google.com'),(65,'ee',NULL,NULL,NULL,NULL,NULL,NULL,'https://ghjhh',NULL,NULL,NULL),(66,'ww',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(67,'s',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(68,'ds',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(69,'s',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(70,'ww',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(71,'noushid',NULL,NULL,NULL,NULL,NULL,'https://linkedin','https://www.facebook.com','https://twitter',NULL,'https://www.google.com'),(72,'noushid',NULL,NULL,NULL,NULL,NULL,'https://linkedin','https://www.facebook.com','https://twitter',NULL,'https://www.google.com'),(73,'noushid',NULL,NULL,NULL,NULL,NULL,'https://linkedin','https://www.facebook.com','https://twitter',NULL,'https://goog'),(74,'ajeeb',NULL,NULL,NULL,NULL,NULL,NULL,'https://www.facebook.com',NULL,NULL,NULL),(75,'sufail',NULL,NULL,NULL,NULL,NULL,NULL,'https://www.facebook.com','https://www.twiter.com',NULL,NULL),(76,'shamas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'https://www.google.com'),(77,'naseeba.c',NULL,NULL,NULL,NULL,NULL,NULL,'https://naseebanasi.facebook',NULL,NULL,NULL),(78,'naseeba.cd',NULL,NULL,NULL,NULL,NULL,NULL,'https://naseebanasi.facebook',NULL,NULL,NULL),(79,'naseeba',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'https://1455668.facebook'),(80,'%5E%5E%5E%5E%5E%5E%5E%5E%5E',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(81,'noushid njbkj',NULL,NULL,NULL,NULL,NULL,'https://kjnkjn','https://jnkj','https://kjnkj',NULL,NULL),(82,'noushidoi.p',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(83,'kjhlj_hjbgj',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(84,'kjlkj-hjbj',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(85,'ukhilj%3Ekjh%25%3E%3E%3C',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(86,'noushid',NULL,NULL,NULL,NULL,NULL,'https://jbk','https://jbkj','https://kjbkjb',NULL,'https://jkbk'),(87,'jknkjbk4567890%40%23%24%25%5E%',NULL,NULL,NULL,NULL,NULL,'https://fcvg78vgbh',NULL,'https://567fg',NULL,'https://678fghbjn'),(88,'jnjkn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(89,'jnjkn',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(90,'nous',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(91,'bnb',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(92,'test with space',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(93,'with sp %21%40%23%24%25%5EQwer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(94,'klknl',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(95,'noushid p',NULL,NULL,NULL,NULL,NULL,'https://www.linkedin.com','https://www.facebook.com/noushid','https://www.twiter.com',NULL,'https://www.google.com'),(96,'dd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(97,'shahiddfghjk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'https://dfghkl',NULL,'https://qwer'),(98,'jhgf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(99,'ss',NULL,NULL,NULL,NULL,NULL,'https://waerdftgyhj',NULL,NULL,NULL,NULL),(100,'asdfghjkl',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(101,'S',NULL,NULL,NULL,NULL,NULL,'https://linkedin','https://facebook',NULL,NULL,NULL),(102,'s',NULL,NULL,NULL,NULL,NULL,'https://linkedin','https://facebook',NULL,NULL,NULL),(103,'S',NULL,NULL,NULL,NULL,NULL,'https://linkedin','https://facebook','https://twitter',NULL,NULL),(104,'dfghjk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(105,'aqswdfgh',NULL,NULL,NULL,NULL,NULL,'https://sdfgh',NULL,NULL,NULL,'https://swdefr'),(106,'qawsdefg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(107,'ww',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(108,'naseeba.cd',NULL,NULL,NULL,NULL,NULL,'https://dzfg.linkedin','https://adf.facebook',NULL,NULL,NULL),(109,'dsddf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(110,'dfgbhnj',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(111,'sdfghj',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(112,'qwsedrfg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(113,'AS',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(114,'WSEDFG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(115,'FGYHKT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(116,'DGHDFGJ',NULL,NULL,NULL,NULL,NULL,'https://DFGYH','https://facebook','https://GHJFGJ',NULL,'https://JJJ'),(117,'DHD',NULL,NULL,NULL,NULL,NULL,NULL,'https://DGJH',NULL,NULL,NULL),(118,'DGCHDG',NULL,NULL,NULL,NULL,NULL,'https://DGJH','https://GCJ',NULL,NULL,NULL),(119,'noushid',NULL,NULL,NULL,NULL,NULL,'https://UGHJL','https://HJK','https://kjhkjh',NULL,NULL),(120,'kjkddd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(121,'FHKJVK',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'https://GJLK'),(122,'DZGXF',NULL,NULL,NULL,NULL,NULL,'https://DGJH','https://HDFGHJ',NULL,NULL,NULL),(123,'SFRTG',NULL,NULL,NULL,NULL,NULL,NULL,'https://DFSGH',NULL,NULL,NULL),(124,'DFH',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'https://DGHG',NULL,NULL),(125,'FGJ',NULL,NULL,NULL,NULL,NULL,'https://FHG','https://FJH','https://FJ',NULL,NULL),(126,'ss',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(127,'sljsuk',NULL,NULL,NULL,NULL,NULL,'https://sajd','https://sl','https://dalj',NULL,NULL),(128,'add',NULL,NULL,NULL,NULL,NULL,'https://sdklgkf','https://sdk','https://dfgh',NULL,'https://vdsl'),(129,'click me',NULL,NULL,NULL,NULL,NULL,NULL,'https://www.facebook.com/noushid',NULL,NULL,NULL),(130,'ajeeb',NULL,NULL,NULL,NULL,NULL,'https://www.linkedin.com','https://www.facebook.com/ajeeb','https://www.twiter.com/noushid',NULL,'https://www.google.com'),(131,'aaa',NULL,NULL,NULL,NULL,NULL,NULL,'https://www.facebook.com','https://www.twiter.com',NULL,'https://www.google.com'),(132,'thenga',NULL,NULL,NULL,NULL,NULL,'https://fdsafdsaf','http://ww.pattanathcom','https://fdsafdsa',NULL,'https://fdsafdsa'),(133,'noushid p',NULL,NULL,NULL,NULL,NULL,'https://www.linkedin.com',NULL,NULL,NULL,'https://www.google.com'),(134,'noushhhl    p',NULL,NULL,NULL,NULL,NULL,'https://www.linkedin.com',NULL,NULL,NULL,NULL),(135,' ajeeb kt',NULL,NULL,NULL,NULL,NULL,'https://www.linkedin.com','https://www.facebook.com/noushid',NULL,NULL,NULL),(136,'sahal',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(138,'ww',NULL,NULL,NULL,NULL,NULL,'https://www.linkedin.com','https://www.facebook.com/noushid',NULL,NULL,NULL),(139,'ww',NULL,NULL,NULL,NULL,NULL,'https://www.linkedin.com','https://www.facebook.com',NULL,NULL,'https://www.google.com'),(140,'ww',NULL,NULL,NULL,NULL,NULL,'https://www.linkedin.com','https://www.facebook.com/noushid','https://www.twiter.com',NULL,'https://www.google.com'),(141,'shahid',NULL,NULL,NULL,NULL,NULL,NULL,'https://www.facebook.com/shahid','https://www.twiter.com',NULL,NULL),(142,'ajebbb kt ghjguk',NULL,NULL,NULL,NULL,NULL,'https://www.linkedin.com','https://www.facebook.com/ajeeb','',NULL,'https://www.google.com'),(143,'noushid',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(144,'asdfghj',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(145,'asdfg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(146,'noushid',NULL,NULL,NULL,NULL,NULL,'https://www.linkedin.com','https://www.facebook.com/noushid','https://www.twiter.com',NULL,'https://www.google.com'),(147,'jhv',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(148,'vjv',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(149,'vjgvjgv',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(150,'gvgc',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(151,'vjhvjhv',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(169,'awsedrftgh',NULL,NULL,NULL,NULL,NULL,'','','',NULL,''),(170,'sdfgh',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(171,'wedrftgy',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(172,'noushid',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_details`
--

DROP TABLE IF EXISTS `company_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_holidays` int(11) DEFAULT NULL,
  `open_time` varchar(15) DEFAULT NULL,
  `close_time` varchar(45) DEFAULT NULL,
  `address_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`address_id`),
  KEY `fk_company_details_address1_idx` (`address_id`),
  CONSTRAINT `fk_company_details_address1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_details`
--

LOCK TABLES `company_details` WRITE;
/*!40000 ALTER TABLE `company_details` DISABLE KEYS */;
INSERT INTO `company_details` VALUES (2,13,'9.00 am','5.00 pm',2);
/*!40000 ALTER TABLE `company_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(45) NOT NULL,
  `files_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_employee_files_idx` (`files_id`),
  KEY `fk_employee_address1_idx` (`address_id`),
  CONSTRAINT `fk_employee_address1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee_files` FOREIGN KEY (`files_id`) REFERENCES `files` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (138,'swderftgyh',404,169),(139,'sdfg',406,170),(140,'derftgyhu',408,171),(141,'develepor',409,172);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=410 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (68,'JPG','DSC_0935.JPG'),(69,'',''),(70,'',''),(71,'',''),(72,'',''),(73,'',''),(74,'jpg','7.jpg'),(75,'JPG','DSC_1077.JPG'),(76,'jpg','DSC_1082.jpg'),(77,'JPG','IMG_0389.JPG'),(78,'jpg','7.jpg'),(79,'jpg','canberra_hero_image1.jpg'),(80,'jpg','7.jpg'),(81,'jpg','7.jpg'),(82,'jpg','7.jpg'),(83,'jpg','asd.jpg'),(84,'JPG','DSC_1077.JPG'),(85,'jpg','DSC_1082.jpg'),(86,'JPG','IMG_0389.JPG'),(87,'jpg','7.jpg'),(88,'JPG','DSC_1077.JPG'),(89,'jpg','DSC_1082.jpg'),(90,'jpg','asd.jpg'),(91,'',''),(92,'jpg','asd.jpg'),(93,'jpg','asd.jpg'),(94,'jpg','asd.jpg'),(95,'jpg','asd.jpg'),(96,'jpg','asd.jpg'),(97,'',''),(98,'JPG','DSC_0935.JPG'),(99,'jpg','asd.jpg'),(100,'jpg','asd.jpg'),(101,'jpg','asd.jpg'),(102,'jpg','18802.jpg'),(103,'0','floor_1-512.png'),(104,'0','floor_1-512.png'),(105,'0','floor_1-512.png'),(106,'jpg','asd.jpg'),(107,'0','floor_1-512.png'),(108,'0','floor_1-512.png'),(109,'0','floor_1-512.png'),(110,'jpg','18802.jpg'),(111,'jpeg','12158d4e37bf508c0b3b473ce'),(112,'jpg','qwertyuiopasdfghjklkzxcvb'),(113,'jpg','board-361516-640.jpg'),(114,'JPG','DSC_1077.JPG'),(115,'JPG','DSC_1077.JPG'),(116,'JPG','DSC_1077.JPG'),(117,'jpg','18802.jpg'),(118,'jpg','canberra_hero_image1.jpg'),(119,'jpg','bigstock-Test-word-on-whi'),(120,'JPG','IMG_0389.JPG'),(121,'jpg','bigstock-Test-word-on-whi'),(122,'jpg','bigstock-Test-word-on-white-keyboard-27134336.jpg'),(123,'jpg','asd.jpg'),(124,'jpg','18802.jpg'),(125,'','DSC_1077.JPG'),(126,'','7.jpg'),(127,'','7.jpg'),(128,'','asd.jpg'),(129,'JPG','DSC_0935.JPG'),(130,'JPG','DSC_1077.JPG'),(131,'JPG','DSC_1077.JPG'),(132,'JPG','DSC_1077.JPG'),(133,'JPG','DSC_1077.JPG'),(134,'jpg','asd.jpg'),(135,'jpg','asd.jpg'),(136,'jpg','asd.jpg'),(137,'JPG','IMG_0389.JPG'),(138,'jpg','DSC_1082.jpg'),(139,'jpg','312784078.jpg'),(140,'jpg','685934912.jpg'),(141,'jpg','1016861941.jpg'),(142,'jpg','473875837.jpg'),(143,'jpg','1968988681.jpg'),(144,'jpg','2102658961.jpg'),(145,'JPG','883918244.JPG'),(146,'JPG','766648446.JPG'),(147,'jpg','226032059.jpg'),(148,'jpg','112659478.jpg'),(149,'jpg','194063097.jpg'),(150,'jpg','1371573974.jpg'),(151,'jpg','1654157402.jpg'),(152,'jpg','1648487462.jpg'),(153,'jpg','588843772.jpg'),(154,'jpg','1154437978.jpg'),(155,'jpg','2513666.jpg'),(156,'jpg','2046426107.jpg'),(157,'jpg','1147567131.jpg'),(158,'jpg','1729400892.jpg'),(159,'jpg','1592755363.jpg'),(160,'jpg','965253319.jpg'),(161,'jpg','653288238.jpg'),(162,'jpg','1857304566.jpg'),(163,'jpg','751601040.jpg'),(164,'jpg','1885862739.jpg'),(165,'jpg','1181886983.jpg'),(166,'jpg','1581744785.jpg'),(167,'jpg','1456448640.jpg'),(168,'jpg','1894799368.jpg'),(169,'jpg','964729505.jpg'),(170,'jpg','962002541.jpg'),(171,'JPG','859670973.JPG'),(172,'jpg','247067447.jpg'),(173,'jpg','1966298801.jpg'),(174,'JPG','1868831288.JPG'),(175,'jpg','1383338447.jpg'),(176,'jpg','803466767.jpg'),(177,'jpg','2138630712.jpg'),(178,'jpg','1430409170.jpg'),(179,'jpeg','855901071.jpeg'),(180,'JPG','1821265953.JPG'),(181,'jpg','1538653320.jpg'),(182,'jpg','1018409031.jpg'),(183,'jpg','2096208206.jpg'),(184,'jpg','610371206.jpg'),(185,'jpg','56376803.jpg'),(186,'JPG','690822097.JPG'),(187,'JPG','998641404.JPG'),(188,'jpg','1462120364.jpg'),(189,'JPG','1272775230.JPG'),(190,'jpeg','1403423246.jpeg'),(191,'jpg','1934094782.jpg'),(192,'jpg','747359735.jpg'),(193,'jpeg','530001798.jpeg'),(194,'jpg','386710124.jpg'),(195,'jpg','1678684954.jpg'),(196,'jpg','1764372475.jpg'),(197,'jpg','430912139.jpg'),(198,'jpg','1198467996.jpg'),(199,'jpg','1851308712.jpg'),(200,'jpg','190835413.jpg'),(201,'jpg','1892906315.jpg'),(202,'jpg','657217239.jpg'),(203,'jpg','1005722994.jpg'),(204,'jpg','1104867184.jpg'),(205,'jpg','1296224217.jpg'),(206,'jpg','1137766565.jpg'),(207,'jpg','596130518.jpg'),(208,'jpg','1713040097.jpg'),(209,'jpg','133456219.jpg'),(210,'jpg','138491437.jpg'),(211,'jpg','1185792637.jpg'),(212,'jpg','1466085340.jpg'),(213,'jpg','1691016534.jpg'),(214,'jpg','1733202636.jpg'),(215,'jpg','1180250789.jpg'),(216,'jpg','1019028762.jpg'),(217,'jpg','1236318103.jpg'),(218,'jpg','1822234641.jpg'),(219,'jpg','1227462175.jpg'),(220,'jpg','1543956197.jpg'),(221,'jpg','868613822.jpg'),(222,'jpg','1804904880.jpg'),(223,'jpg','1618506665.jpg'),(224,'jpg','1029972185.jpg'),(225,'jpg','1152810593.jpg'),(226,'jpg','1329590881.jpg'),(227,'JPG','493198883.JPG'),(228,'jpg','616715030.jpg'),(229,'jpg','790488117.jpg'),(230,'jpg','1582033521.jpg'),(231,'jpg','1732083156.jpg'),(232,'jpeg','721664235.jpeg'),(233,'jpg','1461175409.jpg'),(234,'jpg','1639126395.jpg'),(235,'jpg','566110666.jpg'),(236,'jpg','1775663852.jpg'),(237,'jpg','1738732153.jpg'),(238,'jpg','1270237610.jpg'),(239,'jpeg','1265982083.jpeg'),(240,'jpg','931363874.jpg'),(241,'jpg','17584290.jpg'),(242,'jpg','691921844.jpg'),(243,'jpg','2090650974.jpg'),(244,'jpg','762022582.jpg'),(245,'jpg','487560975.jpg'),(246,'jpg','876405223.jpg'),(247,'jpg','1221187009.jpg'),(248,'jpg','1194659050.jpg'),(249,'jpg','188527299.jpg'),(250,'jpg','714859298.jpg'),(251,'jpeg','1510824776.jpeg'),(252,'jpg','1215992612.jpg'),(253,'jpg','585668193.jpg'),(254,'jpg','501421889.jpg'),(255,'jpg','1926204190.jpg'),(256,'jpg','690892879.jpg'),(257,'jpg','732458754.jpg'),(258,'jpg','1219513210.jpg'),(259,'jpg','1142265726.jpg'),(260,'JPG','825325324.JPG'),(261,'jpg','2030580274.jpg'),(262,'JPG','790360432.JPG'),(263,'JPG','1788470400.JPG'),(264,'JPG','1253782267.JPG'),(265,'jpeg','644628855.jpeg'),(266,'JPG','717156404.JPG'),(267,'JPG','1002683066.JPG'),(268,'jpg','1171622575.jpg'),(269,'jpeg','969899144.jpeg'),(270,'jpg','1567586188.jpg'),(271,'jpeg','377647319.jpeg'),(272,'jpg','33406098.jpg'),(273,'JPG','205395064.JPG'),(274,'jpg','440396891.jpg'),(275,'jpg','480208398.jpg'),(276,'JPG','61488081.JPG'),(277,'jpg','1357997469.jpg'),(278,'jpg','81904546.jpg'),(279,'jpg','1873649778.jpg'),(280,'jpg','1438871772.jpg'),(281,'jpg','1250628681.jpg'),(282,'jpg','746253321.jpg'),(283,'jpg','528082044.jpg'),(284,'jpg','15466041.jpg'),(285,'jpg','283290051.jpg'),(286,'JPG','860678358.JPG'),(287,'jpg','559901307.jpg'),(288,'jpg','897481458.jpg'),(289,'jpg','86268031.jpg'),(290,'','1686080996.'),(291,'','1385360101.'),(292,'jpeg','906959383.jpeg'),(293,'JPG','349603503.JPG'),(294,'jpg','1091824063.jpg'),(295,'jpg','1547104012.jpg'),(296,'jpg','311963179.jpg'),(297,'jpg','1178159406.jpg'),(298,'jpg','1210408245.jpg'),(299,'jpg','322106413.jpg'),(300,'jpg','220294443.jpg'),(301,'JPG','1686952821.JPG'),(302,'jpg','1904789456.jpg'),(303,'jpg','1970740555.jpg'),(304,'JPG','520869041.JPG'),(305,'JPG','1247914021.JPG'),(306,'jpg','147574807.jpg'),(307,'jpg','1703256211.jpg'),(308,'jpg','1840007851.jpg'),(309,'jpg','1390282139.jpg'),(310,'jpg','1126259903.jpg'),(311,'jpg','1223870439.jpg'),(312,'jpg','1293293315.jpg'),(313,'JPG','1613739325.JPG'),(314,'jpg','833723092.jpg'),(315,'jpg','1641100398.jpg'),(316,'jpg','1395227971.jpg'),(317,'JPG','1604842172.JPG'),(318,'jpg','2048411276.jpg'),(319,'jpg','390762750.jpg'),(320,'jpg','543359272.jpg'),(321,'jpg','1339643222.jpg'),(322,'jpg','1525088409.jpg'),(323,'jpeg','1640993735.jpeg'),(324,'jpg','2076103740.jpg'),(325,'jpg','2126725319.jpg'),(326,'jpg','18350447.jpg'),(327,'jpg','6754978.jpg'),(328,'jpg','1681661005.jpg'),(329,'jpg','852314267.jpg'),(330,'jpg','401094329.jpg'),(331,'jpg','1177378205.jpg'),(332,'jpg','1427299074.jpg'),(333,'jpg','122907229.jpg'),(334,'jpg','402828468.jpg'),(335,'jpeg','1441468369.jpeg'),(336,'jpg','285176068.jpg'),(337,'jpg','967533813.jpg'),(338,'jpg','727320872.jpg'),(339,'jpg','1228779116.jpg'),(340,'jpg','825625862.jpg'),(341,'jpg','222812791.jpg'),(342,'JPG','86896284.JPG'),(343,'jpg','1758934965.jpg'),(344,'jpg','1633734595.jpg'),(345,'jpg','1133991801.jpg'),(346,'jpg','507170466.jpg'),(347,'jpeg','538268482.jpeg'),(348,'jpg','1857378283.jpg'),(349,'jpg','2116240711.jpg'),(350,'','721782480.'),(351,'0','215381303.'),(352,'0','2142386112.'),(353,'0','440662641.'),(354,'jpg','1741640284.jpg'),(355,'jpg','1715460322.jpg'),(356,'jpg','51835449.jpg'),(357,'jpg','862278992.jpg'),(358,'jpg','273664241.jpg'),(359,'jpg','1194653406.jpg'),(360,'jpg','2006367086.jpg'),(361,'jpg','572012100.jpg'),(362,'jpg','1323361035.jpg'),(363,'jpg','204361187.jpg'),(364,'jpg','2133659942.jpg'),(365,'jpg','1157320466.jpg'),(366,'0','566441198.'),(367,'0','1837250912.'),(368,'0','529233191.'),(369,'jpg','977379457.jpg'),(370,'JPG','950710881.JPG'),(371,'jpg','1915937526.jpg'),(372,'jpg','1263646237.jpg'),(373,'jpg','2019447942.jpg'),(374,'jpg','1456047230.jpg'),(377,'jpg','785785297.jpg'),(378,'jpg','1733462670.jpg'),(379,'jpg','237063282.jpg'),(380,'jpg','1033029383.jpg'),(381,'JPG','386238606.JPG'),(382,'jpg','1664776130.jpg'),(383,'jpg','1903694088.jpg'),(384,'jpg','1879606692.jpg'),(385,'jpg','572605862.jpg'),(404,'jpg','1313971306.jpg'),(406,'',''),(408,'',''),(409,'','');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) DEFAULT NULL,
  `link` varchar(80) DEFAULT NULL,
  `about` varchar(250) DEFAULT NULL,
  `files_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_portfolio_files1_idx` (`files_id`),
  CONSTRAINT `fk_portfolio_files1` FOREIGN KEY (`files_id`) REFERENCES `files` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio`
--

LOCK TABLES `portfolio` WRITE;
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonial`
--

DROP TABLE IF EXISTS `testimonial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `link` varchar(85) DEFAULT NULL,
  `files_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_testimonial_files1_idx` (`files_id`),
  CONSTRAINT `fk_testimonial_files1` FOREIGN KEY (`files_id`) REFERENCES `files` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonial`
--

LOCK TABLES `testimonial` WRITE;
/*!40000 ALTER TABLE `testimonial` DISABLE KEYS */;
/*!40000 ALTER TABLE `testimonial` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-24 11:58:07
