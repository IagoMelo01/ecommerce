-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 18/08/2021 às 19:23
-- Versão do servidor: 5.7.23-23
-- Versão do PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hubble34_site`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(75, 'Calças'),
(78, 'blusas'),
(79, 'vestidos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cores`
--

CREATE TABLE `cores` (
  `id` bigint(20) NOT NULL,
  `cor` tinytext NOT NULL,
  `referencia` bigint(20) NOT NULL,
  `fotos` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cores`
--

INSERT INTO `cores` (`id`, `cor`, `referencia`, `fotos`) VALUES
(213, 'preto', 14, '1'),
(214, 'rosa', 14, '1'),
(215, 'preto', 15, '1'),
(216, 'rosa', 15, '1'),
(217, 'azul petroleo', 16, '../www/produtos/tenis_nike70468/azul_petroleo'),
(218, 'rosa', 16, '../www/produtos/tenis_nike70468/rosa'),
(219, 'azul petroleo', 17, '../www/produtos/tenis_nike52664/azul_petroleo'),
(220, 'rosa', 17, '../www/produtos/tenis_nike52664/rosa'),
(221, 'azul petroleo', 18, '../www/produtos/tenis_nike71560/azul_petroleo'),
(222, 'rosa', 18, '../www/produtos/tenis_nike71560/rosa'),
(223, 'azul petroleo', 19, '../www/produtos/tenis_nike59762/azul_petroleo'),
(224, 'Preto', 20, '../www/produtos/Tenis_NIKE_downshifter_117711/Preto'),
(225, 'Cinza e Verde', 20, '../www/produtos/Tenis_NIKE_downshifter_117711/Cinza_e_Verde'),
(226, 'Rosa', 21, '../www/produtos/Vestido_rosa_com_babados_e_cinto12945/Rosa'),
(227, 'Preto', 22, '../www/produtos/Sapatênis67321/Preto'),
(228, 'UNI', 23, '../www/produtos/Calça_jeans45614/UNI'),
(229, 'Preto', 24, '../www/produtos/Sapatênis46481/Preto'),
(230, 'Preto', 25, '/Preto'),
(231, 'Preto', 26, '/Preto'),
(232, 'Preto', 27, '/Preto'),
(233, 'Preto', 28, '../www/produtos/Sapatênis66079/Preto'),
(234, 'Preto', 29, '../www/produtos/20050/Preto'),
(235, 'Preto', 30, '../www/produtos/7623/Preto'),
(236, 'Preto', 31, '../www/produtos/77798/Preto'),
(237, 'Preto 0101 0000 0100 1111 0111 0010 0111 0001 0110 0101 0110 0100 0111 0100 0111 0011 0110 1111 0110 1110', 32, '../www/produtos/Sapatênis_0101_0011_0110_0001_0111_0000_0110_0001_0111_0100_0110_1110_0110_1001_0111_001132437/Preto_0101_0000_0100_1111_0111_0010_0111_0001_0110_0101_0110_0100_0111_0100_0111_0011_0110_1111_0110_1110'),
(238, ' 0101 0000 0100 1111 0111 0010 0111 0001 0110 0101 0110 0100 0111 0100 0111 0011 0110 1111 0110 1110', 33, '../www/produtos/_0101_0011_0110_0001_0111_0000_0110_0001_0111_0100_0110_1110_0110_1001_0111_001179281/_0101_0000_0100_1111_0111_0010_0111_0001_0110_0101_0110_0100_0111_0100_0111_0011_0110_1111_0110_1110'),
(239, 'Preto', 34, '../www/produtos/_0101_0011_0110_0001_0111_0000_0110_0001_0111_0100_0110_1110_0110_1001_0111_001178009/_0101_0000_0100_1111_0111_0010_0111_0001_0110_0101_0110_0100_0111_0100_0111_0011_0110_1111_0110_1110'),
(240, 'UNI', 35, '../www/produtos/_0100_0011_0110_0001_0110_1100_0110_0001_0010_0000_0110_1010_0110_0101_0110_0001_0110_1110_0111_001116973/_0101_0101_0101_0100_0100_1110_0100_1101_0100_1001_0100_1000'),
(241, '', 36, '../www/produtos/70889/');

-- --------------------------------------------------------

--
-- Estrutura para tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` bigint(20) NOT NULL,
  `rua` tinytext NOT NULL,
  `cep` tinytext NOT NULL,
  `numero` tinytext NOT NULL,
  `bairro` tinytext NOT NULL,
  `complemento` tinytext NOT NULL,
  `estado` tinytext NOT NULL,
  `cidade` tinytext NOT NULL,
  `usuario` bigint(20) NOT NULL,
  `destinatario` tinytext NOT NULL,
  `ponto_referencia` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `rua`, `cep`, `numero`, `bairro`, `complemento`, `estado`, `cidade`, `usuario`, `destinatario`, `ponto_referencia`) VALUES
