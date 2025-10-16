<?php
    session_start();

    $conn = new mysqli('localhost', 'root', '', 'liveelect');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    function getCandidate($conn, $candidate_id) {
    if (!$candidate_id) return null;
    $stmt = $conn->prepare("SELECT name, photo, position FROM candidates WHERE candidate_id = ?");
    $stmt->bind_param("i", $candidate_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
    }

    $president = getCandidate($conn, $_SESSION['president_vote'] ?? null);
    $treasurer = getCandidate($conn, $_SESSION['treasurer_vote'] ?? null);
    $secretary = getCandidate($conn, $_SESSION['secretary_vote'] ?? null);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/8161412aed.js" crossorigin="anonymous"></script>
    <link rel="icon" href="images/logo.jpg">
    <title>Preview Votes</title>
</head>

<body>

    <div class="container p-5 mt-5 bg-white shadow-lg rounded">

        <h3 class="text-center mb-4">🗳️ Preview Your Votes</h3>

        <div class="row justify-content-center text-center mt-4">
        
            <?php foreach (['President' => $president, 'Treasurer' => $treasurer, 'Secretary' => $secretary] as $position => $data): ?>
            <div class="col-md-3 mx-2">
                <div class="card shadow">
                    <?php if ($data): ?>
                        <img src="<?= $data['photo'] ?>" class="card-img-top" style="height: 280px;">
                        <div class="card-body">
                        <h5 class="card-title"><?= $data['name'] ?></h5>
                        <p class="text-muted"><?= $position ?></p>
                        </div>
                    <?php else: ?>
                        <div class="card-body">
                        <h5 class="card-title">Not Selected</h5>
                        <p class="text-muted"><?= $position ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
        
        <!-- navigation and submisiion -->
        <div class="text-center mt-4">
            <a href="president.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Go Back
            </a>

           <form action="submit_vote.php" method="POST" class="d-inline">
                <button type="submit" class="btn btn-success">
                    Confirm & Submit <i class="fas fa-check"></i>
                </button>
            </form>
        </div>

    </div>
</body>
</html>
