-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Nov-2018 às 18:34
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cesecbd`
--
CREATE DATABASE IF NOT EXISTS `cesecbd` DEFAULT CHARACTER SET utf16 COLLATE utf16_general_ci;
USE `cesecbd`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `rg` varchar(10) NOT NULL,
  `cpf` bigint(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `orgaoExpedidor` varchar(10) NOT NULL,
  `mae` varchar(100) NOT NULL,
  `pai` varchar(100) DEFAULT NULL,
  `tituloEleitor` bigint(20) NOT NULL,
  `reservista` bigint(20) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `estadoCivil` varchar(10) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `numeroResidencial` int(11) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `cep` bigint(20) DEFAULT NULL,
  `estado` varchar(4) DEFAULT NULL,
  `telefone` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `celular` bigint(20) NOT NULL,
  `status` varchar(8) NOT NULL,
  `datacadastro` date NOT NULL,
  `grauensino` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `rg`, `cpf`, `nome`, `orgaoExpedidor`, `mae`, `pai`, `tituloEleitor`, `reservista`, `sexo`, `estadoCivil`, `logradouro`, `bairro`, `complemento`, `numeroResidencial`, `cidade`, `cep`, `estado`, `telefone`, `email`, `celular`, `status`, `datacadastro`, `grauensino`) VALUES
(1, '1212312312', 23423423423, 'JoÃ£ozinho Neto de FÃ¡tima', 'MGDELE', 'FÃ¡tima da Silva', 'JÃµazinho Junior', 123412341234, 123123, 'Masculino', 'Solteiro', 'Rua Alberto de FÃ¡tima Noronha', 'Can Can', 'Casa', 345, 'BrazÃ³polis', 37530000, 'MG', 998123123, 'alunoI3A@gmail.com', 998121212, '1', '2018-11-28', '1'),
(2, '1212312314', 23423423424, 'Aluno', 'MGSPFC', 'Fátima da Silva212', 'Jõazinho Junior121', 123412341236, 123124, 'Masculino', 'Solteiro', 'Rua Alberto de Fátima Noronha', 'Can Can', 'Casa', 345, 'Brazópolis', 37530000, 'MG', 998123128, 'alunoI3Aaa@gmail.com', 998121214, '1', '2018-11-28', '1'),
(3, '1212312319', 23423423429, 'Alunoasf', 'MGSPFG', 'FÃ¡tima da Silva219', 'JÃµazinho Junior129', 123412341239, 123129, 'Masculino', 'Solteiro', 'Rua Alberto de FÃ¡tima Noronha', 'Can Can', 'Casa', 345, 'BrazÃ³polis', 37530000, 'MG', 998123129, 'alunoI3Aaa@gmail.come', 998121219, '1', '2018-11-28', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `idGrauEnsino` int(11) NOT NULL,
  `idProf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id`, `descricao`, `idGrauEnsino`, `idProf`) VALUES
(1, 'Linguagem de programaÃ§Ã£o', 2, 5),
(2, 'PortuguÃªs', 1, 2),
(5, 'Fisica', 1, 2),
(6, 'Ingles', 2, 4),
(7, 'PortuguÃªs', 1, 4),
(8, 'Fisica', 2, 2),
(9, 'RedaÃ§Ã£o', 1, 4),
(10, 'ReligiÃ£o', 2, 2),
(11, 'ReligiÃ£o', 1, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `frequencia`
--

CREATE TABLE `frequencia` (
  `id` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `mes` varchar(15) NOT NULL,
  `ano` year(4) NOT NULL,
  `horas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE `matricula` (
  `id` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL,
  `idTurno` int(11) NOT NULL,
  `dataMatricula` date NOT NULL,
  `dataConclusao` date DEFAULT NULL,
  `status` set('ATIVO','INATIVO','','') NOT NULL,
  `nota1` float DEFAULT NULL,
  `nota2` float DEFAULT NULL,
  `nota3` float DEFAULT NULL,
  `nota4` float DEFAULT NULL,
  `nota5` float DEFAULT NULL,
  `media` float DEFAULT NULL,
  `horaAula` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` int(11) NOT NULL,
  `tipo` set('adm','secretaria','professor','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id`, `nome`, `login`, `senha`, `tipo`) VALUES
(1, 'Robson Aparecido da Silva', 'robson', 123456, 'adm'),
(2, 'Robinho Silva', 'binho', 123456, 'professor'),
(3, 'José da Couves', 'ze', 123456, 'secretaria'),
(4, 'Cassandra', 'cassandra', 123456, 'professor'),
(5, 'Regiane', 'regiane', 123456, 'professor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turno`
--

CREATE TABLE `turno` (
  `id` int(11) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rg` (`rg`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `tituloEleitor` (`tituloEleitor`),
  ADD UNIQUE KEY `reservista` (`reservista`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProf` (`idProf`);

--
-- Indexes for table `frequencia`
--
ALTER TABLE `frequencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDisciplina` (`idDisciplina`),
  ADD KEY `idAluno` (`idAluno`);

--
-- Indexes for table `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAluno` (`idAluno`),
  ADD KEY `idDisciplina` (`idDisciplina`),
  ADD KEY `idTurno` (`idTurno`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indexes for table `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `frequencia`
--
ALTER TABLE `frequencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `turno`
--
ALTER TABLE `turno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `disciplina_ibfk_1` FOREIGN KEY (`idProf`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `frequencia`
--
ALTER TABLE `frequencia`
  ADD CONSTRAINT `frequencia_ibfk_1` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `frequencia_ibfk_2` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `matricula_ibfk_3` FOREIGN KEY (`idTurno`) REFERENCES `turno` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
