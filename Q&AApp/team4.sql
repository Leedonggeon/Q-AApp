-- MySQL dump 10.13  Distrib 5.1.41, for Win32 (ia32)
--
-- Host: localhost    Database: team4
-- ------------------------------------------------------
-- Server version	5.1.41-community

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
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `ID` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Gender` enum('M','F') NOT NULL,
  `Birthdate` date NOT NULL,
  `Phone` char(11) NOT NULL,
  `Address` text NOT NULL,
  `Role` enum('M','S','E') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES ('test123','test123','DBDB','M','2015-12-18','234234','gfdgfdg\r\n','S'),('test1234','test1234','DBDB','M','2015-12-18','234234','gfdgfdg\r\n','S'),('test1212','test1212','DATABASE','M','2015-12-24','12345','12343\r\n','S'),('admin','admin','ADMIN','M','2015-12-10','010-5031-39','¿¬¼¼´ë','M'),('evaluate1','evaluate1','í‰ê°€ìž','M','2015-12-24','12345','12345\r\n','E'),('evaluate2','evaluate2','í‰ê°€2','F','2015-12-23','3342394','yonsei\r\n','E');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bankaccount`
--

DROP TABLE IF EXISTS `bankaccount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bankaccount` (
  `SchemaID` int(11) NOT NULL,
  `BankName` varchar(15) NOT NULL,
  `AccountType` enum('Savings','Checking','Certificate Of Deposit','Money Market','Retirement') NOT NULL,
  `OpenDate` date NOT NULL,
  `DepositCOunt` int(11) NOT NULL,
  `WithdrawalCount` int(11) NOT NULL,
  PRIMARY KEY (`SchemaID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bankaccount`
--

LOCK TABLES `bankaccount` WRITE;
/*!40000 ALTER TABLE `bankaccount` DISABLE KEYS */;
/*!40000 ALTER TABLE `bankaccount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collect`
--

DROP TABLE IF EXISTS `collect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collect` (
  `Taskname` varchar(15) NOT NULL,
  `SourceID` int(11) NOT NULL,
  PRIMARY KEY (`Taskname`,`SourceID`),
  KEY `FK_COLLECT_SOURCE` (`SourceID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collect`
--

LOCK TABLES `collect` WRITE;
/*!40000 ALTER TABLE `collect` DISABLE KEYS */;
INSERT INTO `collect` VALUES ('DBTEST',1),('TESTTASK',1),('TESTTASK',2);
/*!40000 ALTER TABLE `collect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluation`
--

DROP TABLE IF EXISTS `evaluation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluation` (
  `EvaluatorID` varchar(15) NOT NULL,
  `ParsingID` int(11) NOT NULL,
  PRIMARY KEY (`EvaluatorID`,`ParsingID`),
  KEY `FK_EVALUATION_PARSING` (`ParsingID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluation`
--

LOCK TABLES `evaluation` WRITE;
/*!40000 ALTER TABLE `evaluation` DISABLE KEYS */;
INSERT INTO `evaluation` VALUES ('evaluate1',1449684251),('evaluate1',1449685171),('evaluate1',1449685233),('evaluate1',1449687626),('evaluate1',1449687737),('evaluate2',1449687806);
/*!40000 ALTER TABLE `evaluation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `management`
--

DROP TABLE IF EXISTS `management`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `management` (
  `Taskname` varchar(15) NOT NULL,
  `ManagerID` varchar(15) NOT NULL,
  PRIMARY KEY (`ManagerID`),
  KEY `FK_MANAGEMENT_TASK` (`Taskname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `management`
--

LOCK TABLES `management` WRITE;
/*!40000 ALTER TABLE `management` DISABLE KEYS */;
INSERT INTO `management` VALUES ('TESTTASK','admin');
/*!40000 ALTER TABLE `management` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matching`
--

DROP TABLE IF EXISTS `matching`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matching` (
  `SourceID` int(11) NOT NULL,
  `ParsingID` int(11) NOT NULL,
  PRIMARY KEY (`SourceID`,`ParsingID`),
  KEY `FK_MATCHING_PARSING` (`ParsingID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matching`
--

LOCK TABLES `matching` WRITE;
/*!40000 ALTER TABLE `matching` DISABLE KEYS */;
/*!40000 ALTER TABLE `matching` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parsing`
--

DROP TABLE IF EXISTS `parsing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parsing` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Taskname` varchar(15) NOT NULL,
  `SubmitterID` varchar(15) NOT NULL,
  `Startdate` date NOT NULL,
  `Enddate` date NOT NULL,
  `Number` int(11) NOT NULL,
  `Schema` text NOT NULL,
  `Quality` int(11) NOT NULL,
  `Filename` varchar(15) NOT NULL,
  `PNP` enum('P','NP') DEFAULT NULL,
  `evalornot` enum('Y','N') NOT NULL,
  `Rownumber` int(11) NOT NULL,
  `Nullratio` float NOT NULL,
  `duplicated` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Taskname` (`Taskname`),
  KEY `SubmitterID` (`SubmitterID`)
) ENGINE=MyISAM AUTO_INCREMENT=1449687807 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parsing`
--

LOCK TABLES `parsing` WRITE;
/*!40000 ALTER TABLE `parsing` DISABLE KEYS */;
INSERT INTO `parsing` VALUES (1449684251,'DBTEST','test123','2015-12-10','2016-01-10',1,'C:\nginxhtmlsourcetype20151210_1_1_test123.csv',10,'20151210_1_1_te','P','Y',1,0,0),(1449685233,'DBTEST','test123','2015-12-10','2016-01-10',3,'C:\nginxhtmlsourcetype20151210_1_3_test123.csv',10,'20151210_1_3_te','P','Y',1,0,0),(1449687626,'DBTEST','test123','2015-12-10','2016-01-10',1,'C:\nginxhtmlsourcetype20151210_1_1_test123.csv',10,'20151210_1_1_te',NULL,'Y',1,0,0),(1449687737,'DBTEST','test1234','2015-12-10','2016-01-10',1,'C:\nginxhtmlsourcetype20151210_1_1_test1234.csv',10,'20151210_1_1_te',NULL,'Y',1,0,0),(1449687806,'DBTEST','test1212','2015-12-10','2016-01-10',1,'C:\nginxhtmlsourcetype20151210_1_1_test1212.csv',10,'20151210_1_1_te',NULL,'Y',1,0,0);
/*!40000 ALTER TABLE `parsing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `source`
--

DROP TABLE IF EXISTS `source`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `source` (
  `ID` int(11) NOT NULL,
  `Mapping` text NOT NULL,
  `Schema` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `source`
--

LOCK TABLES `source` WRITE;
/*!40000 ALTER TABLE `source` DISABLE KEYS */;
INSERT INTO `source` VALUES (1,'0','test'),(2,'1','testsgfdhfghf');
/*!40000 ALTER TABLE `source` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submit`
--

DROP TABLE IF EXISTS `submit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `submit` (
  `Taskname` varchar(15) NOT NULL,
  `SubmitterID` varchar(15) NOT NULL,
  `Pass` enum('P','NP') NOT NULL,
  PRIMARY KEY (`Taskname`,`SubmitterID`),
  KEY `FK_SUBMIT_ACCOUNT` (`SubmitterID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submit`
--

LOCK TABLES `submit` WRITE;
/*!40000 ALTER TABLE `submit` DISABLE KEYS */;
INSERT INTO `submit` VALUES ('TESTTASK','test1212','P'),('DBTEST','test123','P'),('TESTTASK','test1234','P'),('DBTEST','test1234','P'),('TESTTASK','test123','P');
/*!40000 ALTER TABLE `submit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task` (
  `Taskname` varchar(15) NOT NULL,
  `Tablename` varchar(15) NOT NULL,
  `Description` text NOT NULL,
  `Periodinfo` enum('daily','weekly','biweekly','monthly','bimonthly','quarterly\r\n','half-yearly','yearly') NOT NULL,
  `Schema` text NOT NULL,
  PRIMARY KEY (`Taskname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` VALUES ('TESTTASK','BANK\r\n','test1231231','biweekly','\'ID\' int(11) NOT NULL,\r\n\'OPEN\' date NOT NULL, \r\nprimary key (\'ID\')'),('DBTEST','DBTEST123\r\n','ë°ì´í„°ë² ì´ìŠ¤ TEST','monthly','\'SchemaID\' int(11) NOT NULL,\r\n\'BankName\' varchar(15) NOT NULL,\r\nPRIMARY KEY (\'SchemaID\')');
/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taskdata`
--

DROP TABLE IF EXISTS `taskdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taskdata` (
  `Schema` text NOT NULL,
  `SubmitterID` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taskdata`
--

LOCK TABLES `taskdata` WRITE;
/*!40000 ALTER TABLE `taskdata` DISABLE KEYS */;
/*!40000 ALTER TABLE `taskdata` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-10 11:56:02
