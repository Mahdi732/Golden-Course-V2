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
                                <a href="admin.php" class="d-flex align-items-center " >
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
                                <a href="teacher.php" class="d-flex align-items-center " >
                                    <img src="https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_1280.png" alt="Profile" class="rounded-circle" style="width: 40px; height: 40px;">
                                </a>
                        </div>';
                    }
                } else {
                    echo '<button type="button" class="btn btn-link text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="fa fa-search"></i>
                        </button>
                        <a href="login.php" class="btn btn-primary ms-3">Login</a>';
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
                            <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
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