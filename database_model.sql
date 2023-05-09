-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 09-Maio-2023 às 15:39
-- Versão do servidor: 5.7.23-23
-- versão do PHP: 7.4.30

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
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(74, 'Blusas'),
(75, 'Calças'),
(76, 'Sapatos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cores`
--

CREATE TABLE `cores` (
  `id` bigint(20) NOT NULL,
  `cor` tinytext NOT NULL,
  `referencia` bigint(20) NOT NULL,
  `fotos` tinytext NOT NULL,
  `situacao` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cores`
--

INSERT INTO `cores` (`id`, `cor`, `referencia`, `fotos`, `situacao`) VALUES
(224, 'Preto', 22, '../www/produtos/Tenis_Nike__245935-1683654661/1683656030', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
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
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `rua`, `cep`, `numero`, `bairro`, `complemento`, `estado`, `cidade`, `usuario`, `destinatario`, `ponto_referencia`) VALUES
(1, 'Rua sara costa roz', '38600-001', '222', 'paracatuzinho', 'comercio', 'Minas Gerais', 'paracatu', 1, 'Iago Melo', 'padaria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `info-site`
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
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) NOT NULL,
  `usuario` tinytext NOT NULL,
  `produto` tinytext NOT NULL,
  `tamanho` tinytext NOT NULL,
  `cor` tinytext NOT NULL,
  `quantidade` int(11) NOT NULL,
  `situacao` tinyint(4) NOT NULL,
  `data` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
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
  `valor` varchar(100) NOT NULL,
  `pasta` text NOT NULL,
  `referencia` bigint(20) NOT NULL,
  `situacao` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `titulo`, `capa`, `corPrincipal`, `descricao`, `categoria`, `subcategoria`, `vendidos`, `comprimento`, `peso`, `altura`, `largura`, `valor`, `pasta`, `referencia`, `situacao`) VALUES
(21, 'Tênis Nike', 'www/capas/69328654040046_005_1-TENIS-FEM-RUN-REVOLUTION-6-DC3729-NIKE.png', '', 'O Nike Revolution possui cabedal leve em mesh, interior acolchoado e entressola em EVA que auxilia na absorção de impactos. O solado emborrachado e antiderrapante conta com ranhuras que transmite maior segurança e estabilidade ao caminhar. Fechamento em cadarço. Modelo ideal para quem quer liberdade, leveza e conforto no dia a dia.', 76, 127, '0', 20, 1000, 20, 20, '389,90', '../www/produtos/Tenis_Nike__693286-1683654259', 1683654259, 0),
(22, 'Tênis Nike', 'www/capas/24593554040046_005_1-TENIS-FEM-RUN-REVOLUTION-6-DC3729-NIKE.png', '', 'O Nike Revolution possui cabedal leve em mesh, interior acolchoado e entressola em EVA que auxilia na absorção de impactos. O solado emborrachado e antiderrapante conta com ranhuras que transmite maior segurança e estabilidade ao caminhar. Fechamento em cadarço. Modelo ideal para quem quer liberdade, leveza e conforto no dia a dia.', 76, 127, '0', 20, 1000, 20, 20, '389,90', '../www/produtos/Tenis_Nike__245935-1683654661', 1683654661, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` bigint(20) NOT NULL,
  `subcategoria` tinytext NOT NULL,
  `referencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `subcategoria`, `referencia`) VALUES
(135, 'Regata', 74),
(136, 'Social', 74),
(137, 'Feminino', 74),
(138, 'Masculino', 74),
(139, 'Legging', 75),
(140, 'Jeans', 75),
(141, 'Esportiva', 75),
(142, 'Tênis de Caminhada', 76);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanhos`
--

CREATE TABLE `tamanhos` (
  `id` bigint(20) NOT NULL,
  `tamanho` tinytext NOT NULL,
  `referencia` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `situacao` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tamanhos`
--

INSERT INTO `tamanhos` (`id`, `tamanho`, `referencia`, `quantidade`, `situacao`) VALUES
(6, '888', 14, 1000, 0),
(7, 'm', 14, 33333, 0),
(8, 'gg', 14, 896, 0),
(9, 'g', 14, 742, 0),
(10, 'pp', 14, 1000, 0),
(11, '888', 215, 1000, 0),
(12, 'm', 215, 33333, 0),
(13, 'gg', 215, 896, 0),
(14, 'g', 216, 742, 0),
(15, 'pp', 216, 1000, 0),
(16, 'g', 217, 1000, 0),
(17, 'm', 218, 33333, 0),
(18, 'g', 219, 1000, 0),
(19, 'm', 220, 33333, 0),
(20, 'g', 221, 1000, 0),
(21, 'm', 222, 33333, 0),
(22, '', 223, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
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
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`, `cpf`, `nascimento`) VALUES
(1, 'Iago Oliveira Melo', 'iagomello160@gmail.com', '12345678', '(38) 98403-7787', '023.653.616-77', '2003-01-24'),
(2, 'Iago Oliveira Melo', 'iagomello160@gmail.com', '123456789', '(38) 98403-', '023.653.616', '2003-01-24'),
(3, 'Iago Oliveira Melo', 'iagomello160@gmail.com', '123456781', '(38) 98403-', '023.653.616', '2003-01-24'),
(4, 'Iago Oliveira Melo', 'iagomello160@gmail.com', '123456788', '(38) 98403-', '023.653.616', '2003-01-24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
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
  `situacao` bigint(4) NOT NULL,
  `pagamento` tinytext NOT NULL,
  `codigo_envio` tinytext NOT NULL,
  `foto` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `usuario`, `cep`, `endereco`, `quantidade`, `frete`, `valor`, `data`, `situacao`, `pagamento`, `codigo_envio`, `foto`) VALUES
(1, '2', '38603300', 'rua sara costa roriz, 298, paracatuzinho, Paracatu-MG', 10, 'PAC - R$36,00', '200,00', '1620849892', 0, 'Cartão de crédito - 1 parcela', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cores`
--
ALTER TABLE `cores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tamanhos`
--
ALTER TABLE `tamanhos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de tabela `cores`
--
ALTER TABLE `cores`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT de tabela `tamanhos`
--
ALTER TABLE `tamanhos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
