-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 25, 2024 at 08:48 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `currency_conversion`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversion_rates`
--

CREATE TABLE `conversion_rates` (
  `from_currency` varchar(3) NOT NULL,
  `to_currency` varchar(3) NOT NULL,
  `conversion_rate` decimal(10,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conversion_rates`
--

INSERT INTO `conversion_rates` (`from_currency`, `to_currency`, `conversion_rate`) VALUES
('CHF', 'CHF', 1.0000),
('CHF', 'EUR', 1.0081),
('CHF', 'GBP', 0.8616),
('CHF', 'JPY', 171.6224),
('CHF', 'USD', 1.0940),
('EUR', 'CHF', 0.9920),
('EUR', 'EUR', 1.0000),
('EUR', 'GBP', 0.8519),
('EUR', 'JPY', 170.3501),
('EUR', 'USD', 1.0852),
('GBP', 'CHF', 1.1641),
('GBP', 'EUR', 1.1738),
('GBP', 'GBP', 1.0000),
('GBP', 'JPY', 199.9599),
('GBP', 'USD', 1.2739),
('JPY', 'CHF', 0.0058),
('JPY', 'EUR', 0.0059),
('JPY', 'GBP', 0.0050),
('JPY', 'JPY', 1.0000),
('JPY', 'USD', 0.0064),
('USD', 'CHF', 0.9141),
('USD', 'EUR', 0.9215),
('USD', 'GBP', 0.7850),
('USD', 'JPY', 156.9725),
('USD', 'USD', 1.0000);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `currency_code` varchar(3) NOT NULL,
  `currency_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`currency_code`, `currency_name`) VALUES
('CHF', 'Swiss Franc'),
('EUR', 'Euro'),
('GBP', 'Pound Sterling'),
('JPY', 'Japanese Yen'),
('USD', 'US Dollar');

-- --------------------------------------------------------

--
-- Table structure for table `historical_rates`
--

CREATE TABLE `historical_rates` (
  `id` int NOT NULL,
  `from_currency` varchar(3) NOT NULL,
  `to_currency` varchar(3) NOT NULL,
  `conversion_rate` decimal(10,4) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `historical_rates`
--

INSERT INTO `historical_rates` (`id`, `from_currency`, `to_currency`, `conversion_rate`, `date`) VALUES
(1, 'CHF', 'CHF', 1.0000, '2023-12-31'),
(2, 'CHF', 'EUR', 1.0770, '2023-12-31'),
(3, 'CHF', 'GBP', 0.9336, '2023-12-31'),
(4, 'CHF', 'JPY', 167.6197, '2023-12-31'),
(5, 'CHF', 'USD', 1.1883, '2023-12-31'),
(6, 'CHF', 'CHF', 1.0000, '2022-12-31'),
(7, 'CHF', 'EUR', 1.0083, '2022-12-31'),
(8, 'CHF', 'GBP', 0.8941, '2022-12-31'),
(9, 'CHF', 'JPY', 141.8176, '2022-12-31'),
(10, 'CHF', 'USD', 1.0816, '2022-12-31'),
(11, 'CHF', 'CHF', 1.0000, '2021-12-31'),
(12, 'CHF', 'EUR', 0.9643, '2021-12-31'),
(13, 'CHF', 'GBP', 0.8109, '2021-12-31'),
(14, 'CHF', 'JPY', 126.2165, '2021-12-31'),
(15, 'CHF', 'USD', 1.0965, '2021-12-31'),
(16, 'CHF', 'CHF', 1.0000, '2020-12-31'),
(17, 'CHF', 'EUR', 0.9248, '2020-12-31'),
(18, 'CHF', 'GBP', 0.8263, '2020-12-31'),
(19, 'CHF', 'JPY', 116.6609, '2020-12-31'),
(20, 'CHF', 'USD', 1.1298, '2020-12-31'),
(21, 'CHF', 'CHF', 1.0000, '2019-12-31'),
(22, 'CHF', 'EUR', 0.9213, '2019-12-31'),
(23, 'CHF', 'GBP', 0.7795, '2019-12-31'),
(24, 'CHF', 'JPY', 112.3477, '2019-12-31'),
(25, 'CHF', 'USD', 1.0337, '2019-12-31'),
(26, 'CHF', 'CHF', 1.0000, '2018-12-31'),
(27, 'CHF', 'EUR', 0.8846, '2018-12-31'),
(28, 'CHF', 'GBP', 0.7981, '2018-12-31'),
(29, 'CHF', 'JPY', 111.4456, '2018-12-31'),
(30, 'CHF', 'USD', 1.0165, '2018-12-31'),
(31, 'CHF', 'CHF', 1.0000, '2017-12-31'),
(32, 'CHF', 'EUR', 0.8551, '2017-12-31'),
(33, 'CHF', 'GBP', 0.7592, '2017-12-31'),
(34, 'CHF', 'JPY', 115.6008, '2017-12-31'),
(35, 'CHF', 'USD', 1.0260, '2017-12-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversion_rates`
--
ALTER TABLE `conversion_rates`
  ADD PRIMARY KEY (`from_currency`,`to_currency`),
  ADD KEY `to_currency` (`to_currency`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`currency_code`);

--
-- Indexes for table `historical_rates`
--
ALTER TABLE `historical_rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_currency` (`from_currency`),
  ADD KEY `to_currency` (`to_currency`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `historical_rates`
--
ALTER TABLE `historical_rates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversion_rates`
--
ALTER TABLE `conversion_rates`
  ADD CONSTRAINT `conversion_rates_ibfk_1` FOREIGN KEY (`from_currency`) REFERENCES `currencies` (`currency_code`),
  ADD CONSTRAINT `conversion_rates_ibfk_2` FOREIGN KEY (`to_currency`) REFERENCES `currencies` (`currency_code`);

--
-- Constraints for table `historical_rates`
--
ALTER TABLE `historical_rates`
  ADD CONSTRAINT `historical_rates_ibfk_1` FOREIGN KEY (`from_currency`) REFERENCES `currencies` (`currency_code`),
  ADD CONSTRAINT `historical_rates_ibfk_2` FOREIGN KEY (`to_currency`) REFERENCES `currencies` (`currency_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
