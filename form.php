<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim ($_POST['name'] ??  ' ');
        $email = trim ($_POST['email'] ??  ' ');
        $message = trim( $_POST['message'] ??  ' ');
        $source  = $_POST['source'] ?? '';

        // form validation
        if (empty($name) || empty($email) || empty($message)) {
            echo "<script>alert('All fields are required.'); window.history.back();</script>";
            exit;
        }

        if (empty($email)) {
            echo "<script>alert('Email is required'); window.history.back();</script>";
            exit;
        } elseif (strpos($email, '@') === false) {
            echo "<script>alert('Invalid mail. Email must contain the @ sign'); window.history.back();</script>";
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

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'enochoppah2@gmail.com'; // your email
            $mail->Password   = 'wyjj eqzb tsyp arar'; // your email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom('test@test.com', 'LiveElect');
            $mail->addAddress('enochoppah2@gmail.com'); // recipient email
            $mail->isHTML(true);
            $mail->Subject = 'New Message from Contact Form';
            $mail->Body    = "Name: {$name}<br>Email: {$email}<br>Message: {$message}";
            
            if($mail->send()){
                echo "<script>alert('Message sent successfully.'); window.location.href='{$source}.php';</script>";
            } else {
                echo "<script>alert('Message failed. Please try again.'); window.location.href='{$source}.php';</script>";
            }

            // === Auto-reply to user ===
            $reply = new PHPMailer(true);
            $reply->isSMTP();
            $reply->Host       = 'smtp.gmail.com';
            $reply->SMTPAuth   = true;
            $reply->Username   = 'enochoppah2@gmail.com';
            $reply->Password   = 'wyjj eqzb tsyp arar';
            $reply->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $reply->Port       = 587;

            $reply->setFrom('noreply@liveelect.com', 'LiveElect Support');
            $reply->addAddress($email, $name);
            $reply->isHTML(true);
            $reply->Subject = 'We received your message';
            $reply->Body    = "
                <p>Hi <b>{$name}</b>,</p>
                <p>Thank you for contacting <b>LiveElect</b>. We have received your message and will get back to you shortly.</p>
                <hr>
                <p><b>Your Message:</b></p>
                <blockquote style='color:#555;border-left:3px solid #0099cc;padding-left:10px;'>
                    {$message}
                </blockquote>
                <p>Best regards,<br><b>LiveElect Support Team</b></p>
            ";
            $reply->send();


        }catch (Exception $e) {
            echo "<script>alert('Mailer Error: {$mail->ErrorInfo}'); window.history.back();</script>";
            exit;
        }
        
    }
?>
