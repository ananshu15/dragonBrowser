

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `dragon` (
  `id` int(6) NOT NULL,
  `name` varchar(30) NOT NULL,
  `rarity` varchar(30) NOT NULL,
  `element`varchar(30) NOT NULL,
  `health` varchar(30) NOT NULL,
  `strength` varchar(30) NOT NULL,
  `weakness` varchar(30) NOT NULL,
  `specialattack` varchar(30) NOT NULL,
  `imgDirectory` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `dragon` (`id`, `name`, `rarity`, `element`, `health`, `strength`, `weakness`, `specialattack`, `imgDirectory`) VALUES
(1, 'Flame Dragon', 'Common', 'Fire', '13000', 'Nature', 'Water', 'Nuclear Hit', 'dragons/Flame.jpg'),
(2, 'Glacial Dragon', 'Rare', 'Snow, Nature, Electric', '15000', 'Water, Nature', 'Fire', 'Cryogenic Freeze', 'dragons/Glacial.jpg'),
(3, 'Double Sea Dragon', 'VeryRare', 'Water', '17000', 'Fire, War', 'Nature', 'Acid Rain+', 'dragons/Doublesea.jpg'),
(4, 'Golem Dragon', 'Epic', 'Earth, Pure', '19000', 'Wind, Fire', 'Metal, War', 'Pure Enenrgy+', 'dragons/Golem.jpg'),
(5, 'Legacy Dragon', 'Legendary', 'Legend', '22000', 'Primal', 'Pure', 'Rainbow', 'dragons/Legacy.jpg'),
(6, 'High Moon Dragon', 'Heroic', 'Legend, Water, Metal', '36000', 'Primal', 'Pure', 'Pure Light+', 'dragons/Highmoon.jpg');


ALTER TABLE `dragon`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);


ALTER TABLE `dragon`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

