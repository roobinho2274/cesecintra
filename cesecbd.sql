-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Dez-2018 às 14:07
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

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
(1, '1111111111', 1111111111, 'Tobias Pereira dos Santos', 'SSPMG', 'Maria Tobias', 'JoÃ£o Tobias', 1111111111, 0, '', '', '', '', '', 0, '', 0, 'MG', 35991083257, 'robinho2274@gmail.com', 35991083257, '1', '2018-12-13', '1'),
(2, '222222222', 222222222, 'Jonas Henrique', 'SSMG', 'Laurelise Costa', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1234567890, 'jonas@gmail.com', 87654321, 'ATIVO', '2018-12-13', '1');

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
(5, 'Regiane', 'regiane', 123456, 'professor'),
(6, 'JoÃ£o OtÃ¡vio', 'jotavio', 123456, 'professor');

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
  ADD UNIQUE KEY `tituloEleitor` (`tituloEleitor`);

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
  ADD KEY `idAluno` (`idAluno`),
  ADD KEY `idDisciplina` (`idDisciplina`);

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
  ADD CONSTRAINT `frequencia_ibfk_2` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`id`),
  ADD CONSTRAINT `frequencia_ibfk_3` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`id`);

--
-- Limitadores para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_4` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`id`),
  ADD CONSTRAINT `matricula_ibfk_5` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`id`),
  ADD CONSTRAINT `matricula_ibfk_6` FOREIGN KEY (`idTurno`) REFERENCES `turno` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
