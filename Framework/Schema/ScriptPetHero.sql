create database PetHero;
CREATE TABLE `user` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(45) NOT NULL,
  `tipoUsuario` varchar(50) NOT NULL,
  `user` varchar(45) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `keepers` (
  `idKeepers` int NOT NULL AUTO_INCREMENT,
  `idUser` int NOT NULL,
  PRIMARY KEY (`idKeepers`),
  KEY `idUser_idx` (`idUser`),
  CONSTRAINT `idUser` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `owner` (
  `idOwner` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `idUser` int NOT NULL,
  PRIMARY KEY (`idOwner`),
  KEY `idUserOw_idx` (`idUser`),
  CONSTRAINT `idUserO` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

CREATE TABLE `petstype` (
  `idPetsType` int NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`idPetsType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `tarifakeeper` (
  `idtarifaKeeper` int NOT NULL AUTO_INCREMENT,
  `valorDiario` int NOT NULL,
  `idKeeper` int NOT NULL,
  PRIMARY KEY (`idtarifaKeeper`),
  KEY `idKeeperTa_idx` (`idKeeper`),
  CONSTRAINT `idKeeperTa` FOREIGN KEY (`idKeeper`) REFERENCES `keepers` (`idKeepers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `diasdisponibles` (
  `idDiasDisponibles` int NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hasta` date NOT NULL,
  `idKeeper` int NOT NULL,
  PRIMARY KEY (`idDiasDisponibles`),
  KEY `idKeeperDis_idx` (`idKeeper`),
  CONSTRAINT `idKeeperDis` FOREIGN KEY (`idKeeper`) REFERENCES `keepers` (`idKeepers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `agendakeeper` (
  `idAgendaKeeper` int NOT NULL AUTO_INCREMENT,
  `dia` date NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `idDisponible` int NOT NULL,
  PRIMARY KEY (`idAgendaKeeper`),
  KEY `idDispo_idx` (`idDisponible`),
  CONSTRAINT `idDisponible` FOREIGN KEY (`idDisponible`) REFERENCES `diasdisponibles` (`idDiasDisponibles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
