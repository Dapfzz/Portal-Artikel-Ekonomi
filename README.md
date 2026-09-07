# Portal Artikel Ekonomi

Aplikasi web portal artikel berbasis **PHP Native** untuk mengelola dan menampilkan artikel ekonomi.
Dibangun sebagai proyek **Uji Kompetensi Junior Web Programmer (JWP)**.

## Fitur

### Publik

* Melihat daftar artikel di halaman utama
* Membaca detail artikel
* Mencari artikel berdasarkan judul atau isi
* Pagination artikel

### Admin

* Login dan logout admin
* Dashboard admin
* Menambahkan artikel
* Upload gambar artikel
* Melihat daftar artikel
* Pagination daftar artikel
* Menghapus artikel

## Teknologi

* **PHP 7.4+**
* **MySQL**
* **HTML**
* **CSS**
* **JavaScript**
* **Laragon** untuk lingkungan pengembangan lokal

## Struktur Project

```text
project-web-jwp/
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── js/
│   │   └── script.js
│   └── images/
│       └── artikel/
├── config.php
├── koneksi.php
├── index.php
├── login.php
├── logout.php
├── dashboard.php
├── artikel_list.php
├── artikel_tambah.php
├── artikel_simpan.php
├── artikel_detail.php
└── artikel_hapus.php
```

> Folder dan file lokal seperti database, dokumentasi, serta library yang tidak diperlukan untuk repository dapat diabaikan melalui `.gitignore`.

## Instalasi

### 1. Clone Repository

Clone repository ke folder `www` pada Laragon:

```bash
git clone https://github.com/Dapfzz/Portal-Artikel-Ekonomi.git
```

Kemudian masuk ke folder project:

```bash
cd Portal-Artikel-Ekonomi
```

### 2. Siapkan Database

Buat database MySQL untuk project melalui **phpMyAdmin** atau tools database lainnya.

Jika tersedia file SQL pada project, import file tersebut ke database yang telah dibuat.

### 3. Konfigurasi Database

Sesuaikan konfigurasi pada `koneksi.php` dengan database lokal yang digunakan:

```php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_namasiswa";
```

Sesuaikan `config.php` jika lokasi atau nama folder project berbeda:

```php
define('BASE_URL', 'http://localhost/project-web-jwp/');
```

### 4. Jalankan Project

Pastikan **Laragon** dan **MySQL** sedang berjalan.

Kemudian buka:

```text
http://localhost/project-web-jwp/
```

## Penggunaan

### User

User dapat langsung mengakses halaman utama untuk:

* Melihat artikel
* Membaca detail artikel
* Mencari artikel
* Berpindah halaman menggunakan pagination

### Admin

Admin dapat mengakses halaman login melalui tombol **Login Admin** pada navbar.

Setelah berhasil login, admin dapat:

* Melihat dashboard
* Menambahkan artikel
* Mengupload gambar artikel
* Melihat daftar artikel
* Menghapus artikel
* Logout

## Unit Kompetensi

**J.620100.019.02 — Menggunakan library atau komponen pre-existing**

## Pengembangan

Project ini dikembangkan menggunakan PHP Native dan MySQL sebagai bagian dari proses pembelajaran dan pelaksanaan **Uji Kompetensi Junior Web Programmer (JWP)**.
