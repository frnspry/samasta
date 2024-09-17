-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 03:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gazebo_seal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `job` enum('owner','employee') DEFAULT 'employee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `job`) VALUES
(1, 'owner', '0wn3rg4z3bo010403', 'owner'),
(2, 'admin', '4dm1ng4z3bo010403', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `no_rekening` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `email`, `phone`, `no_rekening`, `created_at`) VALUES
(1, 'Fransiscus Dharma Hadi Prayoga', 'frans@gmail.com', '086754321456', 3201345236, '2024-07-21 08:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(15,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `name`, `description`, `price`, `created_at`) VALUES
(1, 'Nasi Ayam Goreng Rempah', 'Nasi putih dengan ayam goreng rempah yang enak dan renyah. Disajikan dengan sambal matah dan lalapan segar.', '28000.00', '2024-06-05 01:42:39'),
(2, 'Nasi Bebek Palekko', 'Nasi putih dengan bebek palekko yang lezat. Dilengkapi dengan sambal serai dan lalapan segar.', '35000.00', '2024-06-05 01:42:39'),
(3, 'Nasi Bebek Sinjay Madura', 'Nasi putih dengan bebek goreng khas Madura yang gurih dan renyah. Disajikan dengan sambal pencit dan lalapan segar.', '38000.00', '2024-06-05 01:42:39'),
(4, 'Nasi Putih', 'Nasi putih yang dimasak dengan sempurna, menghasilkan tekstur pulen dan harum. Cocok sebagai pendamping berbagai hidangan utama.', '8000.00', '2024-06-05 01:42:39'),
(5, 'Nasi Putih Satu Bakul', 'Satu bakul nasi putih yang pulen, mencukupi untuk dinikmati bersama hidangan utama dengan keluarga atau teman-teman.', '25000.00', '2024-06-05 01:42:39'),
(6, 'Nasi Goreng Kampung', 'Hidangan klasik yang memikat dengan cita rasa yang autentik dan disajikan dengan hidangan pelengkap lainnya.', '35000.00', '2024-06-05 01:42:39'),
(7, 'Pasta Carbonara', 'Hidangan Italia klasik yang creamy, pasta dilumuri dengan saus carbonara dan taburan lada hitam.', '38000.00', '2024-06-05 01:42:39'),
(8, 'Pasta Aglio e Olio', 'Hidangan pasta italia yang dilumuri dengan saus otentik dan ditaburi dengan peterseli segar.', '38000.00', '2024-06-05 01:42:39'),
(9, 'Pasta Mushroom Aglio e Olio', 'Pasta italia yang dilumuri dengan saus otentik dan dicampur dengan jamur tumis yang gurih.', '38000.00', '2024-06-05 01:42:39'),
(10, 'Grilled Chicken Skewer', 'Sate ayam yang dipanggang sempurna dengan cita rasa yang lezat. Potongan daging ayam yang juicy dan beraroma.', '30000.00', '2024-06-05 01:42:39'),
(11, 'Wagyu Saikoro Skewer', 'Sate daging wagyu yang berkualitas. Daging yang juicy dan empuk disajikan dengan saus istimewa dan sayuran segar.', '44000.00', '2024-06-05 01:42:39'),
(12, 'Pisang Goreng Keju', 'Gorengan pisang yang manis dan renyah disajikan dengan sentuhan keju yang gurih.', '22000.00', '2024-06-05 01:42:39'),
(13, 'French Fries', 'Kentang yang dipotong memanjang dan digoreng hingga keemasan, menciptakan kerenyahan di luar dan lembut di dalam.', '30000.00', '2024-06-05 01:42:39'),
(14, 'Beef Burger', 'Hidangan klasik daging sapi panggang diatas roti burger yang empuk, dilengkapi dengan sayuran dan keju yang creamy.', '33000.00', '2024-06-05 01:42:39'),
(15, 'Chicken Burger', 'Alternatif yang lezat daging dada ayam yang juicy diatas roti burger yang empuk, dilengkapi dengan sayuran dan keju yang creamy.', '33000.00', '2024-06-05 01:42:39'),
(16, 'Special Lychee', 'Minuman segar yang memanjakan dengan rasa manis khas leci. Disajikan dingin dengan potongan buah leci segar asli.', '40000.00', '2024-06-05 01:42:39'),
(17, 'Fantastic Mango', 'Minuman segar yang memikat dengan rasa manis mangga. Disajikan dingin dengan potongan buah mangga segar.', '40000.00', '2024-06-05 01:42:39'),
(18, 'Cappuccino Ice', 'Minuman kopi yang menyegarkan. Disajikan dingin dengan taburan bubuk cokelat diatasnya.', '20000.00', '2024-06-05 01:42:39'),
(19, 'Thai Tea Ice', 'Minuman khas Thailand yang menyegarkan dengan rasa teh yang creamy dan disajikan dingin agar kesegarannya terasa.', '20000.00', '2024-06-05 01:42:39'),
(20, 'Chocolate Ice', 'Minuman cokelat manis yang menyegarkan. Cokelat yang dicampur dengan susu dan disajikan dingin dengan topping whipped cream serta taburan cokelat diatasnya.', '20000.00', '2024-06-05 01:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `reservation_id`, `menu_id`, `quantity`) VALUES
(1, 1, 2, 1),
(2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` time NOT NULL,
  `peoples` enum('1-4 Orang','5-8 Orang','8+ Orang') DEFAULT '1-4 Orang',
  `table_type` enum('A','B','C','Gazebo') DEFAULT 'A',
  `prices` decimal(30,2) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `status` enum('pending','confirmed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `customer_id`, `reservation_date`, `reservation_time`, `peoples`, `table_type`, `prices`, `invoice`, `status`, `created_at`) VALUES
(1, 1, '2024-07-23', '18:00:00', '1-4 Orang', 'A', '63000.00', 'INV-278224010030', 'pending', '2024-07-21 08:20:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`reservation_id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
