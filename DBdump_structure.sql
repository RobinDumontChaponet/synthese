-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: 195.83.142.10:3306
-- Généré le : Mar 18 Novembre 2014 à 17:54
-- Version du serveur: 5.5.40
-- Version de PHP: 5.3.10-1ubuntu3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `jozwicki2u_projetSynthese`
--

-- --------------------------------------------------------

--
-- Structure de la table `aEtudie`
--
-- Création: Mar 18 Novembre 2014 à 16:48
--

CREATE TABLE IF NOT EXISTS `aEtudie` (
  `idPromo` int(50) NOT NULL,
  `idDerpartement` int(50) NOT NULL,
  `idAncien` int(50) NOT NULL,
  `idDiplomeDUT` int(50) NOT NULL,
  PRIMARY KEY (`idPromo`,`idDerpartement`,`idAncien`,`idDiplomeDUT`),
  KEY `idDerpartement` (`idDerpartement`),
  KEY `idAncien` (`idAncien`),
  KEY `idDiplomeDUT` (`idDiplomeDUT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `aEtudie`:
--   `idDiplomeDUT`
--       `diplomeDUT` -> `idDiplomeDUT`
--   `idPromo`
--       `promotion` -> `idPromo`
--   `idDerpartement`
--       `departementIUT` -> `idDepartement`
--   `idAncien`
--       `ancien` -> `idAncien`
--

-- --------------------------------------------------------

--
-- Structure de la table `ancien`
--
-- Création: Lun 17 Novembre 2014 à 19:39
--

CREATE TABLE IF NOT EXISTS `ancien` (
  `idAncien` int(50) NOT NULL,
  `idPersonne` int(50) NOT NULL,
  `adresse1` varchar(50) DEFAULT NULL,
  `adresse2` varchar(50) DEFAULT NULL,
  `codePostal` varchar(5) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `pays` varchar(20) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `imageProfil` blob,
  `imageTrombi` blob,
  PRIMARY KEY (`idAncien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `ancien`:
--   `idAncien`
--       `personne` -> `idPersonne`
--

-- --------------------------------------------------------

--
-- Structure de la table `aParticipe`
--
-- Création: Lun 17 Novembre 2014 à 20:46
--

CREATE TABLE IF NOT EXISTS `aParticipe` (
  `idAncien` int(50) NOT NULL,
  `idEvenement` int(50) NOT NULL,
  PRIMARY KEY (`idAncien`,`idEvenement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `aParticipe`:
--   `idAncien`
--       `ancien` -> `idAncien`
--   `idEvenement`
--       `evenement` -> `idEvenement`
--

-- --------------------------------------------------------

--
-- Structure de la table `codeAPE`
--
-- Création: Sam 15 Novembre 2014 à 10:10
--

CREATE TABLE IF NOT EXISTS `codeAPE` (
  `code` varchar(50) NOT NULL,
  `libelle` varchar(50) NOT NULL DEFAULT 'Aucun libelle',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--
-- Création: Lun 17 Novembre 2014 à 20:21
--

CREATE TABLE IF NOT EXISTS `compte` (
  `idCompte` int(50) NOT NULL AUTO_INCREMENT,
  `idProfil` int(50) NOT NULL,
  `ndc` varchar(50) NOT NULL,
  `mdp` varchar(60) NOT NULL,
  PRIMARY KEY (`idCompte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- RELATIONS POUR LA TABLE `compte`:
--   `idProfil`
--       `typeProfil` -> `idProfil`
--

-- --------------------------------------------------------

--
-- Structure de la table `departementIUT`
--
-- Création: Lun 17 Novembre 2014 à 19:04
--

CREATE TABLE IF NOT EXISTS `departementIUT` (
  `idDepartement` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`idDepartement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `diplomeDUT`
--
-- Création: Lun 17 Novembre 2014 à 19:17
--

CREATE TABLE IF NOT EXISTS `diplomeDUT` (
  `idDiplomeDUT` int(50) NOT NULL AUTO_INCREMENT,
  `idDepartement` int(50) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`idDiplomeDUT`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- RELATIONS POUR LA TABLE `diplomeDUT`:
--   `idDepartement`
--       `departementIUT` -> `idDepartement`
--

-- --------------------------------------------------------

--
-- Structure de la table `diplomePostDUT`
--
-- Création: Lun 17 Novembre 2014 à 21:20
--

CREATE TABLE IF NOT EXISTS `diplomePostDUT` (
  `idDiplomePost` int(50) NOT NULL AUTO_INCREMENT,
  `idDomaine` int(50) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`idDiplomePost`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- RELATIONS POUR LA TABLE `diplomePostDUT`:
--   `idDomaine`
--       `domaine` -> `idDomaine`
--

-- --------------------------------------------------------

--
-- Structure de la table `disposeDe`
--
-- Création: Lun 17 Novembre 2014 à 19:45
--

CREATE TABLE IF NOT EXISTS `disposeDe` (
  `idProfil` int(50) NOT NULL,
  `idDroit` int(50) NOT NULL,
  `idPage` int(50) NOT NULL,
  PRIMARY KEY (`idProfil`,`idDroit`,`idPage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `disposeDe`:
--   `idDroit`
--       `droits` -> `idDroit`
--   `idPage`
--       `page` -> `idPage`
--   `idProfil`
--       `typeProfil` -> `idProfil`
--

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--
-- Création: Lun 17 Novembre 2014 à 21:19
--

CREATE TABLE IF NOT EXISTS `domaine` (
  `idDomaine` int(50) NOT NULL AUTO_INCREMENT,
  `libelle` int(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`idDomaine`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--
-- Création: Lun 17 Novembre 2014 à 19:44
--

CREATE TABLE IF NOT EXISTS `droits` (
  `idDroit` int(50) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`idDroit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--
-- Création: Sam 15 Novembre 2014 à 10:09
--

CREATE TABLE IF NOT EXISTS `entreprise` (
  `idEntreprise` int(50) NOT NULL AUTO_INCREMENT,
  `codeAPE` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse1` varchar(50) NOT NULL,
  `adresse2` varchar(50) NOT NULL,
  `codePostal` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `cedex` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  PRIMARY KEY (`idEntreprise`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- RELATIONS POUR LA TABLE `entreprise`:
--   `codeAPE`
--       `codeAPE` -> `code`
--

-- --------------------------------------------------------

--
-- Structure de la table `estLie`
--
-- Création: Mar 18 Novembre 2014 à 16:46
--

CREATE TABLE IF NOT EXISTS `estLie` (
  `idAncien` int(50) NOT NULL,
  `idParent` int(50) NOT NULL,
  PRIMARY KEY (`idAncien`,`idParent`),
  KEY `idParent` (`idParent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `estLie`:
--   `idParent`
--       `parents` -> `idParent`
--   `idAncien`
--       `ancien` -> `idAncien`
--

-- --------------------------------------------------------

--
-- Structure de la table `estSpecialise`
--
-- Création: Lun 17 Novembre 2014 à 18:35
--

CREATE TABLE IF NOT EXISTS `estSpecialise` (
  `idAncien` int(50) NOT NULL,
  `idSpe` int(50) NOT NULL,
  PRIMARY KEY (`idAncien`,`idSpe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `estSpecialise`:
--   `idAncien`
--       `ancien` -> `idAncien`
--   `idSpe`
--       `specialisation` -> `idSpe`
--

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--
-- Création: Lun 17 Novembre 2014 à 21:56
--

CREATE TABLE IF NOT EXISTS `etablissement` (
  `idEtablissement` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `adresse1` varchar(50) NOT NULL,
  `adresse2` varchar(50) NOT NULL,
  `codePostal` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  PRIMARY KEY (`idEtablissement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--
-- Création: Lun 17 Novembre 2014 à 20:44
--

CREATE TABLE IF NOT EXISTS `evenement` (
  `idEvenement` int(50) NOT NULL AUTO_INCREMENT,
  `idTypeEvenement` int(50) NOT NULL,
  PRIMARY KEY (`idEvenement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- RELATIONS POUR LA TABLE `evenement`:
--   `idTypeEvenement`
--       `typeEvenement` -> `idTypeEvenement`
--

-- --------------------------------------------------------

--
-- Structure de la table `page`
--
-- Création: Lun 17 Novembre 2014 à 19:42
--

CREATE TABLE IF NOT EXISTS `page` (
  `idPage` int(50) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`idPage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `parents`
--
-- Création: Lun 17 Novembre 2014 à 19:37
--

CREATE TABLE IF NOT EXISTS `parents` (
  `idParent` int(50) NOT NULL AUTO_INCREMENT,
  `adresse1` varchar(20) DEFAULT NULL,
  `adresse2` varchar(20) DEFAULT NULL,
  `codePostale` varchar(5) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `pays` varchar(20) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idParent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--
-- Création: Lun 17 Novembre 2014 à 18:44
--

CREATE TABLE IF NOT EXISTS `personne` (
  `idPersonne` int(50) NOT NULL AUTO_INCREMENT,
  `idCompte` int(50) DEFAULT NULL,
  `nomUsage` varchar(50) NOT NULL,
  `nomPatronymique` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  PRIMARY KEY (`idPersonne`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- RELATIONS POUR LA TABLE `personne`:
--   `idCompte`
--       `compte` -> `idCompte`
--

-- --------------------------------------------------------

--
-- Structure de la table `possede`
--
-- Création: Lun 17 Novembre 2014 à 21:59
--

CREATE TABLE IF NOT EXISTS `possede` (
  `idAncien` int(50) NOT NULL,
  `idDiplomePost` int(50) NOT NULL,
  `idEtablissement` int(50) NOT NULL,
  `resultat` int(2) NOT NULL,
  `dateDeb` date NOT NULL,
  `dateFin` date NOT NULL,
  PRIMARY KEY (`idAncien`,`idDiplomePost`,`idEtablissement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `possede`:
--   `idAncien`
--       `ancien` -> `idAncien`
--   `idDiplomePost`
--       `diplomePostDUT` -> `idDiplomePost`
--   `idEtablissement`
--       `etablissement` -> `idEtablissement`
--

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--
-- Création: Lun 17 Novembre 2014 à 19:12
--

CREATE TABLE IF NOT EXISTS `poste` (
  `idPoste` int(50) NOT NULL DEFAULT '0',
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`idPoste`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `prefere`
--
-- Création: Lun 17 Novembre 2014 à 20:46
--

CREATE TABLE IF NOT EXISTS `prefere` (
  `idAncien` int(50) NOT NULL,
  `idTypeEvenement` int(50) NOT NULL,
  PRIMARY KEY (`idAncien`,`idTypeEvenement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `prefere`:
--   `idAncien`
--       `ancien` -> `idAncien`
--   `idTypeEvenement`
--       `typeEvenement` -> `idTypeEvenement`
--

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--
-- Création: Lun 17 Novembre 2014 à 19:03
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `idPromo` int(50) NOT NULL AUTO_INCREMENT,
  `annee` date NOT NULL,
  PRIMARY KEY (`idPromo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `specialisation`
--
-- Création: Sam 15 Novembre 2014 à 09:49
--

CREATE TABLE IF NOT EXISTS `specialisation` (
  `idSpe` int(50) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  `idTypeSpe` int(5) NOT NULL,
  PRIMARY KEY (`idSpe`),
  KEY `idTypeSpe` (`idTypeSpe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- RELATIONS POUR LA TABLE `specialisation`:
--   `idTypeSpe`
--       `typeSpecialisation` -> `idTypeSpe`
--

-- --------------------------------------------------------

--
-- Structure de la table `travaille`
--
-- Création: Lun 17 Novembre 2014 à 19:21
--

CREATE TABLE IF NOT EXISTS `travaille` (
  `idAncien` int(50) NOT NULL,
  `idPoste` int(50) NOT NULL,
  `idEntreprise` int(50) NOT NULL,
  `dateEmbaucheDeb` date NOT NULL,
  `dateEmbaucheFin` date DEFAULT NULL,
  PRIMARY KEY (`idAncien`,`idPoste`,`idEntreprise`,`dateEmbaucheDeb`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `travaille`:
--   `idAncien`
--       `ancien` -> `idAncien`
--   `idEntreprise`
--       `entreprise` -> `idEntreprise`
--   `idPoste`
--       `poste` -> `idPoste`
--

-- --------------------------------------------------------

--
-- Structure de la table `typeEvenement`
--
-- Création: Lun 17 Novembre 2014 à 20:44
--

CREATE TABLE IF NOT EXISTS `typeEvenement` (
  `idTypeEvenement` int(50) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`idTypeEvenement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `typeProfil`
--
-- Création: Lun 17 Novembre 2014 à 19:49
--

CREATE TABLE IF NOT EXISTS `typeProfil` (
  `idProfil` int(50) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idProfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `typeSpecialisation`
--
-- Création: Sam 15 Novembre 2014 à 09:44
--

CREATE TABLE IF NOT EXISTS `typeSpecialisation` (
  `idTypeSpe` int(50) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`idTypeSpe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `aEtudie`
--
ALTER TABLE `aEtudie`
  ADD CONSTRAINT `aEtudie_ibfk_4` FOREIGN KEY (`idDiplomeDUT`) REFERENCES `diplomeDUT` (`idDiplomeDUT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aEtudie_ibfk_1` FOREIGN KEY (`idPromo`) REFERENCES `promotion` (`idPromo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aEtudie_ibfk_2` FOREIGN KEY (`idDerpartement`) REFERENCES `departementIUT` (`idDepartement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aEtudie_ibfk_3` FOREIGN KEY (`idAncien`) REFERENCES `ancien` (`idAncien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `estLie`
--
ALTER TABLE `estLie`
  ADD CONSTRAINT `estLie_ibfk_2` FOREIGN KEY (`idParent`) REFERENCES `parents` (`idParent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estLie_ibfk_1` FOREIGN KEY (`idAncien`) REFERENCES `ancien` (`idAncien`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
