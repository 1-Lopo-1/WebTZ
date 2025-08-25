-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: localhost    Database: news
-- ------------------------------------------------------
-- Server version	8.0.43

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor`
--

LOCK TABLES `autor` WRITE;
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
INSERT INTO `autor` VALUES (1,'Евгений'),(2,'Петр'),(3,'Виталий'),(4,'Анатолий');
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_news`
--

DROP TABLE IF EXISTS `data_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_news` varchar(50) DEFAULT NULL,
  `text_preview` text NOT NULL,
  `full_text` text NOT NULL,
  `data_news` date DEFAULT NULL,
  `any_id` varchar(50) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_news`
--

LOCK TABLES `data_news` WRITE;
/*!40000 ALTER TABLE `data_news` DISABLE KEYS */;
INSERT INTO `data_news` VALUES (10,'Кошка стала главой департамента в японском городе','В японском городке Тиба','В японском городке Тиба, в поисках оригинальности и способа привлечь внимание к местным вопросам, на пост главы департамента по связям с общественностью назначили… кошку по имени Момо! Она, конечно, не занимается административной работой, но её очаровательные фотографии и статус помогают повысить узнаваемость города и привлекать туристов. Мы все мечтаем о таком карьерном старте!','2025-08-23',NULL,'Евгений'),(11,'Собака спасла своего хозяина от ограбления','В Лондоне собака по кличке Макс стала настоящим героем','В Лондоне собака по кличке Макс стала настоящим героем, когда заметила грабителя, пытающегося войти в дом её хозяев. К счастью, Макс оказался не только хорошим сторожем, но и настоящим защитником! После того как они устроили импровизированный “поединок” с грабителем, тот решил отступить. Похоже, Макс теперь будет получать бонусы в виде лакомств!','2025-08-23',NULL,'Анатолий'),(12,'В Индии мужчина посадил в саде целый лес','Интересная новость пришла из Индии','Интересная новость пришла из Индии: мужчина по имени Дхармеш Сингх за последние 30 лет посадил более 3 миллионов деревьев! Его действия помогли восстановить экосистему в его родном районе, и теперь он считается неофициальным героем экологии. Все хотят научиться его подходу — как за 30 лет создать «свой» лес.','2025-08-23','11','Виталий'),(13,'Австралийская курица с уникальной прической','Необычная курица с ярко выраженной и очень стильной прической','Необычная курица с ярко выраженной и очень стильной прической завоевала популярность в Австралии и за её пределами. Всеми любимая «петушка-стиляга» продолжает радовать своих поклонников в социальных сетях. Кажется, она не собирается уступать место ни одному хипстеру!','2025-08-23',NULL,'Петр'),(14,'Британец выиграл в лотерею… дважды!','Что может быть лучше, чем выиграть один раз в лотерею?','Что может быть лучше, чем выиграть один раз в лотерею? А вот британец по имени Саймон Ли доказал, что дважды — тоже возможно. Он стал обладателем двух крупных выигрышей на общую сумму 6 миллионов фунтов! Саймон сам не мог поверить в свою удачу и теперь планирует потратить деньги на путешествия и помощь благотворительным организациям.','2025-08-23','13','Виталий'),(25,'Норвегия и Швеция начинают соревноваться','В соцсетях обсуждают странную, но милую новость','В соцсетях обсуждают странную, но милую новость: в Норвегии и Швеции началась неофициальная конкуренция, кто из стран умеет лучше всего проводить новогоднюю ночь. Они обмениваются оригинальными рецептами праздничных блюд и даже устраивают онлайн-конкурсы по тому, кто украсит ёлку красивее. На первое место, похоже, претендует тот, кто приготовит самую необычную шведскую “гравлакс” или норвежский рисовый пудинг.','2025-08-23','12,13,14','Виталий');
/*!40000 ALTER TABLE `data_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'news'
--

--
-- Dumping routines for database 'news'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-08-25 17:00:26
