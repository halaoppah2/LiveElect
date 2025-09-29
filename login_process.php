
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = trim ($_POST['id'] ??  ' ');
    $password = trim ($_POST['password'] ??  ' ');
    $source  = $_POST['source'] ?? '';

    // form validation
    if (empty($id) && empty($password)) {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
        exit;
    }

    if (empty($password)) {
        echo "<script>alert('Password is required'); window.history.back();</script>";
        exit;
    } elseif (strlen($password) < 8) {
         echo "<script>alert('Password must  be 8 characters long'); window.history.back();</script>";
        exit;
    }


    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'liveelect');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    // Prepared statement to prevent SQL injection

    $stmt = $conn->prepare("INSERT INTO login (id, passwd,) VALUES (?, ?)");
    $stmt->bind_param("ss", $id, $password);
    
   if ($stmt->execute()) {
        echo "<script>alert('Login successfully.'); window.location.href='{$source}.php';</script>";
    } else {
        echo "<script>alert('Login failed. Please try again.'); window.location.href='{$source}.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
