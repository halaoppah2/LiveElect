<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim ($_POST['name'] ??  ' ');
    $id = trim ($_POST['id'] ??  ' ');
    $password = trim ($_POST['password'] ??  ' ');
    $confirm_password = trim ($_POST['con_password'] ??  ' ');

     // form validation
    if (empty($name) && empty($id) && empty($password)) {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
        exit;


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
        echo "<script>alert('ID already exist. Cannot signup twice'); window.history.back();</script>";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Store user information in the database
    $stmt = $conn->prepare("INSERT INTO signup (name, id, passwd) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $id, $hashed_password);
    if ($stmt->execute()) {
        echo "<script>alert('Signup successful.'); window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Signup failed. Please try again.'); window.history.back();</script>";
    }
    $stmt->close();
    $conn->close();
}

}
?>
