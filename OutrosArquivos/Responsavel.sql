-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 27/03/2018 às 15:32
-- Versão do servidor: 5.7.21-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `AvisosEscolares`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Responsavel`
--

CREATE TABLE `Responsavel` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Responsavel`
--

INSERT INTO `Responsavel` (`id`, `nome`, `admin`, `email`, `senha`) VALUES
(1, 'Anibal de castro', 1, 'anibal@asd.com', '123'),
(2, 'Tadeu Silva', 0, 'tadeu@asd.org', '123'),
(3, 'Sandrinho da Silva', 0, 'asd@asd.com', '123'),
(6, 'Kibe frito', 0, 'asdfgh@asd.com', '1234'),
(11, 'Tarifador Maludo', 0, 'tarifador@asd.com', '097'),
(12, 'Tarifador Maludo', 1, 'tarifador@asd.com', '4456'),
(13, 'Tarifador Maludo', 1, 'tarifadors@dfg.com', '123345'),
(14, 'Fulan de tal da silva', 0, 'adsfasfasdf@asdasds.com', '1111111111111111111');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `Responsavel`
--
ALTER TABLE `Responsavel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `Responsavel`
--
ALTER TABLE `Responsavel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
