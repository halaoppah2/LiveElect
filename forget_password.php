<?php
    // Load Composer's autoloader
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email'] ?? '');

        // --- Validate email ---
        if (empty($email)) {
            echo "<script>alert('Email is required'); window.history.back();</script>";
            exit;
        }elseif (strpos($email, '@') === false) {
            echo "<script>alert('Invalid mail. Email must contain the @ sign'); window.history.back();</script>";
            exit;
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format'); window.history.back();</script>";
            exit;
        }

        // --- Connect to database ---
        $conn = new mysqli('localhost', 'root', '', 'liveelect');
        if ($conn->connect_error) die("DB Connection failed");

        // --- Check if user exists ---
        $stmt = $conn->prepare("SELECT id FROM signup WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->fetch();
        $stmt->close();

        if (!$id) {
            echo "<script>alert('Email not found'); window.history.back();</script>";
            exit;
        }

        // --- Generate token ---
        $token = bin2hex(random_bytes(32));
        $expires = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // --- Save token into password_reset table ---
        $stmt = $conn->prepare("INSERT INTO forget_password (id, token, expires_at) VALUES (?, ?, ?)
                                ON DUPLICATE KEY UPDATE token=?, expires_at=?");
        $stmt->bind_param("sssss", $id, $token, $expires, $token, $expires);
        $stmt->execute();
        $stmt->close();

        // --- Build reset link ---
        $resetLink = "http://127.0.0.1/LiveElect/reset_password.php?token=" . $token;

        // --- Send reset email using PHPMailer ---
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'enochoppah2@gmail.com'; // your Gmail
            $mail->Password   = 'wyjj eqzb tsyp arar'; // your Gmail App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom('noreply@liveelect.com', 'LiveElect Support');
            $mail->addAddress($email); // Send to user’s email

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = "
                <p>Hello,</p>
                <p>We received a request to reset your password. Click the link below to reset it:</p>
                <p><a href='$resetLink'>$resetLink</a></p>
                <p>This link will expire in 1 hour.</p>
                <p>If you didn’t request this, please ignore this email.</p>
            ";

            $mail->send();
            echo "<script>alert('A reset link has been sent to your email.'); window.location.href='login.php';</script>";
        } catch (Exception $e) {
            echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}'); window.history.back();</script>";
        }

        $conn->close();
    }
?>
