# Dokumentasi Portal Artikel Ekonomi

## Deskripsi

Portal Artikel Ekonomi adalah aplikasi web sederhana berbasis PHP dan MySQL untuk mengelola artikel. Admin dapat login, melihat dashboard, menambah artikel, melihat daftar artikel dengan pagination, membaca detail artikel, dan menghapus artikel.

## Teknologi

- PHP
- MySQL/MariaDB
- HTML
- CSS
- JavaScript

## Struktur Folder

```text
project-web-jwp/
├── assets/
│   ├── css/style.css
│   ├── js/script.js
│   └── images/artikel/
├── database/
│   └── db_portal.sql
├── library/
│   └── pagination.php
├── artikel_detail.php
├── artikel_hapus.php
├── artikel_list.php
├── artikel_simpan.php
├── artikel_tambah.php
├── config.php
├── dashboard.php
├── index.php
├── koneksi.php
├── login.php
└── logout.php
```

## Konfigurasi

Konfigurasi utama ada di `config.php`.

- `APP_NAME`: nama aplikasi.
- `UPLOAD_DIR`: lokasi penyimpanan gambar artikel.
- `ARTIKEL_PER_HALAMAN`: jumlah artikel per halaman.
- `PANJANG_CUPLIKAN`: panjang ringkasan artikel.

Konfigurasi database ada di `koneksi.php`.

```php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_namasiswa";
```

## Instalasi Database

1. Buka phpMyAdmin.
2. Import file `database/db_portal.sql`.
3. Pastikan database `db_namasiswa` berhasil dibuat.
4. Pastikan tabel `users` dan `artikel` tersedia.

## Akun Login

```text
Username: admin
Password: admin
```

Password pada database disimpan dalam bentuk MD5.

## Cara Menjalankan

Jika menggunakan Laragon, simpan folder proyek di:

```text
C:\laragon\www\project-web-jwp
```

Lalu akses melalui browser:

```text
http://localhost/project-web-jwp/
```

Alternatif dengan PHP built-in server:

```bash
php -S 127.0.0.1:8000
```

Lalu buka:

```text
http://127.0.0.1:8000
```

## Fitur

- Login admin.
- Dashboard ringkasan artikel.
- Tambah artikel dengan judul, isi, tanggal, dan gambar.
- Validasi form artikel di sisi client dan server.
- Upload gambar JPG, JPEG, atau PNG maksimal 2MB.
- Daftar artikel dengan pagination.
- Detail artikel.
- Hapus artikel beserta file gambar.
- Navbar responsif dengan tombol titik tiga pada tampilan mobile.

## Library dan Komponen

### `library/auth.php`

Berisi fungsi autentikasi agar kode pengecekan session tidak berulang.

- `require_login()`: membatasi halaman agar hanya bisa diakses setelah login.
- `redirect_if_logged_in()`: mengarahkan user yang sudah login dari halaman login ke dashboard.

### `library/layout.php`

Berisi komponen layout yang dipakai ulang.

- `render_page_head()`: membuat struktur awal HTML, title, CSS, dan tag body.
- `render_admin_header()`: membuat header admin dan navbar.
- `render_page_footer()`: membuat footer, script JS, dan penutup HTML.

### `library/pagination.php`

Berisi fungsi pagination.

- `hitung_total_halaman()`
- `hitung_offset()`
- `tampilkan_navigasi_pagination()`

## Catatan Pengurangan Duplikasi Kode

Kode yang sebelumnya berulang sudah dipindahkan ke helper:

- Cek login admin dipusatkan di `library/auth.php`.
- Header, navbar, footer, CSS, dan JS dipusatkan di `library/layout.php`.
- Pagination tetap dipusatkan di `library/pagination.php`.

Dengan struktur ini, jika ingin mengubah navbar atau footer, perubahan cukup dilakukan di satu file yaitu `library/layout.php`.

## Alur Halaman

1. User membuka `index.php`.
2. User login melalui `login.php`.
3. Jika berhasil, user diarahkan ke `dashboard.php`.
4. User dapat membuka daftar artikel di `artikel_list.php`.
5. User dapat menambah artikel melalui `artikel_tambah.php`, lalu data diproses oleh `artikel_simpan.php`.
6. User dapat melihat detail artikel melalui `artikel_detail.php`.
7. User dapat menghapus artikel melalui `artikel_hapus.php`.
8. User logout melalui `logout.php`.

## Catatan Keamanan

Aplikasi ini dibuat untuk kebutuhan pembelajaran. Untuk penggunaan produksi, beberapa bagian perlu ditingkatkan:

- Gunakan `password_hash()` dan `password_verify()` untuk password.
- Gunakan prepared statement untuk query database.
- Tambahkan validasi MIME type gambar.
- Nonaktifkan `display_errors` di server produksi.
