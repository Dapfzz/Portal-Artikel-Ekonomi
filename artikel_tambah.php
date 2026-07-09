<?php
require_once 'config.php';
require_once 'library/pagination.php';

require_login();

render_page_head('Tambah Artikel');
render_admin_header();
?>

    <div class="container">
        <div class="page-title-bar">
            <h1>Tambah Artikel Baru</h1>
        </div>

        <?php if (isset($_SESSION['form_error'])): ?>
            <div class="alert alert-error"><?php echo htmlspecialchars($_SESSION['form_error']); ?></div>
            <?php unset($_SESSION['form_error']); ?>
        <?php endif; ?>

        <form action="artikel_simpan.php" method="POST" enctype="multipart/form-data" id="formArtikel" class="form-artikel">
            <div class="form-group form-group-full">
                <label for="judul">Judul Artikel</label>
                <input type="text" id="judul" name="judul" placeholder="Masukkan judul artikel" required>
            </div>

            <div class="form-group form-group-full">
                <label for="isi">Isi Artikel</label>
                <textarea id="isi" name="isi" rows="8" placeholder="Tulis isi artikel di sini..." required></textarea>
            </div>

            <div class="form-group">
                <label for="gambar">Gambar Artikel</label>
                <input type="file" id="gambar" name="gambar" accept="image/*" required>
                <small>Format: JPG, JPEG, PNG. Maks. 2MB.</small>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal Artikel</label>
                <input type="date" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d'); ?>" required>
            </div>

            <div class="form-actions form-group-full">
                <button type="submit" class="btn btn-primary">Tambah Artikel</button>
                <a href="artikel_list.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>

<?php render_page_footer(); ?>
