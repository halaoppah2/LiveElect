
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim ($_POST['name'] ??  ' ');
    $email = trim ($_POST['email'] ??  ' ');
    $message = trim( $_POST['message'] ??  ' ');
    $source  = $_POST['source'] ?? '';

    // form validation
    if (empty($name) && empty($email) && empty($message)) {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
        exit;
    }

    if (empty($name)) {
        echo "<script>alert('Name is required'); window.history.back();</script>";
        exit;
    }

    if (empty($email)) {
        echo "<script>alert('Email is required'); window.history.back();</script>";
        exit;
    } elseif (strpos($email, '@') === false) {
         echo "<script>alert('Email must contain the @ sign'); window.history.back();</script>";
        exit;
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         echo "<script>alert('Invalid Email'); window.history.back();</script>";
        exit;
    }

    if (empty($message)) {
       echo "<script>alert('Message is required'); window.history.back();</script>";
        exit;
    } elseif (strlen($message) > 100) {
       echo "<script>alert('Message must not be more than 100 characters'); window.history.back();</script>";
    }



    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'liveelect');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    // Prepared statement to prevent SQL injection

    $stmt = $conn->prepare("INSERT INTO message_table (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    
   if ($stmt->execute()) {
        echo "<script>alert('Message sent successfully.'); window.location.href='{$source}.php';</script>";
    } else {
        echo "<script>alert('Message failed. Please try again.'); window.location.href='{$source}.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