(1, 'Rua sara costa roz', '38600-001', '222', 'paracatuzinho', 'comercio', 'Minas Gerais', 'paracatu', 1, 'Iago Melo', 'padaria');

-- --------------------------------------------------------

--
-- Estrutura para tabela `info-site`
--

CREATE TABLE `info-site` (
  `visitas` tinytext NOT NULL,
  `visitas_unicas` tinytext NOT NULL,
  `cep` tinytext NOT NULL,
  `contato1` tinytext NOT NULL,
  `contato2` tinytext NOT NULL,
  `contato3` tinytext NOT NULL,
  `contato4` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) NOT NULL,
  `usuario` tinytext NOT NULL,
  `produto` tinytext NOT NULL,
  `tamanho` tinytext NOT NULL,
  `cor` tinytext NOT NULL,
  `quantidade` int(11) NOT NULL,
  `referencia` bigint(20) NOT NULL,
  `data` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` bigint(20) NOT NULL,
  `titulo` tinytext NOT NULL,
  `capa` tinytext NOT NULL,
  `corPrincipal` tinytext NOT NULL,
  `descricao` text NOT NULL,
  `categoria` tinyint(4) NOT NULL,
  `subcategoria` tinyint(4) NOT NULL,
  `vendidos` tinytext NOT NULL,
  `comprimento` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `altura` int(11) NOT NULL,
  `largura` int(11) NOT NULL,
  `valor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `titulo`, `capa`, `corPrincipal`, `descricao`, `categoria`, `subcategoria`, `vendidos`, `comprimento`, `peso`, `altura`, `largura`, `valor`) VALUES
