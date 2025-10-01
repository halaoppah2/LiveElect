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
    <title>Reset Password</title>
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
                    </ul>

                </div>
            </div>
        </nav>
    <!-- end of nav -->

    <!-- login container -->

    <div class="container" style="width: 70%;">

        <div class="row">  

            <div class="col p-2 shadow rounded" style="background-color: lightgray; height: 450px;">
                
                <div class="d-block mx-auto" style="margin-top: 60px;">

                    <h2 class="text-center mb-2" style="font-weight: bold; color: black;">Reset Password</h2>

                    <!-- form -->

                    <form action="password_reset.php" method="POST" class="mx-auto" style="width: 60%;">

                        <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token'] ?? ''); ?>">

                        <div class="mb-3">
                            <label for="password" class="form-label" style="font-weight: bold;">New Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label" style="font-weight: bold;">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Re-enter password">
                        </div>


                        <div class="mt-4">
                        <input type="submit" value="Reset" name="forgetpass" class="btn btn-danger btn-block d-block mx-auto" style="font-weight: bold; width: 250px;"></input>
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