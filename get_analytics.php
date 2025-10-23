<?php
$conn = new mysqli('localhost', 'root', '', 'liveelect');

header('Content-Type: application/json');

// temporary total eligible voters (replace later when you have a table)
$totalEligibleVoters = 100;  

// fetch candidates and votes
$query = "SELECT candidate_id, name, position, total_votes FROM candidate ORDER BY position";
$result = $conn->query($query);

$data = [];
$totalVotesCast = 0;

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
    $totalVotesCast += $row['total_votes'];
}

// calculate percentage vote share
foreach ($data as &$candidate) {
    $candidate['percentage'] = $totalVotesCast > 0 
        ? round(($candidate['total_votes'] / $totalVotesCast) * 100, 2)
        : 0;
}

$response = [
    'totalVotesCast' => $totalVotesCast,
    'totalEligibleVoters' => $totalEligibleVoters,
    'candidates' => $data
];

echo json_encode($response);
?>
