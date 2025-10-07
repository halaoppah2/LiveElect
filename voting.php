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
    <title>Voting</title>
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
                        <li class="nav-item"><a href="voting.php" class="nav-link active1">Voting</a></li>
                    </ul>

                </div>
            </div>
        </nav>
        <!-- end of nav -->

        <!-- voting container -->
        <div class="container" style="width: 95%;">

            <div class="container">

                <p>Welcome to the voting page. Here you can cast your vote for the candidates of your choice. Please ensure that you have registered and logged in to participate in the voting process.</p>
                
            </div>

            <hr style="width: 70%;" class="mx-auto mt-4 mb-4">

        </div>

        <!-- first row -->
        <div class="container" style="width: 85%;">

            <div class="row">

                <div class="col-sm-6 mb-3 mb-sm-0 d-flex justify-content-center">

                    <div class="card shadow" style="width: 20rem;">

                        <img src="images/ucc.jpg" class="card-img-top" alt="ucc_logo">

                        <div class="card-body text-center">
                            <p class="card-text" style="font-weight: bold;">UCC SRC Election 2025/2026</p>

                            <?php
                                $voting_open = true; // Change to true if voting is open
                                    
                                if ($voting_open) {
                                echo '<a href="login.php" class="btn btn-primary"><span class="spinner-grow spinner-grow-sm mx-2"></span>Vote Now</a>';
                                } else {
                                echo '<a href="#" class="btn btn-primary disabled" aria-disabled="true" tabindex="-1" onclick="return false;">Vote Now</a>';
                                    }
                            ?>
                            <?php
                                $voting_open = true; // Change to true if voting is open
                                    
                                if ($voting_open) {
                                echo '<a href="voting_form.php" class="btn btn-outline-danger" style="font-weight:bold;">View Aspirants</a>';
                                } else {
                                echo '<a href="#" class="btn btn-outline-danger disabled" aria-disabled="true" tabindex="-1" onclick="return false;" style="font-weight:bold;">View Aspirants</a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 mb-3 mb-sm-0 d-flex justify-content-center">

                    <div class="card shadow" style="width: 20rem;">

                        <img src="images/nusa.jpg" class="card-img-top" alt="nusa_logo">

                        <div class="card-body text-center">
                            <p class="card-text" style="font-weight: bold;">Nursing Students’ Association
                            (NUGS-UCC Local) Election 2025</p>

                             <?php
                                $voting_open = false; // Change to true if voting is open
                                
                                if ($voting_open) {
                                    echo '<a href="login.php" class="btn btn-primary">Vote Now</a>';
                                } else {
                                    echo '<a href="#" class="btn btn-primary disabled" aria-disabled="true" tabindex="-1" onclick="return false;">Vote Now</a>';
                                }
                            ?>
                            <?php
                                $voting_open = false; // Change to true if voting is open
                                
                                if ($voting_open) {
                                    echo '<a href="voting_form.php" class="btn btn-outline-danger" style="font-weight:bold;">View Aspirants</a>';
                                } else {
                                    echo '<a href="#" class="btn btn-outline-danger disabled" aria-disabled="true" tabindex="-1" onclick="return false;" style="font-weight:bold;">View Aspirants</a>';
                                }
                            ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end of first row  -->

        <!-- seccond row -->
        <div class="container mt-4" style="width: 85%;">

            <div class="row">

                <div class="col-sm-6 mb-3 mb-sm-0 d-flex justify-content-center">

                    <div class="card shadow" style="width: 20rem;">

                        <img src="images/ola.jpeg" class="card-img-top" alt="ola_logo">

                        <div class="card-body text-center">
                            <p class="card-text" style="font-weight: bold;">OLA SRC Election 2025/2026</p>

                            <?php
                                $voting_open = false; // Change to true if voting is open
                                
                                if ($voting_open) {
                                    echo '<a href="login.php" class="btn btn-primary">Vote Now</a>';
                                } else {
                                    echo '<a href="#" class="btn btn-primary disabled" aria-disabled="true" tabindex="-1" onclick="return false;">Vote Now</a>';
                                }
                            ?>
                            <?php
                                $voting_open = false; // Change to true if voting is open
                                
                                if ($voting_open) {
                                    echo '<a href="voting_form.php" class="btn btn-outline-danger" style="font-weight:bold;">View Aspirants</a>';
                                } else {
                                    echo '<a href="#" class="btn btn-outline-danger disabled" aria-disabled="true" tabindex="-1" onclick="return false;" style="font-weight:bold;">View Aspirants</a>';
                                }
                            ?>

                        </div>
                    </div>
                </div>

                <div class="col-sm-6 mb-3 mb-sm-0 d-flex justify-content-center">

                    <div class="card shadow" style="width: 20rem;">

                        <img src="images/grasag.jpg" class="card-img-top" alt="grasag_logo">

                        <div class="card-body text-center">
                            <p class="card-text" style="font-weight: bold;">Graduate Students’ Association of Ghana (GRASAG) – UCC Chapter Election 2025</p>

                             <?php
                                $voting_open = false; // Change to true if voting is open
                                
                                if ($voting_open) {
                                    echo '<a href="login.php" class="btn btn-primary">Vote Now</a>';
                                } else {
                                    echo '<a href="#" class="btn btn-primary disabled" aria-disabled="true" tabindex="-1" onclick="return false;">Vote Now</a>';
                                }
                            ?>
                            <?php
                                $voting_open = false; // Change to true if voting is open
                                
                                if ($voting_open) {
                                    echo '<a href="voting_form.php" class="btn btn-outline-danger" style="font-weight:bold;">View Aspirants</a>';
                                } else {
                                    echo '<a href="#" class="btn btn-outline-danger disabled" aria-disabled="true" tabindex="-1" onclick="return false;" style="font-weight:bold;">View Aspirants</a>';
                                }
                            ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end of seccond row  -->    

        <!-- end of voting container -->
      
    </div>
    <!-- end of container -->
    
</body>
</html>