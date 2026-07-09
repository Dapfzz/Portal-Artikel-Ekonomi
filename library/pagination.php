<?php
function hitung_total_halaman($total_data, $per_halaman) {
    return (int) ceil($total_data / $per_halaman);
}

function hitung_offset($halaman_aktif, $per_halaman) {
    if ($halaman_aktif < 1) {
        $halaman_aktif = 1;
    }
    return ($halaman_aktif - 1) * $per_halaman;
}

function tampilkan_navigasi_pagination($halaman_aktif, $total_halaman, $base_url) {
    if ($total_halaman <= 1) {
        return;
    }

    echo '<div class="pagination">';

    if ($halaman_aktif > 1) {
        echo '<a href="' . $base_url . '?halaman=' . ($halaman_aktif - 1) . '" class="page-link">&laquo; Sebelumnya</a>';
    }

    for ($i = 1; $i <= $total_halaman; $i++) {
        $kelas_aktif = ($i == $halaman_aktif) ? 'active' : '';
        echo '<a href="' . $base_url . '?halaman=' . $i . '" class="page-link ' . $kelas_aktif . '">' . $i . '</a>';
    }

    if ($halaman_aktif < $total_halaman) {
        echo '<a href="' . $base_url . '?halaman=' . ($halaman_aktif + 1) . '" class="page-link">Selanjutnya &raquo;</a>';
    }

    echo '</div>';
}

function require_login() {
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit;
    }
}

function redirect_if_logged_in() {
    if (isset($_SESSION['username'])) {
        header("Location: dashboard.php");
        exit;
    }
}

function render_page_head($title, $body_class = '') {
    $body_class_attr = $body_class !== '' ? ' class="' . htmlspecialchars($body_class) . '"' : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?> - <?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="assets/css/style.css?v=4">
</head>
<body<?php echo $body_class_attr; ?>>
<?php
}

function render_admin_header() {
?>
    <header class="main-header">
        <div class="header-container">
            <div class="logo"><?php echo APP_NAME; ?></div>
            <button type="button" class="nav-toggle" aria-label="Buka menu" aria-expanded="false" aria-controls="mainNav">...</button>
            <nav id="mainNav" class="main-nav">
                <a href="dashboard.php">Dashboard</a>
                <a href="artikel_list.php">Daftar Artikel</a>
                <a href="artikel_tambah.php">Tambah Artikel</a>
                <a href="#" id="btnLogout" data-href="logout.php">Logout</a>
            </nav>
        </div>
    </header>
<?php
}

function render_page_footer($show_footer = true) {
    if ($show_footer) {
?>
    <footer class="main-footer">
        <p>&copy; <?php echo date('Y'); ?> <?php echo APP_NAME; ?>. Dibuat untuk Uji Kompetensi Junior Web Programmer.</p>
    </footer>
<?php
    }
?>
    <script src="assets/js/script.js?v=3"></script>
</body>
</html>
<?php
}
?>