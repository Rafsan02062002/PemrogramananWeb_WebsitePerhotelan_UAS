<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, redirect ke halaman login
    header("Location: login.php");
    exit();
}

include 'db_connect.php'; // Menghubungkan ke database

// Mengecek apakah data form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Menangkap data dari form
    $name = $_POST['name'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $room = $_POST['room'];

    // Menyimpan data ke dalam database
    $sql = "INSERT INTO bookings (name, checkin, checkout, room) VALUES ('$name', '$checkin', '$checkout', '$room')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Query untuk menampilkan pemesanan yang ada
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Bahagia - Orders</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Hotel Bahagia - Orders</h1>
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
        <h2>Current Bookings</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Room Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["name"]. "</td>
                                <td>" . $row["checkin"]. "</td>
                                <td>" . $row["checkout"]. "</td>
                                <td>" . $row["room"]. "</td>
                                <td>
                                    <a href='edit_booking.php?id=" . $row["id"] . "'>Edit</a> | 
                                    <a href='delete_booking.php?id=" . $row["id"] . "'>Delete</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No bookings found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 Hotel Bahagia. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
$conn->close(); // Menutup koneksi ke database
?>
