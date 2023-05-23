-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 10:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intourist`
--
CREATE DATABASE IF NOT EXISTS `intourist` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `intourist`;

-- --------------------------------------------------------

--
-- Table structure for table `fdetail`
--

CREATE TABLE `fdetail` (
  `email` varchar(50) NOT NULL,
  `pnr` varchar(20) NOT NULL,
  `flight` varchar(20) NOT NULL,
  `fno` varchar(20) NOT NULL,
  `froms` varchar(20) NOT NULL,
  `from_date` date NOT NULL,
  `from_time` time NOT NULL,
  `tos` varchar(20) NOT NULL,
  `to_date` date NOT NULL,
  `to_time` time NOT NULL,
  `cost` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `nopgr` int(3) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fdetail`
--

INSERT INTO `fdetail` (`email`, `pnr`, `flight`, `fno`, `froms`, `from_date`, `from_time`, `tos`, `to_date`, `to_time`, `cost`, `price`, `comment`, `nopgr`, `date`) VALUES
('', 'fgdgdgdf', 'dfdf', '', 'jkkk', '2023-01-10', '14:23:24', 'ffgfd', '2023-01-11', '23:25:24', 3566, 6789, 'drdtrt rdtrdtd trrdtrd', 0, '2023-01-09 19:28:01'),
('', 'kjsdlsd', 'ffsddds', '', 'dsddd', '2023-01-09', '27:30:24', 'sdadaad', '2023-01-11', '28:30:24', 456, 458, 'ppp ffkf kfkkf', 5, '2023-01-09 19:32:14'),
('abhishek@gmail.com', 'DFGTY', 'AKASA AIR', '', 'Mumbai BOM', '2023-01-10', '16:48:00', 'Delhi DEL', '2023-01-11', '04:47:00', 10000, 12000, '', 2, '2023-01-10 16:48:29'),
('abhishek@gmail.com', 'fggf234', 'AIR INDIA', '', 'Delhi DEL', '2023-01-11', '04:49:00', 'Delhi DEL', '2023-01-26', '16:50:00', 10000, 12000, 'rarara', 2, '2023-01-10 16:50:02'),
('abhishek@gmail.com', 'gfghgf', 'AIR INDIA', '', 'Delhi DEL', '2023-01-05', '04:52:00', 'Delhi DEL', '2023-01-25', '16:53:00', 10000, 12000, '', 2, '2023-01-10 16:51:58'),
('abhishek@gmail.com', 'gfghgf', 'AIR INDIA', '', 'Delhi DEL', '2023-01-05', '04:52:00', 'Delhi DEL', '2023-01-25', '16:53:00', 10000, 12000, '', 2, '2023-01-10 16:54:26'),
('abhishek@gmail.com', 'fggf234', 'AIR INDIA', '', 'Delhi DEL', '2022-12-29', '17:03:00', 'Delhi DEL', '2023-02-02', '17:03:00', 10000, 12000, 'fgfhgfhg', 2, '2023-01-10 17:05:35'),
('abhishek@gmail.com', 'fggf234', 'AIR INDIA', '', 'Delhi DEL', '2023-01-12', '17:12:00', 'Delhi DEL', '2023-01-25', '17:11:00', 10000, 12000, 'wah wah', 3, '2023-01-10 17:10:03'),
('pila@gmail.com', 'PILAPILA', 'GO FIRST', '', 'Delhi DEL', '2023-01-05', '20:30:00', 'Udaipur UDR', '2023-01-26', '17:32:00', 10000, 12000, 'well done', 2, '2023-01-10 17:30:45'),
('hara@gmail.com', 'ghfhgh', 'AIR INDIA', 'hjhfjh', 'Delhi DEL', '2023-02-15', '09:37:00', 'Delhi DEL', '2023-02-23', '09:37:00', 10000, 12000, 'jhjhfhjhfhf', 2, '2023-02-05 09:36:36'),
('hara@gmail.com', 'uytutyu', 'AIR INDIA', 'hjhfjh', 'Delhi DEL', '2023-02-15', '09:37:00', 'Delhi DEL', '2023-02-23', '09:37:00', 10000, 12000, 'jhjhfhjhfhf', 2, '2023-02-05 09:44:56'),
('hara@gmail.com', 'uhhss', 'AIR INDIA', 'fhdkjfkd', 'Delhi DEL', '2023-02-15', '00:46:00', 'Delhi DEL', '2023-02-23', '09:48:00', 10000, 12000, 'dfsdfsdf', 2, '2023-02-05 09:46:44'),
('hara@gmail.com', 'uhhss', 'AIR INDIA', 'fhdkjfkd', 'Delhi DEL', '2023-02-15', '00:46:00', 'Delhi DEL', '2023-02-23', '09:48:00', 10000, 12000, 'dfsdfsdf', 2, '2023-02-05 11:05:10'),
('hara@gmail.com', 'uhhss', 'AIR INDIA', 'fhdkjfkd', 'Delhi DEL', '2023-02-15', '00:46:00', 'Delhi DEL', '2023-02-23', '09:48:00', 10000, 12000, 'dfsdfsdf', 2, '2023-02-05 11:37:25'),
('hara@gmail.com', 'jkkjk', 'AIR INDIA', 'knklnlk', 'Delhi DEL', '2023-02-09', '11:41:00', 'Delhi DEL', '2023-02-24', '01:38:00', 10000, 12000, 'vvjvjh', 2, '2023-02-05 11:38:45'),
('hara@gmail.com', 'ddskgksfs', 'AIR INDIA', 'gsks', 'Delhi DEL', '2023-02-09', '10:58:00', 'Delhi DEL', '2023-02-16', '10:58:00', 10000, 12000, 'bkjkg', 2, '2023-02-07 10:55:44'),
('hara@gmail.com', 'sdfdsf', 'AIR INDIA', 'weewrew', 'Delhi DEL', '2023-02-01', '13:47:00', 'Delhi DEL', '2023-02-25', '13:46:00', 10000, 12000, 'gfhjdgjsd', 2, '2023-02-07 13:46:23'),
('hara@gmail.com', 'fggf234', 'AIR INDIA', 'jdhskdsak', 'Delhi DEL', '2023-02-16', '12:12:00', 'Delhi DEL', '2023-02-27', '16:08:00', 10000, 12000, 'kkl', 2, '2023-02-08 12:09:22'),
('hara@gmail.com', 'lldjfsfddf', 'AIR INDIA', 'fdsfdf', 'Delhi DEL', '2023-02-17', '18:15:00', 'Delhi DEL', '2023-03-03', '18:15:00', 10000, 12000, 'fhfhf', 2, '2023-02-09 18:14:21'),
('hara@gmail.com', 'yugdugdid', 'AIR INDIA', 'fhdkjfkd', 'Delhi DEL', '2023-02-14', '19:58:00', 'Delhi DEL', '2023-02-22', '19:59:00', 10000, 12000, 'yfudfu', 2, '2023-02-09 19:56:54'),
('hara@gmail.com', 'jkkjj', 'AIR INDIA', 'jkhsdkas', 'Delhi DEL', '2023-02-16', '11:41:00', 'Delhi DEL', '2023-03-03', '09:43:00', 10000, 12000, 'fudgjodugodgudodg', 2, '2023-02-11 09:41:46'),
('hara@gmail.com', 'ffddfddsfdf', 'AIR INDIA', 'fhgdt', 'Delhi DEL', '2023-02-09', '11:28:00', 'Delhi DEL', '2023-03-02', '11:28:00', 10000, 12000, 'ilhlkhl', 2, '2023-02-11 11:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `pnr` varchar(20) NOT NULL,
  `prefix` varchar(10) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`pnr`, `prefix`, `pname`, `category`) VALUES
