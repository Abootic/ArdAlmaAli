-- MariaDB dump 10.19  Distrib 10.5.12-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u816384985_alaber
-- ------------------------------------------------------
-- Server version	10.5.12-MariaDB-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `about_sections`
--

DROP TABLE IF EXISTS `about_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `about_sections` (
  `id` int(11) NOT NULL DEFAULT 0,
  `section_no` int(11) NOT NULL,
  `content_eng` varchar(1000) NOT NULL,
  `content_ar` varchar(1000) NOT NULL,
  `priority` int(11) NOT NULL,
  `state` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`,`section_no`),
  KEY `id` (`id`),
  CONSTRAINT `about_sections_fk` FOREIGN KEY (`id`) REFERENCES `about_table` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='this table is to store all sections for each item in the about_table table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about_sections`
--

LOCK TABLES `about_sections` WRITE;
/*!40000 ALTER TABLE `about_sections` DISABLE KEYS */;
INSERT INTO `about_sections` VALUES (1,1,'Our Name Reflects Our Passion Toward Importing Items From  Professional Pharmaceutical, Cosmomedical, Nutritional And Medical Devices Affordable Products That Help The Patients And Customers Everywhere. ','يعكس اسمنا شغفنا تجاه استيراد عناصر من المنتجات المهنية الصيدلانية والطبية والتغذية والأجهزة الطبية بأسعار معقولة التي تساعد المرضى والعملاء في كل مكان.',5,1),(1,2,'We Are Established Since 2010 In Yemen  As A Leading Distributor Company.','تأسسنا منذ عام 2010 في اليمن كشركة توزيع رائدة.',2,1),(1,3,'We Are  A Group Of Pharmacists With More Than 20 Years Of Experience /Each In Managing The Multinational Pharmaceutical Business In Yemen .','نحن مجموعة من الصيادلة التي تضم أكثر من 20 سنه من الخبرة / وكل واحد في إدارة الأعمال الصيدلانية المتعددة الجنسيات في اليمن.',3,1),(1,4,'We Have One Objective To Help The Patients And Customers In Yemen   By Unique , High Quality Products At Affordable Price.','لدينا هدف واحد هو مساعدة المرضى والعملاء في اليمن بمنتجات ذات جودة عالية وفريدة من نوعها وبأسعار في متناول الجميع',4,1),(1,5,'Ajax 33k','اجاكس hfghjgjh',55,0),(2,1,'To Become a Leading  distributor for Pharmaceutical, Cosmo-Medical and Nutritional companies in Yemen .\n','أن نصبح موزعًا رائدًا لشركات الأدوية والمستلزمات الطبية والغذائية في اليمن.',1,1),(2,2,'To Provide High Quality products at affordable prices to all customers in this part of the world .\n','تقديم منتجات عالية الجودة بأسعار معقولة لجميع العملاء في هذا الجزء من العالم.',2,1),(2,3,'To Grow our Investment , to Grow Our Team and to Support our Community where we live and work.','تنمية استثماراتنا، وتنمية فريقنا إلى دعم مجتمعنا حيث نعيش ونعمل.',3,1),(18,1,'To Register, and support Unique Pharmaceutical, Nutritional, and Cosmo-Medical products that’s meets our Standards.\n','للتسجيل، ودعم منتجات صيدلانية وغذائية فريدة من نوعها والمنتجات الطبية التي تلبي معاييرنا.',1,1),(18,2,'To Select the best Capabilities, Resources, Programs, and Develop them \n','لتحديد أفضل القدرات والموارد والبرامج وتطويرها.',2,1),(18,3,'To Gain our Customer’s trust and support through world class customer focused activities. \n','لكسب ثقة العملاء والدعم من خلال أنشطة ركزت للعملاء على مستوى العالم.',3,1),(18,4,'Continuous, and professional products promotion utilizing\n','استخدام المنتجات المستمرة والمهنية.',4,1),(19,1,'We at Al-Aber Pharma dedicate ourselves to helping patients by developing and providing  innovative Products and customer services approaches. Over the next 5 years, we will achieve ','نحن في العابر فارما نكرس أنفسنا لمساعدة المرضى وتطوير وتقديم المنتجات المبتكرة للعملاء نهج الخدمات، على مدى السنوات الخمس المقبلة، سوف نحقق الحفاظ على المركز الأول بين TOP Toll موزع في اليمن.',1,1),(19,2,'We will offer a unique customer experience, fueled by innovative consumer communication programs, that will enhance our reputation and increase market share. Our continuing success as a business will benefit our customers, our families and the communities in which we operate. \n','سوف نقدم تجربة فريدة للعملاء، تغذيها الابتكارات برامج التواصل مع المستهلك، من شأنها أن تعزز السمعة وزيادة حصتها في السوق، نجاحنا المستمر كالأعمال التجارية ستفيد عملائنا وعائلاتنا والمجتمعات التي نعمل فيها.',2,1),(19,3,'We are  believing  in long term relationship and \nmutual growth as objective.\n','نحن نؤمن بعلاقة طويلة الأمد والنمو المتبادل كهدف لتطوير واستدامة شراكات تجارية منتجة مع عملائنا ومبادئنا.',3,1),(19,4,'Our values drive us at all time to be an ethical ,loyal ,and reputable business partner to all our customers and the principals we represent','تدفعنا قيمنا في جميع الأوقات إلى أن نكون أخلاقيين ومخلصين وشريك تجاري حسن السمعة لجميع عملائنا وإداراتنا.',4,1),(19,5,'We consider it or prime responsibility to provide our principals wide geographical coverage ,rapid delivery , sufficient company stock , competitive credit policy, and , when necessary ,essential market information .','نحن نعتبرها مسؤولية أو المسؤولية الرئيسية لتوفير التغطية الجغرافية واسعة النطاق، والتسليم السريع، وسياسة الائتمان التنافسية، وعند الضرورة، معلومات السوق الأساسية.',5,1),(19,6,'Supplying and supporting safe, cuttingedge devices, pharmaceuticals , and supplies for betterment of human health.','تزويد ودعم الأجهزة الآمنة والمتطورة والأدوية والمستحضرات الصيدلانية والإمدادات لتحسين صحة الإنسان.',6,1),(20,1,'We are select  a advanced production methods \n','نحن نختار أساليب الإنتاج المتقدمة',1,1),(20,2,'Highest quality Products/ Services.\n','أعلى جودة للمنتجات او الخدمات.',2,1),(20,3,'Top Quality Production lines and laboratories that operate in compliance with International standards.\n','أفضل خطوط إنتاج الجودة والمختبرات التي تعمل وفقا للمعايير الدولية.',3,1),(21,1,'Integrity\n','النزاهة\n',1,1),(21,2,'Accountability\n','المسؤولية \n',2,1),(21,3,'Team Work','فريق عمل ',3,1),(21,4,'Customer Focus','التركيز على العملاء ',4,1),(21,5,'Performance',' الفعالية',5,1),(22,1,'Continued effort to increase sales and market share for existing products through continuous market follow- up and continuous education for physicians and other medical professional.\n','الجهد المستمر لزيادة المبيعات وحصة السوق للمنتجات الحالية من خلال متابعة السوق المستمر والتعليم المستمر للأطباء والموظفين الطبيين الآخرين.',1,1),(22,2,'Expanding product diversity to complement existing lines thereby strengthening and entrenching relations with clients while concentrating on state of the art medical technologies.\n','•	توسيع نطاق التنوع المنتجات لاستكمال الخطوط الحالية مما يؤدي إلى تعزيز العلاقات الترتيبات مع العملاء مع التركيز على أحدث التقنيات الطبية.',2,1),(22,3,'Item for test','عنصر تجريبي',3,1),(23,1,'First achievement','الانجاز الاول',1,1);
/*!40000 ALTER TABLE `about_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `about_table`
--

DROP TABLE IF EXISTS `about_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `about_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_eng` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title_eng` (`title_eng`),
  UNIQUE KEY `title_ar` (`title_ar`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='this table to store all data of each section in the about page';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about_table`
--

LOCK TABLES `about_table` WRITE;
/*!40000 ALTER TABLE `about_table` DISABLE KEYS */;
INSERT INTO `about_table` VALUES (1,'Who We are','من نحن',1,1),(2,'Our Vision','رؤيتنا',2,1),(18,'Strategy','الإستراتيجية',4,1),(19,'Our Mission','رسالتنا',3,1),(20,'Our Concept is Quality Business ','مفهومنا حول جودة الأعمال',5,1),(21,'Values','قيمتنا',4,1),(22,'FUTURE OUTLOOK','النظرة المستقبلية',4,1),(23,'Our Achievements','انجازاتنا',3,1);
/*!40000 ALTER TABLE `about_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `passwd` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_change` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `state` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`uname`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Shareef','11','$2y$10$9iFoI/u//sX8mxSIIr7ipeEUKUfu65rH7Dc8fYwhkCGREFMsolgqi','sharef@gmail.com','770000000',1,'2021-03-31 17:30:40','2021-08-30 21:20:20',1),(2,'dataAdmin','22','$2y$10$jcDCq/evBNLhzVVPt./HUeOWurH058.ocW2QvX8YO0QSRR1sKbmrC','dent@gmail.com','',2,'2021-04-01 23:47:48','2021-09-03 23:13:09',1),(3,'Najmaldeen','najmi','$2y$10$UQ5Z6foEsW0awmYc6UmJWO/w.YNx85MqhXnq2JnUw03/k37atXPSC','alnajm@gmail.com','777777777',1,'2021-06-18 09:39:39','2021-06-18 09:39:39',1),(4,'shareef Ali','Shareef Ali','$2y$10$Ur/KwZAsz5CPyeAh/A8RJusovWvss2Ax4fHR8yQkSETJwdhOH1FNW','info@alaberpharma.com','0777408477',1,'2021-10-19 17:24:50','2021-10-19 17:24:50',1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'the primary key of the manufactory',
  `name` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(200) NOT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_change` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `state` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'state 1 means that it is active, 2 non active, 0 deleted',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'Relumins','[a-z]6171d965ce01f.png','info@relumins.com','https://www.relumins.com','KKKKKKKKK',' 7327811488','183 Locust Ave #726 West Long Branch, NJ. 07764 US','2021-03-28 05:30:43','2021-10-21 21:19:33',1),(2,'FirstCompany','FirstCompany60b518caecd80.jpg','first@gmail.com','www.first.com','https://www.facebook.com/first.1','12345678','turkish, ss','2021-03-28 12:00:27','2021-06-29 08:41:39',0),(3,'SecondCompany','[a-z]6122c5eeaf695.png','second@gmail.com','www.second.com','None','12345678','Italy, sshjk','2021-03-28 12:05:06','2021-08-22 21:47:26',0),(4,'Tomato','asfff.ljkm60b518a04ac1a.jpg','tomato@gmail.com','www.tomato.com',NULL,'111','Italy','2021-03-29 03:59:27','2021-06-18 05:00:04',1),(5,'Ivascular','Ivascular60b5187121561.jpg','ivas@gmail.com','www.ivascular.com','www.facebook.ivas.com','111','unKwn','2021-03-31 06:02:06','2021-06-29 08:40:32',0),(6,'العابر للاستيراد','[a-z]60daa35cc15bc.png','info@alaber.com','www.alab3r.com','www.facebook.com.alabeer.6','01665475','Yemen, Sanaa Hail st','2021-06-29 04:30:18','2021-08-22 21:46:13',1),(8,'hiroo2','[a-z]60dad9afb7406.png','hiro@fghjgk.com','yurytrutitoiutyutyfghdf','fb','5456556361','hkfhgfrtyeruikhklhk  iohyuigj yuhjfgftyu','2021-03-28 05:30:43','2021-08-30 21:24:51',2),(9,'Tomato2','[a-z]60dad955e63a7.jpg','tomato2@gmail.com','www.tomato.com','www.facebook.com/','111','Italy','2021-03-29 03:59:27','2021-06-29 08:27:01',1),(10,'Ivascular2','[a-z]60dad8604d1cf.jpg','ivas2@gmail.com','www.ivascular.com','www.facebook.ivas.com','111','unKwn','2021-03-31 06:02:06','2021-06-29 08:22:56',1),(11,'22العابر للاستيراد','[a-z]60dad8447a388.jpg','info22@alaber.com','www.alab3r.com','www.facebook.com.alabeer.6','01665475','Yemen, Sanaa Hail st','2021-06-29 04:30:18','2021-06-29 08:22:28',1),(12,'FirstCompany22','[a-z]60dad9783ff17.jpg','first22@gmail.com','www.first.com','https://www.facebook.com/first.1','12345678','turkish, ss','2021-03-28 12:00:27','2021-06-29 08:27:36',1),(13,'Soskin','[a-z]616ef0a882682.png','hello@crgfrance.com','https://soskin.fr/','https://www.facebook.com/Soskin-France-104653288555800/','04.93.08.85.84','1241, 1ère Avenue - 06510 CARROS - France','2021-03-28 12:05:06','2021-10-19 16:22:00',1),(14,'FLOSLEK','[a-z]616efdcf8025f.jpg','kontakt@floslek.pl','https://floslek.pl/en/','https://www.facebook.com/profile.phpid100064055770923','48 22 270 11 16','Laboratorium Kosmetyczne FLOSLEK Furmanek sp. j. ul. Geodetów 154 05-500 Piaseczno  Poland','2021-03-28 05:30:43','2021-10-19 17:18:07',1),(15,'Tomato33','[a-z]60dad8f13bf8d.jpg','tomato33@gmail.com','www.tomato.com','wghgj','111','Italy','2021-03-29 03:59:27','2021-06-29 08:25:21',1),(16,'IMGSA Group Industrie Pharmaceutique','brand-6167609da54f9.png','Contact@imgsapharma.com','https://imgsapharma.com/','https://www.facebook.com/imgsapharma/','00213 32 51 64 00',' Cité 156/554 logement BT33 N ° 28 Said Hamdine, Bir Mourad Rais ALGIERS','2021-10-13 22:41:33','2021-10-13 22:41:33',1);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sender` varchar(100) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `state` tinyint(4) NOT NULL DEFAULT 1,
  `sender_ip` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'najmi@gmail.com','Ask for ...','my Msg hhjkj gdfghd','2021-04-05 01:11:20',1,NULL),(2,'sec@gmail.com','hg ssss d','msg2 msg2 jklsdgkl;jlk/;jgddvf','2021-04-05 01:11:20',2,NULL),(3,'ahmed@gmail.com','ftest','ajsdl ','2021-06-29 07:01:06',1,'::1and ipv4 is :www.google.com'),(4,'hshdhh@gmail.com','نينين','نينينينين','2021-07-09 12:04:14',1,'134.35.135.92and ipv4 is :142.250.9.103'),(5,'0hdb@gmail.com','نينيينن','ننززز','2021-08-07 03:19:20',1,'188.240.126.231and ipv4 is :64.233.177.103'),(6,'jj@gmail.com','Hi ','Iam nashwan from New contact page to test it','2021-08-17 21:57:12',1,'134.35.146.252and ipv4 is :142.250.9.104'),(7,'0nashwan1000@gmail.com','نينيينن','Txhxhd','2021-08-17 22:06:18',1,'134.35.52.234and ipv4 is :142.250.9.147'),(8,'jj@gmail.com','نينيينن','Hhhhhhh','2021-08-17 22:08:35',1,'134.35.52.234and ipv4 is :142.250.9.103'),(9,'0nashwan1000@gmail.com','نينيينن','Ydhfjf','2021-08-17 22:09:41',1,'134.35.52.234and ipv4 is :142.250.9.104'),(10,'jj@gmail.com','Hhh','Bb','2021-08-17 22:13:08',2,'134.35.52.234and ipv4 is :142.250.9.147'),(11,'alaberpharma23@gmail.com','Test the form','Testing the new form ','2021-08-17 22:50:53',1,'205.160.110.230and ipv4 is :142.250.9.106'),(12,'0hdb@gmail.com','Jsjsj','Nsnsn','2021-08-18 01:47:50',1,'134.35.52.234and ipv4 is :74.125.136.103'),(13,'nashd@gmail.com','نينيينن','Hhh','2021-08-21 21:52:40',1,'185.80.140.218and ipv4 is :64.233.185.106'),(14,'nnn@gmail.com','Sub','للتجربه','2021-08-22 21:58:27',2,'134.35.217.191and ipv4 is :64.233.185.99'),(15,'sarmi2077@gmail.com','hi','llllllllllllllllllll','2021-08-23 00:12:14',2,'89.189.80.61and ipv4 is :64.233.185.103');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `footer_section`
--

DROP TABLE IF EXISTS `footer_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `footer_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address_eng` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `state` tinyint(4) NOT NULL DEFAULT 1,
  `phone_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_ar` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_sec` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_map` varchar(2048) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `footer_section`
--

LOCK TABLES `footer_section` WRITE;
/*!40000 ALTER TABLE `footer_section` DISABLE KEYS */;
INSERT INTO `footer_section` VALUES (2,'Yemen, Sanaa','info@alaberpharm.com','2021-08-17 00:29:01',1,'+967777408477','اليمن، صنعاء','01577404','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1923.7271143456578!2d44.185820437928456!3d15.351867089960693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1603db7638de355d%3A0xc1fab2461bfe6dd2!2z2LXZitiv2YTZitipINin2YTYudix2LTZig!5e0!3m2!1sar!2s!4v1629154005153!5m2!1sar!2s');
/*!40000 ALTER TABLE `footer_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `footer_socialmedia`
--

DROP TABLE IF EXISTS `footer_socialmedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `footer_socialmedia` (
  `social_media` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_of_website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 1,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `section_no` int(11) NOT NULL AUTO_INCREMENT,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`section_no`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `footer_socialmedia`
--

LOCK TABLES `footer_socialmedia` WRITE;
/*!40000 ALTER TABLE `footer_socialmedia` DISABLE KEYS */;
INSERT INTO `footer_socialmedia` VALUES ('1','2',2,'3',1,'2021-08-12 23:19:13'),('www.instagram.com','instagram',2,'736988.png',2,'2021-08-12 23:20:08'),('https://www.instagram.com','instagram',1,'fab fa-instagram fa-lg fa-fw',3,'2021-08-13 01:06:59'),('https://wa.me/+967716032167','whatsapp',1,'fab fa-whatsapp fa-lg fa-fw',4,'2021-08-17 00:23:54'),('https://twitter.com/alnassrnagm2s09','Twitter',1,'fab fa-twitter fa-lg fa-fw',5,'2021-08-17 00:57:16'),('https://www.facebook.com/Alaber-for-importing-317975088670381','facebook',1,'fab fa-facebook-f fa-lg fa-fw',6,'2021-08-17 00:59:16'),('737285920','whatsapp',2,'fab fa-facebook-f fa-lg fa-fw',7,'2021-08-19 18:36:31');
/*!40000 ALTER TABLE `footer_socialmedia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_views`
--

DROP TABLE IF EXISTS `home_views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `home_views` (
  `ip_add` varchar(25) NOT NULL,
  `number_of_views` int(11) NOT NULL,
  `last_view` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ip_add`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_views`
--

LOCK TABLES `home_views` WRITE;
/*!40000 ALTER TABLE `home_views` DISABLE KEYS */;
INSERT INTO `home_views` VALUES ('107.172.89.151',1,'2021-10-21 04:24:09'),('109.74.46.80',1,'2021-09-13 10:15:11'),('110.238.40.95',1,'2021-10-11 22:35:50'),('110.238.62.62',3,'2021-09-19 20:14:11'),('124.126.78.141',1,'2021-09-30 18:52:07'),('125.85.252.81',1,'2021-09-23 05:50:18'),('125.85.253.194',1,'2021-10-10 05:41:42'),('13.66.221.165',1,'2021-09-24 15:04:10'),('131.117.166.109',1,'2021-09-30 20:56:49'),('134.35.14.66',4,'2021-09-22 19:59:39'),('134.35.146.23',1,'2021-10-12 23:12:37'),('134.35.147.109',1,'2021-10-12 23:25:38'),('134.35.15.153',1,'2021-09-22 19:48:38'),('134.35.150.213',11,'2021-09-11 22:22:07'),('134.35.151.119',1,'2021-09-20 21:04:15'),('134.35.151.139',1,'2021-10-07 18:28:38'),('134.35.157.62',2,'2021-09-19 20:10:04'),('134.35.157.70',1,'2021-09-19 21:26:30'),('134.35.157.82',3,'2021-09-19 21:26:06'),('134.35.162.185',2,'2021-09-13 02:17:16'),('134.35.165.130',2,'2021-09-13 02:20:55'),('134.35.176.2',8,'2021-09-12 22:29:34'),('134.35.178.229',1,'2021-09-22 08:42:31'),('134.35.181.106',1,'2021-09-03 22:58:44'),('134.35.188.42',3,'2021-08-31 04:58:55'),('134.35.193.74',1,'2021-09-21 02:49:24'),('134.35.195.223',2,'2021-08-31 01:02:57'),('134.35.195.247',1,'2021-10-20 09:06:07'),('134.35.201.244',5,'2021-09-19 19:37:29'),('134.35.201.32',7,'2021-10-06 18:19:43'),('134.35.203.48',1,'2021-08-31 15:52:36'),('134.35.204.191',1,'2021-09-06 17:56:58'),('134.35.207.15',1,'2021-09-22 08:42:00'),('134.35.234.68',3,'2021-09-12 22:34:34'),('134.35.236.216',10,'2021-10-21 19:47:07'),('134.35.238.202',1,'2021-09-22 19:44:29'),('134.35.251.162',1,'2021-09-10 06:17:59'),('134.35.252.126',1,'2021-10-11 22:35:48'),('134.35.28.143',1,'2021-09-27 19:14:03'),('134.35.39.135',1,'2021-10-06 12:25:35'),('134.35.40.243',2,'2021-10-21 07:29:05'),('134.35.41.225',2,'2021-09-12 22:11:42'),('134.35.48.57',1,'2021-09-10 22:01:55'),('134.35.48.94',1,'2021-09-30 20:54:50'),('134.35.52.163',1,'2021-09-30 16:25:26'),('134.35.53.67',2,'2021-09-10 22:36:18'),('134.35.57.76',2,'2021-09-10 06:16:29'),('134.35.68.194',1,'2021-09-18 20:21:07'),('134.35.69.14',1,'2021-09-22 19:53:12'),('134.35.69.255',1,'2021-09-18 20:20:44'),('134.35.73.45',1,'2021-09-30 16:25:36'),('134.35.75.59',5,'2021-08-31 01:59:52'),('134.35.78.129',1,'2021-09-30 16:25:17'),('134.35.79.171',3,'2021-09-30 16:25:12'),('134.35.81.101',4,'2021-09-12 22:30:55'),('134.35.91.166',1,'2021-09-24 19:20:21'),('134.35.92.34',1,'2021-10-22 00:39:42'),('136.233.162.250',1,'2021-09-20 08:54:51'),('157.55.39.136',1,'2021-10-21 11:56:35'),('157.55.39.179',2,'2021-10-06 17:01:42'),('159.203.196.79',1,'2021-10-14 01:32:33'),('175.110.23.246',1,'2021-09-22 08:41:45'),('175.110.37.173',2,'2021-09-19 20:15:35'),('175.110.42.237',1,'2021-09-10 07:26:21'),('175.110.42.29',2,'2021-10-21 21:19:50'),('175.110.49.221',1,'2021-10-11 22:35:32'),('176.123.21.88',1,'2021-10-14 01:33:41'),('176.123.21.90',1,'2021-10-14 01:32:32'),('176.123.29.197',2,'2021-09-20 04:27:20'),('176.123.29.202',1,'2021-09-19 21:18:51'),('176.123.29.209',3,'2021-09-19 22:57:21'),('176.123.29.7',1,'2021-10-11 22:35:50'),('176.123.31.162',1,'2021-08-31 03:30:35'),('178.130.111.188',1,'2021-10-11 22:35:40'),('178.130.116.171',1,'2021-10-11 22:35:10'),('178.130.119.234',3,'2021-10-21 21:57:53'),('178.130.126.76',1,'2021-09-30 20:57:14'),('178.130.87.26',1,'2021-09-10 06:24:11'),('178.130.91.155',1,'2021-09-10 22:30:09'),('178.195.24.174',1,'2021-10-09 06:27:14'),('185.107.106.85',1,'2021-09-27 06:55:19'),('185.80.140.157',2,'2021-10-18 23:21:37'),('185.80.140.21',2,'2021-09-10 20:08:49'),('185.80.140.4',3,'2021-08-31 01:32:37'),('185.80.140.97',6,'2021-10-12 22:58:28'),('188.209.229.172',2,'2021-09-05 00:53:52'),('188.209.234.165',1,'2021-10-13 21:37:26'),('188.209.235.4',1,'2021-09-01 06:23:51'),('188.209.240.147',1,'2021-09-22 08:41:46'),('188.209.240.39',5,'2021-09-06 06:34:06'),('188.209.248.27',3,'2021-09-12 22:31:26'),('188.209.249.225',2,'2021-09-03 23:11:08'),('188.240.100.100',1,'2021-09-18 20:20:59'),('188.240.101.39',1,'2021-08-31 01:51:05'),('188.240.107.116',1,'2021-10-22 01:21:59'),('188.240.125.25',2,'2021-10-07 15:11:01'),('188.240.127.235',3,'2021-10-20 22:55:03'),('188.240.97.10',1,'2021-10-12 21:15:14'),('188.240.98.244',1,'2021-09-18 20:23:57'),('194.30.200.98',2,'2021-09-27 07:49:13'),('199.127.56.236',1,'2021-10-09 20:18:56'),('207.46.13.62',3,'2021-10-07 18:30:03'),('210.179.31.2',1,'2021-10-18 02:09:46'),('211.169.234.21',2,'2021-09-28 01:08:07'),('211.178.238.17',3,'2021-09-06 06:39:22'),('213.204.106.157',2,'2021-10-20 10:56:46'),('213.246.23.151',1,'2021-09-13 02:32:38'),('213.246.26.26',4,'2021-10-20 22:55:18'),('213.246.28.68',1,'2021-10-20 09:22:41'),('213.246.30.57',1,'2021-08-31 03:31:19'),('218.145.245.23',6,'2021-10-15 09:31:55'),('223.178.209.192',1,'2021-10-18 05:01:42'),('3.133.155.235',1,'2021-09-30 11:53:51'),('3.135.209.57',1,'2021-10-20 11:31:01'),('3.14.127.143',1,'2021-10-11 02:22:26'),('3.141.19.129',1,'2021-10-04 02:29:26'),('31.13.127.10',1,'2021-09-27 19:48:56'),('31.13.127.11',1,'2021-09-27 19:48:48'),('31.13.127.22',1,'2021-09-27 19:48:56'),('31.13.127.4',1,'2021-09-27 19:48:56'),('31.13.127.41',1,'2021-09-27 19:48:49'),('34.223.90.126',1,'2021-09-26 00:09:26'),('46.161.238.18',1,'2021-09-11 01:03:17'),('46.35.71.216',1,'2021-09-22 19:56:50'),('46.35.93.108',5,'2021-09-22 16:07:32'),('46.35.94.158',1,'2021-10-21 05:10:09'),('46.35.95.125',1,'2021-10-04 16:17:12'),('5.255.31.110',1,'2021-10-14 01:35:10'),('58.123.220.11',1,'2021-09-28 01:08:09'),('63.171.19.152',1,'2021-09-30 20:00:10'),('64.120.109.123',1,'2021-10-10 07:55:58'),('66.249.64.201',3,'2021-10-04 09:33:51'),('66.249.64.203',4,'2021-10-16 22:09:23'),('66.249.64.205',2,'2021-10-12 23:00:48'),('66.249.64.41',1,'2021-10-12 23:08:39'),('66.249.64.45',1,'2021-10-12 23:08:30'),('66.249.66.13',1,'2021-09-21 08:21:58'),('66.249.66.9',1,'2021-09-20 16:45:24'),('66.249.70.13',2,'2021-10-07 13:37:16'),('66.249.70.15',2,'2021-10-01 19:37:02'),('66.249.70.17',2,'2021-10-07 12:47:05'),('66.249.70.23',1,'2021-09-27 09:12:23'),('77.252.106.57',2,'2021-10-21 11:18:53'),('78.137.64.117',1,'2021-09-30 19:14:58'),('78.137.68.132',3,'2021-09-19 21:29:06'),('78.137.85.14',2,'2021-09-23 20:24:44'),('78.137.90.168',1,'2021-10-04 16:16:51'),('80.253.186.200',4,'2021-09-12 22:17:04'),('80.253.189.27',3,'2021-09-12 22:18:17'),('81.91.25.145',6,'2021-08-31 02:12:23'),('82.114.163.198',1,'2021-09-23 20:21:34'),('82.114.163.229',1,'2021-09-12 22:09:53'),('82.218.176.13',3,'2021-10-04 15:15:22'),('89.175.195.98',7,'2021-10-08 06:47:54'),('89.189.92.85',1,'2021-10-04 16:07:45'),('94.142.141.230',3,'2021-09-28 18:46:07'),('94.26.200.7',1,'2021-09-27 16:26:41'),('94.26.217.205',2,'2021-09-05 01:06:14'),('94.26.219.22',3,'2021-09-02 02:38:44');
/*!40000 ALTER TABLE `home_views` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `img1` varchar(250) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `ingredients` varchar(255) DEFAULT NULL,
  `category` varchar(20) NOT NULL,
  `product_type` varchar(50) DEFAULT 'None',
  `size` varchar(50) DEFAULT NULL,
  `power` varchar(50) NOT NULL,
  `company` int(10) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_change` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin` int(10) NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`company`),
  KEY `company` (`company`,`admin`),
  KEY `admin_idx` (`admin`),
  CONSTRAINT `product_admin_fk` FOREIGN KEY (`admin`) REFERENCES `admin` (`id`),
  CONSTRAINT `product_company_fk` FOREIGN KEY (`company`) REFERENCES `companies` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'60db2de53aca9.jpg','61270c39a670e.jpg','prod','      Our name reflects out passion toward importing items from professional pharmaceutical, Cosmo-Medical,','','Medicin','حبوب','','655',1,'2021-04-02 01:55:35','2021-08-26 03:36:25',1,1),(2,'60778a05070cb.jpg','60db2e9c78a8c.jpg','product21','     نوىتانىاتنزاىسؤوب بسيلرنسيئ بيليب ل ليب ىونسيى ليبىتنم','     ةنوةة نةوووووووووووووووو','Medical Equipment','تحاميل','','444',2,'2021-04-02 02:23:53','2021-06-29 14:32:40',1,1),(3,'60b44643056d4.jpg','60db2eee29aad.jpg','prod22','  jkh jkhnkasf sa\r\nالتبلا بالبابا تلعغبا ','  szxc jhj','Medical Equipment','إبر','','6t',1,'2021-04-02 02:26:14','2021-06-29 14:32:14',1,1),(4,'6121c75adadce.jpg','6171e663b9291.jpg','collagen up','   يحفز انتاج الكولاجين والايستين ببالبشرة   يحسن مرونة الجلد   ترطيب البشرة  تقليل التجاعيد  مقاوم للشيخوخه ','  rye extract and caffeine stimulate skin cells for production ofelastin and collagen, reduce wrinkles and intensely moisturize.','Other','SERUM ','30ml','',14,'2021-04-16 23:46:17','2021-10-21 22:21:44',1,1),(5,'61270c550cf2f.jpg','60db2d959e501.jpg','GLUTA Slim','    يحتوي على مجموعه متكامله من المكونات الطبيعيه الخاصه بالتخسيس وتبيض البشرةتقليل الشعور بالجوع حرق الدهون المتراكمة في الجسممنع تخزين الدهون الأضافية والتخلص من الترهلاتتعزيز مستويات الطاقه من خلال تسريع عملية الأيض تبيض البشرة ومضاد للأكسدةتحسين المزاج العام','L-GlutathioneGreen Coffee Bean Extract Raspberry KetoneGreen Tea ExtractGarcinia Cambodia ExtractGriffonia Simplicifolia Seed Extract 5-HTPBitter Orange Powder','Other','Capsules','90 Capsules','',1,'2021-05-03 21:18:55','2021-10-21 21:52:59',1,1),(6,'6122c6987a417.png','60db2d7ca5062.jpg','Najmii1 ','       ghjgj hhgjhhh hkh sdg g s gs g gdwhgj jhv','jhkjhwwwwwwwejhgukhjjkJeusdjhddh','Medicin','','Small','more',9,'2021-05-28 00:48:34','2021-08-22 21:50:16',1,1),(7,'60db2ebd41fdd.jpg','60db2df97698e.jpg','product3','      Our name reflects out passion toward importing items from professional pharmaceutical, Cosmo-Medical,','','Medicin','حبوب','','655',3,'2021-04-02 01:55:35','2021-08-22 21:48:35',1,1),(8,'60db30425fd91.jpg','6171ecce1d823.jpg','  White&Beauty Spot Lightening cream','   علاج التصبغات والبقع الملونه والكلف والنمش     عناية ممتازه للبشرة لاحتوائيه على عنصر ETIOLINE المثبت علميا بعلاج هذه الأمراض  يوحد لون البشرة  يحسن ترطيب وتغذية البشرة','    Lightening Compiex-Etioline-5         Shea Butter 3           Vitamin E 0.25 ','Other','cream','50ml','',14,'2021-04-16 23:46:17','2021-10-21 22:44:32',1,1),(9,'60db30a4042f5.jpg','60db2d959e501.jpg','product9800','testtttttttt\r\nttttttttttttt\r\nttttttttt','','Other','','60 Capsules','1000',4,'2021-05-03 21:18:55','2021-06-29 14:39:32',1,1),(10,'60db3061b1822.jpg','60db2e9c78a8c.jpg','product5587','  there is no desc','       ةنوةة نةووووووووو ووووووو','Cosmetic','','','444',5,'2021-04-02 02:23:53','2021-06-29 14:41:46',1,1),(11,'616ef546454da.jpg',NULL,'REVITA C SERUM ','  للعناية المكثفة بالفيتامين للبشرة الناضجة حول العينين والعنق حيث تظهر إشارات فقدان المطاطية والاشتداد والجفاف .الفيتامين سي الفعال يحفز انقسام الخلايا ويجدد البشرة بعمق ويجنب الشيخوخة الناتجة عن الضوء .الريتينول النباتي يحسن مطاطية البشرة واشتدادها ويخفف ظهور التجاعيد والهالات السوداء .يوفر ترطيب طويل الأمد ويجنب خسارة الماء Fucogel ® .والانتفاخ التأثير :بشرة مرطبة بشكل مناسب مطاطية ومشدودة من دون تجاعيد عميقة وهالات سوداء وانتفاخ. طريقة الاستعمال :ضعي المركز على البشرة حول العينين وعلى العنق ',' 1-Active form of vitamin C Bi-layer Capsule C2-Retinol 3- Fucogel ','Other','SERUM ','30 ml','',14,'2021-10-19 16:41:42','2021-10-21 19:50:24',1,1),(12,'61700bcd80e52.jpg',NULL,'ANTI ACNE Antibacterial face cleansing gel ',' ينظف البشرة ويرطبها  يزيل الرؤوس السوداء يعمل على انقباض الغدد الدهنية  في البشرة أي يعمل على تقليل افراز الدهون ويحافظ على توازن البشرةمضاد للبكتريا ومقشر ويقلص من حجم المسامات الواسعه',' Seboregulating Complex 0.5          Polyplant oily 1           lamesoft 4   ','Cosmetic','cleansing','200ml','',14,'2021-10-20 12:30:05','2021-10-21 22:49:11',1,1),(13,'6171b1eae0cd3.jpg',NULL,'Mattifying cream','  كريم ينقص من لمعان البشرة  الناتج من الافرازات الدهنيةيعمل على تقليص حجم المسام وتنقيتها وامتصاص الدهونمضاد للبكتريا ويعمل على تجديد خلايا البشرة ويقلل من ظهور الحبوب بنسبة 90',' Aqua, Ethylhexyl Stearate, Hydroxyethyl Acrylate/Sodium Acryloyldimethyl Taurate Copolymer, Squalane, Glycerin, Polysorbate 60, Niacinamide, Faex Extract, Aesculus Hippocastanum Seed Extract, Ammonium Glycyrrhizate, Panthenol,  Zinc Gluconate, Caffeine, ','Other','cream','50ml','',14,'2021-10-20 12:52:49','2021-10-21 18:31:21',1,1),(14,'6171b64e202cf.png',NULL,'Intense gel','جل مخصص لمعالجة الحبوب والبثور والألتهابات التى تتعرض لها البشرة الدهنية ويعمل على تجديد الخلايا','Aqua, Alcohol Denat., Ceteareth-12, Carbomer, Candida Bombicola/Glucose/Methyl Rapeseedate Ferment,  Niacinamide, Faex Extract, Aesculus Hippocastanum Seed Extract, Ammonium Glycyrrhizate, Panthenol, Propylene Glycol, Zinc Gluconate, Caffeine, Biotin, All','Other','gel','20ml','',14,'2021-10-21 18:49:50','2021-10-21 18:49:50',1,1),(15,'6171bded1706b.jpg',NULL,'Revive Nails',' أعادة بناء الأظافر والعناية بالأظافر الرقيقة والضعيفة والتالفه يجعل صفيحة الظفر أكثرصلابه سمكاومقاومة للتكسر يمنع ظهور التصبغات على الأظافر ويعطي لمعه','Glycerin, Prunus Amygdalus Dulcis Oil, Pentylene Glycol, Ricinus Communis Seed Oil, Caprylic/Capric Triglyceride,  PEG-60 Almond Glycerides, Tocopheryl Acetate, Shea Butter Ethyl Esters, Octyldodecyl PCA, Helianthus Annuus Seed Oil, Cocos Nucifera Oil, Li','Other','oli','8ml','',14,'2021-10-21 19:22:21','2021-10-21 19:22:21',1,1),(16,'6171c9947d995.jpg',NULL,'Dr Stopa',' اقدام ناعمة ومرنة وأقل عرضة للتقشر المفرط','Aqua, Urea, Glyceryl Stearate, Paraffinum Liquidum, Propylene Glycol, Cetearyl Alcohol, Ceteareth-20, Isopropyl Myristate, Glycerin, Cetyl Dimethicone, Taurine, Lanolin, Aloe Barbadensis Leaf Juice, Dimethicone, Panthenol, Ceteareth-12, Cetyl Palmitate, T','Other','cream','100ml','',14,'2021-10-21 20:12:04','2021-10-21 20:12:04',1,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (1,'web_logo','3.jpg',1),(2,'about','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',1),(3,'vision','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',1),(4,'mission','We at Al-Aber Pharma dedicate ourselves to helping patients by\r\ndeveloping and providing innovative Products and customer\r\nservices approaches. Over the next 5 years, we will achieve &\r\nsustain the premier position among the TOP Toll distributor in\r\nYemen.\r\nWe will offer a unique customer experience, fueled by innovative\r\nconsumer communication programs, that will enhance our\r\nreputation and increase market share. Our continuing success as\r\na business will benefit our customers, our families and the\r\ncommunities in which we operate.\r\nWe are believing in long term relationship and\r\nmutual growth as objective.\r\nTo develop and sustained productive business partnerships with\r\nour customers and principles\r\nOur values drive us at all time to be an ethical ,loyal ,and\r\nreputable business partner to all our customers and the principals\r\nwe represent\r\nWe consider it or prime responsibility to provide our principals\r\nwide geographical coverage ,rapid delivery , sufficient company\r\nstock , competitive credit policy, and , when necessary ,\r\nessential market information .\r\nSupplying and supporting safe, cutting-edge devices,\r\npharmaceuticals , and supplies for\r\nbetterment of human health.',1),(5,'objective','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',1),(6,'phone','999569584',1),(7,'facebook','my facebook',1),(8,'twitter','my twittwer .com',1),(9,'email','alaber@gmail.com',1),(10,'instagram','jllllllllllhkjukughj',1),(11,'whatsapp','7764664156',1);
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `replies` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `contact_id` int(10) DEFAULT NULL,
  `replaymsg` varchar(255) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contact_id` (`contact_id`,`admin`),
  KEY `replay_admin_idx` (`admin`),
  CONSTRAINT `admin_replaies_fk` FOREIGN KEY (`admin`) REFERENCES `admin` (`id`),
  CONSTRAINT `contact_replay_fk` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
INSERT INTO `replies` VALUES (1,1,'kljhkhjkgjgjgjh','2021-06-18 09:56:53',2),(2,1,'hhhh','2021-06-25 01:07:50',2),(3,3,'hghgh','2021-06-29 15:11:21',1),(4,3,'uijhu','2021-06-30 12:45:36',1),(5,11,'This is the reply for test msg','2021-08-17 22:56:33',1),(6,14,'تم','2021-08-22 23:51:29',1),(7,15,'llll','2021-08-23 00:13:19',1);
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slides` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `title_ar` varchar(250) DEFAULT NULL,
  `description_ar` varchar(250) DEFAULT NULL,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `state` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
INSERT INTO `slides` VALUES (6,'611fe6435fafd.jpg','Alaber Pharma ','                                            for imprting medicine ','العابر للاستيراد','                                            أدوية، أدوات طبية، أدوات تجميل','2021-08-20 17:28:35',1),(9,'611c61144f635.jpg','Alaber pharma ','Importing medicine ','العابر فارما','أدوية، أدوات طبية ، أدوات تجميل','2021-08-18 01:58:42',1),(10,'611c60ec90d6a.jpg','Alaber pharma ','for imprting medicine ','العابر للاستيراد','أدوية، أدوات طبية، أدوات تجميل','2021-08-18 01:22:52',1);
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-22  2:27:55
