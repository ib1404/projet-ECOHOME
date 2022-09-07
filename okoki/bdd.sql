-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 23 jan. 2022 à 23:38
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `config2`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--

CREATE TABLE `adresses` (
  `id` int(11) NOT NULL,
  `adresse` varchar(256) NOT NULL,
  `ville` varchar(256) NOT NULL,
  `codePostal` int(11) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adresses`
--

INSERT INTO `adresses` (`id`, `adresse`, `ville`, `codePostal`, `id_users`) VALUES
(1, 'rue du blabla', 'Paris', 75016, 25),
(2, 'rue du blabla', 'Paris', 75016, 40),
(3, 'rue du blabla', 'Paris', 75015, 48),
(4, 'rue du blabla', 'Paris', 75016, 58),
(5, 'rue du blabla', 'Paris', 75019, 59),
(6, 'rue du blabla', 'Paris', 75020, 60),
(7, 'rue du blabla', 'Paris', 75014, 62),
(8, 'rue du blabla', 'Paris', 75016, 64),
(9, 'rue du blabla', 'Paris', 75016, 65),
(10, 'rue du blabla', 'Paris', 75016, 66),
(11, 'rue du blabla', 'Paris', 75016, 67),
(12, 'rue du blabla', 'Paris', 75016, 68),
(13, 'rue du blabla', 'Paris', 75016, 69);

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

CREATE TABLE `capteurs` (
  `id` int(11) NOT NULL,
  `type` varchar(256) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `id_rooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `capteurs`
--

INSERT INTO `capteurs` (`id`, `type`, `nom`, `id_rooms`) VALUES
(1, 'test', 'test1', 1),
(2, 'test', 'test2', 1),
(5, 'hj', 'hjj', 1),
(6, 'test5', 'test', 1),
(7, 'test5', 'test2', 1),
(8, 'test', 'test1', 1),
(9, 'test', 'test2', 1),
(10, 'hj', 'hjj', 1),
(11, 'test5', 'test', 1),
(12, 'test5', 'test2', 1),
(13, 'gaz', 'thomas', 1);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `text` char(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `destinataire` varchar(256) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(256) NOT NULL,
  `id_adresse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rooms`
--

INSERT INTO `rooms` (`id`, `size`, `type`, `id_adresse`) VALUES
(1, 25, 'cuisine', 1);

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`id`, `score`, `date`, `id_users`) VALUES
(1, 0, '2022-01-18 07:56:19', 1),
(2, 0, '2022-01-18 07:56:19', 25),
(3, 0, '2022-01-18 07:56:19', 40),
(4, 0, '2022-01-18 07:56:19', 48),
(5, 0, '2022-01-18 07:56:19', 58),
(6, 0, '2022-01-18 07:56:19', 59),
(7, 0, '2022-01-18 07:56:19', 60),
(8, 0, '2022-01-18 07:56:19', 61),
(9, 0, '2022-01-18 07:56:19', 62),
(10, 0, '2022-01-18 07:56:19', 63),
(11, 0, '2022-01-18 07:56:19', 64),
(12, 0, '2022-01-18 07:56:19', 65),
(13, 0, '2022-01-18 07:56:19', 66),
(14, 0, '2022-01-18 07:56:19', 67),
(15, 0, '2022-01-18 07:56:19', 68);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `mail` varchar(256) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `mail`, `type`) VALUES
(1, 'gigi', 'gigi', 'gigi@gmail.com', 0),
(2, 'gigi', 'gigi', 'gigi@gmail.com', 0),
(3, 'test123', 'test123', 'test123@gmail.com', 0),
(4, 'zladim', 'ef138cda10a78c48c08d84bbe564fe0a', 'zladim@gmail.com', 0),
(5, 'achraf', 'c36d6e43044252ab121a52138e5aacb0', 'achraf@gmail.com', 0),
(6, 'papa', '0ac6cd34e2fac333bf0ee3cd06bdcf96', 'papa@papa', 0),
(7, 'papapa', '4af444de0b2474684a01634e00c6fb5c', 'papapa@papapa.com', 0),
(8, 'papapapa', 'b7626fe60f276ad29fbeefca8cb99336', 'papapapa@papapa.com', 0),
(9, 'ouioui', '9d25305725a1d48236e03a6ff69f7c38', 'ouioui@ouioui.com', 0),
(10, 'allo', 'ce92c299bb5d344bdac1f9c03396b34f', 'allo@gmail.com', 0),
(11, 'albert', '6c5bc43b443975b806740d8e41146479', 'albert@gmail.com', 0),
(12, 'albertaz', '0050c5d87160a359572d96a3925b1dff', 'albert@gmail.com', 0),
(13, 'azedaz ', '5b1b3a4e3ae45a65a35a515017885505', 'azdaz@azdaz.com', 0),
(14, 'alexiss', '059bf68f71c80fce55214b411dd2280c', 'alexiss@gmail.com', 0),
(15, 'alexis', '059bf68f71c80fce55214b411dd2280c', 'alexis@gmail.com', 0);

-- --------------------------------------------------------

--
-- Structure de la table `value`
--

CREATE TABLE `value` (
  `id` int(11) NOT NULL,
  `date_init` timestamp NOT NULL DEFAULT current_timestamp(),
  `value_init` int(11) NOT NULL,
  `date_final` timestamp NULL DEFAULT NULL,
  `value_final` int(11) DEFAULT NULL,
  `id_capteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adresse-users` (`id_users`);

--
-- Index pour la table `capteurs`
--
ALTER TABLE `capteurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `capteurs_rooms` (`id_rooms`) USING BTREE;

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_users` (`id_user`);

--
-- Index pour la table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roots-adresse` (`id_adresse`);

--
-- Index pour la table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_users`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `value`
--
ALTER TABLE `value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `value_capteurs` (`id_capteur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `capteurs`
--
ALTER TABLE `capteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `value`
--
ALTER TABLE `value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;