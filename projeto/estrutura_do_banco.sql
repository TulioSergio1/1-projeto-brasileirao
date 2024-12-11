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
    `mascote` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `reg_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Inserção de dados
--

INSERT INTO `clubes` (`img`, `nome`, `ano_fundacao`, `estadio`, `estado`, `mascote`) VALUES
('https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/Clube_Atl%C3%A9tico_Mineiro_logo.svg/1810px-Clube_Atl%C3%A9tico_Mineiro_logo.svg.png', 'Atlético-MG', 1908, 'MRV', 'MG', 'Galo'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/2/2e/Flamengo_braz_logo.svg/800px-Flamengo_braz_logo.svg.png', 'Flamengo', 1895, 'Maracanã', 'RJ', 'Urubu'),
('https://i.pinimg.com/originals/f0/ce/a6/f0cea66bb03481b1ce0df3d74ab82b99.png', 'Vasco', 1898, 'Januário', 'RJ', 'Almirante'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Cruzeiro_Esporte_Clube_%28logo%29.svg/2048px-Cruzeiro_Esporte_Clube_%28logo%29.svg.png', 'Cruzeiro', 1921, 'Mineirão', 'MG', 'Raposa'),
('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRftzvajnhoNHvhzjPkCgx9HMTxPxkqOFy6QA&s', 'Palmeiras', 1914, 'Allianz', 'SP', 'Porco'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/5/52/Botafogo_de_Futebol_e_Regatas_logo.svg/1816px-Botafogo_de_Futebol_e_Regatas_logo.svg.png', 'Botafogo', 1904, 'Engenhão', 'RJ', 'Cachorro'),
('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ75Pqpqqlot09RQ6Ekxu_IjIghusCSh_v7Bg&s', 'Fluminense', 1902, 'Maracanã', 'RJ', 'Guerreirinho'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/e/e9/Fortaleza_EC_2018.png/1200px-Fortaleza_EC_2018.png', 'Fortaleza', 1918, 'Castelão', 'CE', 'Leão'),
('https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Brasao_do_Sao_Paulo_Futebol_Clube.svg/1200px-Brasao_do_Sao_Paulo_Futebol_Clube.svg.png', 'São Paulo', 1930, 'Morumbi', 'SP', 'Santo Paulo');


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
('Walter', 37, 'Goleiro', 'Cuiabá'),
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
