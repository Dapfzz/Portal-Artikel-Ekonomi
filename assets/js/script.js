document.addEventListener('DOMContentLoaded', function () {

    var navToggle = document.querySelector('.nav-toggle');
    var mainNav = document.querySelector('.main-nav');
    if (navToggle && mainNav) {
        navToggle.addEventListener('click', function (e) {
            e.stopPropagation();
            var isOpen = mainNav.classList.toggle('show');
            navToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });

        mainNav.addEventListener('click', function (e) {
            if (e.target.tagName === 'A') {
                mainNav.classList.remove('show');
                navToggle.setAttribute('aria-expanded', 'false');
            }
        });

        document.addEventListener('click', function (e) {
            if (!mainNav.contains(e.target) && !navToggle.contains(e.target)) {
                mainNav.classList.remove('show');
                navToggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    var formArtikel = document.getElementById('formArtikel');
    if (formArtikel) {
        formArtikel.addEventListener('submit', function (e) {
            var judul = document.getElementById('judul').value.trim();
            var isi = document.getElementById('isi').value.trim();
            var gambar = document.getElementById('gambar').value.trim();
            var tanggal = document.getElementById('tanggal').value.trim();

            if (judul === '' || isi === '' || gambar === '' || tanggal === '') {
                e.preventDefault();
                alert('Judul, isi, gambar, dan tanggal artikel wajib diisi!');
                return;
            }

            var konfirmasi = confirm('Apakah Anda yakin ingin tambah artikel ini?');
            if (!konfirmasi) {
                e.preventDefault();
            }
        });
    }

    var tombolHapus = document.querySelectorAll('.btn-hapus');
    tombolHapus.forEach(function (tombol) {
        tombol.addEventListener('click', function (e) {
            var konfirmasi = confirm('Apakah Anda yakin ingin menghapus artikel ini? Data yang dihapus tidak dapat dikembalikan.');
            if (!konfirmasi) {
                e.preventDefault();
            }
        });
    });

    var btnLogout = document.getElementById('btnLogout');
    if (btnLogout) {
        btnLogout.addEventListener('click', function (e) {
            e.preventDefault();
            var konfirmasi = confirm('Apakah Anda yakin ingin logout dari sistem?');
            if (konfirmasi) {
                window.location.href = btnLogout.getAttribute('data-href');
            }
        });
    }

});
