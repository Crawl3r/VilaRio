-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Ago-2018 às 15:34
-- Versão do servidor: 10.1.33-MariaDB
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
-- Estrutura da tabela `tb_contrato`
--

CREATE TABLE `tb_contrato` (
  `id_contrato` int(11) NOT NULL,
  `local` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `cnpj` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  `nome_funcionario` varchar(30) NOT NULL,
  `cargo_funcionario` varchar(100) NOT NULL,
  `ctps_funcionario` varchar(40) NOT NULL,
  `rg_funcionario` varchar(20) NOT NULL,
  `cpf_funcionario` varchar(20) NOT NULL,
  `drtrj_funcionario` varchar(40) NOT NULL,
  `cnv_funcionario` varchar(40) NOT NULL,
  `data_exp_funcionario` date NOT NULL,
  `foto_funcionario` varchar(100) DEFAULT NULL,
  `impresso_yn_funcionario` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lanc`
--

CREATE TABLE `tb_lanc` (
  `id_lanc` int(11) NOT NULL,
  `id_func_l` int(11) NOT NULL,
  `id_contrato` int(11) NOT NULL,
  `empresa` int(11) NOT NULL,
  `efetivo` varchar(40) NOT NULL,
  `mes_ano` varchar(10) NOT NULL,
  `tipo_cobr` varchar(40) NOT NULL,
  `valor_h` decimal(15,2) NOT NULL,
  `desco` int(11) NOT NULL,
  `obs_retencoes` text NOT NULL,
  `nf` varchar(50) NOT NULL,
  `d_emis` date NOT NULL,
  `d_venc` date NOT NULL,
  `descr_extra_1` text NOT NULL,
  `val_extra_1` decimal(15,2) NOT NULL,
  `descr_extra_2` text NOT NULL,
  `val_extra_2` decimal(15,2) NOT NULL,
  `descr_extra_3` text NOT NULL,
  `val_extra_3` decimal(15,2) NOT NULL,
  `dia_1` int(11) NOT NULL,
  `dia_2` int(11) NOT NULL,
  `dia_3` int(11) NOT NULL,
  `dia_4` int(11) NOT NULL,
  `dia_5` int(11) NOT NULL,
  `dia_6` int(11) NOT NULL,
  `dia_7` int(11) NOT NULL,
  `dia_8` int(11) NOT NULL,
  `dia_9` int(11) NOT NULL,
  `dia_10` int(11) NOT NULL,
  `dia_11` int(11) NOT NULL,
  `dia_12` int(11) NOT NULL,
  `dia_13` int(11) NOT NULL,
  `dia_14` int(11) NOT NULL,
  `dia_15` int(11) NOT NULL,
  `dia_16` int(11) NOT NULL,
  `dia_17` int(11) NOT NULL,
  `dia_18` int(11) NOT NULL,
  `dia_19` int(11) NOT NULL,
  `dia_20` int(11) NOT NULL,
  `dia_21` int(11) NOT NULL,
  `dia_22` int(11) NOT NULL,
  `dia_23` int(11) NOT NULL,
  `dia_24` int(11) NOT NULL,
  `dia_25` int(11) NOT NULL,
  `dia_26` int(11) NOT NULL,
  `dia_27` int(11) NOT NULL,
  `dia_28` int(11) NOT NULL,
  `dia_29` int(11) NOT NULL,
  `dia_30` int(11) NOT NULL,
  `dia_31` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Estrutura da tabela `tb_reg_ponto`
--

CREATE TABLE `tb_reg_ponto` (
  `id_rp` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `reg` datetime NOT NULL
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
  `ativo_usuario` tinyint(1) NOT NULL,
  `empresa` int(11) NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `n_registro` varchar(100) NOT NULL,
  `ctps` varchar(100) NOT NULL,
  `admissao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_usuario`, `setor_usuario`, `ativo_usuario`, `empresa`, `cargo`, `n_registro`, `ctps`, `admissao`) VALUES
(1, 'Administrador', 'admin', 'admin', 'adm', 'adm', 1, 0, '', '', '', '0000-00-00'),
(6, 'Fabiane', 'Fabiane', '123', 'usuario', 'Simples', 1, 5, 'desk', '7878', '8787878', '2018-08-08'),
(7, 'Tatiane', 'Tatiane', '123', 'usuario', 'Simples', 1, 0, '', '', '', '0000-00-00'),
(8, 'Elis', 'Elis', '123', 'usuario', 'Simples', 1, 0, '', '', '', '0000-00-00'),
(11, 'Priscila', 'priscila', '123', 'usuario', 'Simples', 1, 0, '', '', '', '0000-00-00'),
(12, 'Valter', 'valter', '123', 'usuario', 'Simples', 1, 0, '', '', '', '0000-00-00'),
(13, 'Gisele', 'gisele', '123456', 'adm', '', 1, 6, 'chefe de departamento', '4564', '123121-rj', '2004-09-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_chamado`
--
ALTER TABLE `tb_chamado`
  ADD PRIMARY KEY (`id_chamado`);

--
-- Indexes for table `tb_contrato`
--
ALTER TABLE `tb_contrato`
  ADD PRIMARY KEY (`id_contrato`);

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
-- Indexes for table `tb_lanc`
--
ALTER TABLE `tb_lanc`
  ADD PRIMARY KEY (`id_lanc`);

--
-- Indexes for table `tb_midia_ch`
--
ALTER TABLE `tb_midia_ch`
  ADD PRIMARY KEY (`id_midia_ch`);

--
-- Indexes for table `tb_reg_ponto`
--
ALTER TABLE `tb_reg_ponto`
  ADD PRIMARY KEY (`id_rp`);

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
  MODIFY `id_chamado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tb_contrato`
--
ALTER TABLE `tb_contrato`
  MODIFY `id_contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_empresa`
--
ALTER TABLE `tb_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_escala`
--
ALTER TABLE `tb_escala`
  MODIFY `id_escala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_lanc`
--
ALTER TABLE `tb_lanc`
  MODIFY `id_lanc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_midia_ch`
--
ALTER TABLE `tb_midia_ch`
  MODIFY `id_midia_ch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_reg_ponto`
--
ALTER TABLE `tb_reg_ponto`
  MODIFY `id_rp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
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
