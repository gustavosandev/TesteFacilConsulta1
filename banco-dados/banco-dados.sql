-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Nov-2020 às 03:31
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste_fc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL COMMENT 'id da tabela médico\n',
  `data_horario` datetime NOT NULL,
  `horario_agendado` int(1) DEFAULT 1 COMMENT 'O atributo horario_agendado da tabela horario deve corresponder a\r\ndisponibilidade do horário:\r\n- Se for 1 (um) o horário já foi agendado e está ocupado;\r\n- Se for 0 (zero) o horário está liberado para o agendamento;\r\n',
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_alteracao` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `horario`
--

INSERT INTO `horario` (`id`, `id_medico`, `data_horario`, `horario_agendado`, `data_criacao`, `data_alteracao`) VALUES
(4, 2, '2020-11-25 23:15:00', 0, '2020-11-26 01:15:14', NULL),
(6, 1, '2020-11-27 22:22:00', 1, '2020-11-26 01:55:54', '2020-11-26 05:55:54'),
(8, 1, '2020-11-26 22:22:00', 0, '2020-11-26 01:22:29', NULL),
(9, 1, '2020-12-04 22:22:00', 0, '2020-11-26 01:22:57', NULL),
(10, 1, '2020-12-04 22:22:00', 0, '2020-11-26 01:23:01', NULL),
(11, 2, '2020-12-05 22:23:00', 0, '2020-11-26 01:23:39', NULL),
(12, 2, '2020-11-26 22:23:00', 0, '2020-11-26 01:23:45', NULL),
(13, 2, '2020-12-02 22:23:00', 0, '2020-11-26 01:23:50', NULL),
(14, 2, '2020-12-04 22:41:00', 0, '2020-11-26 01:41:26', NULL),
(15, 1, '2020-12-10 22:42:00', 0, '2020-11-26 01:42:22', NULL),
(16, 1, '2020-11-27 22:42:00', 0, '2020-11-26 01:42:26', NULL),
(17, 1, '2020-12-12 22:42:00', 1, '2020-11-26 02:06:03', '2020-11-26 06:06:03'),
(18, 1, '2020-11-27 22:42:00', 0, '2020-11-26 01:42:34', NULL),
(19, 1, '2020-12-10 01:42:00', 0, '2020-11-26 01:43:02', NULL),
(20, 1, '2020-11-02 23:07:00', 0, '2020-11-26 02:07:53', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

CREATE TABLE `medico` (
  `id` int(11) NOT NULL,
  `email` varchar(145) NOT NULL,
  `nome` varchar(145) NOT NULL,
  `senha` varchar(145) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_alteracao` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `medico`
--

INSERT INTO `medico` (`id`, `email`, `nome`, `senha`, `data_criacao`, `data_alteracao`) VALUES
(1, 'gustavosandev@outlook.com', 'Gustavo Lima San Martins', 'aa1bf4646de67fd9086cf6c79007026c', '2020-11-25 01:18:39', NULL),
(2, 'drjoaoagusto@gmail.com', 'Dr. João Augusto de Alcântara', '09151a42659cfc08aff86820f973f640', '2020-11-25 22:33:52', '2020-11-26 02:33:52');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_horario_medico_idx` (`id_medico`);

--
-- Índices para tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_horario_medico` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
