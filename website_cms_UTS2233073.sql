-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2025 at 02:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_cms_2233063`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `artikel_id` int(11) NOT NULL,
  `artikel_tanggal` datetime NOT NULL,
  `artikel_judul` varchar(255) NOT NULL,
  `artikel_slug` varchar(255) NOT NULL,
  `artikel_konten` longtext NOT NULL,
  `artikel_sampul` varchar(255) NOT NULL,
  `artikel_author` int(11) NOT NULL,
  `artikel_kategori` int(11) NOT NULL,
  `artikel_status` enum('publish','draft','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`artikel_id`, `artikel_tanggal`, `artikel_judul`, `artikel_slug`, `artikel_konten`, `artikel_sampul`, `artikel_author`, `artikel_kategori`, `artikel_status`) VALUES
(1, '2025-05-31 16:23:33', 'Manfaat Teknologi dalam Pendidikan Modern', 'manfaat-teknologi-dalam-pendidikan-modern', '<p data-start=\"238\" data-end=\"630\">Perkembangan teknologi informasi dan komunikasi telah membawa perubahan signifikan dalam berbagai bidang, termasuk pendidikan. Di era digital seperti sekarang, teknologi telah menjadi bagian tak terpisahkan dari proses belajar mengajar. Penerapan teknologi dalam dunia pendidikan tidak hanya mempermudah akses informasi, tetapi juga meningkatkan efektivitas dan efisiensi proses pembelajaran.</p>\r\n<p data-start=\"632\" data-end=\"1011\">Salah satu manfaat utama dari penggunaan teknologi dalam pendidikan adalah kemudahan akses terhadap sumber belajar. Dengan adanya internet, siswa dan guru dapat mengakses berbagai materi pembelajaran dari berbagai belahan dunia secara cepat dan mudah. Buku digital, video pembelajaran, dan platform e-learning memungkinkan proses belajar tidak lagi terbatas oleh ruang dan waktu.</p>\r\n<p data-start=\"1013\" data-end=\"1381\">Selain itu, teknologi juga memungkinkan terjadinya pembelajaran yang lebih interaktif dan menarik. Penggunaan media presentasi, simulasi digital, dan aplikasi edukatif membantu siswa lebih memahami materi yang kompleks. Hal ini mendorong terciptanya pembelajaran berbasis visual dan praktik, yang secara signifikan meningkatkan pemahaman konsep dan keterlibatan siswa.</p>\r\n<p data-start=\"1383\" data-end=\"1667\">Teknologi juga mendukung personalisasi pembelajaran. Dengan bantuan aplikasi dan platform digital, siswa dapat belajar sesuai dengan kecepatan dan gaya belajar masing-masing. Guru juga dapat memantau perkembangan siswa secara real-time dan memberikan umpan balik yang tepat dan cepat.</p>\r\n<p data-start=\"1669\" data-end=\"2019\">Namun, penting juga untuk diingat bahwa penggunaan teknologi harus disertai dengan literasi digital yang baik. Guru dan siswa perlu diberikan pelatihan untuk menggunakan teknologi secara efektif dan bertanggung jawab. Selain itu, pemerataan akses terhadap perangkat dan koneksi internet juga perlu diperhatikan agar tidak terjadi kesenjangan digital.</p>\r\n<p data-start=\"2021\" data-end=\"2277\">Secara keseluruhan, teknologi memberikan banyak manfaat dalam meningkatkan kualitas pendidikan. Jika dimanfaatkan secara optimal, teknologi tidak hanya menjadi alat bantu, tetapi juga menjadi kunci transformasi pendidikan menuju masa depan yang lebih baik.</p>', '585a0b4d5d124d48827d94c779d14e30.jpg', 1, 2, 'draft'),
(2, '2025-05-31 19:07:27', 'Perkembangan Artificial Intelligence di Era Digital 2025', 'perkembangan-artificial-intelligence-di-era-digital-2025', '<p>Artificial Intelligence (AI) telah mengalami perkembangan yang sangat pesat dalam beberapa tahun terakhir. Teknologi ini tidak lagi menjadi hal yang asing bagi kehidupan sehari-hari kita.</p>\r\n<p>Aplikasi AI dalam Kehidupan Sehari-hari</p>\r\n<p>Beberapa contoh penerapan AI yang dapat kita temui antara lain:</p>\r\n<p>• Asisten Virtual - Seperti Siri, Google Assistant, dan Alexa\r\n• Sistem Rekomendasi - Netflix, Spotify, dan platform e-commerce<br>\r\n• Kendaraan Otonom - Mobil self-driving yang sedang dikembangkan\r\n• Diagnosa Medis - AI untuk membantu dokter dalam diagnosis penyakit</p>\r\n<p>Dampak Positif AI</p>\r\n<p>AI memberikan banyak manfaat seperti memungkinkan otomatisasi tugas-tugas repetitif, meningkatkan efisiensi, dan membantu manusia dalam pengambilan keputusan yang lebih baik.</p>\r\n<p>Tantangan dan Masa Depan</p>\r\n<p>Meskipun memiliki banyak keuntungan, pengembangan AI juga menghadapi tantangan seperti:</p>\r\n<ol><li>Keamanan dan privasi data</li><li>Dampak terhadap lapangan kerja</li><li>Bias dalam algoritma</li><li>Regulasi dan etika penggunaan</li></ol>\r\n<p>Kesimpulan</p>\r\n<p>AI akan terus berkembang dan menjadi bagian integral dari kehidupan manusia. Penting bagi kita untuk memahami teknologi ini agar dapat memanfaatkannya secara optimal sambil meminimalkan risiko yang ada.</p>\r\n<p>Artikel ini ditulis untuk memberikan pemahaman dasar tentang perkembangan AI di era digital saat ini.</p><p><br></p>', 'fb67ab41a13f4cb3a26fd2a18001cfec.jpg', 2, 2, 'draft'),
(3, '2025-06-06 21:07:13', 'Manfaat Teknologi IoT dalam Kehidupan Sehari-hari', 'manfaat-teknologi-iot-dalam-kehidupan-sehari-hari', '<p data-start=\"223\" data-end=\"683\">Internet of Things (IoT) atau Internet untuk Segala adalah konsep di mana perangkat sehari-hari dapat saling terhubung melalui jaringan internet untuk bertukar data dan menjalankan fungsi otomatis. Teknologi ini semakin berkembang dan telah diterapkan dalam berbagai aspek kehidupan seperti rumah tangga, transportasi, pertanian, hingga industri manufaktur.</p>\r\n<p data-start=\"685\" data-end=\"991\">Contoh paling sederhana dari implementasi IoT adalah smart home. Dengan teknologi ini, pengguna dapat mengendalikan lampu, AC, kamera keamanan, hingga kunci pintu hanya dari smartphone. Misalnya, kita bisa mematikan lampu di rumah dari kantor atau membuka pintu untuk tamu meski sedang berada di luar kota.</p>\r\n<p data-start=\"993\" data-end=\"1294\">Di sektor pertanian, IoT membantu petani memantau kelembapan tanah, cuaca, dan kondisi tanaman secara real-time, sehingga keputusan irigasi dan pemupukan bisa lebih tepat. Di industri kesehatan, wearable device seperti smartwatch kini bisa memantau detak jantung, kadar oksigen, hingga kualitas tidur.</p>\r\n<p data-start=\"1296\" data-end=\"1662\">Namun, di balik kenyamanan yang ditawarkan, IoT juga menimbulkan tantangan baru, terutama terkait keamanan data dan privasi. Setiap perangkat yang terhubung ke internet berpotensi diretas jika tidak memiliki sistem keamanan yang baik. Oleh karena itu, pengguna dan pengembang IoT harus memperhatikan enkripsi data, pembaruan perangkat lunak, dan pengamanan jaringan.</p>\r\n<p data-start=\"1664\" data-end=\"1877\">Dengan pengembangan yang berkelanjutan dan kesadaran terhadap keamanannya, IoT akan terus membawa dampak positif dalam meningkatkan efisiensi, kenyamanan, dan produktivitas manusia dalam berbagai bidang kehidupan.</p>', 'post-3.jpg', 1, 2, 'publish'),
(4, '2025-06-06 21:16:41', 'Tips Belajar Efektif untuk Mahasiswa yang Sibuk', 'tips-belajar-efektif-untuk-mahasiswa-yang-sibuk', '<p data-start=\"1893\" data-end=\"2288\">Menjadi mahasiswa bukanlah hal mudah, terutama dengan beban kuliah, tugas, organisasi, dan kegiatan sosial yang padat. Belajar efektif adalah kunci untuk tetap berprestasi tanpa harus mengorbankan kesehatan mental. Ada beberapa strategi yang bisa diterapkan agar proses belajar lebih maksimal.</p>\r\n<p data-start=\"2290\" data-end=\"2517\">Pertama, buatlah jadwal belajar yang konsisten. Jangan menunda tugas hingga mendekati deadline. Gunakan aplikasi planner digital seperti Google Calendar atau Notion untuk mengatur waktu belajar, istirahat, dan kegiatan lainnya.</p>\r\n<p data-start=\"2519\" data-end=\"2749\">Kedua, kenali gaya belajar masing-masing. Apakah lebih nyaman belajar sambil mendengar musik, membuat mindmap, atau berdiskusi bersama teman? Menyesuaikan cara belajar dengan preferensi pribadi dapat meningkatkan pemahaman materi.</p>\r\n<p data-start=\"2751\" data-end=\"2988\">Ketiga, manfaatkan teknik Pomodoro—belajar selama 25 menit, lalu istirahat 5 menit. Teknik ini terbukti membantu menjaga fokus dan mencegah kelelahan mental. Setelah empat sesi Pomodoro, ambil istirahat lebih panjang sekitar 15-30 menit.</p>\r\n<p data-start=\"2990\" data-end=\"3238\">Selain itu, penting juga untuk aktif di kelas dan bertanya jika tidak paham. Mengajar kembali materi kepada orang lain juga efektif untuk memperdalam pemahaman. Jangan lupa untuk cukup tidur, makan sehat, dan olahraga ringan agar tubuh tetap bugar.</p>\r\n<p data-start=\"3240\" data-end=\"3444\">Belajar bukan hanya tentang kuantitas waktu yang digunakan, tetapi kualitas dan strategi yang diterapkan. Dengan manajemen waktu yang baik, mahasiswa bisa tetap aktif dan produktif tanpa merasa kewalahan.</p>', 'post-2.jpg', 1, 1, 'publish'),
(5, '2025-06-06 21:19:44', 'Pentingnya Menjaga Kesehatan Mental di Era Digital', 'pentingnya-menjaga-kesehatan-mental-di-era-digital', '<p data-start=\"1569\" data-end=\"1997\">Di era digital, kita terhubung dengan informasi dan sosial media hampir tanpa henti. Meskipun memberikan kemudahan, paparan yang berlebihan terhadap dunia digital dapat menimbulkan stres, kecemasan, bahkan depresi. Tekanan sosial, perbandingan diri, dan ekspektasi yang tinggi menjadi pemicu utama gangguan kesehatan mental.</p>\r\n<p data-start=\"1999\" data-end=\"2286\">Banyak orang merasa \"kurang\" karena membandingkan kehidupan mereka dengan postingan orang lain di media sosial. Padahal, apa yang ditampilkan sering kali bukanlah kenyataan sepenuhnya. Ditambah lagi, notifikasi yang terus-menerus masuk membuat otak tidak pernah benar-benar beristirahat.</p>\r\n<p data-start=\"2288\" data-end=\"2598\">Menjaga kesehatan mental bisa dimulai dengan mengatur waktu penggunaan gawai, misalnya dengan menerapkan digital detox. Selain itu, aktivitas fisik seperti olahraga dan meditasi terbukti membantu menurunkan tingkat stres. Menjaga hubungan sosial yang positif dan memiliki waktu untuk diri sendiri juga penting.</p>\r\n<p data-start=\"2600\" data-end=\"2900\">Jangan ragu untuk mencari bantuan profesional jika merasa kewalahan. Psikolog atau konselor dapat membantu memberikan perspektif dan strategi untuk mengatasi masalah yang dihadapi. Kesehatan mental sama pentingnya dengan kesehatan fisik, dan merawatnya adalah bentuk kepedulian terhadap diri sendiri.</p>', 'post-1.jpg', 1, 3, 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE `halaman` (
  `halaman_id` int(11) NOT NULL,
  `halaman_judul` text NOT NULL,
  `halaman_slug` varchar(255) NOT NULL,
  `halaman_konten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`halaman_id`, `halaman_judul`, `halaman_slug`, `halaman_konten`) VALUES
