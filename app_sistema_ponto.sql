-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Out-2021 às 00:38
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `app_sistema_ponto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `fun_codigo` int(11) NOT NULL,
  `fun_nome` varchar(100) NOT NULL,
  `fun_cpf` varchar(12) NOT NULL,
  `fun_cargo` varchar(20) NOT NULL,
  `fun_status` char(1) NOT NULL COMMENT 'A - Ativo / I - Inativo',
  `fun_senha` varchar(15) NOT NULL,
  `fun_admin` char(1) NOT NULL,
  `fun_fone` varchar(12) NOT NULL,
  `fun_data_admissao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`fun_codigo`, `fun_nome`, `fun_cpf`, `fun_cargo`, `fun_status`, `fun_senha`, `fun_admin`, `fun_fone`, `fun_data_admissao`) VALUES
(1, 'Gabriel Moreira', '04152559020', 'Suporte', 'A', '123456', 'S', '53999513228', '2021-10-16 12:45:10'),
(2, 'Diego Taborda', '12345679101', 'Teste', 'A', '111', 'S', '4284218667', '2021-10-16 12:45:10'),
(4, 'Mario Sergio', '04152559020', 'Desenvolvedor', 'A', '123456', 'N', '13981911233', '2021-10-17 10:13:04'),
(6, 'Bruno Leria', '05598633250', 'Desenvolvedor', 'A', '123456', 'N', '4288562626', '2021-10-17 11:46:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario_ponto`
--

CREATE TABLE `funcionario_ponto` (
  `fup_codigo` int(11) NOT NULL,
  `fup_fk_fun_codigo` int(11) NOT NULL,
  `fup_data_entrada` time DEFAULT NULL,
  `fup_data_saida` time DEFAULT NULL,
  `fup_data` date DEFAULT NULL,
  `fup_hora_pausa` time DEFAULT NULL,
  `fup_hora_retorno` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario_ponto`
--

INSERT INTO `funcionario_ponto` (`fup_codigo`, `fup_fk_fun_codigo`, `fup_data_entrada`, `fup_data_saida`, `fup_data`, `fup_hora_pausa`, `fup_hora_retorno`) VALUES
(1, 2, '20:45:30', '21:05:47', NULL, '00:00:00', '00:00:00'),
(2, 2, '20:46:34', '21:05:47', NULL, '00:00:00', '00:00:00'),
(3, 2, '20:46:36', '21:05:47', NULL, '00:00:00', '00:00:00'),
(4, 2, '20:47:49', '21:17:07', '2021-10-20', '00:00:00', '00:00:00'),
(5, 2, '20:47:51', '21:05:47', '0000-00-00', '00:00:00', '00:00:00'),
(8, 2, '16:00:13', '16:23:43', '2021-10-24', '16:25:05', '16:40:36'),
(9, 1, '16:42:16', '16:42:28', '2021-10-24', '16:42:19', '16:42:24'),
(10, 4, '16:46:57', '16:47:06', '2021-10-24', '16:47:00', '16:47:03');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`fun_codigo`);

--
-- Índices para tabela `funcionario_ponto`
--
ALTER TABLE `funcionario_ponto`
  ADD PRIMARY KEY (`fup_codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `fun_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `funcionario_ponto`
--
ALTER TABLE `funcionario_ponto`
  MODIFY `fup_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
