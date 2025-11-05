<?php
    date_default_timezone_set('Africa/Accra');

    header('Content-Type: application/json');

    $conn = new mysqli('localhost', 'root', '', 'liveelect');
    
    $mode = isset($_GET['mode']) ? $_GET['mode'] : 'all';

    // --- Check if voting has ended ---
    $check = $conn->query("SELECT * FROM voting_schedule ORDER BY id DESC LIMIT 1");
    $schedule = $check->fetch_assoc();

    date_default_timezone_set('Africa/Accra');
    $now = date('Y-m-d H:i:s');
    $votingEnded = ($now > $schedule['end_time']) ? true : false;

    // --- Fetch total votes per candidate ---
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

    // --- Fetch voting trend (for line chart) ---
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

    // --- Output according to mode ---
    if ($mode === 'analytics') {
    echo json_encode([
        'total_votes_cast' => $analytics['total_votes_cast'],
        'positions' => $analytics['positions'],
        'votingEnded' => $votingEnded
    ]);
    } elseif ($mode === 'trends') {
        echo json_encode($trends);
    } else {
        // Calculate overall total votes
        $overall_total = 0;
        foreach ($analytics['positions'] as $pos => $cands) {
            foreach ($cands as $cand) {
                $overall_total += $cand['votes'];
            }
        }

        echo json_encode([
        'total_votes_cast' => $analytics['total_votes_cast'],
        'positions' => $analytics['positions'],
        'trends' => $trends,
        'overall_total' => $overall_total,
        'votingEnded' => $votingEnded
    ]);

    }

    $conn->close();
?>
