<?php
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.html');
    exit();
}

// Koneksi ke database
$host = 'localhost'; // Ganti dengan host Anda
$dbname = 'cantik'; // Nama database Anda
$username = 'root'; // Username database Anda
$password = ''; // Password database Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

// Mengambil data dari form
$name = $_POST['name'] ?? '';
$phone_number = $_POST['phone-number'] ?? '';
$services = implode(', ', $_POST['services'] ?? []); // Menyimpan beberapa layanan yang dipilih
$total_price = array_sum(array_map(function($service) {
    return $_POST['services'][$service]['data-price']; // Mengambil harga masing-masing layanan
}, $_POST['services'])); // Total harga
$date = $_POST['date'] ?? '';
$time = $_POST['time'] ?? '';
$payment_method = $_POST['payment-method'] ?? '';
$payment_detail = '';

// Tentukan payment_detail berdasarkan pilihan pembayaran
if ($payment_method == 'credit-card') {
    $payment_detail = $_POST['bank'] ?? ''; // Jika menggunakan kartu kredit, simpan bank yang dipilih
} elseif ($payment_method == 'ewallet') {
    $payment_detail = $_POST['ewallet'] ?? ''; // Jika menggunakan e-wallet, simpan dompet yang dipilih
}

// Query untuk menyimpan data booking ke database
$sql = "INSERT INTO bookings (name, phone_number, service, total_price, date, time, payment_method, payment_detail) 
        VALUES (:name, :phone_number, :service, :total_price, :date, :time, :payment_method, :payment_detail)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':name' => $name,
    ':phone_number' => $phone_number,
    ':service' => $services,
    ':total_price' => $total_price,
    ':date' => $date,
    ':time' => $time,
    ':payment_method' => $payment_method,
    ':payment_detail' => $payment_detail
]);

echo "Booking submitted successfully!";
?>
