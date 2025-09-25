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
    <title>Live Elect</title>
</head>

<body>

    <div class="container bg-white my-5 p-4 shadow-lg rounded">

    <!-- nav -->

        <nav class="navbar navbar-expand-sm mt-5 sticky-top">
            <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

                <div class="collapse navbar-collapse"               id="collapsibleNavbar">

                    <a href="#" class="navbar-brand">
                        <img src="images/logo.jpg" alt="logo">
                    </a>

                    <ul class="navbar-nav">

                        <li class="nav-item"><a href="#" class="nav-link active1">Home</a></li>
                        <li class="nav-item"><a href="#about" class="nav-link">About Us</a></li>
                        <li class="nav-item"><a href="#feature" class="nav-link">Voting</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Analytics</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="#contact" class="nav-link">Contact Us</a></li>

                    </ul>

                </div>
            </div>
        </nav>

        <!-- carousel -->

        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-indicators">

                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active">
                </button>
                
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1">
                </button>

                <!-- <button type="button" data-bs-target="#demo" data-bs-slide-to="2">
                </button> -->

            </div>

            <!-- first image -->
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="images/secure.jpg" alt="picture" class="d-block w-100">

                    <div class="container">

                        <div class="carousel-caption text-dark">

                            <div class="caption">
                                <p><b>LiveElect - Empowering institutions 
                                    with <br> secure, transparent, and real-time
                                    voting.</b></p>
                                <p>“Easily cast your votes in Ghana’s institutional <br> elections. Trusted by leading organizations for <br> secure, reliable, and transparent voting.”</p>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- second image -->
                <div class="carousel-item">

                    <img src="images/analytics.jpg" alt="picture" class="d-block w-100">

                    <!-- <div class="container">

                        <div class="carousel-caption text-dark">
                            <h4 style="color: orangered;">A Life Changing Opportunity</h4>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem, temporibus.</p>
                        </div>

                    </div> -->

                </div>

                <!-- third image -->
                <!-- <div class="carousel-item">

                    <img src="images/pix.jpg" alt="pix" class="d-block w-100">

                    <div class="container">

                    <div class="carousel-caption text-dark">
                        <h4 style="color: orangered;">Get involve now</h4>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem, temporibus.</p>
                    </div>

                </div> -->

            </div>

            <button class="carousel-control-prev prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-info"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-info"></span>
            </button>

        </div>
        <!-- end of carousel -->

       <div class="text-center mt-4">
         <p class="h4">Ghana’s Most Advanced Institutional Voting Platform</p>
         <p>Discover why schools and organizations trust LiveElect
            for secure, transparent, and real-time elections.</p>
       </div>

       <hr style="width: 50%; margin: auto;">

    </div>

    <script>
        
    // function validateForm(){
    //     let valid = document.forms["myForm"]["form"].value;
        
    //     if (valid == ""){
    //         alert('Fields must be filled! Thank you.');
    //         return false;
    //     }   
    // }

    </script>
    
</body>
</html>