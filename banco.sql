CREATE DATABASE cervejaria;
USE cervejaria;

CREATE TABLE IF NOT EXISTS `cerveja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(255) NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `medida` varchar(50) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` float(5,2) NOT NULL DEFAULT 0.00,
  `ativo` tinyint(1) DEFAULT 1,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  `dataNasc` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
