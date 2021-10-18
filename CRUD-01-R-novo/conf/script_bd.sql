CREATE TABLE `ifc`.`carro` (
  `id` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  `valor` DOUBLE NULL,
  `km` DOUBLE NULL,
  `dataFabricacao` DATE NULL,
  PRIMARY KEY (`id`));
  
  INSERT INTO `ifc`.`carro` (`id`, `nome`, `valor`, `km`, `dataFabricacao`) VALUES ('1', 'Logan', '50000', '70000', '2016-08-20');
INSERT INTO `ifc`.`carro` (`id`, `nome`, `valor`, `km`, `dataFabricacao`) VALUES ('2', 'Sandeiro', '40000', '110000', '2010-03-15');
INSERT INTO `ifc`.`carro` (`id`, `nome`, `valor`, `km`, `dataFabricacao`) VALUES ('3', 'Civic', '60000', '150000', '2013-10-25');
INSERT INTO `ifc`.`carro` (`id`, `nome`, `valor`, `km`, `dataFabricacao`) VALUES ('4', 'Camaro', '150000', '65000', '2009-11-05');
INSERT INTO `ifc`.`carro` (`id`, `nome`, `valor`, `km`, `dataFabricacao`) VALUES ('5', 'Golf GTI', '135000', '121000', '2012-12-16');ENGINE=InnoDB DEFAULT CHARSET=UTF-8;
