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
  `gender` varchar(10) DEFAULT NULL,
  `place` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (213,NULL,'jaba jaba jaba,jaba,malapakj,854675','fgcgg@ghvhgv.com',NULL,'12345678',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(217,NULL,NULL,NULL,NULL,'ssssssssss',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(218,NULL,'ssssssss',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(219,NULL,NULL,NULL,NULL,'sss',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(220,NULL,'oppsit old bus stand,\r\nmanjeri',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(221,NULL,NULL,NULL,NULL,'ssssssssssss',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(222,NULL,NULL,'gggg@gamil.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(223,NULL,'aaaaaaaaaaassssssssssssssssss',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(224,NULL,'sssssssssddwwwwwwwwwwwwwwwwwww','gggg@gamil.com',NULL,'ssssssssssss',NULL,'https://in.linkedin.com/in/noushid','https://www.faceboo.com/hjgh','https://twitter.com/@psybotech',NULL,'https://plus.google.com/noushid',NULL,NULL),(225,NULL,'sdjhvbhjvhjdflhjblhjdfb','gggg@gamil.com',NULL,'ssssssssssss',NULL,'https://in.linkedin.com/in/noushid','https://www.faceboo.com/hjgh','https://twitter.com/@psybotech',NULL,'https://plus.google.com/noushid',NULL,NULL),(226,NULL,'fgfghcghfghhgfg','gggg@gamil.com',NULL,'gf',NULL,'https://in.linkedin.com/in/noushid',NULL,'https://twitter.com/@psybotech',NULL,'https://plus.google.com/noushid',NULL,NULL),(229,NULL,NULL,'pnoushid@gmail.com',NULL,'1234567890',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(230,NULL,'dddddddd',NULL,NULL,'vvvvvvv',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(231,NULL,NULL,'pnoushid@gmail.com',NULL,'1234567890',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(232,NULL,'kjbhjkjbdfkj','pnoushid@gmail.com',NULL,'dfdftg',NULL,'https://in.linkedin.com/in/noushid',NULL,NULL,NULL,'https://plus.google.com/noushid/about',NULL,NULL),(233,NULL,'hhhh','pnoushid@gmail.com',NULL,'jknfgkj',NULL,'https://in.linkedin.com/in/noushid',NULL,NULL,NULL,'https://plus.google.com/noushid/about',NULL,NULL),(234,NULL,'lkdfglknfgkjn','pnoushid@gmail.com',NULL,'1234567890',NULL,'https://in.linkedin.com/in/noushid',NULL,NULL,NULL,'https://plus.google.com/noushid/about',NULL,NULL),(235,NULL,'xvffjbhjbhjd,hjgfs','pnoushid@gmail.com',NULL,'1234567890',NULL,'https://in.linkedin.com/in/noushid','https://www.faceboo.com/hjgh','https://twitter.com/@psybotech',NULL,'https://plus.google.com/noushid/about',NULL,NULL),(236,NULL,'vbgvgvg\r\nkjbdfkj','gggg@gamil.com',NULL,'12345678',NULL,'https://in.linkedin.com/in/noushid','https://www.faceboo.com/noushidp','https://twitter.com/@psybotech',NULL,'https://plus.google.com/noushid/about',NULL,NULL),(237,NULL,'ffghfg','pnoushid@gmail.com',NULL,'ddd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(238,NULL,'gg','gggg@gamil.com',NULL,'dfghjkl',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(239,NULL,'fffffffff','pnoushid@gmail.com',NULL,'+dfg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(240,NULL,NULL,'info@psybotechnologies.com',NULL,'1234567',NULL,'https://in.linkedin.com/in/noushid','https://www.faceboo.com/noushidp','https://twitter.com/@psybotech',NULL,'https://plus.google.com/noushid/about',NULL,'manjeri'),(241,NULL,NULL,'gggg@gamil.com',NULL,'aa',NULL,NULL,'https://www.faceboo.com/noushidp',NULL,NULL,NULL,NULL,'aaa'),(242,NULL,NULL,'pnoushid@gmail.com',NULL,'ss',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ss'),(243,NULL,'ss','gggg@gamil.com',NULL,'sss',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ss'),(244,NULL,'qqaaaaaaaaaa','pnoushid@gmail.com',NULL,'sss',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'qqqqqq'),(245,NULL,'qqq','pnoushid@gmail.com',NULL,'sss',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ss'),(247,NULL,'rewre','pnoushid@gmail.com',NULL,'1545623',NULL,'https://in.linkedin.com/in/noushid','https://www.facebook.com/gfjygf','https://twitter.com/@psybotechsd',NULL,'https://plus.google.com/noushid/about',NULL,'manjeri'),(248,'Noushid P',NULL,NULL,NULL,NULL,NULL,NULL,'https://www.facebook.com/noushid',NULL,NULL,NULL,'Male',NULL),(249,'naseeba',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Female',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_details`
--

LOCK TABLES `company_details` WRITE;
/*!40000 ALTER TABLE `company_details` DISABLE KEYS */;
INSERT INTO `company_details` VALUES (28,NULL,NULL,NULL,247);
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
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (187,'web develepor',624,248),(188,'web develepor',625,249);
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
) ENGINE=InnoDB AUTO_INCREMENT=639 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (450,'jpg','1066980032.jpg'),(451,'jpg','922786085.jpg'),(452,'jpg','1378437276.jpg'),(453,'jpg','1193498828.jpg'),(454,'jpg','873982274.jpg'),(455,'jpg','694471958.jpg'),(456,'jpg','222453075.jpg'),(457,'jpg','1666458690.jpg'),(458,'jpg','765162053.jpg'),(459,'jpg','565427213.jpg'),(460,'jpg','1010418469.jpg'),(461,'jpg','1554070696.jpg'),(462,'jpg','1601464685.jpg'),(463,'jpg','1329545387.jpg'),(464,'jpg','1432269694.jpg'),(465,'jpg','522497808.jpg'),(466,'jpg','1300210369.jpg'),(467,'jpg','1285952550.jpg'),(468,'jpg','1264893441.jpg'),(469,'jpg','636227904.jpg'),(470,'jpg','569204433.jpg'),(471,'jpg','896819001.jpg'),(472,'jpg','164357609.jpg'),(473,'jpg','1492278386.jpg'),(474,'jpg','1162404385.jpg'),(475,'jpg','345122531.jpg'),(476,'jpg','178171905.jpg'),(486,'jpg','2085337973.jpg'),(487,'jpg','1435857913.jpg'),(488,'jpg','1678323929.jpg'),(490,'jpg','1607526379.jpg'),(497,'',''),(498,'',''),(499,'',''),(500,'',''),(501,'',''),(502,'',''),(503,'',''),(564,'png','2079037984.png'),(565,'png','1704745578.png'),(606,'','746674664.'),(620,'','2060213810.'),(622,'png','763676754.png'),(623,'0','1298077251.'),(624,'JPG','2086770845.JPG'),(625,'',''),(626,'',''),(627,'',''),(629,'',''),(630,'',''),(632,'','1823083665.'),(638,'png','1675433466.png');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `headings`
--

DROP TABLE IF EXISTS `headings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `headings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `secDescription` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `headings`
--

LOCK TABLES `headings` WRITE;
/*!40000 ALTER TABLE `headings` DISABLE KEYS */;
INSERT INTO `headings` VALUES (55,'home','What we do','We passionately believe great web sites and web applications are built on design that respects functionality and a back end that understands the importance of creativity.We are a close-knit team of experienced strategists, designers and builders with complementary, often overlapping skill sets. We can take your project from genesis to launch to dedicated follow-through and maintenance. Or we can take on whatever piece of the project youâ€™re missing.',NULL),(56,'service','We Will Either Find a Way or Make One','Psybo technologies offers you a unique website that establishes your corporate identity in the online market. Your website is an integral part of your brand image. In the impending future, website is poised to be the most influential tool for impressing your potential clients. Therefore you need a website that is unique, futuristic as well as well planned.We make sure that our websites are compatible with all browsers.',NULL),(57,'about','w','s','x'),(58,'contact','noushid','psybo technologies ',NULL);
/*!40000 ALTER TABLE `headings` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio`
--

LOCK TABLES `portfolio` WRITE;
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
INSERT INTO `portfolio` VALUES (1,'portfolio','https://www.psybotechnologies.com','rrtt',564),(2,'portfolio 2','https://www.test.psybotechnologies.com','kallaayi kaaka..',565);
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subHeadings`
--

DROP TABLE IF EXISTS `subHeadings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subHeadings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `files_id` int(11) NOT NULL,
  `link` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_service_files1_idx` (`files_id`),
  CONSTRAINT `fk_service_files1` FOREIGN KEY (`files_id`) REFERENCES `files` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subHeadings`
--

LOCK TABLES `subHeadings` WRITE;
/*!40000 ALTER TABLE `subHeadings` DISABLE KEYS */;
INSERT INTO `subHeadings` VALUES (82,'wedo','what make us different ','Design and code only makes up one part of a great company. The rest is down to the close relationships we form with our clients, who respect our input, trust in our ideas and occasionally bring us nice doughnuts.',606,'about.php'),(96,'wedo','What we do','We passionately believe great web sites and web applications are built on design that respects functionality and a back end that understands the importance of creativity.We are a close-knit team of experienced strategists, designers and builders with complementary, often overlapping skill sets. We can take your project from genesis to launch to dedicated follow-through and maintenance. Or we can take on whatever piece of the project youâ€™re missing.',620,'team.php'),(98,'service','Software Development','hgdfkj',622,NULL),(99,'service','On The Job Training','In the fast moving world of Technology, the Companies always prefer â€˜industry readyâ€™ employees. It is not different with our company also. The increasing demand for the industry-ready candidates has motivated Psybo to provide career oriented  Software Technical training. The specialty of our training is that it is on-the-job. We make sure that the candidates get a good exposure on the various aspects of the Technologies currently in use. Psybo focuses on the courses that require highest leve',623,NULL),(100,'about','bnbkj','jhjhbd',626,NULL),(101,'about','Our Mission','With mission to develop the clients performance in their business, our company is sincerely working harder for showing profit oriented results to their clients all over the World.â€œTogether we build lasting relationships with the power of technology and our passion for extreme qualityâ€œ',627,NULL),(103,'about','Our Methodology','Customer is First : Total commitment to our customers. To ensure that we achieve their business objectives and surpass their quality and service expectations fulfilled.<br />Honesty : Fairness towards transparency of all process and at all levels.',629,NULL),(104,'about','Our Quality Policy','We treasure our client value and satisfaction. We strive for excellence and we are committed to deliver enhanced value to our customers with commitment and credibility.Psybo technologies is committed to continually improve the effectiveness of quality through team work, better tools and better technology.',630,NULL),(106,'wedo','Get Connected','Our outstanding creativity brings you an effective, bespoke, perfectly-designed result.<br />',632,'contact.php'),(112,'service','Web Development','Professional website design is critical for success in the modern Business. Psybo technologies expert creative services team delivers an attractive , intuitive interface with a logical and easy to use navigation/layout, HTML intergration with backend technologies. We make your web vision a reality. Whether you want an attractive traditional, ecommerce, static , dynamic ,responsive web site - we can do it',638,NULL);
/*!40000 ALTER TABLE `subHeadings` ENABLE KEYS */;
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

-- Dump completed on 2015-08-26 11:50:23
