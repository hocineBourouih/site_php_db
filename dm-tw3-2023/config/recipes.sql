DROP TABLE IF EXISTS `recipes`;

-- Création de la table `recipes`
CREATE TABLE IF NOT EXISTS `recipes` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `prep_time` INT(11) NOT NULL,
  `image_url` VARCHAR(255) NOT NULL,
  `difficulty` ENUM('Facile', 'Moyen', 'Difficile') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insertion des données d'exemple
INSERT INTO `recipes` (`name`, `description`, `prep_time`, `image_url`, `difficulty`) VALUES
('Spaghetti Carbonara', 'Des spaghetti avec une sauce crémeuse à base de pancetta, d\'œufs et de parmesan.', 30, 'https://www.allrecipes.com/thmb/Vg2cRidr2zcYhWGvPD8M18xM_WY=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/11973-spaghetti-carbonara-ii-DDMFS-4x3-6edea51e421e4457ac0c3269f3be5157.jpg', 'Moyen'),
('Salade César', 'Une salade croquante avec de la laitue romaine, des croûtons, du parmesan et une sauce César crémeuse.', 20, 'https://assets.afcdn.com/recipe/20200212/107449_w1024h1024c1cx1060cy707.webp', 'Facile'),
('Pizza', 'La pizza est une recette de cuisine traditionnelle de la cuisine italienne, originaire de Naples.', 60, 'https://www.yonder.fr/sites/default/files/destinations/%C2%A9%20Pupetta%20Pizza%20FB%20Paris2.jpg', 'Difficile');
