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
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=LATIN1;

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `dataNasc` date NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cep` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `mesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ocupado` int(1) NOT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `mesa_id` int(11) NOT NULL,
  `valor_total` float(5,2),
  `finalizado` tinyint(1) DEFAULT 0,

  PRIMARY KEY (`id`),
  FOREIGN KEY (cliente_id) REFERENCES cliente(id),
  FOREIGN KEY (mesa_id) REFERENCES mesa(id)
  
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `itens_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cerveja_id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,


  PRIMARY KEY (`id`),
  FOREIGN KEY (cerveja_id) REFERENCES cerveja(id),
  FOREIGN KEY (pedido_id) REFERENCES pedido(id)
  
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;







INSERT INTO `cervejaria`.`cliente` (`nome`, `cpf`, `dataNasc`, `logradouro`, `bairro`, `cep`, `numero`, `cidade`) VALUES ('Alison Dias', '03620421013', '1994-03-14', 'Gustavo Peixoto', 'Tibiriça', '96503680', '1885', 'Cachoeira do Sul');
