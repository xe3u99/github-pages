<?php
// Debugging: Menampilkan semua data yang diterima dari form
echo '<pre>';
print_r($_POST);  // Menampilkan array $_POST untuk memeriksa data yang dikirimkan
echo '</pre>';
exit();  // Menghentikan eksekusi agar data tidak diproses lebih lanjut
?>

<?php
include 
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "cantik");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$name = $_POST['name'];
$phone_number = $_POST['phone_number'];
$services = $_POST['services'];
$total_price = $_POST['total_price'];
$date = $_POST['date'];
$time = $_POST['time'];
$payment_method = $_POST['payment_method'];
$payment_detail = $_POST['payment_detail'];

// Simpan data ke database
$sql = "INSERT INTO bookings (name, phone_number, services, total_price, date, time, payment_method, payment_detail) 
        VALUES ('$name', '$phone_number', '$services', '$total_price', '$date', '$time', '$payment_method', '$payment_detail')";

if ($conn->query($sql) === TRUE) {
    echo "Booking saved successfully! <a href='booking_form.html'>Book another</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
