<?php
    date_default_timezone_set('Africa/Accra');
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selectedCandidate'])) {
        $_SESSION['treasurer_vote'] = $_POST['selectedCandidate'];
        header("Location: secretary.php");
        exit();
    }

    $selectedCandidate = isset($_SESSION['president_vote']) ? $_SESSION['president_vote'] : '';

    $conn = new mysqli('localhost', 'root', '', 'liveelect');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    // Fetch voting times
    $result = $conn->query("SELECT start_time, end_time FROM voting_schedule LIMIT 1");
    if ($result && $row = $result->fetch_assoc()) {
        $start_time = $row['start_time'];
        $end_time = $row['end_time'];
        $current_time = date('Y-m-d H:i:s');

        //countdown time
        if (strtotime($current_time) < strtotime($start_time)) {
            $status = 'upcoming';
        } elseif (strtotime($current_time) > strtotime($end_time)) {
            $status = 'ended';
        } else {
            $status = 'active';
        }
        
        //prevent/allow user to login based on the time set
        if ($current_time < $start_time) { 
            echo "<script>alert('Voting has not started yet. Please check back later.'); window.location.href='login.php';</script>"; exit();
        } elseif ($current_time > $end_time) { 
            echo "<script>alert('Voting has ended. Thank you.'); window.location.href='login.php';</script>"; exit(); 
        }
    }
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
    <title>Vote - Treasurer</title>
</head>

<body>

    <div class="container bg-white my-5 p-4 shadow-lg rounded">

        <!-- nav bar -->
        <nav class="navbar navbar-expand-sm mt-5">
            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav d-flex justify-content w-100">
                        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="about_us.php" class="nav-link">About Us</a></li>
                        <li class="nav-item"><a href="login.php" class="nav-link active1">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- countdown -->
        <div id="timer-container" style="text-align:center; margin:20px;">
            <h5 class="text-warning bg-primary p-2 rounded w-50 mx-auto d-flex justify-content-center align-items-center" id="voting-status">
                <?php
                if ($status == 'upcoming') echo "Voting has not started yet";
                elseif ($status == 'ended') echo "Voting has ended";
                else echo "Voting in progress";
                ?>
            </h5>
            <h5 class="text-danger" id="countdown"></h5>
        </div>

        <script>
            const status = "<?php echo $status; ?>";
            const startTime = new Date("<?php echo $start_time; ?>").getTime();
            const endTime = new Date("<?php echo $end_time; ?>").getTime();

            function updateTimer() {
                const now = new Date().getTime();
                let targetTime, message;

                if (status === "upcoming") {
                targetTime = startTime;
                message = "Voting starts in: ";
                } else if (status === "active") {
                targetTime = endTime;
                message = "Voting ends in: ";
                } else {
                document.getElementById("countdown").innerHTML = "Voting period is over.";
                return;
                }

                const distance = targetTime - now;

                if (distance <= 0) {
                location.reload(); // refresh when countdown hits 0
                return;
                }

                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("countdown").innerHTML =
                message + hours + "h " + minutes + "m " + seconds + "s ";
            }

            setInterval(updateTimer, 1000);
        </script>
        <!-- end of countdown -->

        <div class="container text-center mb-4 h4 fw-bold text-dark">Treasurer</div>

        <!-- Candidate Cards -->
         
         <!-- first candidate -->
        <div class="container my-5">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="card shadow" style="width: 16rem; margin: auto;">
                        <img src="images/man.png" class="card-img-top" alt="Candidate 1">
                        <div class="card-body text-center">
                            <h5 class="card-title">Paul Boateng</h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 text-center">
                    <button type="button" class="btn btn-primary btn-lg vote-btn" onclick="toggleVote(this, 4)">Vote</button>
                </div>
            </div>
        </div>

        <!-- second candidate -->
        <div class="container my-5">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="card shadow" style="width: 16rem; margin: auto;">
                        <img src="images/woman.png" class="card-img-top" alt="Candidate 2">
                        <div class="card-body text-center">
                            <h5 class="card-title">Akosua Yankey</h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 text-center">
                    <button type="button" class="btn btn-primary btn-lg vote-btn" onclick="toggleVote(this, 5)">Vote</button>
                </div>
            </div>
        </div>

        <!-- third candidate -->
        <div class="container my-5">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="card shadow" style="width: 16rem; margin: auto;">
                        <img src="images/woman.png" class="card-img-top" alt="Candidate 3">
                        <div class="card-body text-center">
                            <h5 class="card-title">Yaa Mansa</h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 text-center">
                    <button type="button" class="btn btn-primary btn-lg vote-btn" onclick="toggleVote(this, 6)">Vote</button>
                </div>
            </div>
        </div>

        <!-- Hidden field -->
        <input type="hidden" id="selectedCandidate" name="selectedCandidate" value="<?php echo htmlspecialchars($selectedCandidate); ?>">

        <!-- Navigation Buttons -->
        <div class="d-flex justify-content-center mt-4" style="gap: 10px;">
            <div class="text-center">
                <a href="president.php" class="btn btn-info btn-sm">
                    <i class="fas fa-arrow-left"></i> Previous
                </a>
            </div>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="selectedCandidate" id="selectedCandidateForm">
                <button type="submit" class="btn btn-dark btn-sm">
                    Next <i class="fas fa-arrow-right"></i>
                </button>
            </form>
        </div>

        
        <?php
            echo '
            <script>
                function toggleVote(clickedButton, candidateID) {
                    // Reset all buttons
                    document.querySelectorAll(".vote-btn").forEach(btn => {
                        btn.innerHTML = "Vote";
                        btn.classList.remove("btn-success");
                        btn.classList.add("btn-primary");
                    });

                    // Highlight selected button
                    clickedButton.innerHTML = "<i class=\'fas fa-fingerprint\'></i>";
                    clickedButton.classList.remove("btn-primary");
                    clickedButton.classList.add("btn-success");

                    // Store selected candidate
                    document.getElementById("selectedCandidate").value = candidateID;
                    document.getElementById("selectedCandidateForm").value = candidateID;
                }

                // Restore selected vote
                document.addEventListener("DOMContentLoaded", function() {
                    const savedVote = "' . $selectedCandidate . '";
                    if (savedVote) {
                        document.querySelectorAll(".vote-btn").forEach(btn => {
                            if (btn.getAttribute("onclick").includes(savedVote)) {
                                btn.click();
                            }
                        });
                    }
                });
            </script>';
        ?>

    </div>

</body>
</html>
