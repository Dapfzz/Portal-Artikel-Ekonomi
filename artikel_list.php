<?php

require_once 'config.php';
require_once 'library/pagination.php';

require_login();

require_once 'koneksi.php';

$halaman_aktif = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
if ($halaman_aktif < 1) {
    $halaman_aktif = 1;
}

$query_total   = "SELECT COUNT(*) AS total FROM artikel";
$hasil_total   = mysqli_query($koneksi, $query_total);
$data_total    = mysqli_fetch_assoc($hasil_total);
$total_artikel = (int) $data_total['total'];

$total_halaman = hitung_total_halaman($total_artikel, ARTIKEL_PER_HALAMAN);
$offset        = hitung_offset($halaman_aktif, ARTIKEL_PER_HALAMAN);

$query_artikel = "SELECT id_artikel, judul, isi, gambar, tanggal 
                   FROM artikel 
                   ORDER BY tanggal DESC, id_artikel DESC 
                   LIMIT $offset, " . ARTIKEL_PER_HALAMAN;
$hasil_artikel = mysqli_query($koneksi, $query_artikel);

render_page_head('Daftar Artikel');
render_admin_header();
?>

    <div class="container">
        <div class="page-title-bar">
            <h1>Daftar Artikel</h1>
            <a href="artikel_tambah.php" class="btn btn-primary">+ Tambah Artikel</a>
        </div>

        <?php if (isset($_SESSION['pesan_sukses'])): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($_SESSION['pesan_sukses']); ?></div>
            <?php unset($_SESSION['pesan_sukses']); ?>
        <?php endif; ?>

        <div class="artikel-grid">
            <?php if (mysqli_num_rows($hasil_artikel) > 0): ?>
                <?php while ($artikel = mysqli_fetch_assoc($hasil_artikel)): ?>
                    <?php
                        $isi_bersih = strip_tags($artikel['isi']);
                        $cuplikan   = substr($isi_bersih, 0, PANJANG_CUPLIKAN);
                        if (strlen($isi_bersih) > PANJANG_CUPLIKAN) {
                            $cuplikan .= '...';
                        }

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
                                <a href="artikel_detail.php?id=<?php echo $artikel['id_artikel']; ?>" class="btn btn-outline">Read More</a>
                                <a href="artikel_hapus.php?id=<?php echo $artikel['id_artikel']; ?>" class="btn btn-danger btn-hapus">Hapus</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="empty-state">Belum ada artikel. Silakan tambah artikel baru.</p>
            <?php endif; ?>
        </div>

        <?php tampilkan_navigasi_pagination($halaman_aktif, $total_halaman, 'artikel_list.php'); ?>
    </div>

<?php render_page_footer(); ?>
