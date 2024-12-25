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

// Menampilkan data
$bookings = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css"> <!-- Link ke file CSS Anda -->
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Welcome to Admin Dashboard</h1>
            <p>You are successfully logged in.</p>
        </header>
        
        <section>
            <h2>User Bookings</h2>
            <table class="price-list">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Services</th>
                        <th>Total Price</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Payment Method</th>
                        <th>Payment Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bookings as $booking): ?>
                        <tr>
                            <td><?= $booking['id'] ?></td>
                            <td><?php echo htmlspecialchars($booking['name']); ?></td>
                            <td><?php echo htmlspecialchars($booking['phone_number']); ?></td>
                            <td><?php echo htmlspecialchars($booking['services']); ?></td>
                            <td><?php echo htmlspecialchars($booking['total_price']); ?></td>
                            <td><?php echo htmlspecialchars($booking['date']); ?></td>
                            <td><?php echo htmlspecialchars($booking['time']); ?></td>
                            <td><?php echo htmlspecialchars($booking['payment_method']); ?></td>
                            <td><?php echo htmlspecialchars($booking['payment_detail']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <div class="footer">
            <a href="logout.php" class="tbl-maroon">Logout</a>
        </div>
    </div>
</body>
</html>
