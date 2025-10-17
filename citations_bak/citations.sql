-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 17 oct. 2025 à 11:46
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `citations`
--

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `author` varchar(63) NOT NULL,
  `biography` longtext DEFAULT NULL,
  `birthday` date NOT NULL COMMENT '(DC2Type:date_immutable)',
  `deathday` date DEFAULT NULL COMMENT '(DC2Type:date_immutable)',
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `author`
--

INSERT INTO `author` (`id`, `author`, `biography`, `birthday`, `deathday`, `created_at`, `updated_at`) VALUES
(1, 'Provençal le gauloi', '<p>Il trouve le graal mais il est un chouille con. blblbl\nLorem ipsum dolor sit amet. Aut consequatur tempora aut corporis repellatsit neque eos autem neque aut fugiat blanditiis! Et explicabo deserunt <a href=\"https://www.loremipzum.com\" target=\"_blank\">Id quia et quasi commodi ut dicta consequatur</a> ad quaerat consectetur. </p><h2>Qui nostrum beatae qui nihil facere. </h2><p>Hic iusto labore aut ipsam pariatursed quod. Sit dolorem pariatur eum iste laborumet aperiam? Eum eligendi repellatEt ratione est molestiae delectus. </p><ul><li>Ut omnis asperiores et sequi consectetur et corrupti facere in perferendis delectus. </li><li>Qui adipisci velit vel vero laborum id nemo molestiae. </li><li>Qui ratione illum aut alias voluptatem a vero repellat aut expedita laborum? </li></ul><h3>Et doloremque architecto est distinctio autem. </h3><p>Et nulla eveniet a voluptatem delectus <a href=\"https://www.loremipzum.com\" target=\"_blank\">Cum consequatur qui galisum nulla in autem doloremque ab deserunt labore</a>! Ut doloribus totam aut maiores Quisnon rerum 33 blanditiis dolor et exercitationem ducimus! Ad ipsum impedit in autem doloremEt quia. Et consequatur fugitSit fuga eos sunt libero id sint molestiae non mollitia architecto eos aliquid repellat sit enim nesciunt. </p>\n', '0002-11-30', NULL, NULL, NULL),
(2, 'Lionel Astier', 'Aime les fraises', '0000-00-00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `citations`
--

CREATE TABLE `citations` (
  `id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `citations` varchar(255) NOT NULL,
  `explanation` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `citations`
--

INSERT INTO `citations` (`id`, `author_id`, `citations`, `explanation`, `created_at`, `updated_at`) VALUES
(1, 1, 'C\'est pas faux', 'Il comprends pas ce qu\'on lui dit', '2025-10-16 14:28:14', NULL),
(2, 2, 'On est mieux là qu\'à se prendre des coups de pied dans les noix', 'On est mieux ici qu\'ailleurs', '2025-10-16 14:28:39', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20251015111551', '2025-10-15 13:16:07', 67),
('DoctrineMigrations\\Version20251015121239', '2025-10-15 14:13:15', 79),
('DoctrineMigrations\\Version20251015122440', '2025-10-15 14:24:49', 55),
('DoctrineMigrations\\Version20251015124530', '2025-10-15 14:45:41', 70),
('DoctrineMigrations\\Version20251015124844', '2025-10-15 14:49:18', 60),
('DoctrineMigrations\\Version20251016122625', '2025-10-16 14:26:45', 102);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `citations`
--
ALTER TABLE `citations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AC492EACF675F31B` (`author_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `citations`
--
ALTER TABLE `citations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `citations`
--
ALTER TABLE `citations`
  ADD CONSTRAINT `FK_AC492EACF675F31B` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
