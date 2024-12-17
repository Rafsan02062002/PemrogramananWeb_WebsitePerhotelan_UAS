<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, redirect ke halaman login
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Bahagia - Landing Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Welcome to Hotel Bahagia, Tuan <?php echo $_SESSION['username']; ?></h1>
        <nav>
            <ul>
                <li><a href="landingpage.php">Home</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="booking-form.php">Booking Form</a></li>
                <li><a href="room-table.php">Room Rates</a></li>
                <li><a href="orders.php">Orders</a></li>
				<li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h2>Liburan Paling Sempurna Untuk Anda Ada Disini</h2>
        <p>Di Hotel Bahagia, kami menyediakan akomodasi mewah untuk semua jenis wisatawan. Baik Anda datang untuk perjalanan bisnis atau liburan keluarga, Anda akan menemukan semua yang Anda butuhkan untuk masa inap yang nyaman.</p>
        <img src="bangunan_hotel.jpeg" alt="Hotel Image" style="width:100%; height:auto;">
    </section>

    <footer>
        <p>&copy; 2024 Hotel Bahagia. All rights reserved.</p>
    </footer>
</body>
</html>
