-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.19-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para scfr_database
CREATE DATABASE IF NOT EXISTS `scfr_database` /*!40100 DEFAULT CHARACTER SET utf16 COLLATE utf16_unicode_ci */;
USE `scfr_database`;

-- Copiando estrutura para tabela scfr_database.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela scfr_database.migrations: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela scfr_database.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela scfr_database.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Copiando estrutura para tabela scfr_database.profissoes
CREATE TABLE IF NOT EXISTS `profissoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- Copiando dados para a tabela scfr_database.profissoes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `profissoes` DISABLE KEYS */;
INSERT INTO `profissoes` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 'Professor', NULL, NULL),
	(2, 'Terceirizado', NULL, NULL);
/*!40000 ALTER TABLE `profissoes` ENABLE KEYS */;

-- Copiando estrutura para tabela scfr_database.reuniao_user
CREATE TABLE IF NOT EXISTS `reuniao_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reuniao_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- Copiando dados para a tabela scfr_database.reuniao_user: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reuniao_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `reuniao_user` ENABLE KEYS */;

-- Copiando estrutura para tabela scfr_database.reunioes
CREATE TABLE IF NOT EXISTS `reunioes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `local` varchar(50) COLLATE utf16_unicode_ci DEFAULT NULL,
  `data` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `hora` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- Copiando dados para a tabela scfr_database.reunioes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `reunioes` DISABLE KEYS */;
INSERT INTO `reunioes` (`id`, `nome`, `user_id`, `local`, `data`, `hora`, `status`, `created_at`, `updated_at`) VALUES
	(2, 'Titia Jani', 1, 'PHB', '12/12/2012', '12:00', 0, '2017-02-15 08:53:45', '2017-02-15 08:53:45'),
	(3, 'Minha reunião', 7, 'Sala 10', '12/12/2012', '10:00', 0, '2017-02-15 20:36:44', '2017-02-15 20:36:44');
/*!40000 ALTER TABLE `reunioes` ENABLE KEYS */;

-- Copiando estrutura para tabela scfr_database.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- Copiando dados para a tabela scfr_database.roles: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', NULL, NULL),
	(2, 'usuario', NULL, NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Copiando estrutura para tabela scfr_database.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profissao_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `sexo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `situacao` varchar(50) COLLATE utf8_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela scfr_database.users: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `profissao_id`, `role_id`, `sexo`, `situacao`, `created_at`, `updated_at`) VALUES
	(1, 'João Neto Castro', 'jneto111@gmail.com', '$2y$10$LqNhxuwYFj62zE4C4kSn4.qKHHrhZxryj5Z.fPYIEJdUbvpi8H.Ei', '8805BQBKnp9kgArdXa1OkJTquD3G9ZndLpItmwtb6sdyZX3KuX0RdujyLBg4', 2, 2, 'Masculino', '1', '2017-01-05 16:27:12', '2017-02-15 07:25:51'),
	(2, 'Administrador', 'admin@admin.com', '$2y$10$6HtQgaSzNTniNYdYuRzZTOBI9h016s5DZ6H/djY9ts6cJewBqhHpm', 'qFdOZxDZkcawCtOAP1lU0wu0hzCZHfEdCdzD8O4xxYrb6KuGVborQPm66E8y', NULL, 1, 'Feminino', '0', '2017-02-10 14:14:13', '2017-02-15 07:25:46'),
	(3, 'Marcelo Lucas', 'marcelo@gmail.com', '$2y$10$1p7GDYN03iSTpVoNqHiV5eXuG8N94Jy2T9fA/suZ3I6/02HCLuHIO', NULL, 1, 2, 'Masculino', '1', '2017-02-15 04:04:37', '2017-02-15 04:04:37'),
	(4, 'm', 'm@gmail.com', '$2y$10$xpcB56WWURGUv0cyjxA9O.keKzSVkpeHH5AqSDd9QB1ESKQvE7uhy', NULL, 1, 1, 'Masculino', '1', '2017-02-15 04:34:20', '2017-02-15 04:34:20'),
	(5, 'PV', 'pvcosta@gmail.com', '$2y$10$NKzgZzF9N90hPwScFDdgXuvapbw18w7gkiBJbCLJMyLNMk.syNreS', NULL, 1, 2, 'Masculino', '1', '2017-02-15 07:05:43', '2017-02-15 07:05:43'),
	(6, 'Marcelo', 'marcelin@gmail.com', '$2y$10$zfSXH/bmPYqKuERZl1mMJ.LNKo64StUB4q453OtIghM.lUUM/f3t2', NULL, 1, 1, 'Masculino', '1', '2017-02-15 08:54:36', '2017-02-15 08:54:36'),
	(7, 'Marcelin', 'marcelin@hotmail.com', '$2y$10$q.W/roGQ8kD/1ukZkRACyuZ0x2Xs/EqSXOdywNFY.f5ccTz9rSSSK', 'EOGXTOifW4nzvhk0PBapMXvl5knLKoFVSvTVfD8omF8G47LhRvFiSF2PSd9y', 1, 2, 'Masculino', '1', '2017-02-15 08:55:00', '2017-02-15 08:55:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
