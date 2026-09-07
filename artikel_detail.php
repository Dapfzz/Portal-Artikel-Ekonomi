<?php
require_once 'config.php';
require_once 'library/pagination.php';
require_once 'koneksi.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id_artikel = (int) $_GET['id'];
$is_admin   = isset($_SESSION['username']);

$query = "SELECT id_artikel, judul, isi, gambar, tanggal FROM artikel WHERE id_artikel = $id_artikel";
$hasil = mysqli_query($koneksi, $query);

if (!$hasil || mysqli_num_rows($hasil) == 0) {
    header("Location: index.php");
    exit;
}

$artikel = mysqli_fetch_assoc($hasil);

$path_gambar = !empty($artikel['gambar'])
    ? UPLOAD_DIR . $artikel['gambar']
    : '';

render_page_head($artikel['judul']);
?>
    <header class="main-header">
        <div class="header-container">
            <div class="logo"><?php echo APP_NAME; ?></div>
            <button type="button" class="nav-toggle" aria-label="Buka menu" aria-expanded="false" aria-controls="mainNav">...</button>
            <nav id="mainNav" class="main-nav">
                <?php if ($is_admin): ?>
                    <a href="dashboard.php">Dashboard</a>
                    <a href="artikel_list.php">Daftar Artikel</a>
                    <a href="artikel_tambah.php">Tambah Artikel</a>
                    <a href="#" id="btnLogout" data-href="logout.php">Logout</a>
                <?php else: ?>
                    <a href="index.php">Beranda</a>
                    <a href="login.php" class="btn btn-primary">Login Admin</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <div class="container">
        <a href="<?php echo $is_admin ? 'artikel_list.php' : 'index.php'; ?>" class="btn btn-outline btn-back">&laquo; Kembali</a>

        <article class="artikel-detail">
            <h1><?php echo htmlspecialchars($artikel['judul']); ?></h1>
            <p class="artikel-tanggal">Dipublikasikan: <?php echo date('d-m-Y', strtotime($artikel['tanggal'])); ?></p>

            <?php if ($path_gambar != ''): ?>
                <img src="<?php echo htmlspecialchars($path_gambar); ?>" alt="<?php echo htmlspecialchars($artikel['judul']); ?>" class="artikel-detail-img">
            <?php endif; ?>

            <div class="artikel-isi">
                <?php echo nl2br(htmlspecialchars($artikel['isi'])); ?>
            </div>

            <?php if ($is_admin): ?>
                <div class="artikel-actions" style="margin-top:1.5rem;">
                    <a href="artikel_hapus.php?id=<?php echo $artikel['id_artikel']; ?>" class="btn btn-danger btn-hapus">Hapus Artikel</a>
                </div>
            <?php endif; ?>
        </article>
    </div>

<?php render_page_footer(); ?>