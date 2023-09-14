-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour forum
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum`;

-- Listage de la structure de table forum. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  `picture` text,
  `description` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.categorie : ~4 rows (environ)
INSERT INTO `categorie` (`id_categorie`, `libelle`, `picture`, `description`) VALUES
	(1, 'Footballs', 'football.webp', 'Le meilleur sport de tout les tempss'),
	(3, 'Basketball', 'basketball.jpg', 'Boing boing boing'),
	(4, 'Boxe', 'boxe.jpg', 'Tyson Goat');

-- Listage de la structure de table forum. messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id_messages` int NOT NULL AUTO_INCREMENT,
  `texte` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `datePublication` datetime DEFAULT NULL,
  `likes` int DEFAULT NULL,
  `topic_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id_messages`),
  KEY `id_users` (`user_id`) USING BTREE,
  KEY `id_sujets` (`topic_id`) USING BTREE,
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`) ON DELETE CASCADE,
  CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.messages : ~2 rows (environ)
INSERT INTO `messages` (`id_messages`, `texte`, `datePublication`, `likes`, `topic_id`, `user_id`) VALUES
	(4, 'il a pas tord', '2023-09-14 11:32:10', 141, 6, 1),
	(5, 'mbappe meilleur', '2023-09-14 11:32:34', 44, 5, 4),
	(7, 'test', '2023-09-14 12:11:56', 25, 5, 1);

-- Listage de la structure de table forum. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `creationdate` datetime NOT NULL,
  `closed` tinyint NOT NULL DEFAULT '0',
  `likes` int DEFAULT NULL,
  `categorie_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_topic`) USING BTREE,
  KEY `id_users` (`user_id`) USING BTREE,
  KEY `id_categorie` (`categorie_id`) USING BTREE,
  CONSTRAINT `FK_topic_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`) ON DELETE SET NULL,
  CONSTRAINT `FK_topic_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.topic : ~3 rows (environ)
INSERT INTO `topic` (`id_topic`, `title`, `creationdate`, `closed`, `likes`, `categorie_id`, `user_id`, `description`) VALUES
	(5, 'Messssi t esss nul', '2023-09-14 11:28:05', 0, 59, 1, 1, 'il est vraiment pas bon'),
	(6, 'tyson fury', '2023-09-14 11:28:31', 0, 48, 4, 4, 'meilleure que NgaNULLL'),
	(7, 'j ai pas d\'idée', '2023-09-14 11:29:37', 0, 28, 3, 2, 'tjr pas');

-- Listage de la structure de table forum. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `DateInscription` datetime DEFAULT NULL,
  `role` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.user : ~3 rows (environ)
INSERT INTO `user` (`id_user`, `pseudo`, `password`, `DateInscription`, `role`, `email`, `picture`) VALUES
	(1, 'admin', '$2y$10$2lRBeSnHIjUowrFxCwsyYe5lAw/NtgcHMRRWF4PPqOO.UNTNWT36y', '2023-08-30 08:43:15', 'admin', 'admin@admin.com', 'hack.png'),
	(2, 'User1', '$2y$10$kD5XW2ESKhu1gHEyG9aOvOuO22TgX88kkQEZWkF8veCtoo18FP1BK', '2023-08-30 08:45:24', 'verifier', 'user1@gmail.com', 'macdo.jpeg'),
	(4, 'Roberto123', '$2y$10$O1YeIfCTKVCLgZA1VXZQ.O4UwLVQ7/.8Nh1bX0k7GldugCCCXlzfW', '2023-09-12 12:23:31', 'verifier', 'Roberto123@gmail.com', 'fiat500.jpg'),
	(5, 'user2', '$2y$10$TyJubCq6jKYV3ZBGTbRrSOO8qxFvGI6MzSB.VMEJWPPNivXkxMmVm', '2023-09-14 01:00:48', 'verifier', 'dsddkslk@gmail.com', 'Tropico-6.jpg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
