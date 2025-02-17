<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+012 345 6789</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>info@example.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.php" class="navbar-brand p-0">
                <h1 class="m-0"><i class="fa fa-book me-2"></i>EduTech</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse gap-4" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blog</a>
                        <div class="dropdown-menu m-0">
                            <a href="course.php" class="dropdown-item">Course</a>
                            <a href="price.php" class="dropdown-item">Abonement</a>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['user']) && $_SESSION['user']['role'] === "Admin") {
                    echo '<div class="d-flex align-items-center">
                                <a href="Pages/admin" class="d-flex align-items-center " >
                                    <img src="https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_1280.png" alt="Profile" class="rounded-circle" style="width: 40px; height: 40px;">
                                </a>
                        </div>';
                } elseif (isset($_SESSION["user"]) && $_SESSION["user"]["role"] === "Etudiant") {
                    echo '<div class="d-flex align-items-center">
                                <a href="etudiant.php" class="d-flex align-items-center " >
                                    <img src="https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_1280.png" alt="Profile" class="rounded-circle" style="width: 40px; height: 40px;">
                                </a>
                        </div>';
                } elseif (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'Enseignant') {
                    if (isset($_SESSION["user"]) && isset($_SESSION["user"]["etat"]) && $_SESSION["user"]["etat"] === 0) {
                        echo 'You Are Not Active';
                    }else{
                        echo '<div class="d-flex align-items-center">
                                <a href="Pages/teacher" class="d-flex align-items-center " >
                                    <img src="https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_1280.png" alt="Profile" class="rounded-circle" style="width: 40px; height: 40px;">
                                </a>
                        </div>';
                    }
                } else {
                    echo '<button type="button" class="btn btn-link text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="fa fa-search"></i>
                        </button>
                        <a href="Pages/login" class="btn btn-primary ms-3">Login</a>';
                }
                ?>
            </div>
        </nav>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="<?php echo URLROOT; ?>/img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Learn & Grow</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Start Your Journey With EduTech</h1>
                            <a href="course.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Explore Courses</a>
                            <form action="<?php echo URLROOT; ?>/pages/test" method="post">
                                <button type="submit" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="<?php echo URLROOT; ?>/img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Learn & Grow</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Start Your Journey With EduTech</h1>
                            <a href="courses.php" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Explore Courses</a>
                            <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->

    <!-- Courses Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Our Courses</h5>
                <h1 class="mb-0">Explore Our Popular Courses </h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="course-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="course-icon">
                            <i class="fa fa-code text-white"></i>
                        </div>
                        <h4 class="mb-3">Web Development</h4>
                        <p class="m-0">Learn to build responsive websites with HTML, CSS, and JavaScript.</p>
                        <a class="btn btn-lg btn-primary rounded" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                    <div class="course-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="course-icon">
                            <i class="fab fa-android text-white"></i>
                        </div>
                        <h4 class="mb-3">App Development</h4>
                        <p class="m-0">Build mobile apps for Android and iOS using Flutter and React Native.</p>
                        <a class="btn btn-lg btn-primary rounded" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.9s">
                    <div class="course-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="course-icon">
                            <i class="fa fa-chart-pie text-white"></i>
                        </div>
                        <h4 class="mb-3">Data Science</h4>
                        <p class="m-0">Master data analysis, machine learning, and data visualization.</p>
                        <a class="btn btn-lg btn-primary rounded" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Testimonial</h5>
                <h1 class="mb-0">What Our Students Say</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="../img/testimonial-1.jpg" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">John Doe</h4>
                            <small class="text-uppercase">Web Development Student</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        "The course was well-structured and easy to follow. I learned a lot and feel confident in my skills now."
                    </div>
                </div>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="../img/testimonial-2.jpg" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Jane Smith</h4>
                            <small class="text-uppercase">Data Science Student</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        "The instructors are knowledgeable and supportive. I highly recommend this course to anyone interested in data science."
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>