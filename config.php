<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'stationery_shop');

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>