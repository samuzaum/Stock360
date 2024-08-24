-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24/08/2024 às 15:06
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `stock360`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `quantidade` int NOT NULL,
  `unidade` enum('unidade','kg','litro','m') NOT NULL,
  `dimensao` varchar(255) DEFAULT NULL,
  `descricao` text,
  `validade` date DEFAULT NULL,
  `fornecedor` varchar(255) DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `categoria`, `quantidade`, `unidade`, `dimensao`, `descricao`, `validade`, `fornecedor`, `preco`) VALUES
(1, 'teste de nome', 'teste de categoria', 2, 'kg', '2m', 'sim mano', '1999-02-01', 'samuuel', 2.00),
(2, 'sim', 'sim', 3, 'litro', 'sim', 'sim', '1111-11-11', 'sim', 0.00),
(3, 'sim', 'sim', 4, 'm', '3287348927', 'sa', '1999-12-11', 'buceta', 0.00),
(4, 'sim', 'sim', 4, 'litro', '43208', 'entendi', '0848-08-04', 'samherjogh', 0.00),
(5, 'sim', 's', 3, 'm', 'grande', 'dasçkhdasl', '0000-00-00', 'dasdas', 0.00),
(6, 'buceta', 'caralho', 69, 'litro', 'grande', 'sim', '3727-07-31', '382190321', 99999999.99);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`(191))
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `is_admin`, `username`) VALUES
(1, 'user@user', '$2y$10$t2ZMVEImpFkDTQm1vDKIievWpks7PTq1opT43Eegy31nMuB8XyGMS', 0, ''),
(2, 'admin@admin', '$2y$10$Xgsm95i6k9Od.ANqtwz5b.HWtXDVDlhhAIiOAKzsW/LkKpD34JKSK', 1, ''),
(3, 'samuel@samuel.com', '$2y$10$DT9jT7nGv9QtqoI4fuyDROxZuZcKEqotDOi3UOaOWNpXWeVg7uVH2', 0, 'samuel');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
