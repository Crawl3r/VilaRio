-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Set-2017 às 15:16
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

--
-- Extraindo dados da tabela `tb_chamado`
--

INSERT INTO `tb_chamado` (`id_chamado`, `id_func_a_chamado`, `id_func_f_chamado`, `id_emp_chamado`, `func_alvo_chamado`, `categoria_chamado`, `d_h_a_chamado`, `d_h_f_chamado`, `desc_chamado`, `resposta_chamado`, `status_chamado`) VALUES
(8, 7, 7, 10, 'ANDRESSA GOMES MEDEIROS', 'Pagamentos', '2017-08-16 12:13:51', '2017-08-16 14:36:00', 'NÃƒO RECEBEU 1 FALTA DE INDEVIDA DE JUNHO \r\n', 'em junho ela nÃ£o teve falta\r\n\r\n', 'fechado'),
(9, 7, 7, 10, 'ANDRESSA GOMES MEDEIROS', 'Pagamentos', '2017-08-16 11:42:32', '2017-08-16 13:22:00', 'DESC 5 FALTAS C/ATESTADO / SÃ“ 1 ABONADA??? \r\n', 'PQ so 1 atestado que abonou 1 falta o outro foi fora de prazo\r\n', 'fechado'),
(10, 1, 0, 6, 'MARCELO SOARES DA CRUZ ', 'Dobras e Extra', '2017-08-14 11:00:27', '0000-00-00 00:00:00', 'DESC DE 1 FALTA / TROUXE ATESTADO PARA 5 DIAS / SUP MARCELO \r\n', 'aa', 'aberto');

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

--
-- Extraindo dados da tabela `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`id_funcionario`, `empresa_funcionario`, `nome_funcionario`, `cargo_funcionario`, `ctps_funcionario`, `rg_funcionario`, `cpf_funcionario`, `drtrj_funcionario`, `cnv_funcionario`, `data_exp_funcionario`, `foto_funcionario`, `impresso_yn_funcionario`) VALUES
(1, '1', 'Silvio Santos', 'Webmaster', '123456789101', '12.458.785-9', '785.562.894-87', '784512-rj', '456789123', '09/01/2020', '../themes/sshtml/media/func_6c3e5d11b05b700a5f8e022dfaba566b.jpg', 1),
(3, '3', 'Felipe Barbosa', 'Supervisor', '321321', '12.562.568-9', '121.313.131-31', '121212-rj', '12113', '00/00/000', '../themes/sshtml/media/func_50171dd462313cc5fcb44a0372909660.png', 0),
(5, '5', 'FÃ¡bio Barbosa', 'Diretor', '213212', '22.652.895-98', '651.516.151-51', '5151515-rj', '121131', '12/12/1213', '../themes/sshtml/media/func_0d5d0cf0eadbd4330839bab7d4b16e5e.jpg', 0),
(8, '1', 'SÃ©rgio Carvalho', 'TÃ©cnico', '121321', '12.562.896-5', '232.323.232-32', '2323232-rj', '54545454', '54/54/5445', '../themes/sshtml/media/func_ca472e4820bc6ca34b1124e2dd55dcd0.jpg', 0),
(11, '1', 'Ricardo Felipe', 'TÃ©cnico', '12345', '12.562.896-9', '125.454.545-45', '4545454-rj', '1212121', '21/51/5151', '../themes/sshtml/media/func_7776b06495ee9a061d2b0450700afa31.png', 0),
(12, '2', 'Suelen Barbosa', 'asda', '12312', '23123', '123.123.123-12', '123123', '123123', '12/31/2312', '../themes/sshtml/media/func_127e575074aba1e61bb33bec228a12ea.png', 0);

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
  `ativo_usuario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_usuario`, `ativo_usuario`) VALUES
(1, 'Administrador', 'admin', 'admin', 'adm', 1),
(6, 'Fabiane', 'Fabiane', '123', 'usuario', 1),
(7, 'Tatiane', 'Tatiane', '123', 'usuario', 1),
(8, 'Elis', 'Elis', '123', 'usuario', 1),
(9, 'Cris', 'Cris', '123', 'usuario', 1);

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
-- Indexes for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD PRIMARY KEY (`id_funcionario`);

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
  MODIFY `id_chamado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_empresa`
--
ALTER TABLE `tb_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
