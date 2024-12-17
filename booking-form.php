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
    <title>Hotel Bahagia - Booking Form</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Hotel Bahagia - Booking Form</h1>
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
        <form action="orders.php" method="POST">
            <label for="name">Full Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>

            <label for="checkin">Check-in Date:</label><br>
            <input type="date" id="checkin" name="checkin" required><br><br>

            <label for="checkout">Check-out Date:</label><br>
            <input type="date" id="checkout" name="checkout" required><br><br>

            <label for="room">Room Type:</label><br>
            <select id="room" name="room" required>
                <option value="single">Single Room</option>
                <option value="double">Double Room</option>
                <option value="suite">Suite</option>
                <option value="executive-suite">Executive Suite</option>
            </select><br><br>

            <button type="submit">Book Now</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Hotel Bahagia. All rights reserved.</p>
    </footer>
</body>
</html>