(20, 'Tenis NIKE downshifter 11', 'www/capas/7711tenis.jpg', 'Preto', 'Novo tênis nike downshifter, ideal para corridas e caminhadas, oferecendo excelente conforto e durabilidade', 1, 1, '0', 30, 500, 20, 30, '449,00'),
(21, 'Vestido rosa com babados e cinto', 'www/capas/12945vestido_rosa1.jpg', 'Rosa', 'Lindo vestido rosa para chamar atenção onde for, perfeito para ir em festas e aniversários, ou então para um encontro romântico!', 1, 1, '0', 20, 900, 20, 20, '139,90'),
(22, 'Sapatênis', 'www/capas/67321sapatenis2.jpg', 'Preto', 'Tênis confortável e discreto, ideal para combinar com uma calça jeans, ir ao trabalho ou passear com um look mais casual', 1, 1, '0', 35, 1000, 10, 25, '189,90'),
(23, 'Calça jeans', 'www/capas/45614calca1.jpg', 'UNI', 'Calça jeans bonita e confortável, com curvas que modelam o corpo', 1, 1, '0', 5, 800, 20, 20, '119,90'),
(24, 'Sapatênis', 'www/capas/46481sapatenis2.jpg', 'Preto', 'Tênis confortável e discreto, ideal para combinar com uma calça jeans, ir ao trabalho ou passear com um look mais casual', 1, 1, '0', 30, 500, 20, 20, '139,90'),
(25, 'Sapatênis', 'www/capas/29833sapatenis2.jpg', 'Preto', 'Tênis confortável e discreto, ideal para combinar com uma calça jeans, ir ao trabalho ou passear com um look mais casual', 1, 1, '0', 30, 900, 20, 20, '139,90'),
(26, 'Sapatênis', 'www/capas/43200sapatenis2.jpg', 'Preto', 'Tênis confortável e discreto, ideal para combinar com uma calça jeans, ir ao trabalho ou passear com um look mais casual', 1, 1, '0', 30, 900, 20, 20, '139,90'),
(27, 'Sapatênis', 'www/capas/14578sapatenis2.jpg', 'Preto', 'Tênis confortável e discreto, ideal para combinar com uma calça jeans, ir ao trabalho ou passear com um look mais casual', 1, 1, '0', 30, 900, 20, 20, '139,90'),
(28, 'Sapatênis', 'www/capas/66079sapatenis2.jpg', 'Preto', 'Tênis confortável e discreto, ideal para combinar com uma calça jeans, ir ao trabalho ou passear com um look mais casual', 1, 1, '0', 30, 900, 20, 20, '139,90'),
(29, '', 'www/capas/20050sapatenis2.jpg', 'Preto', 'Tênis confortável e discreto, ideal para combinar com uma calça jeans, ir ao trabalho ou passear com um look mais casual', 1, 1, '0', 30, 900, 20, 20, '139,90'),
(30, 'Sapatênis', 'www/capas/7623sapatenis2.jpg', 'Preto', 'Tênis confortável e discreto, ideal para combinar com uma calça jeans, ir ao trabalho ou passear com um look mais casual', 1, 1, '0', 30, 900, 20, 20, '139,90'),
(31, 'Sapatênis', 'www/capas/77798sapatenis2.jpg', 'Preto', 'Tênis confortável e discreto, ideal para combinar com uma calça jeans, ir ao trabalho ou passear com um look mais casual', 1, 1, '0', 30, 900, 20, 20, '139,90'),
(32, 'Sapatênis 0101 0011 0110 0001 0111 0000 0110 0001 0111 0100 0110 1110 0110 1001 0111 0011', 'www/capas/32437sapatenis2.jpg', 'Preto', 'Tênis confortável e discreto, ideal para combinar com uma calça jeans, ir ao trabalho ou passear com um look mais casual', 1, 1, '0', 30, 900, 20, 30, '139,90'),
(33, ' 0101 0011 0110 0001 0111 0000 0110 0001 0111 0100 0110 1110 0110 1001 0111 0011', 'www/capas/79281sapatenis2.jpg', 'Preto', 'Tênis confortável e discreto, ideal para combinar com uma calça jeans, ir ao trabalho ou passear com um look mais casual', 1, 1, '0', 30, 900, 20, 30, '139,90'),
(34, 'Sapatênis', 'www/capas/78009sapatenis2.jpg', 'Preto', 'Tênis confortável e discreto, ideal para combinar com uma calça jeans, ir ao trabalho ou passear com um look mais casual', 1, 1, '0', 30, 900, 20, 30, '139,90'),
(35, 'Calça jeans', 'www/capas/16973calca2.jpg', 'UNI', 'Calça jeans bonita e confortável, com curvas que modelam o corpo.', 1, 1, '0', 20, 900, 20, 20, '189,90'),
(36, '', 'www/capas/70889', '', '', 1, 1, '0', 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` bigint(20) NOT NULL,
  `subcategoria` tinytext NOT NULL,
  `referencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `subcategoria`, `referencia`) VALUES
(139, 'Legging', 75),
(141, 'Esportiva', 75),
(148, 'social', 78),
(149, 'regata', 78),
(150, 'academia', 78),
(151, 'praia', 79),
(160, 'Jeans', 75),
(161, 'Camisa', 78),
(162, 'curto', 79);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tamanhos`
--

CREATE TABLE `tamanhos` (
  `id` bigint(20) NOT NULL,
  `tamanho` tinytext NOT NULL,
  `referencia` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tamanhos`
