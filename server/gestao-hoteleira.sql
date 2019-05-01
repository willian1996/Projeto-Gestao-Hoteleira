-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 01-Maio-2019 às 09:11
-- Versão do servidor: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestao-hoteleira`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `hospedes`
--

DROP TABLE IF EXISTS `hospedes`;
CREATE TABLE IF NOT EXISTS `hospedes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(255) NOT NULL,
  `CPF` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `celular` varchar(11) NOT NULL,
  `telefone` varchar(10) DEFAULT NULL,
  `reserva_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `hospedes`
--

INSERT INTO `hospedes` (`id`, `nome_completo`, `CPF`, `email`, `celular`, `telefone`, `reserva_id`) VALUES
(1, 'Willian Sales Gabriel ', '43593584824', 'williansalesgabriel@hotmail.com', '12996417887', NULL, NULL),
(2, 'Marcos Antonio ', '93982871723', 'marcos@oul.com', '12997865656', NULL, NULL),
(3, 'Rebeca Lorraine ', '71782893956', 'rebeca@gmail.com', '12998785667', NULL, NULL),
(4, 'Rayane Sales', '45612378925', 'rayane@gmail.com', '12996568554', NULL, NULL),
(5, 'Nataliane Silva RebouÃ§as', '12345678985', 'nataliane@gmail.com', '12788523655', NULL, NULL),
(6, 'Fulano de Tal ', '78958265417', 'fulano@gmail.com', '12345678910', '1238833040', NULL),
(7, 'Ciclano Alves Pereira', '15935745612', 'ciclano@gmail.com', '11996528999', '1238833040', NULL),
(8, 'Elaine Oliveira', '35715945652', 'elaine@gmail.com', '13985661478', '1238833040', NULL),
(9, 'Felipe Campos ', '74598256587', 'felipe@gmail.com', '15996417887', '1238833040', NULL),
(10, 'Leonardo Soares', '12536578952', 'leonardo@gmail.com', '15996417887', '1238833040', NULL),
(11, 'Vitoria Marques', '8597455265', 'vitoriamarqes@gmail.com', '15996417887', '1238833040', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
