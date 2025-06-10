<?php
// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    // Validasi jika password dan konfirmasi password tidak cocok
    if ($password !== $confirm_password) {
        $error_message = "Password dan konfirmasi password tidak cocok!";
    } else {
        // Simpan data registrasi ke file (atau ke database jika sudah tersedia)
        // Untuk contoh ini, kita hanya simpan dalam array
        $users = [];
        $users[] = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT) // Enkripsi password
        ];

        // Simpan data ke file atau database di sini (misalnya, menggunakan session atau menyimpan ke database)

        // Redirect ke halaman login setelah berhasil registrasi
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Belajar Arduino SMK</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Daftar Akun Baru</h1>
        <nav>
            <a href="index.html">Beranda</a>
            <a href="arduino-dasar.html">Dasar Arduino</a>
            <a href="cpp-dasar.html">Dasar C++</a>
            <a href="proyek-mini.html">Proyek Arduino</a>
        </nav>
    </header>

    <main>
        <section class="register-form">
            <h2>Buat Akun Baru</h2>
            <!-- Menampilkan pesan error jika terjadi kesalahan -->
            <?php if (isset($error_message)) { ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php } ?>
            
            <form action="register.php" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                
                <label for="confirm-password">Konfirmasi Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Konfirmasi password" required>
                
                <button type="submit">Daftar</button>
            </form>
        </section>
    </main>

    <footer>
        <p>© 2025 BelajarArduinoSMK. Dibuat dengan semangat edukasi.</p>
    </footer>
</body>
</html>
