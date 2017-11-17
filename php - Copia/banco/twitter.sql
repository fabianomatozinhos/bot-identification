-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Nov-2017 às 18:12
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_user` bigint(20) NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `quatidade_tweets` int(11) DEFAULT NULL,
  `seguidores` int(11) DEFAULT NULL,
  `seguindo` int(11) DEFAULT NULL,
  `data_cadastro_user` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `data_coleta_dados` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_user`, `nome`, `user`, `quatidade_tweets`, `seguidores`, `seguindo`, `data_cadastro_user`, `data_coleta_dados`) VALUES
(313648213, 'SANT ✖️', 'wowsant', 15547, 7188, 3149, 'Thu Jun 09 00:24:27 +0000 2011', '2017-11-04 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relacionamento`
--

CREATE TABLE `relacionamento` (
  `id_relacionamento` int(11) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_seguidor` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `relacionamento`
--

INSERT INTO `relacionamento` (`id_relacionamento`, `id_user`, `id_seguidor`) VALUES
(4, 313648213, 917388836828700672),
(5, 313648213, 707397285416734720);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tweets`
--

CREATE TABLE `tweets` (
  `id_tweets` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `tweets` varchar(255) COLLATE utf8_bin NOT NULL,
  `data_postagem` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tweets`
--

INSERT INTO `tweets` (`id_tweets`, `id_user`, `tweets`, `data_postagem`) VALUES
(926543273661026309, 313648213, 'Foi só um grão de cristal, do nada eu fico chique', 'Fri Nov 03 20:15:05 +0000 2017'),
(926543331940884488, 313648213, 'Com os parça, um drink gama e blunt tenso eu passo o bic', 'Fri Nov 03 20:15:19 +0000 2017');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `relacionamento`
--
ALTER TABLE `relacionamento`
  ADD PRIMARY KEY (`id_relacionamento`),
  ADD KEY `id_seguidor` (`id_seguidor`),
  ADD KEY `id_userr` (`id_user`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id_tweets`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `relacionamento`
--
ALTER TABLE `relacionamento`
  MODIFY `id_relacionamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `relacionamento`
--
ALTER TABLE `relacionamento`
  ADD CONSTRAINT `id_userr` FOREIGN KEY (`id_user`) REFERENCES `perfil` (`id_user`);

--
-- Limitadores para a tabela `tweets`
--
ALTER TABLE `tweets`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `perfil` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
