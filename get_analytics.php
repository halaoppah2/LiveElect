<?php
    $conn = new mysqli('localhost', 'root', '', 'liveelect');
    header('Content-Type: application/json');

    $mode = isset($_GET['mode']) ? $_GET['mode'] : 'all';

    // --- 1️⃣ Fetch total votes per candidate ---
    if ($mode === 'analytics' || $mode === 'all') {
        $query = "
            SELECT 
                c.candidate_id,
                c.name,
                c.position,
                c.total_votes,
                (SELECT COUNT(*) FROM votes) AS total_votes_cast
            FROM candidates c
        ";
        $result = $conn->query($query);

        $candidates = [];
        $total_votes_cast = 0;

        while ($row = $result->fetch_assoc()) {
            $candidates[] = $row;
            $total_votes_cast = $row['total_votes_cast'];
        }

        // Group candidates by position
        $positions = [];
        foreach ($candidates as $c) {
            $positions[$c['position']][] = [
                'name' => $c['name'],
                'votes' => (int)$c['total_votes']
            ];
        }

        $analytics = [
            'total_votes_cast' => (int)$total_votes_cast,
            'positions' => $positions
        ];
    }

    // --- 2️⃣ Fetch voting trend (for line chart) ---
    if ($mode === 'trends' || $mode === 'all') {
        $trendQuery = "
            SELECT 
                DATE_FORMAT(vote_time, '%H:%i') AS time_slot,
                COUNT(*) AS votes
            FROM votes
            GROUP BY time_slot
            ORDER BY vote_time ASC
        ";
        $trendResult = $conn->query($trendQuery);

        $trends = [];
        while ($row = $trendResult->fetch_assoc()) {
            $trends[] = $row;
        }
    }

    // --- 3️⃣ Output according to mode ---
    if ($mode === 'analytics') {
        echo json_encode($analytics);
    } elseif ($mode === 'trends') {
        echo json_encode($trends);
    } else {
        echo json_encode([
            'total_votes_cast' => $analytics['total_votes_cast'],
            'positions' => $analytics['positions'],
            'trends' => $trends
        ]);
    }

    $conn->close();
?>
