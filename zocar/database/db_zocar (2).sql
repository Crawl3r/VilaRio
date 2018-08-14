-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Abr-2017 às 15:47
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

--
-- Extraindo dados da tabela `tab_adm`
--

INSERT INTO `tab_adm` (`id_adm`, `login_adm`, `senha_adm`) VALUES
(1, 'admin', 'admin');

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

--
-- Extraindo dados da tabela `tab_cliente`
--

INSERT INTO `tab_cliente` (`id_cliente`, `cpf_cnpj_cliente`, `nome_razao_cliente`, `ie_cliente`, `im_cliente`, `lograoduro_cliente`, `bairro_cliente`, `cidade_cliente`, `estado_cliente`, `cep_cliente`, `contato_1_cliente`, `contato_2_cliente`, `email_cliente`) VALUES
(1, '12345678945', 'Inforway', '12345678', '45645', 'Rua Tal', 'Pavuna', 'Rio de Janeiro', 'RJ', '25896412', '21 8945-7854', '21 3214-5273', 'inforway@mail.com');

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
  `valor_mes_equipamento` decimal(15,2) NOT NULL,
  `destino_equipamento` varchar(60) NOT NULL,
  `mob_equipamento` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `tab_equipamento`
--

INSERT INTO `tab_equipamento` (`id_equipamento`, `id_obra`, `nome_equipamento`, `modelo_qeuipamento`, `placa_serie_equipamento`, `renava_equipamento`, `chassi_equipamento`, `ano_equipamento`, `ulti_lic_equipamento`, `id_id_equipamento`, `hor_equipamento`, `km_equipamento`, `num_nota_equipamento`, `proposta_equipamento`, `seguro_equipamento`, `tacografo_equipamento`, `teste_opac_equipamnto`, `compr_prop_equipamento`, `contrato_equipamento`, `valor_mes_equipamento`, `destino_equipamento`, `mob_equipamento`) VALUES
(1, 1, 'ROLO COMPACTADOR - LISO', 'XCMG-04', '1122090097', '', '', '2003', '', '', '1564', '85784', '595196', '0092/16-R02', '002', '1234', '1', '7895/2', '89451', '5000.00', 'MAGÉ', ''),
(2, 1, 'TRANQUEIRA', 'ASAKIJN-895', '79879', '22311', '122315-8', '2012', '7845', '0001', '7845', '90235', '65321', '01092/14-R0234', '003', '8915', '2', '878421/5', '986532', '4000.00', 'PAVUNA', '784'),
(3, 2, 'TRANQUEIRA', 'ASAKIJN-895', '79879', '22311', '122315-8', '2012', '7845', '0001', '7845', '90235', '65321', '01092/14-R0234', '003', '8915', '2', '878421/5', '986532', '1000.00', 'PAVUNA', '784');

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

--
-- Extraindo dados da tabela `tab_locacao`
--

INSERT INTO `tab_locacao` (`id_locacao`, `id_cliente`, `contrato_locacao`, `inicio_locacao`, `final_locacao`) VALUES
(1, 1, '12354-87878/21', '2017-03-05', '2017-03-17');

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
-- Extraindo dados da tabela `tab_obra`
--

INSERT INTO `tab_obra` (`id_obra`, `id_locacao`, `nome_obra`, `projeto_lei_obra`, `logradouro_obra`, `bairro_obra`, `cidade_obra`, `estado_obra`, `cep_obra`, `responsavel_obra`, `contato_obra`) VALUES
(1, 1, 'Obra Teste', '456789-989/58', 'Rua Frei Vivente Vila 3 n° 76', 'Pavuna', 'Rio de Janeiro', 'RJ', '21520-470', 'Silvio Santos', '(21)3834-8654'),
(2, 1, 'Obra 2', '46465', 'rua x n° 0', 'Centro', 'Rio de Janeiro', 'RJ', '45678569', 'Felipe Barbosa', '21 8945-1257');

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tab_equipamento`
--
ALTER TABLE `tab_equipamento`
  MODIFY `id_equipamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tab_locacao`
--
ALTER TABLE `tab_locacao`
  MODIFY `id_locacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tab_obra`
--
ALTER TABLE `tab_obra`
  MODIFY `id_obra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
