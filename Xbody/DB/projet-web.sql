-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 08 juin 2020 à 10:01
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet-web`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis_client`
--

CREATE TABLE `avis_client` (
  `id_avis` int(11) NOT NULL,
  `avis` varchar(50) NOT NULL,
  `aprouver` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `carte_bancaire`
--

CREATE TABLE `carte_bancaire` (
  `id_carte` int(11) NOT NULL,
  `name_on_card` varchar(25) NOT NULL,
  `card_number` int(11) NOT NULL,
  `epiry_date` varchar(10) NOT NULL,
  `csc` int(11) NOT NULL,
  `code_postale` varchar(5) DEFAULT NULL,
  `date_creation` date NOT NULL,
  `date_expiration` date NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `carte_bancaire`
--

INSERT INTO `carte_bancaire` (`id_carte`, `name_on_card`, `card_number`, `epiry_date`, `csc`, `code_postale`, `date_creation`, `date_expiration`, `id_client`) VALUES
(12, 'aaaaaaaaaaaaa', 2147483647, '2020-06-15', 333, '25000', '2020-06-05', '2021-06-05', 10),
(13, 'zzzzzzzzzzzzzzzz', 2147483647, '2020-06-16', 333, '25000', '2020-06-05', '2020-12-05', 10);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(25) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `date_naissance` date NOT NULL,
  `confirmer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `email`, `password`, `sexe`, `telephone`, `date_naissance`, `confirmer`) VALUES
(10, 'EL GATIA', 'HAMZA', 'hamzagatia@gmail.com', 'azerty123', 'homme', '0612345678', '0000-00-00', 1),
(17, 'EL GATIA', 'HAMZA', 'hamzagatia@gmail.com', 'azerty123', 'homme', '0612345678', '0000-00-00', 1),
(19, 'EL GATIA', 'HAMZA', 'hamzagatia7@gmail.com', 'azerty123', 'homme', '0612345678', '0000-00-00', 0),
(21, 'aze', 'azer', 'hamza@gmail.com', '0000', 'homme', '0613333033', '2020-06-22', 0);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `src` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `src`) VALUES
(3, 'images/635048014540156250.jpg'),
(6, 'images/best-fitness-gyms.jpg'),
(7, 'images/gym-gym-in-house-traditional-home-gym.jpg'),
(13, 'images/SoHoChi_037_copy.jpg'),
(15, 'images/Square_wellness_xxxxxxxxxxx_i118937_03.jpg'),
(17, 'images/wonderful-s.jpg'),
(27, 'images/weight-training-machines.jpg'),
(30, 'images/image3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `id_offre` int(11) NOT NULL,
  `type` varchar(25) NOT NULL,
  `duree_abonnement` varchar(25) NOT NULL,
  `prix` varchar(25) NOT NULL,
  `discription` varchar(200) NOT NULL,
  `reduction` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id_offre`, `type`, `duree_abonnement`, `prix`, `discription`, `reduction`) VALUES
(1, 'خفيف', '7 أيام تجربة فقط', 'مجاناَ', 'جرب الاشتراك معنا لمده 5 ايام مجاناً لتحصل على كل مميزات المتوفره لدينا! سارع بالتسجيل معنا', ''),
(2, 'محترف', '12 شهر عضوية مميزه', '2000  درهم', 'جرب الاشتراك معنا لمده 5 ايام مجاناً لتحصل على كل مميزات المتوفره لدينا! سارع بالتسجيل معنا', '40%'),
(3, 'متوسط', '6 أشهر عضوية مميزه', '700  درهم', 'جرب الاشتراك معنا لمده 5 ايام مجاناً لتحصل على كل مميزات المتوفره لدينا! سارع بالتسجيل معنا', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis_client`
--
ALTER TABLE `avis_client`
  ADD PRIMARY KEY (`id_avis`),
  ADD KEY `fk_avis_client` (`id_client`);

--
-- Index pour la table `carte_bancaire`
--
ALTER TABLE `carte_bancaire`
  ADD PRIMARY KEY (`id_carte`),
  ADD KEY `fk_client` (`id_client`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id_offre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis_client`
--
ALTER TABLE `avis_client`
  MODIFY `id_avis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `carte_bancaire`
--
ALTER TABLE `carte_bancaire`
  MODIFY `id_carte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis_client`
--
ALTER TABLE `avis_client`
  ADD CONSTRAINT `fk_avis_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `carte_bancaire`
--
ALTER TABLE `carte_bancaire`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