(1, 'Kontak Kami', 'kontak-kami', '<p><b>WhatsApp </b>: 089520937978</p><p><b>Email </b>: admin@gmail.com</p><p><b>Alamat</b> : Magelang</p>'),
(2, 'Layanan', 'layanan', '<p>CONTOH LAYANAN</p>'),
(3, 'Tentang Kami', 'tentang-kami', 'ini adalah tentang kami');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL,
  `kategori_slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`, `kategori_slug`) VALUES
(1, 'Pendidikan', 'pendidikan'),
(2, 'Teknologi', 'teknologi'),
(3, 'Kesehatan', 'kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `layanan_id` int(11) NOT NULL,
  `layanan_judul` varchar(255) NOT NULL,
  `layanan_slug` varchar(255) NOT NULL,
  `layanan_konten` text NOT NULL,
  `layanan_sampul` varchar(255) DEFAULT NULL,
  `layanan_tanggal` datetime DEFAULT current_timestamp(),
  `layanan_author` int(11) NOT NULL,
  `layanan_status` enum('publish','draft') DEFAULT 'publish'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`layanan_id`, `layanan_judul`, `layanan_slug`, `layanan_konten`, `layanan_sampul`, `layanan_tanggal`, `layanan_author`, `layanan_status`) VALUES
