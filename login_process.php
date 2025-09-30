<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = trim($_POST['id'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($id) || empty($password)) {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
        exit;
    }

    $conn = new mysqli('localhost', 'root', '', 'liveelect');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT passwd FROM signup WHERE id = ?");
    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }

    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    if (!$hashed_password) {
        echo "<script>alert('ID not found.'); window.history.back();</script>";
        exit;
    }

    if (password_verify($password, $hashed_password)) {
        echo "<script>alert('Login successful.'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Invalid password.'); window.history.back();</script>";
    }

    $conn->close();
}
?>
