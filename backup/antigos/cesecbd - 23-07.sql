-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 179.188.16.164
-- Generation Time: 23-Jul-2019 às 00:03
-- Versão do servidor: 5.6.35-81.0-log
-- PHP Version: 5.6.30-0+deb8u1

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
  `cpf` varchar(16) NOT NULL,
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
(1, 'MG-12.159.422', '059.292.056-98', 'Carlos Eduardo da Silva Martins', 1, 'SSPMG', 'Joanita Maria da Silva Martins', 'JoÃ£o Carlos Martins', 0, 58185, 'Masculino', 'Casado', 'Rua Projetada D', 'Santa Rosa', '', '11', 'ItajubÃ¡', 38, 'MG', 991304181, '', 0, '1', '2019-03-20', '2'),
(2, 'M-4.506.691', '585.509.416-20', 'Sandro Paulo Ferreira', 1, 'SSPMG', 'VÃ©ra MÃ¡rcia Prado Ferreira', 'JosÃ© Rosa Ferreira', 0, 738927, 'Masculino', 'Casado', 'Rua Ivone Floriano Barbosa', 'Santa Rosa', '', '90', 'ITAJUBA', 37501, 'MG', 91178433, '', 0, '1', '2019-03-20', '2'),
(3, 'MG-18.286.077', '092.300.786-54', 'Emiliano GonÃ§alves Veloso', 2, 'SSPMG', 'Ana Firmino GonÃ§alves', 'HÃ©lio Moreira Veloso', 0, 0, 'Masculino', 'Solteiro', 'Rua Estados Unidos', 'Jardim das NaÃ§Ãµes', 'Bloco 17 Apt. 03', '242', 'ItajubÃ¡', 37504, 'MG', 991336210, '', 0, '1', '2019-03-20', '2'),
(4, 'MG-21.216.571', '148.289.756-32', 'Rafaela Ramalho GonÃ§alves', 2, 'SSPMG', 'Josy Ramalho', 'Miguel GonÃ§alves', 0, 0, 'Feminino', 'Solteira', 'Rua Estados Unidos', 'NaÃ§Ãµes', 'Bloco 08 - Apt. 32', '242', 'ItajubÃ¡', 37504, 'MG', 0, '', 0, '1', '2019-03-20', '2'),
(5, 'MG-17.658.673', '112.526.836-00', 'Filipe dos Santos Ribeiro', 2, 'SSPMG', 'Juscelina Raimunda Ribeiro', 'Gilberto Ribeiro', 0, 0, 'Masculino', 'Solteiro', 'Maria Rodrigues Muniz', 'Reborgeon', '', '80', 'ItajubÃ¡', 37503, 'MG', 3599572007, '', 0, '1', '2019-03-20', '2'),
(6, 'MG-21.314.541', '140.538.766-13', 'Igor Amilton Guedes PaixÃ£o', 1, 'SSPMG', 'Vanessa Fausta Guedes', 'Ademar JosÃ© PaixÃ£o', 0, 0, 'Masculino', 'Solteiro', 'Ismael Pinto Noronha', 'Nossa Senhora de FÃ¡tima', 'Ap. 101', '163', '', 0, '', 35991716525, '', 0, '1', '2019-03-20', '2'),
(7, 'M-6.943.403', '948.619.436-04', 'Dimas dos Santos Costa', 2, 'SSPMG', 'Maria Benedita dos Santos Costa', 'Pedro dias Costa', 0, 0, 'Masculino', 'Casado', 'Dr. Vital dias', 'Vila Poddis', '', '216', 'ItajubÃ¡', 37503, 'MG', 35954416885, '', 36238271, '1', '2019-03-20', '2'),
(8, '15.867.496', '080.319.826-43', 'Laudiceia de Oliveira da Silva Luz ', 2, 'SSPMG', 'Luzia de Jesus Oliveira', 'David Inacio de Oliveira', 0, 0, 'Feminino', 'Casada', 'Francisco AntÃ´nio da Silva', 'Santa Rosa', '', '33', 'ItajubÃ¡', 37501, 'MG', 988389508, '', 0, '1', '2019-03-20', '2'),
(9, 'MG-20.92.330', '150.159.006-51', 'Yuri Luiz Monteiro Pereira', 1, 'SSPMG', 'Camila da Silva', 'Lissandro Luiz Monteiro', 0, 0, 'Masculino', 'Solteiro', 'Joaquim JosÃ© GonÃ§alves', 'Vila Poddis', '', '29', 'ITAJUBA', 37503, 'MG', 35991306152, '', 0, '1', '2019-03-20', '2'),
(10, 'MG-21.611.678', '134.753.866-66', 'Myllene Ohana dos Santos', 1, 'SSPMG', 'Luciana Maximino Pinto', 'JosÃ© Maria dos Santos', 0, 0, 'Feminino', 'Solteira', 'JoÃ£o Baptista Ricci', 'Varginha', '', '229', 'ItajubÃ¡', 37500, 'MG', 35999928310, '', 0, '1', '2019-03-20', '2'),
(11, 'MG 13.489.981', '073.384.776-55', 'ALEXANDRE DE JESUS VITOR', 2, '', '', '', 0, 0, 'Masculino', 'SOLTEIRO', 'Rua cinco', 'Novo Horizonte', '', '29', 'ItajubÃ¡', 37505, 'MG', 35991740718, '', 0, '1', '2019-03-21', '2'),
(12, 'MG-14.142.202', '015.621.906-95', 'ANDRÃ‰ FILIPE BRAZ BATISTA', 2, '', '', '', 0, 0, 'Masculino', '', '', '', '', '', '', 0, '', 0, '', 0, '1', '2019-03-21', '2'),
(13, '19.770.790', 'xxxxxxxxxxxxxx', 'KaynÃ£ GuimarÃ£es Silva ', 2, '', 'Cleuza Maria GuimarÃ£es ', 'Francisco de Assis Silva ', 0, 0, 'Masculino', '', '', '', '', '', '', 0, '', 0, '', 0, '1', '2019-03-21', '2'),
(14, 'x', 'x', 'HENRIQUE FREIRE DE ALENCAR', 1, '', '', '', 0, 0, 'Masculino', '', '', '', '', '', '', 0, '', 0, '', 0, '1', '2019-03-21', '2'),
(15, '5152365247', '28663548532', 'Paulo andre', 1, 'SSPMG', 'Maria Paula', '', 51565121, 0, 'Masculino', 'casaso', 'RUA MIGUEL VIANA', 'Vila Poddis', 'Bloco 17 Apt. 03', '242', 'ITAJUBA', 37500, '', 991304181, 'matheus.fundacaoroge@gmail.com', 991351669, '1', '2019-06-13', '1');

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
(2, 'LÃ­ngua Portuguesa  ', 1, 3, 1, '16:00:00'),
(3, 'MatemÃ¡tica', 1, 9, 2, '16:00:00'),
(4, 'LÃ­ngua Portuguesa', 1, 3, 2, '16:00:00'),
(5, 'Geografia', 1, 4, 1, '16:00:00'),
(6, 'Geografia', 1, 4, 2, '16:00:00'),
(7, 'QuÃ­mica', 2, 5, 1, '16:00:00'),
(8, 'QuÃ­mica', 2, 5, 2, '16:00:00'),
(9, 'MatemÃ¡tica', 2, 11, 1, '16:00:00'),
(10, 'MatemÃ¡tica', 2, 11, 2, '16:00:00'),
(11, 'FÃ­sica', 2, 11, 1, '16:00:00'),
(12, 'FÃ­sica', 2, 11, 2, '16:00:00'),
(13, 'HistÃ³ria', 2, 13, 1, '16:00:00'),
(14, 'HistÃ³ria', 2, 13, 2, '16:00:00'),
(15, 'Artes', 1, 14, 1, '16:00:00'),
(16, 'Artes', 1, 14, 2, '16:00:00'),
(17, 'Artes', 2, 14, 1, '16:00:00'),
(18, 'Artes', 2, 14, 2, '16:00:00'),
(19, 'InglÃªs', 1, 17, 1, '16:00:00'),
(20, 'InglÃªs', 1, 17, 2, '16:00:00'),
(21, 'InglÃªs', 2, 17, 1, '16:00:00'),
(22, 'InglÃªs', 2, 17, 2, '16:00:00'),
(23, 'LÃ­ngua Portuguesa', 2, 21, 1, '16:00:00'),
(24, 'LÃ­ngua Portuguesa', 2, 21, 2, '16:00:00'),
(25, 'Biologia', 2, 20, 1, '16:00:00'),
(26, 'Biologia', 2, 20, 2, '16:00:00'),
(27, 'Geografia', 2, 22, 1, '16:00:00'),
(28, 'Geografia', 2, 22, 2, '16:00:00'),
(29, 'Sociologia', 2, 22, 1, '16:00:00'),
(30, 'Sociologia', 2, 22, 2, '16:00:00'),
(31, 'HistÃ³ria', 1, 19, 1, '16:00:00'),
(32, 'HistÃ³ria', 1, 19, 2, '16:00:00'),
(33, 'CiÃªncias', 1, 18, 1, '16:00:00'),
(34, 'CiÃªncias', 1, 18, 2, '16:00:00'),
(35, 'Filosofia', 2, 13, 1, '16:00:00'),
(36, 'Filosofia', 2, 13, 2, '16:00:00'),
(37, 'EducaÃ§Ã£o FÃ­sica - Dispen.', 1, 24, 1, '00:00:00'),
(38, 'EducaÃ§Ã£o FÃ­sica - Dispen.', 1, 24, 2, '00:00:00'),
(39, 'EducaÃ§Ã£o FÃ­sica - Dispen.', 2, 24, 1, '00:00:00'),
(40, 'EducaÃ§Ã£o FÃ­sica - Dispen.', 2, 24, 2, '00:00:00'),
(41, 'EducaÃ§Ã£o FÃ­sica - Escola Parceira', 1, 24, 1, '16:00:00'),
(42, 'EducaÃ§Ã£o FÃ­sica - Escola Parceira', 1, 24, 2, '16:00:00');

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
(1, 1, 25, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(2, 1, 11, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(3, 1, 35, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(4, 1, 13, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(5, 1, 7, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(6, 2, 25, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(7, 1, 39, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '00:00:00'),
(8, 2, 39, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '00:00:00'),
(9, 3, 18, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(10, 3, 12, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(11, 3, 28, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(12, 3, 14, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(13, 3, 22, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(14, 3, 24, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(15, 3, 10, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(16, 3, 8, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(17, 4, 18, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(18, 4, 12, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(19, 4, 28, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(20, 4, 14, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(21, 4, 22, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(22, 4, 24, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(23, 4, 10, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(24, 4, 8, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(25, 5, 26, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(26, 5, 28, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(27, 5, 14, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(28, 5, 22, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(29, 5, 24, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(30, 5, 10, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(31, 5, 8, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(32, 6, 17, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(33, 6, 11, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(34, 6, 27, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(35, 6, 13, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(36, 6, 21, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(37, 6, 23, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(38, 6, 9, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(39, 6, 7, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(40, 7, 26, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(41, 7, 40, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '00:00:00'),
(42, 7, 12, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(43, 7, 36, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(44, 7, 10, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(45, 7, 8, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(46, 8, 18, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(47, 8, 26, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(48, 8, 12, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(49, 8, 36, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(50, 8, 28, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(51, 8, 14, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(52, 8, 22, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(53, 8, 24, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(54, 8, 10, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(55, 8, 8, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(56, 9, 17, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(57, 9, 11, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(58, 9, 27, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(59, 9, 13, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(60, 9, 21, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(61, 9, 23, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(62, 9, 9, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(63, 9, 7, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(64, 10, 17, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(65, 10, 11, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(66, 10, 27, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(67, 10, 13, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(68, 10, 21, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(69, 10, 23, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(70, 10, 9, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(71, 10, 7, '2019-03-20', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(72, 11, 40, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '00:00:00'),
(73, 11, 10, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(74, 11, 8, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(75, 12, 18, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(76, 12, 26, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(77, 12, 40, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '00:00:00'),
(78, 12, 12, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(79, 12, 36, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(80, 12, 28, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(81, 12, 14, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(82, 12, 22, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(83, 12, 24, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(84, 12, 10, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(85, 12, 8, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(86, 12, 30, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(87, 13, 18, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(88, 13, 26, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(89, 13, 40, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '00:00:00'),
(90, 13, 12, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(91, 13, 36, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(92, 13, 28, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(93, 13, 14, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(94, 13, 22, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(95, 13, 24, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(96, 13, 10, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(97, 13, 8, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(98, 13, 30, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(99, 14, 17, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(100, 14, 25, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(101, 14, 39, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '00:00:00'),
(102, 14, 11, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(103, 14, 35, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(104, 14, 27, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(105, 14, 13, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(106, 14, 21, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(107, 14, 23, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(108, 14, 9, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(109, 14, 7, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00'),
(110, 14, 29, '2019-03-21', NULL, 'ATIVO', NULL, NULL, NULL, NULL, NULL, NULL, '16:00:00');

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
(1, 'Administrador', 'admin', 123456, 'adm'),
(2, 'Oscarlina de Souza Britto', 'Oscarlina', 3257243, 'professor'),
(3, 'Terezinha Maria do EspÃ­rito Santo', 'Terezinha', 3257987, 'professor'),
(4, 'Maria Elizabete de Souza Siqueira', 'Maria ', 3403367, 'professor'),
(5, 'JosÃ© SebastiÃ£o Pereira', 'JosÃ©', 3436656, 'professor'),
(6, 'Altina Maria Nogueira de Azevedo', 'Altina', 3689270, 'secretaria'),
(7, 'Luiza Maria Ribeiro', 'Luiza', 3695095, 'secretaria'),
(8, 'Vera Lurdes MagalhÃ£es Carvalho Alves', 'Vera', 3900677, 'secretaria'),
(9, 'Vicente Antonio Schumann Cunha', 'Vicente', 3900685, 'professor'),
(10, 'Paulo Felipe da Costa', 'Paulo', 4515706, 'professor'),
(11, 'Luiz Gustavo de Oliveira', 'Luiz', 8431082, 'professor'),
(12, 'Egberto Del Picchia Faria', 'Egberto', 8851917, 'professor'),
(13, 'Nilton do Carmo', 'Nilton', 11028438, 'professor'),
(14, 'Renata Maria Silva Gomes de Oliveira', 'Renata', 11291085, 'professor'),
(15, 'Marluza Walgmar Salles Santos', 'Marluza', 11601473, 'adm'),
(16, 'Anabel Lucinda Barbosa Dias de Souza', 'Anabel', 12892378, 'secretaria'),
(17, 'Fernanda Maria de Campos Sobrinho', 'Fernanda', 13342233, 'professor'),
(18, 'Jane Cristina dos Passos Cardoso', 'Jane', 10986065, 'professor'),
(19, 'Cleber Juvenil Diniz', 'Cleber', 11166162, 'professor'),
(20, 'Gislene Aparecida Silva de AraÃºjo PrudÃªncio', 'Gislene', 11214673, 'professor'),
(21, 'DÃ©bora Feliciano Alves', 'DÃ©bora', 12076576, 'professor'),
(22, 'Marcus VinÃ­cius Silva', 'Marcus', 12789475, 'professor'),
(23, 'Matheus de Araujo PrudÃªncio', 'Matheus', 10664381, 'adm'),
(24, 'Dispensado', '1234', 1234, 'professor');

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
  ADD UNIQUE KEY `rg` (`rg`),
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