(15, 'Web Design', 'web-design', '<p data-start=\"168\" data-end=\"532\">Kami menawarkan layanan desain web yang mengedepankan estetika modern dan pengalaman pengguna yang intuitif. Desain kami dirancang untuk menarik perhatian audiens, mencerminkan identitas merek Anda, dan memudahkan navigasi pengguna. Dengan pendekatan yang menggabungkan kreativitas dan fungsionalitas, kami menciptakan tampilan visual yang memikat dan profesional.</p>\r\n<p data-start=\"534\" data-end=\"862\">Tim desainer kami memahami pentingnya konsistensi visual dan struktur informasi yang rapi. Oleh karena itu, setiap elemen dalam desain, mulai dari warna, tipografi, ikonografi, hingga tata letak, disusun secara strategis. Kami memastikan bahwa setiap halaman situs web memiliki pesan yang jelas dan mendukung tujuan bisnis Anda.</p>\r\n<p data-start=\"864\" data-end=\"1201\">Selain itu, kami juga memperhatikan tren desain terkini seperti minimalis, neumorphism, dan penggunaan animasi mikro yang tidak mengganggu. Ini akan membuat situs web Anda terasa modern dan relevan di tengah perkembangan digital yang cepat. Kami juga memberikan fleksibilitas desain agar mudah diperbarui atau dikembangkan di masa depan.</p>\r\n<p data-start=\"1203\" data-end=\"1496\">Desain kami tidak hanya cantik, tetapi juga ramah pengguna. Kami melakukan pengujian UX (user experience) untuk memastikan bahwa pengunjung dapat dengan mudah menemukan informasi yang mereka butuhkan dan melakukan tindakan yang Anda harapkan, seperti mengisi formulir atau melakukan pembelian.</p>\r\n<p data-start=\"1498\" data-end=\"1706\">Layanan ini cocok untuk berbagai sektor seperti bisnis, portofolio pribadi, organisasi, dan institusi pendidikan. Kami siap berkolaborasi dan menyesuaikan desain dengan visi serta nilai-nilai perusahaan Anda.</p>', 'web-design-technology-browsing-programming-concept.jpg', '2025-06-18 14:26:44', 2, 'draft'),
(16, 'Web Development', 'web-development', '<p data-start=\"1740\" data-end=\"2035\">Kami menyediakan layanan pengembangan web yang solid dan handal untuk membangun situs dengan performa tinggi dan mudah dikelola. Dengan dukungan teknologi terbaru seperti PHP, JavaScript, Laravel, CodeIgniter, dan database MySQL, kami menciptakan solusi yang sesuai dengan kebutuhan bisnis Anda.</p>\r\n<p data-start=\"2037\" data-end=\"2301\">Pengembangan dimulai dengan analisis kebutuhan Anda. Kami akan mendengarkan target audiens, fitur yang diinginkan, serta integrasi pihak ketiga seperti payment gateway, API, atau sistem informasi internal. Semua ini disusun menjadi rencana proyek yang terstruktur.</p>\r\n<p data-start=\"2303\" data-end=\"2565\">Kami memastikan kode yang kami tulis bersih, terdokumentasi, dan sesuai dengan standar industri. Hal ini akan memudahkan Anda saat melakukan pemeliharaan atau pengembangan lebih lanjut. Selain itu, kami juga menyediakan dokumentasi dan pelatihan jika diperlukan.</p>\r\n<p data-start=\"2567\" data-end=\"2828\">Aspek keamanan dan kecepatan sangat kami perhatikan. Kami mengimplementasikan praktik keamanan web terbaik untuk mencegah serangan seperti SQL Injection, XSS, dan CSRF. Kami juga mengoptimalkan performa dengan caching, lazy loading, dan teknik optimasi lainnya.</p>\r\n<p data-start=\"2830\" data-end=\"3085\">Layanan web development kami mencakup situs perusahaan, toko online (e-commerce), blog, portal berita, hingga sistem informasi berbasis web. Kami percaya bahwa teknologi harus menjadi alat yang mendukung pertumbuhan bisnis Anda secara efisien dan terukur.</p>', '12067696_4906459.jpg', '2025-06-18 14:26:44', 2, 'draft'),
(17, 'Photography', 'photography', '<p data-start=\"3115\" data-end=\"3368\">Layanan fotografi kami ditujukan untuk berbagai kebutuhan profesional, mulai dari promosi produk, dokumentasi acara, hingga pengambilan gambar untuk media sosial. Kami percaya bahwa sebuah gambar dapat menyampaikan pesan lebih kuat daripada seribu kata.</p>\r\n<p data-start=\"3370\" data-end=\"3653\">Kami memiliki tim fotografer berpengalaman yang siap menangkap momen terbaik dari setiap sudut. Baik itu dalam studio maupun di lapangan, kami membawa peralatan yang memadai untuk menghasilkan foto berkualitas tinggi. Pencahayaan, komposisi, dan editing menjadi perhatian utama kami.</p>\r\n<p data-start=\"3655\" data-end=\"3945\">Untuk kebutuhan bisnis, kami menyediakan sesi pemotretan produk (product shoot) dengan latar belakang putih atau suasana tematik. Ini sangat berguna untuk toko online, katalog, dan materi promosi. Kami juga menawarkan layanan food photography, fashion photography, dan interior photography.</p>\r\n<p data-start=\"3947\" data-end=\"4183\">Jika Anda memiliki acara penting seperti seminar, pernikahan, atau peluncuran produk, kami siap mendokumentasikannya secara profesional. Hasil akhir dapat disesuaikan dalam bentuk cetak, digital, atau galeri daring yang mudah dibagikan.</p>\r\n<p data-start=\"4185\" data-end=\"4427\">Kami percaya bahwa setiap foto yang dihasilkan harus memiliki cerita. Maka dari itu, kami selalu mendiskusikan konsep terlebih dahulu dengan klien untuk memastikan bahwa hasil akhirnya sesuai dengan harapan dan tujuan promosi yang diinginkan.</p>', '24644548_Huge_camera_and_tiny_people_taking_pictures.jpg', '2025-06-18 14:26:44', 2, 'draft'),
(18, 'Responsive Design', 'responsive-design', '<p data-start=\"120\" data-end=\"422\">Di era digital saat ini, pengguna mengakses situs web dari berbagai jenis perangkat—mulai dari komputer desktop, laptop, tablet, hingga smartphone. Oleh karena itu, kami menyediakan layanan <strong data-start=\"310\" data-end=\"331\">Responsive Design</strong> yang memastikan tampilan situs web Anda tetap optimal dan konsisten di semua ukuran layar.</p>\r\n<p data-start=\"424\" data-end=\"691\">Dengan pendekatan desain responsif, layout situs akan menyesuaikan secara otomatis tanpa kehilangan fungsionalitas atau estetika. Kami menggunakan teknik CSS grid, flexbox, dan media queries untuk membangun struktur yang fleksibel dan adaptif terhadap resolusi layar.</p>\r\n<p data-start=\"693\" data-end=\"972\">Manfaat utama dari responsive design adalah peningkatan pengalaman pengguna. Ketika pengunjung merasa nyaman menjelajah website Anda, mereka cenderung tinggal lebih lama, menjelajahi lebih banyak halaman, dan melakukan interaksi seperti mengisi formulir atau melakukan pembelian.</p>\r\n<p data-start=\"974\" data-end=\"1251\">Selain dari sisi pengguna, desain responsif juga berdampak besar pada performa SEO (Search Engine Optimization). Google secara eksplisit merekomendasikan responsive design sebagai standar karena membantu meningkatkan kecepatan situs dan mengurangi rasio pentalan (bounce rate).</p>\r\n<p data-start=\"1253\" data-end=\"1490\">Kami menguji situs di berbagai perangkat dan browser sebelum peluncuran untuk memastikan kompatibilitas penuh. Dengan layanan ini, Anda tak perlu membuat versi terpisah untuk mobile—cukup satu situs yang responsif, cepat, dan fungsional.</p>', 'work-6.jpg', '2025-06-18 14:26:44', 2, 'publish'),
(19, 'Graphic Design', 'graphic-design', '<p data-start=\"1524\" data-end=\"1752\">Visual yang kuat adalah kunci dalam membangun citra merek yang mudah dikenali. Layanan <strong data-start=\"1611\" data-end=\"1629\">Graphic Design</strong> kami membantu Anda menciptakan desain visual yang komunikatif dan estetis, sesuai dengan nilai dan tujuan perusahaan Anda.</p>\r\n<p data-start=\"1754\" data-end=\"1997\">Kami mengerjakan berbagai elemen desain mulai dari logo, kartu nama, brosur, banner digital, konten media sosial, hingga desain kemasan produk. Setiap desain dibuat secara orisinal berdasarkan identitas brand dan target audiens yang Anda tuju.</p>\r\n<p data-start=\"1999\" data-end=\"2252\">Tim desainer kami memiliki keahlian dalam memadukan warna, tipografi, dan layout agar pesan yang ingin disampaikan dapat ditangkap dengan cepat oleh pemirsa. Kami juga mengikuti perkembangan tren desain global agar hasil akhir tetap relevan dan menarik.</p>\r\n<p data-start=\"2254\" data-end=\"2478\">Dalam proses pengerjaan, kami memprioritaskan komunikasi dua arah. Klien akan diberikan beberapa opsi konsep desain untuk dipilih, dan kami terbuka terhadap revisi selama proses berlangsung hingga hasilnya sesuai ekspektasi.</p>\r\n<p data-start=\"2480\" data-end=\"2747\">Kami percaya bahwa desain yang baik tidak hanya indah secara visual, tetapi juga memiliki fungsi yang kuat untuk menyampaikan pesan dan membangun kepercayaan konsumen. Karena itu, layanan ini sangat cocok untuk kebutuhan branding, promosi, dan presentasi bisnis Anda.</p>', 'work-5.jpg', '2025-06-18 14:26:44', 2, 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `link_facebook` varchar(255) NOT NULL,
  `link_twitter` varchar(255) NOT NULL,
  `link_instagram` varchar(255) NOT NULL,
  `link_github` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`nama`, `deskripsi`, `logo`, `link_facebook`, `link_twitter`, `link_instagram`, `link_github`) VALUES
