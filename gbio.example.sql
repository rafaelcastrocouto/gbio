-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2026 at 09:46 PM
-- Server version: 10.6.22-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gbio`
--

-- --------------------------------------------------------

--
-- Table structure for table `abastecimentognvs`
--

CREATE TABLE `abastecimentognvs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `instituicao_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `saida` datetime NOT NULL,
  `motorista` varchar(32) DEFAULT '',
  `rg` varchar(16) DEFAULT '',
  `placa` varchar(32) NOT NULL DEFAULT '',
  `p_inicial` varchar(16) DEFAULT '',
  `p_final` varchar(16) DEFAULT '',
  `volume` varchar(16) DEFAULT '',
  `observacoes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `abastecimentognvs`
--

INSERT INTO `abastecimentognvs` (`id`, `user_id`, `instituicao_id`, `cliente_id`, `saida`, `motorista`, `rg`, `placa`, `p_inicial`, `p_final`, `volume`, `observacoes`) VALUES
(1, 1, 1, 1, '2025-10-13 00:00:00', 'Rafael', '9999999999', 'LMZ-7E95', '20', '250', '146.4', 'gnv1');

-- --------------------------------------------------------

--
-- Table structure for table `abastecimentos`
--

CREATE TABLE `abastecimentos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `instituicao_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `controle` int(11) NOT NULL,
  `nf` varchar(32) NOT NULL,
  `certificado` varchar(32) DEFAULT '',
  `inicio` timestamp NOT NULL DEFAULT current_timestamp(),
  `fim` timestamp NOT NULL DEFAULT current_timestamp(),
  `saida` date NOT NULL DEFAULT '0000-00-00',
  `placa` varchar(32) NOT NULL DEFAULT '',
  `p_inicial` varchar(16) DEFAULT '',
  `p_final` varchar(16) DEFAULT '',
  `carregamento` varchar(16) DEFAULT '',
  `o2` varchar(16) DEFAULT '',
  `n2` varchar(16) DEFAULT '',
  `ch4` varchar(16) DEFAULT '',
  `co2` varchar(16) DEFAULT '',
  `soma` varchar(16) DEFAULT '',
  `densidade` varchar(16) DEFAULT '',
  `ponto` varchar(16) DEFAULT '',
  `wobbe` varchar(16) DEFAULT '',
  `pcs` varchar(16) DEFAULT '',
  `ch4_media` varchar(16) DEFAULT '',
  `co2_media` varchar(16) DEFAULT '',
  `o2_media` varchar(16) DEFAULT '',
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `abastecimentos`
--