('DFGTY', 'Mr.', 'raman', 'ADULT'),
('DFGTY', 'Miss', 'alka', 'CHILD'),
('fggf234', 'Mr.', 'raman', 'ADULT'),
('fggf234', 'Mr.', 'alka', 'ADULT'),
('gfghgf', 'Mr.', 'gaa', 'ADULT'),
('gfghgf', 'Mr.', 'raja', 'ADULT'),
('gfghgf', 'Mr.', 'gaa', 'ADULT'),
('gfghgf', 'Mr.', 'raja', 'ADULT'),
('fggf234', 'Master', 'rekha', 'ADULT'),
('fggf234', 'Mr.', 'rajan', 'ADULT'),
('fggf234', 'Mr.', 'rame', 'ADULT'),
('fggf234', 'Mr.', 'jame', 'ADULT'),
('fggf234', 'Mr.', 'kame', 'ADULT'),
('PILAPILA', 'Mr.', 'raman', 'ADULT'),
('PILAPILA', 'Mr.', 'raghav', 'ADULT'),
('ghfhgh', 'Mr.', 'ghfh', 'ADULT'),
('ghfhgh', 'Mr.', 'fhjfj', 'ADULT'),
('uytutyu', '', '', ''),
('uytutyu', '', '', ''),
('uhhss', 'Mr.', 'sfsf', 'ADULT'),
('uhhss', 'Mr.', 'dsfdsf', 'ADULT'),
('uhhss', '', '', ''),
('uhhss', '', '', ''),
('uhhss', '', '', ''),
('uhhss', '', '', ''),
('jkkjk', 'Mr.', 'chgchch', 'ADULT'),
('jkkjk', 'Mr.', 'gfdgfh', 'ADULT'),
('ddskgksfs', 'Mr.', 'fujfiu', 'ADULT'),
('ddskgksfs', 'Mr.', 'uuigui', 'ADULT'),
('sdfdsf', 'Mr.', 'raaak', 'ADULT'),
('sdfdsf', 'Mr.', 'gdsadka', 'ADULT'),
('fggf234', 'Mr.', 'raagaj', 'ADULT'),
('fggf234', 'Mr.', 'raman', 'ADULT'),
('lldjfsfddf', 'Mr.', 'sonu', 'ADULT'),
('lldjfsfddf', 'Mr.', 'nigam', 'ADULT'),
('yugdugdid', 'Mr.', 'aman', 'ADULT'),
('yugdugdid', 'Mr.', 'aahan', 'ADULT'),
('jkkjj', 'Mr.', 'raja', 'ADULT'),
('jkkjj', 'Mr.', 'ram', 'ADULT'),
('ffddfddsfdf', 'Mr.', 'hjfhj', 'ADULT'),
('ffddfddsfdf', 'Mr.', 'jkkgklg', 'ADULT');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `username`, `password`) VALUES
('rajveer@gmail.com', 'rajveer', '123456'),
('abhishek@gmail.com', 'Abhishek', 'admin123'),
('raj@gmail.com', 'rajveer', '123456'),
('raju@gmail.com', 'raju', '123456'),
('laal@gmail.com', 'laal', '123456'),
('pila@gmail.com', 'pila', '123456'),
('kala@gmail.com', 'kala', '123456'),
('hara@gmail.com', 'hara', '123456');
--
-- Database: `mydata`
--
CREATE DATABASE IF NOT EXISTS `mydata` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mydata`;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `launguage1` varchar(10) NOT NULL,
  `launguage2` varchar(10) NOT NULL,
  `launguage3` varchar(10) NOT NULL,
  `launguage4` varchar(10) NOT NULL,
  `car` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userdata2`
