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
    <title>Signup</title>
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
                        <li class="nav-item"><a href="login.php" class="nav-link active1">Signup</a></li>
                    </ul>

                </div>
            </div>
        </nav>
    <!-- end of nav -->

    <!-- signup container -->

    <div class="container" style="width: 95%;">

        <div class="row">

            <!-- first column -->

            <div class="col-sm-8 p-4" style="background-color: lightgray;">
                
                <div class="d-block mx-auto">

                    <h2 class="text-center mb-4" style="font-weight: bold; color: black;">Signup</h2>

                    <!-- form -->

                    <form action="signup_process.php" method="POST" class="mx-auto" style="width: 70%;">

                        <div class="mb-3">
                            <label for="email" class="form-label" style="font-weight: bold;">Email</label>
                            <input type="email" class="form-control" id="id" name="email" placeholder="Enter name">
                        </div>

                        <div class="mb-3">
                            <label for="id" class="form-label" style="font-weight: bold;">ID</label>
                            <input type="text" class="form-control" id="id" name="id" placeholder="Enter ID">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label" style="font-weight: bold;">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                        </div>

                        <div class="mb-3">
                            <label for="con_password" class="form-label" style="font-weight: bold;">Confirm Password</label>
                            <input type="password" class="form-control" id="con_password" name="con_password" placeholder="Re-enter password">
                        </div>

                        <input type="submit" value="Signup" class="btn btn-warning btn-block mt-3" style="font-weight: bold;"></input>

                        <div class="d-flex mt-5">
                            <p class="mb-1">Already have an account?</p>

                           <a href="login.php"> <input type="button" value="Login" name="signup" class="btn btn-warning ms-1 btn-block" style="font-weight: bold;"></input></a>
                        </div>

                    </form>
                    <!-- end of form -->
                 
                </div>

            </div>
            <!-- end of first column -->

            <!-- second column -->

            <div class="col-sm-4 bg-warning p-4" style="border-radius: 0px 20px 20px 0px;">

                <div>

                    <div class="d-block mx-auto" >

                         <img src="images/logo.jpg" alt="logo" width="200" class="img-fluid d-block mx-auto">

                          <div class="shadow" style="background-color: white; height: 30px; width: 220px; margin: -15px auto; border-radius: 0 0 10px 10px"></div>

                    </div>

                        <div class="text-center mt-3" style="font-size: 60pt; line-height: 1.0; font-weight:bold">
                            <p>LIVE<br>ELECT</p>
                        </div>

                       <i class="fa-solid fa-check-to-slot" style="color: white; font-size: 80pt; display: flex; justify-content: center;"></i>

                </div>

            </div>
            <!-- end of second column -->

        </div>

    </div>

    <!-- end of signup container -->
      
    </div>

    <!-- end of container -->
    
</body>
</html>