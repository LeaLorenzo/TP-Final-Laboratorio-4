create database PetHero;
drop database pethero;
use petHero;

drop table user;

CREATE TABLE `user` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(45) NOT NULL,
  `tipoUsuario` varchar(50) NOT NULL,
  `user` varchar(45) NOT NULL,
  PRIMARY KEY (`idUser`)
) ;

alter table user change user userName varchar(50);

drop table keepers;

CREATE TABLE `keepers` (
  `idKeepers` int NOT NULL AUTO_INCREMENT,
  `idUser` int NOT NULL,
  PRIMARY KEY (`idKeepers`),
  KEY `idUser_idx` (`idUser`),
  CONSTRAINT `idUser` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`)
);

drop table owner;

CREATE TABLE `owner` (
  `idOwner` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `idUser` int NOT NULL,
  PRIMARY KEY (`idOwner`),
  KEY `idUser_idx` (`idUser`),
  CONSTRAINT `idUserO` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`)
);

drop table petstype;

CREATE TABLE `petstype` (
  `idPetsType` int NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`idPetsType`)
);

drop table pets;

CREATE TABLE `pets` (
  `idPets` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `foto` int NOT NULL,
  `planVacuna` varchar(45) NOT NULL,
  `raza` varchar(45) NOT NULL,
  `video` varchar(45) NOT NULL,
  `idPetsType` int NOT NULL,
  `idOwner` int NOT NULL,
  PRIMARY KEY (`idPets`),
  KEY `idOwner_idx` (`idOwner`),
  KEY `idPetsType_idx` (`idPetsType`),
  CONSTRAINT `idOwner` FOREIGN KEY (`idOwner`) REFERENCES `owner` (`idOwner`),
  CONSTRAINT `idPetsType` FOREIGN KEY (`idPetsType`) REFERENCES `petstype` (`idPetsType`)
);

CREATE TABLE `reviews` (
  `idReviews` int NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `puntuacion` int NOT NULL,
  `idKeeper` int NOT NULL,
  `idPets` int NOT NULL,
  PRIMARY KEY (`idReviews`),
  KEY `idKeeper_idx` (`idKeeper`),
  KEY `idPets_idx` (`idPets`),
  CONSTRAINT `idKeeper` FOREIGN KEY (`idKeeper`) REFERENCES `keepers` (`idKeepers`),
  CONSTRAINT `idPets` FOREIGN KEY (`idPets`) REFERENCES `pets` (`idPets`)
);

CREATE TABLE `reserva` (
  `idReserva` int NOT NULL AUTO_INCREMENT,
  `fechaDesde` date NOT NULL,
  `fechaHasta` date NOT NULL,
  `importexReserva` int NOT NULL,
  `valorTotal` int NOT NULL,
  `idKeeper` int NOT NULL,
  `idPets` int NOT NULL,
  PRIMARY KEY (`idReserva`),
  KEY `idKeeper_idx` (`idKeeper`),
  KEY `idPets_idx` (`idPets`),
  CONSTRAINT `idKeeperRe` FOREIGN KEY (`idKeeper`) REFERENCES `keepers` (`idKeepers`),
  CONSTRAINT `idPetsRe` FOREIGN KEY (`idPets`) REFERENCES `pets` (`idPets`)
);

CREATE TABLE `tarifakeeper` (
  `idtarifaKeeper` int NOT NULL AUTO_INCREMENT,
  `valorDiario` int NOT NULL,
  `idKeeper` int NOT NULL,
  PRIMARY KEY (`idtarifaKeeper`),
  KEY `idKeeperTa_idx` (`idKeeper`),
  CONSTRAINT `idKeeperTa` FOREIGN KEY (`idKeeper`) REFERENCES `keepers` (`idKeepers`)
);

CREATE TABLE `diasdisponibles` (
  `idDiasDisponibles` int NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hasta` date NOT NULL,
  `idKeeper` int NOT NULL,
  PRIMARY KEY (`idDiasDisponibles`),
  KEY `idKeeperDis_idx` (`idKeeper`),
  CONSTRAINT `idKeeperDis` FOREIGN KEY (`idKeeper`) REFERENCES `keepers` (`idKeepers`)
);

CREATE TABLE `agendakeeper` (
  `idAgendaKeeper` int NOT NULL AUTO_INCREMENT,
  `dia` date NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `idDisponible` int NOT NULL,
  PRIMARY KEY (`idAgendaKeeper`),
  KEY `idDispo_idx` (`idDisponible`),
  CONSTRAINT `idDisponible` FOREIGN KEY (`idDisponible`) REFERENCES `diasdisponibles` (`idDiasDisponibles`)
);

INSERT INTO `pethero`.`petstype` (`idPetsType`, `description`) VALUES ('1', 'pequeño');
INSERT INTO `pethero`.`petstype` (`idPetsType`, `description`) VALUES ('2', 'mediano');
INSERT INTO `pethero`.`petstype` (`idPetsType`, `description`) VALUES ('3', 'grande');

CREATE TABLE images
(
	imageId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name NVARCHAR(100) NOT NULL
)Engine=InnoDB;

DELIMITER $$

CREATE PROCEDURE images_add(IN Name VARCHAR(100))
BEGIN
    INSERT INTO images
    	(name)
	VALUES
		(name);

END$$

/*CONSULTAS DE PRUEBA*/

select * from images;
select * from user;
select * from owner;
select * from keepers;

INSERT INTO Owner (name, surname,idUser) VALUES (
                    "name","surname", 1);

select * from pets;
select * from petstype;
select * from diasdisponibles;
select * from agendaKeeper;
select * from tarifakeeper;

select * from diasDisponibles 
WHERE DATE(fecha) BETWEEN '2022-12-05' AND '2022-12-25' AND 
DATE(hasta) BETWEEN '2022-12-05' AND '2022-12-25';

INSERT INTO pets (`name`, `foto`, `planVacuna`, `raza`, `video`, `idPetsType`, `idOwner`) 
VALUES ('grido', '2', 'asd', 'calle', 'video', '1', '1');

delete from pets where idPets = 4;

INSERT INTO diasdisponibles (`fecha`, `hasta`, `idKeeper`) 
VALUES ('2022-11-09', '2022-11-26', '2');

INSERT INTO diasdisponibles (`fecha`, `hasta`, `idKeeper`) 
VALUES ('2022-12-05', '2022-12-15', '1');

INSERT INTO diasdisponibles (`fecha`, `hasta`, `idKeeper`) 
VALUES ('2022-11-20', '2022-11-26', '1');

INSERT INTO tarifaKeeper (`valorDiario`,`idKeeper`) 
VALUES (1000,1);



