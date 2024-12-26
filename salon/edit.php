<?php
// Memulai session
session_start();

// Pastikan admin sudah login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.html');
    exit();
}

// Koneksi ke database menggunakan PDO
$host = 'localhost';
$dbname = 'cantik';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Jika ada request POST (proses update)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pastikan ID valid
    if (!isset($_POST['id']) || !filter_var($_POST['id'], FILTER_VALIDATE_INT)) {
        die("ID tidak valid.");
    }

    // Ambil data dari form
    $id_user = $_POST['id'];
    $name = $_POST['name'];
    $services = $_POST['services'];
    $total_price = $_POST['total_price'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $payment_method = $_POST['payment_method'];
    $payment_detail = $_POST['payment_detail'];

    // Query untuk memperbarui data booking
    $sql = "UPDATE bookings SET name = ?, services = ?, total_price = ?, date = ?, time = ?, payment_method = ?, payment_detail = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    // Eksekusi query
    if ($stmt->execute([$name, $services, $total_price, $date, $time, $payment_method, $payment_detail, $id_user])) {
        // Redirect ke admin_dashboard.php setelah update berhasil
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat memperbarui data.";
    }
}

// Jika tidak ada request POST (tampil form edit), ambil data booking berdasarkan ID di URL
if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $id_user = $_GET['id'];

    // Query untuk mengambil data booking berdasarkan ID
    $sql = "SELECT id, name, phone_number, services, total_price, date, time, payment_method, payment_detail FROM bookings WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_user]);
    $user = $stmt->fetch();

    if (!$user) {
        die("Data booking tidak ditemukan.");
    }
} else {
    die("ID tidak valid.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <link rel="stylesheet" href="edit.css">
</head>

<body>
    <div class="form-edit">
        <h1>Edit Booking</h1>
        <form method="POST" action="edit.php">
            <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">

            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>

            <label for="services">Layanan:</label>
            <input type="text" id="services" name="services" value="<?= htmlspecialchars($user['services']) ?>"
                required>

            <label for="total_price">Total Harga:</label>
            <input type="text" id="total_price" name="total_price" value="<?= htmlspecialchars($user['total_price']) ?>"
                required>

            <label for="date">Tanggal:</label>
            <input type="date" id="date" name="date" value="<?= htmlspecialchars($user['date']) ?>" required>

            <label for="time">Waktu:</label>
            <input type="time" id="time" name="time" value="<?= htmlspecialchars($user['time']) ?>" required>

            <label for="payment_method">Metode Pembayaran:</label>
            <input type="text" id="payment_method" name="payment_method"
                value="<?= htmlspecialchars($user['payment_method']) ?>" required>

            <label for="payment_detail">Detail Pembayaran:</label>
            <input type="text" id="payment_detail" name="payment_detail"
                value="<?= htmlspecialchars($user['payment_detail']) ?>" required>

            <button type="submit">Update</button>
            <button type="button" onclick="window.location.href='admin_dashboard.php'">Kembali</button>
        </form>
    </div>
</body>

</html>