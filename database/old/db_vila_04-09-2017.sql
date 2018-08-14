-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Set-2017 às 17:51
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
(10, 7, 0, 6, 'MARCELO SOARES DA CRUZ ', 'Falta Indevida', '2017-08-14 11:00:27', '0000-00-00 00:00:00', 'DESC DE 1 FALTA / TROUXE ATESTADO PARA 5 DIAS / SUP MARCELO \r\n', '', 'aberto');

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
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
