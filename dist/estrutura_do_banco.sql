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
    `ano_fundacao` INT NOT NULL,
    `estadio` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `estado` VARCHAR(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `reg_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Inserção de dados
--

INSERT INTO `clubes` (`img`, `nome`, `ano_fundacao`, `estadio`, `estado`) VALUES
('https://upload.wikimedia.org/wikipedia/commons/thumb/4/43/Escudo_do_Galo.png/800px-Escudo_do_Galo.png', 'Atlético-MG', 1908, 'MRV', 'MG'),
('https://w7.pngwing.com/pngs/823/162/png-transparent-clube-de-regatas-flamengo-de-volta-redonda-rj-hd-logo-thumbnail.png', 'Flamengo', 1895, 'Maracanã', 'RJ'),
('https://w7.pngwing.com/pngs/979/1019/png-transparent-cr-vasco-da-gama-estadio-sao-januario-campeonato-brasileiro-serie-a-football-botafogo-de-futebol-e-regatas-football-emblem-logo-shield-thumbnail.png', 'Vasco', 1898, 'Januário', 'RJ'),
('https://w7.pngwing.com/pngs/106/873/png-transparent-cruzeiro-esporte-clube-sada-cruzeiro-volei-sociedade-esportiva-palmeiras-campeonato-brasileiro-serie-a-copa-libertadores-shields-logo-association-volleyball-thumbnail.png', 'Cruzeiro', 1921, 'Mineirão', 'MG'),
('https://w7.pngwing.com/pngs/55/510/png-transparent-sociedade-esportiva-palmeiras-campeonato-brasileiro-serie-a-sport-club-corinthians-paulista-copa-do-brasil-sub-17-football-sport-logo-sports-thumbnail.png', 'Palmeiras', 1914, 'Allianz', 'SP'),
('https://w7.pngwing.com/pngs/751/87/png-transparent-botafogo-hd-logo-thumbnail.png', 'Botafogo', 1904, 'Engenhão', 'RJ');



DROP TABLE IF EXISTS `jogadores`;
CREATE TABLE IF NOT EXISTS `jogadores` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `idade` INT(11) COLLATE utf8mb4_unicode_ci NOT NULL,
    `posicao` VARCHAR(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `clube` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `reg_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Inserção de dados
--


INSERT INTO `jogadores` (`nome`, `idade`, `posicao`, `clube`) VALUES 
('Fernandinho', 39, 'Meio-campista', 'Athletico Paranaense'),
('Joel Campbell', 32, 'Atacante', 'Atlético-GO'),
('Hulk', 38, 'Atacante', 'Atlético Mineiro'),
('Everton Ribeiro', 35, 'Meio-campista', 'Bahia'),
('Luiz Henrique', 23, 'Atacante', 'Botafogo'),
('Eduardo Sasha', 32, 'Atacante', 'Bragantino'),
('Memphis Depay', 30, 'Atacante', 'Corinthians'),
('Yannick Bolasie', 35, 'Atacante', 'Criciúma'),
('Matheus Pereira', 28, 'Meio-campista', 'Cruzeiro'),
('Walter', 37, 'Atacante', 'Cuiabá'),
('Giorgian De Arrascaeta', 30, 'Meio-campista', 'Flamengo'),
('Thiago Silva', 40, 'Zagueiro', 'Fluminense'),
('Juan Lucero', 33, 'Atacante', 'Fortaleza'),
('Martin Braithwaite', 33, 'Atacante', 'Grêmio'),
('Enner Valencia', 35, 'Atacante', 'Internacional'),
('Nenê', 43, 'Meio-campista', 'Juventude'),
('Estevão', 17, 'Meio-campista', 'Palmeiras'),
('Lucas Moura', 32, 'Atacante', 'São Paulo'),
('Pablo Vegetti', 36, 'Atacante', 'Vasco da Gama'),
('Wagner Leonardo', 25, 'Zagueiro', 'Vitória');



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
