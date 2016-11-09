-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2016 at 03:13 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gift`
--

-- --------------------------------------------------------

--
-- Table structure for table `gift_detail`
--

CREATE TABLE `gift_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `price` float NOT NULL,
  `boy` tinyint(1) NOT NULL,
  `girl` tinyint(1) NOT NULL,
  `age_low` int(11) NOT NULL,
  `age_high` int(11) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gift_detail`
--

INSERT INTO `gift_detail` (`id`, `name`, `price`, `boy`, `girl`, `age_low`, `age_high`, `description`, `img`) VALUES
(1, 'Mini Flyer', 17.99, 1, 1, 8, 12, 'Mini Flyer - The World! Watch it hover, float and fly like magic. Have the whole world in your hands! BRAND NEW STYLE 2016 (Newest version featuring USB charging!)', 'https://s18.postimg.org/ncigwa3ed/614_ITg4_BVf_L_SL1467.jpg'),
(3, 'Harvester Truck Toys', 29.94, 1, 0, 4, 8, 'WolVol Push and Go Friction, Street Sweeper , Cement Mixer , Harvester Truck Toys (Set of 3)', 'https://s18.postimg.org/xsykym2et/71y_Lig_GFyt_L_SL1500.jpg'),
(4, 'Board Block', 14.99, 1, 1, 3, 6, 'Rolimate Wooden Educational Preschool Shape Color Recognition Geometric Board Block Stack Sort Chunky Puzzle Toys, Birthday gifts toy for age 3 4 5 Years Old and Up Kid Children Baby Toddler Boy Girl', 'https://s18.postimg.org/qn6tw5tbp/61u_W7_IS4z_SL_SL1000.jpg'),
(5, '5-Note Xylophone', 2.98, 1, 1, 0, 5, 'Lisingtool Toys,Baby Kid 5-Note Xylophone Musical Toys Wisdom Development Penguin,Black', 'https://s18.postimg.org/n2aycxos5/51j_IE0_y_Ob_L_SL1000.jpg'),
(6, 'Magic Cubes', 7.99, 1, 1, 1, 99, 'Cube Teaser Turns Quicker and More Precisely Than Original. Super-durable With Vivid Colors; Ultimate Gift For All Ages.', 'https://s18.postimg.org/mj5v3nxdh/81_VQMQYzm5_L_SL1500.jpg'),
(7, 'Barbie', 49.95, 0, 1, 3, 12, 'Barbie Birthday Princess Doll Gift Set\r\n\r\nDiscover Barbie Fairytale Magic with Barbie Birthday Princess\r\n\r\nHelp girls celebrate their birthdays in real princess-style\r\n\r\nDressed in a special birthday-themed gown\r\nComes with both tiara and necklace for Barbie and tiara accessory gift for girls\r\n\r\nThis perennial Barbie favorite makes the perfect birthday gift', 'https://s18.postimg.org/6welqajlh/81k57hr_U_t_L_SL1500.jpg'),
(8, 'Mario Stuffed Toy', 403.1, 1, 1, 5, 99, 'San-ei Mario Plush Series Stuffed Toy - 32" Giant Mario (Japanese Import)', 'https://s18.postimg.org/72npfn3cl/41_Omzg_J5_Gv_L.jpg'),
(9, 'Racer - Pink', 357.79, 0, 1, 3, 6, 'Power Wheels Dune Racer - Pink. Monster Traction system drives on hard surfaces, wet grass, and rough terrain', 'https://s18.postimg.org/fh7xhgtrp/91_H7i_NBARNL_SL1500.jpg'),
(10, 'Tools for Sand Boxes', 12.99, 1, 1, 3, 6, 'Sand Bucket 12-Pieces Molds & Tools for Sand Boxes, Water Tables, Beach, Bath Tub, Pool or Kinetic Sand Toys For Baby, Kids and Toddler', 'https://s18.postimg.org/ms3ftla5x/61_Zf_X6_Ty_C9_L_SL1078.jpg'),
(11, 'Harry Potter Deluxe Costume', 26.93, 1, 0, 3, 20, 'Child Harry Potter Deluxe Costume. Officially licensed, deluxe ankle-length Harry Potter hooded robe and clasp', 'https://s18.postimg.org/ur7sonpa1/311r_LGeysc_L.jpg'),
(14, 'Disney Princess Gift Basket', 58.99, 1, 1, 3, 8, 'A beautiful Birthday gift basket or Get well basket for girls&#13;&#10;Original and Licensed Disney Princess novelties for girls, ages 3-8&#13;&#10;No candy; perfect gift for girls with food allergies or sensitivities&#13;&#10;Same day shipping on orders placed before 2:00PM PST/PDT. Free personalized note available upon request at checkout&#13;&#10;Gift Basket includes a 10% Discount for future purchase on Entire collection of Gift Basket 4 Kids and SKash26ani Brands&#9;&#9;', 'https://images-na.ssl-images-amazon.com/images/I/61ZmTb40daL._SX425_.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gift_detail`
--
ALTER TABLE `gift_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gift_detail`
--
ALTER TABLE `gift_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
