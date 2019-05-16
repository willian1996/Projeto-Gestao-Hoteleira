-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 16-Maio-2019 às 02:57
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
-- Estrutura da tabela `apartamentos`
--

DROP TABLE IF EXISTS `apartamentos`;
CREATE TABLE IF NOT EXISTS `apartamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(10) NOT NULL,
  `camas` varchar(100) NOT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `piso` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `apartamentos`
--

INSERT INTO `apartamentos` (`id`, `numero`, `camas`, `categoria`, `piso`) VALUES
(8, '1', '1 casal, 2 solteiros', 'standard', '1º andar '),
(9, '2', '1 casal, 2 solteiros', 'standard', '1° andar '),
(10, '3', '1 casal, 2 solteiros', 'standard', '1º andar '),
(11, '4', '1 casal', 'standard', '1º andar '),
(12, '5', '1 casal', 'standard', '1º andar ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `email`, `senha`, `dataCadastro`) VALUES
(1, 'Willian', 'williansalesgabriel@hotmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2019-05-10 01:58:02'),
(6, 'Felipe', 'felipe@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2019-05-12 02:33:42');

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
  `status` tinyint(11) DEFAULT '1',
  `dataCadastro` datetime DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `CPF` (`CPF`),
  KEY `CPF_2` (`CPF`),
  KEY `autor` (`autor`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `hospedes`
--

INSERT INTO `hospedes` (`id`, `nome_completo`, `CPF`, `email`, `celular`, `telefone`, `status`, `dataCadastro`, `autor`) VALUES
(2, 'Marcos Antonio ', '14536585985', 'marcos@oul.com', '12997865656', '1238833040', 0, NULL, '1'),
(3, 'Rebeca Lorraine ', '32145698721', 'rebeca@gmail.com', '12998785667', '1238833040', 0, NULL, '1'),
(4, 'Geovana', '93158942437', 'geovana@gmail.com', '12345678912', '1234567891', 0, NULL, '1'),
(5, 'Nataliane', '92780017244', 'nataliane@gmail.com', '12788523655', '38834030', 1, NULL, '6'),
(6, 'Bruna de Oliveira Camargo', '81220936049', 'fulano@gmail.com', '12345678910', '1238833040', 1, NULL, '6'),
(7, 'Ciclano Alves Pereira', '12345678910', 'ciclano@gmail.com', '11996528999', '1238833040', 1, NULL, '6'),
(8, 'Elaine Oliveira', '35715945652', 'elaine@gmail.com', '13985661478', '1238833040', 1, NULL, '6'),
(9, 'Felipe Campos ', '74598256587', 'felipe@gmail.com', '15996417887', '1238833040', 1, NULL, '1'),
(10, 'Leonardo Soares', '12536578952', 'leonardo@gmail.com', '15996417887', '1238833040', 1, NULL, '1'),
(11, 'Vitoria Marques', '8597455265', 'vitoriamarqes@gmail.com', '15996417887', '1238833040', 1, NULL, '1'),
(12, 'Victor dos Santos ', '12332145625', 'victor@gmail.com', '12345678910', '1238833040', 1, NULL, '6'),
(13, 'Vagner dos Santos', '26702344880', 'vagnerdosa@hotmail.com', '123', '123', 1, NULL, '6'),
(15, 'Moura Fernandes ', '47789952256', 'moura@gmail.com', '12996417887', '1238833040', 1, NULL, '6'),
(16, 'Joao Gomes ', '15975382545', 'joao@gmail.com', '12996417887', '1238833040', 1, NULL, '6'),
(33, 'Willian Sales', '43593584824', 'williansalesgabriel@hotmail.com', '12996417887', '1238834030', 1, '2019-05-10 01:43:38', '1'),
(17, 'Joao da Nica ', '14778963125', 'joaodanica@gmail.com', '12996417887', '1238833040', 1, NULL, '1'),
(18, 'Rayane Sales', '41782556556', 'rayane@gmail.com', '12996417887', '1238833040', 1, NULL, '1'),
(19, 'Thiago Pereira', '12132345625', 'thiagopereira@gmail.com', '12996417878', '38834030', 0, NULL, '6'),
(34, 'Joao Cleber GonÃ§ales', '62782890166', 'joaocleber@gmail.com', '12996417878', '1238834030', 1, '2019-05-10 02:58:01', '6'),
(35, 'Magno Malta', '33778177788', 'magno@gmail.com', '12996417878', '1238834030', 1, '2019-05-10 03:34:51', '1'),
(36, 'Silvania da Silva', '78548960116', 'silvania@hotmail.com', '12996417887', '1238833040', 1, '2019-05-12 03:23:00', '1'),
(37, 'Felipa do Carmo', '20957982526', 'felipe@hotmail.com', '12996417878', '1238834030', 1, '2019-05-12 04:13:35', '1'),
(38, 'Marquinhos Silva', '61150678550', 'marquinhos@hotmail.com', '12996417878', '1238839090', 1, '2019-05-12 04:16:32', '6'),
(39, 'Marco Aurelio dos Santos', '80605506329', 'marcoaurelio@gmail.com', '12996417878', '1238873040', 1, '2019-05-13 04:13:36', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
