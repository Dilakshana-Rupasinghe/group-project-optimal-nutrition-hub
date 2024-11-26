-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 01:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `optimal_nutrition_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `cancellation`
--

CREATE TABLE `cancellation` (
  `cancel_id` int(11) NOT NULL,
  `cancel_date` datetime DEFAULT NULL,
  `cancel_reason` text DEFAULT NULL,
  `fk_order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_item_qty` int(11) DEFAULT NULL,
  `fk_item_id` int(11) DEFAULT NULL,
  `fk_cust_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_item_qty`, `fk_item_id`, `fk_cust_id`) VALUES
(3505, 1, 2506, 3002),
(3506, 2, 2501, 3002),
(3507, 1, 2507, 3002),
(3508, 1, 2505, 3002);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(2000, 'PRE WORKOUT'),
(2001, 'PROTEIN'),
(2002, 'MASS GAINERS'),
(2003, 'FAT BURNERS'),
(2004, 'CREATINE');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_fname` varchar(50) DEFAULT NULL,
  `cust_lname` varchar(50) DEFAULT NULL,
  `cust_username` varchar(50) DEFAULT NULL,
  `cust_pwd` varchar(50) DEFAULT NULL,
  `cust_email` varchar(100) DEFAULT NULL,
  `cust_is_active` tinyint(1) DEFAULT 1,
  `cust_phone` varchar(15) DEFAULT NULL,
  `cust_add_line1` varchar(255) DEFAULT NULL,
  `cust_add_line2` varchar(255) DEFAULT NULL,
  `cust_add_line3` varchar(255) DEFAULT NULL,
  `cust_add_line4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_fname`, `cust_lname`, `cust_username`, `cust_pwd`, `cust_email`, `cust_is_active`, `cust_phone`, `cust_add_line1`, `cust_add_line2`, `cust_add_line3`, `cust_add_line4`) VALUES
(3001, 'Dilakshna', 'Malindu', 'dila', 'dila123', 'dilakshna@gmail.com', 0, '071-2574852', 'No 12', 'Galpatha', '', 'Kalutara'),
(3002, 'Amesh', 'Silva', 'amesh', 'amesh123', 'amesh@gmail.com', 1, '076-7554812', 'No 45', 'Batagoda', 'Balapitiya', 'Galle'),
(3003, 'Nuwan', 'Kumara', 'nuwan', 'nuwan123', 'nuwan@gmail.com', 1, '071-2585258', 'No 54', 'Rilaulla', 'Kapuwaththa', 'Gampaha');

-- --------------------------------------------------------

--
-- Table structure for table `customer_notification`
--

