<?php
    $voting_open = true; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Voting</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script defer src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/8161412aed.js" crossorigin="anonymous"></script>
  <link rel="icon" href="images/logo.jpg">
</head>

<body>

    <div class="container bg-white my-5 p-4 shadow-lg rounded">

        <!-- nav -->
        <nav class="navbar navbar-expand-sm mt-5">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav w-100 justify-content-center">
                    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="about_us.php" class="nav-link">About Us</a></li>
                    <li class="nav-item"><a href="voting.php" class="nav-link active1">Voting</a></li>
                </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-3">
            <div class="alert alert-info alert-dismissible fade show shadow-sm" role="alert">
                <strong>Welcome to the Voting Page!</strong> Here you can cast your vote for the candidates of your choice. 
                Please ensure that you have registered and logged in to participate in the voting process.
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">
            <?php
                $elections = [
                    ["title" => "UCC SRC Election 2025/2026", "img" => "ucc.jpg", "open" => true],
                    ["title" => "Nursing Students’ Association Election 2025", "img" => "nusa.jpg", "open" => false],
                    ["title" => "OLA SRC Election 2025/2026", "img" => "ola.jpeg", "open" => false],
                    ["title" => "GRASAG-UCC Chapter Election 2025", "img" => "grasag.jpg", "open" => false]
                    ];

                    foreach ($elections as $election) {
                    $vote_btn = $election['open']
                    ? '<a href="login.php" class="btn btn-primary"><span class = "spinner-grow spinner-grow-sm me-2"></span>Vote Now</a>'
                    : '<button class="btn btn-primary" disabled>Vote Now</button>';

                    $aspirant_btn = $election['open']
                    ? '<a href="voting_form.php" class="btn btn-outline-danger fw-bold">View Aspirants</a>'
                    : '<button class="btn btn-outline-danger fw-bold" disabled>View Aspirants</button>';

                    echo "
                    <div class='col d-flex justify-content-center'>
                        <div class='card shadow-sm' style='width:20rem;'>
                            <img src='images/{$election['img']}' class='card-img-top' alt='logo'>
                            <div class='card-body text-center'>
                            <p class='fw-bold'>{$election['title']}</p>
                            $vote_btn
                            $aspirant_btn
                            </div>
                        </div>
                    </div>";
                     }
            ?>
        </div>
    </div>
</body>
</html>


            