<?php
// Pastikan tidak ada spasi atau newline sebelum tag <?php
ob_start(); // Mengaktifkan output buffering
session_start();

// Dummy data login untuk admin
$validAdminUsername = "admin";
$validAdminPassword = "admin123";

// Cek jika form dikirim dengan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? ''; // Mengambil username dari form
    $password = $_POST['password'] ?? ''; // Mengambil password dari form

    // Validasi login
    if ($username === $validAdminUsername && $password === $validAdminPassword) {
        // Login berhasil
        $_SESSION['admin_logged_in'] = true; // Menandakan admin sudah login
        header('Location: admin_dashboard.php'); // Redirect ke halaman dashboard admin
        exit(); // Menghentikan eksekusi skrip setelah redirect
    } else {
        // Login gagal
        echo "<p>Login failed! <a href='login.html'>Try again</a></p>";
    }
} else {
    echo "<p>Invalid request method.</p>";
}
?>
