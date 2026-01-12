-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: jeatstream12
-- ------------------------------------------------------
-- Server version	8.0.40

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('laravel-cache-5f8c2b43f3d8f2ec3758bcccd503005c','i:1;',1764104927),('laravel-cache-5f8c2b43f3d8f2ec3758bcccd503005c:timer','i:1764104927;',1764104927),('laravel-cache-beed708fc87883da9e89cfbd23a8f878','i:1;',1764102713),('laravel-cache-beed708fc87883da9e89cfbd23a8f878:timer','i:1764102713;',1764102713),('laravel-cache-d763a6a9ed83f04f6f442190551c32d1','i:1;',1762986045),('laravel-cache-d763a6a9ed83f04f6f442190551c32d1:timer','i:1762986045;',1762986045),('sam-iim-cache-5f8c2b43f3d8f2ec3758bcccd503005c','i:1;',1767905020),('sam-iim-cache-5f8c2b43f3d8f2ec3758bcccd503005c:timer','i:1767905020;',1767905020),('sam-iim-cache-a6058fc6ba0085e181f975d43c8f1bcc','i:1;',1767905059),('sam-iim-cache-a6058fc6ba0085e181f975d43c8f1bcc:timer','i:1767905059;',1767905059),('sam-iim-cache-beed708fc87883da9e89cfbd23a8f878','i:1;',1767827909),('sam-iim-cache-beed708fc87883da9e89cfbd23a8f878:timer','i:1767827909;',1767827909),('sam-iim-cache-c1dfd96eea8cc2b62785275bca38ac261256e278','i:1;',1767732267),('sam-iim-cache-c1dfd96eea8cc2b62785275bca38ac261256e278:timer','i:1767732267;',1767732267),('sam-iim-cache-c79d0e8c892571a3b3c7be8b9d73acbb','i:1;',1765403272),('sam-iim-cache-c79d0e8c892571a3b3c7be8b9d73acbb:timer','i:1765403272;',1765403272),('sam-iim-cache-yaiv.gm@comunidad.unam.mx|127.0.0.1','i:1;',1765403273),('sam-iim-cache-yaiv.gm@comunidad.unam.mx|127.0.0.1:timer','i:1765403273;',1765403273);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuentas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas`
--

LOCK TABLES `cuentas` WRITE;
/*!40000 ALTER TABLE `cuentas` DISABLE KEYS */;
INSERT INTO `cuentas` VALUES (1,'1185','Cuenta Principal de Proyectos','2025-10-28 22:37:39','2025-10-28 22:37:39'),(2,'Administrativa','Cuenta para gastos administrativos',NULL,NULL),(3,'Nómina','Cuenta de pago a empleados',NULL,NULL),(4,'Operativa','Cuenta para operaciones diarias',NULL,NULL),(5,'Proyecto','Cuenta destinada a proyectos específicos',NULL,NULL);
/*!40000 ALTER TABLE `cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departamentos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ubicacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (1,'SERVS DE APOYO ADMINISTRATIVO Y T?CNICO','Departamento de servicios generales','Edificio B, Planta Baja','2025-10-28 22:37:07','2025-10-28 22:37:07'),(2,'Recursos Humanos','Gestión del personal','Edificio A - Planta Baja',NULL,NULL),(3,'Finanzas','Control administrativo y financiero','Edificio B - Piso 2',NULL,NULL),(4,'TI','Tecnologías de la Información','Edificio C - Piso 1',NULL,NULL),(5,'Investigación','Desarrollo de proyectos de investigación','Laboratorio Central',NULL,NULL);
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edificios`
--

DROP TABLE IF EXISTS `edificios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `edificios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edificios`
--

