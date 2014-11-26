-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Client: 195.83.142.10:3306
-- Généré le : Mer 26 Novembre 2014 à 16:52
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
-- Création: Mer 19 Novembre 2014 à 17:03
--

CREATE TABLE IF NOT EXISTS `aEtudie` (
  `idPromo` int(50) NOT NULL,
  `idDerpartement` int(50) NOT NULL,
  `idPersonne` int(50) NOT NULL,
  `idDiplomeDUT` int(50) NOT NULL,
  PRIMARY KEY (`idPromo`,`idDerpartement`,`idPersonne`,`idDiplomeDUT`),
  KEY `idDerpartement` (`idDerpartement`),
  KEY `idDiplomeDUT` (`idDiplomeDUT`),
  KEY `idPersonne` (`idPersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `aEtudie`:
--   `idPersonne`
--       `ancien` -> `idPersonne`
--   `idPromo`
--       `promotion` -> `idPromo`
--   `idDerpartement`
--       `departementIUT` -> `idDepartement`
--   `idDiplomeDUT`
--       `diplomeDUT` -> `idDiplomeDUT`
--

-- --------------------------------------------------------

--
-- Structure de la table `ancien`
--
-- Création: Ven 21 Novembre 2014 à 14:33
--

CREATE TABLE IF NOT EXISTS `ancien` (
  `idPersonne` int(50) NOT NULL,
  `idParent` int(50) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `adresse1` varchar(50) DEFAULT NULL,
  `adresse2` varchar(50) DEFAULT NULL,
  `codePostal` varchar(5) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `pays` varchar(20) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `imageProfil` blob,
  `imageTrombi` blob,
  PRIMARY KEY (`idPersonne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `ancien`:
--   `idParent`
--       `parents` -> `idParent`
--   `idPersonne`
--       `personne` -> `idPersonne`
--

-- --------------------------------------------------------

--
-- Structure de la table `aParticipe`
--
-- Création: Mer 19 Novembre 2014 à 17:03
--

CREATE TABLE IF NOT EXISTS `aParticipe` (
  `idPersonne` int(50) NOT NULL,
  `idEvenement` int(50) NOT NULL,
  PRIMARY KEY (`idPersonne`,`idEvenement`),
  KEY `idEvenement` (`idEvenement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `aParticipe`:
--   `idPersonne`
--       `ancien` -> `idPersonne`
--   `idEvenement`
--       `evenement` -> `idEvenement`
--

-- --------------------------------------------------------

--
-- Structure de la table `codeAPE`
--
-- Création: Ven 21 Novembre 2014 à 14:25
--

CREATE TABLE IF NOT EXISTS `codeAPE` (
  `code` varchar(4) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
-- Création: Mer 19 Novembre 2014 à 06:58
--

CREATE TABLE IF NOT EXISTS `disposeDe` (
  `idProfil` int(50) NOT NULL,
  `idDroit` int(50) NOT NULL,
  `idPage` int(50) NOT NULL,
  PRIMARY KEY (`idProfil`,`idDroit`,`idPage`),
  KEY `idDroit` (`idDroit`),
  KEY `idPage` (`idPage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `disposeDe`:
--   `idPage`
--       `page` -> `idPage`
--   `idProfil`
--       `typeProfil` -> `idProfil`
--   `idDroit`
--       `droits` -> `idDroit`
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
-- Structure de la table `estSpecialise`
--
-- Création: Mer 19 Novembre 2014 à 17:03
--

CREATE TABLE IF NOT EXISTS `estSpecialise` (
  `idPersonne` int(50) NOT NULL,
  `idSpe` int(50) NOT NULL,
  PRIMARY KEY (`idPersonne`,`idSpe`),
  KEY `idSpe` (`idSpe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `estSpecialise`:
--   `idPersonne`
--       `ancien` -> `idPersonne`
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
-- Création: Ven 21 Novembre 2014 à 14:33
--

CREATE TABLE IF NOT EXISTS `parents` (
  `idParent` int(50) NOT NULL AUTO_INCREMENT,
  `adresse1` varchar(20) DEFAULT NULL,
  `adresse2` varchar(20) DEFAULT NULL,
  `codePostale` varchar(5) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `pays` varchar(20) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idParent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--
-- Création: Mer 19 Novembre 2014 à 13:40
--

CREATE TABLE IF NOT EXISTS `personne` (
  `idPersonne` int(50) NOT NULL AUTO_INCREMENT,
  `idCompte` int(50) DEFAULT NULL,
  `nomUsage` varchar(50) NOT NULL,
  `nomPatronymique` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
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
-- Création: Mer 19 Novembre 2014 à 17:03
--

CREATE TABLE IF NOT EXISTS `possede` (
  `idPersonne` int(50) NOT NULL,
  `idDiplomePost` int(50) NOT NULL,
  `idEtablissement` int(50) NOT NULL,
  `resultat` int(2) NOT NULL,
  `dateDeb` date NOT NULL,
  `dateFin` date NOT NULL,
  PRIMARY KEY (`idPersonne`,`idDiplomePost`,`idEtablissement`),
  KEY `idDiplomePost` (`idDiplomePost`),
  KEY `idEtablissement` (`idEtablissement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `possede`:
--   `idEtablissement`
--       `etablissement` -> `idEtablissement`
--   `idPersonne`
--       `ancien` -> `idPersonne`
--   `idDiplomePost`
--       `diplomePostDUT` -> `idDiplomePost`
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
-- Création: Mer 19 Novembre 2014 à 17:03
--

CREATE TABLE IF NOT EXISTS `prefere` (
  `idPersonne` int(50) NOT NULL,
  `idTypeEvenement` int(50) NOT NULL,
  PRIMARY KEY (`idPersonne`,`idTypeEvenement`),
  KEY `idTypeEvenement` (`idTypeEvenement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `prefere`:
--   `idTypeEvenement`
--       `typeEvenement` -> `idTypeEvenement`
--   `idPersonne`
--       `ancien` -> `idPersonne`
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
-- Création: Mer 19 Novembre 2014 à 17:04
--

CREATE TABLE IF NOT EXISTS `travaille` (
  `idPersonne` int(50) NOT NULL,
  `idPoste` int(50) NOT NULL,
  `idEntreprise` int(50) NOT NULL,
  `dateEmbaucheDeb` date NOT NULL,
  `dateEmbaucheFin` date DEFAULT NULL,
  PRIMARY KEY (`idPersonne`,`idPoste`,`idEntreprise`,`dateEmbaucheDeb`),
  KEY `idPoste` (`idPoste`),
  KEY `idEntreprise` (`idEntreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `travaille`:
--   `idEntreprise`
--       `entreprise` -> `idEntreprise`
--   `idPersonne`
--       `ancien` -> `idPersonne`
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
-- Création: Mer 19 Novembre 2014 à 13:54
--

CREATE TABLE IF NOT EXISTS `typeProfil` (
  `idProfil` int(50) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idProfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
  ADD CONSTRAINT `aEtudie_ibfk_5` FOREIGN KEY (`idPersonne`) REFERENCES `ancien` (`idPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aEtudie_ibfk_1` FOREIGN KEY (`idPromo`) REFERENCES `promotion` (`idPromo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aEtudie_ibfk_2` FOREIGN KEY (`idDerpartement`) REFERENCES `departementIUT` (`idDepartement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aEtudie_ibfk_4` FOREIGN KEY (`idDiplomeDUT`) REFERENCES `diplomeDUT` (`idDiplomeDUT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ancien`
--
ALTER TABLE `ancien`
  ADD CONSTRAINT `ancien_ibfk_1` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `aParticipe`
--
ALTER TABLE `aParticipe`
  ADD CONSTRAINT `aParticipe_ibfk_3` FOREIGN KEY (`idPersonne`) REFERENCES `ancien` (`idPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aParticipe_ibfk_2` FOREIGN KEY (`idEvenement`) REFERENCES `evenement` (`idEvenement`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `disposeDe`
--
ALTER TABLE `disposeDe`
  ADD CONSTRAINT `disposeDe_ibfk_3` FOREIGN KEY (`idPage`) REFERENCES `page` (`idPage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disposeDe_ibfk_1` FOREIGN KEY (`idProfil`) REFERENCES `typeProfil` (`idProfil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disposeDe_ibfk_2` FOREIGN KEY (`idDroit`) REFERENCES `droits` (`idDroit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `estSpecialise`
--
ALTER TABLE `estSpecialise`
  ADD CONSTRAINT `estSpecialise_ibfk_3` FOREIGN KEY (`idPersonne`) REFERENCES `ancien` (`idPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estSpecialise_ibfk_2` FOREIGN KEY (`idSpe`) REFERENCES `specialisation` (`idSpe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `possede`
--
ALTER TABLE `possede`
  ADD CONSTRAINT `possede_ibfk_3` FOREIGN KEY (`idEtablissement`) REFERENCES `etablissement` (`idEtablissement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `possede_ibfk_1` FOREIGN KEY (`idPersonne`) REFERENCES `ancien` (`idPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `possede_ibfk_2` FOREIGN KEY (`idDiplomePost`) REFERENCES `diplomePostDUT` (`idDiplomePost`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prefere`
--
ALTER TABLE `prefere`
  ADD CONSTRAINT `prefere_ibfk_2` FOREIGN KEY (`idTypeEvenement`) REFERENCES `typeEvenement` (`idTypeEvenement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prefere_ibfk_1` FOREIGN KEY (`idPersonne`) REFERENCES `ancien` (`idPersonne`);

--
-- Contraintes pour la table `travaille`
--
ALTER TABLE `travaille`
  ADD CONSTRAINT `travaille_ibfk_3` FOREIGN KEY (`idEntreprise`) REFERENCES `entreprise` (`idEntreprise`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `travaille_ibfk_1` FOREIGN KEY (`idPersonne`) REFERENCES `ancien` (`idPersonne`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `travaille_ibfk_2` FOREIGN KEY (`idPoste`) REFERENCES `poste` (`idPoste`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
