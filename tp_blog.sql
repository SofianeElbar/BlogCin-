-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 02 jan. 2023 à 16:00
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
-- Base de données : `tp_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `idCategory` int NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idCategory`, `categoryName`) VALUES
(1, 'Science-fiction'),
(2, 'Comédie'),
(3, 'Comédie dramatique'),
(4, 'Epouvante-horreur'),
(5, 'Western'),
(6, 'Comédie musicale'),
(7, 'Animation'),
(9, 'Fantastique'),
(10, 'Romance'),
(11, 'Drame'),
(12, 'Thriller'),
(13, 'Action'),
(14, 'Aventure');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `idComment` int NOT NULL,
  `idPost_fk` int NOT NULL,
  `idUser_fk` int NOT NULL,
  `date` datetime NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `idPost` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `content` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `idUser_fk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`idPost`, `title`, `date`, `content`, `picture`, `idUser_fk`) VALUES
(1, 'La soupe aux choux', '2022-12-22 11:15:47', 'Le Glaude et le Bombé, deux vieux paysans portés sur la bouteille, vivent retirés de la vie moderne. Une nuit, un extra-terrestre atterrit en soucoupe volante dans le jardin du Glaude. En gage de bienvenue, ce dernier lui offre un peu de sa fameuse soupe aux choux...', 'images/soupe.jpg', 1),
(2, '2001: l\'odyssée de l\'espace', '2022-12-27 14:34:43', 'A l\'aube de l\'Humanité, dans le désert africain, une tribu de primates subit les assauts répétés d\'une bande rivale, qui lui dispute un point d\'eau. La découverte d\'un monolithe noir inspire au chef des singes assiégés un geste inédit et décisif. Brandissant un os, il passe à l\'attaque et massacre ses adversaires. Le premier instrument est né.\r\n\r\nEn 2001, quatre millions d\'années plus tard, un vaisseau spatial évolue en orbite lunaire au rythme langoureux du \"Beau Danube Bleu\". A son bord, le Dr. Heywood Floyd enquête secrètement sur la découverte d\'un monolithe noir qui émet d\'étranges signaux vers Jupiter.\r\n\r\nDix-huit mois plus tard, les astronautes David Bowman et Frank Poole font route vers Jupiter à bord du Discovery. Les deux hommes vaquent sereinement à leurs tâches quotidiennes sous le contrôle de HAL 9000, un ordinateur exceptionnel doué d\'intelligence et de parole. Cependant, HAL, sans doute plus humain que ses maîtres, commence à donner des signes d\'inquiétude : à quoi rime cette mission et que risque-t-on de découvrir sur Jupiter ?', 'images/2001.jpg', 2),
(3, 'La La Land', '2022-12-27 14:34:43', 'Au cœur de Los Angeles, une actrice en devenir prénommée Mia sert des cafés entre deux auditions. \r\nDe son côté, Sebastian, passionné de jazz, joue du piano dans des clubs miteux pour assurer sa subsistance. \r\nTous deux sont bien loin de la vie rêvée à laquelle ils aspirent…\r\nLe destin va réunir ces doux rêveurs, mais leur coup de foudre résistera-t-il aux tentations, aux déceptions, et à la vie trépidante d’Hollywood ?', 'images/lalaland.jpg', 1),
(4, 'Le bon, la brute et le truand', '2022-12-27 14:34:43', 'Pendant la Guerre de Sécession, trois hommes, préférant s\'intéresser à leur profit personnel, se lancent à la recherche d\'un coffre contenant 200 000 dollars en pièces d\'or volés à l\'armée sudiste. Tuco sait que le trésor se trouve dans un cimetière, tandis que Joe connaît le nom inscrit sur la pierre tombale qui sert de cache. Chacun a besoin de l\'autre. Mais un troisième homme entre dans la course : Setenza, une brute qui n\'hésite pas à massacrer femmes et enfants pour parvenir à ses fins.', 'images/lebon.jpg', 2),
(5, 'Sur la route de Madison ', '2022-12-27 14:34:43', 'Michael Johnson et sa sœur Caroline reviennent dans la ferme de leur enfance régler la succession de leur mère, Francesca. Ils vont découvrir tout un pan de la vie de leur mère ignoré de tous, sa brève, intense et inoubliable liaison avec un photographe de passage.', 'images/madison.jpg', 1),
(6, 'American history X', '2022-12-27 14:34:43', 'A travers l\'histoire d\'une famille américaine, ce film tente d\'expliquer l\'origine du racisme et de l\'extrémisme aux États-Unis. Il raconte l\'histoire de Derek qui, voulant venger la mort de son père, abattu par un dealer noir, a épousé les thèses racistes d\'un groupuscule de militants d\'extrême droite et s\'est mis au service de son leader, brutal théoricien prônant la suprématie de la race blanche. Ces théories le mèneront à commettre un double meurtre entrainant son jeune frère, Danny, dans la spirale de la haine.', 'images/american.jpg', 2),
(7, 'Pulp Fiction', '2022-12-27 14:34:43', 'L\'odyssée sanglante et burlesque de petits malfrats dans la jungle de Hollywood à travers trois histoires qui s\'entremêlent.', 'images/pulp.jpg', 1),
(8, 'Les dents de la mer', '2022-12-27 14:34:43', 'A quelques jours du début de la saison estivale, les habitants de la petite station balnéaire d\'Amity sont mis en émoi par la découverte sur le littoral du corps atrocement mutilé d\'une jeune vacancière. Pour Martin Brody, le chef de la police, il ne fait aucun doute que la jeune fille a été victime d\'un requin. Il décide alors d\'interdire l\'accès des plages mais se heurte à l\'hostilité du maire uniquement intéressé par l\'afflux des touristes. Pendant ce temps, le requin continue à semer la terreur le long des côtes et à dévorer les baigneurs...', 'images/dents.jpg', 2),
(9, 'Pinocchio', '2022-12-27 14:34:43', 'Dans un petit village, l\'inventeur Gepetto vient de construire sa dernière marionette qu\'il baptise \"Pinocchio\". Ce vieil homme qui n\'a jamais eu d\'enfant fait alors le voeu que Pinocchio se transforme en réel petit garçon. La fée bleue accomplit son souhait, donnant vie à la sculpture de bois. Mais la marionette ne se transformera complètement qu\'une fois qu\'elle aura prouver son mérite. Jiminy Cricket sera sa conscience, tâche qui s\'avérera plus compliquée que prévu car Pinocchio s\'embarque dans de périlleuses aventures...', 'images/pinocchio.jpg', 1),
(10, 'Halloween, la nuit des masques', '2022-12-27 14:34:43', 'La nuit d\'Halloween 1963. Le jeune Michael Myers se précipite dans la chambre de sa soeur aînée et la poignarde sauvagement. Après son geste, Michael se mure dans le silence et est interné dans un asile psychiatrique. Quinze ans plus tard, il s\'échappe de l\'hôpital et retourne sur les lieux de son crime. Il s\'en prend alors aux adolescents de la ville.', 'images/halloween.jpg', 2),
(11, 'Les nouveaux sauvages', '2022-12-27 15:36:51', 'L\'inégalité, l\'injustice et l\'exigence auxquelles nous expose le monde où l\'on vit provoquent du stress et des dépressions chez beaucoup de gens. Certains craquent. Les Nouveaux sauvages est un film sur eux.\r\n\r\nVulnérables face à une réalité qui soudain change et devient imprévisible, les héros des Nouveaux sauvages franchissent l\'étroite frontière qui sépare la civilisation de la barbarie. Une trahison amour, le retour d\'un passé refoulé, la violence enfermée dans un détail quotidien, sont autant de prétextes qui les entraînent dans un vertige où ils perdent les pédales et éprouve l\'indéniable plaisir du pétage de plombs.', 'images/sauvages.jpg', 1),
(12, 'Gremlins', '2022-12-27 18:08:13', 'Rand Peltzer offre à son fils Billy un étrange animal : un mogwai. Son ancien propriétaire l\'a bien mis en garde : il ne faut pas l\'exposer à la lumiere, lui éviter tout contact avec l\'eau, et surtout, surtout ne jamais le nourrir apres minuit... Sinon...', 'images/gremlins.jpg', 2),
(13, 'Les aventuriers de l\'arche perdue', '2022-12-27 22:13:22', '1936. Parti à la recherche d\'une idole sacrée en pleine jungle péruvienne, l\'aventurier Indiana Jones échappe de justesse à une embuscade tendue par son plus coriace adversaire : le Français René Belloq.\r\nRevenu à la vie civile à son poste de professeur universitaire d\'archéologie, il est mandaté par les services secrets et par son ami Marcus Brody, conservateur du National Museum de Washington, pour mettre la main sur le Médaillon de Râ, en possession de son ancienne amante Marion Ravenwood, désormais tenancière d\'un bar au Tibet.\r\nCet artefact égyptien serait en effet un premier pas sur le chemin de l\'Arche d\'Alliance, celle-là même où Moïse conserva les Dix Commandements. Une pièce historique aux pouvoirs inimaginables dont Hitler cherche à s\'emparer...', 'images/indiana.jpg', 1),
(14, 'Terminator', '2022-12-31 00:00:00', 'Un Terminator, robot d\'aspect humain, est envoyé d\'un futur où sa race livre aux hommes une guerre sans merci. Sa mission est de trouver et d\'éliminer Sarah Connor avant qu\'elle ne donne naissance à John, appelé à devenir le chef de la résistance. Cette dernière envoie un de ses membres, Reese, aux trousses du cyborg.', 'images/terminator.jpg', 5);

-- --------------------------------------------------------

--
-- Structure de la table `post_category`
--

CREATE TABLE `post_category` (
  `idPostCategory` int NOT NULL,
  `idPost_fk` int NOT NULL,
  `idCategory_fk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `post_category`
