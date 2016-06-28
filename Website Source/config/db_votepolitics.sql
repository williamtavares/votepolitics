-- Host: localhost    Database: db_votepolitics
-- ------------------------------------------------------

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
-- Table structure for table `log_tbl`
--

DROP TABLE IF EXISTS `log_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_tbl` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL,
  `time_stamp` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_tbl`
--

LOCK TABLES `log_tbl` WRITE;
/*!40000 ALTER TABLE `log_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `politicians_tbl`
--

DROP TABLE IF EXISTS `politicians_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `politicians_tbl` (
  `politician_id` int(11) NOT NULL AUTO_INCREMENT,
  `politician_name` varchar(45) NOT NULL,
  `politician_party` varchar(45) NOT NULL,
  `running_status` varchar(45) NOT NULL,
  `portrait_url` varchar(255) NOT NULL,
  `wikipedia_url` varchar(255) NOT NULL,
  `photo_source` varchar(255) NOT NULL,
  `twitter_data_id` varchar(255) NOT NULL,
  `google_news_query` varchar(255) NOT NULL,
  PRIMARY KEY (`politician_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `politicians_tbl`
--

LOCK TABLES `politicians_tbl` WRITE;
/*!40000 ALTER TABLE `politicians_tbl` DISABLE KEYS */;
INSERT INTO `politicians_tbl` (`politician_id`, `politician_name`, `politician_party`, `running_status`, `portrait_url`, `wikipedia_url`, `photo_source`, `twitter_data_id`, `google_news_query`) VALUES (1,'Ted Cruz','Republican','Out Of Race','cruz-portrait.png','http://en.m.wikipedia.org/wiki/Ted_Cruz','Public Domain','615046249788542976','Ted+Cruz'),(2,'Lindsey Graham','Republican','Out Of Race','graham-portrait.png','https://en.m.wikipedia.org/wiki/Lindsey_Graham','Public Domain','615046649627324416','Lindsey+Graham'),(3,'Rand Paul','Republican','Out Of Race','paul-portrait.png','http://en.m.wikipedia.org/wiki/Rand_Paul','Public Domain','615046475161075713','Rand+Paul'),(4,'Jeb Bush','Republican','Out Of Race','bush-portrait.png','http://en.m.wikipedia.org/wiki/Jeb_Bush','Jeb Bush Emails','615045918946037764','Jeb+Bush'),(5,'Chris Christie','Republican','Out Of Race','christie-portrait.png','http://en.m.wikipedia.org/wiki/Chris_Christie','Public Domain','615046783211712512','Chris+Christie'),(6,'Marco Rubio','Republican','Out Of Race','rubio-portrait.png','http://en.m.wikipedia.org/wiki/Marco_Rubio','Public Domain','615046897208700928','Marco+Rubio'),(7,'Rick Santorum','Republican','Out Of Race','santorum-portrait.png','http://en.m.wikipedia.org/wiki/Rick_Santorum','Public Domain','615046995212763136','Rick+Santorum'),(8,'Hillary Clinton','Democratic','Running','clinton-portrait.png','http://en.m.wikipedia.org/wiki/Hillary_Rodham_Clinton','Wikimedia','615044858764378113','Hillary+Clinton'),(9,'Martin O\'Malley','Democratic','Out Of Race','malley-portrait.png','http://en.m.wikipedia.org/wiki/Martin_O%27Malley','Wikimedia','615047175265894400','Martin+O%27Malley'),(10,'Jim Webb','Democratic','Out of Race','webb-portrait.png','http://en.m.wikipedia.org/wiki/Jim_Webb','Congressional Directory','615047268698161153','Jim+Webb'),(11,'Lincoln Chafee','Democratic','Out of Race','chafee-portrait.png','http://en.m.wikipedia.org/wiki/Lincoln_Chafee','Wikimedia','615047384599392257','Lincoln+Chafee'),(12,'Bernie Sanders','Democratic','Running','sanders-portrait.png','http://en.m.wikipedia.org/wiki/Bernie_Sanders','Wikimedia','615047481546555392','Bernie+Sanders'),(13,'Ben Carson','Republican','Out Of Race','carson-portrait.png','http://en.m.wikipedia.org/wiki/Ben_Carson','Gage Skidmore','615047589939953664','Ben+Carson'),(14,'Carly Fiorina','Republican','Out Of Race','fiorina-portrait.png','http://en.m.wikipedia.org/wiki/Carly_Fiorina','Gage Skidmore','615047671133253633','Carly+Fiorina'),(15,'Mike Huckabee','Republican','Out Of Race','huckabee-portrait.png','http://en.m.wikipedia.org/wiki/Mike_Huckabee','Gage Skidmore','615047770680889344','Mike+Huckabee'),(16,'Rick Perry','Republican','Out of Race','perry-portrait.png','http://en.m.wikipedia.org/wiki/Rick_Perry','Gage Skidmore','615047856227926016','Rick+Perry'),(17,'Scott Walker','Republican','Out of Race','walker-portrait.png','http://en.m.wikipedia.org/wiki/Scott_Walker_%28politician%29','Gage Skidmore','615047979808894976','Scott+Walker'),(18,'Joe Biden','Democratic','Out of Race','biden-portrait.png','http://en.m.wikipedia.org/wiki/Joe_Biden','Wikimedia','615048088655282176','Joe+Biden'),(19,'George Pataki','Republican','Out Of Race','pataki-portrait.png','http://en.m.wikipedia.org/wiki/George_Pataki','Wikimedia','615048188290969600','George+Pataki'),(20,'Donald Trump','Republican','Running','trump-portrait.png','https://en.m.wikipedia.org/wiki/Donald_Trump','Gage Skidmore','615048304313774084','Donald+Trump'),(21,'Bobby Jindal','Republican','Out of Race','jindal-portrait.png','https://en.m.wikipedia.org/wiki/Bobby_Jindal','Public Domain','615048374199255041','Bobby+Jindal'),(22,'John Kasich','Republican','Out Of Race','kasich-portrait.png','https://en.m.wikipedia.org/wiki/John_Kasich','Public Domain','622273705738002432','John+Kasich'),(23,'Jim Gilmore','Republican','Out Of Race','gilmore-portrait.png','https://en.m.wikipedia.org/wiki/Jim_Gilmore','Huffington Post','630553209950449664','Jim+Gilmore');
/*!40000 ALTER TABLE `politicians_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votes_history_tbl`
--

DROP TABLE IF EXISTS `votes_history_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `votes_history_tbl` (
  `history_id` int(11) NOT NULL AUTO_INCREMENT,
  `vote_id` int(11) NOT NULL,
  `vote_total_period_end` int(11) NOT NULL,
  `closing_vote_date` date NOT NULL,
  PRIMARY KEY (`history_id`),
  KEY `vote_id_idx` (`vote_id`),
  CONSTRAINT `vote_id` FOREIGN KEY (`vote_id`) REFERENCES `votes_tbl` (`vote_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votes_history_tbl`
--

LOCK TABLES `votes_history_tbl` WRITE;
/*!40000 ALTER TABLE `votes_history_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `votes_history_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votes_tbl`
--

DROP TABLE IF EXISTS `votes_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `votes_tbl` (
  `vote_id` int(11) NOT NULL AUTO_INCREMENT,
  `politician_id` int(11) NOT NULL,
  `total_votes` int(11) NOT NULL,
  PRIMARY KEY (`vote_id`),
  KEY `politician id_idx` (`politician_id`),
  CONSTRAINT `politician id` FOREIGN KEY (`politician_id`) REFERENCES `politicians_tbl` (`politician_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votes_tbl`
--

LOCK TABLES `votes_tbl` WRITE;
/*!40000 ALTER TABLE `votes_tbl` DISABLE KEYS */;
INSERT INTO `votes_tbl` (`vote_id`, `politician_id`, `total_votes`) VALUES (1,1,4),(2,2,0),(3,3,20),(4,4,7),(5,5,5),(6,6,9),(7,7,0),(8,8,87),(9,9,2),(10,10,4),(11,11,0),(12,12,229),(13,13,12),(14,14,4),(15,15,3),(16,16,0),(17,17,1),(18,18,8),(19,19,1),(20,20,272),(21,21,1),(22,22,4),(23,23,1);
/*!40000 ALTER TABLE `votes_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_votepolitics'
--

--
-- Dumping routines for database 'db_votepolitics'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
