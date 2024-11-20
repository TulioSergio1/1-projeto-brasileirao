-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2019 at 11:41 AM
-- Server version: 5.7.27-0ubuntu0.19.04.1
-- PHP Version: 7.2.19-0ubuntu0.19.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brasileiraoDB`
--
CREATE DATABASE IF NOT EXISTS `brasileiraoDB` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `brasileiraoDB`;

-- --------------------------------------------------------

--
-- Table structure for table `artigos`
--

DROP TABLE IF EXISTS `clubes`;
CREATE TABLE IF NOT EXISTS `clubes` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `img` LONGBLOB NOT NULL,
    `nome` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `ano_fundacao` YEAR NOT NULL,
    `estadio` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `estado` VARCHAR(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `reg_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Inserção de dados
--

INSERT INTO `clubes` (`nome`, `ano_fundacao`, `estadio`, `estado`) VALUES
('Flamengo', 1895, 'Maracanã', 'Rio de Janeiro');

DROP TABLE IF EXISTS `jogadores`;
CREATE TABLE IF NOT EXISTS `jogadores` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `idade` INT(11) COLLATE utf8mb4_unicode_ci NOT NULL,
    `posicao` VARCHAR(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `img` LONGBLOB NOT NULL,
    `clube` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `reg_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Inserção de dados
--


INSERT INTO `jogadores` (`nome`, `idade`, `posicao`, `clube`) VALUES 
('Pedro', '27', 'ATA', 'Flamengo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
