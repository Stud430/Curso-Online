-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Abr-2020 às 21:43
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cursos_online`
--
CREATE DATABASE IF NOT EXISTS `cursos_online` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cursos_online`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos` (
  `id` int(10) UNSIGNED NOT NULL,
  `curso` varchar(50) NOT NULL,
  `plataforma` varchar(30) NOT NULL,
  `duracao` varchar(25) DEFAULT NULL,
  `endereco` varchar(150) NOT NULL,
  `inicio` varchar(10) DEFAULT NULL,
  `termino` varchar(10) DEFAULT NULL,
  `usuario` varchar(6) NOT NULL,
  `senha` varchar(6) NOT NULL,
  `status_curso` varchar(15) NOT NULL,
  `created` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `curso`, `plataforma`, `duracao`, `endereco`, `inicio`, `termino`, `usuario`, `senha`, `status_curso`, `created`) VALUES
(1, 'abc', 'abc', 'abc', 'abc', '10/04/2020', '11/04/2020', 'abc', 'abc', 'A Fazer', '8/4/2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
