<?php
require_once 'config.php';
require_once 'library/pagination.php';

require_login();

require_once 'koneksi.php';

$query_total = "SELECT COUNT(*) AS total FROM artikel";
$hasil_total = mysqli_query($koneksi, $query_total);
$data_total  = mysqli_fetch_assoc($hasil_total);
$total_artikel = $data_total['total'];

$query_terbaru = "SELECT judul, tanggal FROM artikel ORDER BY tanggal DESC, id_artikel DESC LIMIT 1";
$hasil_terbaru = mysqli_query($koneksi, $query_terbaru);
$artikel_terbaru = $hasil_terbaru && mysqli_num_rows($hasil_terbaru) > 0
    ? mysqli_fetch_assoc($hasil_terbaru)
    : null;

render_page_head('Dashboard');
render_admin_header();
?>

    <div class="container">
        <div class="page-title-bar">
            <h1>Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
            <div class="page-actions">
                <a href="artikel_tambah.php" class="btn btn-primary">Tambah Artikel</a>
                <a href="artikel_list.php" class="btn btn-secondary">Lihat Artikel</a>
            </div>
        </div>

        <div class="dashboard-cards">
            <div class="card stat-card">
                <span class="card-label">Total Artikel</span>
                <p class="card-number"><?php echo $total_artikel; ?></p>
                <p class="card-note">Artikel tersimpan di portal</p>
            </div>
            <div class="card info-card">
                <span class="card-label">Artikel Terbaru</span>
                <?php if ($artikel_terbaru): ?>
                    <h3><?php echo htmlspecialchars($artikel_terbaru['judul']); ?></h3>
                    <p class="card-note"><?php echo date('d-m-Y', strtotime($artikel_terbaru['tanggal'])); ?></p>
                <?php else: ?>
                    <h3>Belum ada artikel</h3>
                    <p class="card-note">Mulai dengan menambahkan artikel pertama.</p>
                <?php endif; ?>
            </div>
            <div class="card info-card">
                <span class="card-label">Aksi Cepat</span>
                <h3>Publikasikan konten baru</h3>
                <p class="card-note">Lengkapi judul, tanggal, isi, dan gambar artikel.</p>
                <a href="artikel_tambah.php" class="btn btn-outline">Buat Artikel</a>
            </div>
        </div>
    </div>

<?php render_page_footer(); ?>
