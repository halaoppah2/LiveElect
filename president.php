<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selectedCandidate'])) {
    $_SESSION['president_vote'] = $_POST['selectedCandidate'];
    header("Location: treasurer.php");
    exit();
    }

    // restore the president vote
    $selectedCandidate = isset($_SESSION['president_vote']) ? $_SESSION['president_vote'] : '';
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
    <link rel="icon" href="images/logo.jpg">
    <title>Vote - President</title>
</head>

<body>

<div class="container bg-white my-5 p-4 shadow-lg rounded">
    <!-- nav bar -->
    <nav class="navbar navbar-expand-sm mt-5">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav d-flex justify-content w-100">
                    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="about_us.php" class="nav-link">About Us</a></li>
                    <li class="nav-item"><a href="login.php" class="nav-link active1">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container text-center mb-4 h4 fw-bold text-dark">President</div>

    <!-- Candidate Cards -->
    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="card shadow" style="width: 16rem; margin: auto;">
                    <img src="images/Bradley.jpg" class="card-img-top" alt="Candidate 1" style="height: 280px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Bradley Yawson</h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 text-center">
                <button type="button" class="btn btn-primary btn-lg vote-btn" onclick="toggleVote(this, 1)">Vote</button>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="card shadow" style="width: 16rem; margin: auto;">
                    <img src="images/pearl.jpeg" class="card-img-top" alt="Candidate 2" style="height: 280px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Pearl Owusuaa</h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 text-center">
                <button type="button" class="btn btn-primary btn-lg vote-btn" onclick="toggleVote(this, 2)">Vote</button>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="card shadow" style="width: 16rem; margin: auto;">
                    <img src="images/Alexia.jpg" class="card-img-top" alt="Candidate 3" style="height: 280px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">Alexia Mensah</h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 text-center">
                <button type="button" class="btn btn-primary btn-lg vote-btn" onclick="toggleVote(this, 3)">Vote</button>
            </div>
        </div>
    </div>

    <!-- Hidden field -->
    <input type="hidden" id="selectedCandidate" name="selectedCandidate" value="<?php echo htmlspecialchars($selectedCandidate); ?>">

    <!-- Navigation Buttons -->
    <div class="d-flex justify-content-center mt-4">
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
