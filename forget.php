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
    <title>Forget Password</title>
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

            <div class="col p-2 shadow rounded" style="background-color: lightgray; height: 500px;">
                
                <div class=" container d-block mx-auto" style="margin-top: 120px;">

                    <h2 class="text-center mb-2" style="font-weight: bold; color: black;">Forget Password</h2>

                    <!-- form -->

                    <form action="forget_password.php" method="POST" class="mx-auto container" style="width: 60%;">

                        <div class="mb-3">
                            <label for="id" class="form-label" style="font-weight: bold;">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                        </div>

                        <div class="mt-4">
                        <input type="submit" value="Send" name="forgetpass" class="btn btn-danger btn-block d-block mx-auto" style="font-weight: bold; width: auto;"></input>
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