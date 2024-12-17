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
    <title>Hotel Bahagia - Booking Confirmation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Hotel Bahagia - Booking Confirmation</h1>
        <nav>
            <ul>
                <li><a href="landingpage.html">Home</a></li>
                <li><a href="dashboard.html">Dashboard</a></li>
                <li><a href="booking-form.html">Booking Form</a></li>
                <li><a href="room-table.html">Room Rates</a></li>
                <li><a href="orders.php">Orders</a></li>
				<li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h2>Thank You for Booking!</h2>
        <div id="confirmation-details"></div>
    </section>

    <footer>
        <p>&copy; 2024 Hotel Bahagia. All rights reserved.</p>
    </footer>

    <script>
        // Fetch query parameters and display booking details
        const urlParams = new URLSearchParams(window.location.search);
        const name = urlParams.get('name');
        const checkin = urlParams.get('checkin');
        const checkout = urlParams.get('checkout');
        const room = urlParams.get('room');

        document.getElementById('confirmation-details').innerHTML = `
            <p><strong>Name:</strong> ${name}</p>
            <p><strong>Check-in:</strong> ${checkin}</p>
            <p><strong>Check-out:</strong> ${checkout}</p>
            <p><strong>Room:</strong> ${room}</p>
        `;
    </script>
</body>
</html>
