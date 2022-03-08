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
-- Base de données :  `site-e-commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(3, 'Raquettes'),
(4, 'Balles'),
(10, 'Accessoires'),
(11, 'Equipements'),
(12, 'Chaussures');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `mail` text NOT NULL,
  `nom` varchar(257) NOT NULL,
  `prenom` varchar(257) NOT NULL,
  `pass_md5` varchar(257) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `mail`, `nom`, `prenom`, `pass_md5`) VALUES
(3, 'yourihrm@gmail.com', 'Hermin', 'Youri', '219d9a8d992d17898b5583235cef3f1bc763d04d');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `category` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `category`, `stock`) VALUES
(121, 'Babolat Evoke 102', 'La raquette Evoke 102 est parfaite comme toute premiÃ¨re raquette ou pour se lancer dans le sport : un JouabilitÃ© et confort : premiers pas sur le court design technique et une construction en aluminium qui offre lÃ©gÃ¨retÃ©, maniabilitÃ© et soliditÃ©, pour une pratique du tennis plus facile.', 59.99, 'Raquettes', 5),
(126, 'Wilson Clash 100', 'Manifestation de l\'innovation de raquette la plus remarquable de Wilson, la Special Edition Clash 100 associe un design mÃ©tallique argentÃ© Ã  une technologie de cadre unique pour crÃ©er un contrÃ´le ultime.', 260, 'Raquettes', 0),
(132, 'Babolat Bipack de 4 balles', 'Les balles de tennis Babolat Team changent de packaging mais font Ã©galement peau neuve au niveau de leur construction.', 12.5, 'Balles', 5),
(133, 'Babolat Tube de 4 balles', 'Les balles de tennis Babolat Team changent de packaging mais font Ã©galement peau neuve au niveau de leur construction. ', 6.95, 'Balles', 5),
(134, 'Babolat Tube de 3 balles', 'Les balles de tennis Babolat Team sont des balles hautes performances pressurisÃ©es et adaptÃ©es Ã  toutes les surfaces. \r\nDÃ¨s les premiÃ¨res frappes, les sensations sont exceptionnelles : trajectoire maÃ®trisÃ©e, rebond rÃ©gulier et vivacitÃ© pour des Ã©changes rythmÃ©s et un vrai plaisir de jouer.', 5.6, 'Balles', 4),
(136, 'Pro Staff Precision XL 110', 'La Pro Staff Precision XL 110 associe une couleur rouge vif Ã  des caractÃ©ristiques dâ€™amÃ©lioration du jeu pour les joueurs amateurs.\r\nÃ€ seulement 11,5 oz (326 g) cordÃ©e avec une tÃªte surdimensionnÃ©e de 110 cmÂ², cette raquette offre beaucoup de puissance avec une certaine marge dâ€™erreur sur les coups un peu dÃ©centrÃ©s du plan de cordage.\r\n', 40, 'Raquettes', 2),
(138, 'Wilson H6', 'La raquette de tennis Wilson H6 dispose d\'un design moderne et Ã©lÃ©gant au coloris noir et gris mat.\r\nUn modÃ¨le polyvalent adaptÃ© aux joueurs dÃ©butants et/ou occasionnels. \r\n', 129.9, 'Raquettes', 3),
(139, 'Wilson H2', 'La raquette de tennis Wilson H6 dispose d\'un design moderne et Ã©lÃ©gant au coloris noir et gris mat.\r\nUn modÃ¨le polyvalent adaptÃ© aux joueurs dÃ©butants et/ou occasionnels. \r\n', 149.9, 'Raquettes', 2),
(143, 'Serre poignet Adidas', 'Permet de bien s\'essuyer le front et de ne pas perdre de points bÃªtement lors du match', 10, 'Accessoires', 5),
(144, 'Serre poignet Adidas V2', 'Permet de bien s\'essuyer le front et de ne pas perdre de points bÃªtement lors du match', 10, 'Accessoires', 2),
(145, 'POLO LACOSTE DJOKOVIC', 'Ce polo Lacoste Ã  Ã©tÃ© crÃ©Ã© en collaboration avec le joueur serbe Novak Djokovic. ConfectionnÃ© Ã  partir d\'un tissu en polyester, il garantit au joueur une excellente libertÃ© de mouvements grÃ¢ce Ã  sa matiÃ¨re stretch et Ã  sa lÃ©gÃ¨retÃ©. Le confort est quant Ã  lui assurÃ© grÃ¢ce Ã  sa technologie Ultra Dry qui vous permettra de vous maintenir au sec mÃªme pendant l\'effort. On note Ã©galement la prÃ©sence d\'un tissu anti UV qui vous protÃ¨gera des rayons du soleil. ', 100, 'Equipements', 26),
(146, 'T-SHIRT LACOSTE DJOKOVIC OFF COURT', 'CrÃ©Ã© en collaboration avec Novak Djokovic, ce t-shirt viendra dynamiser votre tenue ainsi que votre performance !\r\n\r\nConÃ§u dans un tissu lÃ©ger et doux en coton et polyester, ce t-shirt vous procurera une excellente libertÃ© de mouvements ainsi qu\'un grand confort. De plus, sa matiÃ¨re respirante Ultra-Dry vous procurera une agrÃ©able sensation de fraÃ®cheur tout au long de vos sÃ©ances de tennis.', 60, 'Equipements', 56),
(147, 'CHAUSSURES BABOLAT JET MACH II TERRE BATTUE', 'DÃ©couvrez les nouvelles chaussures Babolat Jet Mach II Terre Battue et leur nouveau design retravaillÃ©. Gardez les performances et la lÃ©gÃ¨retÃ© des modÃ¨les prÃ©cÃ©dents afin de bÃ©nÃ©ficier d\'une excellente mobilitÃ© sur le court ! Le coloris marine et blanc ainsi que la touche d\'orange viennent dynamiser le look de la chaussure.', 74.9, 'Chaussures', 36),
(148, 'CHAUSSURES ASICS SOLUTION SPEED FF GOFFIN NEW YORK TERRE BATTUE', 'Forte d\'une premiÃ¨re annÃ©e rÃ©ussie grÃ¢ce Ã  plus de lÃ©gÃ¨retÃ©, un meilleur amorti et un design renouvelÃ©, la chaussure Asics Solution Speed FF homme Terre Battue est de retour avec une cosmÃ©tique marine, turquoise et orange qui sera adoptÃ©e par David Goffin.', 89.9, 'Chaussures', 47);

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `date_trans` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nb_articles` int(11) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `transactions`
--

INSERT INTO `transactions` (`id`, `id_membre`, `date_trans`, `nb_articles`, `prix`) VALUES
(19, 3, '2021-06-20 04:41:28', 1, 60),
(20, 3, '2021-06-20 16:53:36', 5, 238),
(21, 3, '2021-06-20 16:56:34', 1, 40);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_membre` (`id_membre`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `FKtransactions` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
