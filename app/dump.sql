-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: areas
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.16.04.2
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO,POSTGRESQL' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table "admin_menu"
--

DROP TABLE IF EXISTS "admin_menu";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "admin_menu" (
  "id" int(10) unsigned NOT NULL,
  "parent_id" int(11) NOT NULL DEFAULT '0',
  "order" int(11) NOT NULL DEFAULT '0',
  "title" varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  "icon" varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  "uri" varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  "permission" varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "admin_menu"
--

LOCK TABLES "admin_menu" WRITE;
/*!40000 ALTER TABLE "admin_menu" DISABLE KEYS */;
INSERT INTO "admin_menu" VALUES (1,0,1,'Dashboard','fa-bar-chart','/',NULL,NULL,'2019-11-22 09:56:41'),(2,0,2,'Admin','fa-tasks','',NULL,NULL,'2019-11-22 09:56:41'),(3,2,3,'Users','fa-users','auth/users',NULL,NULL,'2019-11-22 09:56:41'),(4,2,4,'Roles','fa-user','auth/roles',NULL,NULL,'2019-11-22 09:56:41'),(5,2,5,'Permission','fa-ban','auth/permissions',NULL,NULL,'2019-11-22 09:56:41'),(6,2,6,'Menu','fa-bars','auth/menu',NULL,NULL,'2019-11-22 09:56:41'),(7,2,7,'Operation log','fa-history','auth/logs',NULL,NULL,'2019-11-22 09:56:41'),(8,0,8,'News','fa-newspaper-o','/news','*','2019-11-22 08:46:59','2019-11-22 09:56:41'),(9,0,9,'infrastructures','fa-building','infrastructures','*','2019-11-22 09:03:16','2019-11-22 10:01:00'),(11,9,11,'Infrastructure Categories','fa-certificate','category-infrastructures',NULL,'2019-11-22 09:34:09','2019-11-22 10:03:12'),(12,0,12,'Gallery','fa-image','galleries','*','2019-11-22 09:45:36','2019-11-22 10:03:12'),(13,0,13,'Menu','fa-sitemap','menus','*','2019-11-22 09:56:16','2019-11-22 10:03:12'),(14,9,10,'Infrastructure Item','fa-institution','infrastructures','*','2019-11-22 10:03:11','2019-11-22 10:03:12'),(15,0,14,'Areas','fa-area-chart','areas','*','2019-11-22 10:27:02','2019-11-22 10:27:06'),(16,15,15,'Area Items','fa-cubes','areas','*','2019-11-22 10:51:31','2019-11-22 10:55:50'),(17,15,16,'Statuses','fa-dashcube','area-statuses','*','2019-11-22 10:55:39','2019-11-22 10:55:50'),(18,0,17,'Pages','fa-file-o','pages','*','2019-11-22 11:52:18','2019-11-22 11:52:47');
/*!40000 ALTER TABLE "admin_menu" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "admin_operation_log"
--

DROP TABLE IF EXISTS "admin_operation_log";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "admin_operation_log" (
  "id" int(10) unsigned NOT NULL,
  "user_id" int(11) NOT NULL,
  "path" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "method" varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  "ip" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "input" text COLLATE utf8mb4_unicode_ci NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id"),
  KEY "admin_operation_log_user_id_index" ("user_id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "admin_operation_log"
--

LOCK TABLES "admin_operation_log" WRITE;
/*!40000 ALTER TABLE "admin_operation_log" DISABLE KEYS */;
INSERT INTO "admin_operation_log" VALUES (1,1,'admin','GET','127.0.0.1','[]','2019-11-22 08:38:39','2019-11-22 08:38:39'),(2,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 08:41:22','2019-11-22 08:41:22'),(3,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 08:41:22','2019-11-22 08:41:22'),(4,1,'admin','GET','127.0.0.1','[]','2019-11-22 08:42:25','2019-11-22 08:42:25'),(5,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 08:42:31','2019-11-22 08:42:31'),(6,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 08:42:33','2019-11-22 08:42:33'),(7,1,'admin','GET','127.0.0.1','[]','2019-11-22 08:44:20','2019-11-22 08:44:20'),(8,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 08:44:25','2019-11-22 08:44:25'),(9,1,'admin','GET','127.0.0.1','[]','2019-11-22 08:44:41','2019-11-22 08:44:41'),(10,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 08:45:08','2019-11-22 08:45:08'),(11,1,'admin/auth/menu','POST','127.0.0.1','{\"parent_id\":\"0\",\"title\":\"News\",\"icon\":\"fa-newspaper-o\",\"uri\":\"\\/news\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\"}','2019-11-22 08:46:59','2019-11-22 08:46:59'),(12,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 08:46:59','2019-11-22 08:46:59'),(13,1,'admin/auth/menu','POST','127.0.0.1','{\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8}]\"}','2019-11-22 08:47:20','2019-11-22 08:47:20'),(14,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 08:47:20','2019-11-22 08:47:20'),(15,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 08:47:30','2019-11-22 08:47:30'),(16,1,'admin/news','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 08:47:33','2019-11-22 08:47:33'),(17,1,'admin/news/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 08:49:35','2019-11-22 08:49:35'),(18,1,'admin/news/create','GET','127.0.0.1','[]','2019-11-22 08:52:23','2019-11-22 08:52:23'),(19,1,'admin/news/create','GET','127.0.0.1','[]','2019-11-22 08:52:26','2019-11-22 08:52:26'),(20,1,'admin/news/create','GET','127.0.0.1','[]','2019-11-22 08:52:28','2019-11-22 08:52:28'),(21,1,'admin/news','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 08:52:30','2019-11-22 08:52:30'),(22,1,'admin/news/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 08:52:31','2019-11-22 08:52:31'),(23,1,'admin/news','POST','127.0.0.1','{\"name\":\"Foo\",\"description\":\"Bar\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/news\"}','2019-11-22 08:53:01','2019-11-22 08:53:01'),(24,1,'admin/news','GET','127.0.0.1','[]','2019-11-22 08:53:01','2019-11-22 08:53:01'),(25,1,'admin','GET','127.0.0.1','[]','2019-11-22 08:54:00','2019-11-22 08:54:00'),(26,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 08:59:27','2019-11-22 08:59:27'),(27,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 09:02:40','2019-11-22 09:02:40'),(28,1,'admin/auth/menu','POST','127.0.0.1','{\"parent_id\":\"0\",\"title\":\"Infrastructures\",\"icon\":\"fa-building\",\"uri\":\"infrastructures\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\"}','2019-11-22 09:03:16','2019-11-22 09:03:16'),(29,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 09:03:16','2019-11-22 09:03:16'),(30,1,'admin/auth/menu','POST','127.0.0.1','{\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9}]\"}','2019-11-22 09:03:29','2019-11-22 09:03:29'),(31,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:03:29','2019-11-22 09:03:29'),(32,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 09:03:31','2019-11-22 09:03:31'),(33,1,'admin/infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:03:32','2019-11-22 09:03:32'),(34,1,'admin/infrastructures/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:03:53','2019-11-22 09:03:53'),(35,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:05:50','2019-11-22 09:05:50'),(36,1,'admin','GET','127.0.0.1','[]','2019-11-22 09:05:57','2019-11-22 09:05:57'),(37,1,'admin','GET','127.0.0.1','[]','2019-11-22 09:25:54','2019-11-22 09:25:54'),(38,1,'admin/infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:25:57','2019-11-22 09:25:57'),(39,1,'admin/infrastructures/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:25:58','2019-11-22 09:25:58'),(40,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:26:06','2019-11-22 09:26:06'),(41,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 09:32:12','2019-11-22 09:32:12'),(42,1,'admin/auth/menu','POST','127.0.0.1','{\"parent_id\":\"0\",\"title\":\"Infrastructure Category\",\"icon\":\"fa-certificate\",\"uri\":\"category-infrastructures\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\"}','2019-11-22 09:32:42','2019-11-22 09:32:42'),(43,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 09:32:43','2019-11-22 09:32:43'),(44,1,'admin/auth/menu/10','DELETE','127.0.0.1','{\"_method\":\"delete\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\"}','2019-11-22 09:33:05','2019-11-22 09:33:05'),(45,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:33:05','2019-11-22 09:33:05'),(46,1,'admin/auth/menu','POST','127.0.0.1','{\"parent_id\":\"9\",\"title\":\"Infrastructure Categories\",\"icon\":\"fa-certificate\",\"uri\":\"category-infrastructures\",\"roles\":[null],\"permission\":null,\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\"}','2019-11-22 09:34:08','2019-11-22 09:34:08'),(47,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 09:34:09','2019-11-22 09:34:09'),(48,1,'admin/auth/menu','POST','127.0.0.1','{\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9,\\\"children\\\":[{\\\"id\\\":11}]}]\"}','2019-11-22 09:34:13','2019-11-22 09:34:13'),(49,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:34:13','2019-11-22 09:34:13'),(50,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 09:34:15','2019-11-22 09:34:15'),(51,1,'admin/category-infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:34:20','2019-11-22 09:34:20'),(52,1,'admin/category-infrastructures/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:34:22','2019-11-22 09:34:22'),(53,1,'admin/category-infrastructures','POST','127.0.0.1','{\"name\":\"TEST_CATEGORY_INFRATRUCTURE_ITEM_NAME\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/category-infrastructures\"}','2019-11-22 09:34:59','2019-11-22 09:34:59'),(54,1,'admin/category-infrastructures','GET','127.0.0.1','[]','2019-11-22 09:34:59','2019-11-22 09:34:59'),(55,1,'admin/category-infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:35:18','2019-11-22 09:35:18'),(56,1,'admin/news','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:35:20','2019-11-22 09:35:20'),(57,1,'admin/category-infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:35:27','2019-11-22 09:35:27'),(58,1,'admin/infrastructures','GET','127.0.0.1','[]','2019-11-22 09:35:31','2019-11-22 09:35:31'),(59,1,'admin/infrastructures/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:35:33','2019-11-22 09:35:33'),(60,1,'admin/infrastructures/create','GET','127.0.0.1','[]','2019-11-22 09:35:49','2019-11-22 09:35:49'),(61,1,'admin/infrastructures/create','GET','127.0.0.1','[]','2019-11-22 09:37:16','2019-11-22 09:37:16'),(62,1,'admin/infrastructures/create','GET','127.0.0.1','[]','2019-11-22 09:37:38','2019-11-22 09:37:38'),(63,1,'admin/infrastructures/create','GET','127.0.0.1','[]','2019-11-22 09:37:39','2019-11-22 09:37:39'),(64,1,'admin/infrastructures/create','GET','127.0.0.1','[]','2019-11-22 09:38:14','2019-11-22 09:38:14'),(65,1,'admin/infrastructures','POST','127.0.0.1','{\"category_id\":\"1\",\"name\":\"\\u0444\\u044b\\u0432\\u043f\\u0444\\u044b\\u0432\\u043f\",\"description\":\"asdfgasdfasdf\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\"}','2019-11-22 09:38:25','2019-11-22 09:38:25'),(66,1,'admin/infrastructures','GET','127.0.0.1','[]','2019-11-22 09:38:25','2019-11-22 09:38:25'),(67,1,'admin/infrastructures','GET','127.0.0.1','[]','2019-11-22 09:40:32','2019-11-22 09:40:32'),(68,1,'admin/infrastructures/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:40:36','2019-11-22 09:40:36'),(69,1,'admin/infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:40:37','2019-11-22 09:40:37'),(70,1,'admin/infrastructures/1','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:40:39','2019-11-22 09:40:39'),(71,1,'admin/infrastructures/1','GET','127.0.0.1','[]','2019-11-22 09:41:03','2019-11-22 09:41:03'),(72,1,'admin/infrastructures/1','GET','127.0.0.1','[]','2019-11-22 09:41:13','2019-11-22 09:41:13'),(73,1,'admin/infrastructures/1','GET','127.0.0.1','[]','2019-11-22 09:42:45','2019-11-22 09:42:45'),(74,1,'admin/infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:43:05','2019-11-22 09:43:05'),(75,1,'admin/_handle_action_','POST','127.0.0.1','{\"_key\":\"1\",\"_model\":\"App_Models_Infrastructure\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_action\":\"Encore_Admin_Grid_Actions_Delete\",\"_input\":\"true\"}','2019-11-22 09:43:11','2019-11-22 09:43:11'),(76,1,'admin/infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:43:11','2019-11-22 09:43:11'),(77,1,'admin/infrastructures','GET','127.0.0.1','[]','2019-11-22 09:45:00','2019-11-22 09:45:00'),(78,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:45:03','2019-11-22 09:45:03'),(79,1,'admin/auth/menu','POST','127.0.0.1','{\"parent_id\":\"0\",\"title\":\"Gallery\",\"icon\":\"fa-image\",\"uri\":\"galleries\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\"}','2019-11-22 09:45:36','2019-11-22 09:45:36'),(80,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 09:45:36','2019-11-22 09:45:36'),(81,1,'admin/auth/menu','POST','127.0.0.1','{\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9,\\\"children\\\":[{\\\"id\\\":11}]},{\\\"id\\\":12}]\"}','2019-11-22 09:45:48','2019-11-22 09:45:48'),(82,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:45:49','2019-11-22 09:45:49'),(83,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 09:45:54','2019-11-22 09:45:54'),(84,1,'admin/galleries','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:45:56','2019-11-22 09:45:56'),(85,1,'admin/galleries','GET','127.0.0.1','[]','2019-11-22 09:48:09','2019-11-22 09:48:09'),(86,1,'admin/galleries/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:48:13','2019-11-22 09:48:13'),(87,1,'admin/galleries/create','GET','127.0.0.1','[]','2019-11-22 09:48:48','2019-11-22 09:48:48'),(88,1,'admin/galleries','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:48:51','2019-11-22 09:48:51'),(89,1,'admin/galleries/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:48:52','2019-11-22 09:48:52'),(90,1,'admin/galleries','POST','127.0.0.1','{\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/galleries\"}','2019-11-22 09:49:09','2019-11-22 09:49:09'),(91,1,'admin/galleries','GET','127.0.0.1','[]','2019-11-22 09:49:09','2019-11-22 09:49:09'),(92,1,'admin/galleries/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:49:13','2019-11-22 09:49:13'),(93,1,'admin/galleries','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:49:14','2019-11-22 09:49:14'),(94,1,'admin/galleries/1','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:49:17','2019-11-22 09:49:17'),(95,1,'admin/galleries','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:49:20','2019-11-22 09:49:20'),(96,1,'admin/galleries/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:49:21','2019-11-22 09:49:21'),(97,1,'admin/galleries','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:49:30','2019-11-22 09:49:30'),(98,1,'admin/_handle_action_','POST','127.0.0.1','{\"_key\":\"1\",\"_model\":\"App_Models_Gallery\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_action\":\"Encore_Admin_Grid_Actions_Delete\",\"_input\":\"true\"}','2019-11-22 09:49:35','2019-11-22 09:49:35'),(99,1,'admin/galleries','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:49:35','2019-11-22 09:49:35'),(100,1,'admin/galleries/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:49:37','2019-11-22 09:49:37'),(101,1,'admin/galleries','POST','127.0.0.1','{\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/galleries\"}','2019-11-22 09:49:50','2019-11-22 09:49:50'),(102,1,'admin/galleries','GET','127.0.0.1','[]','2019-11-22 09:49:50','2019-11-22 09:49:50'),(103,1,'admin/galleries','GET','127.0.0.1','[]','2019-11-22 09:49:56','2019-11-22 09:49:56'),(104,1,'admin/galleries/2','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:49:58','2019-11-22 09:49:58'),(105,1,'admin/galleries','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:50:00','2019-11-22 09:50:00'),(106,1,'admin/galleries/2/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:50:02','2019-11-22 09:50:02'),(107,1,'admin/galleries','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:50:03','2019-11-22 09:50:03'),(108,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:55:48','2019-11-22 09:55:48'),(109,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:55:49','2019-11-22 09:55:49'),(110,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:55:51','2019-11-22 09:55:51'),(111,1,'admin/auth/menu','POST','127.0.0.1','{\"parent_id\":\"0\",\"title\":\"Menu\",\"icon\":\"fa-sitemap\",\"uri\":\"menus\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\"}','2019-11-22 09:56:15','2019-11-22 09:56:15'),(112,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 09:56:16','2019-11-22 09:56:16'),(113,1,'admin/auth/menu','POST','127.0.0.1','{\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_order\":\"[{\\\"id\\\":13},{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9,\\\"children\\\":[{\\\"id\\\":11}]},{\\\"id\\\":12}]\"}','2019-11-22 09:56:27','2019-11-22 09:56:27'),(114,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:56:28','2019-11-22 09:56:28'),(115,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 09:56:31','2019-11-22 09:56:31'),(116,1,'admin/auth/menu','POST','127.0.0.1','{\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9,\\\"children\\\":[{\\\"id\\\":11}]},{\\\"id\\\":12},{\\\"id\\\":13}]\"}','2019-11-22 09:56:40','2019-11-22 09:56:40'),(117,1,'admin/auth/menu','POST','127.0.0.1','{\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9,\\\"children\\\":[{\\\"id\\\":11}]},{\\\"id\\\":12},{\\\"id\\\":13}]\"}','2019-11-22 09:56:41','2019-11-22 09:56:41'),(118,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:56:41','2019-11-22 09:56:41'),(119,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:56:41','2019-11-22 09:56:41'),(120,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 09:56:43','2019-11-22 09:56:43'),(121,1,'admin/menus','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:56:45','2019-11-22 09:56:45'),(122,1,'admin/menus/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 09:56:47','2019-11-22 09:56:47'),(123,1,'admin/menus','POST','127.0.0.1','{\"name\":\"MENU_ITEM_TEST\",\"link\":\"http:\\/\\/localhost\\/test\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/menus\"}','2019-11-22 09:57:39','2019-11-22 09:57:39'),(124,1,'admin/menus','GET','127.0.0.1','[]','2019-11-22 09:57:40','2019-11-22 09:57:40'),(125,1,'admin','GET','127.0.0.1','[]','2019-11-22 09:59:54','2019-11-22 09:59:54'),(126,1,'admin/category-infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:00:15','2019-11-22 10:00:15'),(127,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:00:19','2019-11-22 10:00:19'),(128,1,'admin/auth/menu/9/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:00:27','2019-11-22 10:00:27'),(129,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:00:36','2019-11-22 10:00:36'),(130,1,'admin/auth/menu/9/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:00:56','2019-11-22 10:00:56'),(131,1,'admin/auth/menu/9','PUT','127.0.0.1','{\"parent_id\":\"0\",\"title\":\"infrastructures\",\"icon\":\"fa-building\",\"uri\":\"infrastructures\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/auth\\/menu\"}','2019-11-22 10:01:00','2019-11-22 10:01:00'),(132,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 10:01:00','2019-11-22 10:01:00'),(133,1,'admin/auth/menu','POST','127.0.0.1','{\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9,\\\"children\\\":[{\\\"id\\\":11}]},{\\\"id\\\":12},{\\\"id\\\":13}]\"}','2019-11-22 10:01:02','2019-11-22 10:01:02'),(134,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:01:02','2019-11-22 10:01:02'),(135,1,'admin/auth/menu/9/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:01:31','2019-11-22 10:01:31'),(136,1,'admin/auth/menu/9','PUT','127.0.0.1','{\"parent_id\":\"0\",\"title\":\"infrastructures\",\"icon\":\"fa-building\",\"uri\":\"infrastructures\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/auth\\/menu\"}','2019-11-22 10:01:38','2019-11-22 10:01:38'),(137,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 10:01:38','2019-11-22 10:01:38'),(138,1,'admin/auth/menu','POST','127.0.0.1','{\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9,\\\"children\\\":[{\\\"id\\\":11}]},{\\\"id\\\":12},{\\\"id\\\":13}]\"}','2019-11-22 10:01:57','2019-11-22 10:01:57'),(139,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:01:58','2019-11-22 10:01:58'),(140,1,'admin/auth/menu','POST','127.0.0.1','{\"parent_id\":\"9\",\"title\":\"Infrastructure Item\",\"icon\":\"fa-institution\",\"uri\":\"infrastructures\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\"}','2019-11-22 10:03:11','2019-11-22 10:03:11'),(141,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 10:03:11','2019-11-22 10:03:11'),(142,1,'admin/auth/menu','POST','127.0.0.1','{\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9,\\\"children\\\":[{\\\"id\\\":14},{\\\"id\\\":11}]},{\\\"id\\\":12},{\\\"id\\\":13}]\"}','2019-11-22 10:03:12','2019-11-22 10:03:12'),(143,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:03:13','2019-11-22 10:03:13'),(144,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 10:03:14','2019-11-22 10:03:14'),(145,1,'admin/category-infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:03:16','2019-11-22 10:03:16'),(146,1,'admin/infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:03:17','2019-11-22 10:03:17'),(147,1,'admin/infrastructures/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:03:20','2019-11-22 10:03:20'),(148,1,'admin/infrastructures','GET','127.0.0.1','[]','2019-11-22 10:03:27','2019-11-22 10:03:27'),(149,1,'admin/category-infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:03:30','2019-11-22 10:03:30'),(150,1,'admin/infrastructures','GET','127.0.0.1','[]','2019-11-22 10:03:35','2019-11-22 10:03:35'),(151,1,'admin/infrastructures/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:03:37','2019-11-22 10:03:37'),(152,1,'admin/infrastructures','POST','127.0.0.1','{\"category_id\":\"1\",\"name\":\"asdfasd\",\"description\":\"fasdfasdf\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/infrastructures\"}','2019-11-22 10:03:41','2019-11-22 10:03:41'),(153,1,'admin/infrastructures','GET','127.0.0.1','[]','2019-11-22 10:03:41','2019-11-22 10:03:41'),(154,1,'admin/category-infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:03:45','2019-11-22 10:03:45'),(155,1,'admin/infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:03:46','2019-11-22 10:03:46'),(156,1,'admin/menus','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:06:08','2019-11-22 10:06:08'),(157,1,'admin/menus','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:06:25','2019-11-22 10:06:25'),(158,1,'admin/menus','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:12:11','2019-11-22 10:12:11'),(159,1,'admin/menus/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:12:14','2019-11-22 10:12:14'),(160,1,'admin/menus/1','PUT','127.0.0.1','{\"name\":\"MENU_ITEM_TEST\",\"link\":\"http:\\/\\/localhost\\/test\",\"order\":\"1\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/menus\"}','2019-11-22 10:12:16','2019-11-22 10:12:16'),(161,1,'admin/menus','GET','127.0.0.1','[]','2019-11-22 10:12:16','2019-11-22 10:12:16'),(162,1,'admin/menus/1','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:12:19','2019-11-22 10:12:19'),(163,1,'admin/menus','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:12:20','2019-11-22 10:12:20'),(164,1,'admin/menus/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:14:04','2019-11-22 10:14:04'),(165,1,'admin/menus','POST','127.0.0.1','{\"name\":\"afdsg\",\"link\":\"http:\\/\\/localhost\\/test1\",\"order\":\"2\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/menus\"}','2019-11-22 10:14:14','2019-11-22 10:14:14'),(166,1,'admin/menus','GET','127.0.0.1','[]','2019-11-22 10:14:14','2019-11-22 10:14:14'),(167,1,'admin/menus/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:15:00','2019-11-22 10:15:00'),(168,1,'admin/menus/1','PUT','127.0.0.1','{\"name\":\"MENU_ITEM_TEST\",\"link\":\"http:\\/\\/localhost\\/test\",\"order\":\"2\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/menus\"}','2019-11-22 10:15:04','2019-11-22 10:15:04'),(169,1,'admin/menus/1/edit','GET','127.0.0.1','[]','2019-11-22 10:15:04','2019-11-22 10:15:04'),(170,1,'admin/menus/1','PUT','127.0.0.1','{\"name\":\"MENU_ITEM_TEST\",\"link\":\"http:\\/\\/localhost\\/test\",\"order\":\"3\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_method\":\"PUT\"}','2019-11-22 10:15:06','2019-11-22 10:15:06'),(171,1,'admin/menus','GET','127.0.0.1','[]','2019-11-22 10:15:07','2019-11-22 10:15:07'),(172,1,'admin/menus','GET','127.0.0.1','[]','2019-11-22 10:26:21','2019-11-22 10:26:21'),(173,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:26:24','2019-11-22 10:26:24'),(174,1,'admin/auth/menu','POST','127.0.0.1','{\"parent_id\":\"0\",\"title\":\"Areas\",\"icon\":\"fa-area-chart\",\"uri\":\"areas\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\"}','2019-11-22 10:27:02','2019-11-22 10:27:02'),(175,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 10:27:02','2019-11-22 10:27:02'),(176,1,'admin/auth/menu','POST','127.0.0.1','{\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9,\\\"children\\\":[{\\\"id\\\":14},{\\\"id\\\":11}]},{\\\"id\\\":12},{\\\"id\\\":13},{\\\"id\\\":15}]\"}','2019-11-22 10:27:06','2019-11-22 10:27:06'),(177,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:27:06','2019-11-22 10:27:06'),(178,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 10:27:08','2019-11-22 10:27:08'),(179,1,'admin/areas','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:27:10','2019-11-22 10:27:10'),(180,1,'admin/areas/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:27:36','2019-11-22 10:27:36'),(181,1,'admin/areas/create','GET','127.0.0.1','[]','2019-11-22 10:32:11','2019-11-22 10:32:11'),(182,1,'admin/areas/create','GET','127.0.0.1','[]','2019-11-22 10:34:46','2019-11-22 10:34:46'),(183,1,'admin/areas/create','GET','127.0.0.1','[]','2019-11-22 10:36:06','2019-11-22 10:36:06'),(184,1,'admin/areas','POST','127.0.0.1','{\"status\":\"test_status\",\"number\":\"test_number\",\"square\":\"12.3\",\"price\":\"31.2\",\"color\":\"#5ad7dd\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\"}','2019-11-22 10:37:43','2019-11-22 10:37:43'),(185,1,'admin/areas/create','GET','127.0.0.1','[]','2019-11-22 10:37:44','2019-11-22 10:37:44'),(186,1,'admin/areas/create','GET','127.0.0.1','[]','2019-11-22 10:37:56','2019-11-22 10:37:56'),(187,1,'admin/areas','POST','127.0.0.1','{\"status\":\"adfsg\",\"number\":\"asfdg\",\"square\":\"12\",\"price\":\"21\",\"color\":\"#b9aeae\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\"}','2019-11-22 10:38:30','2019-11-22 10:38:30'),(188,1,'admin/areas','GET','127.0.0.1','[]','2019-11-22 10:38:30','2019-11-22 10:38:30'),(189,1,'admin/areas/1','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:38:34','2019-11-22 10:38:34'),(190,1,'admin/areas','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:38:37','2019-11-22 10:38:37'),(191,1,'admin/areas/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:38:39','2019-11-22 10:38:39'),(192,1,'admin/areas','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:38:44','2019-11-22 10:38:44'),(193,1,'admin/areas/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:38:44','2019-11-22 10:38:44'),(194,1,'admin/areas/create','GET','127.0.0.1','[]','2019-11-22 10:50:16','2019-11-22 10:50:16'),(195,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:50:19','2019-11-22 10:50:19'),(196,1,'admin/auth/menu','POST','127.0.0.1','{\"parent_id\":\"15\",\"title\":\"Area Item\",\"icon\":\"fa-cube\",\"uri\":\"areas\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\"}','2019-11-22 10:51:31','2019-11-22 10:51:31'),(197,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 10:51:31','2019-11-22 10:51:31'),(198,1,'admin/auth/menu/16/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:51:37','2019-11-22 10:51:37'),(199,1,'admin/auth/menu/16','PUT','127.0.0.1','{\"parent_id\":\"15\",\"title\":\"Area Items\",\"icon\":\"fa-cube\",\"uri\":\"areas\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/auth\\/menu\"}','2019-11-22 10:51:40','2019-11-22 10:51:40'),(200,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 10:51:40','2019-11-22 10:51:40'),(201,1,'admin/auth/menu','POST','127.0.0.1','{\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9,\\\"children\\\":[{\\\"id\\\":14},{\\\"id\\\":11}]},{\\\"id\\\":12},{\\\"id\\\":13},{\\\"id\\\":15,\\\"children\\\":[{\\\"id\\\":16}]}]\"}','2019-11-22 10:51:42','2019-11-22 10:51:42'),(202,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:51:42','2019-11-22 10:51:42'),(203,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 10:51:46','2019-11-22 10:51:46'),(204,1,'admin/areas','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:51:48','2019-11-22 10:51:48'),(205,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:51:53','2019-11-22 10:51:53'),(206,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 10:52:58','2019-11-22 10:52:58'),(207,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 10:54:12','2019-11-22 10:54:12'),(208,1,'admin/auth/menu/16/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:54:15','2019-11-22 10:54:15'),(209,1,'admin/auth/menu/16','PUT','127.0.0.1','{\"parent_id\":\"15\",\"title\":\"Area Items\",\"icon\":\"fa-cubes\",\"uri\":\"areas\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/auth\\/menu\"}','2019-11-22 10:54:28','2019-11-22 10:54:28'),(210,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 10:54:29','2019-11-22 10:54:29'),(211,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 10:55:13','2019-11-22 10:55:13'),(212,1,'admin/auth/menu','POST','127.0.0.1','{\"parent_id\":\"15\",\"title\":\"Statuses\",\"icon\":\"fa-dashcube\",\"uri\":\"area-statuses\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\"}','2019-11-22 10:55:39','2019-11-22 10:55:39'),(213,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 10:55:39','2019-11-22 10:55:39'),(214,1,'admin/auth/menu','POST','127.0.0.1','{\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9,\\\"children\\\":[{\\\"id\\\":14},{\\\"id\\\":11}]},{\\\"id\\\":12},{\\\"id\\\":13},{\\\"id\\\":15,\\\"children\\\":[{\\\"id\\\":17},{\\\"id\\\":16}]}]\"}','2019-11-22 10:55:41','2019-11-22 10:55:41'),(215,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:55:41','2019-11-22 10:55:41'),(216,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 10:55:42','2019-11-22 10:55:42'),(217,1,'admin/auth/menu','POST','127.0.0.1','{\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9,\\\"children\\\":[{\\\"id\\\":14},{\\\"id\\\":11}]},{\\\"id\\\":12},{\\\"id\\\":13},{\\\"id\\\":15,\\\"children\\\":[{\\\"id\\\":16},{\\\"id\\\":17}]}]\"}','2019-11-22 10:55:50','2019-11-22 10:55:50'),(218,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:55:51','2019-11-22 10:55:51'),(219,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 10:55:53','2019-11-22 10:55:53'),(220,1,'admin/areas','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:55:56','2019-11-22 10:55:56'),(221,1,'admin/area-statuses','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 10:55:57','2019-11-22 10:55:57'),(222,1,'admin/area-statuses','GET','127.0.0.1','[]','2019-11-22 11:01:39','2019-11-22 11:01:39'),(223,1,'admin/area-statuses','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:01:43','2019-11-22 11:01:43'),(224,1,'admin/area-statuses/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:01:45','2019-11-22 11:01:45'),(225,1,'admin/area-statuses','POST','127.0.0.1','{\"name\":\"STATUS-TATUS\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/area-statuses\"}','2019-11-22 11:01:53','2019-11-22 11:01:53'),(226,1,'admin/area-statuses','GET','127.0.0.1','[]','2019-11-22 11:01:53','2019-11-22 11:01:53'),(227,1,'admin/areas','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:01:55','2019-11-22 11:01:55'),(228,1,'admin/areas/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:01:58','2019-11-22 11:01:58'),(229,1,'admin/areas/1','PUT','127.0.0.1','{\"status_id\":\"1\",\"number\":\"asfdg\",\"square\":\"12\",\"price\":\"21\",\"color\":\"#b9aeae\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/areas\"}','2019-11-22 11:02:03','2019-11-22 11:02:03'),(230,1,'admin/areas','GET','127.0.0.1','[]','2019-11-22 11:02:03','2019-11-22 11:02:03'),(231,1,'admin/areas/1','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:02:06','2019-11-22 11:02:06'),(232,1,'admin/areas','GET','127.0.0.1','[]','2019-11-22 11:02:07','2019-11-22 11:02:07'),(233,1,'admin/areas','GET','127.0.0.1','[]','2019-11-22 11:02:53','2019-11-22 11:02:53'),(234,1,'admin/areas/1','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:02:56','2019-11-22 11:02:56'),(235,1,'admin/areas','GET','127.0.0.1','[]','2019-11-22 11:02:56','2019-11-22 11:02:56'),(236,1,'admin/areas','GET','127.0.0.1','[]','2019-11-22 11:03:20','2019-11-22 11:03:20'),(237,1,'admin/areas/1','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:03:23','2019-11-22 11:03:23'),(238,1,'admin/areas/1','GET','127.0.0.1','[]','2019-11-22 11:03:39','2019-11-22 11:03:39'),(239,1,'admin/areas/1','GET','127.0.0.1','[]','2019-11-22 11:03:46','2019-11-22 11:03:46'),(240,1,'admin/areas/1','GET','127.0.0.1','[]','2019-11-22 11:04:41','2019-11-22 11:04:41'),(241,1,'admin/areas/1','GET','127.0.0.1','[]','2019-11-22 11:04:50','2019-11-22 11:04:50'),(242,1,'admin/areas','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:04:53','2019-11-22 11:04:53'),(243,1,'admin/areas/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:04:55','2019-11-22 11:04:55'),(244,1,'admin/areas','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:04:56','2019-11-22 11:04:56'),(245,1,'admin/areas/1','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:04:58','2019-11-22 11:04:58'),(246,1,'admin/areas','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:05:00','2019-11-22 11:05:00'),(247,1,'admin/areas/1','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:05:00','2019-11-22 11:05:00'),(248,1,'admin/area-statuses','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:05:03','2019-11-22 11:05:03'),(249,1,'admin/_handle_action_','POST','127.0.0.1','{\"_key\":\"1\",\"_model\":\"App_Models_AreaStatus\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_action\":\"Encore_Admin_Grid_Actions_Delete\",\"_input\":\"true\"}','2019-11-22 11:05:06','2019-11-22 11:05:06'),(250,1,'admin/area-statuses','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:05:06','2019-11-22 11:05:06'),(251,1,'admin/areas','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:05:08','2019-11-22 11:05:08'),(252,1,'admin/areas/1','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:05:11','2019-11-22 11:05:11'),(253,1,'admin/areas','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:05:13','2019-11-22 11:05:13'),(254,1,'admin/areas','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:14:19','2019-11-22 11:14:19'),(255,1,'admin/areas/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:14:21','2019-11-22 11:14:21'),(256,1,'admin/infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:14:31','2019-11-22 11:14:31'),(257,1,'admin/infrastructures/2/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:14:34','2019-11-22 11:14:34'),(258,1,'admin/infrastructures/2/edit','GET','127.0.0.1','[]','2019-11-22 11:15:25','2019-11-22 11:15:25'),(259,1,'admin/infrastructures/2','PUT','127.0.0.1','{\"category_id\":\"1\",\"name\":\"asdfasd\",\"description\":\"<p>fasdfasdf<img alt=\\\"\\\" src=\\\"https:\\/\\/www.google.com\\/url?sa=i&amp;source=images&amp;cd=&amp;ved=2ahUKEwjblbav8_3lAhWGp4sKHcDDApgQjRx6BAgBEAQ&amp;url=https%3A%2F%2Fwww.w3schools.com%2Fw3css%2Fw3css_images.asp&amp;psig=AOvVaw1IpmsOBNztBFbUXFXdb6Pr&amp;ust=1574514940612427\\\" \\/><\\/p>\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_method\":\"PUT\"}','2019-11-22 11:16:02','2019-11-22 11:16:02'),(260,1,'admin/infrastructures','GET','127.0.0.1','[]','2019-11-22 11:16:02','2019-11-22 11:16:02'),(261,1,'admin/infrastructures/2/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:16:08','2019-11-22 11:16:08'),(262,1,'admin/infrastructures/2','PUT','127.0.0.1','{\"category_id\":\"1\",\"name\":\"asdfasd\",\"description\":\"<p>fasdfasdf<img alt=\\\"\\\" src=\\\"https:\\/\\/images.unsplash.com\\/photo-1509782642997-4befdc4b21c9?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80\\\" \\/><\\/p>\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/infrastructures\"}','2019-11-22 11:17:22','2019-11-22 11:17:22'),(263,1,'admin/infrastructures','GET','127.0.0.1','[]','2019-11-22 11:17:23','2019-11-22 11:17:23'),(264,1,'admin/infrastructures/2/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:17:26','2019-11-22 11:17:26'),(265,1,'admin/infrastructures/2','PUT','127.0.0.1','{\"category_id\":\"1\",\"name\":\"asdfasd\",\"description\":\"<p>fasdfasdf<img alt=\\\"\\\" src=\\\"https:\\/\\/images.unsplash.com\\/photo-1509782642997-4befdc4b21c9?ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1350&amp;q=80\\\" \\/><\\/p>\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/infrastructures\"}','2019-11-22 11:18:10','2019-11-22 11:18:10'),(266,1,'admin/infrastructures','GET','127.0.0.1','[]','2019-11-22 11:18:10','2019-11-22 11:18:10'),(267,1,'admin/menus','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:21:10','2019-11-22 11:21:10'),(268,1,'admin/menus/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:21:14','2019-11-22 11:21:14'),(269,1,'admin/news','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:21:22','2019-11-22 11:21:22'),(270,1,'admin/news/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:21:24','2019-11-22 11:21:24'),(271,1,'admin/news/1/edit','GET','127.0.0.1','[]','2019-11-22 11:21:47','2019-11-22 11:21:47'),(272,1,'admin/news','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:22:17','2019-11-22 11:22:17'),(273,1,'admin/news','GET','127.0.0.1','[]','2019-11-22 11:22:18','2019-11-22 11:22:18'),(274,1,'admin/news/1','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:22:20','2019-11-22 11:22:20'),(275,1,'admin/news','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:22:22','2019-11-22 11:22:22'),(276,1,'admin/menus/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:22:22','2019-11-22 11:22:22'),(277,1,'admin/news','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:22:26','2019-11-22 11:22:26'),(278,1,'admin/news/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:22:27','2019-11-22 11:22:27'),(279,1,'admin/areas','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:30:29','2019-11-22 11:30:29'),(280,1,'admin/areas','GET','127.0.0.1','[]','2019-11-22 11:49:37','2019-11-22 11:49:37'),(281,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:51:27','2019-11-22 11:51:27'),(282,1,'admin/auth/menu','POST','127.0.0.1','{\"parent_id\":\"0\",\"title\":\"Pages\",\"icon\":\"fa-file-o\",\"uri\":null,\"roles\":[null],\"permission\":null,\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\"}','2019-11-22 11:52:18','2019-11-22 11:52:18'),(283,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 11:52:18','2019-11-22 11:52:18'),(284,1,'admin/auth/menu/18/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:52:23','2019-11-22 11:52:23'),(285,1,'admin/auth/menu/18','PUT','127.0.0.1','{\"parent_id\":\"0\",\"title\":\"Pages\",\"icon\":\"fa-file-o\",\"uri\":\"pages\",\"roles\":[\"1\",null],\"permission\":\"*\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/auth\\/menu\"}','2019-11-22 11:52:36','2019-11-22 11:52:36'),(286,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 11:52:36','2019-11-22 11:52:36'),(287,1,'admin/auth/menu','POST','127.0.0.1','{\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]},{\\\"id\\\":8},{\\\"id\\\":9,\\\"children\\\":[{\\\"id\\\":14},{\\\"id\\\":11}]},{\\\"id\\\":12},{\\\"id\\\":13},{\\\"id\\\":15,\\\"children\\\":[{\\\"id\\\":16},{\\\"id\\\":17}]},{\\\"id\\\":18}]\"}','2019-11-22 11:52:46','2019-11-22 11:52:46'),(288,1,'admin/auth/menu','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:52:47','2019-11-22 11:52:47'),(289,1,'admin/auth/menu','GET','127.0.0.1','[]','2019-11-22 11:52:48','2019-11-22 11:52:48'),(290,1,'admin/pages','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:52:50','2019-11-22 11:52:50'),(291,1,'admin/pages','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:52:50','2019-11-22 11:52:50'),(292,1,'admin/pages/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:52:52','2019-11-22 11:52:52'),(293,1,'admin/pages/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 11:52:52','2019-11-22 11:52:52'),(294,1,'admin/pages','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:17:58','2019-11-22 12:17:58'),(295,1,'admin/pages/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:17:59','2019-11-22 12:17:59'),(296,1,'admin/pages/create','GET','127.0.0.1','[]','2019-11-22 12:18:21','2019-11-22 12:18:21'),(297,1,'admin/pages','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:18:24','2019-11-22 12:18:24'),(298,1,'admin/pages','GET','127.0.0.1','[]','2019-11-22 12:18:25','2019-11-22 12:18:25'),(299,1,'admin/pages/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:18:26','2019-11-22 12:18:26'),(300,1,'admin/pages','POST','127.0.0.1','{\"title\":\"Foo\",\"content\":\"<p>BAR<\\/p>\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/pages\"}','2019-11-22 12:18:31','2019-11-22 12:18:31'),(301,1,'admin/pages','GET','127.0.0.1','[]','2019-11-22 12:18:32','2019-11-22 12:18:32'),(302,1,'admin/pages/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:18:34','2019-11-22 12:18:34'),(303,1,'admin/pages','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:18:35','2019-11-22 12:18:35'),(304,1,'admin/pages/1','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:18:37','2019-11-22 12:18:37'),(305,1,'admin/pages','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:18:39','2019-11-22 12:18:39'),(306,1,'admin/auth/roles','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:31:45','2019-11-22 12:31:45'),(307,1,'admin/auth/users','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:31:47','2019-11-22 12:31:47'),(308,1,'admin/infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:31:49','2019-11-22 12:31:49'),(309,1,'admin/category-infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:31:50','2019-11-22 12:31:50'),(310,1,'admin/category-infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:31:50','2019-11-22 12:31:50'),(311,1,'admin/infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:31:51','2019-11-22 12:31:51'),(312,1,'admin/infrastructures/2/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:32:06','2019-11-22 12:32:06'),(313,1,'admin/news','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:32:52','2019-11-22 12:32:52'),(314,1,'admin/galleries','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:32:53','2019-11-22 12:32:53'),(315,1,'admin/menus','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:32:54','2019-11-22 12:32:54'),(316,1,'admin/areas','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:34:35','2019-11-22 12:34:35'),(317,1,'admin/areas/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:34:38','2019-11-22 12:34:38'),(318,1,'admin','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:34:44','2019-11-22 12:34:44'),(319,1,'admin/areas','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:35:35','2019-11-22 12:35:35'),(320,1,'admin/areas/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:35:37','2019-11-22 12:35:37'),(321,1,'admin/areas/1/edit','GET','127.0.0.1','[]','2019-11-22 12:35:44','2019-11-22 12:35:44'),(322,1,'admin/areas/1','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 12:35:46','2019-11-22 12:35:46'),(323,1,'admin/areas/1','GET','127.0.0.1','[]','2019-11-22 13:18:45','2019-11-22 13:18:45'),(324,1,'admin/areas','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 13:18:49','2019-11-22 13:18:49'),(325,1,'admin/areas/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 13:18:51','2019-11-22 13:18:51'),(326,1,'admin/news','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 13:25:24','2019-11-22 13:25:24'),(327,1,'admin/news/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 13:25:26','2019-11-22 13:25:26'),(328,1,'admin/news/1/edit','GET','127.0.0.1','[]','2019-11-22 13:25:50','2019-11-22 13:25:50'),(329,1,'admin/news/1/edit','GET','127.0.0.1','[]','2019-11-22 13:26:46','2019-11-22 13:26:46'),(330,1,'admin','GET','127.0.0.1','[]','2019-11-22 13:40:46','2019-11-22 13:40:46'),(331,1,'admin/news','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 13:40:49','2019-11-22 13:40:49'),(332,1,'admin/news/1/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 13:40:51','2019-11-22 13:40:51'),(333,1,'admin/infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 13:40:56','2019-11-22 13:40:56'),(334,1,'admin/infrastructures/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 13:40:57','2019-11-22 13:40:57'),(335,1,'admin/menus','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 13:41:03','2019-11-22 13:41:03'),(336,1,'admin/menus/create','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 13:41:05','2019-11-22 13:41:05'),(337,1,'admin/menus','POST','127.0.0.1','{\"link\":\"http:\\/\\/localhost\\/test\",\"order\":\"0\",\"ru_name\":\"Foo\",\"ua_name\":\"Bar\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_previous_\":\"http:\\/\\/localhost:8000\\/admin\\/menus\"}','2019-11-22 13:41:16','2019-11-22 13:41:16'),(338,1,'admin/menus','GET','127.0.0.1','[]','2019-11-22 13:41:16','2019-11-22 13:41:16'),(339,1,'admin/menus/3/edit','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 13:41:25','2019-11-22 13:41:25'),(340,1,'admin','GET','127.0.0.1','[]','2019-11-22 14:43:02','2019-11-22 14:43:02'),(341,1,'admin/infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 14:43:14','2019-11-22 14:43:14'),(342,1,'admin/_handle_action_','POST','127.0.0.1','{\"_key\":\"2\",\"_model\":\"App_Models_Infrastructure\",\"_token\":\"c2iAwbBBMc53qMapXdrDxaNlsl7SqKKUojupIywh\",\"_action\":\"Encore_Admin_Grid_Actions_Delete\",\"_input\":\"true\"}','2019-11-22 14:43:17','2019-11-22 14:43:17'),(343,1,'admin/infrastructures','GET','127.0.0.1','{\"_pjax\":\"#pjax-container\"}','2019-11-22 14:43:18','2019-11-22 14:43:18');
/*!40000 ALTER TABLE "admin_operation_log" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "admin_permissions"
--

DROP TABLE IF EXISTS "admin_permissions";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "admin_permissions" (
  "id" int(10) unsigned NOT NULL,
  "name" varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  "slug" varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  "http_method" varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  "http_path" text COLLATE utf8mb4_unicode_ci,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "admin_permissions_name_unique" ("name"),
  UNIQUE KEY "admin_permissions_slug_unique" ("slug")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "admin_permissions"
--

LOCK TABLES "admin_permissions" WRITE;
/*!40000 ALTER TABLE "admin_permissions" DISABLE KEYS */;
INSERT INTO "admin_permissions" VALUES (1,'All permission','*','','*',NULL,NULL),(2,'Dashboard','dashboard','GET','/',NULL,NULL),(3,'Login','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),(4,'User setting','auth.setting','GET,PUT','/auth/setting',NULL,NULL),(5,'Auth management','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL);
/*!40000 ALTER TABLE "admin_permissions" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "admin_role_menu"
--

DROP TABLE IF EXISTS "admin_role_menu";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "admin_role_menu" (
  "role_id" int(11) NOT NULL,
  "menu_id" int(11) NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  KEY "admin_role_menu_role_id_menu_id_index" ("role_id","menu_id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "admin_role_menu"
--

LOCK TABLES "admin_role_menu" WRITE;
/*!40000 ALTER TABLE "admin_role_menu" DISABLE KEYS */;
INSERT INTO "admin_role_menu" VALUES (1,2,NULL,NULL),(1,8,NULL,NULL),(1,9,NULL,NULL),(1,12,NULL,NULL),(1,13,NULL,NULL),(1,14,NULL,NULL),(1,15,NULL,NULL),(1,16,NULL,NULL),(1,17,NULL,NULL),(1,18,NULL,NULL);
/*!40000 ALTER TABLE "admin_role_menu" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "admin_role_permissions"
--

DROP TABLE IF EXISTS "admin_role_permissions";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "admin_role_permissions" (
  "role_id" int(11) NOT NULL,
  "permission_id" int(11) NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  KEY "admin_role_permissions_role_id_permission_id_index" ("role_id","permission_id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "admin_role_permissions"
--

LOCK TABLES "admin_role_permissions" WRITE;
/*!40000 ALTER TABLE "admin_role_permissions" DISABLE KEYS */;
INSERT INTO "admin_role_permissions" VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE "admin_role_permissions" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "admin_role_users"
--

DROP TABLE IF EXISTS "admin_role_users";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "admin_role_users" (
  "role_id" int(11) NOT NULL,
  "user_id" int(11) NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  KEY "admin_role_users_role_id_user_id_index" ("role_id","user_id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "admin_role_users"
--

LOCK TABLES "admin_role_users" WRITE;
/*!40000 ALTER TABLE "admin_role_users" DISABLE KEYS */;
INSERT INTO "admin_role_users" VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE "admin_role_users" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "admin_roles"
--

DROP TABLE IF EXISTS "admin_roles";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "admin_roles" (
  "id" int(10) unsigned NOT NULL,
  "name" varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  "slug" varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "admin_roles_name_unique" ("name"),
  UNIQUE KEY "admin_roles_slug_unique" ("slug")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "admin_roles"
--

LOCK TABLES "admin_roles" WRITE;
/*!40000 ALTER TABLE "admin_roles" DISABLE KEYS */;
INSERT INTO "admin_roles" VALUES (1,'Administrator','administrator','2019-11-22 08:32:30','2019-11-22 08:32:30');
/*!40000 ALTER TABLE "admin_roles" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "admin_user_permissions"
--

DROP TABLE IF EXISTS "admin_user_permissions";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "admin_user_permissions" (
  "user_id" int(11) NOT NULL,
  "permission_id" int(11) NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  KEY "admin_user_permissions_user_id_permission_id_index" ("user_id","permission_id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "admin_user_permissions"
--

LOCK TABLES "admin_user_permissions" WRITE;
/*!40000 ALTER TABLE "admin_user_permissions" DISABLE KEYS */;
/*!40000 ALTER TABLE "admin_user_permissions" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "admin_users"
--

DROP TABLE IF EXISTS "admin_users";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "admin_users" (
  "id" int(10) unsigned NOT NULL,
  "username" varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  "password" varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  "name" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "avatar" varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  "remember_token" varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "admin_users_username_unique" ("username")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "admin_users"
--

LOCK TABLES "admin_users" WRITE;
/*!40000 ALTER TABLE "admin_users" DISABLE KEYS */;
INSERT INTO "admin_users" VALUES (1,'admin','$2y$10$k5Yv8IDZRcAAIpJjEeQxGOT9eExmUkmopjKt5QriLFlaSmqkyFT..','Administrator',NULL,'f9jivKR2wv4xF9AEuMujL7RouLkRdz64lWO3PQO0Txq6lLtoklV4L9M8Lv5n','2019-11-22 08:32:30','2019-11-22 08:32:30'),(2,'foo','bar','foo',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE "admin_users" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "area_statuses"
--

DROP TABLE IF EXISTS "area_statuses";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "area_statuses" (
  "id" bigint(20) unsigned NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  "ru_name" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "ua_name" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "area_statuses"
--

LOCK TABLES "area_statuses" WRITE;
/*!40000 ALTER TABLE "area_statuses" DISABLE KEYS */;
/*!40000 ALTER TABLE "area_statuses" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "areas"
--

DROP TABLE IF EXISTS "areas";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "areas" (
  "id" bigint(20) unsigned NOT NULL,
  "number" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "square" double(8,2) NOT NULL,
  "price" double(8,2) NOT NULL,
  "image" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "plan" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "survey" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "color" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  "status_id" int(11) NOT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "areas"
--

LOCK TABLES "areas" WRITE;
/*!40000 ALTER TABLE "areas" DISABLE KEYS */;
INSERT INTO "areas" VALUES (1,'asfdg',12.00,21.00,'image/goo.png','file/AAAAAAAAAAA.xml','file/sample.pdf','#b9aeae','2019-11-22 10:38:30','2019-11-22 11:02:03',1);
/*!40000 ALTER TABLE "areas" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "category_infrastructures"
--

DROP TABLE IF EXISTS "category_infrastructures";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "category_infrastructures" (
  "id" bigint(20) unsigned NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  "ru_name" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "ua_name" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "category_infrastructures"
--

LOCK TABLES "category_infrastructures" WRITE;
/*!40000 ALTER TABLE "category_infrastructures" DISABLE KEYS */;
INSERT INTO "category_infrastructures" VALUES (1,'2019-11-22 09:34:59','2019-11-22 09:34:59','','');
/*!40000 ALTER TABLE "category_infrastructures" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "failed_jobs"
--

DROP TABLE IF EXISTS "failed_jobs";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "failed_jobs" (
  "id" bigint(20) unsigned NOT NULL,
  "connection" text COLLATE utf8mb4_unicode_ci NOT NULL,
  "queue" text COLLATE utf8mb4_unicode_ci NOT NULL,
  "payload" longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  "exception" longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  "failed_at" timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "failed_jobs"
--

LOCK TABLES "failed_jobs" WRITE;
/*!40000 ALTER TABLE "failed_jobs" DISABLE KEYS */;
/*!40000 ALTER TABLE "failed_jobs" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "galleries"
--

DROP TABLE IF EXISTS "galleries";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "galleries" (
  "id" bigint(20) unsigned NOT NULL,
  "image" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "galleries"
--

LOCK TABLES "galleries" WRITE;
/*!40000 ALTER TABLE "galleries" DISABLE KEYS */;
INSERT INTO "galleries" VALUES (2,'image/image_2019-10-27_15-46-24.png','2019-11-22 09:49:50','2019-11-22 09:49:50');
/*!40000 ALTER TABLE "galleries" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "infrastructures"
--

DROP TABLE IF EXISTS "infrastructures";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "infrastructures" (
  "id" bigint(20) unsigned NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  "category_id" int(11) NOT NULL,
  "ru_name" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "ru_description" text COLLATE utf8mb4_unicode_ci NOT NULL,
  "ua_name" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "ua_description" text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "infrastructures"
--

LOCK TABLES "infrastructures" WRITE;
/*!40000 ALTER TABLE "infrastructures" DISABLE KEYS */;
/*!40000 ALTER TABLE "infrastructures" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "menus"
--

DROP TABLE IF EXISTS "menus";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "menus" (
  "id" bigint(20) unsigned NOT NULL,
  "link" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  "order" int(11) NOT NULL,
  "ru_name" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "ua_name" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "menus_order_unique" ("order")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "menus"
--

LOCK TABLES "menus" WRITE;
/*!40000 ALTER TABLE "menus" DISABLE KEYS */;
INSERT INTO "menus" VALUES (1,'http://localhost/test','2019-11-22 09:57:39','2019-11-22 10:15:06',3,'',''),(2,'http://localhost/test1','2019-11-22 10:14:14','2019-11-22 10:14:14',2,'',''),(3,'http://localhost/test','2019-11-22 13:41:16','2019-11-22 13:41:16',0,'Foo','Bar');
/*!40000 ALTER TABLE "menus" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "migrations"
--

DROP TABLE IF EXISTS "migrations";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "migrations" (
  "id" int(10) unsigned NOT NULL,
  "migration" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "batch" int(11) NOT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "migrations"
--

LOCK TABLES "migrations" WRITE;
/*!40000 ALTER TABLE "migrations" DISABLE KEYS */;
INSERT INTO "migrations" VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_01_04_173148_create_admin_tables',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_11_21_175339_create_areas_table',1),(6,'2019_11_21_175403_create_infrastructures_table',1),(7,'2019_11_21_180057_create_news_table',1),(8,'2019_11_22_111221_create_category_infrastructures_table',2),(9,'2019_11_22_114619_create_galleries',3),(10,'2019_11_22_115302_create_menus_table',4),(11,'2019_11_22_124317_create_area_statuses_table',5),(12,'2019_11_22_134616_create_pages_table',6);
/*!40000 ALTER TABLE "migrations" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "news"
--

DROP TABLE IF EXISTS "news";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "news" (
  "id" bigint(20) unsigned NOT NULL,
  "image" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  "ru_name" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "ru_description" text COLLATE utf8mb4_unicode_ci NOT NULL,
  "ua_name" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "ua_description" text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "news"
--

LOCK TABLES "news" WRITE;
/*!40000 ALTER TABLE "news" DISABLE KEYS */;
INSERT INTO "news" VALUES (1,'image/??????????.png','2019-11-22 08:53:01','2019-11-22 08:53:01','','','','');
/*!40000 ALTER TABLE "news" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "pages"
--

DROP TABLE IF EXISTS "pages";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "pages" (
  "id" bigint(20) unsigned NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  "ru_title" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "ru_content" longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  "ua_title" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "ua_content" longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "pages_ru_title_unique" ("ru_title"),
  UNIQUE KEY "pages_ua_title_unique" ("ua_title")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "pages"
--

LOCK TABLES "pages" WRITE;
/*!40000 ALTER TABLE "pages" DISABLE KEYS */;
INSERT INTO "pages" VALUES (1,'2019-11-22 12:18:32','2019-11-22 12:18:32','','','','');
/*!40000 ALTER TABLE "pages" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "password_resets"
--

DROP TABLE IF EXISTS "password_resets";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "password_resets" (
  "email" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "token" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  KEY "password_resets_email_index" ("email")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "password_resets"
--

LOCK TABLES "password_resets" WRITE;
/*!40000 ALTER TABLE "password_resets" DISABLE KEYS */;
/*!40000 ALTER TABLE "password_resets" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "users"
--

DROP TABLE IF EXISTS "users";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "users" (
  "id" bigint(20) unsigned NOT NULL,
  "name" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "email" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "email_verified_at" timestamp NULL DEFAULT NULL,
  "password" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "remember_token" varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "users_email_unique" ("email")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "users"
--

LOCK TABLES "users" WRITE;
/*!40000 ALTER TABLE "users" DISABLE KEYS */;
/*!40000 ALTER TABLE "users" ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-22 18:57:47
