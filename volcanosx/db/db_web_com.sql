-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 11, 2023 at 02:38 AM
-- Server version: 10.6.14-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', '21232f297a57a5a743894a0e4a801fc3', '2023-10-08 04:58:41', '2023-10-08 04:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_relationship`
--

CREATE TABLE `admin_user_relationship` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action_type` enum('add','modify','remove') NOT NULL,
  `action_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('pending','completed','canceled') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_transactions`
--

CREATE TABLE `payment_transactions` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_gateway` varchar(50) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('success','failure') NOT NULL,
  `transaction_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `det_img1` varchar(255) DEFAULT NULL,
  `det_img2` varchar(255) DEFAULT NULL,
  `det_img3` varchar(255) DEFAULT NULL,
  `feat_img` varchar(255) DEFAULT NULL,
  `is_feat` enum('Y','N','N/A') NOT NULL DEFAULT 'N/A',
  `total_downloads` int(11) DEFAULT 0,
  `average_rating` decimal(3,2) DEFAULT 0.00,
  `num_reviews` int(11) DEFAULT 0,
  `category` enum('Games','Softwares') DEFAULT NULL,
  `dl_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `icon`, `thumb`, `det_img1`, `det_img2`, `det_img3`, `feat_img`, `is_feat`, `total_downloads`, `average_rating`, `num_reviews`, `category`, `dl_link`, `created_at`, `updated_at`) VALUES
(14, 'Ferrari 296 GTS', 'About:\\r\\nFerrari 296 GTS is not just a game; it\\\'s a high-octane thrill ride that puts you in the driver\\\'s seat of one of the world\\\'s most iconic sports cars. Get ready to experience the rush of speed, the thrill of the chase, and the allure of luxury as you take on the open road in your very own Ferrari.\\r\\n\\r\\nGame Description:\\r\\nBuckle up and prepare for the ultimate driving experience with the Ferrari 296 GTS! In this heart-pounding car game, you\\\'ll step into the driver\\\'s seat of the legendary Ferrari 296 GTS and hit the road for an adrenaline-fueled adventure like no other.\\r\\nKey Features:\\r\\nðŸŽï¸ Drive the Dream: Own the road in a stunningly realistic virtual replica of the Ferrari 296 GTS. Feel the power of the engine, the precision of the steering, and the sheer elegance of this Italian masterpiece.\\r\\nðŸ›£ï¸ Endless Adventure: Cruise through meticulously designed landscapes. Every twist and turn is a new opportunity to showcase your driving skills.\\r\\nðŸ’° Collect and Conquer: As you speed through the game, collect coins scattered along the road. Use them to upgrade your Ferrari or unlock new cars from the world\\\'s top manufacturers.\\r\\nðŸš— Traffic Challenges: Test your reflexes and maneuvering abilities as you navigate through traffic. Dodge other vehicles, weave through the lanes, and chase down your rivals in thrilling races.\\r\\nðŸŒŸ Stunning Graphics: Immerse yourself in a visually stunning world with realistic graphics that make you feel like you\\\'re driving a real Ferrari. From the gleam of the polished paint to the breathtaking scenery, every detail is a feast for the eyes.\\r\\nðŸ Compete and Dominate: Challenge friends and players from around the globe in competitive races. Prove that you have what it takes to be the ultimate Ferrari 296 GTS champion.\\r\\nFerrari 296 GTS isn\\\'t just a game; it\\\'s a celebration of speed, luxury, and precision engineering. Are you ready to rev up your engines and embark on the ride of a lifetime? Get behind the wheel and experience the thrill of a Ferrari like never before.\\r\\n\\r\\nDon\\\'t miss your chance to own the road in Ferrari 296 GTS. \\r\\nDownload the game now and start your journey towards becoming a true racing legend!\\r\\n\\r\\n', '488.00', '../images/icon1 ferrari.jpg', '../images/Thumbnaill thumbnail.jpg', '../images/ssx ferrari 1.jpg', '../images/ssx ferrari 2.jpg', '../images/ssx ferrari3.jpg', '../images/fp ferrari.jpg', 'Y', 0, '0.00', 0, 'Games', 'https://drive.google.com/drive/folders/1KzgAnqMl8XiZfjibrz-iQOPEYMp7a29P?usp=sharing', '2023-10-10 16:58:19', '2023-10-10 17:39:43'),
(15, 'MiMi Jump', 'About:\\r\\nMiMi Jump is not your average mobile game; it\\\'s a daring adventure that pushes the limits of skill and wit. Join MiMi, the adventurous owl, as she embarks on an epic journey to conquer the mighty Mount Everest under the mesmerizing glow of the moonlight, all in pursuit of precious coins. This is not just a game; it\\\'s a test of intelligence, courage, and precision.\\r\\n\\r\\nGame Description:\\r\\n\\r\\nPrepare to spread your wings and soar to new heights in the enchanting world of MiMi Jump! In this unique and challenging game, you\\\'ll take on the role of MiMi, a clever owl with a thirst for adventure and a knack for collecting coins in the most unlikely of places.\\r\\n\\r\\nðŸŒŒ A Nighttime Odyssey: The game unfolds against the backdrop of the awe-inspiring Mount Everest, bathed in the soft, ethereal light of the moon. The atmosphere is nothing short of magical, as you guide MiMi through the treacherous terrain, each jump illuminated by the enchanting glow of the moon.\\r\\n\\r\\nðŸ¦‰ Meticulously Crafted Challenges: MiMi Jump is no ordinary game; it\\\'s a cerebral challenge that will test your intelligence and reflexes. Navigate MiMi through a series of intricate obstacles, strategically planning each jump to collect as many coins as possible.\\r\\n\\r\\nðŸ’¡ Only for the Sharpest Minds: This game is not for the faint-hearted. Only the most cunning and quick-witted players will conquer the full extent of MiMi\\\'s journey. Are you up for the challenge?\\r\\n\\r\\nðŸŒŸ Immersive Moonlit Graphics: The game\\\'s stunning, moonlit visuals transport you to a world of unparalleled beauty. Every pixel is a testament to the game\\\'s dedication to visual excellence.\\r\\n\\r\\nðŸ† Compete and Conquer: Join the ranks of elite players and compete for the top spot on the global leaderboard. Prove your mettle and showcase your expertise as you strive to become the ultimate MiMi Jump champion.\\r\\n\\r\\nMiMi Jump isn\\\'t just a game; it\\\'s a quest for greatness under the watchful gaze of the moon atop Mount Everest. Will you be the one to guide MiMi to victory and collect the most coins in this daring adventure?\\r\\n\\r\\nAre you ready to take on Mount Everest in the darkest hours of the night? Download MiMi Jump now and prove your mettle in this ultimate test of wit and daring.\\r\\n', '387.00', '../images/icon mimi.jpg', '../images/thumbnail mimi.jpg', '../images/ssx1 mimi.jpg', '../images/ssx2 mim.jpg', '../images/ssx3 momi.jpg', '../images/fp mimi.jpg', 'Y', 0, '0.00', 0, 'Games', 'https://drive.google.com/drive/folders/18U96JDnvRxDiL04zxvDm3khzOLWn9AyE?usp=sharing', '2023-10-10 17:08:22', '2023-10-10 17:46:17'),
(16, 'Piko Run - Bumpy Clam', 'About:\\r\\nGet ready to join PiKo, a courageous young boy, on an exhilarating adventure filled with endless running, heart-pounding action, and thrilling coin-collecting challenges. Piko\\\'s journey will take you through bustling roads, bustling train stations, and treacherous terrain as you race against the odds in this adrenaline-pumping game.\\r\\n\\r\\nGame Description:\\r\\nWelcome to the adrenaline-fueled world of Piko Run - Bumpy Clam! Brace yourself for an epic running experience like no other, where bravery and quick reflexes are your best companions.\\r\\n\\r\\nðŸƒâ€â™‚ï¸ Run for Glory: Take control of PiKo, a fearless young boy with a passion for adventure. Guide him through a series of heart-pounding.\\r\\n\\r\\nðŸ’° Collect Coins: As PiKo sprints through the ever-changing landscapes, seize the opportunity to gather valuable coins scattered along his path. The more you collect, the closer you get to achieving greatness.\\r\\n\\r\\nðŸŒ† Urban Adventures: Navigate bustling city streets and winding alleyways as you guide PiKo on his epic journey. Every turn is a new challenge, every corner is an opportunity to prove your skills.\\r\\n\\r\\nðŸŒ„ Bravery Unleashed: Piko is not just a runner; he\\\'s a symbol of bravery. Face down danger, overcome obstacles, and show the world what courage truly means.\\r\\n\\r\\nðŸŒŸ Stunning Visuals: Immerse yourself in a vibrant world filled with stunning graphics that make every jump, slide, and dash come to life. Piko\\\'s adventures are a visual feast for the senses.\\r\\n\\r\\nðŸ† Compete and Conquer: Challenge your friends and players from around the globe in a race to the top of the leaderboards. Show off your running skills and claim your place among the greatest Piko runners in the world.\\r\\nPiko Run - Bumpy Clam isn\\\'t just a game; it\\\'s a test of courage and agility. Do you have what it takes to lead PiKo through the heart-pounding challenges that await him?\\r\\nJoin PiKo on his epic journey today. Download the game now and prove that you have the mettle to conquer every obstacle, collect every coin, and become the ultimate Piko Run champion!\\r\\n', '438.00', '../images/icon piko.jpg', '../images/Thumbnaill piko.jpg', '../images/ssx1 piko.jpg', '../images/ssx 2 piko.jpg', '../images/sscx 3piuko.jpg', '../images/fp. piko.jpg', 'Y', 0, '0.00', 0, 'Games', 'https://drive.google.com/drive/folders/1V6UOILteriog2ycUriY9CroZcUm_ZxSr?usp=sharing', '2023-10-10 17:11:18', '2023-10-10 17:48:37'),
(17, 'Jack-City', 'About:\\r\\nPrepare to enter a dark and thrilling underworld where power and chaos reign supreme. In Jack-City, you\\\'ll step into the shoes of Jack, a formidable devil and the unrivaled gangster kingpin of a village. With the help of his equally sinister counterpart, Joyes, you\\\'ll engage in a battle for dominance, using your demonic powers to lay claim to the streets.\\r\\n\\r\\nGame Description:\\r\\n\\r\\nWelcome to the realm of Jack-City, a place where the line between good and evil blurs, and the forces of darkness collide in a relentless battle for control. In this electrifying fight game, you become Jack, the Devil, and the undisputed ruler of a village steeped in chaos.\\r\\n\\r\\nðŸ”¥ The Devil\\\'s Playground: Jack-City is a world unlike any other, a village teeming with life and infused with the sinister energy of the underworld. From towering trees to bustling houses, winding roads to mysterious rivers, every element of the environment is at your disposal.\\r\\n\\r\\nðŸ‘¿ Unleash Your Demonic Power: As Jack, you possess unparalleled supernatural abilities that strike fear into the hearts of all who cross your path. Engage in heart-pounding battles with rival gangs, vanquish your foes with the flick of a finger, and watch as the city crumbles beneath your might.\\r\\n\\r\\nðŸ‘¥ Team Up with Joyes: The dark streets of Jack-City are not without competition. Join forces with Joyes, another devil with powers to match your own. Together, you\\\'ll become an unstoppable force, leaving your mark on the city and all who dare to challenge you.\\r\\n\\r\\nðŸŒ† Dominate the Cityscape: Traverse the gritty streets, commandeer boats, and control the rivers as you expand your dominion. Jack-City is yours for the taking, and you\\\'ll stop at nothing to seize control of every corner.\\r\\n\\r\\nðŸ’¥ Epic Battles: Engage in breathtaking battles that will test your strategy, reflexes, and mastery of the dark arts. Crush your rivals, unlock new abilities, and prove your supremacy in relentless combat.\\r\\n\\r\\nðŸŒŸ Immersive World: Jack-City boasts stunning graphics that bring this dark, dystopian world to life. Every shadow, every building, and every adversary is meticulously crafted to immerse you in a world of chaos and power.\\r\\n\\r\\nðŸ† Compete for Supremacy: Challenge players worldwide and climb the ranks of the leaderboards. Prove you\\\'re the ultimate gangster devil and that Jack-City belongs to you.\\r\\n\\r\\nJack-City isn\\\'t just a game; it\\\'s an epic battle for control, a fight for power, and a journey into the heart of darkness. Do you have what it takes to reign supreme in this ruthless underworld?\\r\\n\\r\\nClaim your throne and rule the city with an iron fist. Download Jack-City now and embrace the darkness that lies within!\\r\\n', '278.00', '../images/icon jack.jpg', '../images/Thumbnaill jack.jpg', '../images/ssx1 jack.jpg', '../images/ssx2 jak.jpg', '../images/ssx3 jack.jpg', '../images/fp jack.jpg', 'Y', 0, '0.00', 0, 'Games', 'https://drive.google.com/drive/folders/1nXXGGZsCQJQVc00zsfVgDkZVX4vR-8yJ?usp=sharing', '2023-10-10 17:13:46', '2023-10-10 17:51:02'),
(18, 'Lovely Giraffe', 'About:\\r\\nPrepare to embark on an enchanting adventure with Lovely Giraffe, the whimsical ball game that will captivate your heart and challenge your skills. In this delightful journey, you\\\'ll utilize your trusty ball to navigate through a world of wonder, all while racking up points on your score-board. Get ready for a game that\\\'s as charming as it is addictive.\\r\\n\\r\\nGame Description:\\r\\n\\r\\nStep into the enchanting world of Lovely Giraffe, where the joy of play meets the thrill of competition. If you\\\'re looking for a game that\\\'s easy to pick up and impossible to put down, you\\\'ve found it.\\r\\n\\r\\nðŸ¦’ Meet Your Cute Companion: Enter the world of Lovely Giraffe and be greeted by your adorable companion, a charming giraffe. Together, you\\\'ll navigate a delightful landscape filled with colorful surprises.\\r\\n\\r\\nðŸª€ Play with Precision: The game centers around a simple yet engaging concept: use your trusty ball to navigate the terrain. With precision and finesse, aim, shoot, and guide the ball through a series of captivating challenges.\\r\\n\\r\\nðŸŽ¯ Score and Succeed: Lovely Giraffe rewards not only your skills but also your determination. Each successful play earns you valuable points on your score-board. Challenge yourself to achieve higher scores and set new personal bests.\\r\\n\\r\\nðŸŒˆ A World of Wonder: Immerse yourself in a whimsical world where each level presents a fresh and delightful visual experience. From vibrant meadows to mysterious forests, every backdrop is a testament to the game\\\'s creativity.\\r\\n\\r\\nðŸŒŸ Challenging Puzzles: Lovely Giraffe offers a variety of puzzles and obstacles to keep you engaged. From precision shots to timing-based challenges, you\\\'ll never run out of fun and satisfying ways to play.\\r\\n\\r\\nðŸ† Compete and Climb: Join the global community of Lovely Giraffe players and compete for the top spot on the leaderboards. Prove your skills and showcase your mastery of the game to the world.\\r\\n\\r\\nLovely Giraffe isn\\\'t just a game; it\\\'s a heartwarming journey through a world filled with charm and challenges. Whether you\\\'re looking to relax or aiming to master every level, this game has something for everyone.\\r\\n\\r\\nJoin the adventure today. Download Lovely Giraffe now and immerse yourself in a delightful world of ball-play, fun puzzles, and endless joy. Will you be the one to conquer the leaderboards and become the ultimate Lovely Giraffe champion?\\r\\n\\r\\n', '318.00', '../images/iconlovely.jpg', '../images/Thumbnaill lovely.jpg', '../images/ssx1 lovely.jpg', '../images/ssx2 lovely.jpg', '../images/ssx3 lovely.jpg', '../images/fp lovely.jpg', 'Y', 0, '0.00', 0, 'Games', 'https://drive.google.com/drive/folders/133Krm6HIe2RAE-iTKE8NiXrzuoOYg9Um?usp=sharing', '2023-10-10 17:16:07', '2023-10-10 17:59:14'),
(19, 'Swell Trip', 'About:\\r\\nPrepare for a thrilling and addictive journey into the world of Swell Trip, the ultimate ball-bouncing challenge! In this high-octane game, you\\\'ll wield your trusty ball to obliterate your rivals, accumulate precious points on your score-board, and aim for the coveted achievements. Get ready to unleash a ball-to-ball showdown that\\\'s both exhilarating and strategic.\\r\\n\\r\\nGame Description:\\r\\n\\r\\nWelcome to the electrifying universe of Swell Trip, where balls collide, points soar, and champions are born. If you\\\'re seeking a game that combines precision, strategy, and the sheer joy of competition, your search ends here.\\r\\n\\r\\nðŸ€ Master the Art of Ball-Bouncing: In Swell Trip, you\\\'ll command your ball with finesse and precision. Use it to vanquish your opponents in a mesmerizing showdown of skill and strategy.\\r\\n\\r\\nðŸ’¥ Ball vs. Ball Showdown: The game revolves around a thrilling premise - unleash your ball to destroy your rivals, but be mindful, you only have three chances. Strategize your moves, time your shots, and aim for victory.\\r\\n\\r\\nðŸŽ–ï¸ Achievements Await: Swell Trip rewards excellence and determination. Achieve high scores to unlock coveted achievements, showcasing your prowess to friends and fellow competitors.\\r\\n\\r\\nðŸŒ„ Immersive Environments: Immerse yourself in a variety of captivating landscapes, each with its unique challenges and aesthetics. From lush meadows to electrifying arenas, every level is a new adventure.\\r\\n\\r\\nðŸ§  Strategy and Precision: Swell Trip is not just about power; it\\\'s about strategy and timing. Each level presents a new puzzle to solve and a fresh challenge to conquer.\\r\\n\\r\\nðŸ† Compete for Glory: Join a global community of Swell Trip players and compete for supremacy on the leaderboards. Prove that you have what it takes to be the ultimate Swell Trip champion.\\r\\n\\r\\nSwell Trip isn\\\'t just a game; it\\\'s a test of skill, strategy, and precision. Whether you\\\'re aiming to conquer the leaderboards or unlock every achievement, this game promises endless excitement and challenge.\\r\\n\\r\\nEmbark on your journey today. Download Swell Trip now and experience the heart-pounding thrill of ball-to-ball combat, strategic gameplay, and the quest for ultimate achievement. Will you be the one to rise above the competition and become a Swell Trip legend?\\r\\n', '138.00', '../images/icon swell.jpg', '../images/Thumbnaill swell.jpg', '../images/ssx1 swell.jpg', '../images/ssx2 swell.jpg', '../images/ssx3 swell.jpg', '../images/fp swell.jpg', 'Y', 0, '0.00', 0, 'Games', 'https://drive.google.com/drive/folders/1Qw917xCugoPY2mcCp7OS080TrMP-siXf?usp=sharing', '2023-10-10 17:19:29', '2023-10-10 17:59:53'),
(20, 'Mr. City Builder', 'About:\\r\\nPrepare to unleash your inner architect and embark on an extraordinary journey of creation with Mr. City Builder! In this imaginative game, you step into the shoes of the eponymous Mr. Builder, an ambitious creator who assembles houses, streets, and roads using a vast array of materials like stones, wood, and more. Dive into a world where innovation knows no bounds and your every design whim can come to life. Get ready to build, design, and shape your dream cityscape.\\r\\n\\r\\nGame Description:\\r\\n\\r\\nWelcome to the mesmerizing universe of Mr. City Builder, where your imagination is your most powerful tool, and the possibilities are as vast as your creativity. If you crave a game that combines construction, innovation, and boundless potential, your ultimate destination has arrived.\\r\\n\\r\\nðŸ—ï¸ Master the Art of Creation: In Mr. City Builder, you are the master of your domain. Channel your inner architect as you build houses, streets, roads, and more with an expansive selection of materials at your fingertips.\\r\\n\\r\\nðŸ¡ Craft Your Dream Cityscape: From quaint cottages to sprawling metropolises, the canvas is yours to fill with breathtaking structures. Design your perfect city, piece by piece, and watch it come to life before your eyes.\\r\\n\\r\\nðŸ§± Materials Galore: Your creativity knows no limits with a wide range of building materials at your disposal. Shape your vision using stones, wood, and various other elements to bring your creations to life.\\r\\n\\r\\nðŸŒ† Endless Possibilities: Mr. City Builder is more than just a game; it\\\'s a boundless creative sandbox. Construct intricate road systems, design stunning landscapes, and let your artistic flair shine.\\r\\n\\r\\nðŸŽ¨ Creative Brilliance: Dive into a visually stunning world that inspires your imagination at every turn. Every structure and design element in Mr. City Builder is a testament to the game\\\'s dedication to visual excellence.\\r\\n\\r\\nðŸ† Compete and Showcase: Join a global community of city builders and showcase your masterpieces to the world. Prove that your designs are the most captivating and imaginative.\\r\\n\\r\\nMr. City Builder isn\\\'t just a game; it\\\'s a canvas for your dreams, a playground for your creativity, and a testament to your architectural genius. Whether you\\\'re an aspiring builder or a seasoned architect, this game promises endless inspiration and innovation.\\r\\n\\r\\nBegin your journey today. Download Mr. City Builder now and immerse yourself in a world where you can build, create, and shape your cityscape dreams. Will you be the one to craft the most breathtaking city the world has ever seen?\\r\\n\\r\\n', '388.00', '../images/icon city.jpg', '../images/Thumbnaill city.jpg', '../images/ssx1 city.jpg', '../images/ssx2 city.jpg', '../images/ssx3 city.jpg', '../images/fp cifty.jpg', 'Y', 0, '0.00', 0, 'Games', 'https://drive.google.com/drive/folders/1KLlV0A3UIYt38Yd6j8Y833drAx_SR0ef?usp=sharing', '2023-10-10 17:21:22', '2023-10-10 18:03:09'),
(21, 'Parking Jam', 'About:\\r\\nPrepare to engage your strategic thinking and puzzle-solving skills in the captivating world of Parking Jam! In this brain-teasing game, the challenge is to navigate a bustling maze of roads and parking spaces, maneuvering a fleet of cars into their designated spots. As the ultimate traffic conductor, you\\\'ll need to drag cars to create space and solve increasingly complex puzzles. Get ready to embark on a journey of logic, creativity, and masterful planning.\\r\\n\\r\\nGame Description:\\r\\nWelcome to the mind-bending universe of Parking Jam, where every move counts, and your strategic prowess is put to the test. If you\\\'re seeking a game that blends intellectual challenge with sheer creativity, your quest for the ultimate puzzle experience is over.\\r\\n\\r\\nðŸš— Traffic Maestro: Become the master of vehicular orchestration as you navigate a complex web of roads, parking spaces, and a multitude of cars. Your task: to skillfully maneuver each vehicle into its designated parking spot.\\r\\n\\r\\nðŸ§© Puzzles Galore: Parking Jam offers an array of challenging puzzles that will test your logic and problem-solving abilities. As you progress, the puzzles become increasingly intricate, keeping you engaged and your mind sharp.\\r\\n\\r\\nðŸ…¿ï¸ Perfect Your Parking: With each clever move, you\\\'ll inch closer to parking perfection. Manipulate cars, create pathways, and showcase your parking prowess in increasingly tight spaces.\\r\\n\\r\\nðŸŒ† Urban Challenge: Dive into an urban landscape teeming with bustling streets and parking lots. Each level is a new opportunity to unravel the traffic conundrum before you.\\r\\n\\r\\nðŸ§  Smart and Creative: Parking Jam isn\\\'t just a game; it\\\'s a testament to your intelligence and ingenuity. Craft solutions that are as brilliant as they are creative to conquer every level.\\r\\n\\r\\nðŸ† Compete and Conquer: Join a global community of parking virtuosos and compete on the leaderboards. Show the world that you\\\'re the ultimate Parking Jam champion.\\r\\n\\r\\nParking Jam isn\\\'t just a game; it\\\'s a mental workout, a canvas for your strategic brilliance, and an arena for your creative problem-solving. Whether you\\\'re a puzzle enthusiast or a casual gamer looking for a challenge, this game promises endless fun and mental stimulation.\\r\\n\\r\\nPrepare to take on the challenge. Download Parking Jam now and immerse yourself in a world where every move counts, every puzzle beckons, and every level is a triumph waiting to be achieved. Will you be the one to untangle the traffic snarl and become the Parking Jam legend?\\r\\n', '468.00', '../images/icon parking.jpg', '../images/Thumbnaill parking.jpg', '../images/ssx1 parking.jpg', '../images/ssx2 parking.jpg', '../images/ssx3 parking.jpg', '../images/fp parking.jpg', 'Y', 0, '0.00', 0, 'Games', 'https://drive.google.com/drive/folders/1ZCic-VeXz5LEbeSL7qAz7jYartXh0fnB?usp=sharing', '2023-10-10 17:23:06', '2023-10-10 18:02:19'),
(22, 'Martin F-22 Raptor', 'About:\\r\\nPrepare to take to the skies in a thrilling, endless flying adventure with Martin F-22 Raptor! In this heart-pounding game, you\\\'ll step into the cockpit of a small plane and navigate through a series of challenging areas. Your goal: keep the plane soaring for as long as possible, earning precious points with each moment in the air. It\\\'s a test of your reflexes, precision, and determination as you tap your way to greatness, all while dodging obstacles and avoiding crashes.\\r\\n\\r\\nGame Description:\\r\\n\\r\\nWelcome to the exhilarating world of Martin F-22 Raptor, where the sky is your playground, and the possibilities are limitless. If you\\\'re seeking a game that combines adrenaline-pumping action with endless challenge, your journey to aerial supremacy begins now.\\r\\n\\r\\nðŸ›©ï¸ Take Flight: Strap into the cockpit of your trusty small plane and prepare to soar through a series of mesmerizing areas. The skies are yours to conquer, and the horizon beckons.\\r\\n\\r\\nðŸš€ Endless Adventure: Martin F-22 Raptor is an endless flying game, where the longer you stay aloft, the higher your score soars. Challenge yourself to beat your own records and become the ultimate sky master.\\r\\n\\r\\nðŸŽ¯ Tap to Ascend: Control your plane with precision by tapping on the screen at the perfect moment. Master the art of timing to navigate tight spaces and maneuver through obstacles.\\r\\n\\r\\nðŸ’¥ Obstacles Abound: Navigate treacherous obstacles, daring maneuvers, and unexpected challenges that test your reflexes and keep you on the edge of your seat.\\r\\n\\r\\nðŸ† Achieve Greatness: As you accumulate precious flying time, you\\\'ll rack up points and earn your place among the elite pilots. Prove that you have the skill and determination to climb the leaderboards.\\r\\n\\r\\nðŸŒ… Stunning Aerial Views: Marvel at the breathtaking landscapes as you soar through diverse and visually stunning environments. Each area is a masterpiece, and every flight is a new adventure.\\r\\n\\r\\nMartin F-22 Raptor isn\\\'t just a game; it\\\'s a test of skill, precision, and endurance. Whether you\\\'re a casual gamer looking for a thrilling challenge or a seasoned pilot seeking the ultimate endless flying experience, this game promises endless excitement and action.\\r\\n\\r\\nTake to the skies today. Download Martin F-22 Raptor now and immerse yourself in a world where every tap counts, every flight is an adventure, and every second in the air takes you closer to greatness. Will you be the one to conquer the skies and become the ultimate Martin F-22 Raptor ace?\\r\\n', '411.00', '../images/icon martin.jpg', '../images/Thumbnaill martin .jpg', '../images/ssx1 martin.jpg', '../images/ssx2 martin.jpg', '../images/ssx3 martin.jpg', '../images/fp martin.jpg', 'Y', 0, '0.00', 0, 'Games', 'https://drive.google.com/drive/folders/1nXFFtyfsCsZRl-eQt1LRS0FLLTiYUoIo?usp=sharing', '2023-10-10 17:25:01', '2023-10-10 18:04:42'),
(23, 'Fight Fire', 'About:\\r\\nPrepare to immerse yourself in an explosive world of adrenaline-pumping action with Fight Fire, the ultimate shooting game! In this heart-racing adventure, you\\\'ll be equipped with a powerful shooter and thrown into a vast, dynamic arena. Your mission: unleash your shooting skills and take down a multitude of diverse targets, each with its unique look and challenge. It\\\'s a game that satisfies your thirst for excitement and indulges your creative combat instincts.\\r\\n\\r\\nGame Description:\\r\\n\\r\\nWelcome to the electrifying realm of Fight Fire, where every shot counts, every target is a thrill, and every victory is a testament to your sharpshooting prowess. If you\\\'re seeking a game that combines intense action with endless variety, your journey into the heart of the battle begins here.\\r\\n\\r\\nðŸ”« Armed and Dangerous: Arm yourself with a high-powered shooter and prepare for a relentless shooting experience. In Fight Fire, you are the sharpshooter, and your aim is your greatest weapon.\\r\\n\\r\\nðŸŒ Expansive Arena: Step into a vast and dynamic arena, offering endless possibilities for engagement. The sprawling battleground is your canvas, and the targets are your masterpieces to eliminate.\\r\\n\\r\\nðŸŽ¯ Diverse Targets: Fight Fire presents a myriad of targets, each with its unique appearance and behavior. From fast-moving targets to cunning adversaries, every encounter is a new challenge.\\r\\n\\r\\nðŸ† Points and Progress: Score valuable points with each target you eliminate. As you accumulate points, unlock new levels, weapons, and upgrades to enhance your arsenal and become an unstoppable force.\\r\\n\\r\\nðŸ’£ Explosive Satisfaction: Experience the sheer satisfaction of precision shooting as you unleash fiery explosions, chain reactions, and spectacular takedowns. Every shot is a symphony of destruction.\\r\\n\\r\\nðŸŒŸ Visual Splendor: Fight Fire is a feast for the eyes, with stunning graphics that immerse you in a world of dynamic action and breathtaking detail.\\r\\n\\r\\nðŸ¥‡ Compete and Conquer: Join a global community of sharpshooters and compete for the top spot on the leaderboards. Prove that you have the aim, strategy, and creativity to reign supreme.\\r\\n\\r\\nFight Fire isn\\\'t just a game; it\\\'s an adrenaline-fueled test of precision, reflexes, and creative combat. Whether you\\\'re a shooting enthusiast or a casual gamer seeking action-packed thrills, this game promises endless excitement and dynamic challenges.\\r\\n\\r\\nGet ready to take aim and fire! Download Fight Fire now and immerse yourself in a world where every shot counts, every target is a victory, and every moment in the game is an explosive masterpiece. Will you be the one to conquer the battlefield and become the ultimate sharpshooter in Fight Fire?\\r\\n', '125.00', '../images/icon fight.jpg', '../images/Thumbnaill fight.jpg', '../images/ssx1 fight.jpg', '../images/ssx2 fight.jpg', '../images/ssx3 fight.jpg', '../images/fp fight.jpg', 'Y', 0, '0.00', 0, 'Games', 'https://drive.google.com/drive/folders/16TQ0YWMSrGuXcsSrp2Q-7FSDIP2-4fAY?usp=sharing', '2023-10-10 17:27:10', '2023-10-10 18:05:11'),
(24, 'Gutsy Recess', 'About:\\r\\nPrepare to embark on a high-octane journey into the fearless world of Gutsy Recess! In this adrenaline-pumping game, you\\\'ll take on the role of the indomitable Mr. Gut, a relentless fighter armed with a powerful gun. As you navigate treacherous terrain, your mission is clear: confront every enemy in your path and engage in heart-pounding, heroic shootouts. Get ready for a game that redefines bravery and tests your mettle in the most thrilling way possible.\\r\\n\\r\\nGame Description:\\r\\n\\r\\nWelcome to the heart-pounding universe of Gutsy Recess, where courage meets firepower, and every bullet is a testament to your unyielding determination. If you\\\'re in search of a game that blends intense action with unwavering bravery, your quest for the ultimate battlefield adventure begins now.\\r\\n\\r\\nðŸ”« Meet Mr. Gut: Step into the boots of the fearless Mr. Gut, a relentless fighter with nerves of steel and a powerful gun at his side. He\\\'s not just a character; he\\\'s a symbol of courage in the face of adversity.\\r\\n\\r\\nðŸŽ¯ Relentless Shootouts: In Gutsy Recess, every corner, every obstacle, and every moment is a chance to prove your mettle. When enemies emerge, you don\\\'t back downâ€”you draw your weapon and engage in epic shootouts.\\r\\n\\r\\nðŸ’¥ The Bravery Test: This game isn\\\'t just about firepower; it\\\'s about bravery. With unwavering determination, confront your adversaries, engage in daring firefights, and showcase your fearlessness.\\r\\n\\r\\nðŸŒ„ Treacherous Terrain: Navigate through a diverse and perilous landscape, filled with challenges that test your tactical skills and strategic thinking. Every level is a new adventure in the relentless pursuit of justice.\\r\\n\\r\\nðŸŒŸ Visual Excellence: Gutsy Recess boasts stunning graphics that immerse you in a world of dynamic action and breathtaking detail. Every bullet, every explosion, and every victory is a visual masterpiece.\\r\\n\\r\\nðŸ† Compete and Conquer: Join a global community of fearless fighters and compete for supremacy on the leaderboards. Prove that you have the guts and the grit to rise to the top.\\r\\n\\r\\nGutsy Recess isn\\\'t just a game; it\\\'s an adrenaline-charged test of bravery, reflexes, and tactical acumen. Whether you\\\'re a battle-hardened gamer or a casual player seeking heart-pounding thrills, this game promises endless excitement and heroic challenges.\\r\\n\\r\\nPrepare to stand tall and fight for justice! Download Gutsy Recess now and immerse yourself in a world where courage is your greatest weapon, every enemy is a chance to prove your mettle, and victory is your ultimate reward. Will you be the one to rise as the fearless champion of Gutsy Recess?\\r\\n', '264.00', '../images/icon gutsy.jpg', '../images/Thumbnail gutsy.jpg', '../images/ssx1 gutsy.jpg', '../images/ssx2 gutsy.jpg', '../images/ssx3 gutsy.jpg', '../images/fp gutsy.jpg', 'Y', 0, '0.00', 0, 'Games', 'https://drive.google.com/drive/folders/1biedRuuPpaeiTGSLaOKLqFTlyIjx6Vz0?usp=sharing', '2023-10-10 17:28:44', '2023-10-10 18:05:51'),
(25, 'MilkyBall', 'About:\\r\\nPrepare to challenge your intellect and boost your brainpower with MilkyBall, the ultimate IQ game! In this brain-teasing adventure, you\\\'ll encounter a captivating puzzle where containers and colorful balls take center stage. Your mission is clear: match the same-colored balls to the corresponding containers. MilkyBall is a test of your IQ, a playground for the sharp-minded, and a journey that strengthens your cognitive prowess.\\r\\n\\r\\nGame Description:\\r\\n\\r\\nWelcome to the stimulating universe of MilkyBall, where intelligence reigns supreme, and every move is a test of your mental acumen. If you\\\'re seeking a game that combines intricate puzzles with a relentless quest for brilliance, your voyage into the world of IQ challenges begins now.\\r\\n\\r\\nðŸ§  Elevate Your IQ: MilkyBall is more than just a game; it\\\'s a mental workout designed to elevate your IQ. The puzzles within are carefully crafted to engage your mind and ignite your problem-solving skills.\\r\\n\\r\\nðŸŒˆ Colorful Conundrums: Dive into a world of color and challenge as you match the same-colored balls with their corresponding containers. With every move, you inch closer to the ultimate solution.\\r\\n\\r\\nðŸ¤“ IQ Showdown: MilkyBall is an IQ showdown where intelligence and strategy triumph over haste and guesswork. Test your cognitive prowess and prove that you have what it takes to conquer these intricate puzzles.\\r\\n\\r\\nðŸ” Logic and Precision: Every level presents a new puzzle, each more intricate than the last. Logic and precision are your allies in this quest for brilliance, as you strive to complete each challenge in the fewest possible moves.\\r\\n\\r\\nðŸ’ª Strengthen Your Mind: MilkyBall isn\\\'t just a game; it\\\'s a brain-training regimen that strengthens your mental faculties. With each puzzle you solve, your brain becomes sharper, more focused, and ready for new challenges.\\r\\n\\r\\nðŸŒŸ Visual Delight: MilkyBall offers stunning visuals that captivate your senses and immerse you in a world of color and complexity. Every container, every ball, and every successful match is a visual triumph.\\r\\n\\r\\nðŸ† Compete and Excel: Join a global community of brilliant minds and compete on the leaderboards. Prove that your IQ is second to none and that you\\\'re the master of MilkyBall.\\r\\n\\r\\nMilkyBall isn\\\'t just a game; it\\\'s an intellectual adventure, a playground for the sharp-minded, and a challenge for those who seek to elevate their IQ. Whether you\\\'re a puzzle enthusiast or a cerebral explorer, this game promises endless intrigue and cognitive stimulation.\\r\\n\\r\\nElevate your IQ today. Download MilkyBall now and immerse yourself in a world where every move is a test of brilliance, every puzzle is an opportunity to shine, and every victory strengthens your mind. Will you be the one to emerge as the ultimate MilkyBall genius?\\r\\n\\r\\n\\r\\n', '489.00', '../images/icon milky.jpg', '../images/Thumbnail milky.jpg', '../images/ssx1 milky.jpg', '../images/ssx2 milky.jpg', '../images/ssx3 milky.jpg', '../images/FP milky.jpg', 'Y', 0, '0.00', 0, 'Games', 'https://drive.google.com/drive/folders/1_dlCwGoVRnDGlnlkJgtDV8KQtM7o1Wna?usp=sharing', '2023-10-10 17:30:14', '2023-10-10 17:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review_text` text DEFAULT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'xadmin', 'dazzleusa.official@gmail.com', '$2y$10$N5ZuU96xmCjyXEw5Yyy/geZ2eeAKaiHaG6G3I3iCf87Cs4nCr6Q6e', '2023-10-09 16:08:46', '2023-10-09 16:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_products`
--

CREATE TABLE `user_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_user_relationship`
--
ALTER TABLE `admin_user_relationship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_products`
--
ALTER TABLE `user_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_user_relationship`
--
ALTER TABLE `admin_user_relationship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_products`
--
ALTER TABLE `user_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_user_relationship`
--
ALTER TABLE `admin_user_relationship`
  ADD CONSTRAINT `admin_user_relationship_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `admin_user_relationship_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  ADD CONSTRAINT `payment_transactions_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `product_reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `user_products`
--
ALTER TABLE `user_products`
  ADD CONSTRAINT `user_products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
