<?php
// password_reset.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = trim($_POST['password'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');

    if (empty($password) || empty($confirm_password)) {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
        exit;
    }

    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
        exit;
    }

    // Hash new password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Start with DB connection
    $conn = new mysqli('localhost', 'root', '', 'liveelect');
    if ($conn->connect_error) die("DB Connection failed");

    // Update password in signup table
    $stmt = $conn->prepare("UPDATE signup SET passwd=? WHERE id=?");
    $stmt->bind_param("ss", $hashed_password, $id);
    $stmt->execute();
    $stmt->close();

    // Delete used token
    $stmt = $conn->prepare("DELETE FROM forget_password WHERE token=?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('Password reset successful. Please login.'); window.location.href='login.php';</script>";
    exit;
}


// Check if token is provided
if (!isset($_GET['token'])) {
    echo "<script>alert('Invalid reset link.'); window.location.href='login.php';</script>";
    exit;
}

$token = $_GET['token'];

// Verify token in DB
$stmt = $conn->prepare("SELECT id, expires_at FROM forget_password WHERE token=?");
$stmt->bind_param("s", $token);
$stmt->execute();
$stmt->bind_result($id, $expires_at);
$stmt->fetch();
$stmt->close();

if (!$id || strtotime($expires_at) < time()) {
    echo "<script>alert('This reset link is invalid or expired.'); window.location.href='login.php';</script>";
    exit;
}

?>
