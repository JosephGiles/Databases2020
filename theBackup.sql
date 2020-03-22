-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: testDatabase
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

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
-- Table structure for table `ChefsTable`
--

DROP TABLE IF EXISTS `ChefsTable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ChefsTable` (
  `Schedule` varchar(20) NOT NULL,
  `IsOpen` tinyint(1) NOT NULL,
  `UserID` int(6) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ChefsTable`
--

LOCK TABLES `ChefsTable` WRITE;
/*!40000 ALTER TABLE `ChefsTable` DISABLE KEYS */;
/*!40000 ALTER TABLE `ChefsTable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FoodItemsTable`
--

DROP TABLE IF EXISTS `FoodItemsTable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FoodItemsTable` (
  `FoodItemID` int(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Ingredients` varchar(100) DEFAULT NULL,
  `CookTime` int(20) DEFAULT NULL,
  `Calories` int(20) DEFAULT NULL,
  `PictureID` varchar(50) DEFAULT NULL,
  `ReviewID` varchar(20) DEFAULT NULL,
  `NumberOfReviews` int(20) DEFAULT NULL,
  `AverageRatings` int(1) DEFAULT NULL,
  `Price` decimal(6,2) DEFAULT NULL,
  `UserID` int(6) DEFAULT NULL,
  PRIMARY KEY (`FoodItemID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FoodItemsTable`
--

LOCK TABLES `FoodItemsTable` WRITE;
/*!40000 ALTER TABLE `FoodItemsTable` DISABLE KEYS */;
INSERT INTO `FoodItemsTable` VALUES (5,'Bat Soup','Bats',10,100,NULL,NULL,1,3,12.55,10),(6,'Grape','Grape',1,5,NULL,NULL,1,4,2.33,10),(7,'Sushi','Rice, Fish',5,400,NULL,NULL,6,5,20.00,10);
/*!40000 ALTER TABLE `FoodItemsTable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OrdersTable`
--

DROP TABLE IF EXISTS `OrdersTable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OrdersTable` (
  `OrderID` int(20) NOT NULL AUTO_INCREMENT,
  `UserID` varchar(12) NOT NULL,
  `FoodItemID` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Price` decimal(6,2) NOT NULL,
  PRIMARY KEY (`OrderID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OrdersTable`
--

LOCK TABLES `OrdersTable` WRITE;
/*!40000 ALTER TABLE `OrdersTable` DISABLE KEYS */;
INSERT INTO `OrdersTable` VALUES (1,'2','7','Sushi',20.00),(2,'1','6','Grape',2.33),(3,'1','5','Bat Soup',12.55);
/*!40000 ALTER TABLE `OrdersTable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PaymentMethodTable`
--

DROP TABLE IF EXISTS `PaymentMethodTable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PaymentMethodTable` (
  `PaymentID` int(12) NOT NULL AUTO_INCREMENT,
  `CardNumber` int(16) NOT NULL,
  `ExpirationMonth` int(2) NOT NULL,
  `ExpirationYear` int(2) NOT NULL,
  `SecurityCode` int(3) NOT NULL,
  `UserID` varchar(12) NOT NULL,
  PRIMARY KEY (`PaymentID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PaymentMethodTable`
--

LOCK TABLES `PaymentMethodTable` WRITE;
/*!40000 ALTER TABLE `PaymentMethodTable` DISABLE KEYS */;
INSERT INTO `PaymentMethodTable` VALUES (1,123456,12,12,222,'1'),(2,333333,12,44,555,'1'),(3,777777777,12,55,999,'1');
/*!40000 ALTER TABLE `PaymentMethodTable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ReviewsTable`
--

DROP TABLE IF EXISTS `ReviewsTable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ReviewsTable` (
  `ReviewID` int(20) NOT NULL AUTO_INCREMENT,
  `FoodItemID` int(11) NOT NULL,
  `Review` varchar(200) NOT NULL,
  `Rating` int(1) NOT NULL,
  `PostedByUserID` int(12) NOT NULL,
  PRIMARY KEY (`ReviewID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ReviewsTable`
--

LOCK TABLES `ReviewsTable` WRITE;
/*!40000 ALTER TABLE `ReviewsTable` DISABLE KEYS */;
INSERT INTO `ReviewsTable` VALUES (1,5,'It was really good.',5,1),(2,5,'I love cheese',3,1),(3,5,'I loved it.',1,1),(4,5,'I hate it.',2,10),(5,5,'I hate it so much.',0,10),(6,6,'I love grapes.',3,10),(7,7,'WOOW SO GOOOD',5,10);
/*!40000 ALTER TABLE `ReviewsTable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UsersTable`
--

DROP TABLE IF EXISTS `UsersTable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UsersTable` (
  `UserID` int(6) NOT NULL AUTO_INCREMENT,
  `Password` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `PhoneNumber` bigint(10) DEFAULT NULL,
  `StreetAddress` varchar(50) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL,
  `ZIPCode` int(10) DEFAULT NULL,
  `State` varchar(2) DEFAULT NULL,
  `LoggedIn` tinyint(1) NOT NULL DEFAULT '0',
  `IsChef` tinyint(1) NOT NULL DEFAULT '0',
  `FirstName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UsersTable`
--

LOCK TABLES `UsersTable` WRITE;
/*!40000 ALTER TABLE `UsersTable` DISABLE KEYS */;
INSERT INTO `UsersTable` VALUES (1,'pass','bob@bob.com',1234567890,'123 N 500 E','Provo',84604,'UT',1,0,'Bob','Smith'),(2,'pass','Winston@winston.com',2224447777,'45 N 67 E','Provo',84604,'UT',1,0,'Winston','Church'),(3,'777','test@test.com',NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL),(4,'777','bad@bad.com',NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL),(5,'123','june@june.com',8887779999,'23 E 500 S','Provo',84001,'UT',0,0,'June','Bug'),(6,'444','cut@cut.com',6664441111,'66 N 33 E','Provo',84604,'UT',0,0,'John','Elemen'),(10,'1','chef@chef.com',8882224444,'700 N 600 E','Provo',84604,'UT',1,1,'Jane','Taylor');
/*!40000 ALTER TABLE `UsersTable` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-17 13:33:09
