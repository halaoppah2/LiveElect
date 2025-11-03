<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim ($_POST['email'] ??  '');
    $id = trim ($_POST['id'] ??  '');
    $password = trim ($_POST['password'] ??  '');
    $confirm_password = trim ($_POST['con_password'] ??  '');

     // form validation
    if (empty($email) || empty($id) || empty($password) || empty($confirm_password)) {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
        exit;
    }

    //password length validation
    if (strlen($password) < 8) {
        echo "<script>alert('Password must not be less than 8 characters long'); window.history.back();</script>";
        exit;
    }

    // Check if password and confirm password match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match. Please try again.'); window.history.back();</script>";
        exit;
    }

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'liveelect');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    // Check if id already exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM signup WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo "<script>alert('ID already exist.'); window.history.back();</script>";
        exit;
    }

    // Check if email already exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM signup WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo "<script>alert('Email already exist.'); window.history.back();</script>";
        exit;
    }

    // Check pre-populated table for existing id
//     $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
//     $stmt->bind_param("s", $id);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     $stmt->close();

//    if ($result->num_rows === 0) {
//     echo "<script>alert('Invalid ID or ID does not exist.'); window.history.back();</script>";
//     exit;
//     }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Store user information in the database
    $stmt = $conn->prepare("INSERT INTO signup (email, id, passwd) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $id, $hashed_password);
    if ($stmt->execute()) {
        echo "<script>alert('Signup successful.'); window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Signup failed. Please try again.'); window.history.back();</script>";
    }
    $stmt->close();
    $conn->close();
}
?>
