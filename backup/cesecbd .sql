-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Jul-2019 às 05:08
-- Versão do servidor: 10.1.31-MariaDB
-- versão do PHP: 7.2.4

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
  `rg` varchar(13) NOT NULL,
  `cpf` bigint(20) DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `turno` int(11) NOT NULL,
  `orgaoExpedidor` varchar(10) DEFAULT NULL,
  `mae` varchar(100) DEFAULT NULL,
  `pai` varchar(100) DEFAULT NULL,
  `tituloEleitor` bigint(20) DEFAULT NULL,
  `reservista` bigint(20) DEFAULT NULL,
  `sexo` varchar(10) NOT NULL,
  `estadoCivil` varchar(10) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `numeroResidencial` varchar(5) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `cep` bigint(20) DEFAULT NULL,
  `estado` varchar(4) DEFAULT NULL,
  `telefone` bigint(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `celular` bigint(20) DEFAULT NULL,
  `status` varchar(8) NOT NULL,
  `datacadastro` date NOT NULL,
  `grauensino` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `rg`, `cpf`, `nome`, `turno`, `orgaoExpedidor`, `mae`, `pai`, `tituloEleitor`, `reservista`, `sexo`, `estadoCivil`, `logradouro`, `bairro`, `complemento`, `numeroResidencial`, `cidade`, `cep`, `estado`, `telefone`, `email`, `celular`, `status`, `datacadastro`, `grauensino`) VALUES
(2, 'MG-12.123.123', 0, 'Tubias dias', 1, '', '', '', 0, 0, 'Masculino', '', '', '', '', '', '', 0, '', 0, '', 0, '1', '2019-04-06', '2'),
(3, 'MG-12.123.124', 0, 'JoÃ£o OtÃ¡vio', 1, '', '', '', 0, 0, 'Masculino', '', '', '', '', '', '', 0, '', 0, '', 0, '1', '2019-04-06', '1'),
(5, '52.894.085-5', 12512581667, 'Jonas Henrique Santos Braga', 2, 'SSP', 'Laurelise de Cassia Santos Braga', 'Lucimar Joaquim Braga', 211102224555, 0, 'Masculino', 'Solteiro', 'Chacara Santa terezinha ', 'Bom Sucesso', 'Casa', '200', 'BrazÃ³polis', 37530000, 'MG', 35997032266, 'jonasbraga2001@gmail.com', 35997032266, '1', '2019-07-22', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `idGrauEnsino` int(11) NOT NULL,
  `idProf` int(11) NOT NULL,
  `turno` int(11) DEFAULT NULL,
  `horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id`, `descricao`, `idGrauEnsino`, `idProf`, `turno`, `horario`) VALUES
(1, 'Linguagem de programaÃ§Ã£o', 2, 5, 1, '05:28:29'),
(2, 'PortuguÃªs', 1, 2, 1, '09:00:00'),
(5, 'Fisica', 1, 2, 2, '08:12:00'),
(6, 'Ingles', 2, 4, 2, '09:18:08'),
(7, 'PortuguÃªs', 2, 2, 1, '07:23:00'),
(9, 'RedaÃ§Ã£o', 1, 4, 1, '10:32:40'),
(10, 'ReligiÃ£o', 2, 2, 2, '07:10:00'),
(11, 'ReligiÃ£o', 1, 5, 1, '06:21:20'),
(12, 'Desenvolvimento WEB', 1, 6, 2, '21:00:00'),
(13, 'EdiÃ§Ã£o GrÃ¡fica', 1, 6, 2, '20:10:00'),
(14, 'MatemÃ¡tica', 2, 5, 1, '08:20:00');

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
  `horas` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `frequencia`
--

INSERT INTO `frequencia` (`id`, `idDisciplina`, `idAluno`, `mes`, `ano`, `horas`) VALUES
(1, 2, 3, 'Abril', 2019, '30:30:00'),
(2, 9, 3, 'Junho', 2019, '18:00:00'),
(3, 7, 2, 'Junho', 2019, '18:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE `matricula` (
  `id` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idDisciplina` int(11) NOT NULL,
  `dataMatricula` date NOT NULL,
  `dataConclusao` date DEFAULT NULL,
  `status` set('ATIVO','INATIVO','','') NOT NULL,
  `nota1` float DEFAULT NULL,
  `nota2` float DEFAULT NULL,
  `nota3` float DEFAULT NULL,
  `nota4` float DEFAULT NULL,
  `nota5` float DEFAULT NULL,
  `media` float DEFAULT NULL,
  `horaAula` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `matricula`
--

INSERT INTO `matricula` (`id`, `idAluno`, `idDisciplina`, `dataMatricula`, `dataConclusao`, `status`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `media`, `horaAula`) VALUES
(3, 2, 1, '2019-04-06', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '05:28:29'),
(4, 2, 7, '2019-04-06', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '07:23:00'),
(5, 3, 2, '2019-04-06', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '09:00:00'),
(6, 3, 9, '2019-04-06', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '10:32:40'),
(7, 3, 11, '2019-04-06', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '06:21:20'),
(8, 2, 14, '2019-07-08', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '08:20:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `idDisc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id`, `nome`, `login`, `senha`, `tipo`, `idDisc`) VALUES
(1, 'Administrador', 'admin', '123123', 'adm', NULL),
(2, 'PortuguÃªs', 'portugues', '123123', 'disciplina', 2),
(3, 'MatemÃ¡tica', 'matematica', '123123', 'disciplina', 14),
(4, 'Geografia', 'geografia', '123123', 'disciplina', NULL),
(5, 'QuÃ­mica', 'quimica', '123123', 'disciplina', NULL),
(6, 'FÃ­sica', 'fisica', '123123', 'disciplina', NULL),
(9, 'InglÃªs', 'ingles', '123123', 'disciplina', 6),
(10, 'HistÃ³ria', 'historia', '123123', 'disciplina', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turno`
--

CREATE TABLE `turno` (
  `id` int(11) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turno`
--

INSERT INTO `turno` (`id`, `descricao`) VALUES
(1, 'MATUTINO'),
(2, 'NOTURNO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turno` (`turno`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProf` (`idProf`),
  ADD KEY `disciplina_ibfk_2` (`turno`);

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
  ADD KEY `idDisciplina` (`idDisciplina`);

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
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_turnofk_1` FOREIGN KEY (`turno`) REFERENCES `turno` (`id`);

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `disciplina_ibfk_1` FOREIGN KEY (`idProf`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disciplina_ibfk_2` FOREIGN KEY (`turno`) REFERENCES `turno` (`id`);

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
  ADD CONSTRAINT `matricula_ibfk_5` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