--

CREATE TABLE `userdata2` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `launguage` varchar(50) NOT NULL,
  `car` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata2`
--

INSERT INTO `userdata2` (`id`, `name`, `email`, `gender`, `launguage`, `car`, `password`) VALUES
(1, 'rajveer', 'rajveer@gmail.com', 'male', 'english', 'maruti', '123456'),
(2, 'raj', 'raj@gmail.com', 'male', 'english', 'hundai', '123456'),
(4, 'raji', 'raji@gmail.com', 'female', 'english', 'bmw', '123456'),
(5, 'rajim', 'rajim@gmail.com', 'female', 'english', 'bmw', '123456'),
(6, 'rajima', 'rajima@gmail.com', 'female', 'english', 'mg', '123456'),
(7, 'rajiman', '', 'male', 'english', 'mg', '123456'),
(8, '', '', 'male', 'english', 'mg', '123456'),
(9, 'rajimana', 'rajimana@gmail.com', 'male', 'english', 'mg', '123456'),
(10, 'rajveera', 'rajveera@gmail.com', 'male', 'english,hi', 'hundai', '123456'),
(11, 'rajveeraj', 'rajveeraj@gmail.com', 'male', 'english,hindi,spanish,', 'hundai', '123456'),
(12, '', 'rajveeraj@gmail.com', 'male', 'english,hindi,spanish,', 'hundai', '123456'),
(13, '', '', 'male', 'english,hindi,spanish,', 'hundai', '123456'),
(14, '', '', 'male', 'english,hindi,french,', 'hundai', '123456'),
(15, '', '', 'male', 'english,hindi,french,', 'hundai', '123456'),
(16, '', '', 'male', 'english,hindi,french,', 'hundai', '123456'),
(17, 'alka', 'alka@gmail.com', 'female', '', 'bmw', '123456'),
(18, 'alka', 'alka@gmail.com', 'female', 'english,', 'bmw', '123456'),
(19, 'vijay', 'vijay@gmail.com', 'male', 'english,hindi,', 'bmw', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `userdata2`
--
ALTER TABLE `userdata2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdata2`
--
ALTER TABLE `userdata2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Dumping data for table `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'server', 'intourist', '{\"quick_or_custom\":\"quick\",\"what\":\"sql\",\"db_select[]\":[\"intourist\",\"mydata\",\"phpmyadmin\",\"test\",\"testdb\"],\"aliases_new\":\"\",\"output_format\":\"sendit\",\"filename_template\":\"@SERVER@\",\"remember_template\":\"on\",\"charset\":\"utf-8\",\"compression\":\"none\",\"maxsize\":\"\",\"codegen_structure_or_data\":\"data\",\"codegen_format\":\"0\",\"csv_separator\":\",\",\"csv_enclosed\":\"\\\"\",\"csv_escaped\":\"\\\"\",\"csv_terminated\":\"AUTO\",\"csv_null\":\"NULL\",\"csv_structure_or_data\":\"data\",\"excel_null\":\"NULL\",\"excel_columns\":\"something\",\"excel_edition\":\"win\",\"excel_structure_or_data\":\"data\",\"json_structure_or_data\":\"data\",\"json_unicode\":\"something\",\"latex_caption\":\"something\",\"latex_structure_or_data\":\"structure_and_data\",\"latex_structure_caption\":\"Structure of table @TABLE@\",\"latex_structure_continued_caption\":\"Structure of table @TABLE@ (continued)\",\"latex_structure_label\":\"tab:@TABLE@-structure\",\"latex_relation\":\"something\",\"latex_comments\":\"something\",\"latex_mime\":\"something\",\"latex_columns\":\"something\",\"latex_data_caption\":\"Content of table @TABLE@\",\"latex_data_continued_caption\":\"Content of table @TABLE@ (continued)\",\"latex_data_label\":\"tab:@TABLE@-data\",\"latex_null\":\"\\\\textit{NULL}\",\"mediawiki_structure_or_data\":\"data\",\"mediawiki_caption\":\"something\",\"mediawiki_headers\":\"something\",\"htmlword_structure_or_data\":\"structure_and_data\",\"htmlword_null\":\"NULL\",\"ods_null\":\"NULL\",\"ods_structure_or_data\":\"data\",\"odt_structure_or_data\":\"structure_and_data\",\"odt_relation\":\"something\",\"odt_comments\":\"something\",\"odt_mime\":\"something\",\"odt_columns\":\"something\",\"odt_null\":\"NULL\",\"pdf_report_title\":\"\",\"pdf_structure_or_data\":\"data\",\"phparray_structure_or_data\":\"data\",\"sql_include_comments\":\"something\",\"sql_header_comment\":\"\",\"sql_use_transaction\":\"something\",\"sql_compatibility\":\"NONE\",\"sql_structure_or_data\":\"structure_and_data\",\"sql_create_table\":\"something\",\"sql_auto_increment\":\"something\",\"sql_create_view\":\"something\",\"sql_create_trigger\":\"something\",\"sql_backquotes\":\"something\",\"sql_type\":\"INSERT\",\"sql_insert_syntax\":\"both\",\"sql_max_query_size\":\"50000\",\"sql_hex_for_binary\":\"something\",\"sql_utc_time\":\"something\",\"texytext_structure_or_data\":\"structure_and_data\",\"texytext_null\":\"NULL\",\"yaml_structure_or_data\":\"data\",\"\":null,\"as_separate_files\":null,\"csv_removeCRLF\":null,\"csv_columns\":null,\"excel_removeCRLF\":null,\"json_pretty_print\":null,\"htmlword_columns\":null,\"ods_columns\":null,\"sql_dates\":null,\"sql_relation\":null,\"sql_mime\":null,\"sql_disable_fk\":null,\"sql_views_as_tables\":null,\"sql_metadata\":null,\"sql_drop_database\":null,\"sql_drop_table\":null,\"sql_if_not_exists\":null,\"sql_simple_view_export\":null,\"sql_view_current_user\":null,\"sql_or_replace_view\":null,\"sql_procedure_function\":null,\"sql_truncate\":null,\"sql_delayed\":null,\"sql_ignore\":null,\"texytext_columns\":null}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"intourist\",\"table\":\"passenger\"},{\"db\":\"intourist\",\"table\":\"fdetail\"},{\"db\":\"intourist\",\"table\":\"user\"},{\"db\":\"test\",\"table\":\"interior\"},{\"db\":\"test\",\"table\":\"books\"},{\"db\":\"test\",\"table\":\"kitchen\"},{\"db\":\"mydata\",\"table\":\"userdata2\"},{\"db\":\"mydata\",\"table\":\"userdata\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'intourist', 'passenger', '{\"CREATE_TIME\":\"2023-01-07 20:45:25\",\"col_order\":[1,0,3,2],\"col_visib\":[1,1,1,1]}', '2023-01-10 08:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-03-21 09:30:26', '{\"Console\\/Mode\":\"show\",\"Console\\/Height\":90.99159999999999,\"NavigationWidth\":194}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `quantity`, `price`) VALUES
(1, 'shiva', 10, 300),
(2, 'yoga', 40, 500),
(3, 'meditation', 30, 200),
(4, 'hindu', 15, 700);

-- --------------------------------------------------------

--
-- Table structure for table `interior`
--

CREATE TABLE `interior` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `interior`
--

INSERT INTO `interior` (`id`, `name`, `quantity`, `price`) VALUES
(1, 'wall art', 10, 500),
(2, 'flower pot', 40, 200),
(3, 'wall light', 15, 500),
(4, 'coffee table', 10, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `kitchen`
--

CREATE TABLE `kitchen` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kitchen`
--

INSERT INTO `kitchen` (`id`, `name`, `quantity`, `price`) VALUES
(1, 'cutting board', 10, 200),
(2, 'fry pan', 40, 500),
(3, 'water bottle', 30, 300),
(4, 'tiffin', 10, 300);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interior`
--
ALTER TABLE `interior`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kitchen`
--
ALTER TABLE `kitchen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `interior`
--
ALTER TABLE `interior`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kitchen`
--
ALTER TABLE `kitchen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `testdb`
--
CREATE DATABASE IF NOT EXISTS `testdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `testdb`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
