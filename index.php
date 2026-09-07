<?php
require_once 'config.php';
require_once 'library/pagination.php';
require_once 'koneksi.php';

$halaman_aktif = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
if ($halaman_aktif < 1) $halaman_aktif = 1;

$keyword = isset($_GET['q']) ? trim($_GET['q']) : '';

if ($keyword != '') {
    $keyword_safe = mysqli_real_escape_string($koneksi, $keyword);
    $query_total = "SELECT COUNT(*) AS total FROM artikel WHERE judul LIKE '%$keyword_safe%' OR isi LIKE '%$keyword_safe%'";
} else {
    $query_total = "SELECT COUNT(*) AS total FROM artikel";
}

$hasil_total   = mysqli_query($koneksi, $query_total);
$data_total    = mysqli_fetch_assoc($hasil_total);
$total_artikel = (int) $data_total['total'];

$total_halaman = hitung_total_halaman($total_artikel, ARTIKEL_PER_HALAMAN);
$offset        = hitung_offset($halaman_aktif, ARTIKEL_PER_HALAMAN);

if ($keyword != '') {
    $keyword_safe = mysqli_real_escape_string($koneksi, $keyword);
    $query_artikel = "SELECT id_artikel, judul, isi, gambar, tanggal
                      FROM artikel
                      WHERE judul LIKE '%$keyword_safe%' OR isi LIKE '%$keyword_safe%'
                      ORDER BY tanggal DESC, id_artikel DESC
                      LIMIT $offset, " . ARTIKEL_PER_HALAMAN;
} else {
    $query_artikel = "SELECT id_artikel, judul, isi, gambar, tanggal
                      FROM artikel
                      ORDER BY tanggal DESC, id_artikel DESC
                      LIMIT $offset, " . ARTIKEL_PER_HALAMAN;
}

$hasil_artikel = mysqli_query($koneksi, $query_artikel);
$base_url_pagination = 'index.php' . ($keyword != '' ? '?q=' . urlencode($keyword) . '&halaman' : '?halaman');

render_page_head('Beranda');
?>
    <header class="main-header">
        <div class="header-container">
            <div class="logo"><?php echo APP_NAME; ?></div>
            <button type="button" class="nav-toggle" aria-label="Buka menu" aria-expanded="false" aria-controls="mainNav">...</button>
            <nav id="mainNav" class="main-nav">
                <a href="index.php">Beranda</a>
                <form action="index.php" method="GET" class="nav-search">
                    <input type="text" name="q" placeholder="Cari artikel..." value="<?php echo htmlspecialchars($keyword); ?>">
                    <button type="submit" class="btn btn-outline">Cari</button>
                </form>
                <a href="login.php" class="btn btn-primary">Login Admin</a>
            </nav>
        </div>
    </header>

    <div class="container">
        <?php if ($keyword != ''): ?>
            <div class="page-title-bar">
                <h1>Hasil pencarian: "<?php echo htmlspecialchars($keyword); ?>"</h1>
                <a href="index.php" class="btn btn-outline">Semua Artikel</a>
            </div>
        <?php else: ?>
            <div class="page-title-bar">
                <h1>Artikel Terbaru</h1>
            </div>
        <?php endif; ?>

        <div class="artikel-grid">
            <?php if (mysqli_num_rows($hasil_artikel) > 0): ?>
                <?php while ($artikel = mysqli_fetch_assoc($hasil_artikel)): ?>
                    <?php
                        $isi_bersih = strip_tags($artikel['isi']);
                        $cuplikan   = substr($isi_bersih, 0, PANJANG_CUPLIKAN);
                        if (strlen($isi_bersih) > PANJANG_CUPLIKAN) $cuplikan .= '...';
                        $path_gambar = !empty($artikel['gambar'])
                            ? UPLOAD_DIR . $artikel['gambar']
                            : 'assets/images/artikel/default.png';
                    ?>
                    <div class="artikel-card">
                        <img src="<?php echo htmlspecialchars($path_gambar); ?>" alt="<?php echo htmlspecialchars($artikel['judul']); ?>" class="artikel-thumbnail">
                        <div class="artikel-card-body">
                            <h3><?php echo htmlspecialchars($artikel['judul']); ?></h3>
                            <p class="artikel-tanggal"><?php echo date('d-m-Y', strtotime($artikel['tanggal'])); ?></p>
                            <p class="artikel-cuplikan"><?php echo htmlspecialchars($cuplikan); ?></p>
                            <div class="artikel-actions">
                                <a href="artikel_detail.php?id=<?php echo $artikel['id_artikel']; ?>" class="btn btn-outline">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="empty-state">
                    <?php echo $keyword != '' ? 'Tidak ada artikel yang cocok.' : 'Belum ada artikel tersedia.'; ?>
                </p>
            <?php endif; ?>
        </div>

        <?php tampilkan_navigasi_pagination($halaman_aktif, $total_halaman, $base_url_pagination); ?>
    </div>

<?php render_page_footer(); ?>