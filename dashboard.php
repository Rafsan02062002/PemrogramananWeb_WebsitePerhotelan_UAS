<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Bahagia - Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Hotel Bahagia - Dashboard</h1>
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
        <h2>Welcome to Hotel Bahagia, Tuan <?php echo $_SESSION['username']; ?></h2>
        <p>Terima kasih telah memilih Hotel Bahagia. Di sini Anda dapat mengelola pemesanan, melihat penawaran eksklusif, dan menjelajahi fasilitas premium kami. Kami harap Anda menikmati masa menginap dan layanan terbaik kami!</p>
        <img src="Dashboard.jpg" alt="Dashboard Image" style="width:100%; height:auto;">
        
        <h3>FASILITAS PREMIUM KAMI</h3>
            <p>Relaxing Spa and Wellness Center</p>
            <p>Gourmet Dining Experiences</p>
            <p>State-of-the-art Fitness Center</p>
            <p>Luxurious Pool, Bar and Lounge</p>
    </section>

    <footer>
        <p>&copy; 2024 Hotel Bahagia. All rights reserved.</p>
    </footer>
</body>
</html>
