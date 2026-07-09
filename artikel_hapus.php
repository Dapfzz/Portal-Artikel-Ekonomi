<?php

require_once 'config.php';
require_once 'library/pagination.php';

require_login();

require_once 'koneksi.php';


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['form_error'] = "ID artikel tidak valid.";
    header("Location: artikel_list.php");
    exit;
}

$id_artikel = (int) $_GET['id'];

$query_cek = "SELECT gambar FROM artikel WHERE id_artikel = $id_artikel";
$hasil_cek = mysqli_query($koneksi, $query_cek);

if ($hasil_cek && mysqli_num_rows($hasil_cek) > 0) {
    $data_artikel = mysqli_fetch_assoc($hasil_cek);
    $nama_gambar  = $data_artikel['gambar'];

    $query_hapus = "DELETE FROM artikel WHERE id_artikel = $id_artikel";

    if (mysqli_query($koneksi, $query_hapus)) {

        $path_gambar = UPLOAD_DIR . $nama_gambar;
        if (!empty($nama_gambar) && file_exists($path_gambar)) {
            unlink($path_gambar);
        }

        $_SESSION['pesan_sukses'] = "Artikel berhasil dihapus.";
    } else {
        $_SESSION['form_error'] = "Gagal menghapus artikel: " . mysqli_error($koneksi);
    }
} else {
    $_SESSION['form_error'] = "Artikel tidak ditemukan.";
}

header("Location: artikel_list.php");
exit;
?>
