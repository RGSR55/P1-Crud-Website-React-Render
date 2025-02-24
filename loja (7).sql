-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Maio-2023 às 23:15
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `imagem` varchar(450) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `categoria`, `imagem`) VALUES
(1, 'Proteínas', 'img/proteina.png'),
(2, 'Vitaminas', 'img/vitaminas.png'),
(3, 'Aminoácidos', 'img/aminoacidos.png'),
(4, 'Ómegas', 'img/omegas.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `idmarca` int(15) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `imagem` varchar(450) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`idmarca`, `marca`, `imagem`) VALUES
(1, 'Prozis', 'img/prozis.png'),
(2, 'Myprotein', 'img/myprotein.png'),
(3, 'Gold nutrition', 'img/gold.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idproduto` int(11) NOT NULL,
  `produto` varchar(100) NOT NULL,
  `preco` decimal(7,2) NOT NULL,
  `imagem_url` varchar(300) DEFAULT NULL,
  `stock` smallint(6) NOT NULL DEFAULT 0,
  `idcategoriaFK` int(11) NOT NULL,
  `idmarcaFK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idproduto`, `produto`, `preco`, `imagem_url`, `stock`, `idcategoriaFK`, `idmarcaFK`) VALUES
(1, 'Whey MP', '60.09', 'img/whey.png', 19, 1, 2),
(2, 'BCAA', '25.06', 'img/bcaa.png', 55, 3, 2),
(3, 'Omega 3', '12.89', 'img/omega3.png', 36, 4, 1),
(4, 'Vitamina D', '25.00', 'img/vitamina.png', 59, 2, 3),
(5, 'Whey Zero', '34.00', 'img/whey_prozis.png', 65, 1, 1),
(6, 'Omega+', '10.99', 'img/omega.png', 32, 4, 3),
(7, 'Glutamina', '13.99', 'img/glutamina.png', 70, 3, 1),
(8, 'Vitamina B12', '6.99', 'img/vitaminaB12.png', 72, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `idutilizador` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT 0,
  `foto` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`idutilizador`, `login`, `password`, `nome`, `admin`, `foto`) VALUES
(1, 'admin', '123', 'Carlos', 1, 'img/admin.png'),
(2, 'user', '123', 'Rui', 0, 'img/user.png'),
(19, 'teste', '123', 'Teste', 0, 'img/teste.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) UNSIGNED NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data` date NOT NULL,
  `idprodutoFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `quantidade`, `data`, `idprodutoFK`) VALUES
(33, 2, '2023-03-28', 4),
(34, 3, '2023-04-19', 2),
(36, 5, '2023-04-26', 1),
(37, 1, '2023-05-03', 3),
(38, 4, '2023-05-29', 3);

--
-- Acionadores `vendas`
--
DELIMITER $$
CREATE TRIGGER `atualizador_stock_delete` AFTER DELETE ON `vendas` FOR EACH ROW begin
update produto
set stock =stock + OLD.quantidade
where idproduto = OLD.idprodutoFK;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `atualizador_stock_insert` AFTER INSERT ON `vendas` FOR EACH ROW begin
update produto
set stock =stock - NEW.quantidade
where idproduto = NEW.idprodutoFK;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `atualizador_stock_update` AFTER UPDATE ON `vendas` FOR EACH ROW begin
update produto
set stock =stock + OLD.quantidade-NEW.quantidade
where idproduto = OLD.idprodutoFK;
end
$$
DELIMITER ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`),
  ADD UNIQUE KEY `categoria_UNIQUE` (`categoria`);

--
-- Índices para tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idmarca`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idproduto`),
  ADD KEY `fk_produto_categoria_idx` (`idcategoriaFK`),
  ADD KEY `fk_produto_marca_idx` (`idmarcaFK`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`idutilizador`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vendas_produto1_idx` (`idprodutoFK`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `idmarca` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `idutilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_categoria` FOREIGN KEY (`idcategoriaFK`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produto_marca` FOREIGN KEY (`idmarcaFK`) REFERENCES `marca` (`idmarca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_vendas_produto1` FOREIGN KEY (`idprodutoFK`) REFERENCES `produto` (`idproduto`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
