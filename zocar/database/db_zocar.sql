-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Mar-2017 às 17:03
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_zocar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_adm`
--

CREATE TABLE `tab_adm` (
  `id_adm` int(11) NOT NULL,
  `login_adm` varchar(60) NOT NULL,
  `senha_adm` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_cliente`
--

CREATE TABLE `tab_cliente` (
  `id_cliente` int(11) NOT NULL,
  `cpf_cnpj_cliente` varchar(60) NOT NULL,
  `nome_razao_cliente` varchar(60) NOT NULL,
  `ie_cliente` varchar(60) NOT NULL,
  `im_cliente` varchar(60) NOT NULL,
  `lograoduro_cliente` varchar(60) NOT NULL,
  `bairro_cliente` varchar(60) NOT NULL,
  `cidade_cliente` varchar(60) NOT NULL,
  `estado_cliente` varchar(60) NOT NULL,
  `cep_cliente` varchar(60) NOT NULL,
  `contato_1_cliente` varchar(60) NOT NULL,
  `contato_2_cliente` varchar(60) NOT NULL,
  `email_cliente` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_equipamento`
--

CREATE TABLE `tab_equipamento` (
  `id_equipamento` int(11) NOT NULL,
  `id_obra` int(11) NOT NULL,
  `nome_equipamento` varchar(60) NOT NULL,
  `modelo_qeuipamento` varchar(60) NOT NULL,
  `placa_serie_equipamento` varchar(60) NOT NULL,
  `renava_equipamento` varchar(60) NOT NULL,
  `chassi_equipamento` varchar(60) NOT NULL,
  `ano_equipamento` varchar(60) NOT NULL,
  `ulti_lic_equipamento` varchar(60) NOT NULL,
  `id_id_equipamento` varchar(60) NOT NULL,
  `hor_equipamento` varchar(60) NOT NULL,
  `km_equipamento` varchar(60) NOT NULL,
  `num_nota_equipamento` varchar(60) NOT NULL,
  `proposta_equipamento` varchar(60) NOT NULL,
  `seguro_equipamento` varchar(60) NOT NULL,
  `tacografo_equipamento` varchar(60) NOT NULL,
  `teste_opac_equipamnto` varchar(60) NOT NULL,
  `compr_prop_equipamento` varchar(60) NOT NULL,
  `contrato_equipamento` varchar(60) NOT NULL,
  `destino_equipamento` varchar(60) NOT NULL,
  `mob_equipamento` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_locacao`
--

CREATE TABLE `tab_locacao` (
  `id_locacao` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `contrato_locacao` varchar(60) NOT NULL,
  `inicio_locacao` date NOT NULL,
  `final_locacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_obra`
--

CREATE TABLE `tab_obra` (
  `id_obra` int(11) NOT NULL,
  `id_locacao` int(11) NOT NULL,
  `nome_obra` varchar(60) NOT NULL,
  `projeto_lei_obra` varchar(60) NOT NULL,
  `logradouro_obra` varchar(60) NOT NULL,
  `bairro_obra` varchar(60) NOT NULL,
  `cidade_obra` varchar(60) NOT NULL,
  `estado_obra` varchar(60) NOT NULL,
  `cep_obra` varchar(60) NOT NULL,
  `responsavel_obra` varchar(60) NOT NULL,
  `contato_obra` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_cliente`
--
ALTER TABLE `tab_cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `tab_equipamento`
--
ALTER TABLE `tab_equipamento`
  ADD PRIMARY KEY (`id_equipamento`);

--
-- Indexes for table `tab_locacao`
--
ALTER TABLE `tab_locacao`
  ADD PRIMARY KEY (`id_locacao`);

--
-- Indexes for table `tab_obra`
--
ALTER TABLE `tab_obra`
  ADD PRIMARY KEY (`id_obra`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab_cliente`
--
ALTER TABLE `tab_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tab_equipamento`
--
ALTER TABLE `tab_equipamento`
  MODIFY `id_equipamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tab_locacao`
--
ALTER TABLE `tab_locacao`
  MODIFY `id_locacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tab_obra`
--
ALTER TABLE `tab_obra`
  MODIFY `id_obra` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
