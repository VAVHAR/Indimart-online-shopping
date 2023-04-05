-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 01, 2023 at 02:31 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20517519_indimart`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` varchar(15) NOT NULL,
  `pname` varchar(150) NOT NULL,
  `pprice` varchar(10) NOT NULL,
  `pdes` varchar(1000) NOT NULL,
  `pcate` varchar(100) NOT NULL,
  `pstatus` varchar(50) NOT NULL,
  `pimage` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `pprice`, `pdes`, `pcate`, `pstatus`, `pimage`) VALUES
('1', 'Fortune Chakki Fresh Atta | 5kg Pack', '19.99', 'Fortune Atta is made from the choicest grains - heavy on the palm, golden amber in colour and hard in bite.', 'Grocery', 'Out Of Stock', 'fortune_atta.jpg'),
('10', 'Amul Butter Pasteurised, 500 g', '8.97', 'Unsalted Butter is made from fresh cream and nothing else. It is Amul Butter in its purest form, 100% Natural !', 'Dairy', 'In Stock', 'Amul_butter.webp'),
('11', 'Mother Dairy Tadka Chach, 300 ml', '3.97', 'Tadka Chach is a refreshing health drink made from fresh quality curd. It is blended with natural seasoning and condiments', 'Dairy', 'In Stock', 'MotherDairy_Chaas.jpg'),
('12', 'Amul Fresh Paneer Block Pouch, 200 g', '4.97', 'Amul fresh paneer is a rich source of Protein. Milk Solids, Citric Acid. Allergen Information: Contains Milk.', 'Dairy', 'In Stock', 'Amul_Panner.jpg'),
('13', 'Amul Masti Spiced Butter Milk Tetra Pack 1L', '4.97', 'Buttermilk is a tangy and spicy drink, preferred by both elders and children alike, especially during the scorching summer days.', 'Dairy', 'In Stock', 'Amul_chaas.jpg'),
('14', 'Tata Salt | Evaporated Iodised Salt | 1 kg', '4.97', 'Tata Salt is iodized vacuum evaporated salt that was untouched by hand. ', 'Grocery', 'In Stock', 'tata_salt.jpg'),
('15', 'Fortune Chana Besan, 1kg', '5.99', 'Fortune Besan is prepared from pure chana dal. It is pale yellow in colour and fine in texture.', 'Grocery', 'In Stock', 'besan.jpg'),
('16', 'Tata Sampann Chilli Powder 100g', '3.49', 'The Indian spice cabinet is incomplete without a jar of red chilli powder in it. Made from the choicest chillies.', 'Grocery', 'In Stock', 'chilli_powder.jpg'),
('17', 'Britannia Fruit Cake Gobbles', '2.49', 'Moist Traditional Fruit Cake. Soft and delicious cake slices with milk, fruit and made with wheat flour, sugar, and whole milk powder.', 'Grocery', 'In Stock', 'britania_fruitcake.jpg'),
('18', '24 Mantra Organic Fenugreek Seeds', '3.47', '24 Mantra Organic Fenugreek seeds organic or methi seeds is unadulterated and has a strong spicy flavor typical for Fenugreek!', 'Grocery', 'In Stock', 'fenugreek_seeds.jpg'),
('19', 'Tata Sampann Kasuri Methi 25g', '1.97', 'Kasuri Methi (Dried Fenugreek Leaf) is a popular Indian condiment and herb. It gives your dishes a piquant taste.', 'Grocery', 'In Stock', 'kasuri_methi.jpg'),
('2', 'Maggi 2-Minute Instant Noodles', '0.97', 'Bringing you classic Indian noodles, Maggi® 2 Minute Masala Noodles are simply delicious, quick noodles.', 'Grocery', 'In Stock', 'Maggi.jpg'),
('20', 'Organic Tattva Peanuts 500g', '4.47', 'Organic Tattva Groundnuts has constituted an important part of Indian cuisine. You can roast them and consume it as a snack. ', 'Grocery', 'In Stock', 'peanuts.jpg'),
('21', 'Tata Tea Premium Chai 1.5kg', '14.99', 'The Tata Premium Tea Pouch is made using a delightful blend of taste and aroma that almost all the tea lovers across India can enjoy.', 'Grocery', 'In Stock', 'tata_tea.jpg'),
('22', 'Mother Dairy Mango Lassi, 200 ml', '3.99', 'Lassi is a soothing cold drink for hot summer days or to make brighter up any meal.', 'Dairy', 'In Stock', 'MotherDairy_Lassi.jpg'),
('23', 'Kwality Walls Desi Kulfi Cup Ice Cream, 100 ml', '4.99', 'Kulfi is popular Indian ice cream. It is made with milk, sugar, nuts & cardamoms.It is made by evaporating milk.', 'Dairy', 'In Stock', 'kulfi.jpg'),
('24', 'Britannia Cheese Slices, 400 g| Pale White', '6.99', 'Made with the goodness of cow milk, Britannia Cheese Slices are delicious, creamy slices of cheese ', 'Dairy', 'In Stock', 'Britania_cheese.webp'),
('3', 'Amul Cheese Easy Open Chiplet, 200 g', '13.99', 'Amul cheese is a hard, canned cheese that tastes like cheddar with a plot twist.', 'Dairy', 'In Stock', 'Amul_cheese.webp'),
('4', 'Daawat, Premium Basmati Rice 5 kg', '13.99', 'This unique grain is known for its tantalizing flavour, magical aroma and delicate fluffy texture! The perfect rice for biryanis.', 'Grocery', 'In Stock', 'Dawaat_rice.jpg'),
('5', 'Tata Sampann Garam Masala with Natural Oils, 100g', '2.27', 'A select blend of 13 spices go into this grand old universal taste enhancer.', 'Grocery', 'In Stock', 'tata_masala.jpg'),
('6', 'Surya Soan Papdi, 1kg', '3.97', 'Soan Papdi, is a crisp, flaky and melt-in-your-mouth confection that sends your taste buds into a blissful journey with each bite.', 'Grocery', 'In Stock', 'Soan_papdi.jpg'),
('7', 'Britannia Toastea Premium Rusk, 454g', '4.97', 'Crispy and crunchy toasts made from the choicest of ingredients. Baked to perfection and enriched with elaichi.', 'Grocery', 'In Stock', 'Parel_Rusk.jpg'),
('8', 'Wagh Bakri Premium Leaf Tea Pack, 1kg', '12.97', 'South Asian style blend strong black tea Wagh Bakri Tea. Boil for 3-5 minutes in hot water and add milk or lemon and sugar to taste.', 'Grocery', 'In Stock', 'wagh_bakri.jpg'),
('9', 'Amul Masti Dahi Cup, 400 g', '4.97', 'Thick dahi, made with full fat milk. This is pure and thick dahi, made with standardised milk with no added water.', 'Dairy', 'In Stock', 'Amul_dahi.jpg'),
('p64229c522fba4', 'Maaza Mango Drink 1.2 L', '3.39', 'Made from real mango pulp of hand-picked real Alphonso mangoes', 'Grocery', 'In Stock', 'mazza.jpg'),
('p6423b192b692b', 'Parle Agro Chocolate Milkshake, 80 ml ', '2.99', 'Smooth satisfies your craving for a quick energy-boosting sweet fix that is absolutely divine.', 'Dairy', 'In Stock', 'parle_choco_milk.jpg'),
('p6423b35537387', 'Vadilal Badam Pista Kesar Shrikhand 500 g', '11.99', 'Vadilal Badam Pista Kesar Shrikhand offer an unmatchable taste. With the nutty badam pista and fragrant and flavourful saffron', 'Dairy', 'In Stock', 'vadilal-srikhand.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `uid` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `uemail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`uid`, `fname`, `lname`, `uemail`, `password`) VALUES
('u641dccea2755a', 'Deepali', 'Patel', 'deepali@gmail.com', 'ae85f0e11b2184b35d43cd4e57fb0e56'),
('u641dcdd8a133c', 'HARDIK', 'VAVIYA', 'Admin@Indimart.ca', 'be333ef323a1beaa045f07536e909846'),
('u6422745363895', 'Hardik', 'Vaviya', 'Vaviya.365@gmail.com', 'be333ef323a1beaa045f07536e909846'),
('u6425fba85a1af', 'Deepali', 'Patel', 'dp@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
