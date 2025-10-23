<?php
    session_start();

    $conn = new mysqli('localhost', 'root', '', 'liveelect');

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        $stmt = $conn->prepare("SELECT passwd FROM admin WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        $stmt->close();

        if ($hashed_password && password_verify($password, $hashed_password)) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $username;
            header("Location: set_voting_time.php");
            exit();
        } else {
            echo "<script>alert('Invalid admin credentials'); window.history.back();</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/8161412aed.js" crossorigin="anonymous"></script>
    <link rel="icon" href="images/logo.jpg">
    <title>Admin Login</title>
</head>

<body>
    <div class="container mt-5 p-5 bg-white shadow rounded" style="max-width: 400px;">
        <h3 class="text-center mb-4">🔐 Admin Login</h3>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-dark px-4">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
