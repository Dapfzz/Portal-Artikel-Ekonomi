<?php
require_once 'config.php';
require_once 'library/pagination.php';
require_once 'koneksi.php';

redirect_if_logged_in();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username     = mysqli_real_escape_string($koneksi, trim($_POST['username']));
    $password     = trim($_POST['password']);
    $password_md5 = md5($password);

    $query = "SELECT id_user, username FROM users WHERE username = '$username' AND password = '$password_md5'";
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil && mysqli_num_rows($hasil) > 0) {
        $data_user = mysqli_fetch_assoc($hasil);
        $_SESSION['id_user']  = $data_user['id_user'];
        $_SESSION['username'] = $data_user['username'];
        header("Location: dashboard.php");
        exit;
    } else {
        $_SESSION['login_error'] = "Username atau password salah. Silakan coba lagi.";
        header("Location: login.php");
        exit;
    }
}

$pesan_error = '';
if (isset($_SESSION['login_error'])) {
    $pesan_error = $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}

render_page_head('Login Admin', 'login-page');
?>
    <div class="login-container">
        <div class="login-badge">Admin Portal</div>
        <h2>Login Admin</h2>
        <p class="subtitle"><?php echo APP_NAME; ?></p>

        <?php if ($pesan_error != ''): ?>
            <div class="alert alert-error"><?php echo htmlspecialchars($pesan_error); ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST" class="form-login">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" autocomplete="username" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" autocomplete="current-password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>

<?php render_page_footer(false); ?>