('Vanlybakery', 'Webnya Aneka Kue', 'logo_1752159283.jpg', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(255) NOT NULL,
  `pengguna_email` varchar(255) NOT NULL,
  `pengguna_username` varchar(255) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_level` enum('admin','penulis','','') NOT NULL,
  `pengguna_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_email`, `pengguna_username`, `pengguna_password`, `pengguna_level`, `pengguna_status`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '0192023a7bbd73250516f069df18b500', 'admin', 1),
(2, 'Sugeng Rahayu', 'suger@gmail.com', 'sugengrahayu', '6c62460ad1e6a9a106a8debb80e2f07e', 'penulis', 1),
(3, 'tompel surempel', 'tompel@surempel.com', 'tomtom', '390ad2be3720803485d866b1d1a8e143', 'penulis', 1);

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `portofolio_id` int(11) NOT NULL,
  `portofolio_judul` varchar(255) NOT NULL,
  `portofolio_slug` varchar(255) NOT NULL,
  `portofolio_konten` text NOT NULL,
  `portofolio_kategori` varchar(100) NOT NULL,
  `portofolio_tahun` int(4) NOT NULL,
  `portofolio_client` varchar(255) NOT NULL,
  `portofolio_durasi` varchar(50) NOT NULL,
  `portofolio_sampul` varchar(255) DEFAULT NULL,
  `portofolio_author` int(11) NOT NULL,
  `portofolio_status` enum('publish','draft') NOT NULL DEFAULT 'draft',
  `portofolio_tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`portofolio_id`, `portofolio_judul`, `portofolio_slug`, `portofolio_konten`, `portofolio_kategori`, `portofolio_tahun`, `portofolio_client`, `portofolio_durasi`, `portofolio_sampul`, `portofolio_author`, `portofolio_status`, `portofolio_tanggal`) VALUES
