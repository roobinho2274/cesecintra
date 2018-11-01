DROP TABLE IF EXISTS aluno;

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `grauensino` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rg` (`rg`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `tituloEleitor` (`tituloEleitor`),
  UNIQUE KEY `reservista` (`reservista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS disciplina;

CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) NOT NULL,
  `idGrauEnsino` int(11) NOT NULL,
  `idProf` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idProf` (`idProf`),
  CONSTRAINT `disciplina_ibfk_1` FOREIGN KEY (`idProf`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS frequencia;

CREATE TABLE `frequencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idDisciplina` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `mes` varchar(15) NOT NULL,
  `ano` year(4) NOT NULL,
  `horas` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idDisciplina` (`idDisciplina`),
  KEY `idAluno` (`idAluno`),
  CONSTRAINT `frequencia_ibfk_1` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `frequencia_ibfk_2` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS matricula;

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
  `horaAula` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idAluno` (`idAluno`),
  KEY `idDisciplina` (`idDisciplina`),
  KEY `idTurno` (`idTurno`),
  CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`idAluno`) REFERENCES `aluno` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`idDisciplina`) REFERENCES `disciplina` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `matricula_ibfk_3` FOREIGN KEY (`idTurno`) REFERENCES `turno` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS professor;

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` int(11) NOT NULL,
  `tipo` set('adm','secretaria','professor','') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO professor VALUES ("1","Robson Aparecido da Silva","robson","123456","adm");
INSERT INTO professor VALUES ("2","Robinho Silva","binho","123456","professor");
INSERT INTO professor VALUES ("3","José da Couves","ze","123456","secretaria");


DROP TABLE IF EXISTS turno;

CREATE TABLE `turno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



