<!DOCTYPE html>
<html lang="en">

<head>
    <!--=====================================
                    META-TAG PART START
        =======================================-->
    <!-- REQUIRE META -->
    <?php include('frontend/partials/utils/meta.php'); ?>

    <!-- TEMPLATE META -->
    <meta name="title" content="Portlab - Personal Portfolio Bootstrap HTML Template">
    <meta name="keywords"
        content="portlab, portfolio, personal, html, template, bootstrap, bussiness, clean, creative, resume, cv, designer, responsive, minimal, freelancer">
    <!--=====================================
                    META-TAG PART END
        =======================================-->

    <!-- FOR WEBPAGE TITLE -->
    <title>Portlab - Portfolio</title>

    <!--=====================================
                    CSS LINK PART START
        =======================================-->
    <!-- FOR FAVICON -->
    <?php include('frontend/partials/utils/fav.php'); ?>
    <?php include('frontend/partials/css/css.php'); ?>

    <!-- FOR PORTFOLIO LIST PAGE -->
    <link rel="stylesheet" href="<?php $asset->frontendAsset('css/custom/portfolio-list.css') ?>">
    <!--=====================================
                    CSS LINK PART END
        =======================================-->
</head>

<body>
    <!--=====================================
                BACK2TOP BUTTON PART START
        =======================================-->
    <?php include('frontend/partials/layout/backToTop.php'); ?>
    <!--=====================================
                BACK2TOP BUTTON PART END
        =======================================-->


    <!--=====================================
                    NAVBAR PART START
        =======================================-->
    <?php include('frontend/partials/layout/header.php'); ?>
    <!--=====================================
                    NAVBAR PART END
        =======================================-->


    <!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
    <section class="single-banner">
        <div class="single-oly">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-content">
                            <h1>My Portfolio</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href='index.html'>Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">portfolio-list</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                  SINGLE BANNER PART END
        =======================================-->


    <!--=====================================
                    FEATURE PART START
        =======================================-->
    <section class="feature-part">
        <div class="container">
            <div class="feature-slider">
                <div class="feature-card">
                    <i class="flaticon-creativity"></i>
                    <h6>creative design</h6>
                </div>
                <div class="feature-card">
                    <i class="flaticon-tools-and-utensils"></i>
                    <h6>clean code</h6>
                </div>
                <div class="feature-card">
                    <i class="flaticon-credit-card"></i>
                    <h6>easy customize</h6>
                </div>
                <div class="feature-card">
                    <i class="flaticon-devices"></i>
                    <h6>responsive site</h6>
                </div>
                <div class="feature-card">
                    <i class="flaticon-bar-chart"></i>
                    <h6>seo friendly</h6>
                </div>
                <div class="feature-card">
                    <i class="flaticon-creativity"></i>
                    <h6>creative design</h6>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    FEATURE PART END
        =======================================-->


    <!--=====================================
                   PORTFOLIO PART START
        =======================================-->
    <section class="port-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="port-heading">
                        <h2>see my best works</h2>
                        <p>You can try search for quick jump and also click category</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="port-src">
                        <form class="port-form">
                            <input type="text" placeholder="Search for quick jump...">
                            <select class="custom-select">
                                <option selected>wordpress</option>
                                <option value="1">laravel</option>
                                <option value="2">react</option>
                                <option value="3">node</option>
                                <option value="4">html</option>
                            </select>
                            <button class="btn btn-inline">
                                <i class="fas fa-search"></i>
                                <span>search</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="port-menu">
                        <li><button class="menu active" type="button" data-filter="all">all project</button></li>
                        <li><button class="menu" type="button" data-filter=".html">html</button></li>
                        <li><button class="menu" type="button" data-filter=".sass">sass</button></li>
                        <li><button class="menu" type="button" data-filter=".react">react</button></li>
                        <li><button class="menu" type="button" data-filter=".word">wordpress</button></li>
                        <li><button class="menu" type="button" data-filter=".soft">software</button></li>
                        <li><button class="menu" type="button" data-filter=".plugin">plugin</button></li>
                    </ul>
                </div>
            </div>
            <div class="row port-parent">
                <div class="col-sm-6 col-lg-4 mix html">
                    <div class="port-card">
                        <div class="port-img">
                            <img src="frontend/assets/images/portfolio/01.jpg" alt="portfolio">
                        </div>
                        <div class="port-oly">
                            <div class="port-btn">
                                <a class="btn btn-inline" href="#">live preview</a>
                                <a class="btn btn-inline" href="#">view details</a>
                            </div>
                            <div class="port-text">
                                <h6>Corporate website</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mix sass">
                    <div class="port-card">
                        <div class="port-img">
                            <img src="frontend/assets/images/portfolio/02.jpg" alt="portfolio">
                        </div>
                        <div class="port-oly">
                            <div class="port-btn">
                                <a class="btn btn-inline" href="#">live preview</a>
                                <a class="btn btn-inline" href="#">view details</a>
                            </div>
                            <div class="port-text">
                                <h6>Personal Portfolio</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mix react">
                    <div class="port-card">
                        <div class="port-img">
                            <img src="frontend/assets/images/portfolio/03.jpg" alt="portfolio">
                        </div>
                        <div class="port-oly">
                            <div class="port-btn">
                                <a class="btn btn-inline" href="#">live preview</a>
                                <a class="btn btn-inline" href="#">view details</a>
                            </div>
                            <div class="port-text">
                                <h6>Personal Portfolio</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mix word">
                    <div class="port-card">
                        <div class="port-img">
                            <img src="frontend/assets/images/portfolio/04.jpg" alt="portfolio">
                        </div>
                        <div class="port-oly">
                            <div class="port-btn">
                                <a class="btn btn-inline" href="#">live preview</a>
                                <a class="btn btn-inline" href="#">view details</a>
                            </div>
                            <div class="port-text">
                                <h6>Personal Portfolio</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mix soft">
                    <div class="port-card">
                        <div class="port-img">
                            <img src="frontend/assets/images/portfolio/05.jpg" alt="portfolio">
                        </div>
                        <div class="port-oly">
                            <div class="port-btn">
                                <a class="btn btn-inline" href="#">live preview</a>
                                <a class="btn btn-inline" href="#">view details</a>
                            </div>
                            <div class="port-text">
                                <h6>Personal Portfolio</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mix plugin">
                    <div class="port-card">
                        <div class="port-img">
                            <img src="frontend/assets/images/portfolio/06.jpg" alt="portfolio">
                        </div>
                        <div class="port-oly">
                            <div class="port-btn">
                                <a class="btn btn-inline" href="#">live preview</a>
                                <a class="btn btn-inline" href="#">view details</a>
                            </div>
                            <div class="port-text">
                                <h6>Personal Portfolio</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mix html">
                    <div class="port-card">
                        <div class="port-img">
                            <img src="frontend/assets/images/portfolio/07.jpg" alt="portfolio">
                        </div>
                        <div class="port-oly">
                            <div class="port-btn">
                                <a class="btn btn-inline" href="#">live preview</a>
                                <a class="btn btn-inline" href="#">view details</a>
                            </div>
                            <div class="port-text">
                                <h6>Personal Portfolio</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mix sass">
                    <div class="port-card">
                        <div class="port-img">
                            <img src="frontend/assets/images/portfolio/08.jpg" alt="portfolio">
                        </div>
                        <div class="port-oly">
                            <div class="port-btn">
                                <a class="btn btn-inline" href="#">live preview</a>
                                <a class="btn btn-inline" href="#">view details</a>
                            </div>
                            <div class="port-text">
                                <h6>Personal Portfolio</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mix react">
                    <div class="port-card">
                        <div class="port-img">
                            <img src="frontend/assets/images/portfolio/09.jpg" alt="portfolio">
                        </div>
                        <div class="port-oly">
                            <div class="port-btn">
                                <a class="btn btn-inline" href="#">live preview</a>
                                <a class="btn btn-inline" href="#">view details</a>
                            </div>
                            <div class="port-text">
                                <h6>Personal Portfolio</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mix word">
                    <div class="port-card">
                        <div class="port-img">
                            <img src="frontend/assets/images/portfolio/10.jpg" alt="portfolio">
                        </div>
                        <div class="port-oly">
                            <div class="port-btn">
                                <a class="btn btn-inline" href="#">live preview</a>
                                <a class="btn btn-inline" href="#">view details</a>
                            </div>
                            <div class="port-text">
                                <h6>Personal Portfolio</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mix soft">
                    <div class="port-card">
                        <div class="port-img">
                            <img src="frontend/assets/images/portfolio/11.jpg" alt="portfolio">
                        </div>
                        <div class="port-oly">
                            <div class="port-btn">
                                <a class="btn btn-inline" href="#">live preview</a>
                                <a class="btn btn-inline" href="#">view details</a>
                            </div>
                            <div class="port-text">
                                <h6>Personal Portfolio</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mix plugin">
                    <div class="port-card">
                        <div class="port-img">
                            <img src="frontend/assets/images/portfolio/12.jpg" alt="portfolio">
                        </div>
                        <div class="port-oly">
                            <div class="port-btn">
                                <a class="btn btn-inline" href="#">live preview</a>
                                <a class="btn btn-inline" href="#">view details</a>
                            </div>
                            <div class="port-text">
                                <h6>Personal Portfolio</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mix html">
                    <div class="port-card">
                        <div class="port-img">
                            <img src="frontend/assets/images/portfolio/13.jpg" alt="portfolio">
                        </div>
                        <div class="port-oly">
                            <div class="port-btn">
                                <a class="btn btn-inline" href="#">live preview</a>
                                <a class="btn btn-inline" href="#">view details</a>
                            </div>
                            <div class="port-text">
                                <h6>Personal Portfolio</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mix sass">
                    <div class="port-card">
                        <div class="port-img">
                            <img src="frontend/assets/images/portfolio/14.jpg" alt="portfolio">
                        </div>
                        <div class="port-oly">
                            <div class="port-btn">
                                <a class="btn btn-inline" href="#">live preview</a>
                                <a class="btn btn-inline" href="#">view details</a>
                            </div>
                            <div class="port-text">
                                <h6>Personal Portfolio</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mix react">
                    <div class="port-card">
                        <div class="port-img">
                            <img src="frontend/assets/images/portfolio/15.jpg" alt="portfolio">
                        </div>
                        <div class="port-oly">
                            <div class="port-btn">
                                <a class="btn btn-inline" href="#">live preview</a>
                                <a class="btn btn-inline" href="#">view details</a>
                            </div>
                            <div class="port-text">
                                <h6>Personal Portfolio</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mix soft">
                    <div class="port-card">
                        <div class="port-img">
                            <img src="frontend/assets/images/portfolio/16.jpg" alt="portfolio">
                        </div>
                        <div class="port-oly">
                            <div class="port-btn">
                                <a class="btn btn-inline" href="#">live preview</a>
                                <a class="btn btn-inline" href="#">view details</a>
                            </div>
                            <div class="port-text">
                                <h6>Personal Portfolio</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mix plugin">
                    <div class="port-card">
                        <div class="port-img">
                            <img src="frontend/assets/images/portfolio/17.jpg" alt="portfolio">
                        </div>
                        <div class="port-oly">
                            <div class="port-btn">
                                <a class="btn btn-inline" href="#">live preview</a>
                                <a class="btn btn-inline" href="#">view details</a>
                            </div>
                            <div class="port-text">
                                <h6>Personal Portfolio</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mix word">
                    <div class="port-card">
                        <div class="port-img">
                            <img src="frontend/assets/images/portfolio/18.jpg" alt="portfolio">
                        </div>
                        <div class="port-oly">
                            <div class="port-btn">
                                <a class="btn btn-inline" href="#">live preview</a>
                                <a class="btn btn-inline" href="#">view details</a>
                            </div>
                            <div class="port-text">
                                <h6>Personal Portfolio</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fas fa-long-arrow-alt-left"></i>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">...</li>
                        <li class="page-item"><a class="page-link" href="#">67</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                    PORTFOLIO PART END
        =======================================-->


    <!--=====================================
                    FOOTER PART START
        =======================================-->
    <?php include('frontend/partials/layout/footer.php'); ?>
    <!--=====================================
                    FOOTER PART END
        =======================================-->


    <!--=====================================
                    JS LINK PART START
        =======================================-->
    <!-- FOR BOOTSTRAP -->
    <?php include('frontend/partials/js/bootstrap.php'); ?>

    <!-- FOR SLICK SLIDER -->
    <?php include('frontend/partials/js/slick.php'); ?>

    <!-- FOR MIXITUP -->
    <?php include('frontend/partials/js/mixitup.php'); ?>

    <!-- FOR INTERACTION -->
    <?php include('frontend/partials/js/main.php'); ?>
    <!--=====================================
                    JS LINK PART END
        =======================================-->
</body>

</html>