(2, 'Website Toko Online Baju', 'website-toko-online-baju', '<p>Website ini dirancang untuk memudahkan UMKM menjual produk baju secara daring, dengan fitur keranjang, pembayaran, dan manajemen stok.</p>', 'Toko Online', 2025, 'Butik Ibu Dewi', '1 Bulan', 'post-3.jpg', 1, 'publish', '2025-06-21 10:00:00'),
(3, 'Aplikasi Kasir Sederhana', 'aplikasi-kasir-sederhana', '<p>Aplikasi ini digunakan oleh kasir di warung kecil untuk mencatat transaksi harian, menghitung stok barang, dan membuat laporan penjualan.</p>', 'Aplikasi Desktop', 2024, 'Warung Sembako Pak Haji', '3 Minggu', 'post-2.jpg', 1, 'publish', '2025-06-21 10:05:00'),
(4, 'Company Profile Digital', 'company-profile-digital', '<p>Proyek ini bertujuan membuat halaman profil perusahaan yang menarik dan profesional untuk keperluan branding perusahaan.</p>', 'Company Profile', 2023, 'CV Maju Terus', '2 Minggu', 'post-1.jpg', 1, 'publish', '2025-06-21 10:10:00'),
(5, 'Website Reservasi Klinik', 'website-reservasi-klinik', '<p>Aplikasi ini membantu pasien dalam melakukan reservasi online di klinik, melihat jadwal dokter, dan menerima notifikasi otomatis.</p>', 'Website Layanan', 2025, 'Klinik Sehat Sentosa', '3 Minggu', 'post-2.jpg', 1, 'publish', '2025-06-21 10:15:00'),
(6, 'Landing Page Sekolah', 'landing-page-sekolah', '<p>Landing page ini dirancang untuk menampilkan informasi profil sekolah, program unggulan, dan formulir pendaftaran online.</p>', 'Landing Page', 2025, 'SMP Harapan Bangsa', '2 Minggu', 'post-3.jpg', 1, 'publish', '2025-06-21 10:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `produk_nama` varchar(100) NOT NULL,
  `produk_kategori` varchar(50) DEFAULT NULL,
  `produk_harga` decimal(12,2) NOT NULL,
  `produk_pembuatan` int(11) DEFAULT NULL COMMENT 'Lama pembuatan dalam hari',
  `produk_keterangan` text DEFAULT NULL,
  `produk_foto` varchar(100) DEFAULT NULL,
  `produk_status` enum('aktif','nonaktif') DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `produk_nama`, `produk_kategori`, `produk_harga`, `produk_pembuatan`, `produk_keterangan`, `produk_foto`, `produk_status`) VALUES
