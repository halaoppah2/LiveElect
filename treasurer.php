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
    <title>Vote - Treasurer</title>
</head>

<body>

    <div class="container bg-white my-5 p-4 shadow-lg rounded">

        <!-- nav -->
        <nav class="navbar navbar-expand-sm mt-5">
            
            <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

                <div class="collapse navbar-collapse"               id="collapsibleNavbar">

                    <ul class="navbar-nav d-flex justify-content w-100">
                        <li class="nav-item"><a href="index.php" class="nav-link ">Home</a></li>
                        <li class="nav-item"><a href="about_us.php" class="nav-link">About Us</a></li>
                        <li class="nav-item"><a href="login.php" class="nav-link active1">Logout</a></li>
                    </ul>

                </div>
            </div>
        </nav>
        <!-- end of nav -->

        <div class=" container text-center mb-4 h4" style="font-weight: bold; color: black;">Treasurer</div>

        <!-- voting container -->

        <!-- first candidate -->

        <div class="container my-5">
            <div class="row align-items-center">
                
                <!-- Candidate Card -->
                <div class="col-sm-6">
                    <div class="card shadow" style="width: 16rem; margin: auto;">
                        <img src="images/paul.jpg" class="card-img-top" alt="Candidate 1" style="height: 280px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Paul Boateng</h5>
                        </div>
                    </div>
                </div>

                <!-- Vote Button -->
                <div class="col-sm-6 text-center">

                    <button type="button" class="btn btn-primary btn-lg vote-btn" onclick="toggleVote(this, 'Bradley Yorke')">Vote</button>

                </div>

            </div>
        </div>
        <!-- end of first candidate -->

        <!-- second candidate -->
        <div class="container my-5">
            <div class="row align-items-center">
                
                <!-- Candidate Card -->
                <div class="col-sm-6">
                    <div class="card shadow" style="width: 16rem; margin: auto;">
                        <img src="images/akosua.jpg" class="card-img-top" alt="Candidate 2" style="height: 280px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Akosua Yankey</h5>
                        </div>
                    </div>
                </div>

                <!-- Vote Button -->
                <div class="col-sm-6 text-center">
                     <button type="button" class="btn btn-primary btn-lg vote-btn" onclick="toggleVote(this, 'Pearl Owusuaa')">Vote</button>
                </div>

            </div>
        </div>
        <!-- end of second candidate -->

        <!-- third candidate -->
          <div class="container my-5">
            <div class="row align-items-center">
                
                <!-- Candidate Card -->
                <div class="col-sm-6">
                    <div class="card shadow" style="width: 16rem; margin: auto;">
                        <img src="images/yaa.jpg" class="card-img-top" alt="Candidate 3" style="height: 280px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">Yaa Mansa</h5>
                        </div>
                    </div>
                </div>

                <!-- Vote Button -->
                <div class="col-sm-6 text-center">
                     <button type="button" class="btn btn-primary btn-lg vote-btn" onclick="toggleVote(this, 'Alexia Mensah')">Vote</button>
                </div>

            </div>
        </div>
        <!-- end of third candidate -->


        <!-- end of voting container -->

         <!-- Hidden field just to keep track -->
        <input type="hidden" id="selectedCandidate">

        <!-- navigation buttons -->
        <?php
            echo '
            <script>
                function toggleVote(clickedButton, candidateName) {
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
                document.getElementById("selectedCandidate").value = candidateName;
                }
            </script>';

         echo '
            <div class="d-flex justify-content-center mt-4" style="gap: 10px;"> 

                <div class="text-center">
                    <a href="president.php" class="btn btn-info btn-sm">
                        <i class="fas fa-arrow-left"></i> Previous
                    </a>
                </div>

                <div class="text-center">
                    <a href="secretary.php" class="btn btn-dark btn-sm">
                        Next <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

            </div>';
        ?>

      
    </div>

    <!-- end of container -->
    
</body>


</script>

</html>