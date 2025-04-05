<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Management System</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/templatemo-tiya-golf-club.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <main>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="index.html">
                    <img src="images/logo.png" class="navbar-brand-image img-fluid" alt="student management system">
                    <span class="navbar-brand-text">
                        Student
                        <small>Management System</small>
                    </span>
                </a>

                <div class="d-lg-none ms-auto me-3">
                    <a class="btn custom-btn custom-border-btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">Member Login</a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="register">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Offcanvas: Student Login -->
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasStudentLogin" aria-labelledby="offcanvasStudentLoginLabel">
            <div class="offcanvas-body d-flex flex-column">
                <form class="custom-form student-login-form" action="student_login.php" method="post" role="form">
                    <div class="student-login-form-body">
                        <div class="mb-4">
                            <label class="form-label mb-2" for="student-id">Student ID</label>
                            <input type="text" name="student-id" id="student-id" class="form-control" placeholder="Enter Student ID" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label mb-2" for="student-password">Password</label>
                            <input type="password" name="student-password" id="student-password" pattern="[0-9a-zA-Z]{4,10}" class="form-control" placeholder="Enter Password" required>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="studentRemember">
                            <label class="form-check-label" for="studentRemember">Remember me</label>
                        </div>

                        <div class="col-lg-5 col-md-7 col-8 mx-auto">
                            <button type="submit" class="form-control">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Hero Section -->
        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                        <h2 class="text-white">Welcome to </h2>
                        <h1 class="cd-headline rotate-1 text-white mb-4 pb-2">
                            <span>Our</span>
                            <span class="cd-words-wrapper">
                                <b class="is-visible">Student</b>
                                <b>Management</b>
                                <b>System</b>
                            </span>
                        </h1>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 me-auto mb-5 mb-lg-0">
                    <a class="navbar-brand d-flex align-items-center" href="index.html">
                        <img src="images/logo.png" class="navbar-brand-image img-fluid" alt="">
                        <span class="navbar-brand-text">
                            Student
                            <small>Management System</small>
                        </span>
                    </a>
                </div>

                <div class="col-lg-3 col-12">
                    <p class="copyright-text">Copyright © 2025 Student Management System</p>
                </div>

                <div class="col-lg-2 col-12 ms-auto">
                    <ul class="social-icon mt-lg-5 mt-3 mb-4">
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-instagram"></a>
                        </li>
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-twitter"></a>
                        </li>
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                        </li>
                    </ul>
                    <p class="copyright-text">
                        Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">Naila & Nasira</a>
                    </p>
                </div>

            </div>
        </div>

        <!-- Footer Wave -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#81B29A" fill-opacity="1"
                d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
            </path>
        </svg>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/animated-headline.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/custom.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
