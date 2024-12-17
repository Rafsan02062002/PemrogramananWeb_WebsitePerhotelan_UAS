<?php
include 'db_connect.php'; // Menghubungkan ke database

// Memeriksa apakah ID pemesanan ada
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data booking berdasarkan ID
    $sql = "DELETE FROM bookings WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Booking deleted successfully.";
        header('Location: orders.php'); // Redirect ke halaman orders setelah penghapusan
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No booking ID provided.";
}

$conn->close(); // Menutup koneksi ke database
?>