CREATE TABLE `customer_notification` (
  `cust_notifi_id` int(11) NOT NULL,
  `cust_notifi_is_read` tinyint(1) DEFAULT 0,
  `fk_notifi_id` int(11) DEFAULT NULL,
  `fk_cust_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliver_area`
--

CREATE TABLE `deliver_area` (
  `deliver_area_id` int(11) NOT NULL,
  `deliver_area_name` varchar(50) DEFAULT NULL,
  `fk_staff_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_date` datetime DEFAULT NULL,
  `feedback_msg` text DEFAULT NULL,
  `feedback_status` varchar(20) DEFAULT NULL,
  `fk_staff_id` int(11) DEFAULT NULL,
  `fk_item_id` int(11) DEFAULT NULL,
  `fk_cust_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiry_id` int(11) NOT NULL,
  `inquiry_date` datetime DEFAULT NULL,
  `inquiry_msg` text DEFAULT NULL,
  `inquiry_reply` text DEFAULT NULL,
  `inquiry_reply_date` datetime DEFAULT NULL,
  `fk_staff_id` int(11) DEFAULT NULL,
  `fk_cust_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `item_image1` varchar(255) DEFAULT NULL,
  `item_image2` varchar(255) DEFAULT NULL,
  `item_brand` varchar(50) DEFAULT NULL,
  `item_description` text DEFAULT NULL,
  `item_sell_price` decimal(10,2) DEFAULT NULL,
  `item_cost_price` decimal(10,2) DEFAULT NULL,
  `item_stock_qty` int(11) DEFAULT NULL,
  `item_discount` decimal(5,2) DEFAULT NULL,
  `item_date_added` datetime DEFAULT NULL,
  `fk_category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_image1`, `item_image2`, `item_brand`, `item_description`, `item_sell_price`, `item_cost_price`, `item_stock_qty`, `item_discount`, `item_date_added`, `fk_category_id`) VALUES
(2501, 'API CREATINE 300G', 'API-Creatine-300g.jpg', 'Nutrex-Creatine-Drive-300g-Facts.jpg', 'API', 'API’s CREATINE MONOHYDRATE is pure, uncut Creatine Monohydrate. With no added fillers, flow agents or sugars – this is the real deal. All Creatine may look the same, but buyer beware. The selection and handling of raw materials along with production conditions determine the quality of Creatine Monohydrate. Our single source of Creatine is tested for purity and stability so you get the same, consistent product each and every time.', 6500.00, 6250.00, 8, 10.02, '2023-12-28 13:36:07', 2004),
(2502, 'OPTIMUM NUTRITION MICRONIZED CREATINE POWDER 300G', 'Optimum-Creatine-300g.jpg', 'ON-Creatine-300g.jpg', 'OPTIMUM NUTRITION', '99.9% Pure Unflavored Creatine with No Fillers or Additives to Support Strength and Power. Creatine for Building Muscle. Creapure Creatine Monohydrate. 5 Grams of Creatine Monohydrate per Rounded Teaspoon Serving. 99.9% Pure Creatine Monohydrat. Zero Added Sugar. Zero Calories. Ideal Usage Ocasions. Stacked Into Post-Workout Shake. Mixed Into a Flavored Beverage.', 12000.00, 11500.00, 0, 20.00, '2023-12-28 13:48:12', 2004),
(2503, 'HYDROXYCUT HARDCORE® ELITE 100 CAPSULES', 'Muscletech-Hydroxycut-Elite-100-Caps.jpg', 'Muscletech-Hydroxycut-Elite-100-Caps-NEW.jpg', 'MUSCLETECH', 'Hydroxycut Hardcore® Elite provides a thermogenic and energy experience with unrivaled intensity. Fuel the most intense workouts and tackle your jam-packed days with a scientifically researched dose of caffeine anhydrous that boosts energy and mental focus. Combined with other potent ingredients, the formula delivers a one-of-a-kind sensory experience.', 7500.00, 7300.00, 0, 0.00, '2023-12-28 14:10:09', 2003),
(2504, 'LIPO-6 BLACK ULTRA INTENSE 60 CAPSULES', 'Lipo-6-Ultra-intense-60-Caps.jpg', 'Lipo-6-Black-Intense-facts.jpg', 'Nutrex research', 'LIPO-6 BLACK INTENSE is a red hot thermogenic fat burner, that packs an extra energy kick, which will knock your socks off. If you’re after a fat burner that helps ramp up your metabolism, makes you sweat and gives you a serious kick-in the butt jolt of energy, you need to try LIPO-6 BLACK INTENSE. LIPO-6 BLACK INTENSE is not for the faint-hearted and it’s definitely not a beginner’s choice. It’s for those, who have tried them all, and are stuck.', 8300.00, 8000.00, 0, 0.00, '2023-12-28 14:15:15', 2003),
(2505, 'USN ANABOLIC MASS CHOCOLATE 6 LBS', 'USN-Anabolic-Mass-6-lbs.jpg', 'USN-Anabolic-Mass-6-lbs-Facts.jpg', 'USN', 'Enhanced with a scientifically validated musclebuilding compound (creatine) to help build more muscle\r\nsize and strength, and help accelerate muscle recovery. PACKED WITH HIGH-QUANTITY, PREMIUM QUALITY CALORIES. Power-packed with over 1,280 calories, including 55 grams of high-quality protein, 252 grams of energy-providing carbs, BCAAs, glutamine, essential minerals, and more, in every serving.', 13500.00, 13200.00, 4, 0.00, '2023-12-28 14:23:23', 2002),
(2506, 'MASS INFUSION 12 LBS', 'Nutrex-Mass-Infusion-12-lbs-1.jpg', 'Nutrex-Mass-Infusion-12-lbs.jpg', 'Nutrex research', 'MASS INFUSION is an advanced weight gain formula supplying your body with 50 grams of high-quality protein per serving, over 1120 calories, along with 200 grams of carbohydrates. Its nutrient dense formula is ideal for those athletes that are seeking to gain weight fast and become bigger and stronger. MASS INFUSION is packed with three different proteins.', 22500.00, 22300.00, 9, 0.00, '2023-12-28 14:25:51', 2002),
(2507, 'THE SHADOW! PRE-WORKOUT 30 SERVINGS', 'JNX-The-Shadow-30-Serv.jpg', 'JNX-The-Shadow-30-Serv-1.jpg', 'THE SHADOW', 'The Shadow! is a full powered pre-workout for hardcore users only…those of us who were born to disrupt the status quo, who hit their PB and then go at it again, who live a life of no excuses. Whatever your goals, The Shadow! is going to help you smash them sooner.* With 350mg of caffeine per serving, and 2000mg of Beta Alanine, The Shadow! delivers unsurpassed energy, hypnotic intensity and hard hitting strength like no other pre-workout on the market.', 8800.00, 8500.00, 11, 0.00, '2023-12-28 17:51:29', 2000),
(2508, 'PSYCHOTIC RED 35 SERVS', 'Insane-Labz-Psychotic-35-Serv-2jpg.jpg', 'Insane-Labz-Psychotic-35-Serv1.jpg', 'INSANE LABZ', 'Pre-workout supplements aren’t a luxury; they’re a requirement if you want to hit your peak levels of performance during each and every workout. When it comes to amping up your focus, performance, and results, the pre-workout, Psychotic is packed with the right combination of scientifically proven ingredients to ensure you go above and beyond.', 8500.00, 8300.00, 9, 0.00, '2023-12-28 17:55:44', 2000),
(2509, 'CRITICAL WHEY PROTEIN 2KG', 'Applied-Critical-Whey-2kg.jpg', 'Applied-Critical-Whey-2kg-1.jpg', 'APPLIED NUTRITION', 'Critical Whey Protein has been developed using a unique blend of Whey Protein Concentrate, Whey Protein Isolate & Hydrolysed Whey Protein. Whey Protein Concentrate is produced by Ultra-Filtration Technology containing high levels of Protein and Branched Chain Amino Acids (BCAAs). A convenient source of high-quality protein. Delicious taste and mixes instantly. Delivering high levels of protein & BCAAs.', 23000.00, 22000.00, 5, 0.00, '2023-12-28 18:01:41', 2001),
(2510, 'REDCON1 ISOTOPE WHEY ISOLATE 5 LBS', 'Redcon1-Isotope-5lbs.jpg', 'Redcon1-Isotope-5lbs-facts.jpg', 'REDCON1', '100% Whey Isolate Protein Powder Post workout or throughout the day you won\'t find a better whey isolate than isotope. Build and repair muscle with a smooth, delicious and easy to digest protein. Easy digestibility. 100% whey isolate. 71 servings', 29000.00, 28500.00, 6, 0.00, '2023-12-28 18:04:01', 2001);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(255) DEFAULT NULL,
  `news_content` text DEFAULT NULL,
  `news_date` datetime DEFAULT NULL,
  `fk_staff_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notifi_id` int(11) NOT NULL,
  `notifi_msg` text DEFAULT NULL,
  `notifi_date` datetime DEFAULT NULL,
  `notifi_is_global` tinyint(1) DEFAULT 0,
  `fk_staff_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_item_qty` int(11) DEFAULT NULL,
  `order_item_price` decimal(10,2) DEFAULT NULL,
  `fk_item_id` int(11) DEFAULT NULL,
  `fk_order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_total` decimal(10,2) DEFAULT NULL,
  `order_status` varchar(20) DEFAULT NULL,
  `order_deliver_option` varchar(50) DEFAULT NULL,
  `order_address` varchar(255) DEFAULT NULL,
  `fk_cust_id` int(11) DEFAULT NULL,
  `fk_deliver_area_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_fname` varchar(50) DEFAULT NULL,
  `staff_lname` varchar(50) DEFAULT NULL,
  `staff_username` varchar(50) DEFAULT NULL,
  `staff_pwd` varchar(50) DEFAULT NULL,
  `staff_email` varchar(100) DEFAULT NULL,
  `staff_is_active` tinyint(1) DEFAULT 1,
  `staff_phone` varchar(15) DEFAULT NULL,
  `staff_hire_date` datetime DEFAULT NULL,
  `staff_nic` varchar(15) DEFAULT NULL,
  `staff_add_line1` varchar(255) DEFAULT NULL,
  `staff_add_line2` varchar(255) DEFAULT NULL,
  `staff_add_line3` varchar(255) DEFAULT NULL,
  `staff_add_line4` varchar(255) DEFAULT NULL,
  `fk_staff_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_fname`, `staff_lname`, `staff_username`, `staff_pwd`, `staff_email`, `staff_is_active`, `staff_phone`, `staff_hire_date`, `staff_nic`, `staff_add_line1`, `staff_add_line2`, `staff_add_line3`, `staff_add_line4`, `fk_staff_type_id`) VALUES
(1504, 'Dinuka', 'Randima', 'dinuka', 'dinuka123', 'dinuka@gmail.com', 0, '071-2581425', '2024-01-02 18:29:56', '200001514765', 'No 12', 'Meda Panagoda', 'Galpatha', 'Kalutara', 1000),
(1505, 'Malindu', 'Dilakshna', 'dila', 'dila123', 'dilakshna@gmail.com', 1, '076-5842752', '2024-01-10 18:19:40', '200005233365', 'No 12', 'Batagoda', 'Balapitiya', 'Galle', 1000),
(1506, 'Amesh', 'Silva', 'amesh', 'amesh123', 'amesh@gmail.com', 1, '071-5842752', '2024-01-10 20:15:17', '200005233365', 'No 20', 'Katubedda', 'Moratuwa', 'Colombo', 1001),
(1509, 'Kalana', 'Sandaruwan', 'kalana', 'kalana123', 'kalana@gmail.com', 1, '071-8523145', '2024-01-13 10:29:56', '200012578681', 'No 15', 'Yala', 'Ballapitiya', 'Kalutara', 1002),
(1510, 'Nuwan', 'Kumara', 'nuwan', 'nuwan123', 'nuwan@gmail.com', 1, '076-2569258', '2024-01-13 13:29:56', '200001425896', 'No 54', 'Rilaulla', 'Kapuwaththa', 'Gampaha', 1003);

-- --------------------------------------------------------

--
-- Table structure for table `staff_type`
--

CREATE TABLE `staff_type` (
  `staff_type_id` int(11) NOT NULL,
  `staff_type_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_type`
--

INSERT INTO `staff_type` (`staff_type_id`, `staff_type_name`) VALUES
(1000, 'Admin'),
(1001, 'Cashier'),
(1002, 'Inventory Manager'),
(1003, 'Deliver Person');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cancellation`
--
ALTER TABLE `cancellation`
  ADD PRIMARY KEY (`cancel_id`),
  ADD KEY `fk_order_id` (`fk_order_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_item_id` (`fk_item_id`),
  ADD KEY `fk_cust_id` (`fk_cust_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `customer_notification`
--
ALTER TABLE `customer_notification`
  ADD PRIMARY KEY (`cust_notifi_id`),
  ADD KEY `fk_notifi_id` (`fk_notifi_id`),
  ADD KEY `fk_cust_id` (`fk_cust_id`);

--
-- Indexes for table `deliver_area`
--
ALTER TABLE `deliver_area`
  ADD PRIMARY KEY (`deliver_area_id`),
  ADD KEY `fk_staff_id` (`fk_staff_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `fk_staff_id` (`fk_staff_id`),
  ADD KEY `fk_item_id` (`fk_item_id`),
  ADD KEY `fk_cust_id` (`fk_cust_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiry_id`),
  ADD KEY `fk_staff_id` (`fk_staff_id`),
  ADD KEY `fk_cust_id` (`fk_cust_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `fk_category_id` (`fk_category_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `fk_staff_id` (`fk_staff_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notifi_id`),
  ADD KEY `fk_staff_id` (`fk_staff_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `fk_item_id` (`fk_item_id`),
  ADD KEY `fk_order_id` (`fk_order_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_cust_id` (`fk_cust_id`),
  ADD KEY `fk_deliver_area_id` (`fk_deliver_area_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `fk_staff_type_id` (`fk_staff_type_id`);

--
-- Indexes for table `staff_type`
--
ALTER TABLE `staff_type`
  ADD PRIMARY KEY (`staff_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cancellation`
--
ALTER TABLE `cancellation`
  MODIFY `cancel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5500;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3509;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2005;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3004;

--
-- AUTO_INCREMENT for table `customer_notification`
--
ALTER TABLE `customer_notification`
  MODIFY `cust_notifi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7500;

--
-- AUTO_INCREMENT for table `deliver_area`
--
ALTER TABLE `deliver_area`
  MODIFY `deliver_area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4000;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6000;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6500;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2511;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8000;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notifi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7000;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5000;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4500;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1511;

--
-- AUTO_INCREMENT for table `staff_type`
--
ALTER TABLE `staff_type`
  MODIFY `staff_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cancellation`
--
ALTER TABLE `cancellation`
  ADD CONSTRAINT `cancellation_ibfk_1` FOREIGN KEY (`fk_order_id`) REFERENCES `order_table` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`fk_item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`fk_cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_notification`
--
ALTER TABLE `customer_notification`
  ADD CONSTRAINT `customer_notification_ibfk_1` FOREIGN KEY (`fk_notifi_id`) REFERENCES `notification` (`notifi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_notification_ibfk_2` FOREIGN KEY (`fk_cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deliver_area`
--
ALTER TABLE `deliver_area`
  ADD CONSTRAINT `deliver_area_ibfk_1` FOREIGN KEY (`fk_staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`fk_staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`fk_item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`fk_cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD CONSTRAINT `inquiry_ibfk_1` FOREIGN KEY (`fk_staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inquiry_ibfk_2` FOREIGN KEY (`fk_cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`fk_category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`fk_staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`fk_staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`fk_item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`fk_order_id`) REFERENCES `order_table` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_table`
--
ALTER TABLE `order_table`
  ADD CONSTRAINT `order_table_ibfk_1` FOREIGN KEY (`fk_cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_table_ibfk_2` FOREIGN KEY (`fk_deliver_area_id`) REFERENCES `deliver_area` (`deliver_area_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`fk_staff_type_id`) REFERENCES `staff_type` (`staff_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
