<?php
$conn = new mysqli("localhost", "root", "", "ams_db");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>