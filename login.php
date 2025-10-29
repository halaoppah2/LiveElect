<?php

    $voting_open = true; // Change to false if voting is closed

    if (!$voting_open) {
        echo "<script>alert('Voting is closed.'); window.location.href='index.php';</script>";
        exit;
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
    <title>Login</title>
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
                        <li class="nav-item"><a href="login.php" class="nav-link active1">Login</a></li>
                    </ul>

                </div>
            </div>
        </nav>
        <!-- end of nav -->

        <!-- login container -->
        <div class="container" style="width: 95%; height: 500px;">

            <div class="row">

                <div class="col-sm-4 bg-warning p-4" style="border-radius: 20px 0 0 20px;">

                    <div>

                        <div class="d-block mx-auto" >
                            <img src="images/logo.png" alt="logo" width="200" class="img-fluid d-block mx-auto">

                            <div class="shadow" style="background-color: white; height: 30px; width: 220px; margin: -15px auto; border-radius: 0 0 10px 10px"></div>
                        </div>

                        <div class="text-center mt-3"           style="font-size: 60pt; line-height: 1.0; font-weight:bold">
                            <p>LIVE<br>ELECT</p>
                        </div>

                        <i class="fa-solid fa-check-to-slot" style="color: white; font-size: 80pt; display: flex; justify-content: center;"></i>
                    </div>
                </div>

                <div class="col-sm-8 p-4" style="background-color: lightgray;">
                    
                    <div class="d-block mx-auto">

                        <h2 class="text-center mb-4" style="font-weight: bold; color: black;">Login</h2>

                        <!-- form -->
                        <form action="login_process.php" method="POST" class="mx-auto" style="width: 70%;">

                            <div class="mb-3">
                                <label for="id" class="form-label" style="font-weight: bold;">ID</label>
                                <input type="text" class="form-control" id="id" name="id" placeholder="Enter ID">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label" style="font-weight: bold;">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                            </div>

                            <div class="d-flex justify-content-between  align-items-center mt-3">
                                <input type="submit" value="Login" class="btn btn-warning fw-bold">

                                <a href="forget.php" class="btn btn-danger fw-bold">Forget Password</a>
                            </div>

                            <div class="d-flex mt-5">
                                <p class="mb-1">Don’t have an account?</p>

                                <a href="signup.php"><input type="button" value="Sign Up" name="signup" class="btn btn-warning ms-1 btn-block" style="font-weight: bold;"></input></a>
                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end of login container -->
    </div>
    <!-- end of container -->
</body>
</html>