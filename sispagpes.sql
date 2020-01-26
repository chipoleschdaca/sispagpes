-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26-Jan-2020 às 02:28
-- Versão do servidor: 8.0.19-cluster
-- versão do PHP: 7.2.27-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sispagpes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_historico_exant_estado_secao`
--

CREATE TABLE `tb_historico_exant_estado_secao` (
  `id` int NOT NULL,
  `data` datetime DEFAULT NULL,
  `id_exant` int DEFAULT NULL,
  `estado_anterior` varchar(35) DEFAULT NULL,
  `estado_novo` varchar(35) DEFAULT NULL,
  `secao_anterior` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `secao_novo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_historico_exant_estado_secao`
--

INSERT INTO `tb_historico_exant_estado_secao` (`id`, `data`, `id_exant`, `estado_anterior`, `estado_novo`, `secao_anterior`, `secao_novo`) VALUES
(3, '2020-01-23 19:00:03', 9, '2', '8', '8', '3'),
(4, '2020-01-25 19:06:43', 5, '14', '11', '2', '1'),
(6, '2020-01-25 20:35:32', 4, '2', '6', '1', '4'),
(7, '2020-01-25 20:35:38', 4, '6', '3', '4', '5'),
(8, '2020-01-25 20:35:45', 4, '3', '11', '5', '1'),
(9, '2020-01-25 23:58:48', 4, '11', '3', '1', '3'),
(10, '2020-01-02 00:00:00', 4, '3', '4', '3', '3'),
(12, '2018-06-06 00:00:00', 21, NULL, '14', NULL, '2'),
(13, '2018-08-01 00:00:00', 21, '14', '8', '2', '3');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_historico_exant_estado_secao`
--
ALTER TABLE `tb_historico_exant_estado_secao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_historico_exant_estado_secao`
--
ALTER TABLE `tb_historico_exant_estado_secao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
