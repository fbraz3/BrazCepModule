CREATE TABLE IF NOT EXISTS `cepCache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logradouro` varchar(150) NOT NULL,
  `bairro` varchar(150) NOT NULL,
  `localidade` varchar(150) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `cep` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cep` (`cep`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;