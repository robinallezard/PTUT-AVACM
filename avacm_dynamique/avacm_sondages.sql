-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 27 fév. 2018 à 18:23
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `avacm_sondages`
--

-- --------------------------------------------------------

--
-- Structure de la table `accede`
--

CREATE TABLE `accede` (
  `id_user` int(11) NOT NULL,
  `id_formulaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `pseudo_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `password_admin`, `pseudo_admin`) VALUES
(3, 'password', 'testavacm');

-- --------------------------------------------------------

--
-- Structure de la table `champ`
--

CREATE TABLE `champ` (
  `id_champ` int(11) NOT NULL,
  `type_champ` varchar(255) NOT NULL,
  `description_champ` text,
  `tableau_reponses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `comporte`
--

CREATE TABLE `comporte` (
  `id_question` int(11) NOT NULL,
  `id_formulaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `dependance`
--

CREATE TABLE `dependance` (
  `id_question` int(11) NOT NULL,
  `id_question_1` int(11) NOT NULL,
  `id_reponse` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formulaire`
--

CREATE TABLE `formulaire` (
  `id_formulaire` int(11) NOT NULL,
  `titre_formulaire` varchar(255) NOT NULL,
  `description_formulaire` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formulaire`
--

INSERT INTO `formulaire` (`id_formulaire`, `titre_formulaire`, `description_formulaire`) VALUES
(1, 'Sondage Étudiant', NULL),
(2, 'Sondage Prof', NULL),
(3, 'Sondage Médecin', NULL),
(4, 'Sondage leucémie', NULL),
(5, 'Sondage prout', NULL),
(6, 'Sondage Hugo', NULL),
(7, 'khvoug vo ug ', NULL),
(8, 'khvoug vo ug ', ''),
(9, 'OZJEFPIzyevy', ''),
(10, 'vzmjbvimhr', 'velrjv lejrv e'),
(11, 'vzmjbvimhr', 'velrjv lejrv e'),
(12, 'vzmjbvimhr', 'velrjv lejrv e'),
(13, 'JKVHKGKCKHF K', 'jg khg h\r\n'),
(14, 'LGUVOUG UG', 'UG OUG OUG UOG '),
(15, 'LGUVOUG UG', 'UG OUG OUG UOG '),
(16, 'IHVLJG JG ', 'KMH LH HJ H'),
(17, 'hlv lgj lgj j', 'ljg g gk gh'),
(18, 'hlv lgj lgj j', 'ljg g gk gh'),
(19, 'hlv lgj lgj j', 'ljg g gk gh'),
(20, 'hlv lgj lgj j', 'ljg g gk gh');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `titre_question` varchar(255) NOT NULL,
  `description_question` text,
  `url_image_question` varchar(255) DEFAULT NULL,
  `obligatoire` tinyint(1) NOT NULL,
  `type_question` varchar(255) NOT NULL DEFAULT 'phrase',
  `id_champ` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`id_question`, `titre_question`, `description_question`, `url_image_question`, `obligatoire`, `type_question`, `id_champ`) VALUES
(1, 'TITRE', 'qrv  e rverv', NULL, 1, 'phrase', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `id_reponse` varchar(25) NOT NULL,
  `type_reponse` int(11) NOT NULL,
  `valeur_reponse` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `type_user` varchar(255) NOT NULL,
  `nom_user` varchar(255) NOT NULL,
  `sexe_user` int(11) DEFAULT NULL,
  `age_user` int(11) DEFAULT NULL,
  `description_user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accede`
--
ALTER TABLE `accede`
  ADD PRIMARY KEY (`id_user`,`id_formulaire`),
  ADD KEY `FK_accede_id_formulaire` (`id_formulaire`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `champ`
--
ALTER TABLE `champ`
  ADD PRIMARY KEY (`id_champ`);

--
-- Index pour la table `comporte`
--
ALTER TABLE `comporte`
  ADD PRIMARY KEY (`id_question`,`id_formulaire`),
  ADD KEY `FK_comporte_id_formulaire` (`id_formulaire`);

--
-- Index pour la table `dependance`
--
ALTER TABLE `dependance`
  ADD PRIMARY KEY (`id_question`,`id_question_1`,`id_reponse`),
  ADD KEY `FK_dependance_id_question_1` (`id_question_1`),
  ADD KEY `FK_dependance_id_reponse` (`id_reponse`);

--
-- Index pour la table `formulaire`
--
ALTER TABLE `formulaire`
  ADD PRIMARY KEY (`id_formulaire`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `FK_question_id_champ` (`id_champ`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id_reponse`),
  ADD KEY `FK_reponse_id_user` (`id_user`),
  ADD KEY `FK_reponse_id_question` (`id_question`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `champ`
--
ALTER TABLE `champ`
  MODIFY `id_champ` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formulaire`
--
ALTER TABLE `formulaire`
  MODIFY `id_formulaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `accede`
--
ALTER TABLE `accede`
  ADD CONSTRAINT `FK_accede_id_formulaire` FOREIGN KEY (`id_formulaire`) REFERENCES `formulaire` (`id_formulaire`),
  ADD CONSTRAINT `FK_accede_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `comporte`
--
ALTER TABLE `comporte`
  ADD CONSTRAINT `FK_comporte_id_formulaire` FOREIGN KEY (`id_formulaire`) REFERENCES `formulaire` (`id_formulaire`),
  ADD CONSTRAINT `FK_comporte_id_question` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`);

--
-- Contraintes pour la table `dependance`
--
ALTER TABLE `dependance`
  ADD CONSTRAINT `FK_dependance_id_question` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`),
  ADD CONSTRAINT `FK_dependance_id_question_1` FOREIGN KEY (`id_question_1`) REFERENCES `question` (`id_question`),
  ADD CONSTRAINT `FK_dependance_id_reponse` FOREIGN KEY (`id_reponse`) REFERENCES `reponse` (`id_reponse`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `FK_question_id_champ` FOREIGN KEY (`id_champ`) REFERENCES `champ` (`id_champ`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `FK_reponse_id_question` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`),
  ADD CONSTRAINT `FK_reponse_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
