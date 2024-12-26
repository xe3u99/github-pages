<?php
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.html'); // Jika belum login, redirect ke halaman login
    exit();
}

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

// Query untuk mengambil data booking
$sql = "SELECT id, name, phone_number, services, total_price, date, time, payment_method, payment_detail FROM bookings";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$bookings = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <section>
        <header>
            <div class="box-header">
                <h1>Larrissa</h1>
                <a class="add" href="add_booking.php">+ Add booking</a>
                <a href="logout.php" class="tbl-maroon">Logout</a>
            </div>
        </header>

        <main class="utama">
            <section>
                <h2>User Bookings</h2>
                <table class="price-list">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Services</th>
                            <th>Total Price</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Payment Method</th>
                            <th>Payment Detail</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bookings as $booking): ?>
                            <tr>
                                <td><?= htmlspecialchars($booking['name']) ?></td>
                                <td><?= htmlspecialchars($booking['phone_number']) ?></td>
                                <td><?= htmlspecialchars($booking['services']) ?></td>
                                <td><?= htmlspecialchars($booking['total_price']) ?></td>
                                <td><?= htmlspecialchars($booking['date']) ?></td>
                                <td><?= htmlspecialchars($booking['time']) ?></td>
                                <td><?= htmlspecialchars($booking['payment_method']) ?></td>
                                <td><?= htmlspecialchars($booking['payment_detail']) ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $booking['id'] ?>" class="edit">Edit</a> |
                                    <a href="delete.php?id=<?= $booking['id'] ?>"
                                        onclick="return confirm('Are you sure?')" class="delete">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </main>
    </section>
</body>

</html>