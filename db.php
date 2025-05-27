<?php
$servername = "sql109.infinityfree.com";
$username   = "if0_39082649";
$password   = "mdrC1m4BJFzs58s";  
$database   = "if0_39082649_codewave";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>