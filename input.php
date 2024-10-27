<?php
$kecamatan = $_POST['Kecamatan'];
$longitude = $_POST['longitude'];
$latitude = $_POST['Latitude'];
$luas = $_POST['luas'];
$jumlah_penduduk = $_POST['jumlah_penduduk'];

// Create connection
$conn = new mysqli("localhost", "root", "", "pgweb8b");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind statement to prevent SQL Injection
$stmt = $conn->prepare("INSERT INTO pgweb8b (kecamatan, longitude, latitude, luas, jumlah_penduduk) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sddii", $kecamatan, $longitude, $latitude, $luas, $jumlah_penduduk);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();

// Redirect to index.html
// header("Location: index.html");
// exit;
?>
