<?php
// Show all errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $bio = $_POST['bio'];
    $state = $_POST['state'];

    // Temporary hash for InfinityFree (md5 — not secure, just for demo)
    $hashed_password = md5($password);

    // Prepare SQL
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, mobile, bio, state) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("❌ Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssssss", $name, $email, $hashed_password, $mobile, $bio, $state);

    if ($stmt->execute()) {
        echo "<h2>✅ Signup successful! <a href='index.html'>Go back to home</a></h2>";
    } else {
        echo "<h2>❌ Error inserting data: " . $stmt->error . "</h2>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<h2>❌ Access Denied</h2>";
}
?>