-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Generation Time: Dec 30, 2020 at 11:11 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asif_weather`
--

-- --------------------------------------------------------

--
-- Table structure for table `rain_strength`
--

CREATE TABLE `rain_strength` (
  `rain_strength_id` tinyint(3) UNSIGNED NOT NULL,
  `rain_strength` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rain_strength`
--

INSERT INTO `rain_strength` (`rain_strength_id`, `rain_strength`) VALUES
(1, 'no rain'),
(2, 'drizzling'),
(3, 'light'),
(4, 'moderate'),
(5, 'heavy');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `record_id` int(11) UNSIGNED NOT NULL,
  `temperature` decimal(4,2) NOT NULL,
  `heat_index` decimal(4,2) NOT NULL,
  `wind_speed` decimal(5,2) UNSIGNED NOT NULL,
  `solar_irradiance` decimal(6,2) NOT NULL,
  `air_pollution` smallint(5) UNSIGNED NOT NULL,
  `absolute_humidity` decimal(5,2) UNSIGNED NOT NULL,
  `relative_humidity` tinyint(4) NOT NULL,
  `atmospheric_pressure` float(6,1) NOT NULL,
  `cloud_cover` tinyint(3) UNSIGNED NOT NULL,
  `accumulated_evaporation` decimal(6,3) UNSIGNED NOT NULL,
  `accumulated_precipitation` decimal(6,3) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `weather_description_id` tinyint(3) UNSIGNED NOT NULL,
  `temperature_perception_id` tinyint(3) UNSIGNED NOT NULL,
  `sky_description_id` tinyint(3) UNSIGNED NOT NULL,
  `wind_direction_description_id` tinyint(3) UNSIGNED NOT NULL,
  `wind_strength_id` tinyint(3) UNSIGNED NOT NULL,
  `rain_strength_id` tinyint(3) UNSIGNED NOT NULL,
  `snow_strength_id` tinyint(3) UNSIGNED NOT NULL,
  `validRecord` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`record_id`, `temperature`, `heat_index`, `wind_speed`, `solar_irradiance`, `air_pollution`, `absolute_humidity`, `relative_humidity`, `atmospheric_pressure`, `cloud_cover`, `accumulated_evaporation`, `accumulated_precipitation`, `date`, `time`, `weather_description_id`, `temperature_perception_id`, `sky_description_id`, `wind_direction_description_id`, `wind_strength_id`, `rain_strength_id`, `snow_strength_id`, `validRecord`) VALUES
