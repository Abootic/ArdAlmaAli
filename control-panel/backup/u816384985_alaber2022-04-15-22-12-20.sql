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
INSERT INTO `companies` VALUES (1,'Relumins','[a-z]6171d965ce01f.png','info@relumins.com','https://www.relumins.com','KKKKKKKKK',' 7327811488','183 Locust Ave #726 West Long Branch, NJ. 07764 US','2021-03-28 05:30:43','2021-10-21 21:19:33',1),(2,'Bio-Tech','FirstCompany60b518caecd80.jpg','customerservice@bio-tech-pharm.com','https://www.biotechpharmacal.com/','https://www.facebook.com/BioTechPharmacal/','1 888-906-4304','PO Box 1927 Fayetteville, AR 72702','2021-03-28 12:00:27','2021-10-22 16:24:18',0),(3,'INNOAESTHETICS','[a-z]6172ca9f493f8.jpg','innoaesthetics@gmail.com','www.innoaesthetics.com','.......',' 34 93 470 59 45',' Pont Reixat, 3, 3a planta 08960 San Just Desvern Barcelona, Spain','2021-03-28 12:05:06','2021-10-22 14:28:47',0),(4,'Tomato','[a-z]6172e90cca94b.jpg','sales@tomatomnc.kr','http://www.tomatomnc.com/main','.......',' 82-31-662-9690','#15-11 Suwolam-gil, Seotan-myeon, Pyeongtack City, Gyeonggi-do ZIP:17704','2021-03-29 03:59:27','2021-10-22 16:38:36',1),(5,'Ivascular','[a-z]6172e82ce641d.png','info@ivascular.global','https://ivascular.global/','www.facebook.ivas.com',' 34 936 724 311','Camí Ca nUbach, 11 08620 Sant Vicenç dels Horts - Barcelona','2021-03-31 06:02:06','2021-10-22 16:35:13',0),(6,'Concept Medical','[a-z]6176e12d063a9.png','r.belose@conceptmedical.com','https://www.conceptmedical.com/','https://www.facebook.com/conceptmedicals/',' 1813955-8855',' 5600 Mariner ST, STE 200, Tampa, FL 33609, USA','2021-06-29 04:30:18','2021-10-25 17:19:01',1),(8,'hiroo2','[a-z]60dad9afb7406.png','hiro@fghjgk.com','yurytrutitoiutyutyfghdf','fb','5456556361','hkfhgfrtyeruikhklhk  iohyuigj yuhjfgftyu','2021-03-28 05:30:43','2021-08-30 21:24:51',2),(9,'Tomato2','[a-z]60dad955e63a7.jpg','tomato2@gmail.com','www.tomato.com','www.facebook.com/','111','Italy','2021-03-29 03:59:27','2021-10-22 16:00:53',2),(10,'Activlab pharma','[a-z]6172d3fd8962b.png','exportoffice@activlab.eu','www.activlabpharma.eu','https://www.facebook.com/ThemeFusionAvada','48 609 539 857','Unipro, Targowisko 553, 32-015 Kłaj, Poland','2021-03-31 06:02:06','2021-10-22 15:08:45',1),(11,'22العابر للاستيراد','[a-z]60dad8447a388.jpg','info22@alaber.com','www.alab3r.com','www.facebook.com.alabeer.6','01665475','Yemen, Sanaa Hail st','2021-06-29 04:30:18','2021-10-22 16:01:09',2),(12,'opigroup','[a-z]6172eb5f7dffa.png','support@opigroup.com','https://opigroup.org/','https://m.facebook.com/orisonpharmainternational/','099310 42682','Galawari, Haryana 173000','2021-03-28 12:00:27','2021-10-22 16:48:31',1),(13,'Soskin','[a-z]616ef0a882682.png','hello@crgfrance.com','https://soskin.fr/','https://www.facebook.com/Soskin-France-104653288555800/','04.93.08.85.84','1241, 1ère Avenue - 06510 CARROS - France','2021-03-28 12:05:06','2021-10-19 16:22:00',1),(14,'FLOSLEK','[a-z]616efdcf8025f.jpg','kontakt@floslek.pl','https://floslek.pl/en/','https://www.facebook.com/profile.phpid100064055770923','48 22 270 11 16','Laboratorium Kosmetyczne FLOSLEK Furmanek sp. j. ul. Geodetów 154 05-500 Piaseczno  Poland','2021-03-28 05:30:43','2021-10-19 17:18:07',1),(15,' Regenyal laboratories','[a-z]6172cec6a6ac4.jpg','web@regenyal.eu','http://en.regenyal.eu','Biorivolumetria','39 0735 757947','San Benedetto del Tronto AP 63074, Via Valtellina, 21','2021-03-29 03:59:27','2021-10-22 14:46:30',1),(16,'IMGSA Group Industrie Pharmaceutique','brand-6167609da54f9.png','Contact@imgsapharma.com','https://imgsapharma.com','https://www.facebook.com/imgsapharma','00213 32 51 64 00',' Cité 156/554 logement BT33 N ° 28 Said Hamdine, Bir Mourad Rais ALGIERS','2021-10-13 22:41:33','2021-10-22 16:00:12',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'najmi@gmail.com','Ask for ...','my Msg hhjkj gdfghd','2021-04-05 01:11:20',1,NULL),(2,'sec@gmail.com','hg ssss d','msg2 msg2 jklsdgkl;jlk/;jgddvf','2021-04-05 01:11:20',2,NULL),(3,'ahmed@gmail.com','ftest','ajsdl ','2021-06-29 07:01:06',2,'::1and ipv4 is :www.google.com'),(4,'hshdhh@gmail.com','نينين','نينينينين','2021-07-09 12:04:14',2,'134.35.135.92and ipv4 is :142.250.9.103'),(5,'0hdb@gmail.com','نينيينن','ننززز','2021-08-07 03:19:20',2,'188.240.126.231and ipv4 is :64.233.177.103'),(6,'jj@gmail.com','Hi ','Iam nashwan from New contact page to test it','2021-08-17 21:57:12',2,'134.35.146.252and ipv4 is :142.250.9.104'),(7,'0nashwan1000@gmail.com','نينيينن','Txhxhd','2021-08-17 22:06:18',2,'134.35.52.234and ipv4 is :142.250.9.147'),(8,'jj@gmail.com','نينيينن','Hhhhhhh','2021-08-17 22:08:35',2,'134.35.52.234and ipv4 is :142.250.9.103'),(9,'0nashwan1000@gmail.com','نينيينن','Ydhfjf','2021-08-17 22:09:41',2,'134.35.52.234and ipv4 is :142.250.9.104'),(10,'jj@gmail.com','Hhh','Bb','2021-08-17 22:13:08',2,'134.35.52.234and ipv4 is :142.250.9.147'),(11,'alaberpharma23@gmail.com','Test the form','Testing the new form ','2021-08-17 22:50:53',2,'205.160.110.230and ipv4 is :142.250.9.106'),(12,'0hdb@gmail.com','Jsjsj','Nsnsn','2021-08-18 01:47:50',2,'134.35.52.234and ipv4 is :74.125.136.103'),(13,'nashd@gmail.com','نينيينن','Hhh','2021-08-21 21:52:40',2,'185.80.140.218and ipv4 is :64.233.185.106'),(14,'nnn@gmail.com','Sub','للتجربه','2021-08-22 21:58:27',2,'134.35.217.191and ipv4 is :64.233.185.99'),(15,'sarmi2077@gmail.com','hi','llllllllllllllllllll','2021-08-23 00:12:14',2,'89.189.80.61and ipv4 is :64.233.185.103'),(16,'Info@alaberpharma.com','Agent in Yemen','hi','2021-10-24 22:20:24',1,'134.35.237.24and ipv4 is :142.250.176.68'),(17,'wajdialdobei75@gmail.com','Test','For test','2021-10-24 22:43:05',1,'134.35.216.33and ipv4 is :172.217.13.68'),(18,'info@alaberpharm.com','شراء','شراء','2022-02-04 22:58:51',1,'175.110.49.93and ipv4 is :172.217.164.68');
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
INSERT INTO `footer_section` VALUES (2,'Yemen, Sanaa','info@alaberpharm.com','2021-08-17 00:29:01',1,'+967777408477','اليمن، صنعاء','01577404','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3847.8249254990865!2d44.18656651467408!3d15.33174668934012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1603dbf553314511%3A0xe26a669d2ab8ff26!2z2KfZhNi52KfYqNixINmE2YTYp9iz2KrZitix2KfYrw!5e0!3m2!1sen!2s!4v1635375979699!5m2!1sen!2s');
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
INSERT INTO `footer_socialmedia` VALUES ('1','2',2,'3',1,'2021-08-12 23:19:13'),('www.instagram.com','instagram',2,'736988.png',2,'2021-08-12 23:20:08'),('https://www.instagram.com','instagram',1,'fab fa-instagram fa-lg fa-fw',3,'2021-08-13 01:06:59'),('https://wa.me/+967777408477','whatsapp',1,'fab fa-whatsapp fa-lg fa-fw',4,'2021-08-17 00:23:54'),('https://twitter.com','Twitter',1,'fab fa-twitter fa-lg fa-fw',5,'2021-08-17 00:57:16'),('https://www.facebook.com/Alaber-for-importing-317975088670381','facebook',1,'fab fa-facebook-f fa-lg fa-fw',6,'2021-08-17 00:59:16'),('737285920','whatsapp',2,'fab fa-facebook-f fa-lg fa-fw',7,'2021-08-19 18:36:31');
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
INSERT INTO `home_views` VALUES ('102.46.229.141',1,'2021-12-31 19:57:24'),('102.58.104.27',3,'2022-02-20 14:59:22'),('102.59.38.35',2,'2022-02-15 11:22:54'),('103.111.20.78',3,'2021-12-27 11:59:46'),('103.14.127.197',1,'2022-03-23 11:57:53'),('103.149.154.37',1,'2022-01-10 09:08:05'),('103.152.34.186',2,'2022-03-10 01:54:12'),('104.200.29.188',1,'2021-10-28 13:09:25'),('105.100.113.187',2,'2021-11-09 13:22:11'),('105.110.151.163',2,'2022-01-11 15:09:49'),('105.206.228.133',1,'2022-02-05 13:34:37'),('105.235.135.72',1,'2022-01-19 13:48:11'),('105.235.136.121',5,'2022-01-11 15:11:12'),('105.96.57.86',1,'2022-01-19 13:53:26'),('106.249.199.52',1,'2022-01-26 00:45:16'),('107.172.89.151',2,'2021-10-23 08:12:41'),('109.74.33.6',1,'2022-02-07 02:27:18'),('109.74.36.131',5,'2022-02-06 23:05:47'),('109.74.38.251',1,'2022-02-06 23:02:53'),('109.74.40.18',3,'2021-10-27 02:13:18'),('109.74.41.14',2,'2021-10-27 02:50:10'),('109.74.41.155',1,'2021-10-27 21:06:27'),('109.74.45.1',1,'2022-03-01 17:37:51'),('109.74.46.80',1,'2021-09-13 10:15:11'),('109.74.47.251',1,'2022-04-11 03:33:17'),('109.88.203.72',1,'2021-11-11 11:02:20'),('110.238.40.95',1,'2021-10-11 22:35:50'),('110.238.62.62',3,'2021-09-19 20:14:11'),('114.143.161.198',2,'2021-11-12 12:22:24'),('118.116.10.208',1,'2022-03-07 09:13:38'),('121.135.144.137',5,'2022-02-07 14:40:52'),('122.173.25.15',1,'2022-03-23 11:57:49'),('122.186.11.72',7,'2021-12-29 11:08:07'),('124.126.78.141',1,'2021-09-30 18:52:07'),('125.131.236.69',2,'2021-11-22 05:55:33'),('125.85.252.81',1,'2021-09-23 05:50:18'),('125.85.253.194',1,'2021-10-10 05:41:42'),('13.66.221.165',1,'2021-09-24 15:04:10'),('131.117.166.109',1,'2021-09-30 20:56:49'),('134.35.120.82',1,'2022-02-04 22:22:16'),('134.35.130.149',1,'2022-02-04 23:36:35'),('134.35.131.214',4,'2022-02-04 23:50:45'),('134.35.138.21',1,'2021-10-25 22:58:44'),('134.35.14.66',4,'2021-09-22 19:59:39'),('134.35.146.23',1,'2021-10-12 23:12:37'),('134.35.147.109',1,'2021-10-12 23:25:38'),('134.35.148.199',2,'2021-11-04 18:42:56'),('134.35.15.153',1,'2021-09-22 19:48:38'),('134.35.150.213',11,'2021-09-11 22:22:07'),('134.35.151.119',1,'2021-09-20 21:04:15'),('134.35.151.139',1,'2021-10-07 18:28:38'),('134.35.155.127',1,'2022-04-15 22:02:20'),('134.35.157.62',2,'2021-09-19 20:10:04'),('134.35.157.70',1,'2021-09-19 21:26:30'),('134.35.157.82',3,'2021-09-19 21:26:06'),('134.35.16.2',1,'2022-01-28 17:16:20'),('134.35.161.216',2,'2021-10-23 22:17:42'),('134.35.162.180',1,'2021-10-23 22:18:11'),('134.35.162.185',2,'2021-09-13 02:17:16'),('134.35.164.1',1,'2021-10-24 01:31:18'),('134.35.164.94',8,'2021-10-25 17:47:56'),('134.35.165.130',2,'2021-09-13 02:20:55'),('134.35.176.2',8,'2021-09-12 22:29:34'),('134.35.177.199',5,'2021-10-24 17:13:17'),('134.35.178.229',1,'2021-09-22 08:42:31'),('134.35.18.117',1,'2021-11-13 22:07:37'),('134.35.18.48',1,'2022-01-08 15:07:58'),('134.35.181.106',1,'2021-09-03 22:58:44'),('134.35.182.188',3,'2021-11-29 19:51:32'),('134.35.188.42',3,'2021-08-31 04:58:55'),('134.35.193.111',1,'2021-10-25 20:17:43'),('134.35.193.74',1,'2021-09-21 02:49:24'),('134.35.194.44',1,'2021-11-09 19:35:28'),('134.35.195.223',2,'2021-08-31 01:02:57'),('134.35.195.233',2,'2021-10-30 11:56:37'),('134.35.195.247',1,'2021-10-20 09:06:07'),('134.35.198.6',1,'2021-10-26 22:07:59'),('134.35.199.12',1,'2021-10-29 23:12:29'),('134.35.201.244',5,'2021-09-19 19:37:29'),('134.35.201.32',7,'2021-10-06 18:19:43'),('134.35.203.48',1,'2021-08-31 15:52:36'),('134.35.204.191',1,'2021-09-06 17:56:58'),('134.35.207.15',1,'2021-09-22 08:42:00'),('134.35.211.255',1,'2021-12-02 14:18:11'),('134.35.212.138',4,'2021-10-23 19:33:50'),('134.35.216.109',1,'2021-10-24 22:04:33'),('134.35.216.33',3,'2021-10-25 01:36:04'),('134.35.217.4',1,'2021-11-10 12:29:41'),('134.35.219.246',2,'2021-10-24 22:42:23'),('134.35.219.49',29,'2021-10-22 17:23:48'),('134.35.220.24',1,'2021-12-25 03:29:14'),('134.35.228.195',6,'2021-10-25 20:18:55'),('134.35.230.157',1,'2021-10-22 20:23:26'),('134.35.232.11',1,'2021-10-23 00:25:26'),('134.35.234.68',3,'2021-09-12 22:34:34'),('134.35.234.71',1,'2021-11-13 21:30:30'),('134.35.236.216',10,'2021-10-21 19:47:07'),('134.35.237.24',4,'2021-10-24 22:53:11'),('134.35.238.202',1,'2021-09-22 19:44:29'),('134.35.238.42',1,'2021-11-24 13:13:47'),('134.35.240.201',3,'2022-02-04 23:04:11'),('134.35.25.91',2,'2021-10-29 21:50:57'),('134.35.251.162',1,'2021-09-10 06:17:59'),('134.35.252.126',1,'2021-10-11 22:35:48'),('134.35.28.143',1,'2021-09-27 19:14:03'),('134.35.29.187',3,'2022-01-08 15:09:59'),('134.35.34.149',1,'2021-10-22 23:02:08'),('134.35.39.135',1,'2021-10-06 12:25:35'),('134.35.40.243',2,'2021-10-21 07:29:05'),('134.35.40.250',3,'2021-11-19 17:18:24'),('134.35.41.225',2,'2021-09-12 22:11:42'),('134.35.42.210',1,'2021-11-19 17:15:58'),('134.35.48.57',1,'2021-09-10 22:01:55'),('134.35.48.94',1,'2021-09-30 20:54:50'),('134.35.52.163',1,'2021-09-30 16:25:26'),('134.35.53.157',4,'2021-10-24 01:18:40'),('134.35.53.67',2,'2021-09-10 22:36:18'),('134.35.55.223',1,'2021-10-24 01:12:18'),('134.35.55.88',1,'2021-10-24 01:21:45'),('134.35.57.76',2,'2021-09-10 06:16:29'),('134.35.58.114',2,'2021-10-24 03:35:20'),('134.35.58.208',2,'2021-10-27 02:52:18'),('134.35.68.194',1,'2021-09-18 20:21:07'),('134.35.69.14',1,'2021-09-22 19:53:12'),('134.35.69.255',1,'2021-09-18 20:20:44'),('134.35.70.26',2,'2021-11-13 21:59:43'),('134.35.73.45',1,'2021-09-30 16:25:36'),('134.35.75.59',5,'2021-08-31 01:59:52'),('134.35.78.129',1,'2021-09-30 16:25:17'),('134.35.79.171',3,'2021-09-30 16:25:12'),('134.35.80.236',4,'2021-12-22 04:29:06'),('134.35.81.101',4,'2021-09-12 22:30:55'),('134.35.81.54',2,'2021-11-06 23:36:18'),('134.35.89.152',2,'2021-10-24 22:07:25'),('134.35.91.166',1,'2021-09-24 19:20:21'),('134.35.92.34',1,'2021-10-22 00:39:42'),('136.232.244.150',1,'2021-12-27 09:37:11'),('136.233.162.250',1,'2021-09-20 08:54:51'),('139.162.12.118',2,'2022-01-23 07:45:33'),('139.255.134.30',2,'2022-02-17 04:09:25'),('14.140.19.35',1,'2021-11-19 09:56:27'),('144.168.62.140',2,'2022-03-30 13:02:27'),('153.127.38.32',1,'2022-03-15 13:12:43'),('157.55.39.136',2,'2022-04-14 07:02:55'),('157.55.39.139',1,'2022-02-09 23:26:03'),('157.55.39.179',2,'2021-10-06 17:01:42'),('157.55.39.194',1,'2022-03-14 19:00:47'),('157.55.39.44',1,'2022-01-26 07:38:51'),('157.55.39.45',1,'2022-01-25 19:04:28'),('157.55.39.95',8,'2022-04-12 07:46:42'),('159.203.196.79',1,'2021-10-14 01:32:33'),('171.13.14.14',1,'2021-12-26 11:09:25'),('171.13.14.40',1,'2021-10-23 14:18:37'),('171.13.14.7',1,'2021-12-26 11:09:34'),('171.13.14.75',1,'2021-12-26 11:09:13'),('172.56.2.110',1,'2022-01-08 15:09:00'),('172.56.21.14',1,'2021-11-29 12:26:19'),('172.58.221.246',1,'2021-10-24 22:43:57'),('173.243.137.241',1,'2021-11-03 04:05:22'),('175.110.11.171',2,'2022-02-03 00:51:29'),('175.110.23.246',1,'2021-09-22 08:41:45'),('175.110.26.179',2,'2021-11-03 19:13:04'),('175.110.37.173',2,'2021-09-19 20:15:35'),('175.110.40.162',1,'2021-10-24 23:02:25'),('175.110.42.237',1,'2021-09-10 07:26:21'),('175.110.42.29',2,'2021-10-21 21:19:50'),('175.110.43.20',2,'2022-02-12 16:46:12'),('175.110.43.67',1,'2021-12-25 16:18:01'),('175.110.49.221',1,'2021-10-11 22:35:32'),('175.110.49.93',1,'2022-02-04 23:20:51'),('175.110.7.145',1,'2021-11-21 05:57:28'),('175.110.9.10',4,'2022-04-14 03:13:10'),('176.123.19.116',1,'2021-11-04 21:38:56'),('176.123.19.184',1,'2021-11-13 22:11:27'),('176.123.21.88',1,'2021-10-14 01:33:41'),('176.123.21.90',1,'2021-10-14 01:32:32'),('176.123.29.197',2,'2021-09-20 04:27:20'),('176.123.29.202',1,'2021-09-19 21:18:51'),('176.123.29.209',3,'2021-09-19 22:57:21'),('176.123.29.7',1,'2021-10-11 22:35:50'),('176.123.31.162',1,'2021-08-31 03:30:35'),('178.115.73.175',2,'2022-02-27 14:57:47'),('178.130.111.188',1,'2021-10-11 22:35:40'),('178.130.116.171',1,'2021-10-11 22:35:10'),('178.130.117.221',2,'2022-02-04 23:05:43'),('178.130.119.234',3,'2021-10-21 21:57:53'),('178.130.122.35',4,'2022-02-04 22:23:55'),('178.130.122.38',1,'2022-02-04 23:37:25'),('178.130.124.207',1,'2022-02-03 05:01:49'),('178.130.126.76',1,'2021-09-30 20:57:14'),('178.130.64.80',1,'2021-10-29 12:12:17'),('178.130.70.71',1,'2022-02-04 23:19:25'),('178.130.87.26',1,'2021-09-10 06:24:11'),('178.130.91.155',1,'2021-09-10 22:30:09'),('178.130.97.96',4,'2021-12-19 00:05:41'),('178.195.24.174',1,'2021-10-09 06:27:14'),('18.184.195.40',1,'2021-12-10 08:42:16'),('18.184.203.224',1,'2021-12-10 08:14:25'),('18.222.30.32',1,'2022-01-31 21:52:43'),('18.224.140.158',1,'2022-04-13 21:03:43'),('180.163.220.3',2,'2022-03-10 02:56:26'),('180.163.220.5',1,'2021-10-26 02:08:10'),('180.163.220.66',3,'2022-03-17 06:46:34'),('180.254.76.74',1,'2021-10-29 20:48:51'),('185.107.106.85',1,'2021-09-27 06:55:19'),('185.154.20.58',2,'2022-01-28 11:28:39'),('185.253.42.171',1,'2021-11-28 07:34:27'),('185.80.140.100',1,'2021-11-08 12:04:50'),('185.80.140.111',21,'2021-10-22 09:05:12'),('185.80.140.115',1,'2021-10-28 03:05:41'),('185.80.140.136',4,'2021-10-24 15:15:26'),('185.80.140.144',4,'2022-03-03 19:45:12'),('185.80.140.148',3,'2021-10-25 05:46:31'),('185.80.140.157',2,'2021-10-18 23:21:37'),('185.80.140.165',5,'2021-11-21 00:21:08'),('185.80.140.207',3,'2021-12-08 22:09:52'),('185.80.140.21',2,'2021-09-10 20:08:49'),('185.80.140.22',5,'2021-10-23 23:37:57'),('185.80.140.4',3,'2021-08-31 01:32:37'),('185.80.140.84',4,'2021-10-24 23:34:17'),('185.80.140.97',6,'2021-10-12 22:58:28'),('185.87.148.103',1,'2022-03-15 23:19:39'),('187.85.18.113',1,'2022-04-05 10:19:31'),('187.85.19.60',1,'2022-04-04 18:10:49'),('188.209.229.172',2,'2021-09-05 00:53:52'),('188.209.230.208',1,'2021-11-03 18:56:17'),('188.209.232.203',1,'2021-10-22 07:16:21'),('188.209.234.165',1,'2021-10-13 21:37:26'),('188.209.235.4',1,'2021-09-01 06:23:51'),('188.209.237.1',1,'2021-10-22 09:48:11'),('188.209.237.214',2,'2021-10-22 08:09:29'),('188.209.240.147',1,'2021-09-22 08:41:46'),('188.209.240.39',5,'2021-09-06 06:34:06'),('188.209.248.27',3,'2021-09-12 22:31:26'),('188.209.249.225',2,'2021-09-03 23:11:08'),('188.209.251.167',1,'2021-12-22 14:46:31'),('188.240.100.100',1,'2021-09-18 20:20:59'),('188.240.101.39',1,'2021-08-31 01:51:05'),('188.240.104.171',1,'2021-11-04 20:39:13'),('188.240.107.116',1,'2021-10-22 01:21:59'),('188.240.109.50',5,'2021-10-25 13:57:51'),('188.240.110.170',1,'2021-10-29 05:21:53'),('188.240.116.197',1,'2021-11-05 18:57:45'),('188.240.125.25',2,'2021-10-07 15:11:01'),('188.240.127.235',3,'2021-10-20 22:55:03'),('188.240.97.10',1,'2021-10-12 21:15:14'),('188.240.98.223',3,'2021-12-25 03:44:56'),('188.240.98.244',1,'2021-09-18 20:23:57'),('188.241.83.109',1,'2022-02-25 02:21:33'),('192.140.225.106',2,'2022-03-31 02:27:25'),('192.187.21.11',1,'2021-12-10 08:42:18'),('192.227.65.197',1,'2022-02-22 06:17:28'),('193.190.253.145',3,'2021-11-11 11:04:30'),('193.41.119.178',2,'2022-01-03 06:08:39'),('194.30.200.98',2,'2021-09-27 07:49:13'),('195.12.177.134',1,'2021-11-29 12:25:16'),('195.136.170.10',2,'2021-12-03 12:53:55'),('195.175.206.174',1,'2021-12-24 12:36:43'),('195.208.109.101',1,'2022-03-28 13:22:59'),('196.151.8.112',2,'2022-02-20 14:56:22'),('197.206.165.239',1,'2021-12-26 18:21:19'),('198.244.181.230',1,'2022-03-02 23:32:00'),('199.127.56.236',3,'2022-02-18 20:48:31'),('2001:16a2:dd6a:1100:8ac:9',1,'2021-12-01 07:52:28'),('2001:861:3040:8d90:1854:2',1,'2021-11-06 10:19:35'),('205.169.39.144',2,'2021-11-05 07:33:01'),('206.166.236.150',1,'2022-02-07 19:22:36'),('207.241.233.150',1,'2022-03-04 00:50:23'),('207.46.13.108',5,'2022-04-06 04:13:38'),('207.46.13.113',1,'2022-01-19 04:08:59'),('207.46.13.115',1,'2022-02-28 20:49:06'),('207.46.13.128',2,'2022-03-13 11:57:49'),('207.46.13.26',2,'2022-02-20 15:20:26'),('207.46.13.62',3,'2021-10-07 18:30:03'),('207.46.13.96',2,'2022-03-19 09:47:08'),('210.179.237.212',7,'2021-11-26 08:16:02'),('210.179.31.2',1,'2021-10-18 02:09:46'),('211.169.234.21',2,'2021-09-28 01:08:07'),('211.178.238.17',3,'2021-09-06 06:39:22'),('212.147.19.148',5,'2021-11-19 10:40:57'),('213.204.106.157',2,'2021-10-20 10:56:46'),('213.246.14.117',2,'2021-12-25 03:35:37'),('213.246.15.180',1,'2021-11-01 14:14:52'),('213.246.23.151',1,'2021-09-13 02:32:38'),('213.246.26.26',4,'2021-10-20 22:55:18'),('213.246.28.68',1,'2021-10-20 09:22:41'),('213.246.30.57',1,'2021-08-31 03:31:19'),('213.246.31.59',2,'2021-10-29 21:56:24'),('216.218.223.53',1,'2021-12-15 04:57:49'),('218.145.245.23',6,'2021-10-15 09:31:55'),('219.92.24.152',1,'2021-11-11 08:29:13'),('220.64.100.0',1,'2022-02-07 14:39:29'),('221.246.14.7',3,'2022-01-13 00:53:51'),('222.103.2.50',1,'2021-10-25 00:11:49'),('222.99.111.10',7,'2022-04-05 07:33:48'),('223.178.209.192',1,'2021-10-18 05:01:42'),('223.178.210.128',2,'2021-10-29 06:49:56'),('223.178.211.2',1,'2022-01-08 07:24:44'),('2401:4900:1c18:7187:a9e8:',1,'2021-12-10 06:11:51'),('2409:4041:68c:feca:7e7:71',1,'2022-02-15 08:27:04'),('2600:1900:2001:2::1c',1,'2021-11-03 00:23:38'),('27.115.124.109',1,'2021-10-23 10:27:52'),('27.115.124.38',3,'2022-03-10 01:51:37'),('27.115.124.45',1,'2022-03-10 02:49:24'),('27.115.124.6',1,'2021-12-23 07:42:27'),('27.115.124.70',3,'2022-03-10 01:52:25'),('2a01:4f8:191:8463::2',1,'2022-04-15 08:25:22'),('2a01:4f9:2a:22ea::2',2,'2021-10-28 18:41:26'),('2a01:4f9:4b:3f96::2',1,'2022-04-12 04:50:13'),('2a01:e0a:56d:440:59b:abc5',1,'2022-04-06 19:02:13'),('2a02:1388:99:b99a:748e:70',1,'2022-02-13 10:11:31'),('2a02:9b0:10:a75e:5d36:f0a',1,'2021-11-09 16:09:56'),('2a02:9b0:1e:f211:d37:b038',1,'2021-11-27 18:05:13'),('2a02:c207:2022:3823::1',4,'2022-01-20 13:43:47'),('2a03:2880:10ff:78::face:b',1,'2022-03-17 02:53:48'),('2a03:2880:10ff:e::face:b0',1,'2022-03-12 12:46:04'),('2a03:2880:11ff:10::face:b',1,'2021-11-06 18:00:39'),('2a03:2880:11ff:7::face:b0',1,'2021-11-06 18:00:40'),('2a03:2880:21ff:17::face:b',1,'2021-11-01 14:13:11'),('2a03:2880:21ff:9::face:b0',1,'2021-11-01 14:13:11'),('2a03:2880:23ff:2::face:b0',1,'2022-03-16 11:21:07'),('2a03:2880:23ff:3::face:b0',1,'2021-11-04 07:10:44'),('2a03:2880:23ff:8::face:b0',1,'2022-03-16 11:21:06'),('2a03:2880:23ff:c::face:b0',1,'2022-03-16 11:21:07'),('2a03:2880:27ff:5::face:b0',1,'2022-03-27 09:14:08'),('2a03:2880:27ff:c::face:b0',1,'2022-03-27 09:14:08'),('2a03:2880:30ff:13::face:b',1,'2022-01-14 08:25:51'),('2a03:2880:30ff:78::face:b',1,'2022-01-14 08:25:53'),('2a03:2880:31ff:1::face:b0',1,'2021-12-19 07:24:21'),('2a03:2880:31ff:1b::face:b',1,'2021-12-19 07:24:21'),('2a03:2880:31ff:78::face:b',1,'2022-03-28 11:55:02'),('2a03:2880:31ff:f::face:b0',1,'2022-03-28 11:55:02'),('2a03:2880:32ff:15::face:b',1,'2022-01-12 13:04:29'),('2a03:2880:32ff:74::face:b',1,'2022-01-12 13:04:31'),('2a03:4000:5b:75c:e448:2df',1,'2022-03-06 14:34:09'),('3.133.155.235',1,'2021-09-30 11:53:51'),('3.135.209.57',1,'2021-10-20 11:31:01'),('3.139.86.64',1,'2021-11-30 10:14:43'),('3.14.127.143',1,'2021-10-11 02:22:26'),('3.141.19.129',1,'2021-10-04 02:29:26'),('3.144.82.20',1,'2022-03-06 21:52:21'),('3.21.39.92',1,'2021-12-31 10:07:23'),('31.13.127.10',1,'2021-09-27 19:48:56'),('31.13.127.11',1,'2021-09-27 19:48:48'),('31.13.127.22',1,'2021-09-27 19:48:56'),('31.13.127.4',1,'2021-09-27 19:48:56'),('31.13.127.41',1,'2021-09-27 19:48:49'),('31.31.178.66',2,'2021-11-09 15:33:54'),('31.31.188.198',3,'2021-11-06 23:39:20'),('31.31.190.249',1,'2022-02-18 08:59:28'),('34.121.26.164',1,'2022-02-09 01:27:32'),('34.219.209.150',1,'2022-03-22 14:28:56'),('34.223.90.126',1,'2021-09-26 00:09:26'),('34.246.178.113',1,'2021-12-10 08:42:15'),('35.187.132.10',1,'2021-11-03 00:23:48'),('35.187.132.17',2,'2021-11-03 00:23:50'),('35.210.169.239',1,'2022-04-15 17:06:04'),('35.86.34.116',1,'2022-03-01 15:47:02'),('35.87.127.87',1,'2022-01-27 02:58:08'),('35.88.55.138',1,'2021-12-24 09:21:35'),('38.108.182.5',2,'2021-11-03 01:32:26'),('38.18.37.41',1,'2022-03-16 13:51:52'),('38.18.48.179',1,'2022-01-14 22:39:32'),('39.175.221.250',2,'2022-02-17 12:35:06'),('40.77.167.0',2,'2022-01-10 22:59:39'),('40.77.167.53',1,'2022-01-28 14:07:03'),('40.77.167.6',1,'2022-02-21 04:19:19'),('40.77.167.66',1,'2021-11-22 10:56:21'),('40.77.167.7',1,'2022-03-14 19:00:40'),('41.187.114.4',1,'2021-12-31 19:57:27'),('41.200.85.147',1,'2021-12-27 16:20:01'),('42.236.10.106',1,'2021-10-23 10:25:39'),('42.236.10.114',1,'2021-10-30 03:39:33'),('42.236.10.117',1,'2021-10-23 10:29:15'),('42.236.10.75',4,'2021-12-25 15:34:01'),('42.236.10.78',1,'2021-12-25 15:34:42'),('42.236.10.84',1,'2022-02-16 05:20:11'),('43.130.48.158',1,'2022-02-28 15:23:47'),('44.234.252.145',1,'2022-01-31 05:18:21'),('44.242.170.38',1,'2021-10-29 09:04:30'),('45.128.160.157',5,'2022-04-07 18:35:46'),('45.190.197.216',1,'2021-12-01 21:02:10'),('45.48.129.55',2,'2022-04-11 22:49:26'),('46.161.238.18',1,'2021-09-11 01:03:17'),('46.161.244.221',1,'2022-02-04 22:07:02'),('46.197.5.23',1,'2021-12-16 08:36:21'),('46.35.71.216',1,'2021-09-22 19:56:50'),('46.35.93.108',5,'2021-09-22 16:07:32'),('46.35.94.158',1,'2021-10-21 05:10:09'),('46.35.95.125',1,'2021-10-04 16:17:12'),('49.36.192.180',1,'2022-02-06 09:45:40'),('5.255.15.123',1,'2022-02-04 22:05:52'),('5.255.19.5',2,'2022-02-04 22:23:52'),('5.255.31.110',1,'2021-10-14 01:35:10'),('5.31.210.24',1,'2022-02-06 18:35:54'),('51.158.120.252',1,'2022-04-02 03:27:57'),('51.158.120.47',1,'2022-04-02 03:17:42'),('51.77.92.157',1,'2021-11-03 01:31:55'),('51.83.214.114',1,'2021-11-03 01:28:30'),('54.189.30.132',1,'2021-12-26 16:42:01'),('58.123.220.11',1,'2021-09-28 01:08:09'),('61.216.69.157',3,'2022-02-11 01:28:37'),('62.210.38.37',2,'2021-10-26 19:45:58'),('63.171.19.152',1,'2021-09-30 20:00:10'),('64.120.109.123',1,'2021-10-10 07:55:58'),('65.154.226.165',5,'2022-02-21 00:16:42'),('65.155.30.101',1,'2021-11-03 01:25:22'),('66.102.9.6',1,'2022-03-10 14:13:40'),('66.102.9.9',1,'2022-03-10 14:13:40'),('66.249.64.180',2,'2021-11-24 08:15:02'),('66.249.64.182',3,'2021-11-09 10:33:32'),('66.249.64.184',1,'2021-11-01 22:45:58'),('66.249.64.191',1,'2021-11-08 03:02:14'),('66.249.64.192',11,'2022-03-06 09:07:05'),('66.249.64.201',3,'2021-10-04 09:33:51'),('66.249.64.203',4,'2021-10-16 22:09:23'),('66.249.64.205',2,'2021-10-12 23:00:48'),('66.249.64.221',20,'2022-03-09 07:45:55'),('66.249.64.223',15,'2022-03-09 04:12:11'),('66.249.64.41',1,'2021-10-12 23:08:39'),('66.249.64.45',1,'2021-10-12 23:08:30'),('66.249.65.160',1,'2021-12-25 00:24:52'),('66.249.66.1',6,'2022-01-12 08:35:18'),('66.249.66.13',1,'2021-09-21 08:21:58'),('66.249.66.155',4,'2022-01-12 20:50:24'),('66.249.66.156',3,'2022-01-06 11:41:47'),('66.249.66.157',3,'2022-01-13 14:57:58'),('66.249.66.158',3,'2022-01-14 00:38:21'),('66.249.66.159',1,'2021-12-02 16:45:14'),('66.249.66.192',4,'2022-01-06 21:59:11'),('66.249.66.195',1,'2021-12-02 16:47:02'),('66.249.66.20',19,'2022-04-12 08:56:02'),('66.249.66.207',1,'2022-01-10 17:29:33'),('66.249.66.209',2,'2022-01-14 09:44:44'),('66.249.66.212',5,'2021-12-26 11:21:41'),('66.249.66.214',1,'2021-11-19 19:39:16'),('66.249.66.216',1,'2021-11-28 05:37:04'),('66.249.66.22',13,'2022-03-20 22:08:02'),('66.249.66.221',2,'2021-12-24 03:23:38'),('66.249.66.223',5,'2022-01-07 06:25:29'),('66.249.66.24',9,'2022-04-11 01:05:58'),('66.249.66.29',4,'2022-01-09 16:51:36'),('66.249.66.31',8,'2022-01-14 23:09:40'),('66.249.66.32',6,'2022-04-11 00:49:12'),('66.249.66.35',9,'2022-04-13 06:57:29'),('66.249.66.63',7,'2022-04-13 06:13:47'),('66.249.66.73',10,'2022-01-12 00:39:38'),('66.249.66.74',2,'2022-01-13 06:33:11'),('66.249.66.75',3,'2021-12-24 03:14:58'),('66.249.66.9',1,'2021-09-20 16:45:24'),('66.249.66.93',3,'2022-01-06 23:57:30'),('66.249.66.94',2,'2021-12-22 21:22:21'),('66.249.66.95',4,'2022-01-14 23:13:59'),('66.249.69.150',1,'2022-01-19 16:05:10'),('66.249.70.1',1,'2021-10-25 17:22:56'),('66.249.70.13',2,'2021-10-07 13:37:16'),('66.249.70.15',2,'2021-10-01 19:37:02'),('66.249.70.17',2,'2021-10-07 12:47:05'),('66.249.70.23',1,'2021-09-27 09:12:23'),('66.249.70.29',1,'2022-03-18 03:58:19'),('66.249.70.31',1,'2021-10-25 17:13:56'),('66.249.70.32',3,'2022-04-07 23:08:48'),('66.249.70.52',15,'2022-04-07 05:09:34'),('66.249.70.54',16,'2022-04-07 23:27:28'),('66.249.70.56',19,'2022-04-05 14:08:23'),('66.249.70.61',3,'2022-04-08 04:16:04'),('66.249.70.63',2,'2022-04-07 18:03:37'),('66.249.75.148',4,'2022-01-22 17:39:50'),('66.249.75.150',3,'2022-01-21 21:51:37'),('66.249.75.152',1,'2022-01-21 12:10:39'),('66.249.75.30',1,'2022-01-20 19:44:10'),('66.249.75.32',2,'2022-01-23 08:23:34'),('66.249.75.35',2,'2022-01-21 05:41:25'),('66.249.75.63',3,'2022-01-22 04:16:38'),('67.227.77.227',1,'2021-12-16 11:22:48'),('67.234.33.132',1,'2022-04-05 16:59:07'),('69.160.160.50',2,'2021-11-30 20:22:50'),('69.160.160.58',2,'2022-02-15 09:33:40'),('77.252.106.57',2,'2021-10-21 11:18:53'),('78.137.64.117',1,'2021-09-30 19:14:58'),('78.137.68.132',3,'2021-09-19 21:29:06'),('78.137.85.14',2,'2021-09-23 20:24:44'),('78.137.86.151',1,'2021-10-27 23:05:49'),('78.137.90.168',1,'2021-10-04 16:16:51'),('78.137.90.86',1,'2022-01-29 16:30:58'),('78.57.0.254',1,'2021-11-30 07:16:31'),('79.116.22.227',2,'2021-12-10 08:13:00'),('80.245.21.67',2,'2022-03-25 10:24:10'),('80.253.180.214',1,'2021-11-05 18:18:01'),('80.253.186.200',4,'2021-09-12 22:17:04'),('80.253.189.27',3,'2021-09-12 22:18:17'),('81.26.200.212',3,'2022-03-15 15:35:18'),('81.45.139.68',1,'2021-12-03 08:49:21'),('81.60.173.183',3,'2021-11-05 10:15:13'),('81.91.25.145',6,'2021-08-31 02:12:23'),('82.114.163.196',1,'2022-02-02 22:59:45'),('82.114.163.197',1,'2021-10-24 22:42:26'),('82.114.163.198',1,'2021-09-23 20:21:34'),('82.114.163.229',1,'2021-09-12 22:09:53'),('82.114.163.230',2,'2022-01-08 15:08:05'),('82.114.174.20',1,'2021-11-05 16:55:10'),('82.114.187.72',1,'2021-10-27 02:24:43'),('82.114.189.121',1,'2021-11-13 02:51:30'),('82.135.244.166',1,'2021-11-29 12:25:13'),('82.188.210.210',1,'2021-11-29 08:58:25'),('82.218.176.13',3,'2021-10-04 15:15:22'),('85.58.98.31',2,'2021-11-26 08:02:32'),('86.51.24.4',1,'2021-12-01 07:52:30'),('87.201.206.174',1,'2021-11-21 12:11:59'),('87.237.19.7',1,'2022-02-17 12:35:08'),('87.241.188.118',2,'2022-02-11 15:08:19'),('89.175.195.98',7,'2021-10-08 06:47:54'),('89.189.80.205',1,'2021-11-05 18:20:34'),('89.189.92.85',1,'2021-10-04 16:07:45'),('89.189.93.209',4,'2021-12-04 02:45:15'),('91.114.65.179',4,'2021-12-27 12:11:19'),('94.142.141.230',3,'2021-09-28 18:46:07'),('94.26.194.22',1,'2021-12-25 03:39:50'),('94.26.199.175',1,'2021-10-25 23:03:21'),('94.26.200.106',2,'2022-04-15 22:07:36'),('94.26.200.7',1,'2021-09-27 16:26:41'),('94.26.204.138',1,'2022-04-15 21:45:09'),('94.26.217.205',2,'2021-09-05 01:06:14'),('94.26.219.22',3,'2021-09-02 02:38:44'),('94.26.221.220',6,'2021-10-24 21:55:38'),('94.26.221.248',3,'2022-01-18 23:06:18');
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'6176ca9bb5400.png','6176cab4ca9d7.jpg','WHITE & BEAUTYSpot lightening cream  ','        ,كريم التفتيح لتقليل لون البشرة غير المتكافئ والبقع البنية  النمش خاصة على الوجه وخط العنق والظهر واليدين. يقلل من رؤية الظلال ، ويعيد التوهج الصحي و يوحد لون البشرة. في الوقت نفسه ، يحسن الترطيب والتشحيم ويغذي البشرة وينعمها بشكل مثالي','   Lightening compiex - etiolion 5Shea butter 3  Vitamin E  0.25','Cosmetic','cream',' 50 ml','',14,'2021-04-02 01:55:35','2021-10-25 15:18:45',1,1),(2,'6175d57e6662d.jpg','6175d5bed3eae.jpg','Biotin Forte','The product helps to maintain hair in good condition, strengthens it and restores a healthy, shiny look. Biotin supplementation is especially recommended for:weak, brittle and hair falling outhair without gloss, dull, damaged by hairdressingbrittle, split nailsdull, gray complexion, devoid of radiance.',' Biotin10 mgCopper1 mgZinc10 mgSilicon10 mgVitamin C100 mgL-Cysteina100 mgMSM100 mg','Other','capsules ','30 capsules','10 mg',10,'2021-04-02 02:23:53','2021-10-24 21:53:02',1,1),(3,'6175d2c6825a4.jpg','6175d3527f4a7.jpg','Relumins Advance Vitamin C - MAX Skin Whitening Complex with Rose Hips and Bioflavonoids ','   it has been specially developed to enhance the effectiveness of skin lightening by providing targeted nutritional support. This formula features a combination of highly bio-available vitamin C skin conditioner, antioxidants, herbs, and vitamins commonly used to brighten skin.Vitamin C:Rose hips and ascorbate are antioxidant forms of vitamin C. They help lighten skin tone by inhibiting melanin production.Calcium Calcium Ascorbate Complex:This essential nutrient plays a critical role in collage','Rose hips and ascorbateCalcium Calcium Ascorbate ComplexCalcium ThreonateQuercetin bioflavonoidHesperedinCitrus bioflavonoids','Other','capsules ','180 capsules ','1 gm',1,'2021-04-02 02:26:14','2021-10-24 21:42:42',1,1),(4,'6176c505d9e95.jpg','6171e663b9291.jpg','collagen up','    يحفز انتاج الكولاجين والايستين ببالبشرة   يحسن مرونة الجلد   ترطيب البشرة  تقليل التجاعيد  مقاوم للشيخوخه ','   rye extract and caffeine stimulate skin cells for production ofelastin and collagen, reduce wrinkles and intensely moisturize.','Other','SERUM ','30ml','',14,'2021-04-16 23:46:17','2021-10-25 14:54:13',1,1),(5,'61270c550cf2f.jpg','','GLUTA Slim','     يحتوي على مجموعه متكامله من المكونات الطبيعيه الخاصه بالتخسيس وتبيض البشرةتقليل الشعور بالجوع حرق الدهون المتراكمة في الجسممنع تخزين الدهون الأضافية والتخلص من الترهلاتتعزيز مستويات الطاقه من خلال تسريع عملية الأيض تبيض البشرة ومضاد للأكسدةتحسين المزاج العام',' L-GlutathioneGreen Coffee Bean Extract Raspberry KetoneGreen Tea ExtractGarcinia Cambodia ExtractGriffonia Simplicifolia Seed Extract 5-HTPBitter Orange Powder','Cosmetic','Capsules','90 Capsules','',1,'2021-05-03 21:18:55','2021-10-23 23:00:15',1,1),(6,'6172f0b70d542.jpg','6172f0d08f4e6.jpg','Revive Lashes Enhancing Serum',' سيروم تقوية الرموش من  FloslekRevive Lashes Enhancing Serum ReviveLashes علاج متطور للحصول على رموش طويلة، جميلة، وصحية. تحفز نمو الرموش والحواجب حيث أن لها تأثير مطول ومكثف.تصبح الرموش داكنة، لامعة، و أقل عرضة للتساقط كما ان هذا المستحضر لايسبب أي تحريش للعين أو للبشرة تحت العينين.طريقة الاستخدام: ✔️  ضعي كمية قليلة من المستحضر علىالجفون النظيفة والجافة  بعد ازالة المكياج والغسيل بالماء مع تمريره على خطالرموش. ضعي المستحضر على الجفن العلوي والحواجب. يستخدم مرة واحدةيوميا قبل النوم. يجب غسل ',' BIMALASH COMPLEXnfluences the extension of the hair growthphase. With long-term use, it provides noticeable effects of lengtheningand thickening eyelashes.Eyebright extract - extract obtained from the herb Euphrasia Officinalis.Eyebright is an annual pla','Cosmetic','SERUM','5ML','more',14,'2021-05-28 00:48:34','2021-10-22 17:12:08',1,1),(7,'6175d6d94495f.jpg','','Collagen BEAUTY 30 caps','Collagen BEAUTY Activlab Pharma هو منتج تم تطويره مع وضع النساء في الاعتبار. هذا هو الدعم المثالي للبشرة  والحماية من علامات الشيخوخة .يحتوي على 200 مجم من الكولاجين البحري عالي الجودة ، والذي يمكنه تحسين تماسك البشرة ومرونتها. يدعم البيوتين الشعر والجلد. يدعم فيتامين سي الموجود في المنتج تخليق الكولاجين الطبيعي وهو أحد مضادات الأكسدة القوية التي تحمي البشرة من الجذور الحرة. تظهر الأبحاث أن الجذور الحرة تلحق الضرر بالبنى الداخلية للجلد ، مما يؤدي إلى شيخوخة الجلد المبكرة.','  Hydrolyzed Marine Collagen200mg L-cysteine100mg Hyaluronic acid10mg Biotin2,5mg5000Riboflavin1,4mg100Niacin16mg100Vitamin A800mg100Vitamin E12mg100Vitamin C80mg100Zinc10mg100Iodine150mg100Silicon10mg','Other','capsules ','30 capsules','',10,'2021-04-02 01:55:35','2021-10-26 22:19:24',1,1),(8,'60db30425fd91.jpg','6171ecce1d823.jpg','  White&Beauty Spot Lightening cream','   علاج التصبغات والبقع الملونه والكلف والنمش     عناية ممتازه للبشرة لاحتوائيه على عنصر ETIOLINE المثبت علميا بعلاج هذه الأمراض  يوحد لون البشرة  يحسن ترطيب وتغذية البشرة','    Lightening Compiex-Etioline-5         Shea Butter 3           Vitamin E 0.25 ','Other','cream','50ml','',14,'2021-04-16 23:46:17','2021-10-25 15:19:53',1,2),(9,'6176e305c8da3.jpg','6176c4cdd403f.jpg','Anti-Spot Cream - Gel SPF 50','  اقي شمس مفتح ومبيض مع عامل حماية.يستخدم لحماية البشرة المعرضه للتصبغات والبقع الداكنة و الندوب ،لإحتوائه علي مواد فعاله في علاج التصبغات،حيث تتغلغل داخل طبقات البشرة فتعمل علي انقاص مادة الميلانين المتسببه في افراط التصبغات.','   Lipoamino acid combined with a water-lily extractVitamin E UV filters Panthenol provitamin B5','Cosmetic','cream','30ml','',14,'2021-05-03 21:18:55','2021-10-25 17:02:07',1,1),(10,'60db3061b1822.jpg','60db2e9c78a8c.jpg','WHITE & BEAUTY® Lightening acid peel night care ','حمض المندليك وحمض الأزاليك -  التقشير. يمنع  من ظهور التصبغات ، وتوحيد لون البشرة. ايتولين مركب نباتي نشط له تأثير ساطع على تغير اللون.وتفتييح البشرة اليوريا - يرطب البشرة تمامًا.دواعي الإستعمال:توحيد لون البشرة  ، النمش و الكلف  ،التصبغات الناتجة عن التعرض  للشمس.',' Mandelic acid Azealic acidEtiolineUrea','Cosmetic','','30 ml','',14,'2021-04-02 02:23:53','2021-10-24 21:29:18',1,1),(11,'6172f2917df7c.jpg',NULL,'REVITA C SERUM ','   للعناية المكثفة بالفيتامين للبشرة الناضجة حول العينين والعنق حيث تظهر إشارات فقدان المطاطية والاشتداد والجفاف .الفيتامين سي الفعال يحفز انقسام الخلايا ويجدد البشرة بعمق ويجنب الشيخوخة الناتجة عن الضوء .الريتينول النباتي يحسن مطاطية البشرة واشتدادها ويخفف ظهور التجاعيد والهالات السوداء .يوفر ترطيب طويل الأمد ويجنب خسارة الماء Fucogel ® .والانتفاخ التأثير :بشرة مرطبة بشكل مناسب مطاطية ومشدودة من دون تجاعيد عميقة وهالات سوداء وانتفاخ. طريقة الاستعمال :ضعي المركز على البشرة حول العينين وعلى العنق','  1-Active form of vitamin C Bi-layer Capsule C2-Retinol 3- Fucogel ','Cosmetic','SERUM ','30 ml','',14,'2021-10-19 16:41:42','2021-10-22 17:19:26',1,1),(12,'6176e38abb3b9.jpg','6176e3c794e7a.jpg','ANTI ACNE Antibacterial face cleansing gel ','  ينظف البشرة ويرطبها  يزيل الرؤوس السوداء يعمل على انقباض الغدد الدهنية  في البشرة أي يعمل على تقليل افراز الدهون ويحافظ على توازن البشرةمضاد للبكتريا ومقشر ويقلص من حجم المسامات الواسعه','  Seboregulating Complex 0.5          Polyplant oily 1           lamesoft 4   ','Cosmetic','cleansing','200ml','',14,'2021-10-20 12:30:05','2021-10-25 17:05:17',1,1),(13,'6172f1baa0297.jpg','6172f1d2145ea.jpg','Mattifying cream','   كريم ينقص من لمعان البشرة  الناتج من الافرازات الدهنيةيعمل على تقليص حجم المسام وتنقيتها وامتصاص الدهونمضاد للبكتريا ويعمل على تجديد خلايا البشرة ويقلل من ظهور الحبوب بنسبة 90','  Aqua, Ethylhexyl Stearate, Hydroxyethyl Acrylate/Sodium Acryloyldimethyl Taurate Copolymer, Squalane, Glycerin, Polysorbate 60, Niacinamide, Faex Extract, Aesculus Hippocastanum Seed Extract, Ammonium Glycyrrhizate, Panthenol,  Zinc Gluconate, Caffeine,','Cosmetic','cream','50ml','',14,'2021-10-20 12:52:49','2021-10-22 17:16:09',1,1),(14,'6176c58e2a25d.jpg',NULL,'Intense gel','  جل مخصص لمعالجة الحبوب والبثور والألتهابات التى تتعرض لها البشرة الدهنية ويعمل على تجديد الخلايا','  Aqua, Alcohol Denat., Ceteareth-12, Carbomer, Candida Bombicola/Glucose/Methyl Rapeseedate Ferment,  Niacinamide, Faex Extract, Aesculus Hippocastanum Seed Extract, Ammonium Glycyrrhizate, Panthenol, Propylene Glycol, Zinc Gluconate, Caffeine, Biotin, A','Cosmetic','gel','20ml','',14,'2021-10-21 18:49:50','2021-10-25 14:56:55',1,1),(15,'6171bded1706b.jpg',NULL,'Revive Nails','  أعادة بناء الأظافر والعناية بالأظافر الرقيقة والضعيفة والتالفه يجعل صفيحة الظفر أكثرصلابه سمكاومقاومة للتكسر يمنع ظهور التصبغات على الأظافر ويعطي لمعه',' Glycerin, Prunus Amygdalus Dulcis Oil, Pentylene Glycol, Ricinus Communis Seed Oil, Caprylic/Capric Triglyceride,  PEG-60 Almond Glycerides, Tocopheryl Acetate, Shea Butter Ethyl Esters, Octyldodecyl PCA, Helianthus Annuus Seed Oil, Cocos Nucifera Oil, L','Cosmetic','oli','8ml','',14,'2021-10-21 19:22:21','2021-10-22 17:12:59',1,1),(16,'6171c9947d995.jpg',NULL,'Dr Stopa','  اقدام ناعمة ومرنة وأقل عرضة للتقشر المفرط',' Aqua, Urea, Glyceryl Stearate, Paraffinum Liquidum, Propylene Glycol, Cetearyl Alcohol, Ceteareth-20, Isopropyl Myristate, Glycerin, Cetyl Dimethicone, Taurine, Lanolin, Aloe Barbadensis Leaf Juice, Dimethicone, Panthenol, Ceteareth-12, Cetyl Palmitate, ','Cosmetic','cream','100ml','',14,'2021-10-21 20:12:04','2021-10-22 17:12:35',1,1),(19,'6176cfd2d17aa.jpg','6176d006539bc.jpg','WHITE & BEAUTY  Hand Cream Anti-Aging  discolorations',' كريم يعمل على تفتيح اليدين وتوحيد لون الجلد و ترطيب االيدين  ويعمل على تجديد الجلد الميتيقلل ظهور التجاعيد',' Lightening Complex - Etioline 3Shea butter Vitamin Epanthenoi 0.5PEG','Medicin','cream','50ml','',14,'2021-10-25 15:40:02','2021-10-25 15:41:14',1,1);
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
INSERT INTO `slides` VALUES (6,'611fe6435fafd.jpg','Alaber Pharma ','                                                                                                                                                                                For importing','العابر فارما للاستيراد','                                                                                                                                                                    للادوية والمستلزمات والأجهزة الطبية ومستحضرات التجميل والعناية بالشعر والبشرة بأحدث ال','2021-10-24 01:34:14',1),(9,'611c61144f635.jpg','Alaber pharma ','For importing','العابر فارما فارما','للادوية والمستلزمات والأجهزة الطبية ومستحضرات التجميل والعناية بالشعر والبشرة بأحدث التقنيات الطبية','2021-10-24 01:27:07',1),(10,'6174b75f9f62a.png','Alaber pharma ','                                                                                                                           For importing','العابر فارما للاستيراد','                                            للادوية والمستلزمات والأجهزة الطبية ومستحضرات التجميل والعناية بالشعر والبشرة بأحدث التقنيات الطبية  ','2021-10-24 01:33:50',1);
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

-- Dump completed on 2022-04-15 22:12:20
