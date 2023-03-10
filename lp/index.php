<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Business Frontpage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="#!">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Services</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        <h1 class="display-5 fw-bolder text-white mb-2">Present your business in a whole new way</h1>
                        <p class="lead text-white-50 mb-4">Quickly design and customize responsive mobile-first sites
                            with Bootstrap, the world’s most popular front-end open source toolkit!</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                            <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Carroussel Card -->
    <div class="swiper-container">
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="card">
                    <div class="slider-text">
                        <h3>
                            Slide One
                        </h3>
                    </div>

                    <div class="content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>

                        <a href="javascript:void(0);">
                            Read More
                        </a>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="card">
                    <div class="slider-text">
                        <h3>
                            Slide Two
                        </h3>
                    </div>

                    <div class="content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>

                        <a href="javascript:void(0);">
                            Read More
                        </a>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="card">
                    <div class="slider-text">
                        <h3>
                            Slide Three
                        </h3>
                    </div>

                    <div class="content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>

                        <a href="javascript:void(0);">
                            Read More
                        </a>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="card">
                    <div class="slider-text">
                        <h3>
                            Slide Four
                        </h3>
                    </div>

                    <div class="content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>

                        <a href="javascript:void(0);">
                            Read More
                        </a>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="card">
                    <div class="slider-text">
                        <h3>
                            Slide Five
                        </h3>
                    </div>

                    <div class="content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </p>

                        <a href="javascript:void(0);">
                            Read More
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-5">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script>
        let swiper = new Swiper('.swiper-container', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
                rotate: 30,
                stretch: 0,
                depth: 200,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: 'swiper-pagination'
            }
        });
    </script>
</body>

</html>