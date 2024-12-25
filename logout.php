<?php
session_start();
session_destroy(); // Menghapus semua sesi
header('Location: login.html'); // Redirect ke halaman login
exit();
?>
