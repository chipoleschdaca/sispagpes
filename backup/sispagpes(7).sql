-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 04-Maio-2020 às 23:10
-- Versão do servidor: 8.0.20-cluster
-- versão do PHP: 7.2.30-1+ubuntu18.04.1+deb.sury.org+1

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
-- Estrutura da tabela `exercicioanterior`
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
-- Acionadores `exercicioanterior`
--
DELIMITER $$
CREATE TRIGGER `historico_estado_secao_insert` AFTER INSERT ON `exercicioanterior` FOR EACH ROW BEGIN
	INSERT INTO tb_historico_exant_estado_secao (data_anterior, data_novo, id_exant, responsavel, estado_novo, secao_novo) VALUES (NEW.data_criacao, NEW.data_criacao, NEW.id, NEW.sacador, NEW.estado, NEW.secao_atual);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `historico_estado_secao_update` AFTER UPDATE ON `exercicioanterior` FOR EACH ROW BEGIN
	IF NEW.estado <> OLD.estado THEN
	INSERT INTO tb_historico_exant_estado_secao VALUES (NULL, OLD.data_saida, NEW.data_saida, NEW.id, NEW.sacador, OLD.estado, NEW.estado, OLD.secao_atual, NEW.secao_atual, NEW.obs);
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `militares`
--

CREATE TABLE `militares` (
  `id` int NOT NULL,
  `saram` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cpf` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `posto` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nomeguerra` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `senha` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `perfil` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfis`
--

CREATE TABLE `perfis` (
  `id` int NOT NULL,
  `perfil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `requerentes`
--

CREATE TABLE `requerentes` (
  `id` int NOT NULL,
  `saram` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `posto` varchar(10) NOT NULL,
  `situacao` varchar(10) NOT NULL,
  `nome` varchar(65) NOT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `email` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_direitoPleiteado_exant`
--

CREATE TABLE `tb_direitoPleiteado_exant` (
  `id` int NOT NULL,
  `direito` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_estado_exant`
--

CREATE TABLE `tb_estado_exant` (
  `id` int NOT NULL,
  `estado` varchar(35) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_historico_exant_estado_secao`
--

CREATE TABLE `tb_historico_exant_estado_secao` (
  `id` int NOT NULL,
  `data_anterior` datetime DEFAULT NULL,
  `data_novo` datetime DEFAULT NULL,
  `id_exant` int DEFAULT NULL,
  `responsavel` int DEFAULT NULL,
  `estado_anterior` varchar(35) DEFAULT NULL,
  `estado_novo` varchar(35) DEFAULT NULL,
  `secao_anterior` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `secao_novo` varchar(10) DEFAULT NULL,
  `obs_exant` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_posto`
--

CREATE TABLE `tb_posto` (
  `id` int NOT NULL,
  `posto` varchar(10) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_secoes_exant`
--

CREATE TABLE `tb_secoes_exant` (
  `id` int NOT NULL,
  `secao` varchar(10) NOT NULL,
  `prazo_exant` int DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `exercicioanterior`
--
ALTER TABLE `exercicioanterior`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `militares`
--
ALTER TABLE `militares`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `perfis`
--
ALTER TABLE `perfis`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `requerentes`
--
ALTER TABLE `requerentes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_direitoPleiteado_exant`
--
ALTER TABLE `tb_direitoPleiteado_exant`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_estado_exant`
--
ALTER TABLE `tb_estado_exant`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_historico_exant_estado_secao`
--
ALTER TABLE `tb_historico_exant_estado_secao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_posto`
--
ALTER TABLE `tb_posto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_secoes_exant`
--
ALTER TABLE `tb_secoes_exant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `exercicioanterior`
--
ALTER TABLE `exercicioanterior`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `militares`
--
ALTER TABLE `militares`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `perfis`
--
ALTER TABLE `perfis`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `requerentes`
--
ALTER TABLE `requerentes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_direitoPleiteado_exant`
--
ALTER TABLE `tb_direitoPleiteado_exant`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_estado_exant`
--
ALTER TABLE `tb_estado_exant`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_historico_exant_estado_secao`
--
ALTER TABLE `tb_historico_exant_estado_secao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_posto`
--
ALTER TABLE `tb_posto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_secoes_exant`
--
ALTER TABLE `tb_secoes_exant`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
