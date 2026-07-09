-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2026 at 03:57 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_namasiswa`
--
CREATE DATABASE IF NOT EXISTS `db_namasiswa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db_namasiswa`;

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `isi`, `gambar`, `tanggal`) VALUES
(1, 'IHSG Anjlok ke Bawah 6.000, Rupiah Melemah ke Rp17.900 per Dolar AS', 'Indeks Harga Saham Gabungan (IHSG) mengalami penurunan tajam hingga menembus level psikologis 6.000 pada perdagangan 3 Juni 2026. Setelah sempat dibuka menguat, tekanan jual yang tinggi membuat indeks turun lebih dari tiga persen. Pelemahan tersebut dipengaruhi oleh meningkatnya ketidakpastian global, penguatan dolar Amerika Serikat, serta meningkatnya kekhawatiran investor terhadap kondisi geopolitik dunia. Pada hari yang sama, nilai tukar rupiah juga melemah hingga mendekati Rp17.900 per dolar AS.\r\n\r\nSelain faktor eksternal, pasar juga dipengaruhi oleh meningkatnya kebutuhan valuta asing di dalam negeri dan kekhawatiran terhadap kondisi ekonomi global. Banyak saham berkapitalisasi besar mengalami penurunan sehingga menyeret IHSG ke zona merah. Para analis menyarankan investor tetap berhati-hati dan memperhatikan perkembangan ekonomi global sebelum mengambil keputusan investasi.', 'artikel_1782791210_2367.jpg', '2026-06-03'),
(2, 'IHSG Sesi I Melemah, Rupiah Justru Menguat terhadap Dolar AS', 'Pada perdagangan sesi pertama 29 Juni 2026, Indeks Harga Saham Gabungan (IHSG) sempat dibuka menguat sekitar 0,70 persen. Namun, tidak lama kemudian tekanan jual pada saham-saham berkapitalisasi besar membuat IHSG berbalik melemah hingga hampir 1 persen. Nilai transaksi di Bursa Efek Indonesia mencapai sekitar Rp4 triliun dengan sektor keuangan menjadi salah satu sektor yang paling banyak diperdagangkan.\r\n\r\nDi sisi lain, nilai tukar rupiah justru menguat terhadap dolar Amerika Serikat dan bergerak di kisaran Rp17.879–Rp17.922 per dolar AS. Pemerintah menegaskan akan tetap menjaga stabilitas ekonomi melalui pengendalian inflasi dan menjaga daya beli masyarakat. Artikel ini memiliki gambar utama tentang pergerakan IHSG.', 'artikel_1782791265_7664.jpg', '2026-06-29'),
(3, 'Rupiah Tembus Rp17.900 per Dollar AS, Cetak Rekor Terlemah Sepanjang Sejarah', 'Nilai tukar rupiah kembali mengalami tekanan hingga mencapai level Rp17.900 per dolar Amerika Serikat (AS) pada perdagangan 3 Juni 2026. Pelemahan ini menjadi level terendah sepanjang sejarah rupiah terhadap dolar AS. Berdasarkan data perdagangan, rupiah sempat bergerak di kisaran Rp17.890 per dolar AS sebelum kembali melemah hingga sekitar Rp17.926 per dolar AS. Kondisi tersebut dipengaruhi oleh menguatnya dolar AS yang didorong meningkatnya ketegangan geopolitik di Timur Tengah, sehingga banyak investor global memindahkan dana mereka ke aset yang dianggap lebih aman (safe haven). Selain itu, ekspektasi bahwa bank sentral AS masih berpeluang mempertahankan suku bunga tinggi juga memperkuat posisi dolar.\r\n\r\nDi dalam negeri, pelemahan rupiah juga dipengaruhi oleh meningkatnya permintaan dolar AS untuk kebutuhan impor, terutama impor energi, serta kenaikan tekanan inflasi. Meski demikian, terdapat beberapa indikator ekonomi yang masih memberikan sinyal positif, seperti membaiknya indeks manufaktur (PMI) Indonesia dan berlanjutnya surplus neraca perdagangan. Para ekonom memperkirakan rupiah masih akan bergerak fluktuatif selama ketidakpastian global belum mereda. Pemerintah dan Bank Indonesia diharapkan terus menjaga stabilitas nilai tukar melalui kebijakan moneter dan koordinasi ekonomi agar dampak pelemahan rupiah terhadap dunia usaha dan masyarakat dapat diminimalkan.', 'artikel_1782791415_1588.jpg', '2026-06-03'),
(4, 'Di Balik Penguatan Rupiah dan IHSG', 'Setelah mengalami tekanan cukup berat pada awal Juni 2026, nilai tukar rupiah dan Indeks Harga Saham Gabungan (IHSG) mulai menunjukkan pemulihan. Rupiah yang sebelumnya sempat menembus level Rp18.000 per dolar AS perlahan menguat, sementara IHSG berhasil mencatat kenaikan lebih dari tujuh persen dalam sepekan. Perbaikan ini dipengaruhi oleh meredanya kepanikan di pasar keuangan, masuknya kembali sebagian dana investor asing, serta meningkatnya optimisme terhadap langkah pemerintah dan Bank Indonesia dalam menjaga stabilitas ekonomi.\r\n\r\nMeski demikian, para analis menilai penguatan tersebut belum sepenuhnya mencerminkan membaiknya fundamental ekonomi nasional. Pergerakan pasar masih sangat dipengaruhi oleh sentimen global seperti perkembangan konflik geopolitik, arah kebijakan suku bunga bank sentral Amerika Serikat, serta kondisi perdagangan internasasional. Pemerintah diharapkan terus memperkuat koordinasi kebijakan fiskal dan moneter agar stabilitas rupiah dan pasar saham dapat dipertahankan dalam jangka panjang.', 'artikel_1782791551_6727.jpg', '2026-06-16'),
(5, 'IHSG Turun 4 Persen ke 5.594 Terbebani Pelemahan Semua Sektor', 'Perdagangan di Bursa Efek Indonesia ditutup melemah tajam dengan IHSG turun sekitar empat persen ke level 5.594. Hampir seluruh sektor saham mengalami penurunan, mulai dari sektor keuangan, infrastruktur, teknologi, energi, hingga barang baku. Tekanan jual yang tinggi membuat investor memilih mengurangi kepemilikan saham di tengah meningkatnya ketidakpastian pasar global.\r\n\r\nPelemahan tersebut dipicu oleh berbagai faktor, seperti melemahnya nilai tukar rupiah, berkurangnya surplus neraca perdagangan, serta meningkatnya kekhawatiran terhadap kondisi ekonomi dunia. Para analis memperkirakan volatilitas pasar masih akan tinggi sampai terdapat kepastian mengenai arah kebijakan ekonomi global dan kondisi geopolitik internasasional.', 'artikel_1782791694_2149.jpg', '2026-06-05'),
(6, 'Rupiah Melemah, Emas dan IHSG Bergejolak, di Mana Sebaiknya Menyimpan Uang?', 'Gejolak pasar keuangan membuat masyarakat mulai membandingkan berbagai instrumen investasi, seperti tabungan, emas, dolar AS, hingga saham. Saat rupiah melemah mendekati Rp18.000 per dolar AS dan IHSG mengalami fluktuasi yang cukup tajam, banyak investor memilih instrumen yang dianggap lebih aman untuk menjaga nilai aset mereka.\r\n\r\nPara pakar keuangan menyarankan masyarakat agar tidak mengambil keputusan investasi hanya berdasarkan kepanikan pasar. Diversifikasi investasi dinilai menjadi langkah terbaik agar risiko dapat ditekan. Selain itu, investor disarankan tetap memperhatikan tujuan keuangan jangka panjang dan tidak mudah terpengaruh oleh gejolak pasar yang bersifat sementara.', 'artikel_1782791743_6443.jpg', '2026-06-09'),
(7, 'IHSG dan Rupiah Menguat, Fundamental atau Sentimen Global?', 'IHSG dan rupiah sama-sama mengalami penguatan setelah beberapa hari sebelumnya mengalami tekanan besar. IHSG berhasil naik lebih dari tujuh persen dalam sepekan, sementara nilai tukar rupiah juga menunjukkan perbaikan terhadap dolar AS. Kenaikan tersebut didukung oleh meningkatnya optimisme investor, masuknya kembali sebagian modal asing, serta stabilitas kondisi pasar keuangan domestik.\r\n\r\nMeski demikian, para pengamat mengingatkan bahwa penguatan tersebut belum tentu menunjukkan kondisi fundamental ekonomi yang benar-benar membaik. Faktor eksternal seperti perkembangan ekonomi Amerika Serikat, konflik geopolitik, dan kebijakan suku bunga global masih menjadi penentu utama arah pergerakan rupiah maupun IHSG dalam beberapa waktu mendatang.', 'artikel_1782791804_5615.jpg', '2026-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
