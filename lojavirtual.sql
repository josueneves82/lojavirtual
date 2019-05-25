-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Maio-2019 às 00:02
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lojavirtual`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ativo_categoria` tinyint(1) NOT NULL,
  `ultima_atualizacao_categoria` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nome_categoria`, `ativo_categoria`, `ultima_atualizacao_categoria`) VALUES
(1, 'Cervejas', 1, '2019-05-13 16:32:21'),
(2, 'Assessórios', 1, '2019-05-06 15:22:34'),
(3, 'Copos', 1, '2019-05-06 15:22:48'),
(4, 'Camisetas', 1, '2019-05-13 17:22:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cpf_cliente` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `cep_cliente` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `end_cliente` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `num_cliente` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `bairro_cliente` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `compl_cliente` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cidade_cliente` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `estado_cliente` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email_cliente` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `senha_cliente` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ativo_cliente` tinyint(1) NOT NULL,
  `telefone_cliente` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `data_cadastro_cliente` date NOT NULL,
  `ultima_atualizacao_cliente` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome_cliente`, `cpf_cliente`, `data_nascimento`, `cep_cliente`, `end_cliente`, `num_cliente`, `bairro_cliente`, `compl_cliente`, `cidade_cliente`, `estado_cliente`, `email_cliente`, `senha_cliente`, `ativo_cliente`, `telefone_cliente`, `data_cadastro_cliente`, `ultima_atualizacao_cliente`) VALUES
(1, 'Josue Luiz Neves', '123.123.123-12', '1982-08-28', '91740-780', 'R Deusde Cardoso ', '160', 'vila nova', 'Casa', 'porto alegre', 'rs', 'josueneves1982@gmail.com', '123123', 1, '(51) 98634-1121', '2019-05-01', '2019-05-14 03:46:32'),
(10, 'teste3', '333.333.333-33', '2019-05-03', '33333-333', 'rsads', '3', '3', 'Casa', 'porto alegre', 'rs', 'teste3@teste.com', '123', 1, '(33) 33333-3333', '2019-05-03', '2019-05-13 16:15:06'),
(11, 'teste2', '222.222.222-22', '1982-02-02', '22222-222', 'rua 2', '2', 'bairro 2', 'casa', 'cidade 2', 'estado 2', 'teste2@teste.com', '123123', 1, '(22) 22222-2222', '2019-05-13', '2019-05-13 10:30:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `config_loja`
--

CREATE TABLE `config_loja` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `empresa` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `complemento` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `p_destaque` tinyint(2) NOT NULL,
  `data_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `config_loja`
--

INSERT INTO `config_loja` (`id`, `titulo`, `empresa`, `cep`, `endereco`, `bairro`, `complemento`, `cidade`, `estado`, `email`, `telefone`, `p_destaque`, `data_atualizacao`) VALUES
(1, 'loja virtual v1.0', 'DevNeves', '91740780', 'R Deusde Cardoso 160', 'vila nova', 'Casa', 'porto alegre', 'rs', 'josueneves1982@gmail.com', '51986342221', 4, '2019-05-02 01:34:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'administrador', 'Administrator loja'),
(2, 'clientes', 'clientes loja');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '::1', 'admin@admin.com', 1558388080);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nome_marca` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email_marca` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `contato_marca` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cnpj_marca` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ativo_marca` tinyint(1) NOT NULL,
  `data_cadastro_marca` date NOT NULL,
  `ultima_atualizacao_marca` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nome_marca`, `email_marca`, `contato_marca`, `cnpj_marca`, `ativo_marca`, `data_cadastro_marca`, `ultima_atualizacao_marca`) VALUES
(1, 'cervejaria 1', 'cervejaria1@cv.com', '(11) 11111-1111', '11.111.111/1111-11', 1, '2019-05-05', '2019-05-06 15:43:06'),
(2, 'cervejaria2', 'cervejaria2@cv.com', '(22) 22222-2222', '22.222.222/2222-22', 1, '2019-05-05', '2019-05-06 15:43:18'),
(3, 'cervejaria3', 'cervejaria3@cv.com', '(33) 33333-3333', '33.333.333/3333-33', 0, '2019-05-06', '2019-05-13 17:16:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_ped` int(11) NOT NULL,
  `data_pedido` date NOT NULL,
  `qtd_produto` int(11) NOT NULL,
  `cpf_pedido` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cod_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id_ped`, `data_pedido`, `qtd_produto`, `cpf_pedido`, `cod_produto`) VALUES
(1, '2019-05-06', 30, '123.123.123-12', 666),
(2, '2019-05-13', 1, '333.333.333-33', 1223),
(3, '2019-05-13', 12, '333.333.333-33', 666),
(4, '2019-05-13', 12, '123.123.123-12', 1223),
(5, '2019-05-13', 3, '123.123.123-12', 1212),
(6, '2019-05-13', 2, '123.123.123-12', 666),
(7, '2019-05-13', 2, '222.222.222-22', 666),
(8, '2019-05-13', 12, '333.333.333-33', 666),
(12, '2019-05-20', 3, '222.222.222-22', 9888);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `id_marca_produto` int(11) NOT NULL,
  `id_categoria_produto` int(11) NOT NULL,
  `nome_produto` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `cod_produto` int(10) NOT NULL,
  `valor_produto` decimal(15,2) NOT NULL,
  `destaque_produto` tinyint(1) NOT NULL,
  `ativo_produto` tinyint(1) NOT NULL,
  `estoque_produto` int(250) NOT NULL,
  `data_cadastro_produto` date NOT NULL,
  `ultima_atualizacao_produto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `informacao_produto` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `id_marca_produto`, `id_categoria_produto`, `nome_produto`, `cod_produto`, `valor_produto`, `destaque_produto`, `ativo_produto`, `estoque_produto`, `data_cadastro_produto`, `ultima_atualizacao_produto`, `informacao_produto`) VALUES