(35, '14.00', '12.10', '12.00', '14.00', 12, '12.00', 12, 12.0, 12, '12.000', '12.000', '2020-12-07', '00:00:00', 9, 4, 3, 1, 4, 3, 2, 0),
(36, '0.00', '0.00', '0.00', '1.60', 55, '0.00', 0, 760.0, 0, '0.000', '0.000', '2020-12-30', '02:41:00', 1, 7, 1, 1, 1, 1, 1, 0),
(37, '0.00', '0.00', '0.00', '1.60', 55, '0.00', 0, 760.0, 0, '0.000', '0.000', '2020-12-15', '11:23:00', 1, 7, 1, 1, 1, 1, 1, 0),
(38, '0.00', '0.00', '0.00', '1.60', 55, '0.00', 0, 760.0, 0, '0.000', '0.000', '2020-12-30', '11:56:00', 1, 7, 1, 1, 1, 1, 1, 0),
(39, '0.00', '0.00', '0.00', '1.60', 55, '0.00', 0, 760.0, 0, '0.000', '0.000', '2020-12-30', '11:23:00', 1, 7, 1, 1, 1, 1, 1, 0),
(40, '25.00', '23.00', '5.00', '3.00', 60, '10.00', 40, 760.0, 25, '2.000', '0.000', '2020-11-02', '12:00:00', 1, 3, 1, 1, 2, 1, 1, 1),
(41, '22.00', '20.00', '2.00', '2.40', 55, '3.00', 20, 761.0, 50, '2.000', '2.000', '2020-11-03', '11:00:00', 2, 3, 3, 5, 2, 3, 1, 1),
(42, '24.00', '21.00', '10.00', '1.60', 60, '10.00', 60, 759.0, 70, '3.000', '6.000', '2020-11-04', '13:00:00', 6, 3, 5, 6, 3, 4, 1, 1),
(43, '17.00', '15.00', '4.00', '1.40', 70, '13.00', 75, 760.0, 80, '4.000', '8.000', '2020-11-05', '21:00:00', 5, 4, 5, 7, 2, 5, 1, 1),
(44, '16.00', '14.00', '10.00', '1.70', 58, '15.00', 60, 762.0, 50, '3.000', '0.000', '2020-11-06', '11:15:00', 1, 4, 1, 1, 3, 1, 1, 0),
(45, '17.00', '14.00', '10.00', '1.70', 57, '15.00', 60, 761.0, 55, '2.000', '5.000', '2020-11-06', '11:15:00', 9, 4, 4, 2, 3, 3, 1, 1),
(46, '20.00', '18.00', '2.00', '2.30', 60, '3.00', 30, 760.0, 10, '1.000', '4.000', '2020-11-07', '17:00:00', 4, 3, 1, 1, 2, 1, 1, 1),
(47, '24.00', '22.00', '25.00', '1.60', 55, '5.00', 30, 760.0, 20, '1.000', '1.000', '2020-11-08', '15:00:00', 3, 3, 1, 5, 5, 1, 1, 1),
(48, '20.00', '19.50', '5.00', '2.00', 75, '4.00', 20, 762.0, 0, '1.000', '2.000', '2020-11-09', '12:05:00', 4, 3, 1, 1, 2, 1, 1, 1),
(49, '16.00', '14.00', '7.00', '1.40', 55, '10.00', 50, 759.0, 80, '2.000', '8.000', '2020-11-10', '20:00:00', 6, 4, 5, 7, 3, 5, 1, 0),
(50, '17.00', '15.00', '18.00', '1.20', 60, '10.00', 60, 760.0, 68, '3.000', '5.000', '2020-11-10', '11:29:00', 6, 4, 4, 5, 5, 4, 1, 1),
(51, '12.00', '10.00', '10.00', '1.60', 55, '8.00', 45, 45.0, 40, '3.000', '4.000', '2020-11-11', '16:00:00', 6, 4, 3, 6, 3, 2, 1, 1),
(52, '8.00', '6.00', '3.00', '1.60', 55, '7.00', 20, 759.0, 20, '2.000', '1.000', '2020-11-12', '13:00:00', 4, 5, 2, 7, 2, 1, 1, 1),
(53, '10.00', '9.50', '3.00', '1.90', 64, '10.00', 30, 760.0, 35, '2.000', '4.000', '2020-11-13', '10:00:00', 10, 5, 2, 5, 2, 2, 1, 1),
(54, '12.00', '10.00', '14.00', '2.00', 59, '8.00', 35, 760.0, 20, '1.000', '2.000', '2020-11-14', '14:00:00', 1, 4, 1, 7, 4, 1, 1, 1),
(55, '15.00', '13.00', '8.00', '2.40', 55, '3.00', 15, 760.0, 10, '2.000', '1.000', '2020-11-15', '11:47:00', 1, 4, 1, 3, 3, 1, 1, 1),
(56, '17.00', '16.50', '12.00', '1.80', 57, '5.00', 25, 760.0, 30, '2.000', '0.000', '2020-11-16', '15:00:00', 6, 4, 2, 1, 4, 2, 1, 1),
(57, '14.00', '12.00', '24.00', '1.30', 60, '12.00', 40, 761.0, 45, '2.000', '4.000', '2020-11-17', '11:52:00', 2, 4, 2, 8, 5, 2, 1, 1),
(58, '13.00', '12.00', '0.00', '1.60', 55, '0.00', 0, 760.0, 0, '0.000', '0.000', '2020-11-18', '12:00:00', 1, 4, 1, 1, 1, 1, 1, 1),
(59, '10.00', '9.00', '10.00', '1.40', 59, '3.00', 30, 761.0, 35, '2.000', '3.000', '2020-11-19', '15:00:00', 3, 5, 2, 2, 3, 1, 1, 1),
(60, '16.00', '14.00', '3.00', '2.30', 55, '10.00', 40, 760.0, 60, '4.000', '8.000', '2020-11-20', '12:30:00', 6, 4, 3, 3, 2, 4, 1, 1),
(61, '16.00', '14.00', '9.00', '1.80', 55, '15.00', 50, 760.0, 90, '1.000', '9.000', '2020-11-21', '20:45:00', 9, 4, 5, 1, 3, 5, 1, 1),
(62, '14.00', '12.00', '20.00', '1.20', 60, '5.00', 35, 759.0, 50, '2.000', '2.000', '2020-11-22', '02:00:00', 3, 4, 4, 1, 5, 2, 1, 1),
(63, '16.00', '15.00', '10.00', '2.50', 80, '3.00', 20, 760.0, 15, '4.000', '0.000', '2020-11-23', '15:00:00', 1, 4, 1, 7, 3, 1, 1, 1),
(64, '15.00', '14.50', '2.00', '2.70', 80, '2.00', 15, 761.0, 10, '3.000', '0.000', '2020-11-24', '13:00:00', 1, 4, 1, 5, 2, 1, 1, 1),
(65, '17.00', '15.00', '4.00', '2.50', 60, '2.00', 15, 760.0, 10, '4.000', '0.000', '2020-11-25', '13:00:00', 1, 4, 1, 1, 2, 1, 1, 1),
(66, '19.00', '17.00', '5.00', '2.30', 58, '3.00', 30, 760.0, 15, '3.000', '1.000', '2020-11-26', '15:15:00', 1, 3, 1, 5, 2, 1, 1, 1),
(67, '15.00', '14.00', '25.00', '1.60', 63, '12.00', 30, 760.0, 25, '1.000', '1.000', '2020-11-27', '12:00:00', 3, 4, 1, 1, 5, 1, 1, 1),
(68, '15.00', '14.00', '10.00', '1.60', 55, '10.00', 30, 760.0, 60, '1.000', '4.000', '2020-11-28', '13:30:00', 2, 4, 4, 6, 3, 1, 1, 1),
(69, '13.00', '10.00', '30.00', '1.60', 70, '2.00', 50, 760.0, 30, '1.000', '3.000', '2020-11-29', '17:00:00', 3, 4, 2, 4, 5, 1, 1, 1),
(70, '10.00', '9.50', '25.00', '1.60', 65, '5.00', 20, 760.0, 40, '1.000', '2.000', '2020-11-30', '11:00:00', 3, 5, 2, 3, 5, 1, 1, 1),
(71, '12.00', '11.00', '10.00', '2.10', 60, '2.00', 20, 759.0, 10, '1.000', '0.000', '2020-12-01', '14:10:00', 4, 4, 1, 6, 3, 1, 1, 1),
(72, '11.00', '10.00', '9.00', '2.00', 60, '2.00', 10, 760.0, 15, '1.000', '0.000', '2020-12-02', '17:28:00', 4, 4, 1, 1, 3, 1, 1, 1),
(73, '10.00', '8.00', '2.00', '1.00', 57, '3.00', 30, 760.0, 10, '1.000', '0.000', '2020-12-03', '10:00:00', 4, 5, 1, 2, 2, 1, 1, 1),
(74, '8.00', '7.00', '4.00', '1.20', 60, '4.00', 30, 760.0, 40, '2.000', '1.000', '2020-12-04', '14:45:00', 4, 5, 2, 4, 2, 1, 1, 1),
(75, '10.00', '9.00', '6.00', '1.40', 65, '10.00', 50, 760.0, 30, '2.000', '1.000', '2020-12-05', '12:00:00', 9, 5, 2, 5, 3, 1, 1, 1),
(76, '8.00', '7.00', '5.00', '1.10', 55, '5.00', 20, 762.0, 0, '1.000', '2.000', '2020-12-06', '15:00:00', 4, 5, 1, 6, 2, 1, 1, 1),
(77, '9.00', '8.00', '6.00', '1.40', 63, '18.00', 70, 759.0, 50, '2.000', '2.000', '2020-12-08', '09:00:00', 10, 5, 5, 7, 3, 3, 1, 1),
(78, '10.00', '8.00', '6.00', '1.40', 63, '18.00', 70, 759.0, 50, '2.000', '2.000', '2020-12-07', '09:00:00', 10, 5, 5, 3, 3, 3, 1, 1),
(79, '5.00', '4.00', '10.00', '1.60', 58, '5.00', 20, 761.0, 10, '1.000', '2.000', '2020-12-09', '12:15:00', 4, 6, 1, 6, 3, 1, 1, 1),
(80, '4.00', '3.00', '15.00', '0.90', 55, '8.00', 30, 761.0, 70, '1.000', '8.000', '2020-12-10', '22:00:00', 7, 6, 5, 7, 4, 1, 3, 1),
(81, '6.00', '5.00', '6.00', '1.60', 55, '5.00', 30, 760.0, 70, '3.000', '8.000', '2020-12-11', '11:00:00', 7, 5, 5, 2, 3, 3, 3, 1),
(82, '10.00', '9.00', '5.00', '2.00', 55, '3.00', 20, 760.0, 10, '2.000', '0.000', '2020-12-12', '18:00:00', 4, 5, 1, 4, 2, 1, 1, 1),
(83, '7.00', '6.00', '9.00', '1.60', 55, '10.00', 55, 760.0, 40, '2.000', '4.000', '2020-12-13', '14:00:00', 4, 5, 2, 6, 3, 1, 1, 1),
(84, '5.00', '4.00', '15.00', '1.20', 80, '17.00', 75, 760.0, 80, '1.000', '7.000', '2020-12-14', '21:00:00', 9, 6, 5, 1, 4, 4, 1, 1),
(85, '2.00', '0.00', '28.00', '1.90', 60, '5.00', 40, 760.0, 70, '1.000', '2.000', '2020-12-15', '20:00:00', 2, 7, 5, 2, 5, 2, 1, 1),
(86, '3.00', '2.50', '2.00', '2.50', 60, '4.00', 20, 761.0, 5, '2.000', '4.000', '2020-12-16', '21:00:00', 4, 6, 1, 7, 2, 1, 1, 1),
(87, '0.00', '-2.00', '35.00', '0.80', 70, '2.00', 10, 760.0, 10, '1.000', '1.000', '2020-12-17', '19:00:00', 3, 7, 1, 3, 6, 1, 1, 1),
(88, '-2.00', '-2.50', '20.00', '1.00', 62, '3.50', 25, 759.0, 20, '2.000', '0.000', '2020-12-18', '08:00:00', 3, 8, 1, 5, 5, 1, 1, 1),
(89, '3.00', '1.00', '10.00', '2.00', 59, '3.00', 10, 760.0, 15, '2.000', '0.000', '2020-12-19', '18:00:00', 3, 6, 1, 2, 3, 1, 1, 1),
(90, '5.00', '3.00', '5.00', '2.30', 70, '12.00', 40, 760.0, 60, '1.000', '4.000', '2020-12-20', '11:00:00', 2, 6, 5, 1, 2, 3, 1, 1),
(91, '4.00', '3.50', '2.00', '2.10', 68, '2.00', 20, 761.0, 10, '1.000', '2.000', '2020-12-21', '15:00:00', 4, 6, 1, 5, 2, 2, 1, 1),
(92, '5.00', '4.00', '6.00', '1.20', 60, '15.00', 80, 760.0, 70, '1.000', '3.000', '2020-12-22', '15:00:00', 9, 6, 5, 2, 3, 3, 1, 1),
(93, '5.00', '4.00', '3.00', '2.10', 60, '2.00', 20, 761.0, 10, '1.000', '0.000', '2020-12-23', '13:00:00', 4, 6, 2, 7, 2, 1, 1, 1),
(94, '2.00', '0.00', '2.00', '1.20', 59, '1.00', 10, 760.0, 5, '1.000', '1.000', '2020-12-24', '09:30:00', 4, 7, 1, 6, 2, 1, 1, 1),
(95, '0.00', '-2.00', '9.00', '0.90', 60, '15.00', 60, 760.0, 25, '1.000', '2.000', '2020-12-25', '19:00:00', 10, 7, 4, 5, 3, 2, 1, 1),
(96, '3.00', '2.00', '4.00', '1.60', 73, '4.00', 16, 760.0, 35, '2.000', '0.000', '2020-12-26', '21:15:00', 4, 6, 3, 1, 2, 1, 1, 1),
(97, '0.00', '-2.00', '18.00', '0.70', 55, '3.00', 15, 761.0, 75, '1.000', '10.000', '2020-12-27', '21:45:00', 5, 7, 5, 6, 5, 5, 1, 1),
(98, '2.00', '1.00', '10.00', '1.90', 61, '4.00', 16, 759.0, 20, '1.000', '3.000', '2020-12-28', '12:00:00', 4, 7, 1, 1, 3, 1, 1, 1),
(99, '1.00', '-2.00', '10.00', '1.60', 59, '20.00', 80, 761.0, 50, '1.000', '3.000', '2020-12-29', '09:15:00', 9, 7, 5, 5, 3, 4, 1, 1),
(100, '-1.00', '-2.00', '2.00', '1.60', 55, '14.00', 50, 760.0, 15, '1.000', '0.000', '2020-12-29', '22:00:00', 4, 8, 2, 1, 2, 1, 1, 1),
(101, '2.00', '0.00', '3.00', '1.90', 64, '3.00', 10, 760.0, 55, '1.000', '2.000', '2020-12-30', '14:00:00', 2, 7, 5, 5, 2, 1, 1, 1),
(102, '0.00', '-3.00', '15.00', '1.60', 69, '5.00', 11, 760.0, 60, '1.000', '2.000', '2020-12-30', '21:15:00', 2, 7, 5, 5, 4, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sky_description`
--

CREATE TABLE `sky_description` (
  `sky_description_id` tinyint(3) UNSIGNED NOT NULL,
  `sky_description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sky_description`
--

INSERT INTO `sky_description` (`sky_description_id`, `sky_description`) VALUES
(1, 'clear sky'),
(2, 'few clouds'),
(3, 'scattered clouds'),
(4, 'broken clouds'),
(5, 'overcast');

-- --------------------------------------------------------

--
-- Table structure for table `snow_strength`
--

CREATE TABLE `snow_strength` (
  `snow_strength_id` tinyint(3) UNSIGNED NOT NULL,
  `snow_strength` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `snow_strength`
--

INSERT INTO `snow_strength` (`snow_strength_id`, `snow_strength`) VALUES
(1, 'no snow'),
(2, 'light'),
(3, 'moderate'),
(4, 'heavy');

-- --------------------------------------------------------

--
-- Table structure for table `temperature_perception`
--

CREATE TABLE `temperature_perception` (
  `temperature_perception_id` tinyint(3) UNSIGNED NOT NULL,
  `temperature_perception` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temperature_perception`
--

INSERT INTO `temperature_perception` (`temperature_perception_id`, `temperature_perception`) VALUES
(1, 'boiling hot'),
(2, 'hot'),
(3, 'warm'),
(4, 'mild'),
(5, 'cool'),
(6, 'chilly'),
(7, 'cold'),
(8, 'freezing'),
(9, 'icy'),
(10, 'frosty'),
(11, 'very cold'),
(12, 'bitterly cold');

-- --------------------------------------------------------

--
-- Table structure for table `weather_description`
--

CREATE TABLE `weather_description` (
  `weather_description_id` tinyint(3) UNSIGNED NOT NULL,
  `weather_description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `weather_description`
--

INSERT INTO `weather_description` (`weather_description_id`, `weather_description`) VALUES
(1, 'sunny'),
(2, 'cloudy'),
(3, 'windy'),
(4, 'clear'),
(5, 'thunderstorms'),
(6, 'rainy'),
(7, 'snowy'),
(8, 'hail'),
(9, 'foggy'),
(10, 'haze');

-- --------------------------------------------------------

--
-- Table structure for table `wind_direction_description`
--

CREATE TABLE `wind_direction_description` (
  `wind_direction_description_id` tinyint(3) UNSIGNED NOT NULL,
  `wind_direction_description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wind_direction_description`
--

INSERT INTO `wind_direction_description` (`wind_direction_description_id`, `wind_direction_description`) VALUES
(1, 'North'),
(2, 'East'),
(3, 'South'),
(4, 'West'),
(5, 'North-East'),
(6, 'North-West'),
(7, 'South-East'),
(8, 'South-West');

-- --------------------------------------------------------

--
-- Table structure for table `wind_strength`
--

CREATE TABLE `wind_strength` (
  `wind_strength_id` tinyint(3) UNSIGNED NOT NULL,
  `wind_strength` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wind_strength`
--

INSERT INTO `wind_strength` (`wind_strength_id`, `wind_strength`) VALUES
(1, 'calm'),
(2, 'light air'),
(3, 'light'),
(4, 'gentle'),
(5, 'moderate'),
(6, 'strong'),
(7, 'storm'),
(8, 'hurricane');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rain_strength`
--
ALTER TABLE `rain_strength`
  ADD PRIMARY KEY (`rain_strength_id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `weather_description_id` (`weather_description_id`),
  ADD KEY `temperature_perception_id` (`temperature_perception_id`),
  ADD KEY `sky_description_id` (`sky_description_id`),
  ADD KEY `wind_direction_description_id` (`wind_direction_description_id`),
  ADD KEY `wind_strength_id` (`wind_strength_id`),
  ADD KEY `rain_strength_id` (`rain_strength_id`),
  ADD KEY `snow_strength_id` (`snow_strength_id`);

--
-- Indexes for table `sky_description`
--
ALTER TABLE `sky_description`
  ADD PRIMARY KEY (`sky_description_id`);

--
-- Indexes for table `snow_strength`
--
ALTER TABLE `snow_strength`
  ADD PRIMARY KEY (`snow_strength_id`);

--
-- Indexes for table `temperature_perception`
--
ALTER TABLE `temperature_perception`
  ADD PRIMARY KEY (`temperature_perception_id`);

--
-- Indexes for table `weather_description`
--
ALTER TABLE `weather_description`
  ADD PRIMARY KEY (`weather_description_id`);

--
-- Indexes for table `wind_direction_description`
--
ALTER TABLE `wind_direction_description`
  ADD PRIMARY KEY (`wind_direction_description_id`);

--
-- Indexes for table `wind_strength`
--
ALTER TABLE `wind_strength`
  ADD PRIMARY KEY (`wind_strength_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rain_strength`
--
ALTER TABLE `rain_strength`
  MODIFY `rain_strength_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `record_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `sky_description`
--
ALTER TABLE `sky_description`
  MODIFY `sky_description_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `snow_strength`
--
ALTER TABLE `snow_strength`
  MODIFY `snow_strength_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temperature_perception`
--
ALTER TABLE `temperature_perception`
  MODIFY `temperature_perception_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `weather_description`
--
ALTER TABLE `weather_description`
  MODIFY `weather_description_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wind_direction_description`
--
ALTER TABLE `wind_direction_description`
  MODIFY `wind_direction_description_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wind_strength`
--
ALTER TABLE `wind_strength`
  MODIFY `wind_strength_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`weather_description_id`) REFERENCES `weather_description` (`weather_description_id`),
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`temperature_perception_id`) REFERENCES `temperature_perception` (`temperature_perception_id`),
  ADD CONSTRAINT `record_ibfk_3` FOREIGN KEY (`sky_description_id`) REFERENCES `sky_description` (`sky_description_id`),
  ADD CONSTRAINT `record_ibfk_4` FOREIGN KEY (`wind_direction_description_id`) REFERENCES `wind_direction_description` (`wind_direction_description_id`),
  ADD CONSTRAINT `record_ibfk_5` FOREIGN KEY (`wind_strength_id`) REFERENCES `wind_strength` (`wind_strength_id`),
  ADD CONSTRAINT `record_ibfk_6` FOREIGN KEY (`rain_strength_id`) REFERENCES `rain_strength` (`rain_strength_id`),
  ADD CONSTRAINT `record_ibfk_7` FOREIGN KEY (`snow_strength_id`) REFERENCES `snow_strength` (`snow_strength_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
