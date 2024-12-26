<?php
session_start(); // Memulai session

// Dummy data untuk login
$validUsername = "user";
$validPassword = "password123";

// Cek apakah form dikirim menggunakan POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil username dan password dari form
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validasi data login
    if ($username === $validUsername && $password === $validPassword) {
        // Menyimpan informasi session jika login berhasil
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;

        // Redirect ke halaman booking.html setelah login berhasil
        header('Location: booking.html');
        exit(); // Pastikan proses berhenti setelah redirect
    } else {
        // Jika login gagal
        echo "Login failed! <a href='login.html'>Try again</a>";
    }
} else {
    // Jika tidak menggunakan metode POST
    echo "Invalid request method.";
}
?>
