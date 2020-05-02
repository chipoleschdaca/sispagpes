-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 02/05/2020 às 02:47
-- Versão do servidor: 8.0.20-cluster
-- Versão do PHP: 7.2.30-1+ubuntu18.04.1+deb.sury.org+1

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
-- Estrutura para tabela `exercicioanterior`
--

CREATE TABLE `exercicioanterior` (
  `id` int NOT NULL,
  `saram` varchar(10) DEFAULT NULL,
  `cpf` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `requerente` varchar(75) DEFAULT NULL,
  `sacador` varchar(75) DEFAULT NULL,
  `nup` varchar(21) DEFAULT NULL,
  `data_criacao` date DEFAULT NULL,
  `direito_pleiteado` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `secao_origem` varchar(10) DEFAULT NULL,
  `obs` text,
  `data_saida` date DEFAULT NULL,
  `estado` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `secao_atual` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `exercicioanterior`
--

INSERT INTO `exercicioanterior` (`id`, `saram`, `cpf`, `requerente`, `sacador`, `nup`, `data_criacao`, `direito_pleiteado`, `secao_origem`, `obs`, `data_saida`, `estado`, `secao_atual`) VALUES
(28, '5', '5', '5', '2', '65465.465465/2020-54', '2020-01-09', '2', '2', 'Para lançamento no SISEX.', '2020-04-02', '13', '3'),
(31, '1', '1', '1', '2', '22222.222222/2222-22', '2020-01-22', '13', '4', '', '2020-02-12', '11', '1'),
(33, '4', '4', '4', '2', '33333.333333/3333-33', '2020-01-22', '6', '2', '', '2020-03-17', '11', '1');

--
-- Gatilhos `exercicioanterior`
--
DELIMITER $$
CREATE TRIGGER `historico_estado_secao_insert` AFTER INSERT ON `exercicioanterior` FOR EACH ROW BEGIN	
	INSERT INTO tb_historico_exant_estado_secao (data_anterior, data_novo, id_exant, estado_novo, secao_novo) VALUES (NEW.data_criacao, NEW.data_criacao, NEW.id, NEW.estado, NEW.secao_atual);	
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `historico_estado_secao_update` AFTER UPDATE ON `exercicioanterior` FOR EACH ROW BEGIN
	IF NEW.estado <> OLD.estado THEN
	INSERT INTO tb_historico_exant_estado_secao VALUES (NULL, OLD.data_saida, NEW.data_saida, NEW.id, OLD.estado, NEW.estado, OLD.secao_atual, NEW.secao_atual, NEW.obs);
	END IF;
END
$$
DELIMITER ;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `exercicioanterior`
--
ALTER TABLE `exercicioanterior`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `exercicioanterior`
--
ALTER TABLE `exercicioanterior`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
