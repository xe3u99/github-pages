<?php
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.html'); // Jika belum login, redirect ke halaman login
    exit();
}

// Cek apakah ID valid
if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    die("ID tidak valid.");
}

$id_user = $_GET['id'];

$host = 'localhost';
$dbname = 'cantik';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

// Query untuk menghapus data booking berdasarkan ID
$sql = "DELETE FROM bookings WHERE id = ?";
$stmt = $pdo->prepare($sql);

// Eksekusi query
if ($stmt->execute([$id_user])) {
    // Redirect kembali ke dashboard setelah berhasil menghapus
    header("Location: admin_dashboard.php");
    exit();
} else {
    echo "Terjadi kesalahan saat menghapus data.";
}
?>
