CREATE DATABASE db_invisibilidades;

use db_invisibilidades;

CREATE TABLE `administradores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `login` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `arquivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `adm` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