LOCK TABLES `edificios` WRITE;
/*!40000 ALTER TABLE `edificios` DISABLE KEYS */;
INSERT INTO `edificios` VALUES (1,'EDIFICIO PRINCIPAL IIM','Circuito Exterior S/N, C.U.','2025-10-28 22:37:17','2025-10-28 22:37:17'),(2,'Edificio A','Av. Universidad 123',NULL,NULL),(3,'Edificio B','Calle Innovación 456',NULL,NULL),(4,'Edificio C','Boulevard Tecnológico 789',NULL,NULL),(5,'Laboratorio Central','Zona Experimental S/N',NULL,NULL);
/*!40000 ALTER TABLE `edificios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_servicios`
--

DROP TABLE IF EXISTS `estado_servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado_servicios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_servicios`
--

LOCK TABLES `estado_servicios` WRITE;
/*!40000 ALTER TABLE `estado_servicios` DISABLE KEYS */;
INSERT INTO `estado_servicios` VALUES (1,'Aprobado'),(2,'En proceso'),(3,'Pendiente'),(4,'Rechazado');
/*!40000 ALTER TABLE `estado_servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formacion_profesional`
--

DROP TABLE IF EXISTS `formacion_profesional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formacion_profesional` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `grado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Licenciatura, Maestría, Doctorado, etc.',
  `institucion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `anio_inicio` int DEFAULT NULL,
  `anio_fin` int DEFAULT NULL,
  `titulo_obtenido` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int DEFAULT '0' COMMENT 'Para ordenar cronológicamente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `formacion_profesional_user_id_foreign` (`user_id`),
  KEY `idx_formacion_orden` (`user_id`,`orden`),
  CONSTRAINT `formacion_profesional_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Formación académica y grados del investigador';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formacion_profesional`
--

LOCK TABLES `formacion_profesional` WRITE;
/*!40000 ALTER TABLE `formacion_profesional` DISABLE KEYS */;
INSERT INTO `formacion_profesional` VALUES (3,6,'Licenciatura','UNAM ','México',NULL,2023,'Licenciatura en Informatica',0,'2025-12-10 04:44:01','2025-12-10 04:44:01'),(4,6,'Licenciatura','UNAM','México',NULL,2025,'Ciencias computacionales',0,'2025-12-11 04:49:33','2025-12-11 04:49:33');
/*!40000 ALTER TABLE `formacion_profesional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lineas_investigacion`
--

DROP TABLE IF EXISTS `lineas_investigacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lineas_investigacion` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` int DEFAULT '0',
  `activo` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lineas_investigacion_user_id_foreign` (`user_id`),
  KEY `idx_lineas_orden` (`user_id`,`orden`),
  KEY `idx_lineas_activo` (`activo`),
  CONSTRAINT `lineas_investigacion_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Líneas de investigación del investigador';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lineas_investigacion`
--

LOCK TABLES `lineas_investigacion` WRITE;
/*!40000 ALTER TABLE `lineas_investigacion` DISABLE KEYS */;
INSERT INTO `lineas_investigacion` VALUES (2,6,NULL,'Modelado Molecular y química teorica',0,1,'2025-12-10 04:23:05','2025-12-10 04:23:05'),(3,6,NULL,'Polimeros',0,1,'2025-12-10 04:59:42','2025-12-10 04:59:42');
/*!40000 ALTER TABLE `lineas_investigacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_10_07_231828_add_two_factor_columns_to_users_table',1),(5,'2025_10_07_231913_create_personal_access_tokens_table',1),(6,'2025_10_07_231920_create_sessions_table',2),(7,'2025_10_20_214123_add_profile_photo_path_to_users_table',3),(8,'2025_10_28_222214_create_departamentos_table',4),(9,'2025_10_28_222227_create_edificios_table',4),(10,'2025_10_28_222235_create_cuentas_table',4),(11,'2025_10_30_210833_create_solicitud_servicios_table',5),(12,'2025_11_03_203317_update_responsable_in_solicitud_servicios_table',6),(13,'2025_11_03_215508_create_estado_servicios_table',7),(14,'2025_11_03_215859_add_estado_servicio_id_to_solicitud_servicios_table',8),(15,'2025_11_04_205109_create_permission_tables',8),(16,'2025_11_19_210002_create_solicitud_comentarios_table',9),(17,'2025_12_09_210401_create_perfiles_table',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',5),(1,'App\\Models\\User',7);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perfiles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `tipo_academico_id` bigint unsigned DEFAULT NULL,
  `pride_id` bigint unsigned DEFAULT NULL,
  `sni_id` bigint unsigned DEFAULT NULL,
  `ubicacion_id` bigint unsigned DEFAULT NULL,
  `telefono_oficina` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cubiculo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_scholar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biografia` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `perfiles_user_id_unique` (`user_id`),
  KEY `perfiles_tipo_academico_id_foreign` (`tipo_academico_id`),
  KEY `perfiles_pride_id_foreign` (`pride_id`),
  KEY `perfiles_sni_id_foreign` (`sni_id`),
  KEY `perfiles_ubicacion_id_foreign` (`ubicacion_id`),
  CONSTRAINT `perfiles_pride_id_foreign` FOREIGN KEY (`pride_id`) REFERENCES `pride` (`id`),
  CONSTRAINT `perfiles_sni_id_foreign` FOREIGN KEY (`sni_id`) REFERENCES `sni` (`id`),
  CONSTRAINT `perfiles_tipo_academico_id_foreign` FOREIGN KEY (`tipo_academico_id`) REFERENCES `tipo_academico` (`id`),
  CONSTRAINT `perfiles_ubicacion_id_foreign` FOREIGN KEY (`ubicacion_id`) REFERENCES `ubicaciones` (`id`),
  CONSTRAINT `perfiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfiles`
--

LOCK TABLES `perfiles` WRITE;
/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
INSERT INTO `perfiles` VALUES (1,6,11,1,5,1,NULL,'16','https://github.com/yaiv','prueba de guardado con nuevo diseño ','2025-12-10 03:56:55','2026-01-07 02:40:43'),(2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-01-07 03:53:15','2026-01-07 03:53:15'),(3,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2026-01-08 08:06:50','2026-01-08 08:06:50');
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  KEY `personal_access_tokens_expires_at_index` (`expires_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pride`
--

DROP TABLE IF EXISTS `pride`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pride` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nivel` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `orden` int DEFAULT '0',
  `activo` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pride_nivel_unique` (`nivel`),
  KEY `idx_pride_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Catálogo de niveles del Programa de Primas al Desempeño del Personal Académico';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pride`
--

LOCK TABLES `pride` WRITE;
/*!40000 ALTER TABLE `pride` DISABLE KEYS */;
INSERT INTO `pride` VALUES (1,'D','Nivel D - Máximo nivel',1,1,NULL,NULL),(2,'C','Nivel C',2,1,NULL,NULL),(3,'B','Nivel B',3,1,NULL,NULL),(4,'A','Nivel A',4,1,NULL,NULL);
/*!40000 ALTER TABLE `pride` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicaciones`
--

DROP TABLE IF EXISTS `publicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `publicaciones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `titulo` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `autores` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Lista completa de autores',
  `revista` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anio` int NOT NULL,
  `volumen` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paginas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_publicacion` enum('articulo','libro','capitulo','conferencia','otro') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'articulo',
  `estado_revision` enum('publicado','en_revision','aceptado','enviado') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'publicado',
  `destacada` tinyint(1) DEFAULT '0' COMMENT 'Publicación destacada en perfil',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `publicaciones_user_id_foreign` (`user_id`),
  KEY `idx_publicaciones_anio` (`anio` DESC),
  KEY `idx_publicaciones_tipo` (`tipo_publicacion`),
  KEY `idx_publicaciones_destacada` (`destacada`),
  CONSTRAINT `publicaciones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Publicaciones científicas del investigador';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicaciones`
--

LOCK TABLES `publicaciones` WRITE;
/*!40000 ALTER TABLE `publicaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `publicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'administrador','web','2025-11-05 03:02:54','2025-11-05 03:02:54'),(2,'usuario','web','2025-11-05 03:03:16','2025-11-05 03:03:16');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('5e273ydxTq5aJY0HiufUxxSmCZArvibreeI4T7m3',6,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOUZ5TTF0Rm5mZlJqaUE3cDBVQVVhSFh0MlhCZDFKS2x0ZElFWFRQbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zb2xpY2l0dWRlcy9jcmVhciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjY7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkQjVzaXY2cHp1VTVYclRxWU0uLnBjLmpHeDBCanNwYjVVUkZLNUJwekt4V0RNdjgybGc2Y1MiO30=',1767909208),('G14gKKG7tTAPYljR17plN502zqvdbiQ1D7FkPk82',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNWVoNGpZdXJUM1M0RmE3ZFdDdXFkM2FCTnpVOVBReGJVNUxvSzRlQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9taS1wZXJmaWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEyJEZmUDA3VVIzTy5QY3JJWTlwUFNaYXV2OU90dVcwdGlBcW5YNHQ1QlVLLmpZNFRySnlnOUZ1Ijt9',1767909208);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sni`
--

DROP TABLE IF EXISTS `sni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sni` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nivel` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `orden` int DEFAULT '0',
  `activo` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sni_nivel_unique` (`nivel`),
  KEY `idx_sni_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Catálogo de niveles del Sistema Nacional de Investigadores';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sni`
--

LOCK TABLES `sni` WRITE;
/*!40000 ALTER TABLE `sni` DISABLE KEYS */;
INSERT INTO `sni` VALUES (1,'Candidato','Candidato a investigador nacional',1,1,NULL,NULL),(2,'Nivel I','Sistema Nacional de Investigadores Nivel I',2,1,NULL,NULL),(3,'Nivel II','Sistema Nacional de Investigadores Nivel II',3,1,NULL,NULL),(4,'Nivel III','Sistema Nacional de Investigadores Nivel III',4,1,NULL,NULL),(5,'Emérito','Investigador Nacional Emérito',5,1,NULL,NULL);
/*!40000 ALTER TABLE `sni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud_comentarios`
--

DROP TABLE IF EXISTS `solicitud_comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitud_comentarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `solicitud_servicio_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `comentario` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_anterior` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_nuevo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `solicitud_comentarios_solicitud_servicio_id_foreign` (`solicitud_servicio_id`),
  KEY `solicitud_comentarios_user_id_foreign` (`user_id`),
  CONSTRAINT `solicitud_comentarios_solicitud_servicio_id_foreign` FOREIGN KEY (`solicitud_servicio_id`) REFERENCES `solicitud_servicios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `solicitud_comentarios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud_comentarios`
--

LOCK TABLES `solicitud_comentarios` WRITE;
/*!40000 ALTER TABLE `solicitud_comentarios` DISABLE KEYS */;
INSERT INTO `solicitud_comentarios` VALUES (1,17,1,'Prueba de cambio de estatus','2','3','2025-11-20 03:29:55','2025-11-20 03:29:55'),(2,16,1,'Cambio de estatus sin comentario.','2','4','2025-11-20 03:30:27','2025-11-20 03:30:27'),(3,16,1,'Cambio de estatus sin comentario.','4','4','2025-11-20 03:31:24','2025-11-20 03:31:24'),(4,15,1,'Prueba de cambio de estado','2','1','2025-11-20 03:38:48','2025-11-20 03:38:48'),(5,14,1,'prueba','2','1','2025-11-20 03:40:41','2025-11-20 03:40:41'),(6,14,1,'Cambio de estatus sin comentario.','1','4','2025-11-20 03:41:03','2025-11-20 03:41:03'),(7,18,1,'Cambio de estatus sin comentario.','3','4','2025-11-20 03:44:51','2025-11-20 03:44:51'),(8,18,1,'Cambio de estatus sin comentario.','4','4','2025-11-20 03:44:59','2025-11-20 03:44:59'),(9,15,1,'Cambio de estatus sin comentario.','1','2','2025-11-20 05:30:56','2025-11-20 05:30:56'),(10,15,1,'Faltan llenar campos de info de equipo','2','4','2025-11-22 04:01:42','2025-11-22 04:01:42'),(11,13,1,'Solicitud llenada correctamente','2','1','2025-11-22 04:02:24','2025-11-22 04:02:24'),(12,13,1,'Se valida con coordinacion','1','2','2025-11-22 04:02:50','2025-11-22 04:02:50'),(13,13,1,'Cambio de estatus sin comentario.','2','1','2025-11-22 04:03:12','2025-11-22 04:03:12'),(14,19,1,'llenado correcto','2','1','2025-11-22 04:50:49','2025-11-22 04:50:49'),(15,19,1,'Cambio de estatus sin comentario.','1','2','2025-11-22 04:51:01','2025-11-22 04:51:01'),(16,19,1,'Cambio de estatus sin comentario.','2','1','2025-11-22 04:51:13','2025-11-22 04:51:13'),(17,20,1,'solictud aprovada','2','1','2025-11-22 06:10:27','2025-11-22 06:10:27'),(18,31,6,'Prueba con nuevo modulo de perfil de academico','2','1','2025-12-11 02:33:03','2025-12-11 02:33:03'),(19,31,6,'Cambio de estatus sin comentario.','1','2','2025-12-11 02:33:15','2025-12-11 02:33:15'),(20,31,6,'Cambio de estatus sin comentario.','2','1','2025-12-11 02:33:23','2025-12-11 02:33:23'),(21,31,6,'Cambio de estatus sin comentario.','1','2','2025-12-11 02:50:21','2025-12-11 02:50:21'),(22,31,6,'Cambio de estatus sin comentario.','2','1','2025-12-11 02:50:27','2025-12-11 02:50:27'),(23,32,1,'faltan datos ','2','1','2026-01-08 02:36:23','2026-01-08 02:36:23'),(24,32,1,'Cambio de estatus sin comentario.','1','2','2026-01-08 02:36:44','2026-01-08 02:36:44'),(25,33,1,'Hacen falta datos ','2','4','2026-01-08 07:23:48','2026-01-08 07:23:48'),(26,34,1,'faltan datos llenar nuevamente','2','4','2026-01-08 07:24:41','2026-01-08 07:24:41'),(27,36,1,'xsac','2','1','2026-01-08 09:26:31','2026-01-08 09:26:31');
/*!40000 ALTER TABLE `solicitud_comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud_servicios`
--

DROP TABLE IF EXISTS `solicitud_servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitud_servicios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `responsable_id` bigint unsigned DEFAULT NULL,
  `solicitante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `departamento_id` bigint unsigned NOT NULL,
  `edificio_id` bigint unsigned NOT NULL,
  `laboratorio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuenta_id` bigint unsigned NOT NULL,
  `tipo_servicio` json NOT NULL,
  `trabajoAFallarAparente` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipoEquipo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marca` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modelo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clasificacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noSerie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noInventario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `estado_servicio_id` bigint unsigned NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `solicitudes_departamento_id_foreign` (`departamento_id`),
  KEY `solicitudes_edificio_id_foreign` (`edificio_id`),
  KEY `solicitudes_cuenta_id_foreign` (`cuenta_id`),
  KEY `solicitud_servicios_responsable_id_foreign` (`responsable_id`),
  CONSTRAINT `solicitud_servicios_responsable_id_foreign` FOREIGN KEY (`responsable_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `solicitudes_cuenta_id_foreign` FOREIGN KEY (`cuenta_id`) REFERENCES `cuentas` (`id`),
  CONSTRAINT `solicitudes_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`),
  CONSTRAINT `solicitudes_edificio_id_foreign` FOREIGN KEY (`edificio_id`) REFERENCES `edificios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud_servicios`
--

LOCK TABLES `solicitud_servicios` WRITE;
/*!40000 ALTER TABLE `solicitud_servicios` DISABLE KEYS */;
INSERT INTO `solicitud_servicios` VALUES (1,1,'Erick Guerra',1,1,'12',1,'[\"Mantenimiento\"]','Prueba en BD ','Computo','Prueba','202',NULL,NULL,NULL,1,2,'2025-10-31 03:41:20','2025-10-31 03:41:20'),(2,1,'Erick Guerra',1,1,'12',1,'[\"Revisi?n\", \"Reparaci?n\"]','Prueba en BD ','Computo','Prueba','2025','A','3171856','1',1,2,'2025-10-31 03:41:48','2025-10-31 03:41:48'),(3,1,'Oscar Luna',1,1,'a',1,'[\"Instalaci?n\"]','Prueba 2 Prueba 2 Prueba 2 ','Computo','Lenovo','2025','A','3171856','12121212',1,2,'2025-10-31 03:43:54','2025-10-31 03:43:54'),(4,1,'Tania Guerra ',1,1,'14',1,'[\"Reparaci?n\", \"Instalaci?n\"]','Prueba Modal Prueba Modal Prueba Modal','Computo','Prueba','2025','A','3171856','1313131',1,2,'2025-10-31 04:08:58','2025-10-31 04:08:58'),(5,1,'Tania Guerra ',1,1,'14',1,'[\"Reparaci?n\"]','Prueba sin formato de PDF ','Computo','Prueba','2025','A','3171856','1313131',1,3,'2025-10-31 04:13:55','2025-10-31 04:13:55'),(6,1,'Tania Guerra ',1,1,'14',1,'[\"Mantenimiento\"]','Prueba de comprobante de pdf ','p','Prueba','2025','A','3171856','1313131',1,2,'2025-10-31 04:26:48','2025-10-31 04:26:48'),(7,1,'Tania Guerra ',1,1,'14',1,'[\"Reparaci?n\"]','Prueba de vista de PDF ','p','Prueba','2025','A','3171856','1313131',1,2,'2025-10-31 04:31:06','2025-10-31 04:31:06'),(8,NULL,'Ivan Guerra',1,1,'1',1,'[\"Otro\"]','Prueba de nuevo fomrato para las solicitudes ','Computo','Prueba','2025','A','232323','12121212',1,2,'2025-11-05 04:17:10','2025-11-05 04:17:10'),(9,NULL,'Ivan Guerra',1,1,'1',1,'[\"Otro\"]','Prueba de descarga de comprobante','Computo','Prueba','2025','A','232323','12121212',1,2,'2025-11-05 04:17:58','2025-11-05 04:17:58'),(10,NULL,'Oscar Ortiz',1,1,'123',1,'[\"Reparaci?n\"]','Prueba sin informaci?n de equipo',NULL,NULL,NULL,NULL,NULL,NULL,1,2,'2025-11-05 04:19:17','2025-11-05 04:19:17'),(11,NULL,'Oscar Ortiz',1,1,'123',1,'[\"Mantenimiento\"]','Prueba box superior',NULL,NULL,NULL,NULL,NULL,NULL,1,2,'2025-11-05 04:25:30','2025-11-05 04:25:30'),(12,NULL,'Tania Guerra ',1,1,'12',1,'[\"Otro\"]','Prueba con nuevo box superior',NULL,NULL,NULL,NULL,NULL,NULL,1,2,'2025-11-05 04:27:31','2025-11-05 04:27:31'),(13,NULL,'Tania Guerra ',1,1,'12',1,'[\"Otro\"]','Prueba Prueba  Prueba Prueba  Prueba Prueba ',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2025-11-05 04:29:24','2025-11-22 04:03:12'),(14,NULL,'Tania Guerra ',1,1,'12',1,'[\"Otro\"]','Prueba de formato de solicitud ',NULL,NULL,NULL,NULL,NULL,NULL,1,4,'2025-11-05 04:38:33','2025-11-20 03:41:03'),(15,NULL,'Ariel Bueno',1,1,'1',1,'[\"Revisi?n\"]','Revision de formato Revision de formato ',NULL,NULL,NULL,NULL,NULL,NULL,1,4,'2025-11-05 04:50:41','2025-11-22 04:01:42'),(16,1,'Ariel Bueno',1,1,'1',1,'[\"Mantenimiento\"]','Verificacion de responsable ',NULL,NULL,NULL,NULL,NULL,NULL,1,4,'2025-11-05 05:01:52','2025-11-20 03:30:27'),(17,1,'Gabriela Morales',1,1,'1',1,'[\"Otro\"]','Prueba de comprobante gaby','Computo','le','2021',NULL,NULL,NULL,1,3,'2025-11-06 08:47:45','2025-11-20 03:29:55'),(18,1,'Ivan Guerra',1,1,'1',1,'[\"Otro\"]','Prueba de guardado',NULL,NULL,NULL,NULL,NULL,NULL,1,4,'2025-11-06 10:24:41','2025-11-20 03:44:51'),(19,5,'Oscar Luna',1,1,'15',1,'[\"Mantenimiento\"]','Probando busqueda de solicitud','celular','samsumg','s24','pro','12341234','317183',1,1,'2025-11-22 03:39:59','2025-11-22 04:51:13'),(20,5,'Tania Guerra ',1,1,'2',1,'[\"Mantenimiento\"]','Falla de proceso','Computo','Lenovo',NULL,NULL,NULL,NULL,1,1,'2025-11-22 06:09:21','2025-11-22 06:10:27'),(21,6,'Mail',1,1,'15',1,'[\"Revisi?n\"]','Se revisa envio de correo electronico ','12','Samsung','2025','Nuevo','50503','1515145',1,2,'2025-11-26 03:10:39','2025-11-26 03:10:39'),(22,6,'Mail',1,1,'13',1,'[\"Mantenimiento\"]','Prueba de envio de mail',NULL,NULL,NULL,NULL,NULL,NULL,1,2,'2025-11-26 03:37:45','2025-11-26 03:37:45'),(23,7,'Mail',1,1,'1',1,'[\"Revisi?n\"]','Envio de mail exitoso',NULL,NULL,NULL,NULL,NULL,NULL,1,2,'2025-11-26 03:42:57','2025-11-26 03:42:57'),(24,7,'Mail',1,1,'1',1,'[\"Mantenimiento\"]','Envio de correo',NULL,NULL,NULL,NULL,NULL,NULL,1,2,'2025-11-26 03:44:22','2025-11-26 03:44:22'),(25,6,'Mail',1,1,'1',1,'[\"Mantenimiento\"]','Prueba de formato de mail',NULL,NULL,NULL,NULL,NULL,NULL,1,2,'2025-11-26 04:05:10','2025-11-26 04:05:10'),(26,6,'Mail 2 ',1,1,'1',1,'[\"Revisi?n\"]','Dise?o header y footer',NULL,NULL,NULL,NULL,NULL,NULL,1,2,'2025-11-26 04:39:15','2025-11-26 04:39:15'),(27,6,'Mail 2 ',1,1,'1',1,'[\"Reparaci?n\"]','Prueba de dise?o',NULL,NULL,NULL,NULL,NULL,NULL,1,2,'2025-11-26 04:40:19','2025-11-26 04:40:19'),(28,6,'Ivan Guerra',1,1,'1',1,'[\"Reparaci?n\"]','Prueba dise?o',NULL,NULL,NULL,NULL,NULL,NULL,1,2,'2025-11-26 04:42:55','2025-11-26 04:42:55'),(29,6,'Ivan Guerra',1,1,'1',1,'[\"Mantenimiento\"]','Prueba de header',NULL,NULL,NULL,NULL,NULL,NULL,1,2,'2025-11-26 04:45:39','2025-11-26 04:45:39'),(30,6,'Tania Guerra ',1,1,'12',1,'[\"Reparaci?n\"]','Nuevo dise?o de header',NULL,NULL,NULL,NULL,NULL,NULL,1,2,'2025-11-26 04:50:45','2025-11-26 04:50:45'),(31,6,'Tania Guerra ',1,1,'12',1,'[\"Reparaci?n\"]','Prueba de color',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2025-11-26 04:52:40','2025-12-11 02:50:27'),(32,6,'Tania Guerra ',3,3,'1',2,'[\"Mantenimiento\"]','foalllllllllllllllllllllllllllllllllllllllfoalllllllllllllllllllllllllllllllllllllllfoalllllllllllllllllllllllllllllllllllllllfoalllllllllllllllllllllllllllllllllllllll',NULL,NULL,NULL,NULL,NULL,NULL,1,2,'2026-01-08 02:33:14','2026-01-08 02:36:44'),(33,6,'Erick Guerra',3,3,'12',2,'[\"Revisión\"]','Verificacion de gastos del año 2025',NULL,NULL,NULL,NULL,NULL,NULL,1,4,'2026-01-08 05:16:46','2026-01-08 07:23:48'),(34,5,'Yair Guerra ',5,1,'1',1,'[\"Fabricación\"]','Investigación en Tecnología: Evaluar la influencia de las redes sociales en la capacidad de atención de los jóvenes universitarios','Computo','Lenovo','2025','A','317183','1',1,4,'2026-01-08 05:20:48','2026-01-08 07:24:41'),(35,1,'Ivan Yair Guerra Morales',2,1,'1',1,'[\"Mantenimiento\"]','Prueba de bifucrcacion de roles ya funcionando con solicitudes en panel de cada usuario',NULL,NULL,NULL,NULL,NULL,NULL,1,2,'2026-01-08 07:15:06','2026-01-08 07:15:06'),(36,5,'Ivan Yair Guerra Morales',5,2,'1',1,'[\"Mantenimiento\"]','Prueba de bifurcacion funcionando correctamente ',NULL,NULL,NULL,NULL,NULL,NULL,1,1,'2026-01-08 07:26:13','2026-01-08 09:26:31');
/*!40000 ALTER TABLE `solicitud_servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_academico`
--

DROP TABLE IF EXISTS `tipo_academico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_academico` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `orden` int DEFAULT '0',
  `activo` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_tipo_academico_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Catálogo de tipos de nombramiento académico';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_academico`
--

LOCK TABLES `tipo_academico` WRITE;
/*!40000 ALTER TABLE `tipo_academico` DISABLE KEYS */;
INSERT INTO `tipo_academico` VALUES (1,'Investigador Titular A','Máximo nivel de la carrera de investigador',1,1,NULL,NULL),(2,'Investigador Titular B','Segundo nivel titular',2,1,NULL,NULL),(3,'Investigador Titular C','Tercer nivel titular',3,1,NULL,NULL),(4,'Investigador Asociado A','Primer nivel asociado',4,1,NULL,NULL),(5,'Investigador Asociado B','Segundo nivel asociado',5,1,NULL,NULL),(6,'Investigador Asociado C','Tercer nivel asociado',6,1,NULL,NULL),(7,'Investigador Titular A',NULL,0,1,NULL,NULL),(8,'Investigador Titular B',NULL,0,1,NULL,NULL),(9,'Investigador Titular C',NULL,0,1,NULL,NULL),(10,'Investigador Asociado C',NULL,0,1,NULL,NULL),(11,'Técnico Académico Titular A',NULL,0,1,NULL,NULL);
/*!40000 ALTER TABLE `tipo_academico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubicaciones`
--

DROP TABLE IF EXISTS `ubicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ubicaciones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `edificio` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cubiculo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `piso` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `activo` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_ubicaciones_edificio` (`edificio`),
  KEY `idx_ubicaciones_activo` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Catálogo de ubicaciones físicas en el instituto';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicaciones`
--

LOCK TABLES `ubicaciones` WRITE;
/*!40000 ALTER TABLE `ubicaciones` DISABLE KEYS */;
INSERT INTO `ubicaciones` VALUES (1,'Edificio A','PB-01',NULL,NULL,1,NULL,NULL),(2,'Edificio C','113',NULL,NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `ubicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_empleado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_numero_empleado_unique` (`numero_empleado`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ivan Yair','Guerra','Morales','+525573584231','317183078','yaiv.gm@gmail.com','profile-photos/a3JPht8DCiTsoCl9y9ocTtshs30zFuUcR8XLaNGH.jpg',NULL,'$2y$12$FfP07UR3O.PcrIY9pPSZauv9OtuW0tiAqnX4t5BUK.jY4TrJyg9Fu',NULL,NULL,NULL,'wad0nbj2ZKxveaOHmXTAPL6zIr79DSUYR6nISHl3bQmunpTke5MxXm1T7bt3','2025-10-08 06:01:15','2025-10-21 03:44:08'),(2,'Erick','Guerra','Morales','1313131313','317183079','erick@guerra.com',NULL,NULL,'$2y$12$JUADosviVNP2UmLgopJdxeSIU9XYGogtmUKbZmXALKpOThQ8lpEyO',NULL,NULL,NULL,NULL,'2025-10-14 01:29:55','2025-10-14 01:29:55'),(3,'prueba','prueba','prueba','1515151515','413235678','prueba@prueba.com',NULL,NULL,'$2y$12$QL8Xrm7jqkwbWbMx8IrA0O7WIPD4PH.xKdA4mzjhPMqHC/yQZ7rI6',NULL,NULL,NULL,NULL,'2025-10-14 01:42:13','2025-10-14 01:42:13'),(4,'prueba','laravel12','php3','3123123123','121212121213','prueba@correo.com',NULL,NULL,'$2y$12$sIdaVsxsswrwM5fCZQ2XPOwuI/XMrkRjfv74X27IavPA0kv0KxKnK',NULL,NULL,NULL,NULL,'2025-10-15 01:55:15','2025-10-15 01:55:15'),(5,'Yaiv','prueba','prueba','5573584232','10039193','yaiv@usuario.unam',NULL,NULL,'$2y$12$ZiU2GOTcj.OBrxmPUiuIduWtKvBjGMMgeRqts6DaS4sX.zPxoT.1K',NULL,NULL,NULL,NULL,'2025-11-13 03:24:03','2025-11-13 06:05:28'),(6,'Ivan','Yair','Morales','5573584231','10039191','yair_gm@comunidad.unam.mx','profile-photos/a4F8WL72apSDMQOF5RPL4tkiVCVCDLt3IAzVyi5e.jpg',NULL,'$2y$12$B5siv6pzuU5XrTqYM..pc.jGx0Bjspb5URFK5BpzKxWDMv82lg6cS',NULL,NULL,NULL,NULL,'2025-11-26 03:09:28','2026-01-07 02:43:31'),(7,'Oscar Alejandro','Luna','Cruz','5538763153','1','oluna@materiales.unam.mx',NULL,NULL,'$2y$12$YrL3aeRdfA5GaKToVfauRu4EFJRxkL6X2n6FI7kss.n1W0wF6panW',NULL,NULL,NULL,NULL,'2025-11-26 03:42:30','2025-11-26 03:42:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-01-12 15:15:36
