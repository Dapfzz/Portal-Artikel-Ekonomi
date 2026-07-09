# Portal Artikel Ekonomi

Aplikasi web portal artikel berbasis PHP native untuk mengelola dan menampilkan artikel ekonomi. Dibangun sebagai proyek Uji Kompetensi Junior Web Programmer (JWP).

## Fitur

**Publik (tanpa login)**

- Melihat semua artikel di halaman utama
- Membaca detail artikel
- Pencarian artikel berdasarkan judul atau isi
- Pagination artikel

**Admin (dengan login)**

- Login/logout admin
- Dashboard
- Tambah artikel dengan upload gambar
- Daftar artikel dengan pagination
- Hapus artikel

## Teknologi

- PHP 7.4+
- MySQL
- HTML, CSS, JavaScript
- Laragon (lokal)

## Struktur Folder

```
project-web-jwp/
├── assets/
│   ├── css/style.css
│   ├── js/script.js
│   └── images/artikel/
├── database/
│   └── db_portal.sql
├── docs/
│   └── dokumentasi.md
├── library/
│   └── pagination.php
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

## Instalasi

1. Clone repo ini ke folder `htdocs` atau `www` Laragon

```bash
git clone https://github.com/Dapfzz/Portal-Artikel-Ekonomi.git
```

2. Import database dari `database/db_portal.sql` ke phpMyAdmin
3. Sesuaikan konfigurasi di `config.php` dan `koneksi.php` jika perlu
4. Akses di browser: `http://localhost/project-web-jwp`

## Penggunaan

- **User biasa** — langsung buka `http://localhost/project-web-jwp`
- **Admin** — klik tombol **Login Admin** di navbar, masukkan username dan password

## Unit Kompetensi

`J.620100.019.02` — Menggunakan library atau komponen pre-existing
