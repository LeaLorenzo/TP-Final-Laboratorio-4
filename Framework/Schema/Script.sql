create database PetHero;

USE PetHero;

CREATE TABLE Owner
(
	Id INT NOT NULL PRIMARY KEY,
    firstName NVARCHAR(100) NOT NULL,
    lastName NVARCHAR(100) NOT NULL
)Engine=InnoDB;
select *from Owner;