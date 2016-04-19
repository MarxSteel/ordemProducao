-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Fev-2016 às 14:42
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "-02:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `login1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_373`
--

CREATE TABLE IF NOT EXISTS `cadastro_373` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Modelo` varchar(50) NOT NULL,
  `NumSerie` varchar(10) NOT NULL,
  `DataCadastro` date NOT NULL,
  `HoraCadastro` time NOT NULL,
  `UserCadastro` varchar(50) NOT NULL,
  `LeiMifare` varchar(50) NOT NULL,
  `LeiProx` varchar(10) NOT NULL,
  `LeiBarras` varchar(20) NOT NULL,
  `LeiBio` varchar(20) NOT NULL,
  `Firmware` varchar(10) NOT NULL,
  `reservado` varchar(10) NOT NULL,
  `DataRetorna` datetime DEFAULT NULL,
  `HoraRetorna` time NOT NULL,
  `DataLibera` datetime DEFAULT NULL,
  `HoraLibera` time NOT NULL,
  `Display` varchar(20) NOT NULL,
  `Observa` text NOT NULL,
  `Status` int(2) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NumSerie` (`NumSerie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `cadastro_373`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_1510`
--

CREATE TABLE IF NOT EXISTS `cadastro_1510` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NumREP` varchar(20) NOT NULL,
  `Modelo` varchar(20) NOT NULL,
  `DataCadastro` date NOT NULL,
  `HoraCadastro` time NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Observa` text NOT NULL,
  `Leitoras` varchar(230) NOT NULL,
  `DataRetorna` datetime DEFAULT NULL,
  `HoraRetorna` time DEFAULT NULL,
  `DataLiberaReteste` datetime DEFAULT NULL,
  `HoraLiberaReteste` time DEFAULT NULL,
  `UserCadastro` varchar(50) NOT NULL,
  `HOS` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `1510_NumREP` (`NumREP`),
  UNIQUE KEY `NumREP` (`NumREP`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `cadastro_1510`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_acesso`
--

CREATE TABLE IF NOT EXISTS `cadastro_acesso` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Modelo` varchar(50) NOT NULL,
  `NumSerie` varchar(10) NOT NULL,
  `DataCadastro` datetime DEFAULT NULL,
  `HoraCadastro` time NOT NULL,
  `UserCadastro` varchar(50) NOT NULL,
  `LeiMifare` varchar(50) NOT NULL,
  `LeiProx` varchar(10) NOT NULL,
  `LeiBarras` varchar(20) NOT NULL,
  `LeiBio` varchar(20) NOT NULL,
  `Firmware` varchar(10) NOT NULL,
  `reservado` varchar(10) NOT NULL,
  `DataRetorna` datetime DEFAULT NULL,
  `HoraRetorna` time NOT NULL,
  `DataLibera` datetime DEFAULT NULL,
  `HoraLibera` time NOT NULL,
  `Display` varchar(20) NOT NULL,
  `Observa` text NOT NULL,
  `Status` int(2) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `NumSerie` (`NumSerie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `cadastro_acesso`
--


--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nivel` int(1) unsigned NOT NULL DEFAULT '1' COMMENT 'Normal (1) e Administrador (2)',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `cadastro` datetime NOT NULL,
  `MontOK` varchar(20) NOT NULL,
  `MontNOK` varchar(20) DEFAULT NULL,
  `P2` int(2) DEFAULT NULL,
  `P2M` int(2) DEFAULT NULL,
  `P2R` int(11) DEFAULT NULL,
  `P2A` int(2) NOT NULL,
  `P2Rel` varchar(15) DEFAULT NULL,
  `MeuRFID` varchar(20) NOT NULL,
  `MeuABA` varchar(20) NOT NULL,
  `MeuHID` varchar(20) NOT NULL,
  `MeuMifare` varchar(20) NOT NULL,
  `MeuIndala` int(20) NOT NULL,
  `IndalaTeste` int(20) NOT NULL,
  `MetaPrevista` int(40) NOT NULL,
  `MetaRealizada` int(20) NOT NULL,
  `MeuIP` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `niveis` (`nivel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `email`, `nivel`, `ativo`, `cadastro`, `MontOK`, `MontNOK`, `P2`, `P2M`, `P2R`, `P2A`, `P2Rel`, `MeuRFID`, `MeuABA`, `MeuHID`, `MeuMifare`, `MeuIndala`, `IndalaTeste`, `MetaPrevista`, `MetaRealizada`, `MeuIP`) VALUES
(16, 'Cleverson', 'cleverson', '117ea316eb303b026a588ecbd221856b9339fc65', '', 2, 1, '0000-00-00 00:00:00', '', NULL, 1, 1, 0, 0, NULL, '06043745', '00261996980961', '0', '822036073', 0, 0, 0, 0, '192.168.12.103'),
(2, 'Marx Medeiros', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@demo.com.br', 2, 1, '2009-07-24 08:40:40', '5', '4', 1, 1, 1, 1, '1', '11111', '22222', '221321321', '232321', 0, 0, 40, 5, '192.168.0.200'),
(13, 'Gabriela Aparecida Sales', 'gabrielasales', 'a91b77a04e1f77376b64b684a8d89b3961214c38', '', 2, 1, '0000-00-00 00:00:00', '', NULL, 1, 1, 0, 0, NULL, '21026300', '00188992349884', '17311384', '3731946707', 0, 0, 0, 0, '192.168.12.112'),
(12, 'Max Javier Rodriguez Naupari', 'maxjavier', '929cfe39df4c8aabb4e52d30bc5ff110d2352a51', '', 2, 1, '0000-00-00 00:00:00', '', NULL, 1, 1, 0, 0, NULL, '05524825', '00515399704825', '08930575', '2897983393', 0, 0, 0, 0, '192.168.12.105'),
(11, 'Andressa de Oliveira', 'andressa', '4c2e0fb39aa5dd9e9601ecab20ff5b9865bf16ab', '', 2, 1, '0000-00-00 00:00:00', '', NULL, 1, 1, 0, 0, NULL, '05931244', '00261996902924', '0', '2115686509', 0, 0, 0, 0, '192.168.12.40'),
(3, 'Luiz Ricardo', 'luizricardo', 'ab25a8d441348a3cb2301a31b47ba04589b0e53c', '', 2, 1, '0000-00-00 00:00:00', '', NULL, 1, 1, 0, 0, NULL, '14046000', '0034360664720', '01605704', '4057865205', 0, 0, 0, 0, '192.168.12.102'),
(14, 'Bianca Cit', 'biancacit', 'b52873ea17c78a628c028390fa9df8a2d33d27a5', '', 2, 1, '0000-00-00 00:00:00', '', NULL, 1, 1, 0, 0, NULL, '06233359', '00506810237519', '0', '3731843075', 0, 0, 0, 0, '192.168.12.111'),
(15, 'Silvana Antunes', 'silvana', '2e6f9b0d5885b6010f9167787445617f553a735f', '', 2, 1, '0000-00-00 00:00:00', '', NULL, 1, 1, 0, 0, NULL, '12953424', '00343605891248', '39355', '1261104534', 0, 0, 0, 0, '192.12.104'),
(17, 'Graiane Ferreira dos Santos', 'graciane.santos', '0cb36aa93d31ecd0911915628862fd79ed16a5a4', '', 2, 1, '0000-00-00 00:00:00', '', NULL, 1, 1, 1, 0, NULL, '06556522', '0052399032674', '1', '3731619091', 0, 0, 0, 0, '192.168.0.200'),
(18, 'Evellyn Cinara da Cruz Cordeiro', 'evellyn', 'a6990ed96e2c5acac92acdcc3f83ba4e2893ad76', '', 2, 1, '0000-00-00 00:00:00', '', NULL, 1, 1, 1, 0, NULL, '05518336', '00515399698336', '21320049', '1789339845', 0, 0, 0, 0, '192.168.12.40');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