--

INSERT INTO `tamanhos` (`id`, `tamanho`, `referencia`, `quantidade`) VALUES
(6, '888', 14, 1000),
(7, 'm', 14, 33333),
(8, 'gg', 14, 896),
(9, 'g', 14, 742),
(10, 'pp', 14, 1000),
(11, '888', 215, 1000),
(12, 'm', 215, 33333),
(13, 'gg', 215, 896),
(14, 'g', 216, 742),
(15, 'pp', 216, 1000),
(16, 'g', 217, 1000),
(17, 'm', 218, 33333),
(18, 'g', 219, 1000),
(19, 'm', 220, 33333),
(20, 'g', 221, 1000),
(21, 'm', 222, 33333),
(22, '', 223, 0),
(23, '42', 224, 100),
(24, '39', 224, 100),
(25, '40', 224, 100),
(26, '41', 224, 100),
(27, '38', 225, 100),
(28, '39', 225, 100),
(29, '40', 225, 100),
(30, 'P', 226, 100),
(31, 'M', 226, 100),
(32, 'G', 226, 100),
(33, 'GG', 226, 100),
(34, '34', 227, 100),
(35, '35', 227, 100),
(36, '36', 227, 100),
(37, '36', 228, 100),
(38, '38', 228, 100),
(39, '40', 228, 100),
(40, '42', 228, 100),
(41, '34', 229, 100),
(42, '34', 230, 100),
(43, '34', 231, 100),
(44, '34', 232, 100),
(45, '34', 233, 100),
(46, '34', 234, 100),
(47, '34', 235, 100),
(48, '34', 236, 100),
(49, '34', 237, 100),
(50, '34', 238, 100),
(51, '34', 239, 100),
(52, '36', 240, 100),
(53, '38', 240, 100),
(54, '40', 240, 100),
(55, '42', 240, 100),
(56, '', 241, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(155) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`, `cpf`, `nascimento`) VALUES
(1, 'Iago Oliveira Melo', 'iagomello160@gmail.com', '12345678', '(38) 98403-7787', '023.653.616-77', '2003-08-16'),
(2, 'Iago Oliveira Melo', 'gustavoqueirozmit@gmail.com', '123456789', '(38) 98403-', '023.653.616', '2003-08-16'),
(3, 'Iago Oliveira Melo', 'iagomello160@gmail.com', '123456781', '(38) 98403-', '023.653.616', '2003-01-24'),
(4, 'Iago Oliveira Melo', 'iagomello160@gmail.com', '123456788', '(38) 98403-', '023.653.616', '2003-01-24');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` bigint(20) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `endereco` tinytext NOT NULL,
  `quantidade` bigint(20) NOT NULL,
  `frete` tinytext NOT NULL,
  `valor` varchar(20) NOT NULL,
  `data` tinytext NOT NULL,
  `situacao` tinytext NOT NULL,
  `pagamento` tinytext NOT NULL,
  `codigo_envio` tinytext NOT NULL,
  `foto` tinytext NOT NULL,
  `destinatario` tinytext CHARACTER SET utf8mb4 NOT NULL,
  `ponto_referencia` tinytext NOT NULL,
  `situacao_pagamento` tinytext CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`id`, `usuario`, `cep`, `endereco`, `quantidade`, `frete`, `valor`, `data`, `situacao`, `pagamento`, `codigo_envio`, `foto`, `destinatario`, `ponto_referencia`, `situacao_pagamento`) VALUES
(1, '2', '38603300', 'rua sara costa roriz, 298, paracatuzinho, Paracatu-MG', 10, 'PAC - R$36,00', '200,00', '1620849892', 'enviado - código de envio', 'Cartão de crédito - 1 parcela', '', '', '', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cores`
--
ALTER TABLE `cores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tamanhos`
--
ALTER TABLE `tamanhos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de tabela `cores`
--
ALTER TABLE `cores`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT de tabela `tamanhos`
--
ALTER TABLE `tamanhos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
