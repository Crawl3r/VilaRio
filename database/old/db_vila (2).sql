-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Mar-2018 às 13:11
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vila`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_chamado`
--

CREATE TABLE `tb_chamado` (
  `id_chamado` int(11) NOT NULL,
  `id_func_a_chamado` int(11) NOT NULL,
  `id_func_f_chamado` int(11) NOT NULL,
  `id_emp_chamado` int(11) NOT NULL,
  `func_alvo_chamado` varchar(100) NOT NULL,
  `categoria_chamado` varchar(20) NOT NULL,
  `d_h_a_chamado` datetime NOT NULL,
  `d_h_f_chamado` datetime NOT NULL,
  `desc_chamado` text NOT NULL,
  `resposta_chamado` text NOT NULL,
  `status_chamado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_empresa`
--

CREATE TABLE `tb_empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_empresa`
--

INSERT INTO `tb_empresa` (`id_empresa`, `nome_empresa`) VALUES
(2, 'VilaSul CG'),
(3, 'VilaSul NI'),
(4, 'Rio Fire '),
(5, 'Forte Service'),
(6, 'VilaRio'),
(8, 'Forte Sul Rio '),
(10, 'FRS ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_escala`
--

CREATE TABLE `tb_escala` (
  `id_escala` int(11) NOT NULL,
  `id_funcionario_escala` int(11) NOT NULL,
  `turno_escala` varchar(60) NOT NULL,
  `posto_escala` varchar(60) NOT NULL,
  `ala_escala` varchar(60) NOT NULL,
  `horario_escala` varchar(60) NOT NULL,
  `escala_escala` varchar(60) NOT NULL,
  `mes_escala` varchar(7) NOT NULL,
  `lancamento_escala` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `id_funcionario` int(11) NOT NULL,
  `empresa_funcionario` varchar(10) NOT NULL,
  `nome_funcionario` varchar(100) NOT NULL,
  `cargo_funcionario` varchar(100) NOT NULL,
  `ctps_funcionario` varchar(40) NOT NULL,
  `rg_funcionario` varchar(20) NOT NULL,
  `cpf_funcionario` varchar(20) NOT NULL,
  `drtrj_funcionario` varchar(40) NOT NULL,
  `cnv_funcionario` varchar(40) NOT NULL,
  `data_exp_funcionario` varchar(20) NOT NULL,
  `foto_funcionario` varchar(100) DEFAULT NULL,
  `impresso_yn_funcionario` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_midia_ch`
--

CREATE TABLE `tb_midia_ch` (
  `id_midia_ch` int(11) NOT NULL,
  `id_ch_midia_ch` int(11) NOT NULL,
  `caminho_midia_ch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(60) NOT NULL,
  `login_usuario` varchar(20) NOT NULL,
  `senha_usuario` varchar(20) NOT NULL,
  `nivel_usuario` varchar(20) NOT NULL,
  `setor_usuario` varchar(60) NOT NULL,
  `ativo_usuario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_usuario`, `setor_usuario`, `ativo_usuario`) VALUES
(1, 'Administrador', 'admin', 'admin', 'adm', 'adm', 1),
(6, 'Fabiane', 'Fabiane', '123', 'usuario', 'Simples', 1),
(7, 'Tatiane', 'Tatiane', '123', 'usuario', 'Simples', 1),
(8, 'Elis', 'Elis', '123', 'usuario', 'Simples', 1),
(9, 'Cris', 'Cris', '123', 'usuario', 'Simples', 1),
(10, 'operacional', 'oper', '123', 'usuario', 'Operacional', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_chamado`
--
ALTER TABLE `tb_chamado`
  ADD PRIMARY KEY (`id_chamado`);

--
-- Indexes for table `tb_empresa`
--
ALTER TABLE `tb_empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `tb_escala`
--
ALTER TABLE `tb_escala`
  ADD PRIMARY KEY (`id_escala`),
  ADD KEY `funcionario` (`id_funcionario_escala`);

--
-- Indexes for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Indexes for table `tb_midia_ch`
--
ALTER TABLE `tb_midia_ch`
  ADD PRIMARY KEY (`id_midia_ch`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_chamado`
--
ALTER TABLE `tb_chamado`
  MODIFY `id_chamado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_empresa`
--
ALTER TABLE `tb_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_escala`
--
ALTER TABLE `tb_escala`
  MODIFY `id_escala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_midia_ch`
--
ALTER TABLE `tb_midia_ch`
  MODIFY `id_midia_ch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_escala`
--
ALTER TABLE `tb_escala`
  ADD CONSTRAINT `funcionario` FOREIGN KEY (`id_funcionario_escala`) REFERENCES `tb_funcionario` (`id_funcionario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
