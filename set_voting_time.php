<?php
    session_start();

    if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
    }

    date_default_timezone_set('Africa/Accra');

    $conn = new mysqli('localhost', 'root', '', 'liveelect');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    // Fetch current schedule
    $result = $conn->query("SELECT * FROM voting_schedule LIMIT 1");
    $schedule = $result->fetch_assoc();

    // Update when form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];

        if ($schedule) {
            $stmt = $conn->prepare("UPDATE voting_schedule SET start_time = ?, end_time = ? WHERE id = ?");
            $stmt->bind_param("ssi", $start_time, $end_time, $schedule['id']);
        } else {
            $stmt = $conn->prepare("INSERT INTO voting_schedule (start_time, end_time) VALUES (?, ?)");
            $stmt->bind_param("ss", $start_time, $end_time);
        }

        if ($stmt->execute()) {
            echo "<script>alert('Voting schedule updated successfully.'); window.location.href='set_voting_time.php';</script>";
        } else {
            echo "<script>alert('Error updating schedule.');</script>";
        }

        $stmt->close();
    }
    $conn->close();
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
    <link rel="icon" href="images/logo.png">
    <title>Set Voting Time</title>
</head>
<body>
    <div class="container mt-5 p-5 bg-white shadow rounded">
        <h3 class="text-center mb-4">🕒 Set Voting Start and End Time</h3>

        <form method="POST" class="p-3">
            <div class="mb-3">
                <label for="start_time" class="form-label">Start Time</label>
                <input type="datetime-local" name="start_time" id="start_time"
                       class="form-control"
                       value="<?php echo isset($schedule['start_time']) ? date('Y-m-d\TH:i', strtotime($schedule['start_time'])) : ''; ?>" required>
            </div>

            <div class="mb-3">
                <label for="end_time" class="form-label">End Time</label>
                <input type="datetime-local" name="end_time" id="end_time"
                       class="form-control"
                       value="<?php echo isset($schedule['end_time']) ? date('Y-m-d\TH:i', strtotime($schedule['end_time'])) : ''; ?>" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success px-4">Save Scdule</button>
                <a href="admin_logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
            </div>
        </form>
    </div>
</body>
</html>
