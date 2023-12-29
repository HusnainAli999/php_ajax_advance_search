<?php
$conn = new mysqli("localhost", "root", "", "advance_search_database");

if ($conn->connect_error) {
    echo "Major Connection failed: " . $conn->connect_error;
    exit;
}
?>