INSERT INTO `abastecimentos` (`id`, `user_id`, `instituicao_id`, `cliente_id`, `controle`, `nf`, `certificado`, `inicio`, `fim`, `saida`, `placa`, `p_inicial`, `p_final`, `carregamento`, `o2`, `n2`, `ch4`, `co2`, `soma`, `densidade`, `ponto`, `wobbe`, `pcs`, `ch4_media`, `co2_media`, `o2_media`, `observacoes`) VALUES
(1, 1, 1, 1, 314, '12228', 'CQ092025-314', '2025-11-10 22:47:57', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', '1o abastecimento!!! lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum'),
(2, 1, 1, 1, 315, '12228', 'CQ092025-314', '2025-11-11 15:37:51', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(3, 1, 1, 2, 316, '12228', 'CQ092025-314', '2025-11-11 15:37:54', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(4, 1, 1, 1, 317, '12228', 'CQ092025-314', '2025-11-11 15:37:57', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(5, 1, 1, 1, 318, '12228', 'CQ092025-314', '2025-11-10 22:47:57', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(6, 1, 1, 1, 319, '12228', 'CQ092025-314', '2025-11-11 15:37:51', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(7, 1, 1, 1, 320, '12228', 'CQ092025-314', '2025-11-11 15:37:54', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(8, 1, 1, 1, 321, '12228', 'CQ092025-314', '2025-11-11 15:37:57', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(9, 1, 1, 1, 322, '12228', 'CQ092025-314', '2025-11-10 22:47:57', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(10, 1, 1, 2, 323, '12228', 'CQ092025-314', '2025-11-11 15:37:51', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(11, 1, 1, 1, 324, '12228', 'CQ092025-314', '2025-11-11 15:37:54', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(12, 1, 1, 1, 325, '12228', 'CQ092025-314', '2025-11-11 15:37:57', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(13, 1, 1, 1, 326, '12228', 'CQ092025-314', '2025-11-10 22:47:57', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(14, 1, 1, 1, 327, '12228', 'CQ092025-314', '2025-11-11 15:37:51', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(15, 1, 1, 1, 328, '12228', 'CQ092025-314', '2025-11-11 15:37:54', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(16, 1, 1, 1, 329, '12228', 'CQ092025-314', '2025-11-11 15:37:57', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(17, 1, 1, 1, 330, '12228', 'CQ092025-314', '2025-11-10 22:47:57', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(18, 1, 1, 1, 331, '12228', 'CQ092025-314', '2025-11-11 15:37:51', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(19, 1, 1, 1, 332, '12228', 'CQ092025-314', '2025-11-11 15:37:54', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(20, 1, 1, 1, 333, '12228', 'CQ092025-314', '2025-11-11 15:37:57', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(21, 1, 1, 1, 334, '12228', 'CQ092025-314', '2025-11-10 22:47:57', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(22, 1, 1, 1, 335, '12228', 'CQ092025-314', '2025-11-11 15:37:51', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(23, 1, 1, 1, 336, '12228', 'CQ092025-314', '2025-11-11 15:37:54', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', ''),
(24, 1, 1, 1, 337, '12228', 'CQ092025-314', '2025-11-11 15:37:57', '2025-11-10 22:32:09', '2025-11-10', 'LMZ-7E95', '20', '250', '6198', '0.474048', '4.475336', '93.808128', '1.242424', '6.191808', '0.708', '-100', '45405.1', '8314.9', '54.86', '45.28', '0.45', '');

-- --------------------------------------------------------

--
-- Table structure for table `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `administradores`
--

INSERT INTO `administradores` (`id`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'administrador'),
(2, 'supervisor'),
(3, 'operador');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL DEFAULT '',
  `cpf` varchar(32) DEFAULT '',
  `email` varchar(256) DEFAULT NULL,
  `endereco` varchar(512) DEFAULT '',
  `celular` varchar(16) DEFAULT '',
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `email`, `endereco`, `celular`, `observacoes`) VALUES
(1, 'Alpha', '9999999999', 'email@cliente.com', 'Rua XXXXXXXXXXXXXXXXXXXXXXXXXXXXX CEP 9999999999', '2199999999', 'Paga bem'),
(2, 'Beta', '22222222222', 'beta@mail.xx', 'Belford Roxo', '219998888', 'Cliente 2'),
(3, 'Charlie', '987998798797', 'chchch@chcch.cc', 'Rua das ruas', '999999999', '');

-- --------------------------------------------------------

--
-- Table structure for table `configuracoes`
--

CREATE TABLE `configuracoes` (
  `id` int(11) NOT NULL,
  `instituicao` text NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `configuracoes`
--

INSERT INTO `configuracoes` (`id`, `instituicao`, `descricao`) VALUES
(1, 'GBio', 'Ferramenta de controle de produção e controle de abastecimento GBio');

-- --------------------------------------------------------

--
-- Table structure for table `dias`
--

CREATE TABLE `dias` (
  `id` int(11) NOT NULL,
  `dia` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `dias`
--

INSERT INTO `dias` (`id`, `dia`) VALUES
(1, 'segunda-feira'),
(2, 'terça-feira'),
(3, 'quarta-feira'),
(4, 'quinta-feira'),
(5, 'sexta-feira');

-- --------------------------------------------------------

--
-- Table structure for table `instituicoes`
--

CREATE TABLE `instituicoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL DEFAULT '',
  `cnpj` char(32) NOT NULL DEFAULT '',
  `email` varchar(256) NOT NULL DEFAULT '',
  `url` varchar(128) DEFAULT '',
  `endereco` varchar(512) DEFAULT '',
  `telefone` varchar(16) DEFAULT '',
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `instituicoes`
--

INSERT INTO `instituicoes` (`id`, `nome`, `cnpj`, `email`, `url`, `endereco`, `telefone`, `observacoes`) VALUES
(1, 'Metagas Central 1', '43943079000105', 'adm@metagas.com.br', 'http://www.metagas.com.br', 'Av. Sapopemba, 22.254 - setor EQB\n\nJardim Adutora - São Paulo - SP - CEP 03989-010', '999999999999', 'Matriz');

-- --------------------------------------------------------

--
-- Table structure for table `operadores`
--

CREATE TABLE `operadores` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cpf` varchar(16) DEFAULT '',
  `endereco` varchar(512) DEFAULT '',
  `celular` varchar(16) DEFAULT '',
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `operadores`
--

INSERT INTO `operadores` (`id`, `user_id`, `cpf`, `endereco`, `celular`, `observacoes`) VALUES
(1, 1, '99999999999', 'Rua XXXXXXXXXXXXXXXXXXXXXXXXXXXXX N9999999999', '2199999999', 'Operador da Central'),
(5, 2, '9999999999', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `relatorios`
--

CREATE TABLE `relatorios` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `instituicao_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `ch4_media_biogas` varchar(16) DEFAULT '',
  `co2_media_biogas` varchar(16) DEFAULT '',
  `o2_media_biogas` varchar(16) DEFAULT '',
  `ch4_media_metano` varchar(16) DEFAULT '',
  `co2_media_metano` varchar(16) DEFAULT '',
  `o2_media_metano` varchar(16) DEFAULT '',
  `n2_media_metano` varchar(16) DEFAULT '',
  `volume_biogas_dia` varchar(16) DEFAULT '',
  `consumo_clientes` varchar(512) DEFAULT '',
  `dispenser` varchar(16) DEFAULT '',
  `energia` varchar(16) DEFAULT '',
  `densidade` varchar(16) DEFAULT '',
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `relatorios`
--

INSERT INTO `relatorios` (`id`, `user_id`, `instituicao_id`, `data`, `ch4_media_biogas`, `co2_media_biogas`, `o2_media_biogas`, `ch4_media_metano`, `co2_media_metano`, `o2_media_metano`, `n2_media_metano`, `volume_biogas_dia`, `consumo_clientes`, `dispenser`, `energia`, `densidade`, `observacoes`) VALUES
(1, 1, 1, '2025-10-26', '16.42', '45.51', '0.35', '91.41', '2.23', '0.59', '3.77', '15000', '1: 8000, 3: 2001', '549.07', '15386', '0.7', 'HORAS DE PRODUÇÃO: 14:00'),
(2, 1, 1, '2025-11-11', '26.42', '45.51', '0.35', '99.34', '2.23', '0.59', '3.77', '30188', '1: 10000, 2: 4000', '549.07', '15386', '0.7', 'HORAS DE PRODUÇÃO: 14:00 / DEVIDO A QUEDA DE ENERGIA ENEL (05:30 - 14:00), E APÓS RETORNO ENEL FALHA NO CUBÍCULO THOPPEN (14:00 - 15:30) / CROMATOGRAFIA: TBB-0E87 (93,139%), TAQ-5D93 (92,949%)'),
(3, 1, 1, '2025-11-26', '56.42', '45.51', '0.35', '90.22', '2.23', '0.59', '3.77', '40088', '1: 12000, 3: 6000', '549.07', '15386', '0.7', 'HORAS DE PRODUÇÃO: 14:00'),
(9, 1, 1, '2025-11-26', '56.42', '45.51', '0.35', '90.22', '2.23', '0.59', '3.77', '40088', '1: 14000, 3: 8000', '559.07', '12386', '0.7', 'HORAS DE PRODUÇÃO: 10:00');

-- --------------------------------------------------------

--
-- Table structure for table `supervisores`
--

CREATE TABLE `supervisores` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cpf` varchar(16) DEFAULT '',
  `endereco` varchar(512) DEFAULT '',
  `celular` varchar(16) DEFAULT '',
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `supervisores`
--

INSERT INTO `supervisores` (`id`, `user_id`, `cpf`, `endereco`, `celular`, `observacoes`) VALUES
(1, 1, '99999999999', 'Rua XXXXXXXXXXXXXXXXXXXXXXXXXXXXX N9999999999', '2199999999', 'Novo Supervisor'),
(2, 4, '9999999999', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `password`, `created`, `modified`) VALUES
(1, 'User', 'user@test.com', '$', '2025-10-13 20:12:02', '2025-11-10 23:38:54'),
(2, 'User2 Test', 'user2@test.com', '$', '2025-11-10 16:40:08', '2025-11-12 19:42:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abastecimentognvs`
--
ALTER TABLE `abastecimentognvs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `abastecimentos`
--
ALTER TABLE `abastecimentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuracoes`
--
ALTER TABLE `configuracoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instituicoes`
--
ALTER TABLE `instituicoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operadores`
--
ALTER TABLE `operadores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relatorios`
--
ALTER TABLE `relatorios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisores`
--
ALTER TABLE `supervisores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abastecimentognvs`
--
ALTER TABLE `abastecimentognvs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `abastecimentos`
--
ALTER TABLE `abastecimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `configuracoes`
--
ALTER TABLE `configuracoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dias`
--
ALTER TABLE `dias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instituicoes`
--
ALTER TABLE `instituicoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `operadores`
--
ALTER TABLE `operadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supervisores`
--
ALTER TABLE `supervisores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
