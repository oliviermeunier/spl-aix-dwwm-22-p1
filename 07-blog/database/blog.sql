-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 22 fév. 2023 à 12:46
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `idArticle` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `categoryId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idArticle`, `title`, `content`, `image`, `createdAt`, `categoryId`) VALUES
(1, 'ChatGPT et Google Bard : quelles différences ?', 'Bard dispose de données mises à jour en temps réel puisque le service conversationnel de Google est directement connecté au web pour fournir des réponses fraîches et de haute qualité. Là où ChatGPT est limité puisqu’il s’appuie sur une base de connaissances qui n’a pas été mise à jour depuis septembre 2021. Cela signifie que le chatbot d’OpenAI n’est pour le moment pas en capacité d’apporter des réponses sur des événements très récents. ChatGPT précise malgré tout qu’il peut « répondre à des questions hypothétiques basées sur des connaissances actuelles et des tendances historiques. » mais que ses réponses doivent être prises avec précaution.', 'art-1.jpg', '2023-02-01 13:36:48', 1),
(2, 'iPhone : 5 nouveautés attendues avec iOS 16.4', 'Enfin ! Avec iOS 16.4, Apple va prendre en charge Unicode 15.0, pour proposer 31 nouveaux emojis. Au programme : un nouveau smiley, 3 cœurs colorés (bleu clair, gris et rose), et de nouveaux animaux !\r\n\r\nDésormais, les sites web enregistrés en tant qu’application sur l’écran d’accueil d’un smartphone Apple auront la possibilité d’envoyer des notifications push aux propriétaires d’iPhone ou d’iPad.\r\n\r\nPour rappel, pour enregistrer un site web comme application : rendez-vous sur le site en question via Safari, puis cliquez sur le bouton de partage (représenté par l’icône avec un carré et une flèche), et cliquez sur Sur l’écran d’accueil.\r\n\r\nL’application Podcasts d’Apple est améliorée sur iPhone, mais aussi iPad, Mac et CarPlay. Parmi les nouvelles fonctionnalités :\r\n\r\nUn nouvel onglet « Chaînes », qui regroupe toutes les chaînes de podcasts suivies (gratuites et payantes),\r\nL’amélioration de la file d’attente, qui propose des recommandations plus adéquates, ainsi que de nouveaux outils pour trier l’ordre des épisodes,\r\nDes statistiques plus poussées, afin de permettre aux créateurs de podcast de comprendre la façon dont les auditeurs interagissent avec leur contenu.', 'art-2.jpg', '2023-02-22 12:38:50', 1),
(3, 'Développeur Web Junior H/F', 'Description du poste\r\nDescription du poste et Missions :\r\n\r\nLa Société Francaise de Garantie est à la recherche de son futur Développeur Web Junior !\r\n\r\nPrise de poste dès que possible.\r\n\r\nLe développeur Web assure le développement et la maintenance des applications Web.\r\n\r\nVous serez rattaché à la direction informatique et au directeur des systèmes d\'informations.\r\n\r\nActivités principales ;\r\n\r\n-Participation au développement de nouvelles applications Web.\r\n\r\n-Maintenance des applications web existantes.\r\n\r\n-Participation à l\'activité générale du service IT.\r\n\r\n-Documentation systématique de votre travail.\r\n\r\nProfil recherché :\r\n\r\nFormation et expérience ; De formation supérieure en informatique (BAC+2 /+3). Vous bénéficiez d\'une expérience obligatoire que vous saurez justifier de plus de 2 ans en développement d\'applications web. Sérieux, curieux, dynamique, et avec une expérience confirmée, vous avez le sens de la perfection, de la créativité de de la finition de vos travaux.\r\n\r\nCompétences et qualités requises ;\r\n\r\n- Maîtrise de PHP, HTML, CSS et JavaScript obligatoire.\r\n\r\n- Compétences en Laravel (ou autre framework MVC PHP) et VueJS (ou autre framework proche) seraient un réel plus\r\n\r\n- Compétences en SGBD (MySQL) grandement recommandées.\r\n\r\n- Maitrise de l\'Anglais écrit.\r\n\r\nSoftSkills ; Polyvalence, Rigueur, Organisation, Travail en équipe, esprit d\'analyse et de synthèse, Autonomie, Ponctualité; Réactivité, Curiosité et intérêt, Pragmatisme, Force de propositions\r\n\r\nInformations utiles :\r\n\r\nPackage rémunération attractive : fixe + primes qui seront le reflet et la valorisation de votre travail\r\n\r\nMutuelle prise en charge à plus de 70% / Prévoyance / Retraite supplémentaire 100% financée par SFG pour vous\r\n\r\nParticipation / Intéressement / Plan Épargne Entreprise / Compte Épargne Temps\r\n\r\nCarte tickets Restaurant 9€/jour\r\n\r\nFormation personnalisée via SFG Academy\r\n\r\nParcours professionnel adapté à votre expérience, et votre performance.\r\n\r\nQui sommes nous ?\r\n\r\nLa Société Française de Garantie est une filiale de WERTGARANTIE, un groupe d’assurances Allemand.\r\n\r\nDepuis 30 ans maintenant, SFG se positionne comme un acteur majeur du monde de la réparation, et s’engage aux côtés des pouvoirs publics, de ses partenaires et des consommateurs, dans une démarche éco-responsable, qui s’illustre dans tous les choix de l’entreprise.\r\n\r\nDomiciliée près d\'Aix-en-Provence (Rousset), SFG est en constante croissance et compte désormais 200 collaborateurs. Elle a créé SFG Services en 2021, sa filiale en charge de réparer l’électroménager et le multimédia, qui compte 100 collaborateurs quant à elle.\r\n\r\nType d\'emploi : Temps plein, CDI\r\n\r\nSalaire : 28 000,00€ à 32 000,00€ par an\r\n\r\nAvantages :\r\n\r\nÉpargne salariale\r\nRTT\r\nTitre-restaurant\r\nProgrammation :\r\n\r\nDisponible le week-end\r\nDu Lundi au Vendredi\r\nPériodes de travail de 10 heures\r\nPériodes de travail de 12 heures\r\nPériodes de travail de 8 heures\r\nTravail en journée\r\nTypes de primes et de gratifications :\r\n\r\nPrimes\r\nExpérience:\r\n\r\nTechnologies de l\'information: 1 an (Optionnel)\r\nHTML5: 1 an (Optionnel)\r\nLieu du poste : Un seul lieu de travail\r\n\r\nDate de début prévue : 20/02/2023', '', '2023-02-16 13:40:11', 3),
(4, 'Babel et la transpilation de code JavaScript', 'Babel est un outil de transpilation de code qui prend en entrée du code écrit dans une version plus récente (ou actuelle) de JavaScript et le convertit en une version compatible avec les \"anciennes versions\", de sorte que le code puisse être exécuté sur un plus grand nombre de navigateurs et d\'appareils.\r\n\r\nBabel utilise des plugins et des presets qui lui permettent de gérer différentes versions de JavaScript et d\'appliquer les transformations nécessaires pour convertir le code en une version compatible. On peut également les configurer pour effectuer des conversions spécifiques en fonction des besoins.', 'art-4.jpg', '2023-01-11 13:43:34', 2);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `idCategory` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idCategory`, `name`) VALUES
(1, 'Tech & IT'),
(2, 'Développement Web'),
(3, 'Offres d\'emplois');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `idArticle` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`idCategory`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;


CREATE TABLE `comment` (
  `idComment` int NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `articleId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `articleId` (`articleId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int NOT NULL AUTO_INCREMENT;
COMMIT;


ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`articleId`) REFERENCES `article` (`idArticle`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