(1, 1, 1, 'pilsen', 1, '8.00', 1, 1, 20, '2019-05-05', '2019-05-06 01:16:39', 'uma cerveja lager mais clara, que passou a ser chamada de Pilsen ou Pilsener. '),
(2, 1, 3, 'tulipa', 1212, '20.00', 1, 1, 50, '2019-05-05', '2019-05-06 01:58:22', 'copo para cerveja'),
(3, 2, 1, 'IPA', 1223, '10.00', 1, 1, 100, '2019-05-06', '2019-05-06 14:36:03', 'India Pale Ale (as famosas IPAs) são cervejas que surgiram das Pale Ales.'),
(5, 2, 1, 'weiss', 333, '10.00', 1, 1, 100, '2019-05-06', '2019-05-06 14:37:57', 'tipo de cerveja feita de malte de trigo, malte de cevada, lúpulo e levedura.                        '),
(6, 1, 4, 'camiseta preta', 9888, '50.00', 1, 1, 100, '2019-05-06', '2019-05-06 19:40:37', '                        camiseta tamanho G                        '),
(8, 2, 2, 'litrao', 666, '100000.00', 1, 1, 100, '2019-05-07', '2019-05-07 01:16:09', 'dasd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `data_cadastro` date NOT NULL,
  `ultima_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `data_nascimento`, `data_cadastro`, `ultima_atualizacao`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$JyRyu7TRhKu.bmONk7tDdu5yA3TzpvzrterB4wfnS.oFBkucvO.z6', '', 'admin@admin.com', '', NULL, NULL, '6pkyry6feixm7hWPKTH4nu', 1268889823, 1557674321, 1, 'Admin', 'istrator', 'ADMIN', '0', '1982-08-28', '2019-05-03', '2019-05-12 15:18:41'),
(2, '127.0.0.1', 'Josue', '$2y$08$lsFZwphd4MjtIbOGTnevx.lqP.NEdhX0E22cfFyt8zDarR71YPG.m', NULL, 'josueneves1982@gmail.com', '', NULL, NULL, 'CXAa4F58PGq6N4LDkHrwQ.', 1268889823, 1558388102, 1, 'JOSUE', 'NEVES', 'ADMIN', '(51)98205-4394', '1982-08-28', '2019-05-03', '2019-05-20 21:35:02'),
(5, '::1', 'teste1', '$2y$08$vj4LOVJwpqrwAAgVcR4OzeyGHg5Ql8V6xZAR0.gIJDEjJT0OH5SMy', NULL, 'teste1@teste1.com', NULL, NULL, NULL, NULL, 1556861286, NULL, 1, NULL, NULL, NULL, '(51) 98173-3906', '2019-05-03', '0000-00-00', '2019-05-03 16:57:49'),
(13, '::1', 'teste3', '$2y$08$.f1bFvYQfzlhfd2p3Cd3.OJuQi9QdxJ5xGB3fKnmhBLK5P9liWS..', NULL, 'teste3@teste.com', NULL, NULL, NULL, NULL, 1556862980, NULL, 1, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', '2019-05-03 05:56:20'),
(14, '::1', 'karen antunes', '$2y$08$rRLxHvZuPobgkI3rC1W/9uXduJmSZi7n4jpmlo5wxkwMOAnxEkhh6', NULL, 'karenantunes11@gmail.com', NULL, NULL, NULL, NULL, 1557108368, NULL, 1, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', '2019-05-06 02:06:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(5, 5, 1),
(13, 13, 1),
(14, 14, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `config_loja`
--
ALTER TABLE `config_loja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_ped`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `fk_marca_produto` (`id_marca_produto`),
  ADD KEY `fk_categoria_produto` (`id_categoria_produto`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `config_loja`
--
ALTER TABLE `config_loja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_ped` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_categoria_` FOREIGN KEY (`id_categoria_produto`) REFERENCES `categorias` (`id_categoria`),
  ADD CONSTRAINT `fk_marca_produto` FOREIGN KEY (`id_marca_produto`) REFERENCES `marcas` (`id_marca`);

--
-- Limitadores para a tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
