<?php
require_once 'config.php';
require_once 'library/pagination.php';

require_login();

require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $judul = mysqli_real_escape_string($koneksi, trim($_POST['judul']));
    $isi   = mysqli_real_escape_string($koneksi, trim($_POST['isi']));
    $tanggal_input = isset($_POST['tanggal']) ? trim($_POST['tanggal']) : '';
    $tanggal = mysqli_real_escape_string($koneksi, $tanggal_input);

    if ($judul == '' || $tanggal == '' || $isi == '') {
        $_SESSION['form_error'] = "Judul, tanggal, dan isi artikel wajib diisi.";
        header("Location: artikel_tambah.php");
        exit;
    }

    $tanggal_valid = DateTime::createFromFormat('Y-m-d', $tanggal);
    if (!$tanggal_valid || $tanggal_valid->format('Y-m-d') !== $tanggal) {
        $_SESSION['form_error'] = "Format tanggal artikel tidak valid.";
        header("Location: artikel_tambah.php");
        exit;
    }

    if (!isset($_FILES['gambar']) || $_FILES['gambar']['error'] !== 0) {
        $_SESSION['form_error'] = "Gambar artikel wajib diunggah.";
        header("Location: artikel_tambah.php");
        exit;
    }

    $ekstensi_diizinkan = array('jpg', 'jpeg', 'png');
    $nama_asli   = $_FILES['gambar']['name'];
    $ekstensi    = strtolower(pathinfo($nama_asli, PATHINFO_EXTENSION));
    $ukuran_file = $_FILES['gambar']['size'];

    if (!in_array($ekstensi, $ekstensi_diizinkan)) {
        $_SESSION['form_error'] = "Format gambar harus JPG, JPEG, atau PNG.";
        header("Location: artikel_tambah.php");
        exit;
    }

    if ($ukuran_file > 2 * 1024 * 1024) {
        $_SESSION['form_error'] = "Ukuran gambar maksimal 2MB.";
        header("Location: artikel_tambah.php");
        exit;
    }

    $nama_file_baru = 'artikel_' . time() . '_' . rand(1000, 9999) . '.' . $ekstensi;
    $path_tujuan    = UPLOAD_DIR . $nama_file_baru;

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $path_tujuan)) {

        $query = "INSERT INTO artikel (judul, isi, gambar, tanggal) 
                  VALUES ('$judul', '$isi', '$nama_file_baru', '$tanggal')";

        if (mysqli_query($koneksi, $query)) {
            $_SESSION['pesan_sukses'] = "Artikel berhasil ditambah.";
            header("Location: artikel_list.php");
            exit;
        } else {
            $_SESSION['form_error'] = "Gagal menambahkan artikel ke database: " . mysqli_error($koneksi);
            header("Location: artikel_tambah.php");
            exit;
        }
    } else {
        $_SESSION['form_error'] = "Gagal mengunggah gambar. Periksa folder assets/images/artikel/.";
        header("Location: artikel_tambah.php");
        exit;
    }

} else {
    header("Location: artikel_tambah.php");
    exit;
}
?>
