<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "cantik");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form dan validasi
    $name = $conn->real_escape_string($_POST['name']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);
    $services = isset($_POST['services']) ? implode(", ", $_POST['services']) : '';
    $total_price = str_replace(['Rp', '.', ','], '', $_POST['total_price']); // Hapus format
    $total_price = (int) $total_price; // Konversi ke integer
    $date = $conn->real_escape_string($_POST['date']);
    $time = $conn->real_escape_string($_POST['time']);
    $payment_method = $conn->real_escape_string($_POST['payment_method']);
    $payment_detail = isset($_POST['payment_detail']) ? $conn->real_escape_string($_POST['payment_detail']) : '';

    // Simpan data ke database
    $stmt = $conn->prepare("INSERT INTO bookings (name, phone_number, services, total_price, date, time, payment_method, payment_detail) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $name, $phone_number, $services, $total_price, $date, $time, $payment_method, $payment_detail);

    if ($stmt->execute()) {
        echo "<script>alert('Booking saved successfully!'); window.location.href = 'admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book an Appointment</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section class="reservation-section">
        <div class="reservation-form">
            <h2>Book an Appointment</h2>
            <form id="paymentForm" action="" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="phone-number">Phone Number:</label>
                <input type="tel" id="phone_number" name="phone_number" placeholder="Enter your phone number" required>

                <label for="services">Select Services:</label>
                <select id="services" name="services[]" multiple required>
                    <option value="Hair Cutting" data-price="50000">Hair Cutting - Rp50,000</option>
                    <option value="Hairstyle" data-price="80000">Hairstyle - Rp80,000</option>
                    <option value="Hair Coloring" data-price="150000">Hair Coloring - Rp150,000</option>
                    <option value="Facial" data-price="120000">Facial - Rp120,000</option>
                    <option value="Anti-aging Treatment" data-price="130000">Anti-aging Treatment - Rp130,000</option>
                    <option value="Manicure & Pedicure" data-price="100000">Manicure & Pedicure - Rp100,000</option>
                    <option value="Perfect nail treatment" data-price="110000">Perfect Nail Treatment - Rp110,000
                    </option>
                    <option value="Spa" data-price="150000">Spa - Rp150,000</option>
                    <option value="Relaxing Massage" data-price="130000">Relaxing Massage - Rp130,000</option>
                </select>

                <label for="total">Total Price:</label>
                <input type="text" id="total" name="total_price" readonly>

                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>

                <label for="time">Time:</label>
                <input type="time" id="time" name="time" required>

                <label for="payment-method">Payment Method:</label>
                <select id="payment-method" name="payment_method" required>
                    <option value="credit-card">Credit Card</option>
                    <option value="ewallet">E-Wallet (OVO, GoPay, etc.)</option>
                </select>

                <div id="credit-bank" style="display: none;">
                    <label for="bank">Select Bank:</label>
                    <select id="bank" name="payment_detail">
                        <option value="bca">BCA</option>
                        <option value="bri">BRI</option>
                        <option value="mandiri">Mandiri</option>
                        <option value="bni">BNI</option>
                    </select>
                </div>

                <div id="ewallet-choice" style="display: none;">
                    <label for="ewallet">Select Wallet:</label>
                    <select id="ewallet" name="payment_detail">
                        <option value="ovo">OVO</option>
                        <option value="gopay">GoPay</option>
                        <option value="dana">Dana</option>
                        <option value="linkaja">LinkAja</option>
                    </select>
                </div>

                <button type="submit" class="tbl-pink">Pay Now</button>
                <button type="button" onclick="window.location.href='admin_dashboard.php'">Kembali</button>
            </form>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const servicesSelect = document.getElementById('services');
            const totalInput = document.getElementById('total');
            const paymentMethodSelect = document.getElementById('payment-method');
            const creditBankDiv = document.getElementById('credit-bank');
            const ewalletChoiceDiv = document.getElementById('ewallet-choice');

            // Hitung total harga
            servicesSelect.addEventListener('change', function () {
                let total = 0;
                const selectedOptions = Array.from(servicesSelect.selectedOptions);

                selectedOptions.forEach(option => {
                    const price = parseInt(option.getAttribute('data-price'), 10);
                    if (!isNaN(price)) {
                        total += price;
                    }
                });

                totalInput.value = `Rp${total.toLocaleString()}`;
            });

            // Ubah tampilan berdasarkan metode pembayaran
            paymentMethodSelect.addEventListener('change', function () {
                const paymentMethod = paymentMethodSelect.value;
                creditBankDiv.style.display = 'none';
                ewalletChoiceDiv.style.display = 'none';

                if (paymentMethod === 'credit-card') {
                    creditBankDiv.style.display = 'block';
                } else if (paymentMethod === 'ewallet') {
                    ewalletChoiceDiv.style.display = 'block';
                }
            });
        });
    </script>
</body>

</html>