--

INSERT INTO `post_category` (`idPostCategory`, `idPost_fk`, `idCategory_fk`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 6),
(4, 4, 5),
(5, 5, 10),
(6, 6, 11),
(7, 7, 12),
(8, 8, 13),
(9, 9, 7),
(10, 10, 4),
(11, 11, 3),
(12, 12, 9),
(13, 13, 14);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `pseudo`, `email`, `mdp`) VALUES
(1, 'slouf', 'sloufslouf@kikoo.fr', 'hoy'),
(2, 'elsouf', 'elsoufelsouf@kikoo.fr', 'hey'),
(3, 'Jojo', 'john.wayne@holywood.com', '$2y$10$Y/5T1VVMfrRAMkF0gZNWZeUI0ShwMcIkThohEKqn2v/iVD97dxEDW'),
(5, 'Wilo', 'bruce.willis@hollywood.com', '$2y$10$H1kNvLnjUi6QhUWEEU4Z/u0QHfqzbS/E91Q7YEbHQz1qZE4hodajS'),
(6, 'Shasha', 'sharon.stone@hollywood.com', '$2y$10$pmbOpc.Wvj5lIJbWAq3B1uAl2dF0wpBGQGx3GHjtjXz7vaw4gqJD6'),
(8, 'Pitou', 'brad.pitt@hotmail.com', '$2y$10$RTt4HGq0stYNrSplRwQ5qe1amEQ1QXkrl6bBVCePpUQDQcJi5ndoy'),
(9, 'Georgy', 'george.clooney@hollywood.com', '$2y$10$CyHwhowoHxMp7.qszeWT4.240bRUEmExbKwz3cobtuluq1A5L2fC.'),
(11, 'Katy', 'kate.winsley@hollywood.com', '$2y$10$zF/qku3LDWtVeYKmhrYDz.tT3FzpTOJGCV68ki/jQvQZhAU2Cn/DW');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `idPost` (`idPost_fk`) USING BTREE,
  ADD KEY `idUser` (`idUser_fk`) USING BTREE;

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPost`),
  ADD KEY `idUser` (`idUser_fk`) USING BTREE;

--
-- Index pour la table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`idPostCategory`),
  ADD KEY `idPost` (`idPost_fk`) USING BTREE,
  ADD KEY `idCategory` (`idCategory_fk`) USING BTREE;

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `idPostCategory` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idUser_fk`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `idCommment_fk` FOREIGN KEY (`idPost_fk`) REFERENCES `post` (`idPost`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`idUser_fk`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`idPost_fk`) REFERENCES `post` (`idPost`),
  ADD CONSTRAINT `post_category_ibfk_2` FOREIGN KEY (`idCategory_fk`) REFERENCES `category` (`idCategory`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
