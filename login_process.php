<?php
    session_start();

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

    // Fetch voter credentials
    $stmt = $conn->prepare("SELECT id, passwd FROM signup WHERE id = ?");
    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }

    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result($voter_id, $hashed_password);
    $stmt->fetch();
    $stmt->close();

    if (!$hashed_password) {
        echo "<script>alert('ID not found.'); window.history.back();</script>";
        exit;
    }

    //password varification
    if (password_verify($password, $hashed_password)) {
    // Check if voter has already voted
    $check = $conn->prepare("SELECT COUNT(*) FROM votes WHERE voter_id = ?");
    $check->bind_param("s", $id);
    $check->execute();
    $check->bind_result($has_voted);
    $check->fetch();
    $check->close();

    if ($has_voted > 0) {
        echo "<script>alert('Already Voted. Thank you'); window.location.href='login.php';</script>";
        exit();
    }

    // Otherwise allow login
    $_SESSION['voter_id'] = $id;
    echo "<script>alert('Login successful.'); window.location.href='president.php';</script>";
    } else {
    echo "<script>alert('Invalid password.'); window.history.back();</script>";
    }

    $conn->close();

    }
?>
