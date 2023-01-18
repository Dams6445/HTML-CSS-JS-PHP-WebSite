
/*
--
-- Base de données sur la Pizz'House
-- DESIGN By Damien Briol--Duhalde
-- ANNEE 2022
-- --------------------------------------------------------
*/

CREATE DATABASE IF NOT EXISTS PizzHouse;
USE PizzHouse;


DROP TABLE IF EXISTS Appartenir ;
DROP TABLE IF EXISTS Articles;
DROP TABLE IF EXISTS Client;
DROP TABLE IF EXISTS Panier;

/*-- Création de l'utilisateur
CREATE USER 'root'@'localhost' IDENTIFIED BY 'root',
-- Attribution des privilèges
GRANT ALL PRIVILEGES ON * . * TO 'root'@'%' WITH GRANT OPTION,
-- Rechargement de la table des privilèges
FLUSH PRIVILEGES;*/

/*
--
-- Structure de la table Articles
--
*/

CREATE TABLE Articles (
  ID_Article int(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Detail_Article varchar(50) DEFAULT NULL,
  Visuel varchar(1000) DEFAULT NULL,
  Nom varchar(20) DEFAULT NULL,
  Reference varchar(10) DEFAULT NULL,
  Prix decimal(15,2) DEFAULT NULL,
  Stock int DEFAULT NULL,
  Ingredients varchar(1000) DEFAULT NULL
);

/* ---------------------------------------------------------- */

/*
--
-- Structure de la table Client
--
*/

CREATE TABLE Client (
  ID_Client int(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Nom_Client varchar(100) DEFAULT NULL,
  Login varchar(100) NOT NULL,
  MdP varchar(100) NOT NULL
);

/* ---------------------------------------------------------- */

/*
--
-- Structure de la table Panier
--
*/

CREATE TABLE Panier (
  ID_Panier int(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Nom_Client varchar(100) DEFAULT NULL
);

/* ---------------------------------------------------------- */

/*
--
-- Structure de la table Appartenir
--
*/

CREATE TABLE Appartenir (
  ID_Article int(100) NOT NULL,
  ID_Panier int(100) NOT NULL,
  Quantite_Articles bigint NOT NULL,
  CONSTRAINT pk_appartenir PRIMARY KEY (ID_Article,ID_Panier),
  FOREIGN KEY (ID_Article) REFERENCES Articles (ID_Article),
  FOREIGN KEY (ID_Panier) REFERENCES Panier (ID_Panier)
 );

