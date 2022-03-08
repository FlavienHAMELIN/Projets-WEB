-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 20 Juin 2021 à 15:02
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `vehicule`
--

-- --------------------------------------------------------

CREATE TABLE `vehicule` (
  `immatriculation` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `kilometrage` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `nbreDePlaces` varchar(255) NOT NULL,	
  `carburant` varchar(255) NOT NULL,
  `dateDePremiereMiseEnScene` varchar(255) NOT NULL,
  `dateDachat` varchar(255) NOT NULL,
  `dateDeProchaineRevision` varchar(255) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--

-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`immatriculation`);

-- AUTO_INCREMENT pour les tables exportées
--

CREATE TABLE `carburant` (
  `id` int(10) NOT NULL ,
  `date` varchar(255) NOT NULL,
  `quantite` decimal NOT NULL,
  `prixUnitaire` decimal NOT NULL,
  `montant` decimal NOT NULL,
  `immVehicule` varchar(255) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--

-- Index pour la table `carburant`
--
ALTER TABLE `carburant`
  ADD PRIMARY KEY(`id`);
--
ALTER TABLE `carburant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
