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
    <title>About us</title>
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

                    <a href="#" class="navbar-brand">
                        <img src="images/logo.png" alt="logo" width="150px">
                    </a>

                    <ul class="navbar-nav">

                        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="#about" class="nav-link active1">About Us</a></li>
                        <li class="nav-item"><a href="#contact" class="nav-link">Contact Us</a></li>

                    </ul>

                </div>
            </div>
        </nav>
        <!-- end of nav -->

        <div class="container">
            <img src="images/analytics.jpg" alt="picture" class="d-block w-100" id="about">
        </div>

        <hr style="width: 70%;" class="mx-auto mt-4">

        <div class=" container mt-2" style="color: darkgray;">

            <p>At LiveElect, we are redefining how institutions conduct elections by providing a secure, transparent, and real-time voting platform. <br> Designed for universities, unions, and professional organizations, LiveElect makes voting simple, accessible, and trustworthy.</p>

            <p><b>Our Mission</b><br>
                To empower institutions with a reliable digital voting system that promotes fairness, inclusivity, and confidence in every election.</p>

            <p><b>Our Vision</b><br>
                To become Ghana’s leading institutional e-voting solution, setting the standard for integrity, efficiency, and innovation in digital democracy.</p>
                
            <p><b>What Makes Us Unique</b><br>
                Unlike traditional voting methods, LiveElect integrates real-time analytics, enabling administrators and voters to track participation <br> and results instantly. This transparency builds trust, strengthens accountability, and ensures that every voice is counted.</p>

            <p>With LiveElect, you don’t just vote, you experience democracy in action.</p>
            
        </div>

        <!-- footer -->
        <div class="container-fluid bg-dark p-5 mt-5 rounded shadow-sm" id="contact">

            <div class="row">

                <div class="col">

                    <div class="text-warning mb-4">
                        <span>Send us a message</span>
                    </div>

                    <!-- footer form -->
                    
                    <form action="form.php" method="POST" name="myForm">

                        <input type="hidden" name="source" value="about_us">

                        <div class="form-floating  mb-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Name" style="width: 250px; height: 50px;" name="name">
                            <label for="name">Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="" class="form-control form-control-sm" placeholder="Email" style="width: 250px; height: 50px;" name="email">
                            <label for="email">Email</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea name="message" id="" cols="30" rows="6" placeholder="Message, not more than 100 characters" style="padding: 5px;"></textarea>
                            
                        </div>

                        <input type="submit" class="btn btn-outline-warning btn-sm">Sumbit</input>

                    </form>

                    <!-- end of footer form -->

                </div>

                <div class="col ms-5">
                     
                    <div class="text-light mb-4">
                        <span>Quik Links</span>
                    </div>

                    <div>
                        <a href="#" class="text-warning" style="text-decoration: none;">Terms of Service</a><br>
                        <a href="#" class="text-warning" style="text-decoration: none;">Privacy Policy</a><br>
                    </div>

                    <!-- social media -->

                    <a href="https://www.instagram.com/oppah_gh?igsh=Z3hiZ3hzbTBrMnpj&utm_source=qr" target="_blank"><i class="fa-brands fa-instagram" style="color: gold; font-size: 18pt; margin-top: 20px;"></i></a>

                    <a href="https://www.linkedin.com/in/enoch-oppah-021b93266?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" target="_blank"><i class="fa-brands fa-linkedin ms-3" style="color: blue; font-size: 18pt; margin-top: 20px;"></i></a>
                </div>

                <div class="col ms-5">

                    <img src="images/logo.png" alt="logo" width="150px">

                    <div class="mt-3">
                        <i class="fa fa-phone" style="color: gold;"></i>
                        <span class="text-white ms-2" style="font-size: 12pt;">+233 203025772</span><br>

                        <i class="fa fa-envelope" style="color: gold;"></i>
                        <span class="text-white ms-2"; style="font-size: 12px;">enochoppah2@gmail.com</span>
                    </div>

                </div>

            </div> 

            <small class="text-warning d-block text-center">&copy;<span id="year"></span>, All right reserved</small>

        </div>
        </div>
        <!-- end of footer -->
    </div>
    <!-- end of container -->

    <script>

        let date = new Date();
        year = date.getFullYear();
        document.getElementById('year').innerHTML = year;

    </script>
    
</body>
</html>