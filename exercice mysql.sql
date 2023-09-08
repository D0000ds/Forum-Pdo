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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.categorie : ~4 rows (environ)
INSERT INTO `categorie` (`id_categorie`, `libelle`, `picture`, `description`) VALUES
	(1, 'Football', 'football.webp', 'Le meilleur sport de tout les temps'),
	(2, 'Mma', 'mma.jpg', 'ca va cogner'),
	(3, 'Basketball', 'basketball.jpg', 'Boing boing boing'),
	(4, 'Boxe', 'boxe.jpg', 'Tyson Goat');

-- Listage de la structure de table forum. messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id_messages` int NOT NULL AUTO_INCREMENT,
  `texte` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `datePublication` datetime DEFAULT NULL,
  `jaime` int DEFAULT NULL,
  `topic_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id_messages`),
  KEY `id_users` (`user_id`) USING BTREE,
  KEY `id_sujets` (`topic_id`) USING BTREE,
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`),
  CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.messages : ~2 rows (environ)
INSERT INTO `messages` (`id_messages`, `texte`, `datePublication`, `jaime`, `topic_id`, `user_id`) VALUES
	(1, 'Messi c\'est évident', '2023-08-30 08:48:33', NULL, 1, 2),
	(2, 'Halland', '2023-08-30 14:39:35', NULL, 1, 2);

-- Listage de la structure de table forum. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `creationdate` datetime DEFAULT NULL,
  `closed` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `likes` int DEFAULT NULL,
  `categorie_id` int NOT NULL,
  `user_id` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id_topic`) USING BTREE,
  KEY `id_users` (`user_id`) USING BTREE,
  KEY `id_categorie` (`categorie_id`) USING BTREE,
  CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`),
  CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.topic : ~0 rows (environ)
INSERT INTO `topic` (`id_topic`, `title`, `creationdate`, `closed`, `likes`, `categorie_id`, `user_id`, `description`) VALUES
	(1, 'Qui sera le futur BO?', '2023-08-30 08:47:05', 'ouvert', 5, 1, 1, 'Qui va gagner le Ballon d\'or a votre avis ??'),
	(2, 'Ronaldo WTFFF', '2023-08-30 14:30:02', 'ouvert', 81, 1, 2, 'Nan mais oHHHHHHH'),
	(3, 'Le bon gamin outsider ?', '2023-08-30 16:48:37', 'ouvert', 10, 2, 1, 'Il est outsider pour vous?');

-- Listage de la structure de table forum. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `mot_de_passe` varchar(150) NOT NULL,
  `DateInscription` datetime DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum.user : ~2 rows (environ)
INSERT INTO `user` (`id_user`, `pseudo`, `mot_de_passe`, `DateInscription`, `role`, `email`, `picture`) VALUES
	(1, 'admin', 'admin', '2023-08-30 08:43:15', 'admin', 'admin@admin.com', 'hack.png'),
	(2, 'User1', '123', '2023-08-30 08:45:24', 'verifier', 'user1@gmail.com', 'macdo.jpeg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