(14, 'Bolu ketan hitam isi keju', 'Cake', 75000.00, 10, 'Bolu ketan hitam dengan isian keju', 'produk_1752155221.jpeg', 'aktif'),
(15, 'Bento cake', 'Cake', 35000.00, 10, 'Kue Bento kecil yang lucu dan lezat', 'produk_1752155248.jpeg', 'aktif'),
(16, 'Boucake 14cm', 'Cake', 90000.00, 10, 'Bouquet cake ukuran 14cm', 'produk_1752155290.jpeg', 'aktif'),
(17, 'Tier cake 18cm + 14cm + custom topper', 'Cake', 210000.00, 10, 'Tier cake 2 tingkat dengan custom topper', 'produk_1752155312.jpeg', 'aktif'),
(18, 'Cupcake', 'Cupcake', 10000.00, 20, 'Cupcake manis dan lembut', 'produk_1752155328.jpeg', 'aktif'),
(19, 'Tier cake 16cm + 12cm', 'Cake', 180000.00, 10, 'Tier cake dua lapis ukuran 16cm dan 12cm', 'produk_1752155342.jpeg', 'aktif'),
(20, 'Bento cake + cupcake', 'Paket', 110000.00, 5, 'Paket Bento cake dan cupcake', 'produk_1752155546.jpeg', 'aktif'),
(21, 'Tier cake 16cm + 12cm karakter', 'Cake', 140000.00, 5, 'Tier cake dengan karakter lucu', 'produk_1752155519.jpeg', 'aktif'),
(22, 'Brownies tower', 'Brownies', 65000.00, 8, 'Brownies disusun bertingkat seperti menara', 'produk_1752155495.jpeg', 'aktif'),
(23, 'Boucake 16cm', 'Cake', 110000.00, 10, 'Bouquet cake ukuran 16cm', 'produk_1752155470.jpeg', 'aktif'),
(24, 'Twins cake 16cm', 'Cake', 135000.00, 6, 'Kue kembar ukuran 16cm', 'produk_1752155448.jpeg', 'aktif'),
(25, 'Birthday cake karakter 16cm', 'Cake', 120000.00, 8, 'Kue ulang tahun karakter ukuran 16cm', 'produk_1752155421.jpeg', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(11) NOT NULL,
  `testimonial_nama` varchar(100) NOT NULL,
  `testimonial_foto` varchar(255) DEFAULT NULL,
  `testimonial_konten` text NOT NULL,
  `testimonial_status` enum('publish','draft') DEFAULT 'publish',
  `testimonial_tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `testimonial_nama`, `testimonial_foto`, `testimonial_konten`, `testimonial_status`, `testimonial_tanggal`) VALUES
(1, 'Ahmad Rahmat', 'testimonial_1751889994.png', 'Layanan sangat memuaskan dan cepat!', 'publish', '2025-07-07'),
(2, 'Dewi Lestari', 'testimonial_1751889994.png', 'Website-nya keren dan mudah digunakan!', 'publish', '2025-07-07'),
(3, 'Budi Santoso', 'testimonial_1751889994.png', 'Sangat terbantu dengan layanan dari tim ini.', 'draft', '2025-07-07'),
(4, 'Siti Aminah', 'testimonial_1751889994.png', 'Akan merekomendasikan ke teman-teman saya!', 'publish', '2025-07-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`artikel_id`);

--
-- Indexes for table `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`halaman_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`layanan_id`),
  ADD KEY `fk_layanan_author` (`layanan_author`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`portofolio_id`),
  ADD KEY `fk_portofolio_author` (`portofolio_author`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `artikel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `halaman`
--
ALTER TABLE `halaman`
  MODIFY `halaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `layanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `portofolio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `fk_layanan_author` FOREIGN KEY (`layanan_author`) REFERENCES `pengguna` (`pengguna_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD CONSTRAINT `fk_portofolio_author` FOREIGN KEY (`portofolio_author`) REFERENCES `pengguna` (`pengguna_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
