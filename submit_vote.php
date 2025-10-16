<?php
    session_start();

    $conn = new mysqli('localhost', 'root', '', 'liveelect');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    //error handling of voter_id
    if (!isset($_SESSION['voter_id'])) {
        die("SESSION voter_id missing. Session data: " . print_r($_SESSION, true));
    }

    // Ensure voter is logged in
    if (!isset($_SESSION['voter_id'])) {
        header("Location: login.php");
        exit();
    }

    $voter_id = $_SESSION['voter_id'];

    // Retrieve votes
    $votes = [
        'President' => $_SESSION['president_vote'] ?? null,
        'Treasurer' => $_SESSION['treasurer_vote'] ?? null,
        'Secretary' => $_SESSION['secretary_vote'] ?? null
    ];

    // Ensure all votes are made
    foreach ($votes as $position => $candidate_id) {
    if (!$candidate_id) {
        header("Location: preview.php");
        exit();
        }
    }

    // Check if voter already voted
    $check = $conn->prepare("SELECT COUNT(*) FROM votes WHERE voter_id = ?");
    $check->bind_param("s", $voter_id);
    $check->execute();
    $check->bind_result($vote_count);
    $check->fetch();
    $check->close();

    if ($vote_count > 0) {
        echo '<script>alert("You have already voted!"); window.location.href="login.php";</script>';
        exit();
    }

    // Insert votes
    $stmt = $conn->prepare("INSERT INTO votes (voter_id, candidate_id, position) VALUES (?, ?, ?)");

    $update = $conn->prepare("UPDATE candidates SET total_votes = total_votes + 1 WHERE candidate_id = ?");

    foreach ($votes as $position => $candidate_id) {
        $stmt->bind_param("sis", $voter_id, $candidate_id, $position);
        $stmt->execute();

        // Increment candidate’s total_votes
        $update->bind_param("i", $candidate_id);
        $update->execute();
    }

    $stmt->close();
    $conn->close();

    // Clear session
    unset($_SESSION['president_vote'], $_SESSION['treasurer_vote'], $_SESSION['secretary_vote']);

    // Redirect
    echo '<script>
        alert("Vote Recorded Successfully!. Thank you.");
        window.location.href = "login.php";
    </script>';
    exit();
?>
