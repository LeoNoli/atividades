-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 24-Nov-2020 às 22:12
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `instrumentosmusicais`
--
CREATE DATABASE IF NOT EXISTS `instrumentosmusicais` DEFAULT CHARACTER SET ucs2 COLLATE ucs2_bin;
USE `instrumentosmusicais`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cor`
--

CREATE TABLE IF NOT EXISTS `cor` (
  `id_cor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE ucs2_bin NOT NULL,
  PRIMARY KEY (`id_cor`)
) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 COLLATE=ucs2_bin AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `cor`
--

INSERT INTO `cor` (`id_cor`, `nome`) VALUES
(10, 'azul');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrumento`
--

CREATE TABLE IF NOT EXISTS `instrumento` (
  `id_instrumento` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cor` int(11) NOT NULL,
  `nome` varchar(100) COLLATE ucs2_bin NOT NULL,
  `cod_modelo` int(11) NOT NULL,
  PRIMARY KEY (`id_instrumento`),
  UNIQUE KEY `nome` (`nome`),
  UNIQUE KEY `cod_modelo_2` (`cod_modelo`),
  UNIQUE KEY `cod_cor_2` (`cod_cor`),
  KEY `cod_cor` (`cod_cor`),
  KEY `cod_modelo` (`cod_modelo`)
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE IF NOT EXISTS `modelo` (
  `id_modelo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE ucs2_bin NOT NULL,
  PRIMARY KEY (`id_modelo`)
) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 COLLATE=ucs2_bin AUTO_INCREMENT=4 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `instrumento`
--
ALTER TABLE `instrumento`
  ADD CONSTRAINT `instrumento_ibfk_1` FOREIGN KEY (`cod_cor`) REFERENCES `cor` (`id_cor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `instrumento_ibfk_2` FOREIGN KEY (`cod_modelo`) REFERENCES `modelo` (`id_modelo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
