/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

DROP TABLE IF EXISTS `movie`;
CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` char(4) NOT NULL,
  `description` text,
  `imdbId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `movie` (`id`, `title`, `year`, `description`, `imdbId`) VALUES
(1, 'The Godfather', '1972', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', 'tt0068646'),
(2, 'Wild Strawberries', '1957', 'After living a life marked by coldness, an aging professor is forced to confront the emptiness of his existence.', 'tt0050986'),
(3, 'The Shawshank Redemption', '1994', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 'tt0111161'),
(4, 'One Flew Over the Cuckoo\'s Nest', '1975', 'Upon admittance to a mental institution, a brash rebel rallies the patients to take on the oppressive head nurse.', 'tt0073486'),
(5, 'The Dark Knight', '2008', 'When Batman, Gordon and Harvey Dent launch an assault on the mob, they let the clown out of the box, the Joker, bent on turning Gotham on itself and bringing any heroes down to his level.', 'tt0468569'),
(6, 'It\'s a Wonderful Life', '1946', 'An angel helps a compassionate but despairingly frustrated businessman by showing what life would have been like if he never existed.', 'tt0038650'),
(7, 'Kill Bill', '2003', 'The Bride wakens from a four-year coma. The child she carried in her womb is gone. Now she must wreak vengeance on the team of assassins who betrayed her - a team she was once part of.', 'tt0266697'),
(8, 'Seven Samurai', '1954', 'A poor village under attack by bandits recruits seven unemployed samurai to help them defend themselves.', 'tt0047478'),
(9, 'Apocalypse Now', '1979', 'During the U.S.-Viet Nam War, Captain Willard is sent on a dangerous mission into Cambodia to assassinate a renegade colonel who has set himself up as a god among a local tribe.', 'tt0078788'),
(10, 'Blood Diamond', '2006', 'A fisherman, a smuggler, and a syndicate of businessmen match wits over the possession of a priceless diamond.', 'tt0450259'),
(11, 'Modern Times', '1936', 'The Tramp struggles to live in modern industrial society with the help of a young homeless woman.', 'tt0027977'),
(12, 'A Beautiful Mind', '2001', 'After a brilliant but asocial mathematician accepts secret work in cryptography, his life takes a turn for the nightmarish.', 'tt0268978');

ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2090357647;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
