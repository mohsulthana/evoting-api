-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2020 at 02:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `pengalaman` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`id`, `nama`, `nis`, `kelas`, `pengalaman`, `foto`) VALUES
(1, 'dfg', 'dfgdf', 'dfgdfgdfgdf', 'dfgdfgdfg', 'ss.png'),
(2, 'dfgsdfsdfs', 'dfgdf', 'dfgdfgdfgdf', 'dfgdfgdfg', 'ss.png');

-- --------------------------------------------------------

--
-- Table structure for table `pasangan`
--

CREATE TABLE `pasangan` (
  `id` int(11) NOT NULL,
  `id_ketua` int(11) NOT NULL,
  `id_wakil` int(11) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `no_urut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasangan`
--

INSERT INTO `pasangan` (`id`, `id_ketua`, `id_wakil`, `visi`, `misi`, `no_urut`) VALUES
(1, 1, 902, 'Saya akan', 'berjuang', 2),
(2, 2, 902, 'Saya akan', 'berjuang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','siswa','guru','') NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'tann', 'Sulthan', '123', 'siswa', '0000-00-00', '0000-00-00'),
(2, 'barrrrr', 'Akbar', '123', 'siswa', '0000-00-00', '0000-00-00'),
(3, 'barrrrr', 'Akbarz', '123', 'siswa', '2020-07-31', '2020-07-31'),
(4, 'barrrrr', 'Akbarz', '123', 'siswa', '2020-07-31', '2020-07-31'),
(5, 'barrrrr', 'Akbaz', '$2y$10$SuhpFPJ8nF8yC31.Ocy0fOlNSxOB486YEGSpMHdEbbWdkMEzUua.G', 'siswa', '2020-08-02', '2020-08-02'),
(6, 'barrrrr', 'Akbaz', '$2y$10$Zbq.v67Jfs6EdIYj7fQ3UeJaLYyyDcJ0nuBS/XXnUJbtioN1PN2.S', 'siswa', '2020-08-02', '2020-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `id` int(11) NOT NULL,
  `id_pasangan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_voting` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voting`
--

INSERT INTO `voting` (`id`, `id_pasangan`, `id_user`, `tanggal_voting`) VALUES
(1, 1, 1, '2020-07-24 17:05:56'),
(2, 2, 2, '2020-07-24 17:05:56'),
(3, 2, 3, '2020-07-28 17:13:14'),
(8, 1, 4, '2020-07-28 17:13:14'),
(9, 1, 5, '2020-07-28 17:13:14'),
(19, 1, 6, '2020-07-28 17:13:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasangan`
--
ALTER TABLE `pasangan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_urut` (`no_urut`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `pasangan`
--
ALTER TABLE `pasangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `voting`
--
ALTER TABLE `voting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
